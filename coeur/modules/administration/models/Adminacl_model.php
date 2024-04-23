<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminacl_model extends CI_Model {

  	public function __construct() {
            parent::__construct();
        }

function liste_designation_profils(){
	  
	  $this->db->select('*');
    $this->db->from('acl_profils');
	  $this->db->order_by('code_profils','ASC');
      $q = $this->db->get();
      return $q->result();
      

	}
  /////////////
  function liste_select_cat_profil(){

     $data=array();
     $data[""]="Selection  ";
      $this->db->select('*');
      $this->db->from('acl_cat_profil');
      $this->db->order_by('nom_cat_profil','ASC');
      $q = $this->db->get();
      if($q->num_rows()>0)
      {
          
          foreach ($q->result() as $lign)
          {
              $data[$lign->id_cat_profil]=$lign->nom_cat_profil;
          }
          
          
        }
return $data;

  }
  /////////
  function liste_select_desprofils(){

    $data=array();
    $data[0]="Selection  ";
      $this->db->select('*');
      $this->db->from('acl_profils');
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

  /////////
  function le_select_desprofils(){

    $data=array();
    $data[""]="Selection  ";
      $this->db->select('*');
      $this->db->from('acl_profils');
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
  ////// Select des profils
    function get_select_profil(){
        /**/
    $data=array(""=>"-----------");
    $this->db->select('*');
    $this->db->from('acl_profils');
    $this->db->order_by('code_profils','ASC');
    $q = $this->db->get();
    foreach ($q->result() as $lign)
          {
              $data[$lign->id_profils]=$lign->code_profils;
          }
    return $data;
    }
    ////
    function get_all_module(){

    $data=array(""=>"-----------");
    $this->db->select('*');
    $this->db->from('acl_liste_module');
    $this->db->order_by('designation_module','ASC');
    $q = $this->db->get();
    foreach ($q->result() as $lign)
          {
              $data[$lign->id_liste_module]=$lign->designation_module;
          }
    return $data;
  
    }
    function get_infos_module($id){
    
        $this->db->select('*');
        $this->db->from('acl_liste_module');
        $this->db->where('id_liste_module',$id);
        $q = $this->db->get();
        return $q->row();
    }

    function get_action_by_module($module){

        $this->db->select('*');
        $this->db->from('acl_liste_action');
        $this->db->where('nom_module_action',$module);
        $this->db->order_by('nom_action','ASC');
        $q = $this->db->get();
        return $q->result();

    }

    function get_action_module_profil($id_profil,$module){

        $data=array();
        $this->db->select('*');
        $this->db->from('acl_droit_profil');
        $this->db->where('profil_id', $id_profil);
        $this->db->where('module_droit_profil',$module);
        $q = $this->db->get();
        $droits=$q->result();
        foreach ($droits as $droit){
            $data[$droit->module_droit_profil][$droit->action_droit_profil]="1";
        }
        return $data;
      }
      ////
       function delete_droit($id_profil, $droit_module, $droit_action){
            $this->db->where('profil_id', $id_profil);
            $this->db->where('module_droit_profil', $droit_module);
            $this->db->where('action_droit_profil', $droit_action);
            $this->db->delete('acl_droit_profil');
            return true;
      }
      ////
       function add_droit($data){
            $this->db->insert('acl_droit_profil',$data);
        return true;
      }
      ////
      function desactivation_action($id_profil,$id_module,$list_id_action){
        $info_module= $this->get_infos_module($id_module);
        $nom_module= $info_module->designation_module;
        foreach ($list_id_action as $action){

            $info_action= $this->get_infos_action($action);
            $nom_action= $info_action->nom_action;
            if($this->delete_droit($id_profil, $nom_module, $nom_action)){
            ///////////////////////////////////////////////////////////////////
            if(mb_strtolower(substr(trim($nom_action),0,4))=='get_'){  /// Est une action get_ ?

            /////////////////////////////////////////////
            $ongletinfos=$this->onglet_general($nom_module, $nom_action);
            $designation_module=$ongletinfos['nom_module_onglet'];
            $designation_onglet=$ongletinfos['designation_onglet'];
            $libelle_url=$ongletinfos['action_url'];
            
            if($designation_module!=""){ /// les valeurs ne sont pas vides
    
    if($this->test_existence_get_onglet($designation_module, $designation_onglet, $libelle_url, $id_profil)>0) {
        
    $this->db->where('nom_module_onglet', $designation_module);
    $this->db->where('designation_onglet', $designation_onglet);
    $this->db->where('action_url', $libelle_url);
    $this->db->where('leprofil', $id_profil);
    $this->db->delete('acl_liste_onglet');

                                }

                      } /// fin valeurs non vides
            ////////////////////////////////////////////
                          } ///FIN est ce GET

            ///////////////////////////////////////////////////////////////////
                }
            }

        }
    /////
    function activation_action($id_profil,$id_module,$list_id_action){

        $info_module= $this->get_infos_module($id_module);
        $nom_module= $info_module->designation_module;
        foreach ($list_id_action as $action){

          $info_action = $this->get_infos_action($action);
          $nom_action = $info_action->nom_action;

$data=array('profil_id'=> $id_profil,'module_droit_profil'=> $nom_module,"controller_droit_profil"=>$nom_module,"action_droit_profil"=>$nom_action);
              if($this->add_droit($data)){
            ///////////////////////////////////////////////////////////////////
            if(mb_strtolower(substr(trim($nom_action),0,4))=='get_'){  /// Est une action get_ ?

            /////////////////////////////////////////////

            $ongletinfos=$this->onglet_general($nom_module, $nom_action);
            $designation_module=$ongletinfos['nom_module_onglet'];
            $id_liste_module=$ongletinfos['id_liste_module_onglet'];
            $designation_onglet=$ongletinfos['designation_onglet'];
            $numero_ordre_onglet=$ongletinfos['numero_ordre'];
            $libelle_url=$ongletinfos['action_url'];
            $designation_li=$ongletinfos['designationli'];
            $nom_id_div=$ongletinfos['divid'];
            $replique=$ongletinfos['id_liste_onglet'];
            
            if($designation_module!=""){ /// les valeurs ne sont pas vides

        if($this->test_existence_get_onglet($designation_module, $designation_onglet, $libelle_url, $id_profil)<1) {
        $doto=array('nom_module_onglet' => $designation_module,
                    'id_liste_module_onglet ' => $id_liste_module,
                    'designation_onglet' => $designation_onglet,
                    'numero_ordre' => $numero_ordre_onglet,
                    'action_url' => $libelle_url,
                    'designationli' => $designation_li,
                    'divid' => $nom_id_div,
                    'leprofil' => $id_profil,
                    'duplique_id' => $replique);
        $this->ajout_droitonglet($doto);

                                }

                      } /// fin valeurs non vides
            ////////////////////////////////////////////
                                                            } ///FIN est ce GET

            ///////////////////////////////////////////////////////////////////
              }

        }
    }
    /////
    function get_infos_action($id){

        $this->db->select('*');
        $this->db->from('acl_liste_action');
        $this->db->where('id_liste_action',$id);
        $q = $this->db->get();
        return $q->row();

    }
///////////////
	function add_profil($data){
        $this->db->insert('acl_profils',$data);
        return true;
	}
  //////////
  function nom_parent_profil($id){
   $data="";
   if($id>0){
        $this->db->select('*');
        $this->db->from('acl_profils');
        $this->db->where('id_profils',$id);
        $q = $this->db->get();
         if($q->num_rows()>0)
        { 
          foreach ($q->result() as $lign)
          {
              $data=$lign->code_profils;
          }
        }
      }
  return $data;
    }
/////////////////
	function delete_profil($id){
        $this->db->where('id_profils', $id);
        $this->db->delete('acl_profils');
        return true;
    }
//////////////////
    function get_profil($id){
        $this->db->select('*');
        $this->db->from('acl_profils');
        $this->db->where('id_profils',$id);
        $q = $this->db->get();
        return $q->result();
    }
    /////
    function get_infos_profil($id){
    
        $this->db->select('*');
        $this->db->from('acl_profils');
        $this->db->where('id_profils',$id);
        $q = $this->db->get();
        return $q->row();
    }
  ///////////////////
    function update_profil($id, $data){ 

        $this->db->where('id_profils',$id);
        $this->db->update('acl_profils',$data);
        return true;

    }
    ////////////
    function edit_actif_profil($id,$data){

        $this->db->where('id_profils',$id);
        $this->db->update('acl_profils',$data);
        return true;
    }
 ////////////////////////////////
    function liste_desonglets(){
    $this->db->select('*');
    $this->db->from('acl_liste_onglet');
    $this->db->where('duplique_id',0);
    $this->db->order_by('designation_onglet','ASC');
      $q = $this->db->get();
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {   
              //id_liste_module_onglet
              $doc=$lign;
              $id_onglet=$lign->id_liste_onglet;
              $doc->nb_affecte=$this->nb_profil_droit($id_onglet);
              $doc->liste_affecte=$this->liste_profil_droit($id_onglet);
              $data[]=$doc;

          }
          
          return $data;
        }
    }
    ////////////
    function nb_profil_droit($id_onglet){
        $this->db->select('*');
        $this->db->from('acl_liste_onglet');
        $this->db->where('duplique_id',$id_onglet);
        $q = $this->db->get();
        return $q->num_rows();
    }
    ////////////
    function liste_profil_droit($id_onglet){
        $data=array();
        $this->db->select('*');
        $this->db->from('acl_liste_onglet');
        $this->db->join('acl_profils','acl_profils.id_profils = acl_liste_onglet.leprofil', 'left');
        $this->db->where('duplique_id',$id_onglet);
        $q = $this->db->get();
         if($q->num_rows()>0)
        {
          foreach ($q->result() as $lign)
          {   
              $data[]=$lign->code_profils;
          }
        }
      return $data;
    }
    ///////////
    function get_nom_onglet($id_onglet){
      $data="";
      $this->db->select('*');
        $this->db->from('acl_liste_onglet');
        $this->db->join('acl_profils','acl_profils.id_profils = acl_liste_onglet.leprofil', 'left');
        $this->db->where('id_liste_onglet',$id_onglet);
        $q = $this->db->get();
        if($q->num_rows()>0)
        {
          foreach ($q->result() as $lign)
          {   
              $data=$lign->designation_onglet;
          }
        }
      return $data;
    }
    //////
    function liste_desprofils_delonglet($id_onglet){

        $data=array();
        $this->db->select('*');
        $this->db->from('acl_liste_onglet');
        $this->db->join('acl_profils','acl_profils.id_profils = acl_liste_onglet.leprofil', 'left');
        $this->db->where('duplique_id',$id_onglet);
        $q = $this->db->get();
        if($q->num_rows()>0)
        {
          foreach ($q->result() as $lign)
          {   
              $data[]=$lign;

          }
      }
          return $data;
        
    }
    ////////////////////////////////
    function liste_select_desonglets(){
      $data=array(""=>'Selection.......');
    $this->db->select('*');
    $this->db->from('acl_liste_onglet');
    $this->db->where('duplique_id',0);
    $this->db->order_by('designation_onglet','ASC');
      $q = $this->db->get();
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          { 
              $data[$lign->id_liste_onglet]=$lign->designation_onglet;
          }
        }
      return $data;
    }
///////////////
  function getprofils(){

        $id_onglet = $this->input->post('onglet');
        $data = array(0=>0);
        $result = array();
        $this->db->select('*');
        $this->db->from('acl_liste_onglet');
        $this->db->where('duplique_id',$id_onglet);
        $q = $this->db->get();
      if($q->num_rows()>0)
        {
          foreach ($q->result() as $lign)
          { 
              $data[]=$lign->leprofil;
          }
        }

        $this->db->select('*');
        $this->db->from('acl_profils');
        $this->db->where_not_in('id_profils',$data);
        $q = $this->db->get();
      if($q->num_rows()>0)
        {
          foreach ($q->result() as $rows)
          { 
              $result[$rows->id_profils]=$rows->code_profils;
          }
        }

        return $result;
    }
    ////
    function find_coolprofil(){ 
        $id_onglet = $this->input->post('id_onglet');

        $data = array(0=>0);
        $result = array();

        $this->db->select('*');
        $this->db->from('acl_liste_onglet');
        $this->db->where('duplique_id',$id_onglet);
        $q = $this->db->get();
      if($q->num_rows()>0)
        {
          foreach ($q->result() as $lign)
          { 
              $data[]=$lign->leprofil;
          }
        }

        $this->db->select('*');
        $this->db->from('acl_profils');
        $this->db->where_not_in('id_profils', $data);
        $this->db->order_by('code_profils', "ASC");
        $qiz = $this->db->get();
        return $qiz->result();
      
    }
    ////////////
    function add_onglet_surprofil($data){
      $this->db->insert('acl_liste_onglet',$data);
      return true; 
    }
    /////
    function get_infos_onglet($id){
    
        $this->db->select('*');
        $this->db->from('acl_liste_onglet');
        $this->db->where('id_liste_onglet',$id);
        $q = $this->db->get();
        return $q->row();
    }
     ////Liste des affectes d'onglet
    function liste_affecte_droitonglet($id_onglet){
  
        $data=array();
        $cursor=array();
        $docs=array();
        $results=array();
        $this->db->select('*');
        $this->db->from('acl_liste_onglet');
        $this->db->where('duplique_id',$id_onglet);
        $q = $this->db->get();
        if($q->num_rows()>0)
        {
          foreach ($q->result() as $lign)
          { 
              $leprofil=$lign->leprofil;
              $cursor[]=$leprofil;
              $data[$leprofil]=$lign;
          }
        }

        if(!empty($cursor)){
        $this->db->select('*');
        $this->db->from('acl_profils');
        $this->db->where_in('id_profils',$cursor);
        $this->db->order_by('code_profils','ASC');
        $qa = $this->db->get();
        foreach ($qa->result() as $rows)
          { 
              $monprofil_id=$rows->id_profils;
              if(isset($data[$monprofil_id])){
                $laroue=$data[$monprofil_id];
                $laroue->code_profils=$rows->code_profils;
                $results[]=$laroue;
              }
              
          }
      }
      return $results;

    }
    /////////////
    function get_onglet($id){
        $this->db->select('*');
        $this->db->from('acl_liste_onglet');
        $this->db->where('id_liste_onglet',$id);
        $q = $this->db->get();
        return $q->result();
    }
    //////////////////////
  function delete_onglet($id){
        $this->db->where('id_liste_onglet', $id);
        $this->db->delete('acl_liste_onglet');
        return true;
    }

    //////
    function supprimer_ongletaffecte($idonglet){

      $cursor=$this->get_infos_onglet($idonglet);
            $id_profil=$cursor->leprofil;
            $nom_module=$cursor->nom_module_onglet;
            $nom_action=$cursor->action_url;

      if($this->delete_onglet($idonglet)){

        $this->db->where('profil_id', $id_profil);
        $this->db->where('module_droit_profil', $nom_module);
        $this->db->where('controller_droit_profil', $nom_module);
        $this->db->where('action_droit_profil', $nom_action);
        $this->db->delete('acl_droit_profil');

          }
        return True;
    }

    ////////////
    function liste_desactions(){

        $data = array();
        $this->db->select('*');
        $this->db->from('acl_liste_action');
        $this->db->order_by('nom_action','ASC');
        $q = $this->db->get();
        if($q->num_rows()>0)
          {
              foreach ($q->result() as $lign)
              {   
                $data[]=$lign;
              }
        }
        return $data;
    }
    /////////
    function liste_commentaire_lie(){
        $data = array();
        $this->db->select('*');
        $this->db->from('acl_liste_action_comment');
        $q = $this->db->get();
        if($q->num_rows()>0)
          {
              foreach ($q->result() as $lign)
              {   
                $data[$lign->nom_action_comment]=$lign->commentaire;
              }
        }
        return $data;
    }
    function liste_idcomment_lie(){
        $data = array();
        $this->db->select('*');
        $this->db->from('acl_liste_action_comment');
        $q = $this->db->get();
        if($q->num_rows()>0)
          {
              foreach ($q->result() as $lign)
              {   
                $data[$lign->nom_action_comment]=$lign->id_liste_action_comment;
              }
        }
        return $data;
    }
    ////////////
    function add_commentaire_action($data){
      $this->db->insert('acl_liste_action_comment',$data);
      return true;

    }
    //////
    function edit_commentaire_action($id, $data){

            $this->db->where('id_liste_action',$id);
            $this->db->update('acl_liste_action',$data);
            return true;
    }

    ////// Liste des controleurs
function get_all_controllers(){

  $data = array();
  $compare=array();

        $this->db->select('*');
        $this->db->from('acl_liste_controller');
        $q = $this->db->get();
        if($q->num_rows()>0)
          {
              foreach ($q->result() as $lign)
              {  
              if(!isset($compare[$lign->nom_module_controller]) || !in_array($lign->nom_controller, $compare[$lign->designation_module])){ 
                $data[]=$lign;
                $compare[$lign->nom_module_controller][]=$lign->nom_controller;
              }
        }
        return $data;
    }
  }
  /** ESPACE 2*/
// réinitialisation des tables utiles a l'actualisation des controleurs
function vidercontroleur(){
    $this->db->where('id_liste_controller >', 0);
    $this->db->delete('acl_liste_controller');

    $this->db->where('id_liste_action >', 0);
    $this->db->delete('acl_liste_action');
    }

////////////////// Mise a jour des actions et controleurs des modules

function majdesmodules($chemin){

        if(is_file($chemin)){

            //array_reverse($input);

            ///$decoupe = explode("/", $chemin); /// ONLINE
            $decoupe = explode("\\", $chemin); ///Pour le local
            $goodsens=array_reverse($decoupe);


            if(strtolower($goodsens[1])=='controllers'){

            $les_module=$goodsens[0];
            $namemodule=$goodsens[2];
            $separe = explode(".", $les_module);

            $nom_module=$separe[0];

            if($nom_module!='index'){
            $datis=array("nom_module_controller" => $namemodule, "nom_controller" => $nom_module);

            if($this->adminacl_model->newadd_module_bdd($namemodule, $nom_module, $datis)){
            $fonctions = array();
            $contenu_fichier = file_get_contents($chemin); // Récupération du contenu du fichier
            //preg_match_all("#function ([\w-]*) ?\(.*\)#i", $contenu_fichier, $fonctions);
            preg_match_all("#function get_([\w-]*)|function add_([\w-]*)|function edit_([\w-]*)|function editer_([\w-]*)|function delete_([\w-]*)|function active_([\w-]*)|function desactive_([\w-]*)|function detail_([\w-]*)#i", $contenu_fichier, $fonctions);
            $actions = $fonctions[0];

            $hav=array();
            if(count($actions)>0){ /////// Insertion du détail des actions
            for($m=0; $m<count($actions); $m++){
            $actionclair=$this->clearnomaction($actions[$m]);
            $detail=array("nom_module_action" => $namemodule, "nom_controller_action" => $nom_module, "nom_action" => $actionclair);

            $this->adminacl_model->newajout_action_bdd($namemodule, $nom_module, $actionclair, $detail);

                                                    }
                    }

                  } // insertion nouvelle de module +controller


            }


            }
}

    // Si $chemin est un dossier => on appelle la fonction explorer() pour chaque élément (fichier ou dossier) du dossier$chemin
    if( is_dir($chemin) ){
        $me = opendir($chemin);
        while( $child = readdir($me) ){
            if( $child != '.' && $child != '..' ){
                $this->majdesmodules( $chemin.DIRECTORY_SEPARATOR.$child );
            }
        }
    }

}
////////
function newadd_module_bdd($module, $controller, $array){

        $this->db->select('*');
        $this->db->from('acl_liste_controller');
        $this->db->where('nom_module_controller',$module);
        $this->db->where('nom_controller',$controller);
        $q = $this->db->get();
        if($q->num_rows()<1)
          {
             $this->db->insert('acl_liste_controller',$array); 
             return true;
          }
        else return false;
    }
///////
function clearnomaction($nom_action){ ///// Retire function dans le nom de l'action
$name1=trim($nom_action);
$newname=substr($name1,9);
return $newname;
}

//// Ajouter dans la table des controleurs
function newajout_action_bdd($nommodule, $nomcontroller,$actionclair, $dataarray){

        $this->db->select('*');
        $this->db->from('acl_liste_action');
        $this->db->where('nom_module_action',$nommodule);
        $this->db->where('nom_controller_action',$nomcontroller);
        $this->db->where('nom_action',$actionclair);
        $q = $this->db->get();
        if($q->num_rows()<1)
          {
             $this->db->insert('acl_liste_action',$dataarray); 
             return true;
          }
        else return false;

      }
/////////////
function get_detaillant($id_profil){

        $data=array();
        $this->db->select('*');
        $this->db->from('acl_droit_profil');
        $this->db->where('profil_id',$id_profil);
        $q = $this->db->get();
        if($q->num_rows()>0)
          {
            foreach ($q->result() as $lign)
            { 
              $data[$lign->module_droit_profil][$lign->controller_droit_profil][$lign->action_droit_profil]=1;
            }
          }
        return $data;

}
/////////////////
function get_actionliste(){

   $data=array();
        $this->db->select('*');
        $this->db->from('acl_liste_action');
        $this->db->order_by('nom_action','ASC');
        $q = $this->db->get();
        if($q->num_rows()>0)
          {
            foreach ($q->result() as $lign)
            { 
              $data[$lign->nom_module_action][$lign->nom_controller_action][]=$lign->nom_action;
            }
          }
        return $data;
}
////////////
function deleteall_droitprofil($id_profil){

  $this->db->where('profil_id', $id_profil);
  $this->db->delete('acl_droit_profil');

  $this->db->where('leprofil', $id_profil);
  $this->db->delete('acl_liste_onglet');
  return true;

    }
/////////
    function add_cochegroupe_droit(){

      $id_profil = $this->input->post('profil');
      $nom_module = $this->input->post('nom_module');
      $nom_controllers = $this->input->post('nom_controllers');

        $this->db->select('*');
        $this->db->from('acl_liste_action');
        $this->db->where('nom_module_action', $nom_module);
        $this->db->where('nom_controller_action', $nom_controllers);
        $q = $this->db->get();
        if($q->num_rows()>0)
          {
            foreach ($q->result() as $lign) { 
          $actif=$lign->nom_action;//action du module

          if($this->ajout_droitaction($nom_module, $nom_controllers, $id_profil, $actif)){
          if(strtolower(substr(trim($actif),0,4))=='get_'){  /// Est une action get_ ?

            /////////////////////////////////////////////
            $ongletinfos=$this->onglet_general($nom_module, $actif);
            $designation_module=$ongletinfos['nom_module_onglet'];
            $id_liste_module=$ongletinfos['id_liste_module_onglet'];
            $designation_onglet=$ongletinfos['designation_onglet'];
            $numero_ordre_onglet=$ongletinfos['numero_ordre'];
            $libelle_url=$ongletinfos['action_url'];
            $designation_li=$ongletinfos['designationli'];
            $nom_id_div=$ongletinfos['divid'];
            $replique=$ongletinfos['id_liste_onglet'];

            if($designation_module!=""){ /// les valeurs ne sont pas vides
    
    if($this->test_existence_get_onglet($designation_module, $designation_onglet, $libelle_url, $id_profil)<1) {
        $doto=array('nom_module_onglet' => $designation_module,
                    'id_liste_module_onglet ' => $id_liste_module,
                    'designation_onglet' => $designation_onglet,
                    'numero_ordre' => $numero_ordre_onglet,
                    'action_url' => $libelle_url,
                    'designationli' => $designation_li,
                    'divid' => $nom_id_div,
                    'leprofil' => $id_profil,
                    'duplique_id' => $replique);
        $this->ajout_droitonglet($doto);

                                }

                      } /// fin valeurs non vides
            ////////////////////////////////////////////
                                                            } ///FIN est ce GET

                                                        } //// fin ajout droit action 
                                            }//// foreach
          }
          return true;
      
    }
    ///////////
 function ajout_droitaction($nom_module,$nom_controllers,$profil,$action){

  $test_exist=$this->no_get_action($nom_module,$nom_controllers,$profil, $action);
  if($test_exist<1){

  $array=array('profil_id' => $profil, 'module_droit_profil' => $nom_module, 'controller_droit_profil' => $nom_controllers, 'action_droit_profil ' => $action);
  $this->db->insert('acl_droit_profil',$array); 
  return true;

        } else return false;
      }
  ///////////
  function supprime_droitaction($nom_module,$nom_controllers,$profil,$action){

  $test_exist=$this->no_get_action($nom_module,$nom_controllers,$profil, $action);
  if($test_exist>0){ 
  $this->db->where('profil_id', $profil);
  $this->db->where('module_droit_profil', $nom_module);
  $this->db->where('controller_droit_profil', $nom_controllers);
  $this->db->where('action_droit_profil', $action);
  $this->db->delete('acl_droit_profil');
  return true;

        } else return false;
      }
  ////////////
      function no_get_action($nom_module,$nom_controllers,$profil, $action){

        $this->db->select('*');
        $this->db->from('acl_droit_profil');
        $this->db->where('profil_id', $profil);
        $this->db->where('module_droit_profil', $nom_module);
        $this->db->where('controller_droit_profil', $nom_controllers);
        $this->db->where('action_droit_profil', $action);
        $q = $this->db->get();
        return $q->num_rows();

      }

      //////////////////////
    function onglet_general($nom_module, $method_url){

      $data=array();
      $data['id_liste_onglet']="";
      $data['nom_module_onglet']="";
      $data['id_liste_module_onglet']="";
      $data['designation_onglet']="";
      $data['numero_ordre']="";
      $data['action_url']="";
      $data['designationli']="";
      $data['divid']="";

      $this->db->select('*');
      $this->db->from('acl_liste_onglet');
      $this->db->where('duplique_id',0);
      $this->db->where('nom_module_onglet', $nom_module);
      $this->db->where('action_url', $method_url);
      $q = $this->db->get();
        if($q->num_rows()>0)
          {

      $lign=$q->row();
      $data['nom_module_onglet']=$lign->nom_module_onglet;
      $data['id_liste_module_onglet']=$lign->id_liste_module_onglet;
      $data['designation_onglet']=$lign->designation_onglet;
      $data['numero_ordre']=$lign->numero_ordre;
      $data['action_url']=$lign->action_url;
      $data['designationli']=$lign->designationli;
      $data['divid']=$lign->divid;
      $data['id_liste_onglet']=$lign->id_liste_onglet;
          }

       return $data;
    }
    
    ///////
    function test_existence_get_onglet($designation_module, $designation_onglet, $libelle_url, $id_profil){

      $this->db->select('*');
      $this->db->from('acl_liste_onglet');
      $this->db->where('nom_module_onglet', $designation_module);
      $this->db->where('designation_onglet', $designation_onglet);
      $this->db->where('action_url', $libelle_url);
      $this->db->where('leprofil', $id_profil);
      $q = $this->db->get();
      return $q->num_rows();
      
    }
    ////
    function ajout_droitonglet($data){
      $this->db->insert('acl_liste_onglet',$data);
      return true;
    }

    /////////
    function delete_decochegroupe_droit(){

      $id_profil = $this->input->post('profil');
      $nom_module = $this->input->post('nom_module');
      $nom_controllers = $this->input->post('nom_controllers');

        $this->db->select('*');
        $this->db->from('acl_liste_action');
        $this->db->where('nom_module_action', $nom_module);
        $this->db->where('nom_controller_action', $nom_controllers);
        $q = $this->db->get();
        if($q->num_rows()>0)
          {
            foreach ($q->result() as $lign) { 
          $actif=$lign->nom_action;//action du module

          if($this->supprime_droitaction($nom_module, $nom_controllers, $id_profil, $actif)){
          if(strtolower(substr(trim($actif),0,4))=='get_'){  /// Est une action get_ ?

            /////////////////////////////////////////////
            $ongletinfos=$this->onglet_general($nom_module, $actif);
            $designation_module=$ongletinfos['nom_module_onglet'];
            $designation_onglet=$ongletinfos['designation_onglet'];
            $libelle_url=$ongletinfos['action_url'];
            
            if($designation_module!=""){ /// les valeurs ne sont pas vides
    
    if($this->test_existence_get_onglet($designation_module, $designation_onglet, $libelle_url, $id_profil)>0) {
        
    $this->db->where('nom_module_onglet', $designation_module);
    $this->db->where('designation_onglet', $designation_onglet);
    $this->db->where('action_url', $libelle_url);
    $this->db->where('leprofil', $id_profil);
    $this->db->delete('acl_liste_onglet');

                                }

                      } /// fin valeurs non vides
            ////////////////////////////////////////////
                                                            } ///FIN est ce GET

                                                        } //// fin ajout droit action 
                                            }//// foreach
          }
          return true;
      
    }
    ////////////
    function delete_decocheone_droit(){

      $id_profil = $this->input->post('profil');
      $nom_module = $this->input->post('nom_module');
      $nom_controllers = $this->input->post('nom_controllers');
      $actif = $this->input->post('action');

      if($this->supprime_droitaction($nom_module, $nom_controllers, $id_profil, $actif)){
        if(strtolower(substr(trim($actif),0,4))=='get_'){  /// Est une action get_ ?

            /////////////////////////////////////////////
            $ongletinfos=$this->onglet_general($nom_module, $actif);
            $designation_module=$ongletinfos['nom_module_onglet'];
            $designation_onglet=$ongletinfos['designation_onglet'];
            $libelle_url=$ongletinfos['action_url'];
            
            if($designation_module!=""){ /// les valeurs ne sont pas vides
    
    if($this->test_existence_get_onglet($designation_module, $designation_onglet, $libelle_url, $id_profil)>0) {
        
    $this->db->where('nom_module_onglet', $designation_module);
    $this->db->where('designation_onglet', $designation_onglet);
    $this->db->where('action_url', $libelle_url);
    $this->db->where('leprofil', $id_profil);
    $this->db->delete('acl_liste_onglet');

                                }

                      } /// fin valeurs non vides
            ////////////////////////////////////////////
                                                            } ///FIN est ce GET
      }
      return true;
    }
    ///////////////////
    function add_cocheone_droit(){

      $id_profil = $this->input->post('profil');
      $nom_module = $this->input->post('nom_module');
      $nom_controllers = $this->input->post('nom_controllers');
      $actif = $this->input->post('action');

      if($this->ajout_droitaction($nom_module, $nom_controllers, $id_profil, $actif)){
        if(strtolower(substr(trim($actif),0,4))=='get_'){  /// Est une action get_ ?

            /////////////////////////////////////////////
            $ongletinfos=$this->onglet_general($nom_module, $actif);
            $designation_module=$ongletinfos['nom_module_onglet'];
            $id_liste_module=$ongletinfos['id_liste_module_onglet'];
            $designation_onglet=$ongletinfos['designation_onglet'];
            $numero_ordre_onglet=$ongletinfos['numero_ordre'];
            $libelle_url=$ongletinfos['action_url'];
            $designation_li=$ongletinfos['designationli'];
            $nom_id_div=$ongletinfos['divid'];
            $replique=$ongletinfos['id_liste_onglet'];

            if($designation_module!=""){ /// les valeurs ne sont pas vides
    
    if($this->test_existence_get_onglet($designation_module, $designation_onglet, $libelle_url, $id_profil)<1) {
        $doto=array('nom_module_onglet' => $designation_module,
                    'id_liste_module_onglet ' => $id_liste_module,
                    'designation_onglet' => $designation_onglet,
                    'numero_ordre' => $numero_ordre_onglet,
                    'action_url' => $libelle_url,
                    'designationli' => $designation_li,
                    'divid' => $nom_id_div,
                    'leprofil' => $id_profil,
                    'duplique_id' => $replique);
        $this->ajout_droitonglet($doto);

                                }

                      } /// fin valeurs non vides
            ////////////////////////////////////////////
                                                            } ///FIN est ce GET
      }
      return true;

    }
    //////////////
    function add_dupliquerdroit(){

      $modeleprofil = $this->input->post('duplique_id');
      $recprofil = $this->input->post('destine_id');

      $this->deleteall_droitprofil($recprofil);
      $this->duplique_droit_profil($modeleprofil, $recprofil);
      return true;

    }
    /////////
    function duplique_droit_profil($modeleprofil, $recprofil){

        $this->db->select('*');
        $this->db->from('acl_droit_profil');
        $this->db->where('profil_id', $modeleprofil);
        $q = $this->db->get();
        if($q->num_rows()>0)
          {
            foreach ($q->result() as $lign) { 

              $module_droit_profil=$lign->module_droit_profil;
              $controller_droit_profil=$lign->controller_droit_profil;
              $action_droit_profil= $lign->action_droit_profil;

            $data=array("module_droit_profil"=>$module_droit_profil,
                        "controller_droit_profil"=>$controller_droit_profil,
                        "action_droit_profil"=>$action_droit_profil,
                        "profil_id"=>$recprofil);

            $this->db->insert('acl_droit_profil',$data);

              }
          }

        $this->db->select('*');
        $this->db->from('acl_liste_onglet');
        $this->db->where('leprofil', $modeleprofil);
        $query = $this->db->get();
        if($query->num_rows()>0)
          {
            foreach ($query->result() as $rows) { 

              $nom_module_onglet=$rows->nom_module_onglet;
              $id_liste_module_onglet=$rows->id_liste_module_onglet;
              $designation_onglet= $rows->designation_onglet;
              $numero_ordre=$rows->numero_ordre;
              $action_url=$rows->action_url;
              $designationli= $rows->designationli;
              $divid=$rows->divid;
              $duplique_id=$rows->duplique_id;

            $array=array("nom_module_onglet"=>$nom_module_onglet,
                        "id_liste_module_onglet"=>$id_liste_module_onglet,
                        "designation_onglet"=>$designation_onglet,
                        "numero_ordre"=>$numero_ordre,
                        "action_url"=>$action_url,
                        "designationli"=>$designationli,
                        "divid"=>$divid,
                        "duplique_id"=>$duplique_id,
                        "leprofil"=>$recprofil);

            $this->db->insert('acl_liste_onglet',$array);

              }
          }
      return true;

    }
    ///////////
    function liste_onglets_parprofil($profil){
        $this->db->select('*');
        $this->db->from('acl_liste_onglet');
        $this->db->where('leprofil',$profil);
        $this->db->order_by('designation_onglet','ASC');
        $q = $this->db->get();
        return $q->result();
      }

    function lemax_onglets_parprofil($id_profil){

    $data=array();
    $this->db->distinct('id_liste_module_onglet');
    $this->db->select('id_liste_module_onglet');
    $this->db->from('acl_liste_onglet');
    $this->db->where('leprofil',$id_profil);
    $q = $this->db->get();
    if($q->num_rows() != 0){
          foreach ($q->result() as $lign)
          {
              $id_module=$lign->id_liste_module_onglet;
              $compte_nombre=$this->profil_max_onglet_dans_module($id_profil, $id_module);
              $data[$id_module]=$compte_nombre;
          }
        }
    return $data;

    }
    /////
    function profil_max_onglet_dans_module($id_profil, $id_module){

    // $this->db->select_sum('age');
    // $query = $this->db->get('members');

    // $this->db->select_max('age', 'member_age');
    // $query = $this->db->get('members');
    // Produces: SELECT MAX(age) as member_age FROM members

    $this->db->select('id_liste_onglet');
    $this->db->from('acl_liste_onglet');
    $this->db->where('leprofil',$id_profil);
    $this->db->where('id_liste_module_onglet',$id_module);
    $q = $this->db->get();
    $lasomme= $q->num_rows();
    return $lasomme;

    }
    ////////
      function delete_ongletprofil(){
        $id = $this->input->post('id');
        $detail=$this->detail_info_onglet($id);

        $sup_action=$this->supprime_droitaction($detail['nom_module_onglet'], $detail['nom_module_onglet'], $detail['leprofil'], $detail['action_url']);

        $this->db->where('id_liste_onglet', $id);
        $this->db->delete('acl_liste_onglet');
        return true;

      }
    ///////////
      function detail_info_onglet($id_onglet){
        $data=array();
              $data['nom_module_onglet']="";
              $data['designation_onglet']="";
              $data['numero_ordre']="";
              $data['leprofil']="";
              $data['action_url']="";
        $this->db->select('*');
        $this->db->from('acl_liste_onglet');
        $this->db->where('id_liste_onglet',$id_onglet);
        $q = $this->db->get();
        if($q->num_rows()>0)
        {
          foreach ($q->result() as $lign)
          {   
              $data['nom_module_onglet']=$lign->nom_module_onglet;
              $data['designation_onglet']=$lign->designation_onglet;
              $data['numero_ordre']=$lign->numero_ordre;
              $data['leprofil']=$lign->leprofil;
              $data['action_url']=$lign->action_url;
          } 
        }
        return $data;

      }
      //////////
    function edit_ongletprofil(){
      $id_onglet = $this->input->post('id_onglet');
      $position = $this->input->post('position');
      $data=array('numero_ordre'=>$position);

      $this->db->where('id_liste_onglet',$id_onglet);
      $this->db->update('acl_liste_onglet',$data);
      return true;

    }
    /////
    function edit_onglet($id_onglet, $datad){
      $this->db->where('id_liste_onglet',$id_onglet);
      $this->db->update('acl_liste_onglet',$datad);
      return true;
    }
   

   
}
