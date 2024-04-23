<?php


if (!function_exists('logo')) {
    function logo() {
        $depico = &get_instance();
        $req = $depico->mongo_db->find_one('adresse_infos');
        return $req['logo'];
    }
}

////////////////////////modules de connexion//////////////////////////

if (!function_exists('verif_user')) {
    function verif_user($login, $pass) {
        $depico = &get_instance();
        $req = $depico->mongo_db->where(array('utilisateur_status' => 1, 'utilisateur_email' => $login, 'utilisateur_password' => md5($pass)))->find_one('utilisateur');
        return $req;
    }
}


if (!function_exists('deja_connecter')) {
    function deja_connecter() {
        $depico = &get_instance();
        if (empty($depico->session->userdata('client_souga'))) {
            session_destroy();
            redirect(base_url('connect/admin_loggin'), 'refresh');
        }
    }
}

if (!function_exists('doit_se_connecter')) {
    function doit_se_connecter() {
        $depico = &get_instance();
        if (!empty($depico->session->userdata('client_souga'))) {
            redirect(base_url('administration'), 'refresh');
        }
    }
}


///////////////////fin modules de connexion//////////////////////////
///////////////////modules utilisateur//////////////////////////


// if (!function_exists('test_pour_connecter')) {
//     function test_pour_connecter() {
//         $depico = &get_instance();
//         // $depico->session->set_userdata('client_souga', md5('kacou_martial@yahoo.fr')); // client
//         $depico->session->set_userdata('client_souga', md5('kacoumartial225@gmail.com')); //super admin
//     }
// }

if (!function_exists('code_profil')) {
    function code_profil() {
        $depico = &get_instance();
        $req = $depico->mongo_db->where('utilisateur_email_crpt', $depico->session->userdata('client_souga'))->find_one('utilisateur');
        if(isset($req['code_profil'])){
            return $req['code_profil'];
        }
        else{
            return null;
        }
    }
}

if (!function_exists('tous_les_users')) {
    function tous_les_users() {
        $depico = &get_instance();
        $req = $depico->mongo_db->where('utilisateur_status', 1)->get('utilisateur');
        return $req;
    }
}

if (!function_exists('user_all')) {
    function user_all() {
        $depico = &get_instance();
        $req = $depico->mongo_db->where('utilisateur_status', 1)->where('utilisateur_email_crpt', $depico->session->userdata('client_souga'))->find_one('utilisateur');
        return $req;
    }
}

if (!function_exists('user_admin')) {
    function user_admin() {
        $depico = &get_instance();
        $req = $depico->mongo_db->where(array('code_profil'=> "SUP_ADMIN"))->where('utilisateur_status', 1)->where('utilisateur_email_crpt', $depico->session->userdata('client_souga'))->find_one('utilisateur');
        return $req;
    }
}

if (!function_exists('user_id')) {
    function user_id() {
        $depico = &get_instance();
        $req = $depico->mongo_db->where('utilisateur_status', 1)->where('utilisateur_email_crpt', $depico->session->userdata('client_souga'))->find_one('utilisateur');
        return (string)$req['_id'];
    }
}

if (!function_exists('user_mail')) {
    function user_mail() {
        $depico = &get_instance();
        $req = $depico->mongo_db->where('utilisateur_status', 1)->where('utilisateur_email_crpt', $depico->session->userdata('client_souga'))->find_one('utilisateur');
        return $req['utilisateur_email'];
    }
}

if (!function_exists('user_all_name')) {
    function user_all_name() {
        $depico = &get_instance();
        $req = $depico->mongo_db->where('utilisateur_status', 1)->where('utilisateur_email_crpt', $depico->session->userdata('client_souga'))->find_one('utilisateur');
        return $req['utilisateur_nom'].' '.$req['utilisateur_prenoms'];
    }
}

if (!function_exists('user_name')) {
    function user_name() {
        $depico = &get_instance();
        $req = $depico->mongo_db->where('utilisateur_status', 1)->where('utilisateur_email_crpt', $depico->session->userdata('client_souga'))->find_one('utilisateur');
        return $req->utilisateur_nom;
    }
}

if (!function_exists('user_sirname')) {
    function user_sirname() {
        $depico = &get_instance();
        $req = $depico->mongo_db->where('utilisateur_status', 1)->where('utilisateur_email_crpt', $depico->session->userdata('client_souga'))->find_one('utilisateur');
        return $req->utilisateur_prenoms;
    }
}


if (!function_exists('photo_profil')) {
    function photo_profil() {
        $depico = &get_instance();
        $req = $depico->mongo_db->where('utilisateur_status', 1)->where('utilisateur_email_crpt', $depico->session->userdata('client_souga'))->find_one('utilisateur');
        return $req['utilisateur_image'];
    }
}


if (!function_exists('user_all_byid')) {
    function user_all_byid($id) {
        $depico = &get_instance();
        $req = $depico->mongo_db->where('utilisateur_status', 1)->where('utilisateur_id', $id)->find_one('utilisateur');
        return $req;
    }
}


if (!function_exists('user_all_byemail')) {
    function user_all_byemail($email) {
        $depico = &get_instance();
        $req = $depico->mongo_db->where('utilisateur_status', 1)->where('utilisateur_email', $email)->find_one('utilisateur');
        return $req;
    }
}


if (!function_exists('user_id_byemail')) {
    function user_id_byemail($email) {
        $depico = &get_instance();
        $req = $depico->mongo_db->where('utilisateur_status', 1)->where('utilisateur_email', $email)->find_one('utilisateur');
        return $req->utilisateur_id;
    }
}

if (!function_exists('user_email_byid')) {
    function user_email_byid($id) {
        $depico = &get_instance();
        $req = $depico->mongo_db->where('utilisateur_status', 1)->where('utilisateur_id', $id)->find_one('utilisateur');
        return $req->utilisateur_email;
    }
}

///////////////////fin modules utilisateur//////////////////////////
/////////////////// fonction de crud //////////////////////////

if (!function_exists('get_module_all')) {
    function get_module_all($db) {
        $depico = &get_instance();
        $req = $depico->mongo_db->where($db.'_status', 1)->order_by(array("_id" => "DESC"))->get($db);
        return $req;
    }
}

if (!function_exists('get_module_all_limit')) {
    function get_module_all_limit($db, $limit) {
        $depico = &get_instance();
        $req = $depico->mongo_db->where($db.'_status', 1)->order_by(array('_id' => 'DESC'))->limit($limit)->get($db);
        return $req;
    }
}

if (!function_exists('get_module_all_limit6')) {
    function get_module_all_limit6($db) {
        $depico = &get_instance();
        $req = $depico->mongo_db->where($db.'_status', 1)->order_by(array('_id' => 'DESC'))->limit(6)->get($db);
        return $req;
    }
}

if (!function_exists('get_module_one')) {
    function get_module_one($db,$id) {
        $depico = &get_instance();
        $req = $depico->mongo_db->where('_id', $id)->find_one($db);
        return $req;
    }
}

if (!function_exists('get_module_one_active')) {
    function get_module_one_active($db,$id) {
        $depico = &get_instance();
        $req = $depico->mongo_db->where($db.'_status', 1)->where('_id', $id)->find_one($db);
        return $req;
    }
}

if (!function_exists('get_module_one2')) {
    function get_module_one2($db) {
        $depico = &get_instance();
        $req = $depico->mongo_db->find_one($db);
        return $req;
    }
}

if (!function_exists('ins_module')) {
  function ins_module($database, $donnee){
    $depico = &get_instance();
    $commande = $depico->mongo_db->insert($database, $donnee);

        if($commande>0){
            return true;
        }else{
            return false;
        }
  }
}


if (!function_exists('update_module')) {
  function update_module($id, $data, $database){
    $depico = &get_instance();
    $commande = $depico->mongo_db->where($data.'_id', $id)->set($data)->update($database);
    return true;
  }
}

if (!function_exists('compress')) {
  function compress($data){
    // $data = array();
$caratere_speciaux = array('%20','ç','\'',',',':','(',')',' ','é','è','ê','ë','à','â','ä','ô','ö','ù','û','ü','&');
$caratere_despecialise = array('_','c','_','_','_','_','_','_','e','e','e','e','a','a','a','o','o','u','u','u','et');

    $final_data = str_ireplace($caratere_speciaux,$caratere_despecialise,strtolower($data));
    return $final_data;
  }
}

if (!function_exists('count_module_all')) {
    function count_module_all($db,$status) {
        $depico = &get_instance();
        $req = $depico->mongo_db->where($db.'_status', $status)->get($db);
        return count($req);
    }
}

if (!function_exists('count_module_all_select')) {
    function count_module_all_select($db,$status) {
        $depico = &get_instance();

        $req = $depico->mongo_db->where($db.'_status', $status)->get($db);
        return $req;
    }
}

if (!function_exists('get_row_elt')) {
    function get_row_elt($db, $byid, $elt) {
        $depico = &get_instance();

        $req = $depico->mongo_db->where(array('_id' => new MongoDB\BSON\ObjectId($byid)))->find_one($db);

        return $req["$elt"];
    }
}

if (!function_exists('get_onglet')) {
    function get_onglet($idmodule, $code_profil, $email, $idmenu, $idsousmenu) {
        $depico = &get_instance();
        $action = array();
        $action2 = array();
        $typ = array();

        $action = $depico->mongo_db;

        if($idmodule !== "") {
            $action->where('id_module', $idmodule);
        }

        if($idmenu !== "") {
            $action->where('id_menu', $idmenu);
        }

        if($idsousmenu !== "") {
            $action->where('id_sous_menu', $idsousmenu);
        }

        if($code_profil !== "") {
            $action->where('code_profile', $code_profil);
        }

        if($email !== ""){
            $action->where('email', $email);
        }

        // $action->where_ne('id_liste_action', '');
        // $action->where_ne('id_liste_action', null);

        $typ = $action->get('acl_action');

        if(!empty($typ)){
            foreach($typ as $row){
                $action2[] = (string)$row['_id'];
            }
        }

        if(!empty($action2)){
            $req = $depico->mongo_db;
            if($idmodule !== "") {
                $req->where('id_module', $idmodule);
            }
            if($idmenu !== "") {
                $req->where('id_menu', $idmenu);
            }
            if($idsousmenu !== "") {
                $req->where('id_sous_menu', $idsousmenu);
            }
            $req->where_in('id_action', $action2);
            $req2 = $req->order_by(array('position' => 'ASC'))->get('acl_onglet');
        }
        else{
            $req2 = array();
        }

        return $req2;
    }
}

if (!function_exists('get_onglet2')) {
    function get_onglet2($code_profil, $email, $idmenu, $idsousmenu) {
        $depico = &get_instance();
        $action = array();
        $action2 = array();
        $typ = array();
        $open = array();

        $action = $depico->mongo_db;

        if($idmenu !== "") {
            $action->where('id_menu', $idmenu);
        }

        if($idsousmenu !== "") {
            $action->where('id_sous_menu', $idsousmenu);
        }

        if($code_profil !== "") {
            $action->where('code_profile', $code_profil);
        }

        if($email !== ""){
            $action->where('email', $email);
        }

        $typ = $action->get('acl_action');

        if(!empty($typ)){
            foreach($typ as $row){
                $action2[] = $row['id_onglet'];
            }
        }

        if(!empty($action2)){
            $req = $depico->mongo_db;
            if($idmenu !== "") {
                $req->where('id_menu', $idmenu);
            }
            if($idsousmenu !== "") {
                $req->where('id_sous_menu', $idsousmenu);
            }
            $req->where_in('_id', $action2);
            $req->order_by(array('position', 'asc'));
            $req2 = $req->get('acl_onglet');



//////////////////////////////////////////////
            if(!empty($req2)) {
            foreach($req2 as $foot){
                $dol = $depico->mongo_db->where('id_onglet', (string)$foot['_id'])->get('acl_action');
            if(!empty($dol)) {
                foreach($dol as $goo)
                {
                    $trol = $depico->mongo_db->where('_id', new MongoDB\BSON\ObjectId($goo['id_liste_action']))->find_one('acl_list_action');

                    $req_modul = $depico->mongo_db->where('_id', new MongoDB\BSON\ObjectId($trol['id_module']))->find_one('acl_module');

                    if(!empty($trol)) {
                    $open['_id'] = $foot['_id'];
                    $open['id_module'] = $foot['id_module'];
                    $open['id_menu'] = $foot['id_menu'];
                    $open['id_sous_menu'] = $foot['id_sous_menu'];
                    $open['id_action'] = $foot['id_action'];
                    $open['designation'] = $foot['designation'];
                    $open['description'] = $foot['description'];
                    $open['position'] = $foot['position'];
                    // $open['bloc_index'] = $foot['bloc_index'];
                    $open['date_ajout'] = $foot['date_ajout'];
                    $open['date_modification'] = $foot['date_modification'];
                    $open['status'] = $foot['status'];
                    $open['status'] = $foot['status'];
                    $open['id_liste_action'] = $goo['id_liste_action'];
                    $open['fonction'] = $trol['fonction'];
                    $open['module_name'] = $req_modul['designation'];
                    $open['email'] = $goo['email'];

                    $last_open[] = $open;
                    }
                  }
                }
            }
            }
            // $req2 = $req2
            ///////////////////////////////////////////////

            // var_dump($last_open);exit();

        }
        else{
            $last_open = array();
            return $last_open;
        }
        return $last_open;
    }
}

if (!function_exists('id_module_by_name')) {
    function id_module_by_name($name) {
        $name = strtolower($name);
        $depico = &get_instance();
        $req = $depico->mongo_db->where(array("designation"=>$name))->find_one('acl_module');
        // var_dump($req);exit();
        return (string)$req['_id'];
    }
}

if (!function_exists('last_id')) {
    function last_id($bdd) {
        $depico = &get_instance();
        $req = $depico->mongo_db->order_by(array('_id'=>'desc'))->limit(1)->find_one($bdd);
        $result = (string)$req['_id'];
        return $result;
    }
}


if (!function_exists('ville')) {
    function ville() {
        $depico = &get_instance();
        $req = $depico->mongo_db->order_by(array('_id'=>'asc'))->get("ville");
        return $req;
    }
}

if (!function_exists('commune')) {
    function commune() {
        $depico = &get_instance();
        $req = $depico->mongo_db->order_by(array('_id'=>'desc'))->get("commune");
        return $req;
    }
}










if (!function_exists('liste_pays')) {
    function liste_pays() {
$pays_array = array(
    "pays" => "pays",
    "Cote_d_ivoire"=>"C&ocirc;te d\'Ivoire",
    "Afghanistan"=>"Afghanistan",
    "Afrique_du_sud"=>"Afrique du Sud",
    "Albanie"=>"Albanie",
    "Algerie"=>"Algerie",
    "Allemagne"=>"Allemagne",
    "Andorre"=>"Andorre",
    "Angola"=>"Angola",
    "Anguilla"=>"Anguilla",
    "Arabie_Saoudite"=>"Arabie Saoudite",
    "Argentine"=>"Argentine",
    "Armenie"=>"Armenie",
    "Australie"=>"Australie",
    "Autriche"=>"Autriche",
    "Azerbaidjan"=>"Azerbaidjan",

    "Bahamas"=>"Bahamas",
    "Bangladesh"=>"Bangladesh",
    "Barbade"=>"Barbade",
    "Bahrein"=>"Bahrein",
    "Belgique"=>"Belgique",
    "Belize"=>"Belize",
    "Benin"=>"Benin",
    "Bermudes"=>"Bermudes",
    "Bielorussie"=>"Bielorussie",
    "Bolivie"=>"Bolivie",
    "Botswana"=>"Botswana",
    "Bhoutan"=>"Bhoutan",
    "Boznie_Herzegovine"=>"Boznie Herzegovine",
    "Bresil"=>"Bresil",
    "Brunei"=>"Brunei",
    "Bulgarie"=>"Bulgarie",
    "Burkina_Faso"=>"Burkina Faso",
    "Burundi"=>"Burundi",

    "Caiman"=>"Caiman (îles)",
    "Cambodge"=>"Cambodge",
    "Cameroun"=>"Cameroun",
    "Canada"=>"Canada",
    "Canaries"=>"Canaries",
    "Cap_vert"=>"Cap Vert",
    "Chili"=>"Chili",
    "Chine"=>"Chine",
    "Chypre"=>"Chypre",
    "Colombie"=>"Colombie",
    "Comores"=>"Comores",
    "Congo"=>"Congo",
    "Congo_democratique"=>"Congo democratique",
    "Cook"=>"Cook (îles)",
    "Coree_du_Nord"=>"Coree du Nord",
    "Coree_du_Sud"=>"Coree du Sud",
    "Costa_Rica"=>"Costa Rica",
    "Cote_d_Ivoire"=>"C&ocirc;te d&#39;Ivoire",
    "Croatie"=>"Croatie",
    "Cuba"=>"Cuba",

    "Danemark"=>"Danemark",
    "Djibouti"=>"Djibouti",
    "Dominique"=>"Dominique",

    "Egypte"=>"Egypte",
    "Emirats_Arabes_Unis"=>"Emirats Arabes Unis",
    "Equateur"=>"Equateur",
    "Erythree"=>"Erythree",
    "Espagne"=>"Espagne",
    "Estonie"=>"Estonie",
    "Etats_Unis"=>"Etats Unis",
    "Ethiopie"=>"Ethiopie",

    "Falkland"=>"Falkland (île)",
    "Feroe"=>"Feroe (îles)",
    "Fidji"=>"Fidji",
    "Finlande"=>"Finlande",
    "France"=>"France",

    "Gabon"=>"Gabon",
    "Gambie"=>"Gambie",
    "Georgie"=>"Georgie",
    "Ghana"=>"Ghana",
    "Gibraltar"=>"Gibraltar",
    "Grece"=>"Grece",
    "Grenade"=>"Grenade",
    "Groenland"=>"Groenland",
    "Guadeloupe"=>"Guadeloupe",
    "Guam"=>"Guam",
    "Guatemala"=>"Guatemala",
    "Guernesey"=>"Guernesey",
    "Guinee"=>"Guinee",
    "Guinee_Bissau"=>"Guinee Bissau",
    "Guinee_equatoriale"=>"Guinee Equatoriale",
    "Guyana"=>"Guyana",
    "Guyane_Francaise "=>"Guyane Francaise",

    "Haiti"=>"Haiti",
    "Hawaii"=>"Hawaii",
    "Honduras"=>"Honduras",
    "Hong_Kong"=>"Hong Kong",
    "Hongrie"=>"Hongrie",

    "Inde"=>"Inde",
    "Indonesie"=>"Indonesie",
    "Iran"=>"Iran",
    "Iraq"=>"Iraq",
    "Irlande"=>"Irlande",
    "Islande"=>"Islande",
    "Israel"=>"Israel",
    "Italie"=>"italie",

    "Jamaique"=>"Jamaique",
    "Jan_Mayen"=>"Jan Mayen",
    "Japon"=>"Japon",
    "Jersey"=>"Jersey",
    "Jordanie"=>"Jordanie",

    "Kazakhstan"=>"Kazakhstan",
    "Kenya"=>"Kenya",
    "Kirghizstan"=>"Kirghizistan",
    "Kiribati"=>"Kiribati",
    "Koweit"=>"Koweit",

    "Laos"=>"Laos",
    "Lesotho"=>"Lesotho",
    "Lettonie"=>"Lettonie",
    "Liban"=>"Liban",
    "Liberia"=>"Liberia",
    "Liechtenstein"=>"Liechtenstein",
    "Lituanie"=>"Lituanie",
    "Luxembourg"=>"Luxembourg",
    "Lybie"=>"Lybie",

    "Macao"=>"Macao",
    "Macedoine"=>"Macedoine",
    "Madagascar"=>"Madagascar",
    "Malaisie"=>"Malaisie",
    "Malawi"=>"Malawi",
    "Maldives"=>"Maldives",
    "Mali"=>"Mali",
    "Malte"=>"Malte",
    "Man"=>"Man (île)",
    "Mariannes_du_Nord"=>"Mariannes du Nord",
    "Maroc"=>"Maroc",
    "Marshall"=>"Marshall (îles)",
    "Martinique"=>"Martinique",
    "Maurice"=>"Maurice",
    "Mauritanie"=>"Mauritanie",
    "Mayotte"=>"Mayotte",
    "Mexique"=>"Mexique",
    "Micronesie"=>"Micronesie",
    "Moldavie"=>"Moldavie",
    "Monaco"=>"Monaco",
    "Mongolie"=>"Mongolie",
    "Montserrat"=>"Montserrat",
    "Mozambique"=>"Mozambique",

    "Namibie"=>"Namibie",
    "Nauru"=>"Nauru",
    "Nepal"=>"Nepal",
    "Nicaragua"=>"Nicaragua",
    "Niger"=>"Niger",
    "Nigeria"=>"Nigeria",
    "Niue"=>"Niue",
    "Norfolk"=>"Norfolk (île)",
    "Norvege"=>"Norvege",
    "Nouvelle_Caledonie"=>"Nouvelle Caledonie",
    "Nouvelle_Zelande"=>"Nouvelle Zelande",

    "Oman"=>"Oman",
    "Ouganda"=>"Ouganda",
    "Ouzbekistan"=>"Ouzbekistan",

    "Pakistan"=>"Pakistan",
    "Palau"=>"Palau",
    "Palestine"=>"Palestine",
    "Panama"=>"Panama",
    "Papouasie_Nouvelle_Guinee"=>"Papouasie Nouvelle",
    "Paraguay"=>"Paraguay",
    "Pays_Bas"=>"Pays Bas",
    "Perou"=>"Perou",
    "Philippines"=>"Philippines",
    "Pologne"=>"Pologne",
    "Polynesie"=>"Polynesie",
    "Porto_Rico"=>"Porto Rico",
    "Portugal"=>"Portugal",

    "Qatar"=>"Qatar",

    "republique_Dominicaine"=>"Republique Dominicaine",
    "republique_Tcheque"=>"Republique Tcheque",
    "reunion"=>"Reunion",
    "roumanie"=>"Roumanie",
    "royaume_Uni"=>"Royaume Uni",
    "russie"=>"Russie",
    "rwanda"=>"Rwanda",

    "sahara_occidental"=>"Sahara Occidental",
    "Sainte_Lucie"=>"Sainte Lucie",
    "Saint_Marin"=>"Saint Marin",
    "Salomon"=>"Salomon",
    "Salvador"=>"Salvador",
    "Samoa_Occidentales"=>"Samoa Occidentales",
    "Samoa_Americaine"=>"Samoa Americaine",
    "Sao_Tome_et_Principe"=>"Sao Tome et Principe",
    "Senegal"=>"Senegal",
    "Seychelles"=>"Seychelles",
    "Sierra Leone"=>"Sierra Leone",
    "Singapour"=>"Singapour",
    "Slovaquie"=>"Slovaquie",
    "Slovenie"=>"Slovenie",
    "Somalie"=>"Somalie",
    "Soudan"=>"Soudan",
    "Sri_Lanka"=>"Sri Lanka",
    "Suede"=>"Suede",
    "Suisse"=>"Suisse",
    "Surinam"=>"Surinam",
    "Swaziland"=>"Swaziland",
    "Syrie"=>"Syrie",

    "Tadjikistan"=>"Tadjikistan",
    "Taiwan"=>"Taiwan",
    "Tonga"=>"Tonga",
    "Tanzanie"=>"Tanzanie",
    "Tchad"=>"Tchad",
    "Thailande"=>"Thailande",
    "Tibet"=>"Tibet",
    "Timor_Oriental"=>"Timor Oriental",
    "Togo"=>"Togo",
    "Trinite_et_Tobago"=>"Trinite et Tobago",
    "Tristan_da_cunha"=>"Tristan de cuncha",
    "Tunisie"=>"Tunisie",
    "Turkmenistan"=>"Turmenistan",
    "Turquie"=>"Turquie",

    "Ukraine"=>"Ukraine",
    "Uruguay"=>"Uruguay",

    "Vanuatu"=>"Vanuatu",
    "Vatican"=>"Vatican",
    "Venezuela"=>"Venezuela",
    "Vierges_Americaines"=>"Vierges Americaines",
    "Vierges_Britanniques"=>"Vierges Britanniques",
    "Vietnam"=>"Vietnam",

    "Wallis_et_Futuma"=>"Wallis et Futuma",

    "Yemen"=>"Yemen",
    "Yougoslavie"=>"Yougoslavie",

    "Zambie"=>"Zambie",
    "Zimbabwe"=>"Zimbabwe"
);

        return $pays_array;
    }
}


if (!function_exists('list_func')) {
    function list_func() {
    $data_func = array(
'get_accueil' => '60eebbfb89ae0f97715ed803',
'get_utilisateur_profil' => '61308f0586e72037c8003e08',
'show_edit_utilisateur_profil' => '61308f0586e72037c8003e08',
'edit_utilisateur_profil' => '61308f0586e72037c8003e08',
'get_password' => '61308f0586e72037c8003e08',
'edit_password' => '61308f0586e72037c8003e08',
'get_utilisateur' => '61308f0586e72037c8003e08',
'show_add_utilisateur' => '61308f0586e72037c8003e08',
'add_utilisateur' => '61308f0586e72037c8003e08',
'show_edit_utilisateur' => '61308f0586e72037c8003e08',
'edit_utilisateur' => '61308f0586e72037c8003e08',
'del_utilisateur' => '61308f0586e72037c8003e08',
'del_utilisateur_all' => '61308f0586e72037c8003e08',
'get_module' => '60e6feb22240f8f2d5ce1901',
'show_add_module' => '60e6feb22240f8f2d5ce1901',
'add_module' => '60e6feb22240f8f2d5ce1901',
'show_edit_module' => '60e6feb22240f8f2d5ce1901',
'edit_module' => '60e6feb22240f8f2d5ce1901',
'del_module' => '60e6feb22240f8f2d5ce1901',
'del_module_all' => '60e6feb22240f8f2d5ce1901',
'get_menu' => '60e6feb22240f8f2d5ce1901',
'show_add_menu' => '60e6feb22240f8f2d5ce1901',
'add_menu' => '60e6feb22240f8f2d5ce1901',
'show_edit_menu' => '60e6feb22240f8f2d5ce1901',
'edit_menu' => '60e6feb22240f8f2d5ce1901',
'del_menu' => '60e6feb22240f8f2d5ce1901',
'del_menu_all' => '60e6feb22240f8f2d5ce1901',
'get_sous_menu' => '60e6feb22240f8f2d5ce1901',
'show_add_sous_menu' => '60e6feb22240f8f2d5ce1901',
'add_sous_menu' => '60e6feb22240f8f2d5ce1901',
'show_edit_sous_menu' => '60e6feb22240f8f2d5ce1901',
'edit_sous_menu' => '60e6feb22240f8f2d5ce1901',
'del_sous_menu' => '60e6feb22240f8f2d5ce1901',
'del_sous_menu_all' => '60e6feb22240f8f2d5ce1901',
'get_onglets' => '60e6feb22240f8f2d5ce1901',
'show_add_onglet' => '60e6feb22240f8f2d5ce1901',
'add_onglet' => '60e6feb22240f8f2d5ce1901',
'show_edit_onglet' => '60e6feb22240f8f2d5ce1901',
'edit_onglet' => '60e6feb22240f8f2d5ce1901',
'del_onglet' => '60e6feb22240f8f2d5ce1901',
'del_onglet_all' => '60e6feb22240f8f2d5ce1901',
'get_adresse_info' => '613a1c8d86e7200b0c001817',
'show_edit_adresse_info' => '613a1c8d86e7200b0c001817',
'edit_adresse_info' => '613a1c8d86e7200b0c001817',
'get_message' => '613a1c8d86e7200b0c001817',
'show_reply_message' => '613a1c8d86e7200b0c001817',
'send_message' => '613a1c8d86e7200b0c001817',
'show_read_message' => '613a1c8d86e7200b0c001817',
'del_message' => '613a1c8d86e7200b0c001817',
'del_message_all' => '613a1c8d86e7200b0c001817',
'get_avis' => '613a1c8d86e7200b0c001817',
'show_add_avis' => '613a1c8d86e7200b0c001817',
'add_avis' => '613a1c8d86e7200b0c001817',
'show_edit_avis' => '613a1c8d86e7200b0c001817',
'edit_avis' => '613a1c8d86e7200b0c001817',
'del_avis' => '613a1c8d86e7200b0c001817',
'del_avis_all' => '613a1c8d86e7200b0c001817',
'get_newsletter' => '613a1c8d86e7200b0c001817',
'show_add_newsletter' => '613a1c8d86e7200b0c001817',
'add_newsletter' => '613a1c8d86e7200b0c001817',
'show_edit_newsletter' => '613a1c8d86e7200b0c001817',
'edit_newsletter' => '613a1c8d86e7200b0c001817',
'del_newsletter' => '613a1c8d86e7200b0c001817',
'del_newsletter_all' => '613a1c8d86e7200b0c001817',
'get_slide_accueil' => '613355f486e72037c8003f5b',
'show_add_slide_accueil' => '613355f486e72037c8003f5b',
'add_slide_accueil' => '613355f486e72037c8003f5b',
'show_edit_slide_accueil' => '613355f486e72037c8003f5b',
'edit_slide_accueil' => '613355f486e72037c8003f5b',
'del_slide_accueil' => '613355f486e72037c8003f5b',
'del_slide_accueil_all' => '613355f486e72037c8003f5b',
'get_qui_sommes_nous' => '613355f486e72037c8003f5b',
//'show_edit_offres' => '613355f486e72037c8003f5b',
'edit_qui_sommes_nous' => '613355f486e72037c8003f5b',
'get_profil' => '60fff6fc86e7202ca0004581',
'show_add_profil' => '60fff6fc86e7202ca0004581',
'add_profil' => '60fff6fc86e7202ca0004581',
'show_edit_profil' => '60fff6fc86e7202ca0004581',
'edit_profil' => '60fff6fc86e7202ca0004581',
'del_profil' => '60fff6fc86e7202ca0004581',
'del_profil_all' => '60fff6fc86e7202ca0004581',
'get_attr_onglet' => '60fff6fc86e7202ca0004581',
'show_add_attr_onglet' => '60fff6fc86e7202ca0004581',
'add_attr_onglet' => '60fff6fc86e7202ca0004581',
'add_attr_onglet_one' => '60fff6fc86e7202ca0004581',
'show_edit_attr_onglet' => '60fff6fc86e7202ca0004581',
'edit_attr_onglet' => '60fff6fc86e7202ca0004581',
'del_attr_onglet' => '60fff6fc86e7202ca0004581',
'del_attr_onglet_all' => '60fff6fc86e7202ca0004581',
'get_perm_profil' => '60fff6fc86e7202ca0004581',
'get_perm_profil2' => '60fff6fc86e7202ca0004581',
'add_perm_profil' => '60fff6fc86e7202ca0004581',
'add_perm_profil_one' => '60fff6fc86e7202ca0004581',
'del_perm_profil_one' => '60fff6fc86e7202ca0004581',
'get_perm_utilisateur' => '60fff6fc86e7202ca0004581',
'add_perm_utilisateur' => '60fff6fc86e7202ca0004581',
'add_perm_utilisateur_one' => '60fff6fc86e7202ca0004581',
'get_tous_les_interesses' => '6138e2d286e7200b0c0016d8',
'del_tous_les_interesses' => '6138e2d286e7200b0c0016d8',
'del_tous_les_interesses_all' => '6138e2d286e7200b0c0016d8',
'get_mes_interesses' => '6138e2d286e7200b0c0016d8',
'del_mes_interesses' => '6138e2d286e7200b0c0016d8',
'del_mes_interesses_all' => '6138e2d286e7200b0c0016d8',
'get_toutes_les_demandes' => '6138e2d286e7200b0c0016d8',
'del_toutes_les_demandes' => '6138e2d286e7200b0c0016d8',
'del_toutes_les_demandes_all' => '6138e2d286e7200b0c0016d8',
'get_visiteurs' => '6138e2d286e7200b0c0016d8',
'del_visiteurs' => '6138e2d286e7200b0c0016d8',
'del_visiteurs_all' => '6138e2d286e7200b0c0016d8',
'get_tous_les_produits' => '613355cf86e72037c8003f5a',
'show_add_tous_les_produits' => '613355cf86e72037c8003f5a',
'add_tous_les_produits' => '613355cf86e72037c8003f5a',
'show_edit_tous_les_produits' => '613355cf86e72037c8003f5a',
'edit_tous_les_produits' => '613355cf86e72037c8003f5a',
'del_tous_les_produits' => '613355cf86e72037c8003f5a',
'del_tous_les_produits_all' => '613355cf86e72037c8003f5a',
'get_mes_produits' => '613355cf86e72037c8003f5a',
'show_add_tous_mes_produits' => '613355cf86e72037c8003f5a',
'add_tous_mes_produits' => '613355cf86e72037c8003f5a',
'show_edit_tous_mes_produits' => '613355cf86e72037c8003f5a',
'edit_tous_mes_produits' => '613355cf86e72037c8003f5a',
'del_tous_mes_produits' => '613355cf86e72037c8003f5a',
'del_tous_mes_produits_all' => '613355cf86e72037c8003f5a',
'get_type_produit' => '613355cf86e72037c8003f5a',
'show_add_type_produit' => '613355cf86e72037c8003f5a',
'add_type_produit' => '613355cf86e72037c8003f5a',
'show_edit_type_produit' => '613355cf86e72037c8003f5a',
'edit_type_produit' => '613355cf86e72037c8003f5a',
'del_type_produit' => '613355cf86e72037c8003f5a',
'del_type_produit_all' => '613355cf86e72037c8003f5a',
'get_offre' => '613355cf86e72037c8003f5a',
'show_add_offres' => '613355cf86e72037c8003f5a',
'add_offres' => '613355cf86e72037c8003f5a',
'show_edit_offres' => '613355cf86e72037c8003f5a',
'edit_offres' => '613355cf86e72037c8003f5a',
'del_offres' => '613355cf86e72037c8003f5a',
'del_offres_all' => '613355cf86e72037c8003f5a',
'get_type_materiel_construction' => '613355cf86e72037c8003f5a',
'show_add_type_materiel_de_construction' => '613355cf86e72037c8003f5a',
'add_type_materiel_de_construction' => '613355cf86e72037c8003f5a',
'show_edit_type_materiel_de_construction' => '613355cf86e72037c8003f5a',
'edit_type_materiel_de_construction' => '613355cf86e72037c8003f5a',
'del_type_materiel_de_construction' => '613355cf86e72037c8003f5a',
'del_type_materiel_de_construction_all' => '613355cf86e72037c8003f5a'
);
        return $data_func;
    }
}



