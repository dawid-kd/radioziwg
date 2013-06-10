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
                $this->load->model('Competition_model');///
                $this->load->model('Answer_model');///
                $this->load->model('Song_vote_model');
                $this->load->model('User_vote_model');
                $this->load->model('Vote_model');
                $this->load->model('Musicmodel');
                
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
                        redirect(render_url('main',''));
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
						redirect(render_url('main',''));
					}
					else
					{
						redirect(render_url('main',''));
					}
				}
				else
				{
					$this->session->set_flashdata('error', $this->Usersmodel->getAlert());
					redirect(render_url('main',''));
				}
			}

			//$this->data['title'] = 'Logowanie';
			//$this->data['content'] = $this->load->view('front/users/login', $this->data, TRUE);
			//$this->load->view('login', $this->data);
                        redirect(render_url('main',''));
		}
	
}

public function logout()
	{
		$this->Usersmodel->logout();
                redirect(render_url('main',''));
	}


public function register()
	{
		if ($this->Usersmodel->isLogged())
		{
			$this->session->set_flashdata('info', 'Jesteś aktualnie zalogowany. Wyloguj się, aby założyć nowe konto.');
			redirect(render_url('main',''));
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

				redirect(render_url('main',''));
			}
		}

		//$this->data['recaptcha'] = $this->recaptcha->get_html('pl');
		//$this->data['title'] = 'Rejestracja';
		//$this->data['content'] = $this->load->view('front/users/register', $this->data, TRUE);
		//$this->load->view('front/wrapper', $this->data);
                $this->data['content']='register';
                $this->data['radio']=isset($_GET['radio'])?$_GET['radio']:'none';
                $this->load->view('wrapper', $this->data);
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
				$this->session->set_flashdata('info', 'Błędne hasło');
                                redirect(render_url('main',''));
			}
			else
			{
				$args1 = array(
					'id' => $this->Usersmodel->getId(),
					'email1' => $this->input->post('email'),
				);
				$this->Usersmodel->setData($args1);

				$this->session->set_flashdata('info', 'Adres e-mail został zmieniony');
				redirect(render_url('main',''));
			}
		}

		//$this->data['title'] = 'Zmiana adresu e-mail';
		//$this->data['content'] = $this->load->view('front/users/changeEmail', $this->data, TRUE);
		//$this->load->view('front/wrapper', $this->data);
                $this->data['content']='changemail';
                $this->data['radio']=isset($_GET['radio'])?$_GET['radio']:'none';
                $this->load->view('wrapper', $this->data);
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
				redirect(render_url('main',''));
			}
		}

		//$this->data['title'] = 'Zmiana adresu e-mail';
		//$this->data['content'] = $this->load->view('front/users/changeEmail', $this->data, TRUE);
		//$this->load->view('front/wrapper', $this->data);
                $this->data['content']='changepassword';
                $this->data['radio']=isset($_GET['radio'])?$_GET['radio']:'none';
                $this->load->view('wrapper', $this->data);
                }
                else
                {
                    redirect(render_url('main',''));
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
                                    $this->session->set_flashdata('info', 'Blad wyslania');
    //show_error($this->email->print_debugger());
                                else
                                    $this->session->set_flashdata('info', 'Haslo zostalo wyslane'); 
				//$this->session->set_flashdata('info', 'Haslo zostalo zmienione');
				redirect(render_url('main',''));
			}
                        
		}

		//$this->data['title'] = 'Zmiana adresu e-mail';
		//$this->data['content'] = $this->load->view('front/users/changeEmail', $this->data, TRUE);
		//$this->load->view('front/wrapper', $this->data);
                $this->data['content']='forgotpassword';
                $this->data['radio']=isset($_GET['radio'])?$_GET['radio']:'none';
                $this->load->view('wrapper', $this->data);
                
	}

	public function show_competitions(){
		$data['ACompetitions'] = $this -> Competition_model -> getActiveCompetition();
		$data['content'] = 'competition';
		$data['radio'] = isset($_GET['radio']) ? $_GET['radio'] : 'none';
		$this -> load -> view('wrapper', $data);
	}

	public function competition_answere($competition_id){
		$user_id = $this->Usersmodel->getId();
		$data['Competition'] = $this -> Competition_model -> getOneCompetition($competition_id);
		$data['content'] = 'competitionanswer';
		$data['radio'] = isset($_GET['radio']) ? $_GET['radio'] : 'none';
		if($this -> Answer_model -> checkAnswer($user_id, $competition_id)){
			$data['enable'] = FALSE;
			$data['answer'] = $this -> Answer_model -> getAnswer($user_id, $competition_id);
		}else{
			$data['enable'] = TRUE;
		}
		
		$this -> session -> set_flashdata('competition_id', $competition_id);
		if ($this -> input -> post('bProceed')) {
			$aFormConfig = array(array('field' => 'answer', 'label' => 'Twoja odpowiedź', 'rules' => 'trim|xss_clean'),);
			$this -> form_validation -> set_rules($aFormConfig);
			if ($this -> form_validation -> run()) {
				$aData = array('answer' => $this -> input -> post('answer'), 
								'id_user' => $user_id, 
								'id_competition' => $this -> session -> flashdata('competition_id'));
				$this -> Answer_model -> addAnswer($aData);
				redirect(base_url() . 'users/competition_answere/'.$this -> session -> flashdata('competition_id'));
			}
		}
		$this -> load -> view('wrapper', $data);
	}
        
        public function show_toplist()
        {
            $data['content']    = 'musiclist';
            $data['radio']      = isset($_GET['radio'])?$_GET['radio']:'none';

            $data['aList'] = $this->Song_vote_model->getTopList();

            $this->load->view('wrapper', $data);
        }
        
        public function show_all_votes() {
		$data['Votes'] = $this -> Vote_model -> getVotes();
		$data['content'] = 'voteslist_user';
		$data['radio'] = isset($_GET['radio']) ? $_GET['radio'] : 'none';
		$this -> load -> view('wrapper', $data);
	}

	public function show_vote_songs($id) {
		$data['content'] = 'votesongslist_user';
		$data['radio'] = isset($_GET['radio']) ? $_GET['radio'] : 'none';
		$data['Vote'] = $this -> Vote_model -> getVote($id);
		$data['Songs'] = $this -> Song_vote_model -> getSongs($id);

		$data['SongsNames'] = $this -> Musicmodel -> getIdAndSongsNames('song');
                
                # sprawdź czy użytkownik głosował już w danym głosowaniu
                $data['aUserVote'] = $this -> User_vote_model -> getUserVote($id, $this->session->userdata('id'));
//                    var_dump($data['aUserVote']);
//                    exit();
		$this -> session -> set_flashdata('id_vote', $id);
                if (isset($_POST['song']))//dodawanie głosów
		{
                    if (empty($data['aUserVote'])) {
                        $dane = array('id_vote' => $id, 
                                    'id_song' => $this -> input -> post('song'),
                                    'id_user' => $this->session->userdata('id'));
                        $this -> User_vote_model -> addUserVote($dane);
                        
                    } elseif (isset($_POST['change'])) {
                        $dane = array('id_vote' => $id, 
                                    'id_song' => $this -> input -> post('song'),
                                    'id_user' => $this->session->userdata('id'));
                        $this -> User_vote_model -> updateUserVote($dane,$data['aUserVote']['id']);
                    }
                    
                    redirect(base_url() . 'users/show_vote_songs/' . $this -> session -> flashdata('id_vote'));
		}
		$this -> load -> view('wrapper', $data);
	}
       
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
