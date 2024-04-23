<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panier_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function add_panier($data)
    {
        $this->db->insert("app_panier", $data);


        return true;
    }

    function get_panier()
    {

        $id_client = $this->session->userdata("id_client");
        $this->db->where(array("client_id"=>$id_client));
        $email = $this->db->get("app_panier");
        $email = $email->result_array();


        return $email;
    }

    function update_panier($id, $data){
        $this->db->where('id_panier',$id);
        $this->db->update('app_panier',$data);
        return true;

    }

    function add_commande($data){

        $this->db->insert('app_commande', $data);

// Récupérer l'ID de la dernière ligne insérée
        $insert_id = $this->db->insert_id();

        return $insert_id;

    }

    function add_article_commande($data){

        $this->db->insert('app_commande_article', $data);

// Récupérer l'ID de la dernière ligne insérée
        $insert_id = $this->db->insert_id();

        return $insert_id;

    }

    function vider_panier(){

        $id_client = $this->session->userdata("id_client");
        $this->db->where(array("client_id"=>$id_client));
        $this->db->delete("app_panier");

        return true;

    }
    function delete_panier($id){

        $id_client = $this->session->userdata("id_client");
        $this->db->where(array("client_id"=>$id_client, "article_id"=>$id));
        $this->db->delete("app_panier");

        return true;

    }

    function get_article_panier($id_article){
        $id_client = $this->session->userdata("id_client");
        $this->db->where(array("article_id"=>$id_article, "client_id"=>$id_client));
        $article = $this->db->get("app_panier");
        $article = $article->row_array();

        return $article;
    }

    function get_article_commande(){
        $id_client = $this->session->userdata("id_client");

        $this->db->where(array("client_id"=>$id_client));
        $this->db->from("app_commande_article");
        $this->db->order_by('id_cmd_article','DESC');
        $this->db->join('app_commande', 'app_commande.id_commande = app_commande_article.id_cmd');
        $article = $this->db->get();
        $article = $article->result_array();

        return $article;
    }

    function get_article($id_article){

        $this->db->where(array("article_id"=>$id_article));
        $article = $this->db->get("app_article");
        $article = $article->row_array();

        return $article;
    }






}
