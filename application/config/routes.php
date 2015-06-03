<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "main";
$route['404_override'] = '';

// surveyors
$route['scenario-one'] = 'survey/hijack_one';
$route['scenario-two'] = 'survey/hijack_two';
$route['begin-modular'] = 'data/survey_option/modular';
$route['begin-longform'] = 'data/survey_option/longform';
$route['survey-end'] = 'survey/survey_four';

// misc
$route['modular'] = 'dominos';
$route['modular/(:any)'] = 'dominos/$1';

// auth
$route['signin'] = 'dominos/login';
$route['forgot-password'] = 'dominos/forgot_pass';
$route['register'] = 'dominos/registration';
$route['signout'] = 'data/signout';

// user
$route['profile/(:any)'] = 'dominos/profile';

// preview
$route['begin-order'] = 'dominos/deltake';
$route['preview-menu'] = 'dominos/preview_menu';
$route['promotion'] = 'meal';

// menu
$route['menu'] = 'dominos/select_menu';
$route['menu/alacarte'] = 'alacarte';
$route['menu/alacarte/pizza'] = 'alacarte';
$route['menu/alacarte/pizza/(:any)'] = 'alacarte/index/$1';
$route['menu/alacarte/(:any)'] = 'alacarte/$1';
$route['menu/meal'] = 'meal';
$route['menu/meal/(:any)'] = 'meal/index/$1';
$route['menu/coupon'] = 'coupon';
$route['menu/coupon/(:any)'] = 'coupon/get_coupon/$1';
$route['menu/express-card'] = 'coupon/express_card';
$route['stores'] = 'dominos/stores';

// finish
$route['my-cart'] = 'dominos/my_cart';
$route['confirmation'] = 'dominos/confirmation';
$route['gps-tracker'] = 'dominos/gps_tracker';


/* End of file routes.php */
/* Location: ./application/config/routes.php */