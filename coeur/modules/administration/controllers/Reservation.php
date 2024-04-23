<?php defined('BASEPATH') or exit('No direct script access allowed');

class Reservation extends MX_Controller
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
        $this->load->model('automobile_model');
        $this->load->model('configvehicule_model');


    }

    public function index($adtab = NULL)
    {
        if (is_null($adtab)) $adtab = "1";
        $nom_module = 'reservation';
        $blocmenu = "gestion_reservation";
        $pages_title = "Gestion des reservation";
        $data = $this->tplconfig_model->configmenu($nom_module, $blocmenu, $pages_title, $adtab);
        //var_dump($data);
        $this->load->view('intro_view', $data);
    }

    function get_reservations()
    {


        $data['onglet_title'] = "Liste des reservation";
        $data['reservations'] = $this->article_model->get_method('app_reservation');
        $data['autos']=$this->automobile_model->liste_vehicule();
        $this->load->view('reservation/reservation_view', $data);
    }

    function get_reservation()
    {

        $id_reserv = $this->input->post("id_reserv");
        $data['reservation'] = $this->article_model->get_method_where('app_reservation', array('id_reserv'=>$id_reserv));

        $id_vehicule = $data['reservation'][0]['id_vehicule'];
        $data['vehicule'] = $this->automobile_model->get_vehicule($id_vehicule);

        $where_marque = array('id_marque' => $data['vehicule']['marque_id']);
        $data['marque'] = $this->configvehicule_model->get_marque($where_marque);

        $where_model = array('id_model' => $data['vehicule']['model_id']);
        $data['model'] = $this->configvehicule_model->get_model_one($where_model);
        $this->load->view('reservation/detail_reservation', $data);
    }

    function edit_reserv_state(){
        $this->form_validation->set_rules('id_reserv', 'identifiant', 'required');

        if ($this->form_validation->run()) {
            $id_reserv = $this->input->post("id_reserv");
            $statut = $this->input->post("statut");
            $data = array(
                'statut' => $statut,
            );
            $reservation = $this->article_model->update_method('app_reservation', $data, array('id_reserv'=>$id_reserv));
            echo json_encode(true);
        } else {
            echo json_encode('Validation failed');
        }
    }

}