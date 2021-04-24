<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['portaladmin'] = 'PortalAdminLog/login';
$route['default_controller'] = 'pages/index';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
