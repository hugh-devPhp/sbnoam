<?php defined('BASEPATH') OR exit('No direct script access allowed');

class A_propos extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('administration/article_model');
        $this->load->model('administration/information_model');
        visitor();
    }



    function index(){
        $donnees['title'] = "Apropos de nous";
        $donnees['menu_actif'] = "Apropos";
        $donnees['page_content'] = "apropos_view";
        $infoss = $this->information_model->get_information();
        $categories = $this->article_model->get_method('app_category');
        $sous_categories = $this->article_model->get_method('app_sous_category');
        $donnees['infos'] = (array)$infoss[0];
        $this->load->view('index', $donnees);

    }
















}


