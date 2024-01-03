<?php
class Admin_mod extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add_collection($data_bd)
    {
        $query = $this->db->insert('collections', $data_bd);
        return $query;
    }


    public function get_collection()
    {
        $this->db->order_by('date', 'DESC');
        $query = $this->db->get('collection');

        return $query->result_array();
    }

    public function get_collection_val()
    {
        $this->db->order_by('date', 'DESC');
        $this->db->where('state', true);
        $query = $this->db->get('collection');

        return $query->result_array();
    }
    public function delete_user_mod($table, $where)
    {
        $query = $this->db->delete($table, $where);
        return $query;
    }

    public function enable_mod($table, $where)
    {
        $data = array(
            'state' => true
        );
        $this->db->where('id', $where);
        return $this->db->update($table, $data);
    }

    public function disable_mod($table, $where)
    {
        $data = array(
            'state' => false
        );
        $this->db->where('id', $where);
        return $this->db->update($table, $data);
    }

    public function delete_mod($table, $where)
    {
        $query = $this->db->delete($table, $where);
        return $query;
    }

    public function get_cat()
    {
        $this->db->order_by('add_at', 'DESC');
        $query = $this->db->get('award_cat');

        return $query->result_array();
    }
    public function get_a_cat($cat_id)
    {
        $query = $this->db->get_where('award_cat', array('cat_id' => $cat_id));
        return $query->row_array();
    }
    //add award categories
    public function add_cat($data_bd)
    {
        $query = $this->db->insert('award_cat', $data_bd);
        return $query;
    }

    //edit award categories
    public function update_award_cat($data_up, $where)
    {
        $query = $this->db->update('award_cat', $data_up, $where);
        return $query;
    }

    //edit nb_laureat award categories
    public function nb_laureate_cat($cat_id, $nb)
    {
        $data = array(
            'nb_laureat' => $nb
        );
        $this->db->where('cat_id', $cat_id);
        $query = $this->db->update('award_cat', $data);
        return $query;
    }

    //edit nb_votant award categories
    public function nb_votant_cat($cat_id, $nb)
    {
        $data = array(
            'nb_votant' => $nb
        );
        $this->db->where('cat_id', $cat_id);
        $query = $this->db->update('award_cat', $data);
        return $query;
    }

    public function valid_collection_mod($table, $cat_id)
    {
        $data = array(
            'state' => true
        );
        $this->db->where('cat_id', $cat_id);
        return $this->db->update($table, $data);
    }

    public function invalid_collection_mod($table, $id_collection)
    {
        $data = array(
            'state' => false
        );
        $this->db->where('collection_id', $id_collection);
        return $this->db->update($table, $data);
    }

    public function add_laureate($data_bd)
    {
        $query = $this->db->insert('laureat', $data_bd);
        return $query;
    }

    public function get_laureates()
    {
        $this->db->order_by('update_at', 'DESC');
        $query = $this->db->get('laureat');

        return $query->result_array();
    }

    //update laureate categories
    public function update_laureate($data_up, $where)
    {
        $query = $this->db->update('laureat', $data_up, $where);
        return $query;
    }

    public function get_laureat($l_id)
    {
        $query = $this->db->get_where('laureat', array('l_id' => $l_id));
        return $query->row_array();
    }

    //edit nb_vote laureate
    public function nb_vote($l_id, $nb)
    {
        $data = array(
            'nb_vote' => $nb
        );
        $this->db->where('l_id', $l_id);
        return $this->db->update('laureat', $data);
    }

    //edit nb_vote votant
    public function nb_vote_votant($ip, $nb)
    {
        $data = array(
            'nb_votes' => $nb
        );
        $this->db->where('vot_ip', $ip);
        return $this->db->update('votant', $data);
    }
}
