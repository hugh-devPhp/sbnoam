<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configuration_model extends CI_Model {

  	public function __construct() {
            parent::__construct();
        }

function liste_designation_module(){
	  
	  $this->db->select('*');
    $this->db->from('acl_liste_module');
	  $this->db->order_by('designation_module','ASC');
      $q = $this->db->get();
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      	}

	}
///////////////
	function add_module($data){
        $this->db->insert('acl_liste_module',$data);
        return true;
	}
/////////////////
	function delete_module($id){
        $this->db->where('id_liste_module', $id);
        $this->db->delete('acl_liste_module');
        return true;
        
    }
//////////////////
    function get_module($id){
        $this->db->select('*');
        $this->db->from('acl_liste_module');
        $this->db->where('id_liste_module',$id);
        $q = $this->db->get();
        return $q->result();
    }
  ///////////////////
    function update_module($id, $data){
        $this->db->where('id_liste_module',$id);
        $this->db->update('acl_liste_module',$data);
        return true;
    }
 ////////////////////////////////
    function liste_designation_blocmenu(){
    

      $this->db->select('*');
      $this->db->from('acl_blocmenu');
	    $this->db->order_by('nom_blocmenu','ASC');

      $q = $this->db->get();
      return $q->result();
    //   if($q->num_rows()>0)
    //   {
    //       foreach ($q->result() as $lign)
    //       {
    //           $rows=$lign;
    //           $rows->idcone=$this->find_idcone($lign->icone_blocmenu);

    //           $data[]=$rows;
    //       }
    //   } 
    // return $data;
      	
    }
    //////////////////
    function find_idcone($id){
         $data = "";
        $this->db->select('*');
        $this->db->from('acl_icone');
        $this->db->where('code_icone',$id);
        $q = $this->db->get();
        if($q->num_rows()>0)
          {
          foreach ($q->result() as $lign)
          {

              $data=$lign->id_icone;
          }
      } 
    return $data;
    }
    /////////
    function liste_select_icone_blocmenu(){

    $data=array();
      $this->db->select('*');
      $this->db->from('acl_icone');
	  $this->db->order_by('nom_icone','ASC');
      $q = $this->db->get();
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[$lign->code_icone]=$lign->nom_icone;
          }
          
          return $data;
      	}
    }
    ////
    function liste_icone_blocmenu(){

      $this->db->select('*');
      $this->db->from('acl_icone');
      $this->db->order_by('nom_icone','ASC');
      $q = $this->db->get();
      return $q->result();
          
    }
    ///////////////
	function add_blocmenu($data, $laposition, $lemax){
            if($laposition<$lemax) $ajuste=$this->ajuste_position_bloc($laposition, $lemax);
            $add=$this->db->insert('acl_blocmenu',$data);
            return true;
	}
  ////
  function ajuste_position_bloc($laposition, $lemax){

      $this->db->select('*');
      $this->db->from('acl_blocmenu');
      $this->db->where('position_blocmenu >=',$laposition);
      $q = $this->db->get();
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $ids=$lign->id_blocmenu;
              $newspos=$lign->position_blocmenu+1;
              $ladata=array('position_blocmenu' => $newspos);
              $up=$this->modif_blocmenu($ids, $ladata);
          }
          
          
        }
      return true;

  }
/////////////////
	function delete_blocmenu($id){

        $ajuste=$this->ajuste_position_delete($id);
        $this->db->where('id_blocmenu', $id);
        $this->db->delete('acl_blocmenu');
        return true;
    }

    ////
  function ajuste_position_delete($id){
    /////Diminuer les positions superieures
    $laposit=0;

      $this->db->select('*');
      $this->db->from('acl_blocmenu');
      $this->db->where('id_blocmenu',$id);
       $q = $this->db->get();
       if($q->num_rows()>0) {
            $lign = $q->row();
            $laposit=$lign->position_blocmenu;
              }
          

      if($laposit>0){
      $this->db->select('*');
      $this->db->from('acl_blocmenu');
      $this->db->where('position_blocmenu >',$laposit);
      $query = $this->db->get();
      if($query->num_rows()>0)
      {
          foreach ($query->result() as $lign)
          {
              $ids=$lign->id_blocmenu;
              $newspos=$lign->position_blocmenu-1;
              $ladata=array('position_blocmenu' => $newspos);
              $up=$this->modif_blocmenu($ids, $ladata);
          } 
      }
    }
    return true;
  }
//////////////////
    function get_blocmenu($id){
        $this->db->select('*');
        $this->db->from('acl_blocmenu');
        $this->db->where('id_blocmenu',$id);
        $q = $this->db->get();
        return $q->result();
    }
  ///////////////////
    function update_blocmenu($id, $data, $position=null, $old_position=null){

        if((!is_null($position) && !empty($position)) && (!is_null($old_position) && !empty($old_position))){
          if($position!=$old_position){
            if($position>$old_position){
              ///la position a ete elevee
             $moins=$this->ajuste_position_moins($old_position, $position);
            } else if($position<$old_position){
              ///la position a ete diminuee
             $plus=$this->ajuste_position_plus($old_position, $position); 
            }
          }
        }

        $this->db->where('id_blocmenu',$id);
        $this->db->update('acl_blocmenu',$data);
        return true;

    }

    ////
  function ajuste_position_moins($old_position, $new_position){
      /////Diminuer les positions intermediaires
      $this->db->select('*');
      $this->db->from('acl_blocmenu');
      $this->db->where('position_blocmenu >',$old_position);
      $this->db->where('position_blocmenu <=',$new_position);
      $q = $this->db->get();
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $ids=$lign->id_blocmenu;
              $newspos=$lign->position_blocmenu-1;
              $ladata=array('position_blocmenu' => $newspos);
              $up=$this->modif_blocmenu($ids, $ladata);
          } 
          
        }

      return true;

  }
  /////////////
  function ajuste_position_plus($old_position, $new_position){
      /////Augmenter les positions intermediaires
      $this->db->select('*');
      $this->db->from('acl_blocmenu');
      $this->db->where('position_blocmenu <',$old_position);
      $this->db->where('position_blocmenu >=',$new_position);
      $q = $this->db->get();
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $ids=$lign->id_blocmenu;
              $newspos=$lign->position_blocmenu+1;
              $ladata=array('position_blocmenu' => $newspos);
              $up=$this->modif_blocmenu($ids, $ladata);
          }
          
          
        }

      return true;

  }
  //////////////
  function modif_blocmenu($id, $data){

        $this->db->where('id_blocmenu',$id);
        $this->db->update('acl_blocmenu',$data);
        return true;

    }
    ////
    function liste_des_modules_sauf(){
    $data=array();
    $this->db->distinct('liste_module_id');
    $this->db->select('liste_module_id');
    $this->db->from('acl_element_blocmenu');
    $q = $this->db->get();
    if($q->num_rows() != 0){
          foreach ($q->result() as $lign)
          {
              $data[]=$lign->liste_module_id;
          }
          
          
        }

    $this->db->select('*');
    $this->db->from('acl_liste_module');
    if(!empty($data)) $this->db->where_not_in('id_liste_module', $data);
    $this->db->order_by('designation_module','ASC');
      $query = $this->db->get();
      return $query->result();

    }
    ////
    function liste_des_modules(){

    $this->db->select('*');
    $this->db->from('acl_liste_module');
    $this->db->order_by('designation_module','ASC');
      $q = $this->db->get();
      return $q->result();

    }
    ////
    function liste_des_blocmodules(){

    $this->db->select('*');
    $this->db->from('acl_blocmenu');
    $this->db->order_by('nom_blocmenu','ASC');
      $q = $this->db->get();
      return $q->result();

    }
    /////////
    function liste_select_module(){

    $data=array();
      $this->db->select('*');
      $this->db->from('acl_liste_module');
    $this->db->order_by('designation_module','ASC');
      $q = $this->db->get();
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[$lign->id_liste_module]=$lign->designation_module;
          }
          
          return $data;
        }
    }
    /////////
     function liste_select_blocmenu(){

    $data=array();
      $this->db->select('*');
      $this->db->from('acl_blocmenu');
    $this->db->order_by('id_blocmenu','ASC');
      $q = $this->db->get();
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[$lign->id_blocmenu]=$lign->nom_blocmenu;
          }
          
          return $data;
        }
    }
    /////////////////////////////
    function liste_elementmenu_blocmenu(){

      $this->db->select('*');
      $this->db->from('acl_element_blocmenu');
      //$this->db->join('applimodules','applimodules.id_applimodules = onglets.modules_id', 'left');
      $this->db->order_by('nom_element','ASC');
      $q = $this->db->get();
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
        }
    }
    ////
    function find_position_menu($id_bloc=null){
    if(is_null($id_bloc)||($id_bloc=="")) $id_bloc="";
    $sort="";
    if($id_bloc!=""){

      $this->db->select('*');
      $this->db->from('acl_element_blocmenu');
      $this->db->where('blocmenu_id', $id_bloc);
      $q = $this->db->get();
      $sort=$q->num_rows()+1;
        }
    return $sort;
    }
    ///////////////
  function add_menu($data, $id_bloc, $maxpos=null, $position=null){
    if(is_null($maxpos)||($maxpos=="")) $maxpos="";
    if(is_null($position)||($position=="")) $position="";
    if($maxpos!="" && $position!="" && ($maxpos>$position)){

      $this->db->select('*');
      $this->db->from('acl_element_blocmenu');
      $this->db->where('blocmenu_id', $id_bloc);
      $this->db->where('numero_element >=', $position);
      $q = $this->db->get();
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $ids=$lign->id_element_blocmenu;
              $newspos=$lign->numero_element+1;
              $ladata=array('numero_element' => $newspos);
              $up=$this->up_menu_de_bloc($ids, $ladata);
          }
        }
    }

    $this->db->insert('acl_element_blocmenu',$data);
    return true;

  }

  ///////////////
  function ajout_menu($data){

    $this->db->insert('acl_element_blocmenu',$data);
    return true;

  }
    /////////////////
  function delete_menu($id){
        $ajuste=$this->ajuste_menuposition_delete($id);
        $this->db->where('id_element_blocmenu', $id);
        $this->db->delete('acl_element_blocmenu');
        return true;
    }
    ////
  function ajuste_menuposition_delete($id){
    /////Diminuer les positions superieures
    $laposit=0;

      $this->db->select('*');
      $this->db->from('acl_element_blocmenu');
      $this->db->where('id_element_blocmenu',$id);
       $q = $this->db->get();
       if($q->num_rows()>0) {
            $lign = $q->row();
            $laposit=$lign->numero_element;
            $blocmenu_id=$lign->blocmenu_id;
              }
          

      if($laposit>0){
      $this->db->select('*');
      $this->db->from('acl_element_blocmenu');
      $this->db->where('numero_element >',$laposit);
      $this->db->where('blocmenu_id',$blocmenu_id);
      $query = $this->db->get();
      if($query->num_rows()>0)
      {
          foreach ($query->result() as $lign)
          {
              $ids=$lign->id_element_blocmenu;
              $newspos=$lign->numero_element-1;
              $ladata=array('numero_element' => $newspos);
              $up=$this->up_menu_de_bloc($ids, $ladata);
          } 
      }
    }
    return true;
  }
    //////////////////
    function get_menu($id){
        $this->db->select('*');
        $this->db->from('acl_element_blocmenu');
        $this->db->where('id_element_blocmenu',$id);
        $q = $this->db->get();
        return $q->result();
    }
  ///////////////////
    function update_menu($id, $data){

        $this->db->where('id_element_blocmenu',$id);
        $this->db->update('acl_element_blocmenu',$data);
        return true;

    }
    ///
    function up_menu_de_bloc($id, $data){

        $this->db->where('id_element_blocmenu',$id);
        $this->db->update('acl_element_blocmenu',$data);
        return true;

    }
    ///////
function info_position_menu($id_menu, $id_bloc=null){
if(is_null($id_bloc)||($id_bloc=="")) $id_bloc="";

    $data=array();
    $data[0]="";
    $data[1]="";

if($id_bloc!=""){

  $this->db->select('*');
  $this->db->from('acl_element_blocmenu');
  $this->db->where('id_element_blocmenu',$id_menu);
  $q = $this->db->get();
      if($q->num_rows()>0){

        $lines = $q->row();
        $bloc_menu=$lines->blocmenu_id;
        $pos_menu=$lines->numero_element;


      $this->db->select('*');
      $this->db->from('acl_element_blocmenu');
      $this->db->where('blocmenu_id', $id_bloc);

      $querys = $this->db->get();
      $tot=$querys->num_rows();

      if($bloc_menu==$id_bloc) {
              $data[0]=$tot;
              $data[1]=$pos_menu;
          } else { 
              $sort=$tot+1;
              $data[0]=$sort;
              $data[1]=$sort;
          }
        }
    }
return $data;
}

////////
function edit_menu_de_bloc($id, $data, $oldbloc, $id_bloc, $old_position, $position_menu){
////FAIRE LA MISE A JOUR DU MENU MODIFIE
$this->db->where('id_element_blocmenu',$id);
$this->db->update('acl_element_blocmenu',$data);

////suite variation de place
if($oldbloc!=$id_bloc){//// Changement de bloc menu ?
  ////ARRANGER LE BLOC ACCUEIL     
  $depart=$position_menu;
  $this->db->select('*');
  $this->db->from('acl_element_blocmenu');
  $this->db->where('numero_element >=', $position_menu);
  $this->db->where('id_element_blocmenu !=', $id);
  $this->db->where('blocmenu_id', $id_bloc);
  $this->db->order_by("numero_element", "asc");
  $kery = $this->db->get();
  if($kery->num_rows()>0){
     foreach ($kery->result() as $row)
          {
            $id_menu=$row->id_element_blocmenu;
            $new_pos=$depart+1;
            $tab_data=array("numero_element" => $new_pos);
            $up=$this->up_menu_de_bloc($id_menu, $tab_data); 
            $depart++;
          }
        }////FIN AJUSTEMENT

  ////ARRANGER LE BLOC LIBERE 
  $position_depart=$old_position;
  $this->db->select('*');
  $this->db->from('acl_element_blocmenu');
  $this->db->where('numero_element >=', $old_position);
  $this->db->where('blocmenu_id', $oldbloc);
  $this->db->order_by("numero_element", "asc");
  $queri = $this->db->get();
  if($queri->num_rows()>0){
     foreach ($queri->result() as $lynes)
          {
            $id_menu=$lynes->id_element_blocmenu;
            $cool_pos=$position_depart;
            $tab_data2=array("numero_element" => $cool_pos);
            $up=$this->up_menu_de_bloc($id_menu, $tab_data2); 
            $position_depart++;
          }
        }////FIN AJUSTEMENT

  
  } /////FIN CAS AMELIORE RANG
        else {///////CONSERVER LE MEME BLOC

if($old_position!=$position_menu){////CHANGEMENT DE POSITION DANS LE MEME BLOC
    if($old_position>$position_menu){/////donner un meilleur rang

  $depart=$position_menu;
  $this->db->select('*');
  $this->db->from('acl_element_blocmenu');
  $this->db->where('numero_element >=', $position_menu);
  $this->db->where('id_element_blocmenu !=', $id);
  $this->db->where('blocmenu_id', $id_bloc);
  $this->db->order_by("numero_element", "asc");
  $kery = $this->db->get();
  if($kery->num_rows()>0){
     foreach ($kery->result() as $row)
          {
            $id_menu=$row->id_element_blocmenu;
            $new_pos=$depart+1;
            $tab_data=array("numero_element" => $new_pos);
            $up=$this->up_menu_de_bloc($id_menu, $tab_data); 
            $depart++;
          }
        }////FIN AJUSTEMENT
      } /////FIN CAS AMELIORE RANG
        else {////reculer le rang

$depart=0;
 $this->db->select('*');
  $this->db->from('acl_element_blocmenu');
  $this->db->where('numero_element <=', $position_menu);
  $this->db->where('id_element_blocmenu !=', $id);
  $this->db->where('blocmenu_id', $id_bloc);
  $this->db->order_by("numero_element", "asc");
  $kerys = $this->db->get();
  if($kerys->num_rows()>0){
     foreach ($kerys->result() as $row)
          {
            $id_menu=$row->id_element_blocmenu;
            $new_pos=$depart+1;
            $tab_data=array("numero_element" => $new_pos);
            $up=$this->up_menu_de_bloc($id_menu, $tab_data); 
            $depart++;
          }
        }////FIN AJUSTEMENT
      }////FIN RECULER LE RANG

  }////Fin changement dans le meme bloc

}////FIN Conserver LE MEME BLOC
   
return true;

}
    ////
    function menumax_bloc(){
      $data=array();
      $this->db->select('*');
        $this->db->from('acl_blocmenu');
        $q = $this->db->get();
        foreach ($q->result() as $lyne) {
        $id_bloc=$lyne->id_blocmenu;
        $compter=$this->comptage_menu_du_bloc($id_bloc);
        $data[$id_bloc]=$compter;
                    }
    return $data;
    }
    //
    function comptage_menu_du_bloc($id_bloc){

      $this->db->select('*');
      $this->db->from('acl_element_blocmenu');
      $this->db->where('blocmenu_id', $id_bloc);
      $q = $this->db->get();
      return $q->num_rows();
    }
    ///////
    function nombloc_par_idbloc($id){

      $data="";
      $this->db->select('*');
      $this->db->from('acl_blocmenu');
      $this->db->where('id_blocmenu',$id);
      $q = $this->db->get();
        if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data=$lign->nom_blocmenu;
          }
          
          
      }
     return $data;
    }
    ///////
    function nomodule_par_idbloc($id){

      $data="";
      $this->db->select('*');
      $this->db->from('acl_liste_module');
      $this->db->where('id_liste_module',$id);
      $q = $this->db->get();
        if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data=$lign->designation_module;
          }
          
          
      }
     return $data;
    }

    //////////
    function liste_onglet_module(){
      $this->db->select('*');
      $this->db->from('acl_liste_onglet');
      $this->db->where('duplique_id',0);
      $this->db->order_by('designation_onglet','ASC');
      $q = $this->db->get();
      return $q->result();
      
    }
    ////////////////////
  function ajout_onglet($data){
            $this->db->insert('acl_liste_onglet',$data);
            return true;

  }
   ////////////////////
  function add_onglet($data, $maxposition, $position, $id_module){
            if($maxposition>$position){
      $this->db->select('*');
      $this->db->from('acl_liste_onglet');
      $this->db->where('id_liste_module_onglet',$id_module);
      $this->db->where('duplique_id',0);
      $this->db->where('numero_ordre >=',$position);
      $this->db->order_by('numero_ordre','ASC');
      $query = $this->db->get();
      if($query->num_rows()>0)
        {
        $dep=$position;
          foreach ($query->result() as $lign)
              {
              $ids=$lign->id_liste_onglet;
              $newspos=$dep+1;
              $ladata=array('numero_ordre' => $newspos);
              $up=$this->modif_onglet($ids, $ladata);
              $dep++;
              } 
        }
      }
            ////
      $this->db->insert('acl_liste_onglet',$data);
      return true;

  }
    /////////////////
  function delete_onglet($id){
        $ajuste=$this->ajuste_ongletposition_delete($id);
        $this->db->where('id_liste_onglet', $id);
        $this->db->delete('acl_liste_onglet');

        $this->db->where('duplique_id', $id);
        $this->db->delete('acl_liste_onglet');
        return true;
    }
    //////////////////
    function get_onglet($id){
        $this->db->select('*');
        $this->db->from('acl_liste_onglet');
        $this->db->where('id_liste_onglet',$id);
        $q = $this->db->get();
        return $q->result();
    }
    /////
    function ajuste_ongletposition_delete($id){
    /////Diminuer les positions superieures
    $laposit=0;

      $this->db->select('*');
      $this->db->from('acl_liste_onglet');
      $this->db->where('id_liste_onglet',$id);
       $q = $this->db->get();
       if($q->num_rows()>0) {
            $lign = $q->row();
            $laposit=$lign->numero_ordre;
            $module_id=$lign->id_liste_module_onglet;
              }
          

      if($laposit>0){
      $this->db->select('*');
      $this->db->from('acl_liste_onglet');
      $this->db->where('numero_ordre >',$laposit);
      $this->db->where('id_liste_module_onglet',$module_id);
      $this->db->where('duplique_id',0);
      $query = $this->db->get();
      if($query->num_rows()>0)
      {
          foreach ($query->result() as $lign)
          {
              $ids=$lign->id_liste_onglet;
              $newspos=$lign->numero_ordre-1;
              $ladata=array('numero_ordre' => $newspos);
              $up=$this->modif_onglet($ids, $ladata);
          } 
      }
    }

      $this->db->select('*');
      $this->db->from('acl_liste_onglet');
      $this->db->where('duplique_id',$id);
       $quyre = $this->db->get();
       if($quyre->num_rows()>0) {
         foreach ($quyre->result() as $rowas)
              {

            $id_ong=$rowas->id_liste_onglet ;
            $laposition=$rowas->numero_ordre;
            $lemodule_id=$rowas->id_liste_module_onglet;
            $leprofil=$rowas->leprofil;

            if(($laposition>0) && ($leprofil>0)){
      $this->db->select('*');
      $this->db->from('acl_liste_onglet');
      $this->db->where('numero_ordre >',$laposition);
      $this->db->where('id_liste_module_onglet',$lemodule_id);
      $this->db->where('leprofil',$leprofil);
      $quyz = $this->db->get();
      if($quyz->num_rows()>0)
        {
          foreach ($quyz->result() as $linas)
          {
              $idos=$linas->id_liste_onglet;
              $newepos=$linas->numero_ordre-1;
              $ladat=array('numero_ordre' => $newepos);
              $ups=$this->modif_onglet($idos, $ladat);
            } 
          }
                            }

      }
    }

    return true;
    }
  ///////////////////
    function modif_onglet($id, $data){

        $this->db->where('id_liste_onglet',$id);
        $this->db->update('acl_liste_onglet',$data);
        return true;

    }
    ///////////////////
    function update_onglet($id, $data){

        $this->db->where('id_liste_onglet',$id);
        $this->db->update('acl_liste_onglet',$data);

        $this->db->where('duplique_id',$id);
        $this->db->update('acl_liste_onglet',$data);
        return true;

    }
    /////
    function modification_onglet($id, $data, $data_autre, $maxpos, $position, $id_module, $old_pos, $old_module){
      $this->db->where('id_liste_onglet',$id);
      $this->db->update('acl_liste_onglet',$data);

      $this->db->where('duplique_id',$id);
      $this->db->update('acl_liste_onglet',$data_autre);
      ///Reste dans le meme module
      if($id_module==$old_module){
        ///repositionnement plus bas
        if($position<$old_pos){

      $this->db->select('*');
      $this->db->from('acl_liste_onglet');
      $this->db->where('id_liste_onglet !=', $id);
      $this->db->where('id_liste_module_onglet', $id_module);
      $this->db->where('duplique_id',0);
      $this->db->where('numero_ordre >=',$position);
      $this->db->where('numero_ordre <',$old_pos);
      $this->db->order_by('numero_ordre','ASC');
      $query = $this->db->get();
      if($query->num_rows()>0)
        {
        $dep=$position;
          foreach ($query->result() as $lign)
              {
              $ids=$lign->id_liste_onglet;
              $newspos=$dep+1;
              $ladata=array('numero_ordre' => $newspos);
              $up=$this->modif_onglet($ids, $ladata);
              $dep++;
              } 
          }

        } else if($position>$old_pos){

      $this->db->select('*');
      $this->db->from('acl_liste_onglet');
      $this->db->where('id_liste_onglet !=', $id);
      $this->db->where('id_liste_module_onglet', $id_module);
      $this->db->where('duplique_id',0);
      $this->db->where('numero_ordre <=',$position);
      $this->db->where('numero_ordre >',$old_pos);
      $this->db->order_by('numero_ordre','ASC');
      $query = $this->db->get();
      if($query->num_rows()>0)
        {
       
          foreach ($query->result() as $lign)
              {
              $ids=$lign->id_liste_onglet;
              $lapos=$lign->numero_ordre;
              $newspos=$lapos-1;
              $ladata=array('numero_ordre' => $newspos);
              $up=$this->modif_onglet($ids, $ladata);
              } 
          }

        }

    } else if($id_module!=$old_module){ 
      ////Dans l'ancien module - repositionnement
      $this->db->select('*');
      $this->db->from('acl_liste_onglet');
      $this->db->where('numero_ordre >',$old_pos);
      $this->db->where('id_liste_module_onglet',$old_module);
      $this->db->where('duplique_id',0);
      $query = $this->db->get();
      if($query->num_rows()>0)
      {
          foreach ($query->result() as $lign)
          {
              $ids=$lign->id_liste_onglet;
              $newspos=$lign->numero_ordre-1;
              $ladata=array('numero_ordre' => $newspos);
              $up=$this->modif_onglet($ids, $ladata);
          } 
      }
      ////Dans le nouveau module - positionnement
    
      $this->db->select('*');
      $this->db->from('acl_liste_onglet');
      $this->db->where('id_liste_onglet !=', $id);
      $this->db->where('numero_ordre >=',$position);
      $this->db->where('id_liste_module_onglet',$id_module);
      $this->db->where('duplique_id',0);
      $query = $this->db->get();
      if($query->num_rows()>0)
      {
          foreach ($query->result() as $lign)
          {
              $ids=$lign->id_liste_onglet;
              $newspos=$lign->numero_ordre+1;
              $ladata=array('numero_ordre' => $newspos);
              $up=$this->modif_onglet($ids, $ladata);
          } 
      }

    }
    return true;
    }
    //////////////
function info_pour_onglet($id_module){
    $data=array();
    $opmethode=array(""=>"Selection");
    $nbr=1;
    $liste_action_use=array();


        $this->db->select('*');
        $this->db->from('acl_liste_module');
        $this->db->where('id_liste_module',$id_module);
        $q = $this->db->get();
        if($q->num_rows()>0){

          $infos = $q->row();
          $nom_module=$infos->designation_module;

          $this->db->select('*');
          $this->db->from('acl_liste_onglet');
          $this->db->where('id_liste_module_onglet',$id_module);
          $this->db->where('duplique_id',0);
          $quari = $this->db->get();

          if($quari->num_rows()>0) {
            $nbr=$quari->num_rows()+1;
             foreach ($quari->result() as $lign)
              {
              $liste_action_use[]=$lign->action_url;
              }

          }

          $this->db->select('*');
          $this->db->from('acl_liste_action');
          $this->db->where('nom_module_action',$nom_module);
          $this->db->order_by('nom_action','ASC');
          $cursor = $this->db->get();
          foreach ($cursor->result() as $krows) {

            $designation_action=$krows->nom_action;
            if(substr($designation_action, 0,4)=="get_") {
            if(in_array($designation_action, $liste_action_use)) $opmethode[$designation_action]="* ".$designation_action;
            else $opmethode[$designation_action]=$designation_action;
                }
            }

        }
        $data[0]=$opmethode;
        $data[1]=$nbr;
        return $data;
    }
    //////////////
function info_viamodule($id_module, $id_onglet){
    $data=array();
    $opmethode=array(""=>"Selection");
    $nbr=1;
    $liste_action_use=array();

        $this->db->select('*');
        $this->db->from('acl_liste_onglet');
        $this->db->where('id_liste_onglet',$id_onglet);
        $qo = $this->db->get();
          $infuse = $qo->row();
          $module_id_ong=$infuse->id_liste_module_onglet;
          $nom_module_ong=$infuse->nom_module_onglet;
          $rang_ong=$infuse->numero_ordre;
          $select_method_ong=$infuse->action_url;

        $this->db->select('*');
        $this->db->from('acl_liste_module');
        $this->db->where('id_liste_module',$id_module);
        $q = $this->db->get();
        if($q->num_rows()>0){

          $infos = $q->row();
          $nom_module=$infos->designation_module;

          $this->db->select('*');
          $this->db->from('acl_liste_onglet');
          $this->db->where('id_liste_module_onglet',$id_module);
          $this->db->where('duplique_id',0);
          $quari = $this->db->get();

          if($quari->num_rows()>0) {

            if($id_module==$module_id_ong) $nbr=$quari->num_rows();
            else $nbr=$quari->num_rows()+1;

             foreach ($quari->result() as $lign)
              {
              $liste_action_use[]=$lign->action_url;
              }

          }

          $this->db->select('*');
          $this->db->from('acl_liste_action');
          $this->db->where('nom_module_action',$nom_module);
          $this->db->order_by('nom_action','ASC');
          $cursor = $this->db->get();
          foreach ($cursor->result() as $krows) {

            $designation_action=$krows->nom_action;
            if(substr($designation_action, 0,4)=="get_") {
            if($designation_action==$select_method_ong) $opmethode[$designation_action]="+ ".$designation_action;
            else if(in_array($designation_action, $liste_action_use)) $opmethode[$designation_action]="* ".$designation_action;
            else $opmethode[$designation_action]=$designation_action;
                }
            }

        }

        if($id_module==$module_id_ong) $select_method=$select_method_ong;
        else $select_method="";
        if($id_module==$module_id_ong) $rang=$rang_ong;
        else $rang=$nbr;

        $data[0]=$opmethode;
        $data[1]=$nbr;
        $data[2]=$rang;
        $data[3]=$select_method;
        return $data;
    }

    // réinitialisation des tables utiles a l'actualisation des controleurs
    function vider_actioncontroleur(){
      $this->db->truncate('acl_liste_controller'); 
      $this->db->truncate('acl_liste_action'); 
      return true;
    }

    //////////////// Mise a jour des actions des controleurs
function majdesmodules($chemin){

        if(is_file($chemin)){

            $exept_action=array("__construct","index");
            //array_reverse($input);
            $decoupe = explode("/", $chemin); /// DEFAUT SUR UNIX
            if (DIRECTORY_SEPARATOR == '/') $decoupe = explode("/", $chemin); /// ONLINE SUR UNIX
            else if (DIRECTORY_SEPARATOR == '\\') $decoupe = explode("\\", $chemin); ///Pour le local SUR WINDOWS
            
            $goodsens=array_reverse($decoupe);
            //$decoupe = explode("/", $chemin); /// ONLINE SUR UNIX

            if(mb_strtolower($goodsens[1])=='controllers'){

                $les_modules=$goodsens[0];
                //$namemodule=mb_strtolower($goodsens[2]);
                $separe = explode(".", $les_modules);
                $namemodule=$nom_module=mb_strtolower($separe[0]);

                if($nom_module!='index'){

                    $datis=array("nom_module_controller" => $namemodule, "nom_controller" => $nom_module);

                    if($this->newajout_module_bdd($namemodule, $nom_module,$datis)){
                        $fonctions = array();
                        $contenu_fichier = file_get_contents($chemin); // Récupération du contenu du fichier
                        //preg_match_all("#function ([\w-]*)#i", $contenu_fichier, $fonctions);
                        preg_match_all("#function get_([\w-]*)|function add_([\w-]*)|function edit_([\w-]*)|function editer_([\w-]*)|function delete_([\w-]*)|function deletelot_([\w-]*)|function active_([\w-]*)|function desactive_([\w-]*)|function detail_([\w-]*)#i", $contenu_fichier, $fonctions);

                        // preg_match_all("#function get_([\w-]*)|function do_([\w-]*)|function add_([\w-]*)|function edit_([\w-]*)|function editer_([\w-]*)|function delete_([\w-]*)|function del_([\w-]*)|function active_([\w-]*)|function desactive_([\w-]*)|function getconges([\w-]*)|function ecoles_detail([\w-]*)|function detail_([\w-]*)#i", $contenu_fichier, $fonctions);
                        $actions = $fonctions[0];

                        preg_match_all('#//desc_[\w-]*#i', $contenu_fichier, $description);
                        $desc = $description[0];
                        $hav=array();
                        if(count($actions)>0){ /////// Insertion du detail des actions
                            for($m=0; $m<count($actions); $m++){
                                $descclair="";
                                $actionclair=$this->clearnomaction($actions[$m]);
                                 if(isset($desc[$m])){ $descclair=$this->cleardescriptionaction($desc[$m]);}
$detail=array("nom_module_action" => $namemodule, "nom_controller_action" => $nom_module, "nom_action" => $actionclair, "description_action"=>$descclair);
if(!in_array($actionclair, $exept_action))  $adda=$this->newajout_action_bdd($namemodule, $nom_module, $actionclair, $detail);

                            }
                            $desc = array();
                        }

                    } // insertion nouvelle de module +controller


                }


            }
        }

        // Si $chemin est un dossier => on appelle la fonction explorer() pour chaque élément (fichier ou dossier) du dossier$chemin
        if(is_dir($chemin) ){
            $me = opendir($chemin);
            while( $child = readdir($me) ){
                if( $child != '.' && $child != '..' ){
                    $this->majdesmodules( $chemin.DIRECTORY_SEPARATOR.$child );
                }
            }
        }

    }
//// Ajouter dans la table des controleurs
function newajout_module_bdd($nommodule, $nomcontroller, $data){

      $this->db->select('*');
      $this->db->from('acl_liste_controller');
      $this->db->where('nom_module_controller', $nommodule);
      $this->db->where('nom_controller', $nomcontroller);
      $q = $this->db->get();
      if($q->num_rows()<1) {
            $this->db->insert('acl_liste_controller',$data);
            return True;
        } else return false;
    }
    /////////
    function clearnomaction($nom_action){ ///// Retire function dans le nom de l'action
        $name1=trim($nom_action);
        $newname=substr($name1,9);
        return $newname;
    }
    ///////////////////////////
function cleardescriptionaction($nom_desc){ ///// Retire function dans le nom de l'action
        $name1=trim($nom_desc);
        $newname=substr($name1,7);
        $newname = str_replace("_"," ",$newname);
        return $newname;
    }
    //////
    function newajout_action_bdd($nommodule, $nomcontroller,$actionclair, $data){

      $this->db->select('*');
      $this->db->from('acl_liste_action');
      $this->db->where('nom_module_action', $nommodule);
      $this->db->where('nom_controller_action', $nomcontroller);
      $this->db->where('nom_action', $actionclair);
      $q = $this->db->get();
       if($q->num_rows()<1) {
            $this->db->insert('acl_liste_action',$data);
            return True;
        } else return false;
    }

    ///
function info_sur_longlet($id_onglet){

    $data=array();
    $opmethode=array(""=>"Selection");
    $nbr=1;//Le max
    $rang=1;//La position
    $select_method="";
    $liste_action_use=array();

        $this->db->select('*');
        $this->db->from('acl_liste_onglet');
        $this->db->where('id_liste_onglet',$id_onglet);
        $q = $this->db->get();
        if($q->num_rows()>0){

          $infos = $q->row();
          $module_id=$infos->id_liste_module_onglet;
          $nom_module=$infos->nom_module_onglet;
          $rang=$infos->numero_ordre;
          $select_method=$infos->action_url;

        $this->db->select('*');
        $this->db->from('acl_liste_onglet');
        $this->db->where('id_liste_module_onglet', $module_id);
        $this->db->where('duplique_id',0);
        $kezy = $this->db->get();
        if($kezy->num_rows()>0) {
        $nbr=$kezy->num_rows();

        foreach ($kezy->result() as $lignes) {
        $liste_action_use[]=$lignes->action_url;
        }

          $this->db->select('*');
          $this->db->from('acl_liste_action');
          $this->db->where('nom_module_action',$nom_module);
          $this->db->order_by('nom_action','ASC');
          $cursor = $this->db->get();
          foreach ($cursor->result() as $krows) {

            $designation_action=$krows->nom_action;
            if(substr($designation_action, 0,4)=="get_") {
            if($designation_action==$select_method) $opmethode[$designation_action]="+ ".$designation_action;
            else if(in_array($designation_action, $liste_action_use)) $opmethode[$designation_action]="* ".$designation_action;
            else $opmethode[$designation_action]=$designation_action;
                }
            }
          }


        }
        $data[0]=$opmethode;
        $data[1]=$nbr;
        $data[2]=$rang;
        $data[3]=$select_method;
        return $data;
}

    //////
    function liste_all_icones(){
      $this->db->select('*');
      $this->db->from('acl_icone');
      $this->db->order_by('nom_icone','ASC');
      $q = $this->db->get();
     return $q->result();
    }
    ////////////////////
  function add_icone($data){
            $this->db->insert('acl_icone',$data);
            return true;
  }
    /////////////////
  function delete_icone($id){
        $this->db->where('id_icone', $id);
        $this->db->delete('acl_icone');
        return true;
    }
    //////////////////
    function get_icone($id){
        $this->db->select('*');
        $this->db->from('acl_icone');
        $this->db->where('id_icone',$id);
        $q = $this->db->get();
        return $q->result();
    }
  ///////////////////
    function update_icone($id, $data){

        $this->db->where('id_icone',$id);
        $this->db->update('acl_icone',$data);
        return true;

    }
    /////
function liste_methodes($modulenom=null){
if(is_null($modulenom)||empty($modulenom)||($modulenom=="")) $modulenom="";

$data_module=array();
$donnees=array();
if($modulenom!=""){

  $this->db->select('*');
  $this->db->from('acl_liste_action');
  $this->db->where('nom_module_action',$modulenom);
  $this->db->order_by('nom_action','ASC');
  $q = $this->db->get();
  $donnees=$q->result();

        } else {

  $this->db->select('*');
  $this->db->from('acl_liste_module');
  $this->db->order_by('designation_module','ASC');
  $cursor0 = $this->db->get();
  foreach ($cursor0->result() as $lign)
          {
  $data_module[]=$lign->designation_module;
          }

if(!empty($data_module)){

  $this->db->select('*');
  $this->db->from('acl_liste_action');
  $this->db->where_in('nom_module_action',$data_module);
  $this->db->order_by('nom_action','ASC');
  $cursor = $this->db->get();
  foreach ($cursor->result() as $rows) {
    $libelle_module=$rows->nom_module_action;
    $donnees[$libelle_module][]=$rows;
    // code...
                    }

            }
        }
return $donnees;

}
    //////
  function select_module_byname(){
  $data=array(""=>"Tous...");

  $this->db->select('*');
  $this->db->from('acl_liste_module');
  $this->db->order_by('designation_module','ASC');
      $q = $this->db->get();
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[$lign->designation_module]=$lign->designation_module;
          }
      }
    
  return $data;
    }
    //////
function liste_array_module(){
$data=array();

  $this->db->select('*');
  $this->db->from('acl_liste_module');
  $this->db->order_by('designation_module','ASC');
      $q = $this->db->get();
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign->designation_module;
          }
      }
    
  return $data;
    }
    ////
    function modele_distinct(){

    // $this->db->distinct('ac.role_id');
    // $this->db->select('ac.role_id,ul.user_level');
    // $this->db->from('acl_rules as ac');
    // $this->db->join('user_level as ul','ac.role_id = ul.u_level_id','INNER');
    // $query = $this->db->get();
    // if($query->num_rows() != 0)
    //   return $query->result();
    // else
    //   return NULL;
    return 1;
    }
}
