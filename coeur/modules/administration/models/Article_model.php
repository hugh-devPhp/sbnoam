<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


    public function get_method($table)
    {
        $this->db->order_by('date_add', 'DESC');
        $query = $this->db->get($table);

        return $query->result_array();
    }

    public function get_method_order_by($table)
    {
        $this->db->order_by('vues', 'desc');
        $query = $this->db->get($table);

        return $query->result();
    }

    public function get_method_simple($table)
    {
        $query = $this->db->get($table);

        return $query->result_array();
    }

    public function get_method_where($table, $where)
    {
        $this->db->order_by('date_add', 'DESC');
        $query = $this->db->get_where($table, $where);

        return $query->result_array();
    }
    public function get_method_where_simple($table, $where)
    {
        $query = $this->db->get_where($table, $where);

        return $query->result_array();
    }

    //add method
    public function add_method($table, $data_bd)
    {
        $query = $this->db->insert($table, $data_bd);
        return $query;
    }

    //add method
    public function add_array_method($table, $data_bd)
    {
        $query = $this->db->insert_batch($table, $data_bd);
        return $query;
    }

    //add article method
    public function add_article($table, $data_bd)
    {
        $query = $this->db->insert($table, $data_bd);
        $new_id = $this->db->insert_id();
        return $new_id;
    }


    //edit method
    public function update_method($table, $data_up, $where)
    {
        $query = $this->db->update($table, $data_up, $where);
        return $query;
    }

    public function delete_mod($table, $where)
    {
        $query = $this->db->delete($table, $where);
        return $query;
    }

    public function get_count($table, $keyword = null)
    {
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('designation', $keyword);
            $this->db->or_like('prix', $keyword);
            $this->db->or_like('prix_promo', $keyword);
            $this->db->or_like('poids', $keyword);
            $this->db->group_end();
        }
        return $this->db->count_all_results($table);
    }

    public function get_count_where($table, $where)
    {
        return $this->db->where($where)->from($table)->count_all_results();
    }

    public function get_articles($limit, $start, $table, $keyword = null)
    {
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('designation', $keyword);
            $this->db->or_like('description', $keyword);
            $this->db->or_like('prix', $keyword);
            $this->db->or_like('prix_promo', $keyword);
            $this->db->or_like('poids', $keyword);
            $this->db->group_end();
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get($table);

        return $query->result();
    }
    public function get_articles_where($limit, $start, $table, $where)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get_where($table, $where);

        return $query->result();
    }
    public function get_method_where_simple_deux($table, $where)
    {
        $query = $this->db->get_where($table, $where);

        return $query->result();
    }
}
