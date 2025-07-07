<?php defined('BASEPATH') or exit('No direct script access allowed');

class Collection extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('collection_model');
        $this->load->model('administration/article_model');
        $this->load->model('administration/information_model');
        $this->load->model('administration/article_model');

        visitor();
    }


    function index($page = null)
    {
        $donnees['menu_actif'] = "Collection";
        $donnees['title'] = "Collections";
        $donnees['page_content'] = "collection_view";
        $infoss = $this->information_model->get_information();
        $donnees['infos'] = (array)$infoss[0];
        $donnees['collections'] = $this->collection_model->get_collection();


        $this->load->view('index', $donnees);
    }

    function detail_collection($id_collection)
    {
        $donnees['menu_actif'] = "collection";
        $donnees['vehicules'] = $this->collection_model->get_collection();

        $donnees['collection'] = $this->article_model->get_method_where('app_collection', array('id_collection' => $id_collection));

        $donnees['page_content'] = "Detail collection";
        $infoss = $this->information_model->get_information();
        $donnees['infos'] = (array)$infoss[0];

        $this->load->view('detail_collection_view', $donnees);
    }
}
