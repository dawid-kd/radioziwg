<?php
class Users extends CI_Controller
{
	/**
	 * @var array $data
	 */
	private $data = array();

	public function __construct()
	{
            
		parent::__construct();
                $this->load->model('Usersmodel');
	}
        public function show(){
            
        /*$this->db->select('user_name');
        $this->db->from('user');
        $this->db->where('login', 'palakamab');
        $query = $this->db->get();
        var_dump($query->result());*/
        $check=$this->Usersmodel->emailcheck('daw2342@wp.pl');
        echo $this->Usersmodel->login('daw2342@wp.pl','password');
        //echo $check;
        echo $this->Usersmodel->getAlert();
        echo $this->session->userdata('username');
        echo $this->Usersmodel->isLogged();
        $this->Usersmodel->logout();
        echo $this->session->userdata('username');
        $this->Usersmodel->setData(['id'=>'1','city'=>'leszno']);
        var_dump($this->Usersmodel->getData('1'));
        
        }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
