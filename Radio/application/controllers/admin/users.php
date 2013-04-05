<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @package wybierampl
 * @copyright Copyright (c) 2012, Global4Net
 * @link http://www.global4net.com/
 */
class Users extends MX_Controller
{

    /**
     * @var array $data
     */
    private $data = array();

    public function __construct()
    {
        parent::__construct();

        $this->User->isAdmin('/admin/login');
    }

    public function index()
    {
        $this->load->library('pagination');
        $limit = $this->input->post('limit') != '' ? $this->input->post('limit') : 10;
        $segment = 3;

        $args = array(
            'limit' => $limit,
            'offset' => getInt($this->uri->segment($segment)),
//			'order' => array(array('by' => 'isAdmin', 'dir' => 'desc'), array('by' => 'username', 'dir' => 'asc')),
        );

        if ($_POST)
        {
            $args['keywords'] = $this->input->post('keywords');
            $args['orderBy'] = $this->input->post('orderBy');
            $args['orderDir'] = $this->input->post('orderDir');
        }

        $this->data['users'] = $this->User->getData($args);
        $this->data['counter'] = $this->User->getCounter();

        $pagConf = array(
            'base_url' => base_url('admin/users'),
            'per_page' => $limit,
            'total_rows' => $this->data['counter'],
            'uri_segment' => $segment,
        );
        $this->pagination->initialize($pagConf);
        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['title'] = 'Użytkownicy';
        $this->data['content'] = $this->load->view('admin/users/index', $this->data, TRUE);
        $this->load->view('admin/wrapper', $this->data);
    }

    public function addEdit($id = 0)
    {
        $this->form_validation->set_error_delimiters('<div class="error ui-corner-all ui-state-error">', '</div>');
        $this->form_validation->set_rules('fname', 'imię', 'trim|xss_clean|required');
        $this->form_validation->set_rules('lname', 'nazwisko', 'trim|xss_clean|required');
        $this->form_validation->set_rules('email', 'adres e-mail', 'trim|xss_clean|required');
        $this->form_validation->set_rules('pass', 'hasło', 'trim|xss_clean');
        $this->form_validation->set_rules('pass2', 'powtórz hasło', 'trim|xss_clean|matches[pass]');

        if ($this->form_validation->run($this))
        {
            $args = array(
                'id' => $id,
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'isAdmin' => $this->input->post('isAdmin'),
                'isBlocked' => $this->input->post('isBlocked'),
                'isActive' => 1,
            );

            if ($this->input->post('pass') != '')
            {
                $args['pass'] = md5($this->input->post('pass'));
            }

            $this->User->setData($args);
            redirect('admin/users');
        }

        if ($id > 0)
        {
            $this->data['title'] = 'Edycja użytkownika';
            $this->data['editing'] = TRUE;

            $args = array(
                'id' => $id,
            );
            $this->data['user'] = $this->User->getData($args);
        }
        else
        {
            $this->data['title'] = 'Nowy użytkownik';
            $this->data['editing'] = FALSE;
        }

        $this->data['content'] = $this->load->view('admin/users/add_edit', $this->data, TRUE);
        $this->load->view('admin/wrapper', $this->data);
    }

    public function unlock($id = 0)
    {
        if ($id > 0)
        {
            $args = array(
                'id' => $id,
                'isBlocked' => 0,
            );
            $this->User->setData($args);
            redirect('admin/users');
        }
    }

    public function delete($id = 0)
    {
        if ($id > 0)
        {
            $args = array(
                'id' => $id,
                'isActive' => 0,
            );
            $this->User->setData($args);
            redirect('admin/users');
        }
    }

    public function newsletter()
    {
        $this->load->model('NewsletterAddresses');
        $this->load->library('Email');

        $addresses = $this->NewsletterAddresses->getData();
        $this->data['counter'] = count($addresses);

        $continueSending = $this->uri->segment(3);
        $count = intval($this->uri->segment(4));
        $part = intval($this->uri->segment(5));
        $confirm = intval($this->uri->segment(6));

        if ($this->input->post('subject') != '' || $continueSending == 1)
        {
            if ($this->input->post('subject') != '')
            {
                $subject = $this->input->post('subject');
                $args = array(
                    'sending_subject' => $subject,
                    'sending_emails' => array(),
                    'sending_attachments' => ''
                );
                $this->session->set_userdata($args);
                $count = 0;
            }
            else
            {
                $subject = $this->session->userdata('sending_subject');
            }

            if ($this->input->post('content') != '')
            {
                $body = $this->input->post('content');
                $args = array(
                    'sending_body' => $body,
                );
                $this->session->set_userdata($args);
            }
            else
            {
                $body = $this->session->userdata('sending_body');
            }

            $sendPerPack = 10;
            $site = $part * $sendPerPack;

            $emails = array();

            foreach ($addresses as $email)
            {
                array_push($emails, $email['email']);
            }

            if (is_array($emails))
            {
                for ($i = 0; $i < $sendPerPack; $i++)
                {
                    if (!isset($emails[$i + $site]))
                    {
                        break;
                    }

                    $this->email->clear(TRUE);
                    $this->email->to($emails[$i + $site]);
                    $this->email->from($this->config->item('email_newsletter'), $this->config->item('app_title'));
                    $this->email->subject($subject);
                    $this->email->message($body);

                    if ($this->email->send())
                    {
                        $count++;
                    }

                    unset($emails[$i + $site]);
                }
            }

            $args = array(
                'sending_emails' => $emails,
            );
            $this->session->set_userdata($args);

            if ($part > 0 && $confirm == 0 && ($part % $sendPerPack == 0))
            {
                redirect('admin/users/newsletter/0/' . $count . '/' . $part . '/1');
                exit;
            }

            if ($part > 0 && $confirm == 0 && ($part % $sendPerPack == 0))
            {
                redirect('admin/users/newsletter/0/' . $count . '/' . $part . '/1');
                exit;
            }

            if (count($emails) > 0)
            {
                redirect('admin/users/newsletter/1/' . $count . '/' . ($part + 1));
            }
            else
            {
                redirect('admin/users/newsletter/0/' . $count);
            }
        }

        $this->data['title'] = 'Korespondencja';
        $this->data['content'] = $this->load->view('admin/users/newsletter', $this->data, TRUE);
        $this->load->view('admin/wrapper', $this->data);
    }

    public function checkGroup($val)
    {
        if ($val == '0')
        {
            $this->form_validation->set_message('checkGroup', 'Nie wybrano grupy');

            return FALSE;
        }

        return TRUE;
    }

}

/* End of file index.php */
/* Location: ./application/controllers/admin/users.php */