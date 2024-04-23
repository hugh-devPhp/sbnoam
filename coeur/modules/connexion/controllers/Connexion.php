<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Connexion extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('connexion_model');
        $this->load->model('panier/panier_model');
        $this->load->model('administration/article_model');
        $this->load->model('administration/adminacl_model');
        $this->load->model('administration/administration_model');
        $this->load->model('administration/Configvehicule_model');
        $this->load->model('administration/configuration_model');
        $this->load->model('administration/tplconfig_model');
        $this->load->model('administration/automobile_model');
    }


    function index(){


        $donnees['categories'] = $this->article_model->get_method('app_category');
        $donnees['sous_categories'] = $this->article_model->get_method('app_sous_category');
        $donnees['articles'] = $this->article_model->get_method('app_article');
        $donnees['menu_actif'] = "inscription";
        $this->load->view('index', $donnees);


    }

    function do_connexion(){

        if($_POST){

            $email = $this->input->post("login");
            $password = md5($this->input->post("password"));


            $data = array(
                "email_client" => $email,
                "password_client" => $password,
            );
            $resultat = $this->connexion_model->verification_client($data);

            if(empty($resultat)){
                $this->session->set_flashdata('error', "Login/Mot de passe incorrect");

                redirect('connexion');
            }else{
                $user = (array)$resultat[0];

                $carts = $this->cart->contents();

                $data = array();
                $data['nb_article'] = 0;
                $data['prix_article'] = 0;
                if(!empty($carts)) {
                    foreach ($carts as $key => $cart) {
                        if(isset($cart['option']['est_favoris']) && $cart['option']['est_favoris'] == '0') {
                            $id_article = $cart['id'];
                            $qty = (int)$cart['qty'];

                            $article = array('article_id'=>$id_article, "quantite_panier"=>$qty, "client_id"=>$user['id_client']);

                            $this->panier_model->add_panier($article);

                        }
                    }
                    $this->cart->destroy();
                }

                $this->session->set_userdata(array("nom" => $user['nom_complet_client'], "id_client" => $user['id_client']));
                redirect('compte');
            }

        }else{
            $donnees['categories'] = $this->article_model->get_method('app_category');
            $donnees['sous_categories'] = $this->article_model->get_method('app_sous_category');
            $donnees['articles'] = $this->article_model->get_method('app_article');
            $donnees['menu_actif'] = "inscription";
            $this->load->view('index', $donnees);
        }


    }
















}


