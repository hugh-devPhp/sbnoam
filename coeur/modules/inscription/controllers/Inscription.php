<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('inscription_model');
        $this->load->model('administration/article_model');
        $this->load->model('administration/adminacl_model');
        $this->load->model('administration/administration_model');
        $this->load->model('administration/Configvehicule_model');
        $this->load->model('administration/configuration_model');
        $this->load->model('administration/tplconfig_model');
        $this->load->model('administration/automobile_model');
    }


    function index(){

        $donnees['categories'] = $this->article_model->get_method('app_category');
        $donnees['sous_categories'] = $this->article_model->get_method('app_sous_category');
        $donnees['articles'] = $this->article_model->get_method('app_article');
        $donnees['menu_actif'] = "inscription";
        $this->load->view('index', $donnees);

    }

    function add_client(){

        $data = $this->input->post();
        $nom_complet = $this->input->post("nom_complet");
        $email = $this->input->post("email");
        $new_password = $this->input->post("new_password");
        $conf_password = $this->input->post("conf_password");


        $data = array(
            "nom_complet_client" => $nom_complet,
            "email_client" => $email,
            "password_client" => md5($new_password),
        );

        $resultat = $this->inscription_model->add_client($data);

        if($resultat){
            $this->session->set_flashdata('success', "Votre inscriptiona été pris en compte. Veuillez vous connecter");

            redirect("inscription");
        }else{
            $this->session->set_flashdata('error', "Votre inscriptiona n'a pas abouti. Veuillez reessayer l'inscription");
        }

        var_dump($data);
    }

    function verification_email(){
        $email = $this->input->post('email');

        $resultat = $this->inscription_model->verification_email($email);

        if(count($resultat)>0){
            $result = array("response"=>"1", "message"=>"");
        }else{
            $result = array("response"=>"0", "message"=>"");
        }

        echo json_encode($result);
    }
















}


