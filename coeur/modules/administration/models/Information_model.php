<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Information_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_information(){

        $this->db->select('*');
        $q = $this->db->get("cms_infos_generale");
        return $q->result();
    }

    function get_messages(){

        $this->db->select('*');
        $this->db->order_by('message_id','DESC');
        $q = $this->db->get("app_messages");
        return $q->result_array();
    }
    ///////////////
    function add_information($data, $id){

        if(is_null($id) || $id == ""){
            $this->db->insert('cms_infos_generale',$data);
        }else{
            $this->db->where('id_info',$id);
            $this->db->update('cms_infos_generale',$data);
        }

        return true;
    }
///////////////////
    function update_user($id, $data){
        $this->db->where('id_utilisateur',$id);
        $this->db->update('acl_utilisateur',$data);
        return true;

    }
    /////////////////
    function delete_user($id){
        $this->db->where('id_utilisateur', $id);
        $this->db->delete('acl_utilisateur');
        return true;
    }

    /////////
    function le_selectprofils_client_out(){
        $respo_role=$this->session->userdata('respo_role');
        $data=array();
        $data[""]="Selection  ";
        $this->db->select('*');
        $this->db->from('acl_profils');
        //$this->db->where('code_profils !=', "client");
        if($respo_role<1) $this->db->where('personnel_anvi', "1");
        $this->db->order_by('code_profils','ASC');
        $q = $this->db->get();
        if($q->num_rows()>0)
        {

            foreach ($q->result() as $lign)
            {
                $data[$lign->id_profils]=$lign->code_profils;
            }


        }
        return $data;
    }

}
