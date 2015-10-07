<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller'] = "news";
$route['404_override'] = '';


$route['^ge/(.+)$'] = "$1";
$route['^en/(.+)$'] = "$1";
 

$route['^ge$'] = $route['default_controller'];
$route['^en$'] = $route['default_controller'];

/* End of file routes.php */
/* Location: ./application/config/routes.php */