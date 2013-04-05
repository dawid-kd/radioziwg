<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * @package wybierampl
 * @author Wareczek
 * @copyright Copyright (c) 2011, Global4Net
 * @link http://www.global4net.com/
 */
class PreController
{
	private $ci;

	public function __construct()
	{
		$this->ci = & get_instance();
	}

	public function profiler()
	{
		$this->ci->output->enable_profiler($this->ci->config->item('profiler_on'));
	}

	public function checkSiteOnline()
	{
		if (!$this->ci->config->item('app_online') && !in_array($this->ci->uri->segment(1), array('offline', 'zaloguj')))// && !$this->ci->User->isDev()) // TODO coś miesza źle
		{
			redirect('offline');
		}
	}
}

/* End of file PreController.php */
/* Location: ./application/hooks/PreController.php */