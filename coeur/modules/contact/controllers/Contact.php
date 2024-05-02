<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('administration/article_model');
        $this->load->model('contact_model');
        $this->load->model('administration/information_model');
    }


    function index(){
        $donnees['title'] = "Contactez nous";
        $donnees['menu_actif'] = "Contact";
        $donnees['categories'] = $this->article_model->get_method('app_category');
        $donnees['sous_categories'] = $this->article_model->get_method('app_sous_category');
        $infoss = $this->information_model->get_information();
        $donnees['infos'] = (array)$infoss[0];

        $this->load->view('index', $donnees);

    }

    function message(){
        $nom = $this->input->post('name');
        $contact = $this->input->post('phone');
        $email = $this->input->post('email');
        $objet = $this->input->post('subject');
        $message = $this->input->post('message');

        $data = array("nom"=>$nom, "telephone"=>$contact, "email"=>$email, "objet"=>$objet, "message"=>$message, "date_add"=>date('Y-m-d'), "is_read"=>0);

        $resultat = $this->contact_model->add_contact($data);

        $this->session->set_flashdata('success', "Votre message a bien été envoyé");

        redirect('contact');
    }

    function newletters(){
        $email = $this->input->post('email');


        $this->db->where('email',$email);
        $q = $this->db->get("cms_newletters");
        $newsletter = $q->result();

        if(count($newsletter)==0){
            $data = array("email"=>$email);
            $this->db->insert('cms_newletters',$data);
        }

        echo json_encode(true);
    }

















}


