<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration extends MX_Controller {

    public function __construct(){
        parent::__construct();

        admin_in();
        $this->load->model('configuration_model');
        $this->load->model('administration_model');
        $this->load->model('adminacl_model');
        $this->load->model('tplconfig_model');


    }

    public function index($adtab=NULL){
        if(is_null($adtab)) $adtab="1";
        $nom_module='configuration';
        $blocmenu="parametrages";
        $pages_title="Gestion de la configuration de base";
        $data=$this->tplconfig_model->configmenu($nom_module, $blocmenu, $pages_title, $adtab);
        //var_dump($data);
        $this->load->view('intro_view',$data);
    }
    ///////////////////////////////////MODULE//////////////////////////////////
    function get_module(){
        //desc_vue_de_la_liste_des_modules
        $data=array();
        $data['onglet_title']="Liste des modules";
        $data['liste_module']=$this->configuration_model->liste_designation_module();
        //print_r($data);
        $this->load->view('configuration/module_view', $data);
    }
    ///////////////////
    function add_module() {
        //desc_ajouter_un_module
        if($_POST){
            $this->form_validation->set_rules('username','nom du module','trim|required|xss_clean');
            if($this->form_validation->run()){

                $nom_module=mb_strtolower($this->input->post('username'));
                $data=array('designation_module' => $nom_module);
                if($this->configuration_model->add_module($data)){
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

    /////
    function edit_module(){
//desc_editer_un_module
        if($_POST){
            $this->form_validation->set_rules('username','nom du module','trim|required|xss_clean');
            if($this->form_validation->run()){

                $id_module=$this->input->post('id_module');
                $nom_module=mb_strtolower($this->input->post('username'));

                $data=array('designation_module' => $nom_module);

                if($this->configuration_model->update_module($id_module, $data)){
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
    function delete_module(){
        //desc_supprimer_un_module
        if($_POST){
            $this->form_validation->set_rules('delok','delok','trim|required|xss_clean');
            if($this->form_validation->run()){

                $id=$this->input->post('id');
                if($this->configuration_model->delete_module($id)){
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
    ///////////////////////////////////////BLOCMENU////////////////////////////////////////////////////
    function get_blocmenu(){
        //desc_vue_de_la_liste_des_blocs_de_module
        $data['onglet_title']="Liste des blocmenus";
        $data['liste_icone']=$this->configuration_model->liste_icone_blocmenu();
        $data['liste_blocmenu']=$this->configuration_model->liste_designation_blocmenu();
        $data['lemax']=count($data['liste_blocmenu'])+1;
        $data['exactmax']=count($data['liste_blocmenu']);
        $this->load->view('configuration/blocmenu_view', $data);
    }
    ///////////////////
    function add_blocmenu() {
        //desc_ajouter_un_bloc_de_module
        if($_POST && isset($_POST['passok']) && ($_POST['passok']=="ok")){
            $this->form_validation->set_rules('username', "nom du blocmenu", 'xss_clean|trim|required');
            if($this->form_validation->run()){

                $nom_blocmenu=mb_strtolower($this->input->post('username'));
                $position=$this->input->post('position');
                $icone=$this->input->post('icone');
                $laposemax=$this->input->post('laposemax');

                $data=array('nom_blocmenu' => $nom_blocmenu, 'position_blocmenu' => $position, 'icone_blocmenu' => $icone);

                if($this->configuration_model->add_blocmenu($data, $position, $laposemax)){
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
    function delete_blocmenu(){
        //desc_supprimer_un_bloc_de_module
        if($_POST){
            $this->form_validation->set_rules('delok','delok','trim|required|xss_clean');
            if($this->form_validation->run()){
                $id=$this->input->post('id');
                if($this->configuration_model->delete_blocmenu($id)){
                    echo 1;
                } else {
                    echo 0;
                }

            } else {
                echo 0;
            }

        } else {
            echo 0;
        }
    }
    /////
    function edit_blocmenu(){
        //desc_editer_un_bloc_de_module
        if($_POST && isset($_POST['editok']) && ($_POST['editok']=="ok")){
            $this->form_validation->set_rules('username', "nom du blocmenu", 'xss_clean|trim|required');
            if($this->form_validation->run()){

                $id=$this->input->post('id_blocmenu');
                $nom_blocmenu=mb_strtolower($this->input->post('username'));
                $position=$this->input->post('position');
                $icone=$this->input->post('icone');
                $old_position=$this->input->post('old_position');


                $data=array('nom_blocmenu' => $nom_blocmenu, 'position_blocmenu' => $position, 'icone_blocmenu' => $icone);

                if($this->configuration_model->update_blocmenu($id, $data, $position, $old_position)){
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
    ////////////////////////////////////////MENU///////////////////////////////////////////////////////
    function get_menu(){
        //desc_vue_de_la_liste_des_menus
        $data['onglet_title']="Menus des blocmenus";
        $data['liste_module']=$this->configuration_model->liste_des_modules_sauf();
        $data['liste_module_all']=$this->configuration_model->liste_des_modules();
        $data['liste_blocmenu']=$this->configuration_model->liste_des_blocmodules();
        $data['liste_menu']=$this->configuration_model->liste_elementmenu_blocmenu();
        $data['maxbloc']= $this->configuration_model->menumax_bloc();
        $this->load->view('configuration/menu_view', $data);
    }

    //////////////////
    function do_maxposition(){
        if(isset($_POST['lapos'])&&($_POST['lapos']=="ok")){
            $id_bloc=$this->input->post('bloc');
            $donnees['position']=$this->configuration_model->find_position_menu($id_bloc);
            $this->load->view('configuration/inposition_view',$donnees);
        }
    }
    /////
    function do_maxposition_edit(){
        if(isset($_POST['laposedit'])&&($_POST['laposedit']=="ok")){
            $id_bloc=$this->input->post('bloc');
            $id_menu=$this->input->post('id_menu');
            $infospos=$this->configuration_model->info_position_menu($id_menu, $id_bloc);
            $donnees['position']=$infospos[0];
            $donnees['laposition']=$infospos[1];
            $this->load->view('configuration/inposition_edit_view',$donnees);
        }
    }

    ///////////////////
    function add_menu() {
        //desc_ajouter_un_menu_de_bloc
        $result = array();
        if($_POST && isset($_POST['passok']) && ($_POST['passok']=="ok")){

            $this->form_validation->set_rules('username', "nom du menu", 'xss_clean|trim|required');
            if($this->form_validation->run()){

                $nommenu=mb_strtolower($this->input->post('username'));
                $position=$this->input->post('position_menu');
                $blocmenu_id=$this->input->post('blocmenu');
                $module_id=$this->input->post('lemodule');
                $maxpos=$this->input->post('maxpos');

                $correspomodule=$this->configuration_model->liste_select_module();
                $correspobloc=$this->configuration_model->liste_select_blocmenu();
                $module_nom="";
                $blocmenu_nom="";

                if(isset($correspomodule[$module_id])) $module_nom=$correspomodule[$module_id];
                if(isset($correspobloc[$blocmenu_id])) $blocmenu_nom=$correspobloc[$blocmenu_id];

                $data=array('blocmenu_id' => $blocmenu_id,
                    'liste_module_id' => $module_id,
                    'numero_element' => $position,
                    'nom_element' => $nommenu,
                    'modulenom_element' => $module_nom,
                    'blocmenu_nom' => $blocmenu_nom
                );

                if($this->configuration_model->add_menu($data, $blocmenu_id,  $maxpos, $position)){
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
    function delete_menu(){
        //desc_supprimer_un_menu_de_bloc
        if($_POST){
            $this->form_validation->set_rules('delok','delok','trim|required|xss_clean');
            if($this->form_validation->run()){
                $id=$this->input->post('id');
                if($this->configuration_model->delete_menu($id)){
                    echo 1;
                } else {
                    echo 0;
                }

            } else {
                echo 0;
            }

        } else {
            echo 0;
        }
    }

    /////
    function edit_menu(){
        //desc_editer_un_menu_de_bloc
        if($_POST && isset($_POST['editok']) && ($_POST['editok']=="ok")){
            $this->form_validation->set_rules('username', "nom du menu", 'xss_clean|trim|required');
            if($this->form_validation->run()){

                $id=$this->input->post('id_menu');

                $username = mb_strtolower($this->input->post('username'));
                $position =$this->input->post('position_menu');
                $blocmenu_id =$this->input->post('blocmenu');
                $module_id =$this->input->post('lemodule');
                $maxpos=$this->input->post('maxpos');

                $oldbloc=$this->input->post('oldbloc');
                $old_pos=$this->input->post('old_pos');

                $correspomodule=$this->configuration_model->liste_select_module();
                $correspobloc=$this->configuration_model->liste_select_blocmenu();
                $module_nom="";
                $blocmenu_nom="";

                if(isset($correspomodule[$module_id])) $module_nom=$correspomodule[$module_id];
                if(isset($correspobloc[$blocmenu_id])) $blocmenu_nom=$correspobloc[$blocmenu_id];

                $data=array("nom_element"=>$username,
                    "numero_element"=>$position,
                    "blocmenu_id"=>$blocmenu_id,
                    "blocmenu_nom"=>$blocmenu_nom,
                    "liste_module_id"=>$module_id,
                    "modulenom_element"=>$module_nom);

                if($this->configuration_model->edit_menu_de_bloc($id, $data, $oldbloc, $blocmenu_id, $old_pos, $position)){
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
    ////////////////////////////////////////MENU///////////////////////////////////////////////////////
    function get_onglet(){
        //desc_vue_de_la_liste_des_onglets
        $data['onglet_title']="Liste des onglets";
        $data['liste_module']=$this->configuration_model->liste_des_modules();
        $data['liste_onglet']=$this->configuration_model->liste_onglet_module();
        $this->load->view('configuration/onglet_view', $data);
    }
    /////
    function do_lotonglet()
    {
        if (isset($_POST['lotong']) && ($_POST['lotong'] == "ok")) {
            $id_module=$this->input->post('moduleid');
            $infospos=$this->configuration_model->info_pour_onglet($id_module);
            $donnees['option_methode']=$infospos[0];
            $donnees['position']=$infospos[1];
            $this->load->view('configuration/parmodule_view',$donnees);
        }

    }

    /////
    function do_lotonglet_2()
    {
        if (isset($_POST['lotong2']) && ($_POST['lotong2'] == "ok")) {
            $id_module=$this->input->post('moduleid');
            $id_onglet=$this->input->post('ongletid');
            $infospos=$this->configuration_model->info_viamodule($id_module, $id_onglet);
            $donnees['option_methode']=$infospos[0];
            $donnees['maxi']=$infospos[1];
            $donnees['position']=$infospos[2];
            $donnees['select_action']=$infospos[3];
            $this->load->view('configuration/parmodule_2_view',$donnees);

        }

    }
    ////
    function do_actualiser_methode()
    {
        if (isset($_POST['actu']) && ($_POST['actu'] == "ok")) {
            $vider = $this->configuration_model->vider_actioncontroleur();
            $reecriture = $this->configuration_model->majdesmodules("coeur/modules/administration");
            echo 1;
        }

    }
    ///////////////////
    function add_onglet() {
        //desc_ajouter_un_onglet
        if($_POST && isset($_POST['passok']) && ($_POST['passok']=="ok")){

            $this->form_validation->set_rules('username', "nom de l'onglet", 'xss_clean|trim|required');
            if($this->form_validation->run()){

                $username = mb_strtolower($this->input->post('username'));
                $position = $this->input->post('position_onglet');
                $maxpos = $this->input->post('maxpos');
                $module_id =$this->input->post('lemodule');
                $actionom =$this->input->post('lamethode');
                $str_action=mb_strtolower($actionom);
                $nomli = "li".$str_action;
                $nomdiv = "div".$str_action;
                $module_nom=$this->configuration_model->nomodule_par_idbloc($module_id);

                $data=array("designation_onglet"=>$username,
                    "numero_ordre"=>$position,
                    "id_liste_module_onglet"=>$module_id,
                    "nom_module_onglet"=>$module_nom,
                    "action_url"=>$actionom,
                    "designationli"=>$nomli,
                    "divid"=>$nomdiv);

                if($this->configuration_model->add_onglet($data, $maxpos, $position, $module_id)){
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
    function delete_onglet(){
        //desc_supprimer_un_onglet
        if($_POST){
            $this->form_validation->set_rules('delok','delok','trim|required|xss_clean');
            if($this->form_validation->run()){
                $id=$this->input->post('id');
                if($this->configuration_model->delete_onglet($id)){
                    echo 1;
                } else {
                    echo 0;
                }

            } else {
                echo 0;
            }

        } else {
            echo 0;
        }
    }

    /////
    function edit_onglet(){
        //desc_editer_un_onglet
        if($_POST && isset($_POST['editok']) && ($_POST['editok']=="ok")){
            $this->form_validation->set_rules('username', "nom onglet", 'xss_clean|trim|required');
            if($this->form_validation->run()){

                $id=$this->input->post('id_onglet');
                $username = mb_strtolower($this->input->post('username'));
                $position =$this->input->post('position_edit');
                $actionom =mb_strtolower($this->input->post('actionom_edit'));
                $module_id =$this->input->post('module_edit');
                $nomli = "li".$actionom;
                $nomdiv = "div".$actionom;
                $module_nom=$this->configuration_model->nomodule_par_idbloc($module_id);

                $data=array("designation_onglet"=>$username,
                    "numero_ordre"=>$position,
                    "id_liste_module_onglet"=>$module_id,
                    "nom_module_onglet"=>$module_nom,
                    "action_url"=>$actionom,
                    "designationli"=>$nomli,
                    "divid"=>$nomdiv);


                $id=$this->input->post('id_onglet');
                $old_pos=$this->input->post('old_pos');
                $old_module=$this->input->post('old_module');

                $username = mb_strtolower($this->input->post('username'));
                $position = $this->input->post('position_onglet');
                $maxpos = $this->input->post('maxpos');
                $module_id =$this->input->post('lemodule');
                $actionom =$this->input->post('lamethode');
                $str_action=mb_strtolower($actionom);
                $nomli = "li".$str_action;
                $nomdiv = "div".$str_action;
                $module_nom=$this->configuration_model->nomodule_par_idbloc($module_id);

                $data=array("designation_onglet"=>$username,
                    "numero_ordre"=>$position,
                    "id_liste_module_onglet"=>$module_id,
                    "nom_module_onglet"=>$module_nom,
                    "action_url"=>$actionom,
                    "designationli"=>$nomli,
                    "divid"=>$nomdiv);

                $data_autre=array("designation_onglet"=>$username,
                    "id_liste_module_onglet"=>$module_id,
                    "nom_module_onglet"=>$module_nom,
                    "action_url"=>$actionom,
                    "designationli"=>$nomli,
                    "divid"=>$nomdiv);

                if($this->configuration_model->modification_onglet($id, $data, $data_autre, $maxpos, $position, $module_id, $old_pos, $old_module)){
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

    /////
    function do_listemethod()
    {
        if (isset($_POST['lotact']) && ($_POST['lotact'] == "ok")) {
            $id_onglet=$this->input->post('id_onglet');
            $infospos=$this->configuration_model->info_sur_longlet($id_onglet);
            $donnees['option_methode']=$infospos[0];
            $donnees['maxi']=$infospos[1];
            $donnees['position']=$infospos[2];
            $donnees['select_action']=$infospos[3];
            $this->load->view('configuration/parmodule_2_view',$donnees);
        }

    }
    ////////////////////////////////////////MENU///////////////////////////////////////////////////////
    function get_icone(){
        //desc_vue_de_la_liste_des_icones
        $data['onglet_title']="Liste des icones";
        $data['liste_icone']=$this->configuration_model->liste_all_icones();
        $this->load->view('configuration/icone_view', $data);
    }
    ///////////////////
    function add_icone() {
        //desc_ajouter_une_icone
        if($_POST && isset($_POST['passok']) && ($_POST['passok']=="ok")){

            $this->form_validation->set_rules('username', "nom de l'icone", 'xss_clean|trim|required');
            if($this->form_validation->run()){

                $username = mb_strtolower($this->input->post('username'));
                $code = mb_strtolower($this->input->post('codicon'));

                $data=array("nom_icone"=>$username, "code_icone"=>$code);

                if($this->configuration_model->add_icone($data)){
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
    function delete_icone(){
        //desc_supprimer_une_icone
        if($_POST){
            $this->form_validation->set_rules('delok','delok','trim|required|xss_clean');
            if($this->form_validation->run()){
                $id=$this->input->post('id');
                if($this->configuration_model->delete_icone($id)){
                    echo 1;
                } else {
                    echo 0;
                }

            } else {
                echo 0;
            }

        } else {
            echo 0;
        }
    }

    /////
    function edit_icone(){
        //desc_editer_une_icone
        if($_POST && isset($_POST['editok']) && ($_POST['editok']=="ok")){
            $this->form_validation->set_rules('username', "nom icone", 'xss_clean|trim|required');
            if($this->form_validation->run()){

                $id=$this->input->post('id_icone');
                $username = mb_strtolower($this->input->post('username'));
                $code =mb_strtolower($this->input->post('codicon'));

                $data=array("nom_icone"=>$username, "code_icone"=>$code);

                if($this->configuration_model->update_icone($id, $data)){
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
    //////////////////
    public function get_methodes_module($modulenom=null){
        //desc_vue_de_la_liste_des_methodes
        if(is_null($modulenom)||empty($modulenom)||($modulenom=="")) $modulenom="";
        $donnees['onglet_title']="Liste des methodes";
        $donnees['option_module']= $this->configuration_model->select_module_byname();
        $donnees['liste_module']= $this->configuration_model->liste_array_module();
        $donnees['nom_module']= $modulenom;
        $donnees['liste_methodes']= $this->configuration_model->liste_methodes($modulenom);
        $this->load->view('configuration/lesmethodes_view',$donnees);

    }


}
