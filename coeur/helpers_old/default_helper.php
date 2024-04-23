<?php


if (!function_exists('logged_in')) {

    function logged_in() {
        $object = &get_instance();
        $data_session = $object->session->userdata('id');

        if(empty($data_session)){
            redirect("Connexion");
        }
    }
}

// -----------------------------------------------------------------------
if (!function_exists('info_utilisateur')) {

    function info_utilisateur() {
        $object = &get_instance();
        $id = $object->session->userdata('id');

        $cursor = $object->mongo_db->where("_id",new MongoDB\BSON\ObjectId($id))->find_one("acl_utilisateur_et_profil");

        return $cursor;
    }
}

// -----------------------------------------------------------------------

if (!function_exists('is_inrights')) {

    function is_inrights() {

        $c = &get_instance();
        $id_profil=(string) $c->session->userdata('id_profil');
        $module= $c->uri->segment(2);
        $Querys = array(
            'id_profil' => $id_profil,
            'droit_profil_module' => $module
        );

        $cursor = $c->mongo_db->where($Querys)->select(array("droit_profil_action"))->get("acl_droit_profil");

        $data=array();

        foreach ($cursor as $document) {
            $data[]=(String)$document['droit_profil_action'];
        }
        return $data;
    }

}

// ------------------------------------------------------------------------
if (!function_exists('droit_profil')) {

    function droit_profil() {

        $c = &get_instance();
        $email=(string) $c->session->userdata('email');
        $code_profil=(string) $c->session->userdata('code_profil');
        $module= $c->uri->segment(2);
        $Querys = array('code_profil' => $code_profil, 'designation_module' => $module);

        $where = array('designation_module' => $module, 'code_profil' => $code_profil, 'email'=>$email);

        $cursor = $c->mongo_db->where($Querys)->get("liste_action_profil");

//        echo '<pre>';
//        var_dump($module);
//        echo '</pre>';
//        exit;


        $data=array();
        $droit_user_ajout=array();
        $droit_user_retrait=array();

        foreach ($cursor as $document) {
            $data[]=$document['designation_action'];
        }

        $droit = $c->mongo_db->where($where)->select(array("designation_action","type"))->get("liste_action_utilisateur");

        if($droit>0){
            foreach($droit as $el){
                if($el['type'] == '1'){
                    $droit_user_ajout[] = $el['designation_action'];
                }else{
                    $droit_user_retrait[] = $el['designation_action'];
                }

            }
        }

        if(!empty($droit_user_retrait)){
            $data = array_diff($data,$droit_user_retrait);
        }

        if(!empty($droit_user_ajout)){
            $data = array_merge($data,$droit_user_ajout);
        }

        return $data;
    }

}




if (!function_exists('get_flash')) {

    function get_flash() {

        $object = &get_instance();

        $flashs = $object->db->where('flash_statut',1)->get('flash');

        return $flashs->result();
    }

}

if (!function_exists('logged_out')) {

    function logged_out() {

        $object = &get_instance();

        session_destroy();

        redirect("connexion");
    }

}





