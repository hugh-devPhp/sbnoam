<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['dashboard'] = 'admin/dashboard';
$route['demandes'] = 'admin/demand';
$route['demandes_val'] = 'admin/demand_val';
$route['demandes_en_attente'] = 'admin/demand_wait';

$route['award_categories'] = 'admin/award_cat';

$route['award_laureats'] = 'admin/award_laureate';
$route['add_laureat'] = 'admin/add_laureate';
$route['update_laureates'] = 'admin/update_laureate';
$route['edit_laureates/(:num)'] = 'admin/update_laureate/$1';
