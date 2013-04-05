<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  | example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  | http://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There area two reserved routes:
  |
  | $route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  | $route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router what URI segments to use if those provided
  | in the URL cannot be matched to a valid route.
  |
 */

$route['default_controller'] = 'main';
$route['404_override'] = 'main/pageMissing';
$route['offline'] = 'main/offline';

$route['search'] = 'search';
$route['contact'] = 'main/contact';
$route['rules'] = 'main/rules';
$route['privacy'] = 'main/privacy';
$route['publicity'] = 'main/publicity';

$route['logout'] = 'users/logout';
$route['login'] = 'users/login';
$route['register'] = 'users/register';
$route['send-pass'] = 'users/sendPass';
$route['profile'] = 'users/profile';
$route['profile/change-email'] = 'users/changeEmail';
$route['profile/change-password'] = 'users/changePassword';
$route['users(/:num)?'] = 'users';


// admin
$route['admin'] = 'admin/main';
$route['admin/logout'] = 'admin/main/logout';
$route['admin/settings'] = 'admin/main/settings';

$route['admin/users(/:num)?'] = 'admin/users';
$route['admin/users/add'] = 'admin/users/addEdit';
$route['admin/users/(:num)/edit'] = 'admin/users/addEdit/$1';
$route['admin/users/(:num)/show'] = 'admin/users/show/$1';
$route['admin/users/(:num)/delete'] = 'admin/users/delete/$1';
$route['admin/users/(:num)/unlock'] = 'admin/users/unlock/$1';
$route['admin/users/newsletter/:any'] = 'admin/users/newsletter';

/* End of file routes.php */
/* Location: ./application/config/routes.php */