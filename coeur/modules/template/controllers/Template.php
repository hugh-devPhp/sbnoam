<?php defined('BASEPATH') or exit('No direct script access allowed');

class Template extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        //        $this->load->model('article_model');
        $this->load->model('administration/information_model');
    }


    function index()
    {
        $data['infos'] = $this->article_model->get_method('app_infos_gen');
        $data['sliders'] = $this->article_model->get_method('app_sliders');
        $data['offers'] = $this->information_model->get_information();
        $data['collections'] = $this->article_model->get_method('app_collection');
        $data['articles'] = $this->article_model->get_method('app_article');

        $this->load->view('index', $data);
    }

    function panier()
    {
        $this->load->view('front-end/panier');
    }
}
