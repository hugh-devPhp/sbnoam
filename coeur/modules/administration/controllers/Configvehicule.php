<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Configvehicule extends MX_Controller {

    public function __construct(){
        parent::__construct();

        admin_in();
        $this->load->model('configvehicule_model');
        $this->load->model('tplconfig_model');


    }

    public function index($adtab=NULL){
        if(is_null($adtab)) $adtab="1";
        $nom_module='configvehicule';
        $blocmenu="pack autos";
        $pages_title="Gestion de la configuration de base";
        $data=$this->tplconfig_model->configmenu($nom_module, $blocmenu, $pages_title, $adtab);
        //var_dump($data);
        $this->load->view('intro_view',$data);
    }
    ///////////////////////////////////MODULE//////////////////////////////////
    function get_marque()
    {
        //desc_vue_de_la_liste_des_marques
        $data = array();
        $data['onglet_title'] = "Liste des marques";
        $data['liste_active']=array(1 =>'Active', 0 =>'Inactive');
        $data['marques']=$this->configvehicule_model->get_marque();
        $this->load->view('configvehicule/marques_view',$data);
    }

    function add_marque(){
        if($_POST && isset($_POST['passok']) && ($_POST['passok']=="ok")) {
            $this->form_validation->set_rules('code', "nom de la marque", 'required');
            if ($this->form_validation->run()) {
                $data = $this->input->post();
                $code = $this->input->post("code");
                $statut = $this->input->post("statut");

                $marque = array("code_marque"=>strtolower($code), "activation_marque"=>$statut);

                $this->configvehicule_model->add_marque($marque);

                $reponse = '1';
                $return = array('reponse' => $reponse);
            }
        }else{
            $reponse = '0';
            $return = array('reponse' => $reponse);
        }

        echo json_encode($return);

    }

    function verification_marque(){
        if($_POST && isset($_POST['passok']) && ($_POST['passok']=="ok")) {
            $code = $this->input->post("code");

            $where = array('code_marque' => strtolower($code));

            $resultat = $this->configvehicule_model->get_marque($where);

            if(!empty($resultat)){
                $reponse = '1';
                $return = array('reponse' => $reponse);
            }else{
                $reponse = '0';
                $return = array('reponse' => $reponse);
            }

        }else{
            $reponse = '1';
            $return = array('reponse' => $reponse);
        }

        echo json_encode($return);
    }

    function delete_marque(){
        if($_POST && isset($_POST['delok']) && ($_POST['delok']=="ok")) {
            $id = $this->input->post("id");

            $this->configvehicule_model->delete_marque($id);

            $reponse = '1';
            $return = array('reponse' => $reponse);

            echo json_encode($return);
        }
    }

    function edit_marque(){
        if($_POST && isset($_POST['editok']) && ($_POST['editok']=="ok")) {
            $this->form_validation->set_rules('code', "nom de la marque", 'required');
            if ($this->form_validation->run()) {
                $data = $this->input->post();
                $id_marque = $this->input->post("id_marque");
                $code = $this->input->post("code");
                $statut = $this->input->post("statut");

                $marque = array("code_marque"=>strtolower($code), "activation_marque"=>$statut);

                $this->configvehicule_model->update_marque($id_marque, $marque);

                $reponse = '1';
                $return = array('reponse' => $reponse);
            }
        }else{
            $reponse = '0';
            $return = array('reponse' => $reponse);
        }

        echo json_encode($return);
    }

    function get_model()
    {
        //desc_vue_de_la_liste_des_marques
        $data = array();
        $data['onglet_title'] = "Liste des models";
        $data['liste_active']=array(1 =>'Active', 0 =>'Inactive');
        $opt_marques = array("" => "Selection");

        $marques=$this->configvehicule_model->get_marque();

        if(!empty($marques)){
            foreach ($marques as $marque){
                $id = $marque['id_marque'];
                $opt_marques["$id"] = $marque['code_marque'];
            }
        }
        $data['marques']=$opt_marques;
        $data['models']=$this->configvehicule_model->get_model();
        $this->load->view('configvehicule/models_view',$data);
    }

    function add_model(){
        if($_POST && isset($_POST['passok']) && ($_POST['passok']=="ok")) {

//            $data = $this->input->post();
            $model = $this->input->post("model[]");
            $statut = $this->input->post("statut");
            $id_marque = $this->input->post("marque");

            $data = array();

            for($i=0; $i<count($model); $i++){
                $data[] = array("code_model"=>strtolower($model[$i]), "marque_id"=>$id_marque, "activation_model"=>$statut);
            }


            $this->configvehicule_model->add_model($data);

            $reponse = '1';
            $return = array('reponse' => $reponse);
        }else{
            $reponse = '0';
            $return = array('reponse' => $reponse);
        }

        echo json_encode($return);

    }

    function delete_model(){
        if($_POST && isset($_POST['delok']) && ($_POST['delok']=="ok")) {
            $id = $this->input->post("id");

            $this->configvehicule_model->delete_model($id);

            $reponse = '1';
            $return = array('reponse' => $reponse);

            echo json_encode($return);
        }
    }

    function edit_model(){
        if($_POST && isset($_POST['editok']) && ($_POST['editok']=="ok")) {
            $this->form_validation->set_rules('code', "nom de la marque", 'required');
            if ($this->form_validation->run()) {
                $id_model = $this->input->post("id_model");
                $code = $this->input->post("code");
                $statut = $this->input->post("statut");
                $id_marque = $this->input->post("marque");

                $model = array("code_model"=>strtolower($code), "marque_id"=>$id_marque, "activation_model"=>$statut);

                $this->configvehicule_model->update_model($id_model, $model);

                $reponse = '1';
                $return = array('reponse' => $reponse);
            }
        }else{
            $reponse = '0';
            $return = array('reponse' => $reponse);
        }

        echo json_encode($return);
    }

    function get_moteur()
    {
        //desc_vue_de_la_liste_des_marques
        $data = array();
        $data['onglet_title'] = "Liste des moteurs";
        $data['liste_active']=array(1 =>'Active', 0 =>'Inactive');
        $data['moteurs']=$this->configvehicule_model->get_moteur();
        $this->load->view('configvehicule/moteurs_view',$data);
    }

    function add_moteur(){
        if($_POST && isset($_POST['passok']) && ($_POST['passok']=="ok")) {
            $this->form_validation->set_rules('code', "nom de la marque", 'required');
            if ($this->form_validation->run()) {
                $data = $this->input->post();
                $code = $this->input->post("code");
                $statut = $this->input->post("statut");

                $marque = array("code_moteur"=>strtolower($code), "activation_moteur"=>$statut);

                $this->configvehicule_model->add_moteur($marque);

                $reponse = '1';
                $return = array('reponse' => $reponse);
            }
        }else{
            $reponse = '0';
            $return = array('reponse' => $reponse);
        }

        echo json_encode($return);

    }

    function verification_moteur(){
        if($_POST && isset($_POST['passok']) && ($_POST['passok']=="ok")) {
            $code = $this->input->post("code");

            $where = array('code_moteur' => strtolower($code));

            $resultat = $this->configvehicule_model->get_moteur($where);

            if(!empty($resultat)){
                $reponse = '1';
                $return = array('reponse' => $reponse);
            }else{
                $reponse = '0';
                $return = array('reponse' => $reponse);
            }

        }else{
            $reponse = '1';
            $return = array('reponse' => $reponse);
        }

        echo json_encode($return);
    }

    function delete_moteur(){
        if($_POST && isset($_POST['delok']) && ($_POST['delok']=="ok")) {
            $id = $this->input->post("id");

            $this->configvehicule_model->delete_moteur($id);

            $reponse = '1';
            $return = array('reponse' => $reponse);

            echo json_encode($return);
        }
    }

    function edit_moteur(){
        if($_POST && isset($_POST['editok']) && ($_POST['editok']=="ok")) {
            $this->form_validation->set_rules('code', "nom de la marque", 'required');
            if ($this->form_validation->run()) {
                $id_moteur = $this->input->post('id_moteur');
                $code = $this->input->post("code");
                $statut = $this->input->post("statut");

                $moteur = array("code_moteur"=>strtolower($code), "activation_moteur"=>$statut);

                $this->configvehicule_model->update_moteur($id_moteur, $moteur);

                $reponse = '1';
                $return = array('reponse' => $reponse);
            }
        }else{
            $reponse = '0';
            $return = array('reponse' => $reponse);
        }

        echo json_encode($return);
    }


    function get_couleur()
    {
        //desc_vue_de_la_liste_des_marques
        $data = array();
        $data['onglet_title'] = "Liste des couleurs";
        $data['liste_active']=array(1 =>'Active', 0 =>'Inactive');
        $data['couleurs']=$this->configvehicule_model->get_couleur();
        $this->load->view('configvehicule/couleurs_view',$data);
    }

    function add_couleur(){
        if($_POST && isset($_POST['passok']) && ($_POST['passok']=="ok")) {
            $this->form_validation->set_rules('code', "nom de la marque", 'required');
            if ($this->form_validation->run()) {
                $data = $this->input->post();
                $code = $this->input->post("code");
                $statut = $this->input->post("statut");

                $couleur = array("code_couleur"=>strtolower($code), "activation_couleur"=>$statut);

                $this->configvehicule_model->add_couleur($couleur);

                $reponse = '1';
                $return = array('reponse' => $reponse);
            }
        }else{
            $reponse = '0';
            $return = array('reponse' => $reponse);
        }

        echo json_encode($return);

    }

    function verification_couleur(){
        if($_POST && isset($_POST['passok']) && ($_POST['passok']=="ok")) {
            $code = $this->input->post("code");

            $where = array('code_moteur' => strtolower($code));

            $resultat = $this->configvehicule_model->get_moteur($where);

            if(!empty($resultat)){
                $reponse = '1';
                $return = array('reponse' => $reponse);
            }else{
                $reponse = '0';
                $return = array('reponse' => $reponse);
            }

        }else{
            $reponse = '1';
            $return = array('reponse' => $reponse);
        }

        echo json_encode($return);
    }

    function delete_couleur(){
        if($_POST && isset($_POST['delok']) && ($_POST['delok']=="ok")) {
            $id = $this->input->post("id");

            $this->configvehicule_model->delete_couleur($id);

            $reponse = '1';
            $return = array('reponse' => $reponse);

            echo json_encode($return);
        }
    }

    function edit_couleur(){
        if($_POST && isset($_POST['editok']) && ($_POST['editok']=="ok")) {
            $this->form_validation->set_rules('code', "nom de la marque", 'required');
            if ($this->form_validation->run()) {
                $id_couleur = $this->input->post('id_couleur');
                $code = $this->input->post("code");
                $statut = $this->input->post("statut");

                $couleur = array("code_couleur"=>strtolower($code), "activation_couleur"=>$statut);

                $this->configvehicule_model->update_couleur($id_couleur, $couleur);

                $reponse = '1';
                $return = array('reponse' => $reponse);
            }
        }else{
            $reponse = '0';
            $return = array('reponse' => $reponse);
        }

        echo json_encode($return);
    }

    function liste_model(){
        $id = $this->input->post('id');
        $model = $this->configvehicule_model->liste_model($id);

        echo json_encode($model);
    }

}
