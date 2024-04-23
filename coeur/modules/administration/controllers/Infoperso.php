<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Infoperso extends MX_Controller {
	public function __construct(){

        parent::__construct();
        admin_in();
        $this->load->model('infoperso_model');
        $this->load->model('utilisateur_model');
        $this->load->model('adminacl_model');
        $this->load->model('administration_model');
        $this->load->model('configuration_model');
        $this->load->model('tplconfig_model');

       
    }

    public function index($adtab=NULL){
    if(is_null($adtab)) $adtab="1";
    $nom_module='infoperso';
    $blocmenu="identite";
    $pages_title="Informations personnelles";
    $data=$this->tplconfig_model->configmenu($nom_module, $blocmenu, $pages_title, $adtab);
    //var_dump($data);
    $this->load->view('intro_view',$data);    
    }

    ///////////////////////////////////PROFILS//////////////////////////////////
    function get_infoperso(){
        //desc_infos_personnelles
        //print_r($this->session->all_userdata());
        $data['onglet_title']="Infos sur mon identité";
        $data['mesinfos']=$this->infoperso_model->infos_perso();
        $data['liste_civil']=array("M."=>"M.", "Mme"=>"Mme", "Mlle"=>"Mlle");
        $this->load->view('infoperso/infoperso_view', $data);  
    }
    /////
    function do_infoperso(){
        //desc_edit_infos_persos
if($_POST && isset($_POST['docok']) && ($_POST['docok']=="ok")){  
      $this->form_validation->set_rules('pseudo','pseudo utilisateur','trim|required|xss_clean');
        if($this->form_validation->run()){


             $filename = "";
            if(($_FILES) && ($_FILES['photo']['error'] == 0)){

                if (isset($_FILES['photo']['tmp_name'])) {
                $chemin_destination = './assets/img_photo/';
                $inputphoto=explode(".", $_FILES['photo']['name']);
                $reversed = array_reverse($inputphoto);
                $fileadmin=$this->infoperso_model->create_nameof_photo($reversed[0]);
                move_uploaded_file($_FILES['photo']['tmp_name'], $chemin_destination.$fileadmin);
                $filename=$fileadmin;
                @chmod("assets/imgphoto/".$filename,0777);
                        }

                    }

            $id_user = $this->session->userdata('user_id');
            $pseudo = mb_strtolower($this->input->post('pseudo'));
            $nom = mb_strtolower($this->input->post('nom'));
            $prenom = mb_strtolower($this->input->post('prenom'));
            $civilite = $this->input->post('civil');
            if($civilite=="Mme" || $civilite=="Mlle") $sexe="f";
            else $sexe="m";

            if($prenom!="") $nom_complet=$nom." ".$prenom;
            else $nom_complet=$nom;
            
             
            if($filename!="") {
                $data=array("matricule"=>$pseudo, "nom"=>$nom, "prenom"=>$prenom, "nom_complet"=>$nom_complet, "civilite"=>$civilite, "sexe"=>$sexe, "laphoto"=>$filename);
                $this->session->set_userdata('user_photo', $filename);
                $this->session->set_userdata('user_sexe', $sexe);
            }
            else {
                $data=array("matricule"=>$pseudo, "nom"=>$nom, "prenom"=>$prenom, "nom_complet"=>$nom_complet, "civilite"=>$civilite, "sexe"=>$sexe);
                $this->session->set_userdata('user_sexe', $sexe);
            }

            if($this->utilisateur_model->update_user($id_user, $data)){
                    $reponse = '1';
                    $return = array('reponse' => $reponse);
                    echo json_encode($return);
                    } else {
                    $reponse = '0';
                    $return = array('reponse' => $reponse);
                    echo json_encode($return);
                    }
                 
              } else {
           $reponse = '0';
                    $return = array('reponse' => $reponse);
                    echo json_encode($return);
              }

          }  else {
                    $reponse = '0';
                    $return = array('reponse' => $reponse);
                    echo json_encode($return);
                    }
    }
    //////
    function do_motpass(){
        //desc_edit_mot_de_passe
        if($_POST && isset($_POST['initok']) && ($_POST['initok']=="ok")){  

            $id_user = $this->session->userdata('user_id');
            $oldpass = $this->input->post('oldpass');
            $newpass = $this->input->post('newpass');
            $repeatpass = $this->input->post('repeatpass');
            if($this->infoperso_model->test_oldpass($id_user, $oldpass)){
                if($newpass==$repeatpass){
                $data=array("password"=>md5($newpass));
                 if($this->utilisateur_model->update_user($id_user, $data)) {
                    $reponse = '1';
                    $return = array('reponse' => $reponse);
                    echo json_encode($return);
                    } else  {
                    $reponse = '0';
                    $return = array('reponse' => $reponse);
                    echo json_encode($return);
                            }
                        } else {
                    $reponse = '2';
                    $return = array('reponse' => $reponse);
                    echo json_encode($return);
                                }//// mot de passe differents cas 2
                    } else {
                    $reponse = '3';
                    $return = array('reponse' => $reponse);
                    echo json_encode($return);
                    }/// ancien mdp incorrect

              } else { $reponse = '0';
                    $return = array('reponse' => $reponse);
                    echo json_encode($return); }
              
    }
    

}
