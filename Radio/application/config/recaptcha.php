<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------------
  | The reCaptcha server keys and API locations
  | -------------------------------------------------------------------------
  | Obtain your own keys from:
  |
  |	http://www.google.com/recaptcha
  |
 */

$config['recaptcha'] = array(
	'public' => '6LetqMsSAAAAADoijrQNh3fB2qoWmKgQZGpuAtpi',
	'private' => '6LetqMsSAAAAAOrT9I9n6Gknn294zLvnTfgoZ9MU',
	'RECAPTCHA_API_SERVER' => 'http://www.google.com/recaptcha/api',
	'RECAPTCHA_API_SECURE_SERVER' => 'https://www.google.com/recaptcha/api',
	'RECAPTCHA_VERIFY_SERVER' => 'www.google.com',
	'RECAPTCHA_SIGNUP_URL' => 'https://www.google.com/recaptcha/admin/create',
	'theme' => 'white',
);

/* End of file recaptcha.php */
/* Location: ./application/config/recaptcha.php */