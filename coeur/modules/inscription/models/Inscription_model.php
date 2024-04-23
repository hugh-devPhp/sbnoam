<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inscription_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function add_client($data)
    {
        $this->db->insert("app_client", $data);


        return true;
    }

    function verification_email($email)
    {
        $this->db->where("email_client", $email);
        $email = $this->db->get("app_client");
        $email = $email->result_array();


        return $email;
    }




}
