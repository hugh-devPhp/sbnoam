<?php defined('BASEPATH') or exit('No direct script access allowed');


class User extends MX_Controller
{
    public function __construct()
    {
        $this->load->model('User_mod');
        parent::__construct();
    }

    public function login()
    {
        if ($this->session->userdata('login_in') == "1") {
            redirect('admin/dashboard');
        }
        if ($_POST) {
            $email = $this->input->post('email');
            $password_clear = $this->input->post('password');
            $password = md5($password_clear);
            //form_validation
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() === FALSE) {
                echo 'rien';
            } else {
                // get email and Encrypt Password
                $user = $this->User_mod->userLogin($email, $password);
                //                var_dump($user);
                if ($user and $user->status == 1) {
                    //Create Session
                    $this->session->set_userdata('user_id', $user->user_id);
                    $this->session->set_userdata('name', $user->name);
                    $this->session->set_userdata('email', $user->email);
                    $this->session->set_userdata('username', $user->username);
                    $this->session->set_userdata('phone', $user->phone);
                    $this->session->set_userdata('gender', $user->gender);
                    $this->session->set_userdata('birth', $user->birth);
                    $this->session->set_userdata('role', $user->role);
                    $this->session->set_userdata('nationality', $user->nationality);
                    $this->session->set_userdata('description', $user->description);
                    $this->session->set_userdata('create_at', $user->create_at);
                    $this->session->set_userdata('update_at', $user->update_at);
                    $this->session->set_userdata('picture', $user->picture);
                    $this->session->set_userdata('login_in', "1");
                    echo json_encode('dashboard');
                } else {
                    echo json_encode('0');
                }
            }
        } else {
            $this->load->view('login');
        }
    }

    public function add_user()
    {
        if ($this->session->userdata('login_in') != "1") {
            redirect('admin');
        }
        /*add user in database*/
        if ($_POST) {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');

            if ($this->form_validation->run() === FALSE) {
                echo "échec";
            } else {
                $password = $this->input->post('pass');
                $c_password = $this->input->post('c_pass');
                $data_bd = array(
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'address' => $this->input->post('address'),
                    'gender' => $this->input->post('gender'),
                    'password' => md5($password),
                    'create_at' => date("Y-m-d H:i:s")
                );
                $username = $this->input->post('username');
                $email = $this->input->post('email');
                if ($this->User_mod->check_username_exists($username)) {
                    if ($this->User_mod->check_email_exists($email)) {
                        if ($password !== $c_password) {
                            echo json_encode('Mot de passe different !!!');
                        } else {
                            $insert = $this->User_mod->add_user($data_bd);
                            echo json_encode($insert);
                        }
                    } else {
                        echo json_encode('Email déjà utilisé !!!');
                    }
                } else {
                    echo json_encode("username déjà utilisé !!!");
                }
            }
        } else {
            $this->load->view('add_user');
        }
    }

    public function profil()
    {
        if ($this->session->userdata('login_in') != "1") {
            redirect('admin');
        }
        $this->load->view('profil');
    }

    public function users_list($offset = '0')
    {
        if ($this->session->userdata('login_in') != "1") {
            redirect('admin');
        }
        $data['users'] = $this->User_mod->get_users(FALSE, $offset);
        $this->load->view('user_list', $data);
    }

    public function edit_user($user_id = false)
    {
        if ($this->session->userdata('login_in') != "1") {
            redirect('admin');
        }
        $data['user'] = $this->User_mod->get_users($user_id);
        $this->load->view('edit_user', $data);
    }
    //update_article
    public function update_user()
    {
        //Upload Image
        $config['upload_path'] = './assets/admin/images/users';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        $user_id = $this->input->post('user_id');
        if (!$this->upload->do_upload('picture')) {
            $data_up = array(
                'user_id' => $this->input->post('user_id'),
                'username' => $this->input->post('username'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'gender' => $this->input->post('gender'),
                'update_at' => date("Y-m-d H:i:s")
            );
            $result = $this->User_mod->update_user_data($data_up, array('user_id' => $user_id));
            echo json_encode($result);
        } else {
            $data =  array('upload_data' => $this->upload->data());
            $post_image = $_FILES['picture']['name'];
            $user_id = $this->input->post('user_id');
            $data_up = array(
                'user_id' => $this->input->post('user_id'),
                'username' => $this->input->post('username'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'gender' => $this->input->post('gender'),
                'picture' => $post_image,
                'update_at' => date("Y-m-d H:i:s")
            );
            $result = $this->User_mod->update_user_data($data_up, array('user_id' => $user_id));
            echo json_encode($result);
        }
    }
    public function delete_user()
    {
        if ($this->session->userdata('login_in') != "1") {
            redirect('admin');
        }
        $user_id = $this->input->post('user_id');
        $data_delete = $this->User_mod->delete_user_mod('user', array('user_id' => $user_id));

        if ($data_delete == true) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    public function enable()
    {
        if ($this->session->userdata('login_in') != "1") {
            redirect('admin');
        }
        $user_id = $this->input->post('user_id');
        $result = $this->User_mod->enable('user', $user_id);
        echo json_encode($result);
    }
    public function desable()
    {
        if ($this->session->userdata('login_in') != "1") {
            redirect('admin');
        }
        $user_id = $this->input->post('user_id');
        $result = $this->User_mod->desable('user', $user_id);
        echo json_encode($result);
    }

    public function change_pass()
    {
        if ($this->session->userdata('login_in') != "1") {
            redirect('admin');
        }
        $this->form_validation->set_rules('old_password', 'Old Password', 'required|callback_match_old_password');
        $this->form_validation->set_rules('new_password', 'New Password Field', 'required');
        $this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'matches[new_password]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('change_psd');
        } else {
            $data = $this->input->post('new_password');
            $this->User_mod->change_password($data);
            //Set Message
            $this->session->set_flashdata('success', 'Mot de passe modifié avec succès.');
            redirect('administrator/change_password');
        }
    }


    // log user/admin out
    public function logout()
    {
        // unset user data
        $this->session->unset_userdata('login_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('picture');

        //Set Message
        $this->session->set_flashdata('success', 'Vous êtes déconnecté.');
        redirect(base_url() . 'user/login');
    }
}
