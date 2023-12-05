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

$route['dashboard'] = 'admin/dashboard';
$route['admin'] = 'user/login';

$route['add_user'] = 'user/add_user';
$route['user_list'] = 'user/users_list';
$route['delete_user'] = 'user/delete_user';
$route['mon_profil'] = 'user/profil';
$route['edit_user/(:num)'] = 'user/edit_user/$1';


$route['demandes'] = 'admin/demand';
$route['demandes_val'] = 'admin/demand_val';
$route['demandes_en_attente'] = 'admin/demand_wait';

$route['award_categories'] = 'admin/award_cat';
$route['delete_award_cat'] = 'admin/delete_award_cat';

$route['award_laureats'] = 'admin/award_laureate';
$route['add_laureat'] = 'admin/add_laureate';
$route['update_laureates'] = 'admin/update_laureate';
$route['edit_laureates/(:num)'] = 'admin/update_laureate/$1';