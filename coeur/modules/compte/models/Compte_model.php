<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Compte_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function add_client($data)
    {
        $this->db->insert("app_client", $data);


        return true;
    }

    function get_reservation()
    {
        $id_client = $this->session->userdata('id_client');
        $this->db->where(array("id_client"=>$id_client));
        $this->db->from("app_reservation");
        $this->db->order_by('id_reserv','DESC');
        $this->db->join('app_automobile', 'app_automobile.id_auto = app_reservation.id_vehicule');
        $mes_reservations = $this->db->get();


        return $mes_reservations->result_array();
    }

    function verification_client($where)
    {
        $this->db->where($where);
        $client = $this->db->get("app_client");
        $client = $client->result_array();


        return $client;
    }


    function update_client($id, $data){
        $this->db->where('id_client',$id);
        $this->db->update('app_client',$data);
        return true;

    }



}
