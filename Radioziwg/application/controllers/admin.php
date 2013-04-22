<?php

class Admin extends CI_Controller
{
    private $aMenu;
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Usersmodel');
        
        # Left menu
        $this->aMenu = array(
            'Users'   => 'admin/users_showAll',
            'Songs'        => 'admin/songs_showAll',
            'Artists'       => 'admin/artists_showAll',
            
        );
    }
    
    public function index()
    {
        $data['mainContent'] = 'admin/index';
        $data['viewContent'] = 'admin/welcome';
        
        $data['aMenu'] = $this->aMenu;
        
        $this->load->view('templates/main', $data);
    }
    
    /*
     *  USERS MANAGEMENT
     */
    public function users_showAll()
    {
        
        $data['mainContent'] = 'admin/index';
        $data['viewContent'] = 'admin/users/showAll';
        
        $data['aMenu'] = $this->aMenu;
        
        # get all register users
        $data['aUsers'] = $this->Usersmodel->getAll();
        
        $this->load->view('templates/main', $data);
        
    }
    
    public function users_edit($iId)
    {
        # redirect to base location if ID < 0
        if (!$iId || $iId < 0) {
            redirect('admin/users_showAll');
        }
        
        $data['mainContent'] = 'admin/index';
        $data['viewContent'] = 'admin/users/edit';
        
        $data['aMenu'] = $this->aMenu;
        $data['sMsg'] = false;
        
        # get user by id. if false -> redirect to base location
        if (! $data['aUser'] = $this->Usersmodel->getOne($iId)) {
            redirect('admin/users_showAll');
        }
        
        # If form is submitted
        if ($this->input->post('bProceed')) {
            # set rules for form validation class
            $aFormConfig = array(
                array(
                    'field' => 'user_name',
                    'label' => 'First name',
                    'rules' => 'trim|xss_clean|required'
                ),
                array(
                    'field' => 'user_surname',
                    'label' => 'Surname',
                    'rules' => 'trim|xss_clean'
                ),array(
                    'field' => 'login',
                    'label' => 'Login',
                    'rules' => 'trim|xss_clean|required'
                ),array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'trim|xss_clean|required'
                ),array(
                    'field' => 'email1',
                    'label' => 'E-mail',
                    'rules' => 'trim|xss_clean|required'
                ),array(
                    'field' => 'email2',
                    'label' => 'E-mail 2',
                    'rules' => 'trim|xss_clean'
                ),array(
                    'field' => 'street',
                    'label' => 'Street',
                    'rules' => 'trim|xss_clean'
                ),array(
                    'field' => 'post_code',
                    'label' => 'Postcode',
                    'rules' => 'trim|xss_clean'
                ),array(
                    'field' => 'city',
                    'label' => 'City',
                    'rules' => 'trim|xss_clean'
                ),array(
                    'field' => 'phone_number',
                    'label' => 'Phone',
                    'rules' => 'trim|xss_clean'
                ),array(
                    'field' => 'user_type',
                    'label' => 'user_type',
                    'rules' => 'trim|xss_clean|required'
                )
            );

            $this->form_validation->set_rules($aFormConfig);
            
            if ($this->form_validation->run()) {
                # get all data from form fields
                $aData = array();
                foreach ($data['aUser'] as $key => $val) {
                    $aData[$key] = $this->input->post($key);
                }
                # update user data
                $this->Usersmodel->setData($aData);
                
                $data['sMsg'] = 'Changes saved';
            }
        }
        
        $this->load->view('templates/main', $data);
        
    }
    
    public function users_delete($iId)
    {
        $data['mainContent'] = 'admin/index';
        $data['viewContent'] = 'admin/users/delete';
        
        $data['aMenu'] = $this->aMenu;
        
        if ($this->input->post('id')) {
            
            $this->Usersmodel->deleteUser($iId);
            $data['sMsg'] = 'User deleted';
            
        } else {
            $data['sMsg'] = 'Error';
        }
        
        $this->load->view('templates/main', $data);
    }
    
    public function songs_showAll()
    {
        
        
        
    }
    
    public function artists_showAll()
    {
        
        
        
    }
    
}

?>
