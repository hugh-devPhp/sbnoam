<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends MX_Controller {
    public function __construct(){

        parent::__construct();
        admin_in();
        $this->load->model('slider_model');
        $this->load->model('adminacl_model');
        $this->load->model('administration_model');
        $this->load->model('information_model');
        $this->load->model('configuration_model');
        $this->load->model('tplconfig_model');


    }

    public function index($adtab=NULL){
        if(is_null($adtab)) $adtab="1";
        $nom_module='information';
        $blocmenu="identite";
        $pages_title="Gestion des sliders";
        $data=$this->tplconfig_model->configmenu($nom_module, $blocmenu, $pages_title, $adtab);
        //var_dump($data);
        $this->load->view('intro_view',$data);
    }

    ///////////////////////////////////PROFILS//////////////////////////////////
    function get_information(){
        //desc_liste_des_sliders
        //print_r($this->session->all_userdata());
        $data['onglet_title']="Informations Générales";
        $infos=$this->information_model->get_information();
        $data['infos']=(array)$infos[0];

        $this->load->view('cms/informations_generales_view', $data);
    }

    function add_information(){
        if($_POST){

            /// Elements de mon post ///

            $contact1 = $this->input->post('contact1');
            $contact2 = $this->input->post('contact2');
            $email = $this->input->post('email');
            $localisation = $this->input->post('localisation');
            $facebook = $this->input->post('facebook');
            $tweeter = $this->input->post('tweeter');
            $linkedIn = $this->input->post('linkedIn');
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
                    "lien_tweeter" => $tweeter,
                    "lien_linkedIn" => $linkedIn,
                    "logo_info" => $image,
                    "court_description" => $description,
                );




            }else{
                $data = array(
                    "contact1_info" => $contact1,
                    "contact2_info" => $contact2,
                    "email_info" => $email,
                    "localisation_info" => $localisation,
                    "lien_facebook" => $facebook,
                    "lien_tweeter" => $tweeter,
                    "lien_linkedIn" => $linkedIn,
                    "court_description" => $description
                );
            }
            $this->information_model->add_information($data, $id);

            echo json_encode(true);


        }
        else{

            redirect("information");
        }
    }
    //////
    ///


}
