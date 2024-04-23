<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tplconfig_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function icone_blocmenu($blocmenu){

        $data = '';
        $this->db->select('*');
        $this->db->from('acl_blocmenu');
        $this->db->where('nom_blocmenu',$blocmenu);
        $q = $this->db->get();
        if($q->num_rows()>0)
            {
              foreach ($q->result() as $lign){ 
              $data="bx-".$lign->icone_blocmenu;
                                              }
            }
      return $data;
    }
    ///////////////
    function liste_des_infos($nom_module){

      $leprofil_id=$this->session->userdata('user_idprofil');

       $data = array();
       $arraynom = array();
       $doc = array();
       $liste = array();
       $arraysom = array();
       $vpc=1;
        $this->db->select('*');
        $this->db->from('acl_liste_onglet');
        $this->db->where('leprofil',$leprofil_id);
        $this->db->where('nom_module_onglet',$nom_module);
        $this->db->order_by('numero_ordre','ASC');
        $q = $this->db->get();
        if($q->num_rows()>0)
            {
              foreach ($q->result() as $lign){ 
              $data[$vpc]=$lign->action_url;
              $arraynom[$vpc]=$lign->designation_onglet;
              $doc[$lign->designation_onglet]=$vpc;
              $liste[]=ucfirst($lign->designation_onglet);
              $vpc++;
                                              }
            }
      $arraysom['libelle_url']=$data;
      $arraysom['nom_url']=$arraynom; 
      $arraysom['inverse']=$doc; 
      $arraysom['arraytitre']=$liste; 
      return $arraysom;

    }
    ////
    function blocmenu_general(){

        $this->db->select('*');
        $this->db->from('acl_blocmenu');
        $this->db->order_by('position_blocmenu','ASC');
        $q = $this->db->get();
        return $q->result();

    }
    /////////////
    function liste_des_elements_parbloc(){

        $data=array();
        $this->db->select('*');
        $this->db->from('acl_blocmenu');
        $this->db->order_by('position_blocmenu','ASC');
        $q = $this->db->get();
         if($q->num_rows()>0)
            {
              foreach ($q->result() as $lign){ 

                $id_blocmenu=$lign->id_blocmenu;

                $this->db->select('*');
                $this->db->from('acl_element_blocmenu');
                $this->db->where('blocmenu_id',$id_blocmenu);
                $this->db->order_by('numero_element','ASC');
                $query = $this->db->get();
                if($query->num_rows()>0)
                  {
                  foreach ($query->result() as $rows){ 
                    $data[$id_blocmenu][]=$rows;
                                                    }
                  }

              }
            }
        return $data;
    }
    ////////////
    function tous_menu_droit_profil(){
      
        $leprofil_id=$this->session->userdata('user_idprofil');
        $arraytab=array();

        $this->db->select('*');
        $this->db->from('acl_liste_onglet');
        $this->db->where('leprofil',$leprofil_id);
        $this->db->order_by('numero_ordre','ASC');
        $q = $this->db->get();
         if($q->num_rows()>0)
            {
              foreach ($q->result() as $lign){ 
                $nomodule=$lign->nom_module_onglet;
                $idbloc_module=$this->bloc_dumodule($nomodule);
                $arraytab[$idbloc_module][]=$nomodule;
                //$arraytab[$idbloc_module][]=$nomodule;
              }
            }

            return $arraytab;
    }
    ///////////
    function bloc_dumodule($nomodule){
        $data="";

        $this->db->select('*');
        $this->db->from('acl_element_blocmenu');
        $this->db->where('modulenom_element',$nomodule);
        $q = $this->db->get();
         if($q->num_rows()>0)
            {
              foreach ($q->result() as $lign){ 
                $data=$lign->blocmenu_id;
              }
            }
          return $data;
    }

function configmenu($nom_module="accueil", $blocmenu="accueil", $pages_title="Bienvenue", $adtab=1){
    $data=array();
    $data['leckp']=$adtab;

    $data['listeblocmenu']=$this->blocmenu_general();
    $data['element_blocmenu']=$this->liste_des_elements_parbloc();
    $data['blocmenu_profil']=$this->tous_menu_droit_profil();
    $data['iconmodule']=$this->icone_blocmenu($blocmenu);
    $data['lienmodule']=base_url().$nom_module;
    
    $data['nom_module']=$nom_module;
    $data['activebloc']=$blocmenu;
    $data['activemenu']=$nom_module;
    $data['pages_title']=$pages_title;

        $doubtab=$this->liste_des_infos($nom_module);
        $data['libelle_url']=$doubtab['libelle_url'];
        $data['cptmodule']=count($data['libelle_url']);
        $data['nom_url']=$doubtab['nom_url'];
        $inverse_array=$doubtab['inverse'];
        $this->session->set_userdata('mod', $inverse_array);
        $liste_onglet[]= $doubtab['arraytitre'];
        $data['liste_onglet']=$liste_onglet;

        return $data;

        //print_r($this->session->all_userdata());
        //print_r($data);
    }
    ////
    function logguer_add($data){
            $this->db->insert('app_logaction',$data);
            return true;
    }
    ////
    function find_referentiel($latable, $lechamp_ref, $lechamp_id, $id){

        $data = '';
        $this->db->select('*');
        $this->db->from($latable);
        $this->db->where($lechamp_id,$id);
        $q = $this->db->get();
        if($q->num_rows()>0)
            {
              $row = $q->row();
              $data=$row->$lechamp_ref;
            }
      return $data;

    }
    ////
    function deb_situation_etat(){

        $user_id= $this->session->userdata('user_id');
        $leprofil= $this->session->userdata('user_idprofil');

    }
}