<?php defined('BASEPATH') or exit('No direct script access allowed');

class Article extends MX_Controller
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
        $nom_module = 'article';
        $blocmenu = "articles";
        $pages_title = "Gestion article";
        $data = $this->tplconfig_model->configmenu($nom_module, $blocmenu, $pages_title, $adtab);
        //var_dump($data);
        $this->load->view('intro_view', $data);
    }

    function get_article_form()
    {
        $data['onglet_title'] = "Ajout article";
        $data['marques'] = $this->article_model->get_method('app_article_marque');
        $data['collection'] = $this->article_model->get_method('app_collection');
        $this->load->view('article/add_article', $data);
    }

    function get_articles()
    {
        $data['onglet_title'] = "Liste des articles";
        $data['collections'] = $this->article_model->get_method('app_collection');
        $data['articles'] = $this->article_model->get_method('app_article');
        $this->load->view('article/liste_article', $data);
    }

    function add_article() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") { // Vérification de la méthode de requête
            $this->form_validation->set_rules('name', 'name', 'required');

            if ($this->form_validation->run()) {
                $name = $this->input->post("name");
                $prix = $this->input->post("price");
                $prix_promo = $this->input->post("prix_promo");
                $stock = $this->input->post("qte");
                $garantie = $this->input->post("garantie");
                $collection = $this->input->post("collection");
                $description = $this->input->post("desc");
                $sku = $this->input->post("sku");

                $app_article_sku = $this->article_model->get_method_where('app_article', array('sku' => $sku));
                if ($app_article_sku){
                    $error = array('error' => 'SKU est déjà utilisé');
                    echo json_encode($error);
                }
                else {

                    //Upload Image
                    $config['upload_path'] = './uploads/articles';
                    $config['allowed_types'] = 'jpeg|jpg|png|webp';
                    $config['file_name'] = date("Y_m_d_H_i_s_") . rand();

                    // Charger la bibliothèque de téléchargement une seule fois
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('picture')) {
                        $image = $this->upload->data('file_name');
                        $article = array(
                            "designation" => strtolower($name),
                            'date_add' => date("Y-m-d H:i:s"),
                            'prix' => $prix,
                            'prix_promo' => $prix_promo,
                            'collection_id' => $collection,
                            'stock' => $stock,
                            'garantie' => $garantie,
                            'description' => $description,
                            "image_principale_article" => $image
                        );
                        $article_rep = $this->article_model->add_article('app_article', $article);

                        if (!empty($_FILES['images']) && $_FILES['images']['error'][0] == 0) {
                            // Récupération des fichiers multiples
                            $files = $_FILES['images'];
                            $img = array();

                            foreach ($files['name'] as $key => $name) {
                                $_FILES['image']['name'] = $files['name'][$key];
                                $_FILES['image']['type'] = $files['type'][$key];
                                $_FILES['image']['tmp_name'] = $files['tmp_name'][$key];
                                $_FILES['image']['error'] = $files['error'][$key];
                                $_FILES['image']['size'] = $files['size'][$key];

                                if ($this->upload->do_upload('image')) {
                                    $image_one = $this->upload->data('file_name');
                                    $img[] = array(
                                        "article_id" => $article_rep,
                                        "name" => $image_one,
                                        "path" => $image_one,
                                        'date_add' => date("Y-m-d H:i:s"),
                                    );
                                }
                            }
                            // Ajout des données d'image
                            $query_image = $this->article_model->add_array_method('app_image', $img);
                        }


                        echo json_encode(true);
                    } else {
                        $error = array('error' => $this->upload->display_errors());
                        echo json_encode($error); // Retourner les erreurs d'upload
                    }
                }
            } else {
                echo json_encode(array('error' => 'Validation failed')); // Retourner les erreurs de validation du formulaire
            }
        }
    }

    function delete_article()
    {
        $article_id = $this->input->post('article_id');
        $data_delete = $this->article_model->delete_mod('app_article', array('article_id' => $article_id));

        if ($data_delete == true) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function delete_article_selected()
    {
        $article_id = $this->input->post('article_id');
        $data_delete = false;
        foreach ($article_id as $item) {
            $data_delete = $this->article_model->delete_mod('app_article', array('article_id' => $item));
        }

        if ($data_delete == true) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function edit_article() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") { // Vérification de la méthode de requête
            $article_id = $this->input->post("article_id");
            $data['onglet_title'] = "Modification";
            $data['marques'] = $this->article_model->get_method('app_article_marque');
            $data['categories'] = $this->article_model->get_method('app_category');
            $data['sous_categories'] = $this->article_model->get_method('app_sous_category');
            $data['articles_images'] = $this->article_model->get_method('app_image');
            $articles_img = array();
            foreach ($data['articles_images'] as $image){
                if($image['article_id'] == $article_id){
                    $articles_img[] = array(
                        "id" => $image['image_id'],
                        "name" => $image['name'],
                    );
                }
            }
            $data['articles_img'] = $articles_img;
            $data['article'] = $this->article_model->get_method_where('app_article', array('article_id' => $article_id));
            $this->load->view('article/edit_article', $data);
        }
    }

    function edit_data_article(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->form_validation->set_rules('article_id', 'article_id', 'required');

            if ($this->form_validation->run()) {
                $article_id = $this->input->post("article_id");
                $name = $this->input->post("name");
                $prix = $this->input->post("price");
                $prix_promo = $this->input->post("prix_promo");
                $stock = $this->input->post("qte");
                $couleur_id = $this->input->post("color");
                $garantie = $this->input->post("garantie");
                $marque_id = $this->input->post("brand");
                $category_id = $this->input->post("cat");
                $sous_category_id = $this->input->post("s_cat");
                $description = $this->input->post("desc");
                $sku = $this->input->post("sku");
                $dimension = $this->input->post("dimension");
                $poids = $this->input->post("poids");

                $app_article_sku = $this->article_model->get_method_where('app_article', array('sku' => $sku));
                if (!empty($app_article_sku) and $app_article_sku[0]['article_id'] != $article_id){
                    $error = array('error' => 'SKU est déjà utilisé');
                    echo json_encode($error);
                }
                else {
                    //Upload Image
                    $config['upload_path'] = './uploads/articles';
                    $config['allowed_types'] = 'jpeg|jpg|png|webp';
                    $config['file_name'] = date("Y_m_d_H_i_s_") . rand();

                    // Charger la bibliothèque de téléchargement une seule fois
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('picture')) {
                        $image = $this->upload->data('file_name');
                        $article = array(
                            "designation" => strtolower($name),
                            'date_add' => date("Y-m-d H:i:s"),
                            'prix' => $prix,
                            'prix_promo' => $prix_promo,
                            'stock' => $stock,
                            'couleur_id' => $couleur_id,
                            'garantie' => $garantie,
                            'marque_id' => $marque_id,
                            'category_id' => $category_id,
                            'sous_category_id' => $sous_category_id,
                            'description' => $description,
                            'sku' => $sku,
                            'dimension' => $dimension,
                            'poids' => $poids,
                            "image_principale_article" => $image
                        );
                        $article_rep = $this->article_model->update_method('app_article', $article, array('article_id' => $article_id));
                    } else {
                        $error = array('error' => $this->upload->display_errors());
                        $article = array(
                            "designation" => strtolower($name),
                            'date_add' => date("Y-m-d H:i:s"),
                            'prix' => $prix,
                            'prix_promo' => $prix_promo,
                            'stock' => $stock,
                            'couleur_id' => $couleur_id,
                            'garantie' => $garantie,
                            'marque_id' => $marque_id,
                            'category_id' => $category_id,
                            'sous_category_id' => $sous_category_id,
                            'description' => $description,
                            'sku' => $sku,
                            'dimension' => $dimension,
                            'poids' => $poids,
                        );
                        $article_rep = $this->article_model->update_method('app_article', $article, array('article_id' => $article_id));
                    }
                    // Récupération des fichiers multiples
                    if (!empty($_FILES['images']) && $_FILES['images']['error'][0] == 0) {
                        $files = $_FILES['images'];
                        $img = array();
                        foreach ($files['name'] as $key => $name) {
                            $_FILES['image']['name'] = $files['name'][$key];
                            $_FILES['image']['type'] = $files['type'][$key];
                            $_FILES['image']['tmp_name'] = $files['tmp_name'][$key];
                            $_FILES['image']['error'] = $files['error'][$key];
                            $_FILES['image']['size'] = $files['size'][$key];

                            if ($this->upload->do_upload('image')) {
                                $image_one = $this->upload->data('file_name');
                                $img[] = array(
                                    "article_id" => $article_id,
                                    "name" => $image_one,
                                    "path" => $image_one,
                                    'date_add' => date("Y-m-d H:i:s"),
                                );
                            }
                        }
                        $query_image = $this->article_model->add_array_method('app_image', $img);
                    }

                    echo json_encode(true);
                }
            } else {
                echo json_encode(array('error' => 'Validation failed'));
            }
        }
    }

    function delete_article_image()
    {
        $image_id = $this->input->post('image_id');
        $data_delete = $this->article_model->delete_mod('app_image', array('image_id' => $image_id));

        if ($data_delete == true) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function detail_article(){
        $article_id = $this->input->post("article_id");
        $data['onglet_title'] = "Details article";
        $data['liste_active']=array(1 =>'Active', 0 =>'Inactive');
        $data['article'] = $this->article_model->get_method_where('app_article', array('article_id' => $article_id));
        $data['articles_images'] = $this->article_model->get_method('app_image');
        $data['categories'] = $this->article_model->get_method('app_category');
        $data['marques'] = $this->article_model->get_method('app_article_marque');
        $data['sous_categories'] = $this->article_model->get_method('app_sous_category');
        $articles_img = array();
        foreach ($data['articles_images'] as $image){
            if($image['article_id'] == $article_id){
                $articles_img[] = array(
                    "id" => $image['image_id'],
                    "name" => $image['name'],
                );
            }
        }
        $data['articles_img'] = $articles_img;
        $this->load->view('article/details_article_view',$data);
    }

}
