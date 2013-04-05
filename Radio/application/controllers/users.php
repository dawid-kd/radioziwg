<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * @package wybierampl
 * @copyright Copyright (c) 2012, Global4Net
 * @link http://www.global4net.com/
 *
 * @property CompanySector $CompanySector
 * @property Like $Like
 * @property UserAlbum $UserAlbum
 * @property UserFriend $UserFriend
 * @property UserPhoto $UserPhoto
 */
class Users extends MX_Controller
{
	/**
	 * @var array $data
	 */
	private $data = array();

	public function __construct()
	{
		parent::__construct();
	}
        
	public function login()
	{
		if ($this->User->isLogged())
		{
			$this->session->set_flashdata('info', 'Jesteś aktualnie zalogowany. Wyloguj się, aby zalogować się na inne konto.');
                        redirect();
		}
		else
		{
			$this->form_validation->set_error_delimiters('<div class="error ui-corner-all ui-state-error">', '</div>');
			$this->form_validation->set_rules('email', 'email', 'trim|xss_clean|required|valid_email');
			$this->form_validation->set_rules('pass', 'pass', 'trim|xss_clean|required');

			if ($this->form_validation->run($this))
			{
				$login = $this->input->post('email');
				$password = $this->input->post('pass');

				if ($this->User->login($login, $password))
				{
					$this->session->set_flashdata('info', 'Pomyślnie zalogowano');
					$sessData = $this->session->userdata('request');

					if (isset($sessData['url']))
					{
						redirect($sessData['url']);
					}
					else
					{
						redirect();
					}
				}
				else
				{
					$this->session->set_flashdata('error', $this->User->getAlert());
					redirect('zaloguj');
				}
			}

			$this->data['title'] = 'Logowanie';
			$this->data['content'] = $this->load->view('front/users/login', $this->data, TRUE);
			$this->load->view('front/wrapper', $this->data);
		}
	}

	public function index()
	{
		$this->load->library('pagination');
		$limit = 24;
		$segment = 2;

		$args = array(
			'type' => 'regular',
			'isFeatured' => 1,
			'limit' => 'all',
		);
		$this->data['users_ft'] = $this->User->getData($args);

		$args1 = array(
			'type' => 'regular',
			'isFeatured' => 0,
			'limit' => $limit,
			'offset' => getInt($this->uri->segment($segment)),
		);
		$this->data['users'] = $this->User->getData($args1);
		$this->data['counter'] = $this->User->getCounter();

		$pagConf = array(
			'base_url' => base_url('uzytkownicy'),
			'per_page' => $limit,
			'total_rows' => $this->data['counter'],
			'uri_segment' => $segment,
		);
		$this->pagination->initialize($pagConf);
		$this->data['pagination'] = $this->pagination->create_links();

		$this->data['title'] = 'Użytkownicy';
		$this->data['content'] = $this->load->view('front/users/index', $this->data, TRUE);
		$this->load->view('front/wrapper', $this->data);
	}

	public function logout()
	{
		$this->User->logout();
		redirect();
	}

	public function profile()
	{
		$this->User->isLogged('zaloguj', 'Zaloguj się w celu przejścia do edycji profilu');

		$this->load->model('City');
		$this->load->model('CityRegion');

		$args = array(
			'id' => $this->User->getId(),
		);
		$this->data['user'] = $this->User->getData($args);

		$this->form_validation->set_error_delimiters('<div class="error ui-corner-all ui-state-error">', '</div>');
		$this->form_validation->set_rules('username', 'username', 'trim|xss_clean|required');
		$this->form_validation->set_rules('fname', 'fname', 'trim|xss_clean');
		$this->form_validation->set_rules('lname', 'lname', 'trim|xss_clean');

		if ($this->form_validation->run($this))
		{
			$args1 = array(
				'id' => $this->data['user']->id,
				'username' => $this->input->post('username'),
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'company' => $this->input->post('company'),
				'city' => $this->input->post('city'),
				'phone' => $this->input->post('phone'),
				'aboutMe' => $this->input->post('aboutMe'),
				'interest' => $this->input->post('interest'),
			);
			$id = $this->User->setData($args1);

			if ($_FILES['logoFile']['error'] == 0)
			{
				$upload_dir = UPLOAD_DIR;
				$parts = explode('.', $_FILES['logoFile']['name']);
				$count = count($parts);
				$ext = $parts[$count - 1];
				$fileName = 'user-' . $id . '-logo';
				$fileNameTmp = $fileName . '-tmp';

				$config = array(
					'upload_path' => './' . $upload_dir,
					'allowed_types' => 'jpg|png',
					'file_name' => $fileNameTmp,
				);

				$this->load->library('upload', $config);

//				if ($this->data['editing'])
				{
					$filePath = FCPATH . $upload_dir . $fileName;

					if (file_exists($filePath))
					{
						unlink($filePath);
					}

					$filePath = FCPATH . $upload_dir . $fileName . '-thumb';

					if (file_exists($filePath))
					{
						unlink($filePath);
					}
				}

				if ($this->upload->do_upload('logoFile'))
				{
					$fileData = $this->upload->data();
					$this->load->library('image_lib');

					$new_file_sizes = get_image_size($fileData, 148, 148, 60, 60, TRUE);

					$imageConfig = array(
						'image_library' => 'gd2',
						'source_image' => './' . $upload_dir . $fileNameTmp . $fileData['file_ext'],
						'new_image' => $fileName . $fileData['file_ext'],
						'maintain_ratio' => FALSE,
						'master_dim' => 'width',
						'width' => $new_file_sizes['width'],
						'height' => $new_file_sizes['height'],
						'quality' => '100%',
					);
					$this->image_lib->initialize($imageConfig);
					$this->image_lib->resize();

					$imageConfig1 = array(
						'image_library' => 'gd2',
						'source_image' => './' . $upload_dir . $fileNameTmp . $fileData['file_ext'],
						'create_thumb' => TRUE,
						'thumb_marker' => '-thumb',
						'maintain_ratio' => FALSE,
						'master_dim' => 'width',
						'width' => $new_file_sizes['width_t'],
						'height' => $new_file_sizes['height_t'],
						'quality' => '100%',
					);
					$this->image_lib->initialize($imageConfig1);
					$this->image_lib->resize();

					unlink(FCPATH . $upload_dir . $fileNameTmp . $fileData['file_ext']);

					$args2 = array(
						'id' => $id,
						'logoFile' => $fileName . $fileData['file_ext'],
					);
					$id = $this->User->setData($args2);
				}
			}

			$this->session->set_flashdata('info', 'Profil został pomyślnie zmieniony');
			redirect($this->data['user']->url);
		}

		$this->data['cities'] = $this->City->getToSelect();
		$this->data['regions'] = $this->CityRegion->getToSelect();
		$this->data['title'] = 'Mój profil';
		$this->data['content'] = $this->load->view('front/users/profile', $this->data, TRUE);
		$this->load->view('front/wrapper', $this->data);
	}

	public function register()
	{
		if ($this->User->isLogged())
		{
			$this->session->set_flashdata('info', 'Jesteś aktualnie zalogowany. Wyloguj się, aby założyć nowe konto.');
			redirect();
		}
		else
		{
			$this->lang->load('recaptcha');
			$this->load->library('recaptcha');

			$this->form_validation->set_error_delimiters('<div class="error ui-corner-all ui-state-error">', '</div>');
			$this->form_validation->set_rules('type', 'type', 'trim|xss_clean');
			$this->form_validation->set_rules('email', 'email', 'trim|xss_clean|required|valid_email|callback_checkEmailUnique');
			$this->form_validation->set_rules('pass', 'pass', 'trim|xss_clean|required');
			$this->form_validation->set_rules('pass1', 'pass1', 'trim|xss_clean|required|matches[pass]');
			$this->form_validation->set_rules('username', 'username', 'trim|xss_clean|required');
			$this->form_validation->set_rules('fname', 'fname', 'trim|xss_clean');
			$this->form_validation->set_rules('lname', 'lname', 'trim|xss_clean');
			$this->form_validation->set_rules('rulesConfirm', 'rulesConfirm', 'trim|xss_clean|callback_checkRules');
			$this->form_validation->set_rules('recaptcha_response_field', 'captcha', 'required|callback_checkCaptcha');

			if ($this->form_validation->run($this))
			{
				$args = array(
					'type' => $this->input->post('type'),
					'email' => $this->input->post('email'),
					'pass' => md5($this->input->post('pass')),
					'username' => $this->input->post('username'),
					'fname' => $this->input->post('fname'),
					'lname' => $this->input->post('lname'),
					'city' => 1090, // TODO do zmiany, do dodania select z miastami
					'isActive' => 1,
				);
				$this->User->setData($args);

				$this->User->login($this->input->post('email'), $this->input->post('pass'));

				switch ($args['type'])
				{
					case 'company':
						$this->session->set_flashdata('info', 'Konto zostało utworzone. Wypełnij dane firmy.');
						redirect('firmy/dodaj');
						break;
					case 'politician':
						$this->session->set_flashdata('info', 'Konto zostało utworzone. Wypełnij dane polityka.');
						redirect('politycy/dodaj');
						break;
					case 'institution':
						$this->session->set_flashdata('info', 'Konto zostało utworzone. Wypełnij dane instytucji.');
						redirect('instytucje/dodaj');
						break;
					default:
						$this->session->set_flashdata('info', 'Konto zostało utworzone');
						redirect();
						break;
				}
			}
		}

		$this->data['recaptcha'] = $this->recaptcha->get_html('pl');
		$this->data['title'] = 'Rejestracja';
		$this->data['content'] = $this->load->view('front/users/register', $this->data, TRUE);
		$this->load->view('front/wrapper', $this->data);
	}
        
	public function sendPass()
	{
		$this->form_validation->set_error_delimiters('<div class="error ui-corner-all ui-state-error">', '</div>');
		$this->form_validation->set_rules('email', 'email', 'trim|xss_clean|required|valid_email|callback_checkEmailExist');

		if ($this->form_validation->run($this))
		{
			$newPass = substr(md5(date('YmdHis')), 0, 5);

			$args = array(
				'email' => $this->input->post('email'),
				'pass' => md5($newPass),
			);
			$this->User->setData($args);

			$this->load->library('Email');

			$this->email->clear(TRUE);
			$this->email->to($this->input->post('email'));
			$this->email->from($this->config->item('email_noreply'), $this->config->item('app_title'));
			$this->email->subject('nowe hasło w serwisie ' . $this->config->item('app_title'));
			$this->email->message('nowe hasło to: ' . $newPass);

			if ($this->email->send())
			{
				$this->session->set_flashdata('info', 'Nowe hasło zostało wysłane na podany adres e-mail');
				redirect();
			}
		}

		$this->data['info'] = 'W celu wygenerowania nowego hasła podaj adres e-mail, przypisany do konta, na który zostanie wysłane nowe hasło';
		$this->data['title'] = 'Wysyłka hasła';
		$this->data['content'] = $this->load->view('front/users/sendPass', $this->data, TRUE);
		$this->load->view('front/wrapper', $this->data);
	}

	public function changeEmail()
	{
		$this->User->isLogged('zaloguj');

		$args = array(
			'id' => $this->User->getId(),
		);
		$user = $this->User->getData($args);

		$this->data['info'] = 'Obecny adres e-mail: <b>' . $user->email . '</b>';

		$this->form_validation->set_error_delimiters('<div class="error ui-corner-all ui-state-error">', '</div>');
		$this->form_validation->set_rules('emailNew', 'emailNew', 'trim|xss_clean|required|valid_email');
		$this->form_validation->set_rules('userPass', 'userPass', 'trim|xss_clean|required');

		if ($this->form_validation->run($this))
		{
			if ($user->pass != md5($this->input->post('userPass')))
			{
				$this->data['error'] = 'Wprowadzone hasło nie zgadza się z hasłem użytkownika';
			}
			else
			{
				$args1 = array(
					'id' => $this->User->getId(),
					'email' => $this->input->post('emailNew'),
				);
				$this->User->setData($args1);

				$this->session->set_flashdata('info', 'Adres e-mail został zmieniony');
				redirect('profil');
			}
		}

		$this->data['title'] = 'Zmiana adresu e-mail';
		$this->data['content'] = $this->load->view('front/users/changeEmail', $this->data, TRUE);
		$this->load->view('front/wrapper', $this->data);
	}

	public function changePassword()
	{
		$this->User->isLogged('zaloguj');

		$args = array(
			'id' => $this->User->getId(),
		);
		$user = $this->User->getData($args);

		$this->form_validation->set_error_delimiters('<div class="error ui-corner-all ui-state-error">', '</div>');
		$this->form_validation->set_rules('passOld', 'passOld', 'trim|xss_clean|required');
		$this->form_validation->set_rules('passNew1', 'passNew1', 'trim|xss_clean|required');
		$this->form_validation->set_rules('passNew2', 'passNew2', 'trim|xss_clean|required|matches[passNew1]');

		if ($this->form_validation->run($this))
		{
			if ($user->pass != md5($this->input->post('passOld')))
			{
				$this->data['error'] = 'Wprowadzone hasło nie zgadza się z hasłem użytkownika';
			}
			else
			{
				$args = array(
					'id' => $this->User->getId(),
					'pass' => md5($this->input->post('passNew1')),
				);
				$this->User->setData($args);

				$this->session->set_flashdata('info', 'Hasło zostało zmienione');
				redirect('profil');
			}
		}

		$this->data['title'] = 'Zmiana hasła';
		$this->data['content'] = $this->load->view('front/users/changePassword', $this->data, TRUE);
		$this->load->view('front/wrapper', $this->data);
	}

	public function checkCaptcha($val)
	{
		if (!$this->recaptcha->check_answer($this->input->ip_address(), $this->input->post('recaptcha_challenge_field'), $val))
		{
			$this->form_validation->set_message('checkCaptcha', 'Wprowadzony kod jest nieprawidłowy');

			return FALSE;
		}

		return TRUE;
	}

	public function checkEmailExist($val)
	{
		if (!$this->User->checkEmail($val))
		{
			$this->form_validation->set_message('checkEmailExist', 'Konto o podanym adresie e-mail nie istnieje');

			return FALSE;
		}

		return TRUE;
	}

	public function checkEmailUnique($val)
	{
		if ($this->User->checkEmail($val))
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
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */