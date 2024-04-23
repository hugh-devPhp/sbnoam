<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Automobile extends MX_Controller {

    public function __construct(){
        parent::__construct();

        admin_in();
        $this->load->model('automobile_model');
        $this->load->model('configvehicule_model');
        $this->load->model('tplconfig_model');


    }

    public function index($adtab=NULL){
        if(is_null($adtab)) $adtab="1";
        $nom_module='automobile';
        $blocmenu="pack autos";
        $pages_title="Gestion de la configuration de base";
        $data=$this->tplconfig_model->configmenu($nom_module, $blocmenu, $pages_title, $adtab);
        //var_dump($data);
        $this->load->view('intro_view',$data);
    }
    ///////////////////////////////////MODULE//////////////////////////////////
    function get_vehicule()
    {
        //desc_vue_de_la_liste_des_vehicules

        $data['onglet_title'] = "Liste des vehicules";
        $data['liste_active']=array(1 =>'Active', 0 =>'Inactive');
        $data['vehicules']=$this->automobile_model->liste_vehicule();

        $this->load->view('vehicule/vehicules_view',$data);
    }

    function add_vehicule(){

        if($_POST){

            /// Elements de mon post ///

            $description = $this->input->post('description');
            $categorie = $this->input->post('categorie');
            $climatisation = $this->input->post('climatisation');
            $annee = $this->input->post('annee');
            $kilometrage = $this->input->post('kilometrage');
            $marque = $this->input->post('marque');
            $moteur = $this->input->post('moteur');
            $place = $this->input->post('place');
            $portiere = $this->input->post('portiere');
            $prix = $this->input->post('prix');
            $model = $this->input->post('serie');
            $transmission = $this->input->post('transmission');
            $carburant = $this->input->post('carburant');

            /// Fin Elements de mon post ///

            $id_societe = $this->session->userdata('id_societe');
            $id_utilisateur = $this->session->userdata('id');

            $config['upload_path'] = './uploads/vehicules';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['file_name'] = date("Y_m_d_H_i_s_") . rand();

            $img = array();


            $this->upload->initialize($config);

            if($this->upload->do_upload('img_principale')){
                $image = $this->upload->data('file_name');

                $data = array(
                    "marque_id" => $marque,
                    "model_id" => $model,
                    "moteur_id" => $moteur,
                    "carburant_auto" => $carburant,
                    "annee_auto" => $annee,
                    "transmission_auto" => $transmission,
                    "kilometrage_auto" => $kilometrage,
                    "nb_place_auto" => $place,
                    "nb_porte_auto" => $portiere,
                    "climatisation_auto" => $climatisation,
                    "en_location" => $categorie,
                    "prix_auto" => $prix,
                    "description_auto" => $description,
                    "image_principale_auto" => $image
                );

                $vehicule = $this->automobile_model->add_vehicule($data);


            }


            $files = $_FILES;
            $count = count($_FILES['autre_img']['name']);


            for($i = 0; $i < $count; $i++) {
                $_FILES['autre_img']['name'] = $files['autre_img']['name'][$i];
                $_FILES['autre_img']['type'] = $files['autre_img']['type'][$i];
                $_FILES['autre_img']['tmp_name'] = $files['autre_img']['tmp_name'][$i];
                $_FILES['autre_img']['error'] = $files['autre_img']['error'][$i];
                $_FILES['autre_img']['size'] = $files['autre_img']['size'][$i];

                $this->upload->initialize($config);

                if($this->upload->do_upload('autre_img')){
                    $image = $this->upload->data('file_name');

                    $img[] = array("auto_id"=>$vehicule, "image_auto"=>$image);

                }
            }
            if(!empty($img)){
                $this->automobile_model->add_image_vehicule($img);
            }


            echo json_encode(true);


        }
        else{
            $data['onglet_title'] = "Formulaire d'ajout de vehicule";
            $data['liste_active']=array(1 =>'Active', 0 =>'Inactive');
            $data['marques']=$this->configvehicule_model->get_marque();
            $data['modeles']=$this->configvehicule_model->get_model();
            $data['moteurs']=$this->configvehicule_model->get_moteur();
            $data['couleurs']=$this->configvehicule_model->get_couleur();
            $this->load->view('vehicule/add_vehicules_view',$data);
        }


    }

    function edit_vehicule($id_auto){

        if($_POST){

            /// Elements de mon post ///

            $description = $this->input->post('description');
            $categorie = $this->input->post('categorie');
            $climatisation = $this->input->post('climatisation');
            $annee = $this->input->post('annee');
            $kilometrage = $this->input->post('kilometrage');
            $marque = $this->input->post('marque');
            $moteur = $this->input->post('moteur');
            $place = $this->input->post('place');
            $portiere = $this->input->post('portiere');
            $prix = $this->input->post('prix');
            $model = $this->input->post('serie');
            $transmission = $this->input->post('transmission');
            $carburant = $this->input->post('carburant');

            $data = array(
                "marque_id" => $marque,
                "model_id" => $model,
                "moteur_id" => $moteur,
                "carburant_auto" => $carburant,
                "annee_auto" => $annee,
                "transmission_auto" => $transmission,
                "kilometrage_auto" => $kilometrage,
                "nb_place_auto" => $place,
                "nb_porte_auto" => $portiere,
                "climatisation_auto" => $climatisation,
                "en_location" => $categorie,
                "prix_auto" => $prix,
                "description_auto" => $description
            );
            /// Fin Elements de mon post ///

            $id_societe = $this->session->userdata('id_societe');
            $id_utilisateur = $this->session->userdata('id');

            $config['upload_path'] = './uploads/vehicules';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['file_name'] = date("Y_m_d_H_i_s_") . rand();

            $img = array();


            $this->upload->initialize($config);

            if($this->upload->do_upload('img_principale')){
                $image = $this->upload->data('file_name');

                $data['image_principale_auto'] = $image;




            }

            $this->automobile_model->update_vehicule($id_auto, $data);

            $files = $_FILES;
            $count = count($_FILES['autre_img']['name']);


            for($i = 0; $i < $count; $i++) {
                $_FILES['autre_img']['name'] = $files['autre_img']['name'][$i];
                $_FILES['autre_img']['type'] = $files['autre_img']['type'][$i];
                $_FILES['autre_img']['tmp_name'] = $files['autre_img']['tmp_name'][$i];
                $_FILES['autre_img']['error'] = $files['autre_img']['error'][$i];
                $_FILES['autre_img']['size'] = $files['autre_img']['size'][$i];

                $this->upload->initialize($config);

                if($this->upload->do_upload('autre_img')){
                    $image = $this->upload->data('file_name');

                    $img[] = array("auto_id"=>$id_auto, "image_auto"=>$image);

                }
            }
            if(!empty($img)){
                $this->automobile_model->add_image_vehicule($img);
            }


            echo json_encode(true);


        }
        else{
            $data['onglet_title'] = "Formulaire d'ajout de vehicule";
            $data['liste_active']=array(1 =>'Active', 0 =>'Inactive');
            $data['auto']= $auto = $this->automobile_model->get_vehicule($id_auto);
            $data['marques']=$this->configvehicule_model->get_marque();
            $data['modeles']=$this->configvehicule_model->liste_model($auto['marque_id']);
            $data['images']=$this->automobile_model->get_image($id_auto);
            $data['moteurs']=$this->configvehicule_model->get_moteur();
            $this->load->view('vehicule/edit_vehicules_view',$data);

        }


    }

    function delete_image($id_mage){
        $this->automobile_model->delete_image($id_mage);

        $reponse = '1';
        $return = array('reponse' => $reponse);

        echo json_encode($return);
    }

    function delete_vehicule(){
        if($_POST && isset($_POST['delok']) && ($_POST['delok']=="ok")) {
            $id = $this->input->post("id");

            $this->automobile_model->delete_vehicule($id);

            $reponse = '1';
            $return = array('reponse' => $reponse);

            echo json_encode($return);
        }
    }

    function detail_vehicule($id){

        $data['onglet_title'] = "Details du vehicule";
        $data['liste_active']=array(1 =>'Active', 0 =>'Inactive');
        $data['vehicule']=$this->automobile_model->get_vehicule($id);

//        echo '<pre>';
//        var_dump($data['vehicule']);
//        echo '</pre>';

        $this->load->view('vehicule/details_vehicules_view',$data);
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

}
