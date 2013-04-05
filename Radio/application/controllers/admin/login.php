<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * @package wybierampl
 * @copyright Copyright (c) 2012, Global4Net
 * @link http://www.global4net.com/
 */
class Login extends MX_Controller
{
	/**
	 * @var array $data
	 */
	private $data = array();

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if (!$this->User->isLogged())
		{
			$this->form_validation->set_rules('login', 'login', 'trim|xss_clean|required');
			$this->form_validation->set_rules('password', 'password', 'trim|xss_clean|required');

			if ($this->form_validation->run())
			{
				$login = $this->input->post('login');
				$password = $this->input->post('password');

				if ($this->User->login($login, $password))
				{
					redirect('/admin');
				}
				else
				{
					$this->data['loginError'] = $this->User->getAlert();
				}
			}

			$this->data['title'] = 'Logowanie';
			$this->data['content'] = $this->load->view('admin/login', $this->data, TRUE);
			$this->load->view('admin/wrapper', $this->data);
		}
		elseif ($this->User->isAdmin())
		{
			redirect('admin');
		}
		else
		{
			exit;
			$this->session->set_flashdata('error_msg', 'Nie posiadasz uprawnień administracyjnych');
			redirect();
		}
	}
}

/* End of file login.php */
/* Location: ./application/controllers/admin/login.php */