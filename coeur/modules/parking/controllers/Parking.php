<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Parking extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('parking_model');
        $this->load->model('administration/automobile_model');
        $this->load->model('administration/article_model');

    }


    function index($page=null){


        $donnees['menu_actif'] = "parking";
        $donnees['page_content'] = "packing_view";
        $donnees['infos'] = $this->article_model->get_method('app_infos_gen');
        $donnees['sliders'] = $this->article_model->get_method('app_sliders');
        $donnees['offers'] = $this->article_model->get_method('app_offer');
        $donnees['marques'] = $this->parking_model->get_marque();
        $type = $this->input->get('type');

        $id_marque = $this->input->get('marque');
        $transmission = $this->input->get('transmission');
        $data = array('type' => $type, 'marque' => $id_marque, 'transmission' => $transmission);
//        $query_string = http_build_query($data);
        $base_url = base_url('parking/index/');
        $donnees['type_selected'] = $donnees['marque_selected'] = $donnees['transmission_selected'] = array();
        if(!empty($type) && !is_null($type)){
            $donnees['type_selected'] = explode(",", $type);
        }

        if(!empty($id_marque) && !is_null($id_marque)){
            $donnees['marque_selected'] = explode(",", $id_marque);
        }

        if(!empty($transmission) && !is_null($transmission)){
            $donnees['transmission_selected'] = explode(",", $transmission);
        }

        $config['base_url'] = $base_url;
        $config['total_rows'] = $donnees['total'] = $this->parking_model->nb_vehicule($type, $id_marque, $transmission);
        $config['per_page'] = nb_vehicule(); // Nombre d'éléments à afficher par page
        $config['use_page_numbers'] = true; // Nombre d'éléments à afficher par page
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
        $config['préfixe'] = '' ;
        $config['suffixe'] = '' ;
        $config['reuse_query_string'] = True;
        $config['use_global_url_suffix'] = false;
        $config['enable_query_strings'] = True;
        $config['page_query_string'] = True;

        $config['uri_segment'] = 3; // Segment URI contenant le numéro de la page
        $this->pagination->initialize($config);
//        echo $this->pagination->create_links();
//        exit();
        $page = $this->input->get("per_page");
        $donnees['vehicules'] = $vehicules =  $this->parking_model->liste_vehicule(nb_vehicule(),$page, $type, $id_marque, $transmission);

//        echo "<pre>";
//        var_dump($donnees['vehicules']);
//        echo "</pre>";
        $this->load->view('index', $donnees);

    }

    function auto($page=null){
        $donnees['menu_actif'] = "parking";
        $donnees['page_content'] = "packing_view";
        $donnees['infos'] = $this->article_model->get_method('app_infos_gen');
        $donnees['sliders'] = $this->article_model->get_method('app_sliders');
        $donnees['offers'] = $this->article_model->get_method('app_offer');
        $type = $this->input->get('category');
        $id_marque = $this->input->get('marque');
        $transmission = $this->input->get('transmission');
        $config['base_url'] = base_url("parking/auto/");
        $config['total_rows'] = count($this->automobile_model->liste_vehicule());
        $config['per_page'] = nb_vehicule(); // Nombre d'éléments à afficher par page
        $config['use_page_numbers'] = true; // Nombre d'éléments à afficher par page
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
        $config['uri_segment'] = 3; // Segment URI contenant le numéro de la page
        $donnees['vehicules'] = $vehicules =  $this->parking_model->liste_vehicule(nb_vehicule(),$this->uri->segment(3), $type, $id_marque, $transmission );
        $donnees['marques'] = $this->parking_model->get_marque();
//        echo "<pre>";
//        var_dump($donnees['vehicules']);
//        echo "</pre>";
        $this->load->view('index', $donnees);

    }

    function detail_automobile($id_auto){
        $donnees['menu_actif'] = "parking";
        $donnees['vehicules'] = $this->automobile_model->liste_vehicule();
        $donnees['vehicule']=$this->automobile_model->get_vehicule($id_auto);
        $donnees['page_content'] = "detail_auto_view";
        $donnees['infos'] = $this->article_model->get_method('app_infos_gen');
        $this->load->view('index', $donnees);

    }

    function generateNumeroCommande() {
        $orderNumber = '';

        // Ajout de la date sous forme de YYMMDD
        $orderNumber .= date('ymd');

        // Ajout de l'heure, des minutes et des secondes sous forme de HHMMSS
        $orderNumber .= date('His');

        // Ajout de chiffres aléatoires pour compléter la longueur à 10 chiffres
        $remainingLength = 10 - strlen($orderNumber);
        for ($i = 0; $i < $remainingLength; $i++) {
            $orderNumber .= mt_rand(0, 9);
        }

        return $orderNumber;
    }

    function add_reservation()
    {
        $post = $this->input->post();

        $id_auto = $post['id_auto'];
        $vehicule = $this->automobile_model->get_vehicule($id_auto);
        $prix = $vehicule['prix_auto'];
        $nom = $post['nom'];
        $email = $post['email'];
        $contact = $post['contact'];
        $adresse = $post['adresse'];
        $destination = $post['destination'];
        $paiement = $post['paiement'];
        $date_debut = "";
        if (isset($post['date_debut'])){
            $date_debut = $post['date_debut'];
        }


        $date_fin = "";
        if (isset($post['date_fin'])){
            $date_fin = $post['date_fin'];
        }
        $id_client = $this->session->userdata("id_client");
        $numero_reservation = $this->generateNumeroCommande();
        $data = array(
            "numero_reserv"=>$numero_reservation,
            "nom"=>$nom,
            "telephone"=>$contact,
            "email"=>$email,
            "address"=>$adresse,
            "prix_reserv"=>$prix,
            "date_debut"=>$date_debut,
            "date_fin"=>$date_fin,
            "id_client"=>$id_client,
            "destination"=>$destination,
            "moyen_paiement"=>$paiement,
            "id_vehicule"=>$id_auto,
            "statut"=>"en attente",
            'date_add' => date("Y-m-d H:i:s")
        );

        $resultat= $this->parking_model->add_reservation($data);
        $this->session->set_flashdata('success', "Votre reservation est été envoyé");

        redirect('parking/detail_automobile/'.$id_auto);

    }














}


