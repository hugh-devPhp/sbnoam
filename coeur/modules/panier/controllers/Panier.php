<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Panier extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('panier_model');
        $this->load->model('compte/compte_model');
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
        $donnees['infos'] = $this->article_model->get_method('app_infos_gen');
        $nom = $this->session->userdata("nom");

        $donnees['paniers'] = panier();


        $donnees['page_content'] = "panier_view";
        $this->load->view('index', $donnees);


    }


    function verification(){


        $donnees['categories'] = $this->article_model->get_method('app_category');
        $donnees['sous_categories'] = $this->article_model->get_method('app_sous_category');
        $paniers = panier();
        $donnees['articles'] = $paniers['data'];
        $donnees['menu_actif'] = "inscription";
        $donnees['infos'] = $this->article_model->get_method('app_infos_gen');
        $donnees['client'] = infos_client();




        $donnees['page_content'] = "verification_view";
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

    function commande(){
        client_in();
        if($_POST){

            $id_client = $this->session->userdata("id_client");
            $nom = $this->input->post("nom_complet");
            $ville = $this->input->post("ville");
            $commune = $this->input->post("commune");
            $quartier = $this->input->post("quartier");
            $contact = $this->input->post("contact");
            $courte_description = $this->input->post("text");
            $mode_livraison = $this->input->post("mode_livraison");

            $numero_commande = $this->generateNumeroCommande();

            $panier = panier();

            $commande = array(
                "numero_commande" => $numero_commande,
                "montant_commande" => $panier['prix_article'],
                "nb_article_commande" => $panier['nb_article'],
                "date_commande" => date("Y-m-d H:i:s"),
                "id_client_commande" => $id_client,
                "nom_recepteur" => $nom,
                "ville_recepteur" => $ville,
                "commune_recepteur" => $commune,
                "quartier_recepteur" => $quartier,
                "contact_recepteur" => $contact,
                "statut_comande" => "en attente",
                "description_livraison" => $courte_description,
                "mode_livraison" => $mode_livraison,
            );


            $id_commande = $this->panier_model->add_commande($commande);


            $articles = $panier['data'];

            if(!empty($articles)){

                foreach ($articles as $article){
                    $id_article = $article['article_id'];
                    $designation = $article['designation'];
                    $quantite = $article['qty'];
                    if((int)$article['prix_promo']>0){ $prix =  $article['prix_promo']; }else{ $prix = $article['prix']; }
//                    $prix = $article['prix'];
                    $image = $article['image_principale_article'];
                    $date = date("d/m/y H:i:s");

                    $item = array(
                        "id_cmd"=>$id_commande,
                        "id_article"=>$id_article,
                        "client_id" => $id_client,
                        "designation_article"=>$designation,
                        "quantite_article"=>$quantite,
                        "image_article"=>$image,
                        "prix"=>$prix,
                        "date_add"=>$date,
                    );
                    $this->panier_model->add_article_commande($item);

                }

            }



            $this->panier_model->vider_panier();

            redirect("panier");
        }
    }
















}


