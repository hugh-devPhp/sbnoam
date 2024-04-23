<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Automobile_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function liste_vehicule(){

        $this->db->select('*');
        $this->db->from('app_automobile');
        $this->db->join('app_marque','app_marque.id_marque= app_automobile.marque_id', 'left');
        $this->db->join('app_model','app_model.id_model= app_automobile.model_id', 'left');
        //$this->db->where('code_profils !=', "client");
        $this->db->order_by('id_auto','DESC');
        $q = $this->db->get();
        return $q->result_array();
    }
    ///////////////
    function add_vehicule($data){
        $this->db->insert('app_automobile',$data);
        $id = $this->db->insert_id();
        return $id;
    }

    function add_image_vehicule($data){

        $result = $this->db->insert_batch('app_img_automobile', $data);

        if($result == ''){

            return false;

        }else{

            return true;

        }
    }

    function get_vehicule($id_auto){

        $this->db->select('*');
        $this->db->where(array("id_auto"=>$id_auto));
        $this->db->from('app_automobile');
        $this->db->join('app_marque','app_marque.id_marque= app_automobile.marque_id', 'left');
        $this->db->join('app_model','app_model.id_model= app_automobile.model_id', 'left');
        $this->db->join('app_moteur','app_moteur.id_moteur= app_automobile.moteur_id', 'left');
        $auto = $this->db->get();
        $auto = $auto->row_array();
        $this->db->select('*');
        $this->db->where(array("auto_id"=>$id_auto));
        $imgs = $this->db->get("app_img_automobile");

        $auto['images'] = $imgs->result_array();
        return $auto;

    }
///////////////////
    function update_marque($id, $data){
        $this->db->where('id_marque',$id);
        $this->db->update('app_marque',$data);
        return true;

    }

    function update_vehicule($id, $data){
        $this->db->where('id_auto',$id);
        $this->db->update('app_automobile',$data);
        return true;

    }
    /////////////////
    function delete_vehicule($id){
        $this->db->where('id_auto', $id);
        $this->db->delete('app_automobile');
        $this->db->where(array("auto_id"=>$id))->delete('app_img_automobile');
        return true;
    }

    function add_model($data){
        $this->db->insert_batch('app_model', $data);
        return true;
    }

    function get_model($where=null){
        if(is_null($where)){
            $this->db->order_by("code_model","ASC");
            $this->db->from('app_model');
            $this->db->join('app_marque', 'app_model.marque_id = app_marque.id_marque', 'inner');
            $marque = $this->db->get();
            return $marque->result_array();

        }else{
            $this->db->where($where);
            $marque = $this->db->get('app_marque');

            return $marque->row_array();
        }

    }

    function get_image($id){
        $this->db->where('auto_id', $id);
        $images = $this->db->get('app_img_automobile');
        return $images->result_array();
    }

    function delete_image($id_image)
    {
        $this->db->where(array("id_img"=>$id_image))->delete('app_img_automobile');
        return true;
    }

    function delete_model($id){
        $this->db->where('id_model', $id);
        $this->db->delete('app_model');
        return true;
    }

    function update_model($id, $data){
        $this->db->where('id_model',$id);
        $this->db->update('app_model',$data);
        return true;

    }

    function add_moteur($data){
        $this->db->insert('app_moteur', $data);
        return true;
    }

    function get_moteur($where=null){
        if(is_null($where)){
            $moteur = $this->db->order_by("code_moteur","ASC")->get('app_moteur');

            return $moteur->result_array();

        }else{
            $this->db->where($where);
            $moteur = $this->db->get('app_moteur');

            return $moteur->row_array();
        }

    }
///////////////////
    function update_moteur($id, $data){
        $this->db->where('id_moteur',$id);
        $this->db->update('app_moteur',$data);
        return true;

    }
    /////////////////
    function delete_moteur($id){
        $this->db->where('id_moteur', $id);
        $this->db->delete('app_moteur');
        return true;
    }

    function add_couleur($data){
        $this->db->insert('app_couleur', $data);
        return true;
    }

    function get_couleur($where=null){
        if(is_null($where)){
            $couleur = $this->db->order_by("code_couleur","ASC")->get('app_couleur');

            return $couleur->result_array();

        }else{
            $this->db->where($where);
            $couleur = $this->db->get('app_couleur');

            return $couleur->row_array();
        }

    }
///////////////////
    function update_couleur($id, $data){
        $this->db->where('id_couleur',$id);
        $this->db->update('app_couleur',$data);
        return true;

    }
    /////////////////
    function delete_couleur($id){
        $this->db->where('id_couleur', $id);
        $this->db->delete('app_couleur');
        return true;
    }


}
