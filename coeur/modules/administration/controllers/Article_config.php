<?php defined('BASEPATH') or exit('No direct script access allowed');

class Article_config extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        admin_in();
        $this->load->model('article_model');
        $this->load->model('adminacl_model');
        $this->load->model('administration_model');
        $this->load->model('configuration_model');
        $this->load->model('tplconfig_model');
    }

    public function index($adtab = NULL)
    {
        if (is_null($adtab)) $adtab = "1";
        $nom_module = 'article_config';
        $blocmenu = "articles";
        $pages_title = "Gestion des éléments article";
        $data = $this->tplconfig_model->configmenu($nom_module, $blocmenu, $pages_title, $adtab);
        //var_dump($data);
        $this->load->view('intro_view', $data);
    }

    function get_categories()
    {
        $data['onglet_title'] = "Liste des catégories";
        $data['categories'] = $this->article_model->get_method('app_category');
        $this->load->view('article/category_view', $data);
    }

    function add_category()
    {
        if ($_POST) {
            $this->form_validation->set_rules('name[]', "nom", 'required');
            if ($this->form_validation->run()) {
                $names = $this->input->post("name");
                $data['categories'] = $this->article_model->get_method('app_category');
                $response = array();

                foreach ($names as $name) {
                    $nameExists = false;

                    foreach ($data['categories'] as $category_data){
                        if (strtolower($name) === $category_data['name']){
                            $nameExists = true;
                            break; // Sortie de la boucle dès qu'on trouve une correspondance
                        }
                    }

                    if ($nameExists) {
                        $query = "$name existe déjà";
                    } else {
                        $category = array(
                            "name" => strtolower($name),
                            'date_add' => date("Y-m-d H:i:s")
                        );
                        $query = $this->article_model->add_method('app_category', $category);
                    }

                    $response = array('reponse' => $query);
                }
            }
        } else {
            $response = array('reponse' => false);
        }

        echo json_encode($response);
    }

    function edit_category()
    {
        if ($_POST) {
            $this->form_validation->set_rules('name_cat', "nom", 'required');
            if ($this->form_validation->run()) {
                $category_id = $this->input->post('category_id');
                $name = $this->input->post("name_cat");
                $categories = $this->article_model->get_method('app_category');
                $nameExists = false;
                foreach ($categories as $cat_data){
                    if (strtolower($name) === $cat_data['name']){
                        $nameExists = true;
                        break; // Sortie de la boucle dès qu'on trouve une correspondance
                    }
                }
                if ($nameExists) {
                    $query = "$name existe déjà";
                } else {
                    $category = array(
                        "name" => strtolower($name),
                        'date_update' => date("Y-m-d H:i:s")
                    );
                    $query = $this->article_model->update_method('app_category', $category, array('category_id' => $category_id));
                }

                $response = array('reponse' => $query);
            }
        } else {
            $response = array('reponse' => false);
        }

        echo json_encode($response);
    }


    function delete_category()
    {
        $category_id = $this->input->post('category_id');
        $data_delete = $this->article_model->delete_mod('app_category', array('category_id' => $category_id));
        $sous_categories = $this->article_model->get_method_where('app_sous_category', array('cat_id' => $category_id));
        foreach ($sous_categories as $s_cat){
            $data_delete_ = $this->article_model->delete_mod('app_sous_category', array('sous_category_id' => $s_cat['sous_category_id']));
        }

        if ($data_delete == true) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function delete_cat_selected()
    {
        $category_id = $this->input->post('category_id');
        $data_delete = false;
        foreach ($category_id as $item) {
            $sous_categories = $this->article_model->get_method_where('app_sous_category', array('cat_id' => $item));
            foreach ($sous_categories as $s_cat){
                $data_delete = $this->article_model->delete_mod('app_sous_category', array('sous_category_id' => $s_cat['sous_category_id']));
            }
            $data_delete = $this->article_model->delete_mod('app_category', array('category_id' => $item));
        }

        if ($data_delete == true) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }


    function get_sous_categories()
    {
        $data['onglet_title'] = "Liste des sous-catégories";
        $data['categories'] = $this->article_model->get_method('app_category');
        $data['sous_categories'] = $this->article_model->get_method('app_sous_category');
        $this->load->view('article/sous_category_view', $data);
    }

    function get_sous_categories_by_cat()
    {
        if ($_POST) {
            $this->form_validation->set_rules('cat_id', "category_id", 'required');
            if ($this->form_validation->run()) {
                $cat_id = $this->input->post("cat_id");

                $query= $this->article_model->get_method_where('app_sous_category', array('cat_id' => $cat_id));
                echo json_encode($query);
            }
        }
    }

    function add_sous_category()
    {
        if ($_POST) {
            $this->form_validation->set_rules('name[]', "nom", 'required');
            if ($this->form_validation->run()) {
                $names = $this->input->post("name");
                $cat_id = $this->input->post("cat_id");
                $sous_categories = $this->article_model->get_method_where('app_sous_category', array('cat_id' => $cat_id));

                foreach ($names as $name) {
                    $nameExists = false;

                    foreach ($sous_categories as $scat_data){
                        if (strtolower($name) === $scat_data['name']){
                            $nameExists = true;
                            break; // Sortie de la boucle dès qu'on trouve une correspondance
                        }
                    }

                    if ($nameExists) {
                        $query = "$name existe déjà";
                    } else {
                        $sous_category = array(
                            "name" => strtolower($name),
                            "cat_id" => $cat_id,
                            'date_add' => date("Y-m-d H:i:s")
                        );
                        $query = $this->article_model->add_method('app_sous_category', $sous_category);
                    }

                    $response = array('reponse' => $query);
                }
            }
        } else {
            $response = array('reponse' => false);
        }

        echo json_encode($response);
    }

    function edit_sous_category()
    {
        if ($_POST) {
            $this->form_validation->set_rules('name_sou_cat', "nom", 'required');
            if ($this->form_validation->run()) {
                $sous_category_id = $this->input->post('sous_category_id');
                $name = $this->input->post("name_sou_cat");
                $cat_id = $this->input->post("cat_id");
                $sous_categories = $this->article_model->get_method_where('app_sous_category', array('cat_id' => $cat_id));
                $nameExists = false;
                foreach ($sous_categories as $scat_data){
                    if (strtolower($name) === $scat_data['name']){
                        $nameExists = true;
                        break; // Sortie de la boucle dès qu'on trouve une correspondance
                    }
                }
                if ($nameExists) {
                    $query = "$name existe déjà";
                } else {
                    $sous_category = array(
                        "name" => strtolower($name),
                        'date_update' => date("Y-m-d H:i:s")
                    );
                    $query = $this->article_model->update_method('app_sous_category', $sous_category, array('sous_category_id' => $sous_category_id));
                }

                $response = array('reponse' => $query);
            }
        } else {
            $response = array('reponse' => false);
        }

        echo json_encode($response);
    }


    function delete_sous_category()
    {
        $sous_category_id = $this->input->post('sous_category_id');
        $data_delete = $this->article_model->delete_mod('app_sous_category', array('sous_category_id' => $sous_category_id));

        if ($data_delete == true) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function delete_sous_cat_selected()
    {
        $sous_category_id = $this->input->post('sous_category_id');
        $data_delete = false;
        foreach ($sous_category_id as $item) {
            $data_delete = $this->article_model->delete_mod('app_sous_category', array('sous_category_id' => $item));
        }

        if ($data_delete == true) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function get_article_marque()
    {
        $data['onglet_title'] = "Liste des marques";
        $data['marques'] = $this->article_model->get_method('app_article_marque');
        $this->load->view('article/marque_article_view', $data);
    }

    function add_article_marque()
    {
        if ($_POST) {
            $this->form_validation->set_rules('name[]', "nom", 'required');
            if ($this->form_validation->run()) {
                $names = $this->input->post("name");

                foreach ($names as $name) {
                    $article_marque = array(
                        "name" => strtolower($name),
                        'date_add' => date("Y-m-d H:i:s")
                    );
                    $query = $this->article_model->add_method('app_article_marque', $article_marque);
                }
                $response = array('reponse' => $query);
            }
        } else {
            $response = array('reponse' => false);
        }

        echo json_encode($response);
    }

    function edit_article_marque()
    {
        if ($_POST) {
            $this->form_validation->set_rules('name_marq', "nom", 'required');
            if ($this->form_validation->run()) {
                $article_marque_id = $this->input->post('article_marque_id');
                $name = $this->input->post("name_marq");
                $article_marque = array(
                    "name" => strtolower($name),
                    'date_update' => date("Y-m-d H:i:s")
                );
                $query = $this->article_model->update_method('app_article_marque', $article_marque, array('article_marque_id' => $article_marque_id));

                $response = array('reponse' => $query);
            }
        } else {
            $response = array('reponse' => false);
        }

        echo json_encode($response);
    }


    function delete_article_marque()
    {
        $article_marque_id = $this->input->post('article_marque_id');
        $data_delete = $this->article_model->delete_mod('app_article_marque', array('article_marque_id' => $article_marque_id));

        if ($data_delete == true) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function delete_article_marque_selected()
    {
        $article_marque_id = $this->input->post('article_marque_id');
        $data_delete = false;
        foreach ($article_marque_id as $item) {
            $data_delete = $this->article_model->delete_mod('app_article_marque', array('article_marque_id' => $item));
        }

        if ($data_delete == true) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }
}
