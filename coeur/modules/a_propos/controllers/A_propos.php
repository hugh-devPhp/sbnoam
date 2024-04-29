<?php defined('BASEPATH') OR exit('No direct script access allowed');

class A_propos extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('administration/article_model');

        visitor();
    }



    function index(){
        $donnees['title'] = "Apropos de nous";
        $donnees['menu_actif'] = "Apropos";
        $donnees['page_content'] = "apropos_view";
        $donnees['infos'] = $this->article_model->get_method('app_infos_gen');
        $this->load->view('index', $donnees);

    }
















}


