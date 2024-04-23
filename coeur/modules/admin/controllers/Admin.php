<?php defined('BASEPATH') or exit('No direct script access allowed');


class Admin extends MX_Controller
{
    public function __construct()
    {
        if ($this->session->userdata('login_in') != "1") {
            redirect('admin');
        }
        $this->load->model('user/User_mod');
        $this->load->model('Admin_mod');
        //        $this->load->library('upload');
        parent::__construct();
    }

    public function dashboard($offset = '4')
    {
        $data['users'] = $this->User_mod->get_users(False, $offset);
        $user_data = $this->db->get('user');
        $data['user_nb'] = $user_data->num_rows();

        // $demand_data = $this->db->get('demand');
        // $data['demand'] = $demand_data->num_rows();

        // $this->db->where('state', true);
        // $demand_val = $this->db->get('demand');
        // $data['demand_val'] = $demand_val->num_rows();

        // $this->db->where('state', false);
        // $demand_wait = $this->db->get('demand');
        // $data['demand_wait'] = $demand_wait->num_rows();

        $this->load->view('dashboard/admin_index', $data);
    }
}
