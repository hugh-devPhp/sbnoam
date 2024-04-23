<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller {

    public function __construct() {
        parent::__construct();
//        $this->load->model('article_model');
    }


    function index(){
        $data['infos'] = $this->article_model->get_method('app_infos_gen');
        $data['sliders'] = $this->article_model->get_method('app_sliders');
        $data['offers'] = $this->article_model->get_method('app_offer');

        $this->load->view('index', $data);

    }

    function panier(){
        $this->load->view('front-end/panier');
    }
















}


