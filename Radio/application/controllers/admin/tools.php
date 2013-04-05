<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @package wybierampl
 * @copyright Copyright (c) 2012, Global4Net
 * @link http://www.global4net.com/
 *
 * @property Article $Article
 * @property Comment $Comment
 */
class Tools extends MX_Controller
{

    /**
     * @var array $data
     */
    private $data = array();

    public function __construct()
    {
        parent::__construct();

        $this->User->isAdmin('/admin/login');

        if (!$this->User->isDev())
        {
            redirect('admin');
        }
    }

    public function index()
    {
        $this->data['title'] = 'Narzędzia';
        $this->data['content'] = $this->load->view('admin/tools/index', $this->data, TRUE);
        $this->load->view('admin/wrapper', $this->data);
    }

}

/* End of file tools.php */
/* Location: ./application/controllers/admin/tools.php */