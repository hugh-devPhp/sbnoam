<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['admin'] = 'user/login';

$route['add_user'] = 'user/add_user';
$route['user_list'] = 'user/users_list';
$route['delete_user'] = 'user/delete_user';
$route['mon_profil'] = 'user/profil';
$route['edit_user/(:num)'] = 'user/edit_user/$1';
