<?php defined('BASEPATH') or exit('No direct script access allowed');

class Utilisateur extends MX_Controller
{
    public function __construct()
    {

        parent::__construct();
        admin_in();
        $this->load->model('utilisateur_model');
        $this->load->model('adminacl_model');
        $this->load->model('administration_model');
        $this->load->model('configuration_model');
        $this->load->model('tplconfig_model');


    }

    public function index($adtab = NULL)
    {
        if (is_null($adtab)) $adtab = "1";
        $nom_module = 'utilisateur';
        $blocmenu = "identite";
        $pages_title = "Gestion de la liste des utilisateurs";
        $data = $this->tplconfig_model->configmenu($nom_module, $blocmenu, $pages_title, $adtab);
        //var_dump($data);
        $this->load->view('intro_view', $data);
    }

    ///////////////////////////////////PROFILS//////////////////////////////////
    function get_users()
    {
        //desc_liste_des_utilisateurs
        //print_r($this->session->all_userdata());
        $data['onglet_title'] = "Liste des utilisateurs";
        $data['liste_active'] = array(1 => 'Active', 0 => 'Inactive');
        $data['liste_desprofils'] = $this->utilisateur_model->le_selectprofils_client_out();
        $data['liste_civil'] = array("M." => "M.", "Mme" => "Mme", "Mlle" => "Mlle");
        $data['liste_users'] = $this->utilisateur_model->liste_users();
        $this->load->view('utilisateur/user_view', $data);
    }

    //////
    function edit_statut_user()
    {
        //desc_script_active_ou_desactive_statut_utilisateur
        if ($_POST && isset($_POST['etatok']) && ($_POST['etatok'] == "ok")) {

            $id_user = mb_strtolower($this->input->post('id'));
            $activation = $this->input->post('new_etat');
            $data = array("activation" => $activation);

            if ($this->utilisateur_model->update_user($id_user, $data)) echo 1;
            else  echo 0;
        } else {
            echo 0;
        }

    }

    ///////////////////
    function add_user()
    {
        //desc_ajout_utilisateur
        if ($_POST && isset($_POST['passok']) && ($_POST['passok'] == "ok")) {
            $this->form_validation->set_rules('pseudo', "nom utilisateur", 'xss_clean|trim|required|max_length[100]');
            if ($this->form_validation->run()) {

                $pseudo = mb_strtolower($this->input->post('pseudo'));
                $nom = mb_strtolower($this->input->post('nom'));
                $prenom = mb_strtolower($this->input->post('prenoms'));
                $civilite = $this->input->post('civil');
                if ($civilite == "Mme" || $civilite == "Mlle") $sexe = "f";
                else $sexe = "m";

                if ($prenom != "") $nom_complet = $nom . " " . $prenom;
                else $nom_complet = $nom;

                $leprofil = $this->input->post('leprofil');
                $statut = $this->input->post('statut');

                $mdp = $this->input->post('mdp');
                $retap_mdp = $this->input->post('retap_mdp');
                $motdepasse_default = "0000";

                if ($mdp != "" && ($mdp == $retap_mdp)) $motdepasse = md5($mdp);
                else $motdepasse = md5($motdepasse_default);

                $data = array("matricule" => $pseudo,
                    "password" => $motdepasse,
                    "nom" => $nom,
                    "prenom" => $prenom,
                    "nom_complet" => $nom_complet,
                    "civilite" => $civilite,
                    "sexe" => $sexe,
                    "activation" => $statut,
                    "profil_user" => $leprofil);

                if ($this->utilisateur_model->add_user($data)) {
                    $reponse = '1';
                    $return = array('reponse' => $reponse);
                    echo json_encode($return);
                } else {
                    $reponse = '0';
                    $return = array('reponse' => $reponse);
                    echo json_encode($return);
                }
            } else {
                $reponse = '0';
                $return = array('reponse' => $reponse);
                echo json_encode($return);
            }
        } else {
            $reponse = '0';
            $return = array('reponse' => $reponse);
            echo json_encode($return);
        }
    }

    //////
    function delete_user()
    {
        //desc_suppression_utilisateur
        if ($_POST) {
            $this->form_validation->set_rules('delok', 'delok', 'trim|required|xss_clean');
            if ($this->form_validation->run()) {
                $id = $this->input->post('id');
                if ($this->utilisateur_model->delete_user($id)) {
                    echo 1;
                } else {
                    echo 0;
                }

            } else {
                echo 0;
            }

        } else {
            echo 0;
        }
    }

    /////
    function edit_user()
    {
        //desc_edit_utilisateur
        if ($_POST && isset($_POST['editok']) && ($_POST['editok'] == "ok")) {
            $this->form_validation->set_rules('pseudo', 'pseudo utilisateur', 'trim|required|xss_clean');
            if ($this->form_validation->run()) {

                $id_user = $this->input->post('id_user');
                $pseudo = mb_strtolower($this->input->post('pseudo'));
                $nom = mb_strtolower($this->input->post('nom'));
                $prenom = mb_strtolower($this->input->post('prenoms'));
                $civilite = $this->input->post('civil');
                if ($civilite == "Mme" || $civilite == "Mlle") $sexe = "f";
                else $sexe = "m";

                if ($prenom != "") $nom_complet = $nom . " " . $prenom;
                else $nom_complet = $nom;

                $leprofil = $this->input->post('leprofil');
                $statut = $this->input->post('statut');

                $data = array("matricule" => $pseudo,
                    "nom" => $nom,
                    "prenom" => $prenom,
                    "nom_complet" => $nom_complet,
                    "civilite" => $civilite,
                    "sexe" => $sexe,
                    "activation" => $statut,
                    "profil_user" => $leprofil);

                if ($this->utilisateur_model->update_user($id_user, $data)) {
                    $reponse = '1';
                    $return = array('reponse' => $reponse);
                    echo json_encode($return);
                } else {
                    $reponse = '0';
                    $return = array('reponse' => $reponse);
                    echo json_encode($return);
                }

            } else {
                $reponse = '0';
                $return = array('reponse' => $reponse);
                echo json_encode($return);
            }

        } else {
            $reponse = '0';
            $return = array('reponse' => $reponse);
            echo json_encode($return);
        }
    }

    //////
    function edit_reinitpass()
    {
        //desc_script_active_ou_desactive_statut_utilisateur
        if ($_POST && isset($_POST['initok']) && ($_POST['initok'] == "ok")) {

            $id_user = $this->input->post('id');
            $motdepasse_default = "0000";

            $data = array("password" => md5($motdepasse_default), "deja_connecte" => "0");

            if ($this->utilisateur_model->update_user($id_user, $data)) echo 1;
            else  echo 0;
        } else {
            echo 0;
        }

    }


    public function get_my_profil()
    {
        $data['onglet_title'] = "Mon profil";
        $this->load->view('utilisateur/profil_view', $data);
    }

}
