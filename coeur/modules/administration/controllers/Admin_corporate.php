<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_corporate extends MX_Controller
{
    public function __construct()
    {

        parent::__construct();
        admin_in();
        $this->load->model('adminacl_model');
        $this->load->model('administration_model');
        $this->load->model('configuration_model');
        $this->load->model('tplconfig_model');
        $this->load->model('article_model');
        $this->load->model('information_model');


    }

    public function index($adtab = NULL)
    {
        if (is_null($adtab)) $adtab = "1";
        $nom_module = 'Admin_corporate';
        $blocmenu = "parametrage_site";
        $pages_title = "Gestion du corporate";
        $data = $this->tplconfig_model->configmenu($nom_module, $blocmenu, $pages_title, $adtab);
        //var_dump($data);
        $this->load->view('intro_view', $data);
    }

    function get_infos_gen()
    {
        $data['onglet_title'] = "Information générale";
        $infos=$this->information_model->get_information();
        $data['infos']=(array)$infos[0];
        $this->load->view('admin_corporate/infos_gen_view', $data);
    }

    function edit_infos_gen()
    {
        if ($_POST) {
            $this->form_validation->set_rules('email1', "email", 'required');
            if ($this->form_validation->run()) {
                $infos_id = $this->input->post('infos_id');
                $site_mail_1 = $this->input->post("email1");
                $site_mail_2 = $this->input->post("email1");
                $contact_1 = $this->input->post("contact1");
                $contact_2 = $this->input->post("contact2");
                $location = $this->input->post("location");
                $facebook = $this->input->post("facebook");

                //Upload Image
                $config['upload_path'] = './uploads/site';
                $config['allowed_types'] = 'jpeg|jpg|png|webp';
                $config['file_name'] = date("Y_m_d_H_i_s_") . rand();
                $this->upload->initialize($config);

                if ($this->upload->do_upload('logo')) {
                    $image = $this->upload->data('file_name');
                    $infos = array(
                        "site_mail_1" => strtolower($site_mail_1),
                        "site_mail_2" => strtolower($site_mail_2),
                        "contact_1" => $contact_1,
                        "contact_2" => $contact_2,
                        "location" => strtolower($location),
                        "facebook" => $facebook,
                        "site_logo" => $image,
                        'date_update' => date("Y-m-d H:i:s")
                    );
                } else {
                    $infos = array(
                        "site_mail_1" => strtolower($site_mail_1),
                        "site_mail_2" => strtolower($site_mail_2),
                        "contact_1" => strtolower($contact_1),
                        "contact_2" => strtolower($contact_2),
                        "location" => strtolower($location),
                        "facebook" => strtolower($facebook),
                        'date_update' => date("Y-m-d H:i:s")
                    );
                }
                $query = $this->article_model->update_method('app_infos_gen', $infos, array('infos_id' => $infos_id));

                $response = array('reponse' => $query);
            }
        } else {
            $response = array('reponse' => false);
        }

        echo json_encode($response);
    }

    function add_information(){
        if($_POST){

            $contact1 = $this->input->post('contact1');
            $contact2 = $this->input->post('contact2');
            $email = $this->input->post('email');
            $localisation = $this->input->post('localisation');
            $facebook = $this->input->post('facebook');
            $whatsapp = $this->input->post('whatsapp');
            $linkedIn = $this->input->post('linkedin');
            $instagram = $this->input->post('instagram');
            $tiktok = $this->input->post('tiktok');
            $description = $this->input->post('description');
            $id = $this->input->post('id');

            $config['upload_path'] = './uploads/logo';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['file_name'] = date("Y_m_d_H_i_s_") . rand();

            $img = array();


            $this->upload->initialize($config);

            if($this->upload->do_upload('logo')){
                $image = $this->upload->data('file_name');

                $data = array(
                    "contact1_info" => $contact1,
                    "contact2_info" => $contact2,
                    "email_info" => $email,
                    "localisation_info" => $localisation,
                    "lien_facebook" => $facebook,
                    "lien_whatsapp" => $whatsapp,
                    "lien_instagram" => $instagram,
                    "lien_tiktok" => $tiktok,
                    "lien_linkedIn" => $linkedIn,
                    "logo_info" => $image,
                    "court_description" => $description
                );




            }else{
                $data = array(
                    "contact1_info" => $contact1,
                    "contact2_info" => $contact2,
                    "email_info" => $email,
                    "localisation_info" => $localisation,
                    "lien_facebook" => $facebook,
                    "lien_whatsapp" => $whatsapp,
                    "lien_instagram" => $instagram,
                    "lien_tiktok" => $tiktok,
                    "lien_linkedIn" => $linkedIn,
                    "court_description" => $description
                );
            }
            $this->information_model->add_information($data, $id);

            echo json_encode(true);


        }
        else{

            redirect("admin_corporate/get_infos_gen");
        }
    }

    function get_sliders()
    {
        $data['onglet_title'] = "Sliders";
        $data['sliders'] = $this->article_model->get_method('app_sliders');
        $this->load->view('admin_corporate/slider_view', $data);
    }

    function add_slider()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->form_validation->set_rules('titre', 'titre', 'required');

            if ($this->form_validation->run()) {
                $titre = $this->input->post("titre");
                $description = $this->input->post("description");
                $price = $this->input->post("price");
                $lien_slider = $this->input->post("lien_slider");
                $bouton_label = $this->input->post("bouton_label");


                //Upload Image
                $config['upload_path'] = './uploads/site';
                $config['allowed_types'] = 'jpeg|jpg|png|webp';
                $config['file_name'] = date("Y_m_d_H_i_s_") . rand();

                // Charger la bibliothèque de téléchargement une seule fois
                $this->upload->initialize($config);
                if ($this->upload->do_upload('image')) {
                    $image = $this->upload->data('file_name');
                    $slider = array(
                        "titre" => strtolower($titre),
                        'date_add' => date("Y-m-d H:i:s"),
                        'price' => $price,
                        'description' => $description,
                        'lien_slider' => $lien_slider,
                        'bouton_label' => $bouton_label,
                        "slider_image" => $image
                    );
                    $rep = $this->article_model->add_method('app_sliders', $slider);

                    echo json_encode(true);
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    echo json_encode($error);
                }
            }
        } else {
            echo json_encode('Validation failed');
        }
    }

    function get_slider_for_edit()
    {
        $slider_id = $this->input->post("slider_id");
        $slider = $this->article_model->get_method_where('app_sliders', array( 'slider_id'=>$slider_id ));
        echo json_encode($slider[0]);
    }

    function edit_slider()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->form_validation->set_rules('titre', 'titre', 'required');

            if ($this->form_validation->run()) {
                $slider_id = $this->input->post("slider_id");
                $titre = $this->input->post("titre");
                $description = $this->input->post("description");
                $price = $this->input->post("price");
                $statut = $this->input->post("statut");
                $lien_slider = $this->input->post("lien_slider");
                $bouton_label = $this->input->post("bouton_label");

                //Upload Image
                $config['upload_path'] = './uploads/site';
                $config['allowed_types'] = 'jpeg|jpg|png|webp';
                $config['file_name'] = date("Y_m_d_H_i_s_") . rand();

                // Charger la bibliothèque de téléchargement une seule fois
                $this->upload->initialize($config);
                if ($this->upload->do_upload('slider')) {
                    $image = $this->upload->data('file_name');
                    $slider = array(
                        "titre" => strtolower($titre),
                        'date_update' => date("Y-m-d H:i:s"),
                        'price' => $price,
                        'description' => $description,
                        'lien_slider' => $lien_slider,
                        'bouton_label' => $bouton_label,
                        "slider_image" => $image,
                        "statut" => $statut
                    );
                } else {
                    $slider = array(
                        "titre" => strtolower($titre),
                        'date_update' => date("Y-m-d H:i:s"),
                        'price' => $price,
                        'description' => $description,
                        'lien_slider' => $lien_slider,
                        'bouton_label' => $bouton_label,
                        "statut" => $statut
                    );
                }
                $rep = $this->article_model->update_method('app_sliders', $slider, array('slider_id' => $slider_id));
                echo json_encode(true);
            }
        } else {
            echo json_encode('Validation failed');
        }
    }

    function delete_slider()
    {
        $slider_id = $this->input->post('slider_id');
        $data_delete = $this->article_model->delete_mod('app_sliders', array('slider_id' => $slider_id));

        if ($data_delete == true) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function get_special_offer()
    {
        $data['onglet_title'] = "offre special";
        $data['offers'] = $this->article_model->get_method('app_offer');
        $data['articles'] = $this->article_model->get_method('app_article');
        $this->load->view('admin_corporate/special_offer', $data);
    }

    function add_special_offer()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->form_validation->set_rules('product_id', 'id du produit', 'required');

            if ($this->form_validation->run()) {
                $product_id = $this->input->post("product_id");
//                $prix_promo = $this->input->post("prix_promo");
                $date_fin = $this->input->post("date_fin");

                $offers = array(
                    "article_id" => $product_id,
                    'date_add' => date("Y-m-d H:i:s"),
                    'date_fin' => $date_fin,
                );
                $offers = $this->article_model->add_method('app_offer', $offers);

                echo json_encode(true);
            } else {
                echo json_encode('Validation failed');
            }
        }
    }

    function get_special_offer_edit()
    {
        $offer_id = $this->input->post("offre_id");
        $offer = $this->article_model->get_method_where('app_offer', array( 'offer_id'=>$offer_id ));
        echo json_encode($offer[0]);
    }

    function edit_special_offer()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->form_validation->set_rules('offre_id', 'id offre', 'required');

            if ($this->form_validation->run()) {
                $offer_id = $this->input->post("offre_id");
                $date_fin = $this->input->post("edit_date_fin");
                $statut = $this->input->post("statut");
                $offers = array(
                    'date_update' => date("Y-m-d H:i:s"),
                    'date_fin' => $date_fin,
                    'statut' => $statut,
                );
                $rep = $this->article_model->update_method('app_offer', $offers, array('offer_id' => $offer_id));
                echo json_encode(true);
            } else {
                echo json_encode('Validation failed');
            }
        }
    }

    function delete_special_offer()
    {
        $offer_id = $this->input->post('offre_id');
        $data_delete = $this->article_model->delete_mod('app_offer', array('offer_id' => $offer_id));

        if ($data_delete == true) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

}