<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Compte extends MX_Controller {

    public function __construct() {
        parent::__construct();
        client_in();
        $this->load->library('session');
        $this->load->model('compte_model');
        $this->load->model('panier/panier_model');
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
        $donnees['articles'] = $this->panier_model->get_article_commande();
        $donnees['infos'] = $this->article_model->get_method('app_infos_gen');
        $donnees['menu_actif'] = "inscription";
        $donnees['page_content'] = "mes_commandes_view";
        $this->load->view('index', $donnees);


    }

    function mes_commandes(){


        $donnees['categories'] = $this->article_model->get_method('app_category');
        $donnees['sous_categories'] = $this->article_model->get_method('app_sous_category');
        $donnees['articles'] = $this->panier_model->get_article_commande();
        $donnees['infos'] = $this->article_model->get_method('app_infos_gen');
        $donnees['menu_actif'] = "inscription";
        $donnees['page_content'] = "mes_commandes_view";
        $this->load->view('index', $donnees);


    }

    function mes_reservations(){


        $donnees['categories'] = $this->article_model->get_method('app_category');
        $donnees['sous_categories'] = $this->article_model->get_method('app_sous_category');
        $donnees['reservations'] = $this->compte_model->get_reservation();
        $donnees['infos'] = $this->article_model->get_method('app_infos_gen');
        $donnees['menu_actif'] = "inscription";
        $donnees['page_content'] = "mes_reservations_view";
        $this->load->view('index', $donnees);


    }

    function mon_profil(){


        if($_POST){

            $nom_complet = $this->input->post("nom_complet");
            $pseudo = $this->input->post("pseudo");
            $email = $this->input->post("email");
            $contact = $this->input->post("contact");
            $ville = $this->input->post("ville");
            $commune = $this->input->post("commune");
            $quartier = $this->input->post("quartier");

            $data = array(
              "nom_complet_client" => $nom_complet,
              "pseudo_client" => $pseudo,
              "ville_client" => $ville,
              "commune_client" => $commune,
              "quartier_client" => $quartier,
              "contact_client" => $contact
            );
            $id_client = $this->session->userdata('id_client');
            $this->compte_model->update_client($id_client, $data);

            redirect("compte/mon_profil");
        }else{
            $donnees['categories'] = $this->article_model->get_method('app_category');
            $donnees['sous_categories'] = $this->article_model->get_method('app_sous_category');
            $donnees['articles'] = $this->panier_model->get_article_commande();
            $donnees['infos'] = $this->article_model->get_method('app_infos_gen');
            $donnees['client'] = infos_client();
            $donnees['menu_actif'] = "inscription";
            $donnees['page_content'] = "mon_profil_view";
            $this->load->view('index', $donnees);
        }



    }

    function deconnexion(){
        $this->session->sess_destroy();

        redirect('accueil');
    }















}


