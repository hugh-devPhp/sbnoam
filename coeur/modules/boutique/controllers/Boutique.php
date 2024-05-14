<?php defined('BASEPATH') or exit('No direct script access allowed');

class Boutique extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('administration/article_model');
        $this->load->model('administration/adminacl_model');
        $this->load->model('administration/administration_model');
        $this->load->model('administration/configuration_model');
        $this->load->model('administration/tplconfig_model');
        $this->load->library('pagination');

    }


    function index()
    {
        $config = array();
        $config["base_url"] = base_url() . "boutique/boutique_view";
        $config["total_rows"] = $donnees['total'] = $this->article_model->get_count('app_article');
        $config["per_page"] = 17;
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = true;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo;';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = '&raquo;';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&rsaquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&lsaquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $donnees['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $donnees["link"] = $this->pagination->create_links();
        $donnees['articles_page'] = $this->article_model->get_articles($config["per_page"], $this->uri->segment(3), 'app_article');
        $donnees['nb_article_per_page'] = count($donnees['articles_page']);
        $donnees['marques'] = $this->article_model->get_method('app_article_marque');
        $donnees['categories'] = $this->article_model->get_method('app_category');
        $donnees['sous_categories'] = $this->article_model->get_method('app_sous_category');
        $donnees['pop_articles'] = $this->article_model->get_method_order_by('app_article');
        $donnees['infos'] = $this->article_model->get_method('app_infos_gen');

        $donnees['menu_actif'] = "boutique";
        $donnees['title'] = "boutique";
        $this->load->view('boutique_view', $donnees);

    }

    function article_detail($article_id)
    {
        $donnees['marques'] = $this->article_model->get_method('app_article_marque');
        $donnees['categories'] = $this->article_model->get_method('app_category');
        $donnees['sous_categories'] = $this->article_model->get_method('app_sous_category');
        $donnees['article'] = $this->article_model->get_method_where('app_article', array('article_id' => $article_id));
        $donnees['menu_actif'] = "boutique";
        $donnees['articles_images'] = $this->article_model->get_method('app_image');
        $articles_img = array();
        foreach ($donnees['articles_images'] as $image) {
            if ($image['article_id'] == $article_id) {
                $articles_img[] = array(
                    "id" => $image['image_id'],
                    "name" => $image['name'],
                );
            }
        }
        $donnees['articles_img'] = $articles_img;
        $donnees['infos'] = $this->article_model->get_method('app_infos_gen');

        $this->load->view('article_detail', $donnees);
    }

    function boutique_by_cat()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->form_validation->set_rules('cats_id[]', 'identifiant', 'required');

            if ($this->form_validation->run()) {
                $categories_id = $this->input->post("cats_id[]");

                foreach ($categories_id as $cat_id){
                    $donnee['article'] = $this->article_model->get_method_where('app_article', array('category_id' => $cat_id));
                    $donnee['article_page'] = $this->article_model->get_method_where_simple_deux('app_article', array('category_id' => $cat_id));

                    $donnees['articles_page'][] = $donnee['article_page'];
                    $donnees['articles'][] = $donnee['article'];
                }

                $donnees['infos'] = $this->article_model->get_method('app_infos_gen');
                $donnees['categories'] = $this->article_model->get_method('app_category');

                $donnees['menu_actif'] = "boutique";
                $this->load->view('article_by', $donnees);

            } else{
                echo  false;
            }
        }
    }

    function boutique_by_mark()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->form_validation->set_rules('marques_id[]', 'identifiant', 'required');

            if ($this->form_validation->run()) {
                $marques_id= $this->input->post("marques_id[]");

                foreach ($marques_id as $marque_id){
                    $donnee['article'] = $this->article_model->get_method_where('app_article', array('marque_id' => $marque_id));
                    $donnee['article_page'] = $this->article_model->get_method_where_simple_deux('app_article', array('marque_id' => $marque_id));

                    $donnees['articles_page'][] = $donnee['article_page'];
                    $donnees['articles'][] = $donnee['article'];
                }

                $donnees['infos'] = $this->article_model->get_method('app_infos_gen');
                $donnees['categories'] = $this->article_model->get_method('app_category');

                $donnees['menu_actif'] = "boutique";
                $this->load->view('article_by', $donnees);

            } else{
                echo  false;
            }
        }
    }

    function boutique_by_color()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->form_validation->set_rules('colors_id[]', 'identifiant', 'required');

            if ($this->form_validation->run()) {
                $colors_id= $this->input->post("colors_id[]");

                foreach ($colors_id as $color_id){
                    $donnee['article'] = $this->article_model->get_method_where('app_article', array('couleur_id' => $color_id));
                    $donnee['article_page'] = $this->article_model->get_method_where_simple_deux('app_article', array('couleur_id' => $color_id));

                    $donnees['articles_page'][] = $donnee['article_page'];
                    $donnees['articles'][] = $donnee['article'];
                }

                $donnees['infos'] = $this->article_model->get_method('app_infos_gen');
                $donnees['categories'] = $this->article_model->get_method('app_category');

                $donnees['menu_actif'] = "boutique";
                $this->load->view('article_by', $donnees);

            } else{
                echo  false;
            }
        }
    }

    function cat_boutique_view($cat_id)
    {
        $config = array();
        $config["base_url"] = base_url() . "boutique/cat_boutique_view/".$cat_id;
        $config["total_rows"] = $donnees['total'] = $this->article_model->get_count_where('app_article', array('category_id' => $cat_id));
        $config["per_page"] = 17;
        $config["uri_segment"] = 4;
        $config['use_page_numbers'] = true;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo;';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = '&raquo;';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&rsaquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&lsaquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $donnees['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $donnees["link"] = $this->pagination->create_links();
        $donnees['articles_page'] = $this->article_model->get_articles_where($config["per_page"], $this->uri->segment(4), 'app_article', array('category_id' => $cat_id));
        $donnees['nb_article_per_page'] = count($donnees['articles_page']);
        $donnees['marques'] = $this->article_model->get_method('app_article_marque');
        $donnees['categories'] = $this->article_model->get_method('app_category');
        $donnees['sous_categories'] = $this->article_model->get_method('app_sous_category');
        $donnees['articles'] = $this->article_model->get_method('app_article');
        $donnees['infos'] = $this->article_model->get_method('app_infos_gen');
        $donnees['category'] = $this->article_model->get_method_where('app_category', array('category_id' => $cat_id));

        $donnees['menu_actif'] = "boutique";
        $this->load->view('cat_boutique_view', $donnees);

    }

    function sous_cat_boutique_view($sous_cat_id)
    {
        $config = array();
        $config["base_url"] = base_url() . "boutique/sous_cat_boutique_view/".$sous_cat_id;
        $config["total_rows"] = $donnees['total'] = $this->article_model->get_count_where('app_article', array('sous_category_id' => $sous_cat_id));
        $config["per_page"] = 17;
        $config["uri_segment"] = 4;
        $config['use_page_numbers'] = true;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo;';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = '&raquo;';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&rsaquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&lsaquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $donnees['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $donnees["link"] = $this->pagination->create_links();
        $donnees['articles_page'] = $this->article_model->get_articles_where($config["per_page"], $this->uri->segment(4), 'app_article', array('sous_category_id' => $sous_cat_id));
        $donnees['nb_article_per_page'] = count($donnees['articles_page']);
        $donnees['marques'] = $this->article_model->get_method('app_article_marque');
        $donnees['categories'] = $this->article_model->get_method('app_category');
        $donnees['sous_categories'] = $this->article_model->get_method('app_sous_category');
        $donnees['infos'] = $this->article_model->get_method('app_infos_gen');
        $donnees['sous_category'] = $this->article_model->get_method_where('app_sous_category', array('sous_category_id' => $sous_cat_id));
        $donnees['category'] = $this->article_model->get_method_where('app_category', array('category_id' => $donnees['sous_category'][0]['cat_id']));
        $donnees['pop_articles'] = $this->article_model->get_method_order_by('app_article');
        $donnees['menu_actif'] = "boutique";
        $this->load->view('sous_cat_boutique_view', $donnees);

    }

}


