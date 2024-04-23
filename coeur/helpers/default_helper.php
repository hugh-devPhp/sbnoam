<?php
/**
 * Check admin is login or not
 *
 * @access  public
 * @param   string
 * @return  bool
 */

if (!function_exists('admin_in')) {
    function admin_in() {

        $object = &get_instance();
        if ($object->session->userdata('logIn') == false && $object->session->userdata('super')==false) {
            $object->session->sess_destroy();

            $object->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
            $object->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
            $object->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
            $object->output->set_header('Pragma: no-cache');

            echo '<script>window.top.location.href="'.base_url().'authentification";</script>';
            exit();
        }
    }
}

if (!function_exists('admin_is')) {
    function admin_is() {
        $object = &get_instance();
        if($object->session->userdata('mode')=="user_admin"){
            redirect('administration');
        }
    }
}

if (!function_exists('is_inarray')) {

    function is_inarray() {

        $c = &get_instance();
        $id_profil=(string) $c->session->userdata('user_idprofil');
        $module= $c->uri->segment(2);

        $data=array();

        $c->db->select('*');
        $c->db->from('acl_droit_profil');
        $c->db->where(array('profil_id' => $id_profil, 'module_droit_profil'  => $module, 'controller_droit_profil'  => $module));
        $q=$c->db->get();
        foreach ($q->result() as $lign)
        {
            $data[]=$lign->action_droit_profil;
        }
        return $data;
    }

}



if (!function_exists('RepEfface')) {
    function RepEfface($dir) {

        $handle = opendir($dir);
        while($elem = readdir($handle))
//ce while vide tous les repertoire et sous rep
        {
            if(is_dir($dir.'/'.$elem) && substr($elem, -2, 2) !== '..' && substr(
                    $elem, -1, 1) !== '.') //si c'est un repertoire
            {
                RepEfface($dir.'/'.$elem);
            }
            else
            {
                if(substr($elem, -2, 2) !== '..' && substr($elem, -1, 1) !== '.')
                {
                    unlink($dir.'/'.$elem);
                }
            }

        }

        $handle = opendir($dir);
        while($elem = readdir($handle)) //ce while efface tous les dossiers
        {
            if(is_dir($dir.'/'.$elem) && substr($elem, -2, 2) !== '..' && substr(
                    $elem, -1, 1) !== '.') //si c'est un repertoire
            {
                RepEfface($dir.'/'.$elem);
                rmdir($dir.'/'.$elem);
            }

        }
        rmdir($dir); //ce rmdir eface le repertoire principale
        return true;
    }

    if (!function_exists('persodate_en_fr')) {

        function persodate_en_fr($dateperso) {

            $dateperso = str_replace("-", "", $dateperso);

            if($dateperso!=''){
                $annee = substr($dateperso, 0, 4);
                $mois = substr($dateperso, 4, 2);
                $jour = substr($dateperso, 6, 2);
                $sortie=$jour."/".$mois."/".$annee;
            }
            else $sortie='';
            return($sortie);
        }

    }

    if (!function_exists('infos_client')) {

        function infos_client() {

            $c = &get_instance();

            $id_client = $c->session->userdata("id_client");

            $c->db->where(array("id_client"=>$id_client));
            $client = $c->db->get("app_client");
            $client = $client->row_array();

            return $client;
        }

    }

    if (!function_exists('infos_profil')) {

        function infos_profil($id) {

            $c = &get_instance();


            $c->db->where(array("id_profils"=>$id));
            $profils = $c->db->get("acl_profils");
            $profils = $profils->row_array();

            return $profils;
        }

    }

    if (!function_exists('infos_marque')) {

        function infos_marque($id) {

            $c = &get_instance();

            $c->db->where(array("id_marque"=>$id));
            $query = $c->db->get("app_marque");
            $query = $query->row_array();

            return $query;
        }

    }
    if (!function_exists('infos_model')) {

        function infos_model($id) {

            $c = &get_instance();

            $c->db->where(array("id_model"=>$id));
            $query = $c->db->get("app_model");
            $query = $query->row_array();

            return $query;
        }

    }

    if (!function_exists('infos_marque')) {

        function infos_marque($id_marque) {

            $c = &get_instance();

            $c->db->where(array("id_marque"=>$id_marque));
            $client = $c->db->get("app_marque");
            $client = $client->row_array();

            return $client;
        }

    }

    if (!function_exists('infos_model')) {

        function infos_model($id_model) {

            $c = &get_instance();

            $c->db->where(array("id_model"=>$id_model));
            $client = $c->db->get("app_model");
            $client = $client->row_array();

            return $client;
        }

    }

    if (!function_exists('panier')) {

        function panier() {

            $c = &get_instance();



            $data = array();
            $data['nb_article'] = 0;
            $data['prix_article'] = 0;

            $id_client = $c->session->userdata("id_client");

            if(!$id_client){

                $carts = $c->cart->contents();

                if(!empty($carts)){
                    foreach ($carts as $key=>$cart){
                        $c->db->where(array("article_id"=>$cart['id']));
                        $article = $c->db->get("app_article");
                        $article = $article->row_array();
                        if(isset($cart['option']['est_favoris']) && $cart['option']['est_favoris'] == '0' && !empty($article)){
                            if((int)$article['prix_promo']>0){ $prix =  $article['prix_promo']; }else{ $prix = $article['prix']; }
                            $article['article_id'] = $cart['id'];
                            $data['nb_article'] += $cart['qty'];
                            $data['prix_article'] += $cart['qty']*$prix;
                            $article['qty'] = $cart['qty'];
                            $data['data'][] = $article;
                        }


                    }
                }
            }else{
                $id_client = $c->session->userdata("id_client");
                $c->db->where(array("client_id"=>$id_client));
                $panier = $c->db->get("app_panier");
                $panier = $panier->result_array();
                if(!empty($panier)) {
                    foreach ($panier as $item) {
                        $id_article = $item['article_id'];
                        $c->db->where(array("article_id"=>$id_article));
                        $article = $c->db->get("app_article");
                        $article = $article->row_array();

                        if(!empty($article)){
                            if((int)$article['prix_promo']>0){ $prix =  $article['prix_promo']; }else{ $prix = $article['prix']; }
                            $data['nb_article'] += (int)$item['quantite_panier'];
                            $data['prix_article'] += (int)$prix*(int)$item['quantite_panier'];
                            $article['qty'] = (int)$item['quantite_panier'];
                            $data['data'][] = $article;
                        }

                    }
                }

            }




            return $data;
        }

    }

    if (!function_exists('infos')) {
        function infos() {
            $depico = &get_instance();
            $req = $depico->db->get('cms_infos_generale');
            return $req->row_array();
        }
    }

    if (!function_exists('client_in')) {
        function client_in() {

            $object = &get_instance();
            if ($object->session->userdata('id_client') == false ) {
                $object->session->sess_destroy();

                $object->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
                $object->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
                $object->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
                $object->output->set_header('Pragma: no-cache');

                echo '<script>window.top.location.href="'.base_url().'connexion";</script>';
                exit();
            }
        }
    }

    if (!function_exists('nb_vehicule')) {
        function nb_vehicule() {

            return 9;
        }
    }

    if (!function_exists('visitor')) {
        function visitor()
        {
            $object = &get_instance();

            $public_ip = getPublicIP();
            $data_sess = array("ip_address" => $public_ip, "is_visited" => true);
            $object->session->set_userdata($data_sess);
            $session = $object->session->all_userdata();



            $info_ip = ip_details($session['ip_address']);
            $pays = "";
            if (isset($info_ip->country)) {
                $pays = $info_ip->country;
            }
            $region = "";
            if (isset($info_ip->region)) {
                $region = $info_ip->region;
            }



            $data = array(
//                'visiteur_session' => $session['session_id'],
                'visiteur_ip' => $session['ip_address'],
                'visiteur_date' => date("YmdHis"),
                'visiteur_date1' => date("Ymd"),
                'visiteur_pays' => $pays,
                'visiteur_ville' => $region,
            );

            $object->db->where(array("visiteur_date1"=>date("Ymd"), 'visiteur_ip'=>$session['ip_address']));
            $visiteur = $object->db->get('app_visiteur');

            $visiteur = $visiteur->row_array();

            if(empty($visiteur)){
                $object->db->insert("app_visiteur", $data);
            }

        }
    }


    function ip_details($IPaddress)
    {
//    $IPaddress="154.0.27.156";
        $json       = file_get_contents("http://ipinfo.io/{$IPaddress}");
        $details    = json_decode($json);
        return $details;
    }

    function getPublicIP() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://httpbin.org/ip');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);
        return $data['origin'];
    }
}