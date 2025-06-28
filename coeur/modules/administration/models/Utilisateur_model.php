<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Utilisateur_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function liste_users()
    {

        $respo_role = $this->session->userdata('respo_role');
        $this->db->select('*');
        $this->db->from('acl_utilisateur');
        $this->db->join('acl_profils', 'acl_profils.id_profils= acl_utilisateur.profil_user', 'left');
        if ($respo_role < 1) $this->db->where('respo_role', 0);
        //$this->db->where('code_profils !=', "client");
        $this->db->order_by('nom_complet', 'ASC');
        $q = $this->db->get();
        return $q->result();
    }

    ///////////////
    function add_user($data)
    {
        $this->db->insert('acl_utilisateur', $data);
        return true;
    }

///////////////////
    function update_user($id, $data)
    {
        $this->db->where('id_utilisateur', $id);
        $this->db->update('acl_utilisateur', $data);
        return true;

    }

    /////////////////
    function delete_user($id)
    {
        $this->db->where('id_utilisateur', $id);
        $this->db->delete('acl_utilisateur');
        return true;
    }

    /////////
    function le_selectprofils_client_out()
    {
        $respo_role = $this->session->userdata('respo_role');
        $data = array();
        $data[""] = "Selection  ";
        $this->db->select('*');
        $this->db->from('acl_profils');
        //$this->db->where('code_profils !=', "client");
        if ($respo_role < 1) $this->db->where('personnel_anvi', "1");
        $this->db->order_by('code_profils', 'ASC');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {

            foreach ($q->result() as $lign) {
                $data[$lign->id_profils] = $lign->code_profils;
            }


        }
        return $data;
    }

}
