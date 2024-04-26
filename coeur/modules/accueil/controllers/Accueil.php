<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends MX_Controller {

    public function __construct() {
        parent::__construct();
        visitor();
        $this->load->model('panier/panier_model');
        $this->load->model('accueil_model');
        $this->load->model('administration/article_model');
        $this->load->model('administration/adminacl_model');
        $this->load->model('administration/administration_model');
        $this->load->model('administration/configuration_model');
        $this->load->model('administration/tplconfig_model');
        $this->load->model('administration/information_model');
    }


    function index(){

        $donnees['categories'] = $this->article_model->get_method('app_category');
        $donnees['sous_categories'] = $this->article_model->get_method('app_sous_category');
        $donnees['articles'] = $this->article_model->get_method('app_article');
        $infos = $this->information_model->get_information();
        $donnees['infos'] = (array)$infos[0];
        $donnees['sliders'] = $this->article_model->get_method('app_sliders');
        $donnees['offers'] = $this->accueil_model->offre();

        $donnees['menu_actif'] = "accueil";
        $this->load->view('index', $donnees);

    }

    function insert_cart(){
        $id_client = $this->session->userdata("id_client");
        $id_article = $this->input->post('article_id');
        $nom = $this->input->post('nom');
        $prix = $this->input->post('prix');
        $resultat = "sfsd";
        if(is_null($id_client)){

            $data = array(
                "id" => $id_article,
                "qty" => 1,
                "price" => (int)$prix,
                "name" => "$nom",
                "option" => array("type_produit"=>"1"),
            );

            $resultat = $this->cart->insert($data);
        }


        echo json_encode($resultat);
        exit();
        echo "<pre>";
        var_dump($id_client);
        echo "</pre>";
    }

    function insert_favoris($id, $prix){

        $data = array(
            "id" => "$id",
            "qty" => 1,
            "price" => (int)$prix,
            "name" => "gfrthrt",
            "option" => array("type_produit"=>"1", 'est_favoris'=>"1"),
        );

        $resultat = $this->cart->insert($data);

        $carts = $this->cart->contents();
        $favoris = $this->get_favoris();

        $response = array('result'=>1, "data" => $favoris);
        echo json_encode($response);
    }

    function insert_panier($id, $prix){

        $id_client = $this->session->userdata("id_client");

        if(isset($id_client) && $id_client){


            $article_panier = $this->panier_model->get_article_panier($id);

            if(!empty($article_panier)){
                $qte = (int)$article_panier['quantite_panier'] + 1;
                $data['quantite_panier'] = (int)$qte;
                $id_panier = $article_panier['id_panier'];

                $this->panier_model->update_panier($id_panier, $data);

            }else{
                $article = array('article_id'=>$id, "quantite_panier"=>1, "client_id"=>$id_client);
                $this->panier_model->add_panier($article);
            }

            $panier = panier();
            $response = array('result'=>1, "data" => panier());
        }else{
            $data = array(
                "id" => "$id",
                "qty" => 1,
                "price" => (int)$prix,
                "name" => "gfrthrt",
                "option" => array("type_produit"=>"1", 'est_favoris'=>"0"),
            );

            $test = $this->cart->insert($data);

            $response = array('result'=>1, "data" => panier());
        }



        echo json_encode($response);
    }

    function count_cart(){
        $response = array('result'=>1, "data" => panier());
        echo json_encode($response);
    }

    function reduit_panier($id){

        $id_client = $this->session->userdata("id_client");
        if(!isset($id_client) || $id_client == ""){
            // Supposez que vous ayez un identifiant d'article et une nouvelle quantité
            $item_id = $id;
            $cart_contents = $this->cart->contents();

// Recherchez l'identifiant de l'article spécifique dans le panier
            foreach ($cart_contents as $item) {
                if ($item['id'] === $item_id) {
                    $row_id = $item['rowid'];
                    $qte = (int)$item['qty'];
                    break;
                }
            }
// Trouvez l'identifiant de la ligne correspondant à l'article dans le panier

// Mettez à jour la quantité de l'article dans le panier
            $qte--;
            $data = array(
                'rowid' => $row_id,
                'qty'   => $qte
            );

            $this->cart->update($data);

        }else{
            $article_panier = $this->panier_model->get_article_panier($id);

            $qte = (int)$article_panier['quantite_panier'] - 1;
            $data['quantite_panier'] = (int)$qte;
            $id_panier = $article_panier['id_panier'];

            $this->panier_model->update_panier($id_panier, $data);
        }
        $response = array('result'=>1, "data" => panier());
        echo json_encode($response);
    }

    function get_panier(){
        $carts = $this->cart->contents();

        $data = array();
        $data['nb_article'] = 0;
        $data['prix_article'] = 0;
        if(!empty($carts)){
            foreach ($carts as $key=>$cart){
                if(isset($cart['option']['est_favoris']) && $cart['option']['est_favoris'] == '0'){
                    $data['nb_article'] += $cart['qty'];
                    $data['prix_article'] += $cart['price'];
                    $data['data'][] = $cart;
                }


            }
        }


        return $data;
        echo json_encode($data);
    }

    function get_cart(){
        $carts = $this->cart->contents();

        $data['nb_article'] = 0;
        $data['prix_article'] = 0;
        if(!empty($carts)){
            foreach ($carts as $key=>$cart){
                if(isset($cart['option']['est_favoris']) && $cart['option']['est_favoris'] == '0'){
                    $data['nb_article'] += $cart['qty'];
                    $data['prix_article'] += $cart['subtotal'];
                    $data['data'][] = $cart;
                }


            }
        }
        echo "<pre>";
        var_dump($carts);
        var_dump($data);
        echo "</pre>";
    }

    function update_cart(){
        $data = array(
            'rowid' => "1",
            'qty' => 4,
            'price' => 4000
        );

        $this->cart->update($data);


    }

    function delete_cart()
    {

        $resultat = $this->cart->destroy();
        echo "<pre>";
        var_dump($resultat);
        echo "</pre>";
    }

    function delete_panier($id)
    {
        if ($this->session->userdata('id_client') == false ) {
            $item_id = $id;
            $cart_contents = $this->cart->contents();

// Recherchez l'identifiant de l'article spécifique dans le panier
            foreach ($cart_contents as $item) {
                if ($item['id'] === $item_id) {
                    $row_id = $item['rowid'];
                    break;
                }
            }
// Trouvez l'identifiant de la ligne correspondant à l'article dans le panier

// Mettez à jour la quantité de l'article dans le panier

            $data = array(
                'rowid' => $row_id,
                'qty'   => 0
            );

            $resultat = $this->cart->update($data);
        }else{

            $resultat = $this->panier_model->delete_panier($id);


        }
        echo json_encode("ok");
    }

    function vider_favoris(){
        // Récupérer les éléments actuels du panier
        $cart_contents = $this->cart->contents();

// Parcourir les éléments du panier
        foreach ($cart_contents as $item) {
            // Vérifier si l'option est_favorie est égale à 1
            if ($item['option']['est_favoris'] == 1) {
                // Supprimer cet élément du panier
                $data = array(
                    'rowid' => $item['rowid'],
                    'qty' => 0 // Réduire la quantité à 0 pour supprimer l'élément
                );
                $this->cart->update($data);
            }
        }


        $result = $this->get_favoris();

        return $result;
    }
















}


