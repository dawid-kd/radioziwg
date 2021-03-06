<?php

class Usersmodel extends CI_Model
{

    private $alert = '';
    
    private $admin = 0;

    private $userId = 0;

    public function __construct()
    {
        parent::__construct();
    }
    
    public function Emailcheck($email)
    {
        $this->db->select('id');
        $this->db->from('user');
        $this->db->where('email1', $email);

        return ($this->db->count_all_results() > 0) ? TRUE : FALSE;
    }
    
    public function login($login, $pass)
    {
        $this->db->select('id');
        $this->db->from('user');
        $this->db->where('email1', $login);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();

            if ($row['id'] > 0)
            {
                
                    $this->db->select('id, user_name, user_surname, login, user_type');
                    $this->db->from('user');
                    $this->db->where('id', $row['id']);
                    $this->db->where('password', $pass);
                    $query1 = $this->db->get();

                    if ($query1->num_rows() > 0)
                    {
                        $row1 = $query1->row_array();

                        if ($row1['id'] > 0)
                        {
                            if($row1['user_type']=='A'){
                                $isadmin = 1;
                                
                            }else{
                                $isadmin = 0;
                                
                            }
                            $args = array(
                                'id' => $row1['id'],
                                'type' => $row1['user_type'],
                                'username' => $row1['user_name'] . ' ' . $row1['user_surname'],
                                'isAdmin' => $isadmin,
                            );
                            $this->session->set_userdata($args);
                            
                            

                            return TRUE;
                        }
                    
                }
                else
                    {
                        $this->alert = 'Nieprawidłowy login lub hasło';
                    }
                }
                
        }
        else
        {
            $this->alert = 'Podany użytkownik nie istnieje';
        }

        return FALSE;
    }

public function logout()
    {
        $user = array(
            'id' => 0,
            'type' => '',
            'username' => '',
        );
        $this->session->set_userdata($user);
        $this->session->sess_destroy();

        $this->alert = '';
        $this->admin = 0;
        $this->userId = 0;
    }

public function getAlert()
    {
        return $this->alert;
    }
    
 public function isAdmin()
    {
        $this->admin = intval($this->session->userdata('isAdmin'));

        if ($this->admin == 1)
        {
            return 1;
        }
        else
        {
            return 0;
        }

        
    }
  
    public function isLogged()
    {

         if ($this->getId() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }

        
    }

    public function getId()
    {
        if ($this->userId == 0)
        {
            $this->userId = intval($this->session->userdata('id'));
        }

        return $this->userId;
    }
    
        public function getmailId($email)
    {
        $this->db->select('id');
        $this->db->from('user');
        $this->db->where('email1', $email);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
        }

        return $row['id'];
    }
    
    public function setData($args = array())
    {
        $id = isset($args['id']) ? $args['id'] : 0;

        if ($id > 0)
        {
            $this->db->where('id', $id);
            $this->db->update('user', $args);
        }
        else
        {
            $this->db->insert('user', $args);
            $id = $this->db->insert_id();
        }

        return $id;
    }
    
    public function getData($id)
    {
    $this->db->from('user');
    $this->db->where('id', $id);
    $query = $this->db->get();
    $rows = $query->result();
    return empty($rows)?null:$rows[0];
    }
    
    public function getAll()
    {
        $query = $this->db->get('user');
        
        return $query->result_array();
    }
    
    # function like getData(), but returning data as an array
    public function getOne($iId)
    {
        $this->db->from('user');
        $this->db->where('id', $iId);
        $query = $this->db->get();
        
        if ($query->num_rows > 0) {
            return $query->row_array();
        }
        return false;
    }
    
    public function deleteUser($iId)
    {
        $this->db->where('id', $iId);
        $this->db->delete('user');
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
