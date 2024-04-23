<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| configuration d'Ecolemedia by Hermann N'djomon  31/07/2017

|--------------------------------------------------------------------------
|

*/



global $MONGO_DATABASE;

global $MONGO_OLD_DATABASE;
global $PORT;
global $MONGO_USER;
global $MONGO_PASSWORD;
global $MONGO_HOST;
global $FINAPAY_URL;
global $FINAPAY_TOKEN;
global $FINAPAY_SERVICE;

$config['new_database'] = $MONGO_DATABASE;
$config['annee_academique'] = "2023-2024";
$config['next_annee_academique'] = "2024-2025";
$config['prec_annee_academique'] = "2022-2023";
$config['bisprec_annee_academique'] = "2021-2022";
$config['session'] = "2024";
$config['footer'] = "MENA | DSPS | ECOLEMEDIA";
$config['old_database'] = $MONGO_OLD_DATABASE;

$config['port'] = $PORT;
$config['dns'] = "mongodb://$MONGO_HOST:$PORT/$MONGO_DATABASE";
$config['option'] = array('username'=>$MONGO_USER, 'password'=>$MONGO_PASSWORD);


// sms mtn
$config['sms_token']="85x2GKbqTTDLV2dbJrwlF5GvNo9vzvjYb9x";
//$config['sms_token']="";


//covid
$config['plan_b'] = true;

//finapay config
$config['finapay_url'] = $FINAPAY_URL;
$config['finapay_token'] = $FINAPAY_TOKEN;
$config['finapay_service'] = $FINAPAY_SERVICE;


$config['lot_bulletin'] = 15;





