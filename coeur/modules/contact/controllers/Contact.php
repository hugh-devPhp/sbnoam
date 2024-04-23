<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('administration/article_model');
        $this->load->model('contact_model');
    }


    function index(){
        $donnees['menu_actif'] = "contact";
        $donnees['infos'] = $this->article_model->get_method('app_infos_gen');
        $donnees['categories'] = $this->article_model->get_method('app_category');
        $donnees['sous_categories'] = $this->article_model->get_method('app_sous_category');

        $this->load->view('index', $donnees);

    }

    function message(){




        $nom = $this->input->post('nom');
        $contact = $this->input->post('phone');
        $email = $this->input->post('email');
        $objet = $this->input->post('objet');
        $message = $this->input->post('message');

        $data = array("nom"=>$nom, "telephone"=>$contact, "email"=>$email, "objet"=>$objet, "message"=>$message, "date_add"=>date('Y-m-d'), "is_read"=>0);

        $resultat = $this->contact_model->add_contact($data);

        $this->session->set_flashdata('success', "Votre message a bien été envoyé");

        redirect('contact');

//            $email = strtolower($email);
//            $message_form = "<p><strong> Prospect : </strong> ".$nom." ".$prenom."</p>";
//            $message_form .= "<p><strong>Email  : </strong>".$email."</p>";
//            $message_form .= "<p><strong>Objet  : </strong>".$objet."</p>";
//            $message_form .= "<p><strong> Demande  : </strong>".$message."</p>";
//
//
//
//            $config['protocol'] = "smtp";
//            $config['smtp_host'] = "ssl://mail55.lwspanel.com";
//            $config['smtp_port'] = "465";
//            $config['smtp_user'] = "infos@safezone-it.com";
//            $config['smtp_pass'] = "Safezone123!";
//            $config['mailtype'] = "html";
//            $config['charset'] = "utf-8";
//            $config['wordwrap'] = TRUE;
//            $config['newline'] = "\r\n";




//            $message = "<p style='font: 18px 900 arial'>test</p>";

//            $this->load->library('email', $config);
//            $this->email->initialize($config);
//            $this->email->from('infos@safezone-it.com', 'Demande de Vedis');
//            $this->email->to("commercial@safezone-it.com");
//            $this->email->subject("$objet");
//            $this->email->message($message_form);
//            // $this->email->send();
//
//            if (!$this->email->send()) {
//                echo json_encode(show_error($this->email->print_debugger()));
//            }
//            else{
//                $this->session->set_flashdata("success", "Votre message a bien été envoyé");
//                redirect('contact');
//                echo json_encode(array("reponse"=>"1"));
//            }



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


