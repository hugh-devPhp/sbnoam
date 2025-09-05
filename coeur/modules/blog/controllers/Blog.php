<?php defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('administration/article_model');
        $this->load->model('administration/adminacl_model');
        $this->load->model('administration/administration_model');
        $this->load->model('administration/configuration_model');
        $this->load->model('administration/tplconfig_model');
        $this->load->model('administration/information_model');
        $this->load->library('pagination');
    }

    function index($page = null)
    {
        $config = array();
        $keyword = $this->input->get('keyword');
        $config["base_url"] = base_url() . "blog/index";
        $config["total_rows"] = $donnees['total'] = $this->article_model->get_blog_count('app_blog_article', $keyword);
        $config["per_page"] = 6;
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = true;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo;';
        $config['first_tag_open'] = '<li><a href="#"><i class="far fa-angle-double-left"></i>';
        $config['first_tag_close'] = '</a></li>';
        $config['last_link'] = '&raquo;';
        $config['last_tag_open'] = '<li><a href="#"><i class="far fa-angle-double-right"></i>';
        $config['last_tag_close'] = '</a></li>';
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
        $donnees['articles_page'] = $this->article_model->get_blog_articles($config["per_page"], $this->uri->segment(3), 'app_blog_article', $keyword);
        $donnees['nb_article_per_page'] = count($donnees['articles_page']);
        $donnees['recent_articles'] = $this->article_model->get_recent_blog_articles('app_blog_article', 5);
        $donnees['categories'] = $this->article_model->get_blog_categories('app_blog_article');
        $infoss = $this->information_model->get_information();
        $donnees['infos'] = (array)$infoss[0];
        $donnees['menu_actif'] = "Blog";
        $donnees['title'] = "Blog";
        $donnees['keyword'] = $keyword;
        $this->load->view('blog-list', $donnees);
    }

    function grid($page = null)
    {
        $config = array();
        $keyword = $this->input->get('keyword');
        $config["base_url"] = base_url() . "blog/grid";
        $config["total_rows"] = $donnees['total'] = $this->article_model->get_blog_count('app_blog_article', $keyword);
        $config["per_page"] = 9;
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = true;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo;';
        $config['first_tag_open'] = '<li><a href="#"><i class="far fa-angle-double-left"></i>';
        $config['first_tag_close'] = '</a></li>';
        $config['last_link'] = '&raquo;';
        $config['last_tag_open'] = '<li><a href="#"><i class="far fa-angle-double-right"></i>';
        $config['last_tag_close'] = '</a></li>';
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
        $donnees['articles_page'] = $this->article_model->get_blog_articles($config["per_page"], $this->uri->segment(3), 'app_blog_article', $keyword);
        $donnees['nb_article_per_page'] = count($donnees['articles_page']);
        $donnees['recent_articles'] = $this->article_model->get_recent_blog_articles('app_blog_article', 5);
        $donnees['categories'] = $this->article_model->get_blog_categories('app_blog_article');
        $infoss = $this->information_model->get_information();
        $donnees['infos'] = (array)$infoss[0];
        $donnees['menu_actif'] = "Blog";
        $donnees['title'] = "Blog";
        $donnees['keyword'] = $keyword;
        $this->load->view('blog-grid', $donnees);
    }

    function detail($article_id)
    {
        $donnees['article'] = $this->article_model->get_blog_article_detail('app_blog_article', array('article_id' => $article_id));
        
        if (empty($donnees['article'])) {
            redirect('blog');
        }
        
        $donnees['recent_articles'] = $this->article_model->get_recent_blog_articles('app_blog_article', 5);
        $donnees['categories'] = $this->article_model->get_blog_categories('app_blog_article');
        $donnees['related_articles'] = $this->article_model->get_related_blog_articles('app_blog_article', $article_id, 3);
        
        $infoss = $this->information_model->get_information();
        $donnees['infos'] = (array)$infoss[0];
        $donnees['menu_actif'] = "Blog";
        $donnees['title'] = $donnees['article'][0]['title'];
        $this->load->view('blog-details', $donnees);
    }
} 