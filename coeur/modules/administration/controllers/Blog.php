<?php defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }

    public function index($adtab = NULL)
    {
        if (is_null($adtab)) $adtab = "1";
        $nom_module = 'blog';
        $blocmenu = "blogs";
        $pages_title = "Gestion article de blog";
        $data = $this->tplconfig_model->configmenu($nom_module, $blocmenu, $pages_title, $adtab);
        //var_dump($data);
        $this->load->view('intro_view', $data);
    }

    public function get_article_blog()
    {
        $data['articles'] = $this->article_model->get_all_blog_articles('app_blog_article');
        $data['onglet_title'] = "Liste des articles de blog";

        $this->load->view('blog/list', $data);
    }

    public function add_article_blog()
    {
        $data['action'] = 'add';
        $this->load->view('blog/form', $data);
    }

    public function edit_article_blog($id)
    {
        $data['action'] = 'edit';
        $data['article'] = $this->article_model->get_blog_article_detail('app_blog_article', array('article_id' => $id));
        if (empty($data['article'])) {
            redirect('administration/blog');
        }
        $this->load->view('blog/form', $data);
    }

    public function save_article_blog()
    {
        $this->form_validation->set_rules('title', 'Titre', 'required');
        $this->form_validation->set_rules('article_content', 'Contenu', 'required');
        $this->form_validation->set_rules('edit_pseudo', 'Auteur', 'required');
        $this->form_validation->set_rules('etat', 'Etat', 'required|in_list[0,1]');
        $this->form_validation->set_rules('category', 'Catégorie', 'required');

        $id = $this->input->post('article_id');
        $is_edit = !empty($id);

        if ($this->form_validation->run() == FALSE) {
            $data['action'] = $is_edit ? 'edit' : 'add';
            if ($is_edit) {
                $data['article'] = $this->article_model->get_blog_article_detail('app_blog_article', array('article_id' => $id));
            }
            $this->load->view('blog/form', $data);
            return;
        }

        // Gestion de l'image
        $image = null;
        if (!empty($_FILES['article_image']['name'])) {
            $config['upload_path'] = './uploads/articles/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('article_image')) {
                $image = $this->upload->data('file_name');
            } else {
                $data['upload_error'] = $this->upload->display_errors();
                $data['action'] = $is_edit ? 'edit' : 'add';
                if ($is_edit) {
                    $data['article'] = $this->article_model->get_blog_article_detail('app_blog_article', array('article_id' => $id));
                }
                $this->load->view('blog/form', $data);
                return;
            }
        }

        $data = array(
            'title' => $this->input->post('title'),
            'article_content' => $this->input->post('article_content'),
            'edit_pseudo' => $this->input->post('edit_pseudo'),
            'etat' => $this->input->post('etat'),
            'category' => $this->input->post('category'),
            'article_like' => $this->input->post('article_like') ? $this->input->post('article_like') : 0,
            'update_at' => date('Y-m-d H:i:s'),
        );
        if ($image) {
            $data['article_image'] = $image;
        }

        if ($is_edit) {
            $this->article_model->update_blog_article('app_blog_article', $data, array('article_id' => $id));
        } else {
            $data['create_at'] = date('Y-m-d H:i:s');
            $this->article_model->add_blog_article('app_blog_article', $data);
        }
        redirect('administration/blog');
    }

    public function delete_article_blog($id)
    {
        $this->article_model->delete_blog_article('app_blog_article', array('article_id' => $id));
        redirect('administration/blog');
    }
} 