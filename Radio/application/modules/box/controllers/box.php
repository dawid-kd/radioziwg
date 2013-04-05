<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * @package wybierampl
 * @copyright Copyright (c) 2012, Global4Net
 * @link http://www.global4net.com/
 *
 * @property Article $Article
 * @property UserFriend $UserFriend
 */
class Box extends MX_Controller
{
	/**
	 * @var array $data
	 */
	private $data = array();

	public function __construct()
	{
		parent::__construct();
	}
        
        public function front_message()
	{
		$this->load->view('front_message');
	}
        
        public function front_login()
	{
		$this->load->view('front_login');
	}
}

/* End of file box.php */
/* Location: ./application/modules/box/controllers/box.php */