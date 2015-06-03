<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/*
|--------------------------------------------------------------------------
| User defined constants
|--------------------------------------------------------------------------
|
*/

define('BASE_TITLE', "Domino's Pizza");
define('BASIC_RULES', 'required|trim|xss_clean');
define('HOME_ADDR', '3, Jalan 1, Seksyen 9, Bandar Baru Bangi');
define('OFFICE_ADDR', '5B, Jalan 1, Seksyen 9, Bandar Baru Bangi');
define('DOMINO_1', 'No. 40, Jalan Medan PB2B, Seksyen 9, Bandar Baru Bangi');
define('DOMINO_2', 'No. 38, Jalan 2, Seksyen 6, Bandar Baru Bangi');
define('PROD_SERVER', 'http://prototypeone.ap01.aws.af.cm/');


/* End of file constants.php */
/* Location: ./application/config/constants.php */