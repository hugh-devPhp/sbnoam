<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    function add_contact($data)
    {
        $this->db->insert("app_messages", $data);


    }
}
