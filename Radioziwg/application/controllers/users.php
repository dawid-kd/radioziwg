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
        //$check=$this->Usersmodel->emailcheck('daw2342@wp.pl');
        //echo $this->Usersmodel->login('daw2342@wp.pl','password');
        //echo $check;
        //echo $this->Usersmodel->getAlert();
       // echo $this->session->userdata('username');
        ///echo $this->Usersmodel->isAdmin();
        //$this->Usersmodel->logout();
        echo $this->session->userdata('username');
        echo $this->session->userdata('isAdmin');
        //echo $this->Usersmodel->getmailId('asd@wp.pl');
        //$this->Usersmodel->setData(['id'=>'1','city'=>'leszno']);
        //var_dump($this->Usersmodel->getData('1'));
        //$user = $this->Usersmodel->getData($args);
        //echo $args['password'];
        $args = $this->Usersmodel->getId();
	$user = $this->Usersmodel->getData($args);
        //$this->data['content']='mainpage';
        //$this->load->view('index', $this->data);
        //var_dump($user);
        //echo $user->password;
        }
        
        public function login()
	{
		if ($this->Usersmodel->isLogged())
		{
			$this->session->set_flashdata('info', 'Jesteś aktualnie zalogowany. Wyloguj się, aby zalogować się na inne konto.');
                        //redirect();
		}
		else
		{
                        //$this->form_validation->set_error_delimiters('<div class="error ui-corner-all ui-state-error">', '</div>');
			$this->form_validation->set_rules('email', 'email', 'trim|xss_clean|required|valid_email');
			$this->form_validation->set_rules('password', 'password', 'trim|xss_clean|required');

			if ($this->form_validation->run($this))
			{
				$login = $this->input->post('email');
				$password = $this->input->post('password');

				if ($this->Usersmodel->login($login, $password))
				{
					$this->session->set_flashdata('info', 'Pomyślnie zalogowano');
					$sessData = $this->session->userdata('request');

					if (isset($sessData['url']))
					{
						redirect('users/show');
					}
					else
					{
						redirect('users/show');
					}
				}
				else
				{
					$this->session->set_flashdata('error', $this->Usersmodel->getAlert());
					redirect('users/login');
				}
			}

			//$this->data['title'] = 'Logowanie';
			//$this->data['content'] = $this->load->view('front/users/login', $this->data, TRUE);
			$this->load->view('login', $this->data);
		}
	
}

public function logout()
	{
		$this->Usersmodel->logout();
                redirect('users/login');
	}


public function register()
	{
		if ($this->Usersmodel->isLogged())
		{
			$this->session->set_flashdata('info', 'Jesteś aktualnie zalogowany. Wyloguj się, aby założyć nowe konto.');
			//redirect();
		}
		else
		{
			//$this->lang->load('recaptcha');
			//$this->load->library('recaptcha');

			$this->form_validation->set_rules('login', 'login', 'trim|xss_clean|required');
			$this->form_validation->set_rules('email1', 'email1', 'trim|xss_clean|required|valid_email|callback_checkEmailUnique');
			$this->form_validation->set_rules('password', 'password', 'trim|xss_clean|required');
			$this->form_validation->set_rules('password1', 'password1', 'trim|xss_clean|required|matches[password]');
			$this->form_validation->set_rules('user_name', 'user_name', 'trim|xss_clean');
			$this->form_validation->set_rules('user_surname', 'user_surname', 'trim|xss_clean');
			$this->form_validation->set_rules('rulesConfirm', 'rulesConfirm', 'trim|xss_clean|callback_checkRules');
			//$this->form_validation->set_rules('recaptcha_response_field', 'captcha', 'required|callback_checkCaptcha');

			if ($this->form_validation->run($this))
			{
				$args = array(
					'login' => $this->input->post('login'),
					'email1' => $this->input->post('email1'),
					'password' => $this->input->post('password'),
					'user_name' => $this->input->post('user_name'),
					'user_surname' => $this->input->post('user_surname'),
					'user_type' => 'U',
				);
				$this->Usersmodel->setData($args);

				//$this->User->login($this->input->post('email1'), $this->input->post('password'));

				redirect('users/login');
			}
		}

		//$this->data['recaptcha'] = $this->recaptcha->get_html('pl');
		//$this->data['title'] = 'Rejestracja';
		//$this->data['content'] = $this->load->view('front/users/register', $this->data, TRUE);
		//$this->load->view('front/wrapper', $this->data);
                $this->load->view('register', $this->data);
	}
        public function checkEmailUnique($val)
	{
		if ($this->Usersmodel->Emailcheck($val))
		{
			$this->form_validation->set_message('checkEmailUnique', 'Podany adres e-mail znajduje się już w naszej bazie');

			return FALSE;
		}

		return TRUE;
	}

	public function checkRules($val)
	{
		if (!$val)
		{
			$this->form_validation->set_message('checkRules', 'Musisz zgodzić się z regulaminem');

			return FALSE;
		}

		return TRUE;
	}
        
 public function changemail()
	{
		if($this->Usersmodel->isLogged())
                {
		$args = $this->Usersmodel->getId();
		
		$user = $this->Usersmodel->getData($args);

		//$this->data['info'] = 'Obecny adres e-mail: <b>' . $user->email . '</b>';

		//$this->form_validation->set_error_delimiters('<div class="error ui-corner-all ui-state-error">', '</div>');
		$this->form_validation->set_rules('email', 'email', 'trim|xss_clean|required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'trim|xss_clean|required');

		if ($this->form_validation->run($this))
		{
			if ($user->password != $this->input->post('password'))
			{
				$this->data['error'] = 'Błędne hasło';
			}
			else
			{
				$args1 = array(
					'id' => $this->Usersmodel->getId(),
					'email1' => $this->input->post('email'),
				);
				$this->Usersmodel->setData($args1);

				$this->session->set_flashdata('info', 'Adres e-mail został zmieniony');
				redirect('users/show');
			}
		}

		//$this->data['title'] = 'Zmiana adresu e-mail';
		//$this->data['content'] = $this->load->view('front/users/changeEmail', $this->data, TRUE);
		//$this->load->view('front/wrapper', $this->data);
                 $this->load->view('changemail', $this->data);
                }
                else
                {
                    redirect('users/login');
                }
	}
       


 public function changepassword()
	{
		if($this->Usersmodel->isLogged())
                {
		$args = $this->Usersmodel->getId();
		
		$user = $this->Usersmodel->getData($args);

		//$this->data['info'] = 'Obecny adres e-mail: <b>' . $user->email . '</b>';

		//$this->form_validation->set_error_delimiters('<div class="error ui-corner-all ui-state-error">', '</div>');
		$this->form_validation->set_rules('oldpassword', 'oldpassword', 'trim|xss_clean|required');
		$this->form_validation->set_rules('newpassword', 'newpassword', 'trim|xss_clean|required');
                $this->form_validation->set_rules('newpassword2', 'newpassword2', 'trim|xss_clean|required|matches[newpassword]');
		if ($this->form_validation->run($this))
		{
			if ($user->password != $this->input->post('oldpassword'))
			{
				$this->data['error'] = 'Błędne hasło';
			}
			else
			{
				$args1 = array(
					'id' => $this->Usersmodel->getId(),
					'password' => $this->input->post('newpassword'),
				);
				$this->Usersmodel->setData($args1);

				$this->session->set_flashdata('info', 'Haslo zostalo zmienione');
				redirect('users/show');
			}
		}

		//$this->data['title'] = 'Zmiana adresu e-mail';
		//$this->data['content'] = $this->load->view('front/users/changeEmail', $this->data, TRUE);
		//$this->load->view('front/wrapper', $this->data);
                 $this->load->view('changepassword', $this->data);
                }
                else
                {
                    redirect('users/login');
                }
	}
        
        public function forgotpassword()
	{
		
		$this->form_validation->set_rules('email', 'email', 'trim|xss_clean|required');
		
		if ($this->form_validation->run($this))
		{
                    $email = $this->input->post('email');
                    if ($this->Usersmodel->Emailcheck($email))
				{
                                $this->load->helper('string');
                                $newpassword= random_string('alnum', 16);
				$args1 = array(
					'id' => $this->Usersmodel->getmailId($email),
					'password' => $newpassword,
				);
				$this->Usersmodel->setData($args1);
                                $config = Array(
                                    'protocol' => 'smtp',
                                    'smtp_host' => 'ssl://smtp.googlemail.com',
                                    'smtp_port' => 465,
                                    'smtp_user' => 'ziwgradio@googlemail.com',
                                    'smtp_pass' => 'radioziwg123',
                                    'mailtype'  => 'html', 
                                    'charset'   => 'iso-8859-1'
                                );
                                $this->load->library('email', $config);
                                $this->email->set_newline("\r\n");
                                $this->email->from('ziwgradio@gmail.com', 'ziwg');
                                $this->email->to($email);   
                                $this->email->subject('Password reset');
                                $this->email->message('Twoje tymczasowe hasło to:'. $newpassword. 'Zmien je po zalogowaniu');

// Set to, from, message, etc.

                                if (!$this->email->send())
    show_error($this->email->print_debugger());
else
    echo 'Your e-mail has been sent!'; 
				$this->session->set_flashdata('info', 'Haslo zostalo zmienione');
				redirect('users/show');
			}
                        
		}

		//$this->data['title'] = 'Zmiana adresu e-mail';
		//$this->data['content'] = $this->load->view('front/users/changeEmail', $this->data, TRUE);
		//$this->load->view('front/wrapper', $this->data);
                 $this->load->view('forgotpassword', $this->data);
                
	}
        
       
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
