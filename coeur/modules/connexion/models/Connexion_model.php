<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Connexion_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function add_client($data)
    {
        $this->db->insert("app_client", $data);


        return true;
    }

    function verification_client($where)
    {
        $this->db->where($where);
        $email = $this->db->get("app_client");
        $email = $email->result_array();


        return $email;
    }




}
