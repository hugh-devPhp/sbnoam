<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administration_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function redirection_appli(){
        if($this->session->userdata('mode')=="userappli"){
            redirect('accueil');
        }
    }

    function nb_visiteur_par_mois(){

        $this->db->select('*');
        $q = $this->db->get("app_visiteur");
        $visiteurs = $q->result_array();
        $i=0;
        if(!empty($visiteurs)){
            foreach ($visiteurs as $visiteur){
                $visiteur = (array)$visiteur;
                $dateObj1 = DateTime::createFromFormat('Ymd', $visiteur['visiteur_date1']);
                $month1 = $dateObj1->format('m');
                $year1 = $dateObj1->format('Y');
                $date = date('m');
                $annee = date('Y');

                if($date === $month1 && $year1 === $annee){
                    $i++;
                }
            }
        }
        return $i;
    }

    function nb_visiteur_par_jour(){

        $this->db->select('*');
        $q = $this->db->get("app_visiteur");
        $visiteurs = $q->result_array();
        $i=0;
        if(!empty($visiteurs)){
            foreach ($visiteurs as $visiteur){
                $visiteur = (array)$visiteur;
                $dateObj1 = DateTime::createFromFormat('Ymd', $visiteur['visiteur_date1']);
                $day1 = $dateObj1->format('d');
                $month1 = $dateObj1->format('m');
                $year1 = $dateObj1->format('Y');
                $jour = date('d');
                $date = date('m');
                $annee = date('Y');

                if($day1 === $jour && $date === $month1 && $year1 === $annee){
                    $i++;
                }
            }
        }
        return $i;
    }

    function nb_visiteur_par_annee(){

        $this->db->select('*');
        $q = $this->db->get("app_visiteur");
        $visiteurs = $q->result_array();
        $i=0;
        if(!empty($visiteurs)){
            foreach ($visiteurs as $visiteur){
                $visiteur = (array)$visiteur;
                $dateObj1 = DateTime::createFromFormat('Ymd', $visiteur['visiteur_date1']);
                $day1 = $dateObj1->format('d');
                $month1 = $dateObj1->format('m');
                $year1 = $dateObj1->format('Y');
                $jour = date('d');
                $date = date('m');
                $annee = date('Y');

                if($year1 === $annee){
                    $i++;
                }
            }
        }
        return $i;
    }

    function nb_message_nonlu(){

        $this->db->select('*');
        $this->db->where("is_read", "0");
        $q = $this->db->get("app_messages");
        $visiteurs = $q->num_rows();

        return $visiteurs;
    }

    function nb_commande(){

        $this->db->select('*');
        $q = $this->db->get("app_commande");
        $visiteurs = $q->num_rows();

        return $visiteurs;
    }
    function nb_reservation(){

        $this->db->select('*');
        $q = $this->db->get("app_reservation");
        $visiteurs = $q->result_array();

        return count($visiteurs);
    }

    function les_10_commandes(){

        $this->db->select('*');
        $this->db->order_by('id_commande','DESC');
        $this->db->limit(10);
        $q = $this->db->get("app_commande");
        $visiteurs = $q->result_array();

        return $visiteurs;
    }

    function checkAdmin_user($matricule, $password){

        $row=array();
        
        $this->db->select('*');
        $this->db->from('acl_utilisateur');
        $this->db->join('acl_profils','acl_profils.id_profils= acl_utilisateur.profil_user', 'left');
        $this->db->where(array('matricule' => $matricule, 'password'  => $password));
        $q=$this->db->get();
        if($q->num_rows()>0) $row = $q->row();
        return $row;
           
        }

    function load_session($data){ 
       
        $id_utilisateur=$data->id_utilisateur;
        $matricule =$data->matricule ;
        $nom=$data->nom;
        $prenom=$data->prenom;
        $nom_complet=$data->nom_complet;
        $activation=$data->activation;

        $respo_role=$data->respo_role;
        $profil_id=$data->id_profils;
        $nom_profil=$data->code_profils;
        //$photo=$data->photo;

        $data_Session = array(
            'logIn'  => 1,
            'user_id'  => $id_utilisateur,
            'user_nom'=> $nom,
            'user_prenom'=> $prenom,
            'user_nomcomplet'=> $nom_complet,
            'user_login'=> $matricule,
            'user_idprofil'=> $profil_id,
            'user_nomprofil'=> $nom_profil,
            'user_activation'=> $activation,
            'respo_role'=> $respo_role, 
            'mode'=> "user_admin"
        );

        $this->session->set_userdata($data_Session);

    }

     function change_password($id_utilisateur,$data){
    $this->db->where('id_utilisateur', $id_utilisateur);
    $this->db->update('acl_utilisateur', $data);
  }

    //////////////////////////////////
    function supprimer_tiret_et_espace($str, $encoding='utf-8')
      {
    // transformer les caractères accentués en entités HTML
    $str = htmlentities($str, ENT_NOQUOTES, $encoding);
  
    // remplacer les entités HTML pour avoir juste le premier caractères non accentués
    // Exemple : '&ecute;' => 'e', '&Ecute;' => 'E', 'Ã ' => 'a' ...
    $str = preg_replace('#&([A-za-z])(?:acute|grave|cedil|circ|orn|ring|slash|th|tilde|uml);#', '\1', $str);
  
    // Remplacer les ligatures tel que : Œ, Æ ...
    // Exemple 'Å“' => 'oe'
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str);
    // Supprimer tout le reste
    $str = preg_replace('#&[^;]+;#', '', $str);
    // Supprimer les espaces
    $str = preg_replace('/\s/', '', $str);
    // Supprimer les tirets  
    $str = str_replace('-', '', $str);
  
    return $str;
        }

        //////////////////////////////////
    function supprimer_espace($str, $encoding='utf-8')
      {
    // transformer les caractères accentués en entités HTML
    $str = htmlentities($str, ENT_NOQUOTES, $encoding);
    // Supprimer les espaces
    $str = preg_replace('/\s/', '', $str);
  
    return $str;
        }
        
}