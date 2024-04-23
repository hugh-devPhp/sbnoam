<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifieauthentification {

        

        public function check_login($login)
        {
        	
        	
            if($login==0){

            	$data['Infos_de_connexion']="Parametre de connexion invalide";
                redirect('authentification','refresh');


            }
           
        	
        }
}