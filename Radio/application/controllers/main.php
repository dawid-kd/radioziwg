<?php

// firephp: $this->firephp->log();

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * @package wybierampl
 * @copyright Copyright (c) 2012, Global4Net
 * @link http://www.global4net.com/
 */
class Main extends MX_Controller
{
	/**
	 * @var array $data
	 */
	private $data = array();

	public function __construct()
	{
		parent::__construct();
	}

	public function contact()
	{
		$this->load->library('recaptcha');
		$this->lang->load('recaptcha');

		$this->form_validation->set_error_delimiters('<div class="error ui-corner-all ui-state-error">', '</div>');
		$this->form_validation->set_rules('name', 'name', 'trim|xss_clean|required');
		$this->form_validation->set_rules('email', 'email', 'trim|xss_clean|required|valid_email');
		$this->form_validation->set_rules('topic', 'topic', 'trim|xss_clean|required');
		$this->form_validation->set_rules('message', 'message', 'trim|xss_clean|required');

		if (!$this->User->isLogged())
		{
			$this->form_validation->set_rules('recaptcha_response_field', 'captcha', 'required|callback_checkCaptcha');
			$this->data['recaptcha'] = $this->recaptcha->get_html('pl');
		}

		if ($this->form_validation->run($this))
		{
			$this->load->library('Email');

			$this->email->clear(TRUE);
			$this->email->to($this->config->item('email_general'));
			$this->email->from($this->input->post('email'), $this->input->post('name'));
			$this->email->subject('[kontakt] ' . $this->input->post('topic'));
			$this->email->message($this->input->post('message'));

			if ($this->email->send())
			{
				$this->session->set_flashdata('info', 'Wiadomość została pomyślnie wysłana');
				redirect();
			}
			else
			{
				$this->session->set_flashdata('error', 'Wystąpił błąd podczas wysyłania. Spróbuj ponownie później.');
				redirect('kontakt');
			}
		}

		$this->data['title'] = 'Kontakt';
		$this->data['content'] = $this->load->view('front/main/contact', $this->data, TRUE);
		$this->load->view('front/wrapper', $this->data);
	}

	public function index()
	{
		$this->data['title'] = 'Strona główna';
		$this->data['content'] = $this->load->view('front/main/index', $this->data, TRUE);
		$this->load->view('front/wrapper', $this->data);
	}

	public function partners()
	{
		$this->data['title'] = 'Partnerzy';
		$this->data['content'] = $this->load->view('front/main/partners', $this->data, TRUE);
		$this->load->view('front/wrapper', $this->data);
	}

	public function rules()
	{
		$this->load->model('AppSettings');

		$args = array(
			'key' => 'rules',
		);
		$setting = $this->AppSettings->getData($args);

		$this->data['title'] = 'Regulamin serwisu';
		$this->data['content'] = $setting->value;
		$this->load->view('front/wrapper', $this->data);
	}

	public function privacy()
	{
		$this->load->model('AppSettings');

		$args = array(
			'key' => 'privacy',
		);
		$setting = $this->AppSettings->getData($args);

		$this->data['title'] = 'Polityka prywatności';
		$this->data['content'] = $setting->value;
		$this->load->view('front/wrapper', $this->data);
	}

	public function publicity()
	{
		$this->load->model('AppSettings');

		$args = array(
			'key' => 'publicity',
		);
		$setting = $this->AppSettings->getData($args);

		$this->data['title'] = 'Reklama';
		$this->data['content'] = $setting->value;
		$this->load->view('front/wrapper', $this->data);
	}

	public function pageMissing()
	{
		$this->data['title'] = 'Strona w budowie';
		$this->data['content'] = $this->load->view('front/main/pageMissing', $this->data, TRUE);
		$this->load->view('front/wrapper', $this->data);
	}

	public function offline()
	{
		if ($this->config->item('app_online'))
		{
			redirect();
		}

		$this->data['title'] = 'Offline Mode';
		$this->data['content'] = $this->load->view('front/main/offline', $this->data, TRUE);
		$this->load->view('front/wrapper', $this->data);
	}

	public function checkCaptcha($val)
	{
		if (!$this->recaptcha->check_answer($this->input->ip_address(), $this->input->post('recaptcha_challenge_field'), $val))
		{
			$this->form_validation->set_message('checkCaptcha', 'Wprowadzony kod jest nieprawidłowy');

			return FALSE;
		}

		return TRUE;
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */