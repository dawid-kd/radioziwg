<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @package wybierampl
 * @copyright Copyright (c) 2012, Global4Net
 * @link http://www.global4net.com/
 */
class User extends CI_Model
{

    /**
     * @var string $alert
     */
    private $alert = '';

    /**
     * @var int $isAdmin
     */
    private $isAdmin = 0;

    /**
     * @var int $isDev
     */
    private $isDev = 0;

    /**
     * @var int $counter
     */
    private $counter = 0;

    /**
     * @var int $userId
     */
    private $userId = 0;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param object $row
     */
    private function _prepareRow(&$row)
    {
        $row->id = (int) $row->id;
        $row->regDate = new DateTime($row->regDate);
        $row->username = $row->fname . ' ' . $row->lname;
        
        $row->furl = url_title(convert_accented_characters($row->fname . ' ' . $row->lname), 'dash', TRUE);
        $row->url = 'uzytkownicy/' . $row->id . '-' . $row->furl;
    }

    /**
     * @param array $args
     */
    public function changeLockStatus($args = array())
    {
        $this->db->where('id', $args['id']);
        $this->db->update('users', $args);
    }

    /**
     * @param string $email
     * @return bool
     */
    public function checkEmail($email)
    {
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('email', $email);

        return ($this->db->count_all_results() > 0) ? TRUE : FALSE;
    }

    /**
     * @return string
     */
    public function getAlert()
    {
        return $this->alert;
    }

    /**
     * @return int
     */
    public function getCounter()
    {
        return $this->counter;
    }

    /**
     * @return int
     */
    public function getCounterAll()
    {
        $this->db->from('users');
        $this->db->where('isActive', 1);
        $this->db->where('isBlocked', 0);

        return $this->db->count_all_results();
    }

    /**
     * @param array $args
     * @return array
     */
    public function getData($args = array())
    {
        $id = isset($args['id']) ? $args['id'] : 0;
        $order = isset($args['order']) ? $args['order'] : NULL;
        $orderBy = isset($args['orderBy']) ? $args['orderBy'] : 'u.regDate';
        $orderDir = isset($args['orderDir']) ? $args['orderDir'] : 'DESC';
        $limit = isset($args['limit']) ? $args['limit'] : 10;
        $offset = isset($args['offset']) ? $args['offset'] : 0;
        $isAdmin = isset($args['isAdmin']) ? $args['isAdmin'] : NULL;
        $id_in = isset($args['id_in']) ? $args['id_in'] : array();
        $keywords = isset($args['keywords']) ? $args['keywords'] : '';

        $this->db->select('u.*');
        $this->db->from('users AS u');
        $this->db->where('u.isActive', 1);

        $sql_cnt = "SELECT COUNT(1) AS quantity FROM users AS u";
        $sql_cnt .= " WHERE u.isActive = 1";

        if ($id > 0)
        {
            $this->db->where('u.id', $id);
            $sql_cnt .= " AND u.id = " . $id;
        }

        if (!is_null($isAdmin))
        {
            $this->db->where('u.isAdmin', $isAdmin);
            $sql_cnt .= " AND u.isAdmin = " . $isAdmin;
        }

        if (count($id_in) > 0)
        {
            $this->db->where_in('u.id', $id_in);
            $sql_cnt .= " AND u.id IN (" . implode(', ', $id_in) . ")";
        }

        if (!empty($keywords))
        {
            $words = explode(' ', $keywords);
            $fields = array('u.email', 'u.lname', 'u.fname');

            foreach ($words as $word)
            {
                $str = "(";

                foreach ($fields as $key => $field)
                {
                    if ($key > 0)
                    {
                        $str .= " OR";
                    }

                    $str .= " $field LIKE '%$word%'";
                }

                $str .= ")";

                $this->db->where($str);
                $sql_cnt .= " AND " . $str;
            }
        }

        if (is_null($order))
        {
            $this->db->order_by($orderBy, $orderDir);
        }
        else
        {
            foreach ($order as $item)
            {
                $this->db->order_by($item['by'], $item['dir']);
            }
        }

        if ($limit != 'all')
        {
            $this->db->limit($limit, $offset);
        }

        $query = $this->db->get();
        $result = array();

        if ($query->num_rows() == 1 && $id > 0)
        {
            $result = $query->row();
            $this->_prepareRow($result);
        }
        elseif ($query->num_rows() > 0)
        {
            $result = $query->result();

            foreach ($result as $row)
            {
                $this->_prepareRow($row);
            }
        }

        $cnt = $this->db->query($sql_cnt);
        $rowCnt = $cnt->row_array(0);
        $this->counter = intval($rowCnt['quantity']);

        return $result;
    }



    /**
     * @return int
     */
    public function getId()
    {
        if ($this->userId == 0)
        {
            $this->userId = intval($this->session->userdata('id'));
        }

        return $this->userId;
    }

    /**
     * @param mixed $redirect
     * @return mixed
     */
    public function isAdmin($redirect = FALSE)
    {
        $this->isAdmin = intval($this->session->userdata('isAdmin'));

        if ($this->isAdmin == 1)
        {
            return TRUE;
        }
        elseif ($redirect)
        {
            redirect($redirect);
        }

        return FALSE;
    }

    /**
     * @return bool
     */
    public function isDev()
    {
        $this->isDev = intval($this->session->userdata('isDev'));

        if ($this->isDev == 1)
        {
            return TRUE;
        }

        return in_array($_SERVER['REMOTE_ADDR'], $this->config->item('dev_ip'));
    }

    /**
     * @param mixed $redirect
     * @return mixed
     */
    public function isLogged($redirect = FALSE, $message = '')
    {
        if ($this->getId() > 0)
        {
            return TRUE;
        }
        elseif ($redirect)
        {
            $tmpSession['url'] = $_SERVER['REQUEST_URI'];
            $this->session->set_userdata('request', $tmpSession);

            if (!empty($message))
            {
                $this->session->set_flashdata('info', $message);
            }

            redirect($redirect);
        }

        return FALSE;
    }

    /**
     * @param string $login
     * @param string $pass
     * @return bool
     */
    public function login($login, $pass)
    {
        $this->db->select('id, isBlocked');
        $this->db->from('users');
        $this->db->where('isActive', 1);
        $this->db->where('email', $login);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();

            if ($row['id'] > 0)
            {
                if ($row['isBlocked'] == 0)
                {
                    $this->db->select('id, isAdmin, isDev, fname, lname');
                    $this->db->from('users');
                    $this->db->where('id', $row['id']);
                    $this->db->where('pass', md5($pass));
                    $query1 = $this->db->get();

                    if ($query1->num_rows() > 0)
                    {
                        $row1 = $query1->row_array();

                        if ($row1['id'] > 0)
                        {
                            $args = array(
                                'id' => $row1['id'],
                                'isAdmin' => $row1['isAdmin'],
                                'isDev' => $row1['isDev'],
                                'username' => $row1['fname'] . ' ' . $row1['lname'],
                            );
                            $this->session->set_userdata($args);

                            $this->isAdmin = $row1['isAdmin'];
                            $this->isDev = $row1['isDev'];
                            $this->userId = $row1['id'];

                            return TRUE;
                        }
                    }
                    else
                    {
                        $this->alert = 'Nieprawidłowy login lub hasło';
                    }
                }
                else
                {
                    $this->alert = 'Konto użytkownika jest zablokowane';
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
            'isAdmin' => 0,
            'isDev' => 0,
            'username' => '',
        );
        $this->session->set_userdata($user);
        $this->session->sess_destroy();

        $this->alert = '';
        $this->isAdmin = 0;
        $this->isDev = 0;
        $this->userId = 0;
    }

    /**
     * @param array $args
     * @return int
     */
    public function setData($args = array())
    {
        $id = isset($args['id']) ? $args['id'] : 0;
        $email = isset($args['email']) ? $args['email'] : '';

        if ($id > 0)
        {
            $this->db->where('id', $id);
            $this->db->update('users', $args);
        }
        elseif (!empty($email))
        {
            $this->db->where('email', $email);
            $this->db->update('users', $args);
        }
        else
        {
            $this->db->insert('users', $args);
            $id = $this->db->insert_id();
        }

        return $id;
    }

}

/* End of file user.php */
/* Location: ./application/models/user.php */