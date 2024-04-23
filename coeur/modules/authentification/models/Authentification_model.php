<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentification_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function redirect_user(){
        if($this->session->userdata('mode')=="userappli"){
            redirect('accueil');
        }
    }
    
    function check_user($matricule,$password){

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
        $sexe=$data->sexe;
        $activation=$data->activation;
        $respo_role=$data->respo_role;
        $profil_id=$data->id_profils;
        $nom_profil=$data->code_profils;
        $user_restreint=$data->est_restreint;
        $id_compte=$data->id_compte;
        //$photo=$data->photo;


        $data_Session = array(
            'logIn'  => 1,
            'user_id'  => $id_utilisateur,
            'user_nom'=> $nom,
            'user_prenom'=> $prenom,
            'user_nomcomplet'=> $nom_complet,
            'user_sexe'=> $sexe,
            'user_login'=> $matricule,
            'user_idprofil'=> $profil_id,
            'user_nomprofil'=> $nom_profil,
            'user_activation'=> $activation, 
            'user_restreint'=> $user_restreint, 
            'user_compte'=> $id_compte,
            'respo_role'=> $respo_role,
            'mode'=> "user_admin"
        );

        $this->session->set_userdata($data_Session);

    }

     function change_password($id_utilisateur,$data){
    $this->db->where('id_utilisateur', $id_utilisateur);
    $this->db->update('acl_utilisateur', $data);
  }


//     function get_profil($id){
//         $data= $this->mongo_db->where('_id',new MongoId($id))->get('acl_utilisateur_et_profil');
//         return $data;
//     }

// /////
//     function check_login($user){
//         $where = array(
//             'login' => new MongoRegex("/^".$user."$/i")
//         );
//         $nb=$this->mongo_db->where($where)->count('acl_utilisateur_et_profil');

//         return $nb;

//     }

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