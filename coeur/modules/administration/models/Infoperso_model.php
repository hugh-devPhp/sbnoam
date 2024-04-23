<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Infoperso_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function infos_perso(){
        $infos=array();
        $id=$this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('acl_utilisateur');
        $this->db->join('acl_profils','acl_profils.id_profils= acl_utilisateur.profil_user', 'left');
        $this->db->where('id_utilisateur',$id);
        $q = $this->db->get();
        if($q->num_rows()>0){
            $infos = $q->row();
        }
        return $infos;
    }

    ////
    function test_oldpass($id_user, $oldpass){

        $this->db->select('*');
        $this->db->from('acl_utilisateur');
        $this->db->where('id_utilisateur',$id_user);
        $this->db->where('password',md5($oldpass));
        $q = $this->db->get();
        if($q->num_rows()>0) return true;
        else return false;

    }

    ///////////////////////
    function create_nameof_photo($mime){

        $characts = 'abcdefghijklmnopqrstuvwxyz';
        $characts .= '0123456789';
        $code_aleatoire = date('YmdHis');

        for($i=0;$i < 6;$i++)
        {
            $code_aleatoire .= $characts[ rand() % strlen($characts) ];
        }

        return $code_aleatoire.'.'.$mime;

    }


}
