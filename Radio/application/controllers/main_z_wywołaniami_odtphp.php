<?php

// firephp: $this->firephp->log();

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * @package wybierampl
 * @copyright Copyright (c) 2012, Global4Net
 * @link http://www.global4net.com/
 */
class Main extends MX_Controller
{
	/**
	 * @var array $data
	 */
	private $data = array();

	public function __construct()
	{
		parent::__construct();
	}

	public function contact()
	{
		$this->load->library('recaptcha');
		$this->lang->load('recaptcha');

		$this->form_validation->set_error_delimiters('<div class="error ui-corner-all ui-state-error">', '</div>');
		$this->form_validation->set_rules('name', 'name', 'trim|xss_clean|required');
		$this->form_validation->set_rules('email', 'email', 'trim|xss_clean|required|valid_email');
		$this->form_validation->set_rules('topic', 'topic', 'trim|xss_clean|required');
		$this->form_validation->set_rules('message', 'message', 'trim|xss_clean|required');

		if (!$this->User->isLogged())
		{
			$this->form_validation->set_rules('recaptcha_response_field', 'captcha', 'required|callback_checkCaptcha');
			$this->data['recaptcha'] = $this->recaptcha->get_html('pl');
		}

		if ($this->form_validation->run($this))
		{
			$this->load->library('Email');

			$this->email->clear(TRUE);
			$this->email->to($this->config->item('email_general'));
			$this->email->from($this->input->post('email'), $this->input->post('name'));
			$this->email->subject('[kontakt] ' . $this->input->post('topic'));
			$this->email->message($this->input->post('message'));

			if ($this->email->send())
			{
				$this->session->set_flashdata('info', 'Wiadomość została pomyślnie wysłana');
				redirect();
			}
			else
			{
				$this->session->set_flashdata('error', 'Wystąpił błąd podczas wysyłania. Spróbuj ponownie później.');
				redirect('kontakt');
			}
		}

		$this->data['title'] = 'Kontakt';
		$this->data['content'] = $this->load->view('front/main/contact', $this->data, TRUE);
		$this->load->view('front/wrapper', $this->data);
	}

	public function index()
	{
		$this->data['title'] = 'Strona główna';
		$this->data['content'] = $this->load->view('front/main/index', $this->data, TRUE);
		$this->load->view('front/wrapper', $this->data);
	}

	public function partners()
	{
		$this->data['title'] = 'Partnerzy';
		$this->data['content'] = $this->load->view('front/main/partners', $this->data, TRUE);
		$this->load->view('front/wrapper', $this->data);
	}

	public function rules()
	{
		$this->load->model('AppSettings');

		$args = array(
			'key' => 'rules',
		);
		$setting = $this->AppSettings->getData($args);

		$this->data['title'] = 'Regulamin serwisu';
		$this->data['content'] = $setting->value;
		$this->load->view('front/wrapper', $this->data);
	}
        
        public function aplication()
	{
		$this->load->model('Applicationform_gen');

		
		//$this->load->view('front/wrapper', $this->data);
	

    /* Definition of the populate_RTF() function omitted */

   

    $vars = array('secondname'=> 'Nowak','firstname'=> 'Mariusz','country'=> 'USA','visayes'=> 'X');

    $new_rtf = $this->Applicationform_gen->populate_RTF($vars, "files/aplication.rtf");
    $fr = fopen('files/output.rtf', 'w') ;
    fwrite($fr, $new_rtf);
    fclose($fr);
    
}
public function aplication2()
	{
$this->load->model('Odtphp_gen');
require_once("system/helpers/odtphp/odf.php"); 
$vars = array('title'=> 'Nowak','country'=>'Poland');
$tablevars = array(
    array(    'code' => 'EE12345',
            'title' => 'Matematyka',
            'ects' => '4'
    ),
    array(    'code' => 'EE45345',
            'title' => 'Programowanie',
            'ects' => '3'
    )
          
);
$this->Odtphp_gen->populate_odt($vars,$tablevars, "files/la_pol_2012.odt","lapol.odt");

$vars=null;
$tablevars = array(
    array(    'year' => '1',
        'semester' => '2',
        'polishtitle' => 'Matematyka',
            'englishtitle' => 'Math',
            'type' => 'exercices',
            'grade' => '4,5',
            'ects' => '4'
    ),
    array(    'year' => '1',
        'semester' => '2',
        'polishtitle' => 'Programowanie',
            'englishtitle' => 'Programming',
            'type' => 'lecture',
            'grade' => '5',
            'ects' => '4'
    ),
          
);
$this->Odtphp_gen->populate_odt($vars,$tablevars, "files/transcript_of_records_pol__2012.odt","records.odt");
}
	public function privacy()
	{
		$this->load->model('AppSettings');

		$args = array(
			'key' => 'privacy',
		);
		$setting = $this->AppSettings->getData($args);

		$this->data['title'] = 'Polityka prywatności';
		$this->data['content'] = $setting->value;
		$this->load->view('front/wrapper', $this->data);
	}

	public function publicity()
	{
		$this->load->model('AppSettings');

		$args = array(
			'key' => 'publicity',
		);
		$setting = $this->AppSettings->getData($args);

		$this->data['title'] = 'Reklama';
		$this->data['content'] = $setting->value;
		$this->load->view('front/wrapper', $this->data);
	}

	public function pageMissing()
	{
		$this->data['title'] = 'Strona w budowie';
		$this->data['content'] = $this->load->view('front/main/pageMissing', $this->data, TRUE);
		$this->load->view('front/wrapper', $this->data);
	}

	public function offline()
	{
		if ($this->config->item('app_online'))
		{
			redirect();
		}

		$this->data['title'] = 'Offline Mode';
		$this->data['content'] = $this->load->view('front/main/offline', $this->data, TRUE);
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
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */