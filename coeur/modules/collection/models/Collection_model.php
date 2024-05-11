<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Collection_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function add_collection($data){
        $this->db->insert('app_collection', $data);
        return true;
    }

    function get_collection(){

        $this->db->from('app_collection');
        $q = $this->db->get();

        return $q->result_array();
    }

    function nb_collection($type=null, $id_marque=null, $transmission=null){

        $this->db->select('*');
        $this->db->from('app_collection');
        $q = $this->db->get();
        return count($q->result_array());
    }

}
