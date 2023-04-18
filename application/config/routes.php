<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'corporate';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['accueil'] = 'corporate/index';
$route['apropos'] = 'corporate/about';
$route['projets'] = 'corporate/project';
$route['blog'] = 'corporate/blog';
$route['évènements'] = 'corporate/events';
$route['contacts'] = 'corporate/contact';
