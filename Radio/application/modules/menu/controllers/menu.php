<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * @package wybierampl
 * @copyright Copyright (c) 2012, Global4Net
 * @link http://www.global4net.com/
 *
 * @property Article $Article
 * @property CompanySector $CompanySector
 */
class Menu extends MX_Controller
{
	/**
	 * @var array $data
	 */
	private $data = array();

	public function __construct()
	{
		parent::__construct();
	}

	public function adminSidebarRight()
	{
		if ($this->uri->segment(2) == 'login')
		{
			return;
		}

		$this->load->view('adminSidebarRight');
	}

	public function frontFooter()
	{
		$this->load->view('frontFooter');
	}
}

/* End of file menu.php */
/* Location: ./application/modules/menu/controllers/menu.php */