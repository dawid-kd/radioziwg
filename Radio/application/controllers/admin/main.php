<?php

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

		$this->User->isAdmin('/admin/login');
	}

	public function index()
	{
		$this->data['title'] = 'Panel kontrolny';
		$this->data['content'] = $this->load->view('admin/main/index', $this->data, TRUE);
		$this->load->view('admin/wrapper', $this->data);
	}

	public function logout()
	{
		$this->User->logout();
		redirect('admin');
	}

	public function settings()
	{
		$this->load->model('AppSettings');

		$this->data['settings'] = $this->AppSettings->getData();

		if ($this->input->post('submit'))
		{
			$args = array(
				array(
					'key' => 'rules',
					'value' => $this->input->post('rules'),
				),
				array(
					'key' => 'privacy',
					'value' => $this->input->post('privacy'),
				),
				array(
					'key' => 'publicity',
					'value' => $this->input->post('publicity'),
				),
			);

			$this->AppSettings->setData($args);

			$this->session->set_flashdata('info', 'Ustawienia zostały pomyślnie zapisane');
			redirect('admin');
		}

		$this->data['title'] = 'Ustawienia';
		$this->data['content'] = $this->load->view('admin/main/settings', $this->data, TRUE);
		$this->load->view('admin/wrapper', $this->data);
	}
}

/* End of file main.php */
/* Location: ./application/controllers/admin/main.php */