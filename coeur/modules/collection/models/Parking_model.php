<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Parking_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function add_reservation($data){
        $this->db->insert('app_reservation', $data);
        return true;
    }

    function liste_vehicule($deb, $page, $type=null, $id_marque=null, $transmission=null){


        $decalage = 0;
        if(!is_null($page)){

            $decalage = ($page - 1) * $deb;
        }
        $this->db->select('*');
        $this->db->from('app_automobile');
        if(!empty($type)){
            $type = explode(",", $type);

            $this->db->where_in('en_location', $type);
        }
        if(!empty($id_marque)){
            $id_marque = explode(",", $id_marque);
            $this->db->where_in('marque_id', $id_marque);
        }
        if(!empty($transmission)){
            $transmission = explode(",", $transmission);
            $this->db->where_in('transmission_auto', $transmission);
        }

        $this->db->limit($deb, $decalage);
        $q = $this->db->get();

        return $q->result_array();
    }

    function nb_vehicule($type=null, $id_marque=null, $transmission=null){

        $this->db->select('*');
        $this->db->from('app_automobile');
        if(!empty($type)){
            $type = explode(",", $type);
            $this->db->where_in('en_location', $type);
        }
        if(!empty($id_marque)){
            $id_marque = explode(",", $id_marque);
            $this->db->where_in('marque_id', $id_marque);
        }
        if(!empty($transmission)){
            $transmission = explode(",", $transmission);

            $this->db->where_in('transmission_auto', $transmission);
        }

        $q = $this->db->get();


        return count($q->result_array());
    }


    function get_marque(){
        $this->db->where("activation_marque","1");
        $q = $this->db->get("app_marque");
        return $q->result_array();
    }
}
