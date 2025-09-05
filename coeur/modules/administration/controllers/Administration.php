<?php defined('BASEPATH') or exit('No direct script access allowed');

class Administration extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        admin_in();
        $this->load->model('administration_model');
        $this->load->model('adminacl_model');
        $this->load->model('configuration_model');
        $this->load->model('utilisateur_model');
        $this->load->model('tplconfig_model');
    }

    public function index($adtab = NULL)
    {

        if (is_null($adtab)) $adtab = "1";
        $nom_module = 'administration';
        $blocmenu = "accueil";
        $pages_title = "Bienvenue";
        $data = $this->tplconfig_model->configmenu($nom_module, $blocmenu, $pages_title, $adtab);
        //$init_situation=$this->tplconfig_model->deb_situation_etat();
        $data['visite_mois'] = $this->administration_model->nb_visiteur_par_mois();
        $data['visite_jour'] = $this->administration_model->nb_visiteur_par_jour();
        $data['visite_annee'] = $this->administration_model->nb_visiteur_par_annee();
        $data['message_nonlu'] = $this->administration_model->nb_message_nonlu();
        $data['nb_commande'] = $this->administration_model->nb_commande();
        $data['nb_reservation'] = $this->administration_model->nb_reservation();
        $data['commandes'] = $this->administration_model->les_10_commandes();

        //var_dump($data);
        $this->load->view('index_view', $data);
    }

    function logout()
    {

        $this->session->sess_destroy();
        redirect('administration');
    }
}
