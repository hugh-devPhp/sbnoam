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

global $DOUBLE_USER, $DOUBLE_PASSWORD, $DOUBLE_DATABASE ,$DOUBLE_PORT,$DOUBLE_HOST ;

$config['double_db']['active'] = 'default';
$config['double_db']['default']['no_auth'] = false;
$config['double_db']['default']['hostname'] = $DOUBLE_HOST;
$config['double_db']['default']['port'] = $DOUBLE_PORT;
$config['double_db']['default']['username'] = $DOUBLE_USER;
$config['double_db']['default']['password'] = $DOUBLE_PASSWORD;
$config['double_db']['default']['database'] = $DOUBLE_DATABASE;
$config['double_db']['default']['db_debug'] = TRUE;
$config['double_db']['default']['return_as'] = 'array';
$config['double_db']['default']['write_concerns'] = (int)1;
$config['double_db']['default']['journal'] = TRUE;
$config['double_db']['default']['read_preference'] = 'primary';
$config['double_db']['default']['read_concern'] = 'local'; //'local', 'majority' or 'linearizable'
$config['double_db']['default']['legacy_support'] = NULL;

