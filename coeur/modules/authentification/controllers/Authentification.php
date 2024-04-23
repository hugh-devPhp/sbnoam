<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Authentification extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('authentification_model');
        admin_is();

    }

    function index(){

        if($_POST){

            $this->form_validation->set_rules('login', 'nom d\'utilisateur', 'trim|required');
            $this->form_validation->set_rules('pass', 'Mot de passe', 'trim|required');

            if($this->form_validation->run()){

                $login=mb_strtolower($this->input->post('login'));
                $mot_de_passe=md5($this->input->post('pass'));

                $datad= $this->authentification_model->check_user($login,$mot_de_passe);
//                echo "<pre>";
//                print_r($datad);
//                echo "</pre>";
//                exit();
                // echo "<br>Le data<br>";
                // echo "<pre>";
                // print_r($data);
                // echo "</pre>";
                // exit;
                $datad = (array)$datad;


                if(count($datad)==0){
                    //echo 'ICI';
                    $this->session->set_flashdata('notifications_page', 'login ou mot de passe est incorrect');
                    //exit();
                    redirect('authentification');
                } else {

                    if(!empty($datad)){
                        $datad = (object) $datad;

                        if(isset($datad->activation) && ($datad->activation=='0')){
                            // echo 'activation';
                            // exit();
                            $message="Votre compte est inactif, vous avez ete desactive!";
                            $this->session->set_flashdata('notifications_page',$message );
                            redirect('authentification');

                        }

                        if(isset($datad->activation_profils) && ($datad->activation_profils=='0')){
                            // echo 'activationprofil';
                            // exit();
                            $message="Votre profil est inactif, vous avez ete desactive!";
                            $this->session->set_flashdata('notifications_page',$message );
                            redirect('authentification');

                        }

                        if(isset($datad->deja_connecte) && ($datad->deja_connecte=='0')){
                            $id_user=$datad->id_utilisateur;
                            $this->session->set_userdata('mon_utilisat',$id_user);
                            $this->session->set_userdata('mon_pseudo',$login);
                            redirect('authentification/changepass');

                        }

                        // echo " Dans le load";
                        // print_r($data);
                        $pipo=$this->authentification_model->load_session($datad);
                        redirect('administration');

                    } else redirect('authentification');

                }

            } else { $this->load->view('login_view');}

        } else {$this->load->view('login_view');}
    }

    function changepass(){

        if($_POST){
            $this->form_validation->set_rules('lepass', 'mot de passe', 'trim|required');
            $this->form_validation->set_rules('repetpass', 'Mot de passe', 'trim|required');
            if($this->form_validation->run())
            {
                $id_user=$this->input->post('id_acl');
                $mot_de_passe=md5($this->input->post('lepass'));

                $data = array('password'  => $mot_de_passe,'deja_connecte'  => 1);
                $this->authentification_model->change_password($id_user,$data);
//			var_dump($this->session->all_userdata());
//			exit;
                $this->session->set_flashdata('notifications_page', "Veuillez vous reconnecter avec votre nouveau mot de passe");
                redirect('authentification');
            }
        } ////Fin $_POST
        else if($this->session->userdata('mon_utilisat')!==false && $this->session->userdata('mon_utilisat')!=null)
        {

            $monid_user=$this->session->userdata('mon_utilisat');
            $mon_matri=$this->session->userdata('mon_pseudo');
            $this->session->unset_userdata('mon_utilisat');
            $this->session->unset_userdata('mon_pseudo');


            $nom_complets=mb_strtoupper($mon_matri);
            $data_view=array();
            $data_view["matricule"]=mb_strtoupper($nom_complets);
            $data_view["id_user"]=$monid_user;
            $data_view["notifications_page"]="Bonjour $nom_complets, veuillez changer votre mot de passe.";
            $this->load->view('changepass_view', $data_view);

        }
        else {
            redirect('authentification');

        }



    }

    /***DECONNEXION ***/
    function logout(){

        $this->session->sess_destroy();
        redirect('administration');

    }

}