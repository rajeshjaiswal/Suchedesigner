<?php
// Define path to application directory
/*defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . './application'));
*/
/**
 * timezone settings.
 */
date_default_timezone_set('Asia/Calcutta');
if(substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();

defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(getcwd() . '/application'));


// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));
	
// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
))); 


/**
 * Retriving current working directory to set base dir
 */
$ipos = strpos(strrev(getcwd()), "/");
if($ipos === FALSE)
	$ipos = strpos(strrev(getcwd()), "\\");
$current_working_directory = substr(getcwd(), -1*$ipos);
if($_SERVER['HTTP_HOST'] == 'localhost')
{
	define('BASE_DIR', "/$current_working_directory/");
	define('CAPTCHA', "..".BASE_DIR);
}	
else
{
	define('BASE_DIR',"/development/web/suchedesigner/");
	define('CAPTCHA', "");
}	

define('PUBLIC_DIR', BASE_DIR."public/");
define('CAPTCHA_DIR', CAPTCHA."public/");






/*echo realpath(dirname(__FILE__));
echo "<br>".getcwd();
echo "<br>APPLICATION_PATH = ".APPLICATION_PATH;
echo "<br>BASE_DIR = ".BASE_DIR;
echo "<br>PUBLIC_DIR = ".PUBLIC_DIR;

die();
*/
/** 
 *Frequently Used Common functions
 */
require_once 'MyLib/functions.php';


/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();