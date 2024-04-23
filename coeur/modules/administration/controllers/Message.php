<?php defined('BASEPATH') or exit('No direct script access allowed');

class Message extends MX_Controller
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
        $nom_module = 'message';
        $blocmenu = "liste_message";
        $pages_title = "Gestion des messages";
        $data = $this->tplconfig_model->configmenu($nom_module, $blocmenu, $pages_title, $adtab);
        //var_dump($data);
        $this->load->view('intro_view', $data);
    }

    function get_messages()
    {
        $data['onglet_title'] = "Liste des messages";
        $data['messages'] = $this->information_model->get_messages();
        $this->load->view('admin_corporate/messages_view', $data);
    }

    function get_message()
    {
        $message_id = $this->input->post("message_id");
        $data = array(
            'is_read' => true,
        );
        $this->article_model->update_method('app_messages', $data, array('message_id'=>$message_id));
        $message = $this->article_model->get_method_where('app_messages', array('message_id'=>$message_id));
        echo json_encode($message[0]);
    }

}