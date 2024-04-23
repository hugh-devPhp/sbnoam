<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configvehicule_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function liste_users(){

        $respo_role=$this->session->userdata('respo_role');
        $this->db->select('*');
        $this->db->from('acl_utilisateur');
        $this->db->join('acl_profils','acl_profils.id_profils= acl_utilisateur.profil_user', 'left');
        if($respo_role<1) $this->db->where('respo_role', 0);
        //$this->db->where('code_profils !=', "client");
        $this->db->order_by('nom_complet','ASC');
        $q = $this->db->get();
        return $q->result();
    }
    ///////////////
    function add_marque($data){
        $this->db->insert('app_marque',$data);
        return true;
    }

    function get_marque($where=null){
        if(is_null($where)){
            $marque = $this->db->order_by("code_marque","ASC")->get('app_marque');

            return $marque->result_array();

        }else{
            $this->db->where($where);
            $marque = $this->db->get('app_marque');

            return $marque->row_array();
        }

    }
///////////////////
    function update_marque($id, $data){
        $this->db->where('id_marque',$id);
        $this->db->update('app_marque',$data);
        return true;

    }
    /////////////////
    function delete_marque($id){
        $this->db->where('id_marque', $id);
        $this->db->delete('app_marque');
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
    function get_model_one($where=null){
        if(is_null($where)){
            $model = $this->db->get('app_model');

            return $model->result_array();

        }else{
            $this->db->where($where);
            $model = $this->db->get('app_model');

            return $model->row_array();
        }

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

    function liste_model($id_marque){
        $this->db->where(array("marque_id"=>$id_marque));
        $model = $this->db->get('app_model');

        return $model->result_array();

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
