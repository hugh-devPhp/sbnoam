<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accueil_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function offre(){
        $this->db->select('*');
        $this->db->from('app_offer');
        $this->db->join('app_article','app_article.article_id= app_offer.article_id', 'left');
        $this->db->order_by('offer_id','DESC');
        $q = $this->db->get();
        return $q->row_array();
    }




}
