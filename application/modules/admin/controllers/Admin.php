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

        $collection_data = $this->db->get('collection');
        $data['collection'] = $collection_data->num_rows();

        $this->db->where('state', true);
        $demand_val = $this->db->get('demand');
        $data['demand_val'] = $demand_val->num_rows();

        $this->db->where('state', false);
        $demand_wait = $this->db->get('demand');
        $data['demand_wait'] = $demand_wait->num_rows();

        $this->load->view('admin_index', $data);
    }

    public function collection()
    {
        $data['collections'] = $this->Admin_mod->get_collection();
        $this->load->view('pages/collections', $data);
    }

    public function demand_val()
    {
        $data['demands'] = $this->Admin_mod->get_demand_val();
        $this->load->view('pages/demand_valide', $data);
    }

    public function demand_wait()
    {
        $data['demands'] = $this->Admin_mod->get_demand_wait();
        $this->load->view('pages/demande_en_attente', $data);
    }

    public function enable_col()
    {
        $id_collection = $this->input->post('id_collection');
        $result = $this->Admin_mod->enable_mod('collection', $id_collection);
        echo json_encode($result);
    }

    public function disable_col()
    {
        $id_collection = $this->input->post('id_collection');
        $result = $this->Admin_mod->disable_mod('collection', $id_collection);
        echo json_encode($result);
    }

    public function delete_collection()
    {
        $id_collection = $this->input->post('id_collection');
        $data_delete = $this->Admin_mod->delete_mod('collection', array('id_collection' => $id_collection));

        if ($data_delete == true) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    public function award_cat()
    {
        if ($_POST) {
            $this->form_validation->set_rules('cat_name', 'Cat_name', 'required');

            if ($this->form_validation->run() === FALSE) {
                echo json_encode("échec");
            } else {
                $cat_id = $this->input->post('cat_id');
                if ($cat_id == '') {
                    $data_bd = array(
                        'cat_name' => $this->input->post('cat_name'),
                        'cat_desc' => $this->input->post('cat_desc'),
                        'add_at' => date("Y-m-d H:i:s")
                    );
                    $insert = $this->Admin_mod->add_cat($data_bd);
                    echo json_encode($insert);
                } else {
                    $data_up = array(
                        'cat_name' => $this->input->post('cat_name'),
                        'cat_desc' => $this->input->post('cat_desc'),
                        'add_at' => date("Y-m-d H:i:s"),

                    );
                    $result = $this->Admin_mod->update_award_cat($data_up, array('cat_id' => $cat_id));
                    echo json_encode($result);
                }
            }
        } else {
            $data['categories'] = $this->Admin_mod->get_cat();
            $this->load->view('pages/award_cat', $data);
        }
    }


    public function valid_award_cat()
    {
        $cat_id = $this->input->post('cat_id');
        $result = $this->Admin_mod->valid_award_cat_mod('award_cat', $cat_id);
        echo json_encode($result);
    }

    public function invalid_award_cat()
    {
        $cat_id = $this->input->post('cat_id');
        $result = $this->Admin_mod->invalid_award_cat_mod('award_cat', $cat_id);
        echo json_encode($result);
    }

    public function delete_award_cat()
    {
        $cat_id = $this->input->post('cat_id');
        $data_delete = $this->Admin_mod->delete_mod('award_cat', array('cat_id' => $cat_id));

        if ($data_delete == true) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    public function add_laureate()
    {
        if ($_POST) {
            //Upload Image
            $config['upload_path'] = './assets/admin/images/laureates';
            $config['allowed_types'] = 'jpg|png|jpeg|gif|mp4|avi';
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);

            $this->form_validation->set_rules('l_name', 'L_name', 'required');
            if ($this->form_validation->run() === FALSE) {
                echo json_encode("échec");
            } else {
                $cat_id = $this->input->post('award_id');
                if ($this->upload->do_upload('l_image')) {
                    $data =  array('upload_data' => $this->upload->data());
                    $post_image = $_FILES['l_image']['name'];
                    $data_bd = array(
                        'l_name' => $this->input->post('l_name'),
                        'l_level' => $this->input->post('l_level'),
                        'award_id' => $this->input->post('award_id'),
                        'l_image' => $post_image,
                        'add_at' => date("Y-m-d H:i:s")
                    );
                    $result = $this->Admin_mod->get_a_cat($cat_id);
                    $nb  = $result['nb_laureat'] + 1;
                    $insert = $this->Admin_mod->add_laureate($data_bd);
                    $cat_up = $this->Admin_mod->nb_laureate_cat($cat_id, $nb);
                    echo json_encode($insert);
                } else {
                    $data_up = array(
                        'l_name' => $this->input->post('l_name'),
                        'l_level' => $this->input->post('l_level'),
                        'award_id' => $this->input->post('award_id'),
                        'update_at' => date("Y-m-d H:i:s")
                    );
                    $result = $this->Admin_mod->get_a_cat($cat_id);
                    $nb  = $result['nb_laureat'] + 1;
                    $result = $this->Admin_mod->add_laureate($data_up);

                    $cat_up = $this->Admin_mod->nb_laureate_cat($cat_id, $nb);
                    echo json_encode($result);
                }
            }
        } else {
            $data['categories'] = $this->Admin_mod->get_cat();
            $this->load->view('pages/add_laureats', $data);
        }
    }

    public function update_laureate($l_id = false)
    {
        if ($_POST) {
            //Upload Image
            $config['upload_path'] = './assets/admin/images/laureates';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);

            $this->form_validation->set_rules('l_name', 'L_name', 'required');
            $l_id = $this->input->post('l_id');

            if ($this->form_validation->run() === FALSE) {
                echo json_encode("échec");
            } else {
                if ($this->upload->do_upload('l_image')) {
                    $data =  array('upload_data' => $this->upload->data());
                    $post_image = $_FILES['l_image']['name'];
                    $data_bd = array(
                        'l_name' => $this->input->post('l_name'),
                        'l_level' => $this->input->post('l_level'),
                        'award_id' => $this->input->post('award_id'),
                        'l_image' => $post_image,
                        'add_at' => date("Y-m-d H:i:s")
                    );
                    $insert = $this->Admin_mod->update_laureate($data_bd, array('l_id' => $l_id));
                    echo json_encode($insert);
                } else {
                    $data_up = array(
                        'l_name' => $this->input->post('l_name'),
                        'l_level' => $this->input->post('l_level'),
                        'award_id' => $this->input->post('award_id'),
                        'update_at' => date("Y-m-d H:i:s")
                    );
                    $result = $this->Admin_mod->update_laureate($data_up, array('l_id' => $l_id));
                    echo json_encode($result);
                }
            }
        } else {
            $data['categories'] = $this->Admin_mod->get_cat();
            $data['laureat'] = $this->Admin_mod->get_laureat($l_id);
            $this->load->view('pages/update_laureat', $data);
        }
    }

    public function award_laureate()
    {
        $data['laureates'] = $this->Admin_mod->get_laureates();
        $data['categories'] = $this->Admin_mod->get_cat();
        $this->load->view('pages/laureats', $data);
    }

    public function delete_laureat()
    {
        $l_id = $this->input->post('l_id');
        $data_delete = $this->Admin_mod->delete_mod('laureat', array('l_id' => $l_id));

        if ($data_delete == true) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }
}
