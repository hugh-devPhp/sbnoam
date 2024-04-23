<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------------
| This file will contain the settings needed to access your Mongo database.
|
|
| ------------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| ------------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['write_concerns'] Default is 1: acknowledge write operations.  ref(http://php.net/manual/en/mongo.writeconcerns.php)
|	['journal'] Default is TRUE : journal flushed to disk. ref(http://php.net/manual/en/mongo.writeconcerns.php)
|	['read_preference'] Set the read preference for this connection. ref (http://php.net/manual/en/mongoclient.setreadpreference.php)
|	['read_preference_tags'] Set the read preference for this connection.  ref (http://php.net/manual/en/mongoclient.setreadpreference.php)
|
| The $config['mongo_db']['active'] variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
*/

global $ANOTHER_USER, $ANOTHER_PASSWORD, $ANOTHER_DATABASE ,$ANOTHER_PORT,$ANOTHER_HOST ;

$config['another_db']['active'] = 'default';
$config['another_db']['default']['no_auth'] = false;
$config['another_db']['default']['hostname'] = $ANOTHER_HOST;
$config['another_db']['default']['port'] = $ANOTHER_PORT;
$config['another_db']['default']['username'] = $ANOTHER_USER;
$config['another_db']['default']['password'] = $ANOTHER_PASSWORD;
$config['another_db']['default']['database'] = $ANOTHER_DATABASE;
$config['another_db']['default']['db_debug'] = TRUE;
$config['another_db']['default']['return_as'] = 'array';
$config['another_db']['default']['write_concerns'] = (int)1;
$config['another_db']['default']['journal'] = TRUE;
$config['another_db']['default']['read_preference'] = NULL;
$config['another_db']['default']['read_concern'] = 'local'; //'local', 'majority' or 'linearizable'
$config['another_db']['default']['legacy_support'] = NULL;


