<?php
class User_mod extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function userLogin($email, $password){
        $data=array(
            'email'=>$email, 'password'=>$password
        );
        $query=$this->db->where($data);
        $login=$this->db->get('user');
        if ($login!=NULL) {
            return $login->row();
        } else{
            return false;
        }

    }

    //add user
    public function add_user($data_bd){
        $query= $this->db->insert('user', $data_bd);
        return $query;
    }

    // Check user exists
    public function check_username_exists($username){
        $query = $this->db->get_where('user', array('username' => $username));

        if(empty($query->row_array())){
            return true;
        }else{
            return false;
        }
    }

    // Check email exists
    public function check_email_exists($email){
        $query = $this->db->get_where('user', array('email' => $email));

        if(empty($query->row_array())){
            return true;
        }else{
            return false;
        }
    }
    public function get_users($user_id = FALSE, $limit = FALSE, $offset = FALSE){
        if ($limit) {
            $this->db->limit($limit, $offset);
        }

        if($user_id === FALSE){
            $this->db->order_by('create_at', 'DESC');
            $query = $this->db->get('user');
            return $query->result_array();
        }

        $query = $this->db->get_where('user', array('user_id' => $user_id));
        return $query->row_array();
    }
    public function update_user_data($data_up, $where)
    {
        $query = $this->db->update('user', $data_up, $where);
        return $query;
    }

    public function delete_user_mod($table, $where){
        $query = $this->db->delete($table, $where);
        return $query;
    }

    public function enable($table, $user_id){
        $data = array(
            'status' => 0
        );
        $this->db->where('user_id', $user_id);
        return $this->db->update($table, $data);
    }
    
    public function desable($table, $user_id){
        $data = array(
            'status' => 1
        );
        $this->db->where('user_id', $user_id);
        return $this->db->update($table, $data);
    }

    public function change_password($data)
    {
        $this->db->where('password', $data);
        $query = $this->db->update('user');
        return $query;
    }

//    //get user message
//    public function insert_data_message($data){
//        $query=$this->db->insert('message',$data);
//        return $query;
//    }
//
//    //get subscriber email for newsletter
//    public function subscribe_with_mail($data){
//        $query=$this->db->insert('subscriber',$data);
//        return $query;
//    }
}
