<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Adminacl extends MX_Controller {
    public function __construct(){

        parent::__construct();
        admin_in();
        $this->load->model('adminacl_model');
        $this->load->model('administration_model');
        $this->load->model('configuration_model');
        $this->load->model('tplconfig_model');


    }

    public function index($adtab=NULL){
        if(is_null($adtab)) $adtab="1";
        $nom_module='adminacl';
        $blocmenu="parametrages";
        $pages_title="Gestion de la liste des accès";
        $data=$this->tplconfig_model->configmenu($nom_module, $blocmenu, $pages_title, $adtab);
        //var_dump($data);
        $this->load->view('intro_view',$data);
    }

    ///////////////////////////////////PROFILS//////////////////////////////////
    function get_profils(){
        //desc_liste_des_profils
        //print_r($this->session->all_userdata());
        $data['onglet_title']="Liste des profils";
        $data['liste_active']=array(1 =>'Active', 0 =>'Inactive');
        $data['liste_desprofils']=$this->adminacl_model->liste_select_desprofils();
        $data['liste_profil']=$this->adminacl_model->liste_designation_profils();
        $this->load->view('adminacl/profil_view', $data);
    }
    //////
    function edit_statut_profil(){
        //desc_script_active_ou_desactive_statut_profil
        if($_POST && isset($_POST['etatok']) && ($_POST['etatok']=="ok")){

            $id_profils = mb_strtolower($this->input->post('id'));
            $activation = $this->input->post('new_etat');

            $data=array("activation_profils"=>$activation);

            if($this->adminacl_model->update_profil($id_profils, $data)) echo 1;
            else  echo 0;
        } else { echo 0; }

    }
    ///////////////////
    function add_profil() {
        //desc_ajout_de_profil
        if($_POST && isset($_POST['passok']) && ($_POST['passok']=="ok")){
            $this->form_validation->set_rules('username', "nom du profil", 'xss_clean|trim|required|max_length[100]');
            if($this->form_validation->run()){

                $username = mb_strtolower($this->input->post('username'));
                $description = mb_strtolower($this->input->post('decrit'));
                $activation = $this->input->post('statut');
                $profilparent = $this->input->post('leparent');
                if(($profilparent!="") && ($profilparent!="0")) $nom_profilparent=$this->adminacl_model->nom_parent_profil($profilparent);
                else $nom_profilparent="";

                $data=array("code_profils"=>$username,
                    "activation_profils"=>$activation,
                    "profilparent_profils"=>$profilparent,
                    "nom_parent"=>$nom_profilparent,
                    "description_profils"=>$description);

                if($this->adminacl_model->add_profil($data)){
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
        } else {
            $reponse = '0';
            $return = array('reponse' => $reponse);
            echo json_encode($return);
        }
    }

    //////
    function delete_profil(){
        //desc_suppression_de_profil
        if($_POST){
            $this->form_validation->set_rules('delok','delok','trim|required|xss_clean');
            if($this->form_validation->run()){
                $id=$this->input->post('id');
                if($this->adminacl_model->delete_profil($id)){
                    echo 1;
                } else {
                    echo 0;
                }

            } else {
                echo 0;
            }

        }  else {
            echo 0;
        }
    }

    /////
    function edit_profil(){
        //desc_edit_de_profil
        if($_POST){
            $this->form_validation->set_rules('username','nom du profil','trim|required|xss_clean');
            if($this->form_validation->run()){

                $id_profils=$this->input->post('id_profil');
                $username = mb_strtolower($this->input->post('username'));
                $description = mb_strtolower($this->input->post('decrit'));
                $activation = $this->input->post('statut');
                $profilparent = $this->input->post('leparent');
                if(($profilparent!="") && ($profilparent!="0")) $nom_profilparent=$this->adminacl_model->nom_parent_profil($profilparent);
                else $nom_profilparent="";

                $data=array("code_profils"=>$username,
                    "activation_profils"=>$activation,
                    "profilparent_profils"=>$profilparent,
                    "nom_parent"=>$nom_profilparent,
                    "description_profils"=>$description);

                if($this->adminacl_model->update_profil($id_profils, $data)){
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
    ///////////////////////////////////////DROIT PAR ONGLET//////////////////////////////////////////////////
    function get_droitonglet(){
        //desc_liste_des_onglets_et_droits
        //print_r($this->session->all_userdata());
        $data['onglet_title']="Liste des droits par onglet";
        $data['liste_onglet']=$this->adminacl_model->liste_select_desonglets();
        $data['liste_desonglets']=$this->adminacl_model->liste_desonglets();
        $this->load->view('adminacl/droitonglet_view', $data);
    }
    ///
    function bloc_profil(){
        if ($this->input->is_ajax_request()) {
            $data['profils'] = $this->adminacl_model->find_coolprofil();
            $this->load->view("adminacl/profil_ajax_view",$data);
        }

    }
    //////
    function add_droit_onglet(){
        //desc_ajout_des_droits_profil_aux_onglets
        if($_POST){
            $this->form_validation->set_rules('designation_onglet', "nom d'onglet", 'trim|required');
            if($this->form_validation->run()){

                $id_onglet= $this->input->post('select-onglet');
                $profil_arr=$this->input->post('profil');
                $numero_arr=$this->input->post('numero');
                $designation_onglet= $this->input->post('designation_onglet');

                $onglet = $this->adminacl_model->get_infos_onglet($id_onglet);

                $designation_module = $onglet->nom_module_onglet;
                $id_liste_module = $onglet->id_liste_module_onglet;
                $libelle_url = $onglet->action_url;
                $designation_li = $onglet->designationli;
                $nom_id_div = $onglet->divid;
                for ($k = 0; $k < count($profil_arr); $k++) {

                    $datad = array(
                        'nom_module_onglet' => $designation_module,
                        'designation_onglet' => $designation_onglet,
                        'id_liste_module_onglet' => $id_liste_module,
                        'action_url' => $libelle_url,
                        'designationli' => $designation_li,
                        'divid' => $nom_id_div,
                        'numero_ordre' => $numero_arr[$k],
                        'leprofil' => $profil_arr[$k],
                        'duplique_id' => $id_onglet
                    );


                    if ($this->adminacl_model->ajout_droitonglet($datad)) {
                        $inprofil = $profil_arr[$k];
                        if ($this->adminacl_model->no_get_action($designation_module, $designation_module, $inprofil, $libelle_url) < 1) {
                            $this->adminacl_model->ajout_droitaction($designation_module, $designation_module, $inprofil, $libelle_url);
                        }
                    }



                }

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
    }
    //////Liste des affectes d'un onglet
    function detail_droitonglet($id_onglet)
    {
        //desc_detail_des_profils_ayant_vue_sur_onglet
        $info_onglet = $this->adminacl_model->get_infos_onglet($id_onglet);

        $nom_onglet = $info_onglet->designation_onglet;
        $donnees['id_onglet'] = $id_onglet;
        $donnees['onglet_title'] = "Les profils ayant vue sur l'onglet [ " . $nom_onglet . " ] ";
        //$this->adminacl_model->mis_a_jour_onglet_droitonglet();
        $donnees['liste_affecte'] = $this->adminacl_model->liste_affecte_droitonglet($id_onglet);

        $this->load->view('adminacl/detail_droitonglet_view', $donnees);
    }
    //////
    function delete_onglet_parprofil(){
        //desc_supprime_droit_a_un_onglet
        if($_POST && isset($_POST['delok']) && ($_POST['delok']=="ok")){
            $id_onglet= $this->input->post('id');
            if($this->adminacl_model->supprimer_ongletaffecte($id_onglet)) echo 1;
            else echo 0;
        } else {
            echo 0;
        }
    }
    /////
    function deletelot_ongletaffecte()
    {
        //desc_supprime_droit_a_une_collection_onglet
        if (isset($_POST['delot']) && ($_POST['delot'] == "ok")) {

            $lot_profil=$this->input->post('lot_profil');
            $arr_id_profil=explode(",", $lot_profil);
            $cpts=0;
            foreach ($arr_id_profil as $rows) {
                $id=$rows;
                if ($this->adminacl_model->supprimer_ongletaffecte($id)) {
                    $cpts++;
                }
            }
            if($cpts>0) echo 1;
            else echo 0;
        }   else echo 0;

    }
    /////
    function edit_onglet_parprofil(){
        //desc_edit_la_position_onglet_par_profil
        if($_POST && isset($_POST['editok']) && ($_POST['editok']=="ok")){

            $id_onglet= $this->input->post('id_onglet');
            $numero_new=$this->input->post('numero');
            $old_pos=$this->input->post('old_pos');
            $leprofil=$this->input->post('edit_profil');
            $id_module=$this->input->post('id_module');

            $datad = array('numero_ordre' => $numero_new);
            if ($this->adminacl_model->edit_onglet($id_onglet, $datad)) {

                ///repositionnement plus bas
                if($numero_new<$old_pos){

                    $this->db->select('*');
                    $this->db->from('acl_liste_onglet');
                    $this->db->where('id_liste_onglet !=', $id_onglet);
                    $this->db->where('id_liste_module_onglet', $id_module);
                    $this->db->where('leprofil', $leprofil);
                    $this->db->where('numero_ordre >=',$numero_new);
                    $this->db->where('numero_ordre <',$old_pos);
                    $this->db->order_by('numero_ordre','ASC');
                    $query = $this->db->get();
                    if($query->num_rows()>0)
                    {
                        $dep=$numero_new;
                        foreach ($query->result() as $lign)
                        {
                            $ids=$lign->id_liste_onglet;
                            $newspos=$dep+1;
                            $ladata=array('numero_ordre' => $newspos);
                            $up=$this->adminacl_model->edit_onglet($ids, $ladata);
                            $dep++;
                        }
                    }

                } else if($numero_new>$old_pos){

                    $this->db->select('*');
                    $this->db->from('acl_liste_onglet');
                    $this->db->where('id_liste_onglet !=', $id_onglet);
                    $this->db->where('id_liste_module_onglet', $id_module);
                    $this->db->where('leprofil', $leprofil);
                    $this->db->where('numero_ordre <=',$numero_new);
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
                            $up=$this->adminacl_model->edit_onglet($ids, $ladata);
                        }
                    }

                }


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
    }
    ///////
    function get_action(){
        //desc_liste_des_methodes_et_description
        $data['onglet_title']="Description des actions";
        $data['liste_desactions']=$this->adminacl_model->liste_desactions();
        $this->load->view('adminacl/actiondecrite_view', $data);
    }
    /////
    function edit_commentaire_action(){
        //desc_edit_de_commentaire
        if($_POST && isset($_POST['upcomment']) && ($_POST['upcomment']=="ok")){

            $id_action = $this->input->post('id_action');
            $comments = mb_strtolower($this->input->post('comments'));

            $data=array("description_action"=>$comments);
            if($this->adminacl_model->edit_commentaire_action($id_action, $data)) echo 1;
            else echo 0;

        } else {
            echo 0;
        }

    }
    ///////

    function get_droitprofil(){
        //desc_liste_des_droits_de_profil
        $data['onglet_title'] = "Permissions par profil";
        $data['levelprofil'] = $this->adminacl_model->get_select_profil();
        $data['select_modules'] = $this->adminacl_model->get_all_module();
        $this->load->view('adminacl/droitprofil_view', $data);
    }
    ////
    function do_module_action(){

        if ($this->input->is_ajax_request()) {

            $data['id_module']= $id_module= $this->input->post('select-module');
            $data['id_profil']= $id_profil= $this->input->post('select-profil');

            $data['info_module']=$info_module=$this->adminacl_model->get_infos_module($id_module);
            $data['info_profil']=$info_profil=$this->adminacl_model->get_infos_profil($id_profil);
            $data['designation_module']=$designation_module=$info_module->designation_module;

            $data['actions']=$this->adminacl_model->get_action_by_module($designation_module);

            $data['actions_active']=$this->adminacl_model->get_action_module_profil($id_profil,$designation_module);
            $data['designation_module']=$designation_module;
            // print_r($data);
            // exit;
            $this->load->view("adminacl/actionprofil_list",$data);

        }
    }
    ////


    function desactive_action(){
        //desc_desactiver_les_actions
        if ($this->input->is_ajax_request()) {
            $data['id_profil']=$id_profil= $this->input->post("profil");
            $data['id_module']=$id_module= $this->input->post("module");

            $list_id_action= $this->input->post("id");

            $this->adminacl_model->desactivation_action($id_profil,$id_module,$list_id_action);

            $data['info_module']=$info_module=$this->adminacl_model->get_infos_module($id_module);
            $data['info_profil']=$info_profil=$this->adminacl_model->get_infos_profil($id_profil);
            $data['designation_module']=$designation_module=$info_module->designation_module;

            $data['actions']=$this->adminacl_model->get_action_by_module($designation_module);

            $data['actions_active']=$this->adminacl_model->get_action_module_profil($id_profil,$designation_module);
            $data['designation_module']=$designation_module;

            $this->load->view("adminacl/actionprofil_list",$data);

        }
    }
    function active_action(){
        //desc_activer_les_actions
        if ($this->input->is_ajax_request()) {
            $data['id_profil']=$id_profil= $this->input->post("profil");
            $data['id_module']=$id_module= $this->input->post("module");
            $list_id_action= $this->input->post("id");

            $this->adminacl_model->activation_action($id_profil,$id_module,$list_id_action);

            $data['info_module']=$info_module=$this->adminacl_model->get_infos_module($id_module);
            $data['info_profil']=$info_profil=$this->adminacl_model->get_infos_profil($id_profil);
            $data['designation_module']=$designation_module=$info_module->designation_module;

            $data['actions']=$this->adminacl_model->get_action_by_module($designation_module);

            $data['actions_active']=$this->adminacl_model->get_action_module_profil($id_profil,$designation_module);
            $data['designation_module']=$designation_module;

            $this->load->view("adminacl/actionprofil_list",$data);


        }
    }


    ///////
    function add_dupliquerdroit(){
        //desc_duplication_des_droits_de_profil
        $data['onglet_title']="Repliquer les droits de profil";
        $data['levelprofil']=$this->adminacl_model->le_select_desprofils();

        if($_POST && isset($_POST['passok']) && ($_POST['passok']=="ok")){

            $this->form_validation->set_rules('duplique_id','profil modele','trim|required|xss_clean');
            if($this->form_validation->run()){

                if($this->adminacl_model->add_dupliquerdroit()){
                    $reponse = '1';
                    $return = array('reponse' => $reponse);
                    echo json_encode($return);

                } else {
                    $reponse = '0';
                    $return = array('reponse' => $reponse);
                    echo json_encode($return);
                }
            } /// fin validte_run
            else {
                $reponse = '0';
                $return = array('reponse' => $reponse);
                echo json_encode($return);
            }
        } else $this->load->view('adminacl/add_dupliquerdroit_view', $data);
    }

    ///////
    function get_ongletparprofil($id_profil=null){
        //desc_liste_des_onglets_per_profil
        $data['onglet_title']="Onglets par profil";
        if(is_null($id_profil) || ($id_profil=="") || ($id_profil==0)){
            $data['levelprofil']=$this->adminacl_model->liste_select_desprofils();
            //$data['levelprofil'][0]='selection...';
            $data['liste_onglets']=array();
            $data['profilselect']='';
            $data['lemax']=array();

        } else {

            $data['levelprofil']=$this->adminacl_model->liste_select_desprofils();
            $data['profilselect']=$id_profil;
            $data['liste_onglets']=$this->adminacl_model->liste_onglets_parprofil($id_profil);
            $data['lemax']=$this->adminacl_model->lemax_onglets_parprofil($id_profil);

        }

        $this->load->view('adminacl/ongletparprofil_view', $data);
    }

    /////////////
    function edit_ongletprofil($id_onglet){
        //desc_editer_un_onglet_de_profil
        $data['onglet_title']="Modifier position onglet du profil";
        $data['id_onglet']=$id_onglet;
        $data['infos_onglet']=$this->adminacl_model->detail_info_onglet($id_onglet);

        $this->form_validation->set_rules('position','numero ordre','trim|required|xss_clean');
        if($_POST){
            if($this->form_validation->run()){

                if($this->adminacl_model->edit_ongletprofil()){
                    $reponse = '1';
                    $return = array('reponse' => $reponse);
                    echo json_encode($return);

                } else {
                    $reponse = '0';
                    $return = array('reponse' => $reponse);
                    echo json_encode($return);
                }
            } /// fin validte_run
            else {
                $reponse = '0';
                $return = array('reponse' => $reponse);
                echo json_encode($return);
            }
        } else $this->load->view('edit_ongletprofil_view', $data);

    }

    /////////////
    function delete_ongletprofil(){
        //desc_supprimer_un_onglet_de_profil
        if(isset($_POST['actu']) && ($_POST['actu']=="ok")){
            if($this->adminacl_model->delete_ongletprofil()) echo 1;
            else echo 0;
        } else echo 0;

    }

}
