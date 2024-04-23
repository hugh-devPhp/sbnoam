<?php defined('BASEPATH') or exit('No direct script access allowed');

class Commandes extends MX_Controller
{
    public function __construct()
    {

        parent::__construct();
        admin_in();
        $this->load->model('adminacl_model');
        $this->load->model('administration_model');
        $this->load->model('configuration_model');
        $this->load->model('tplconfig_model');
        $this->load->model('article_model');


    }

    public function index($adtab = NULL)
    {
        if (is_null($adtab)) $adtab = "1";
        $nom_module = 'commandes';
        $blocmenu = "Gestion_commandes";
        $pages_title = "Gestion des commandes";
        $data = $this->tplconfig_model->configmenu($nom_module, $blocmenu, $pages_title, $adtab);
        //var_dump($data);
        $this->load->view('intro_view', $data);
    }

    function get_commandes()
    {
        $data['onglet_title'] = "Liste des commandes";
        $data['commandes'] = $this->article_model->get_method_simple('app_commande');
        $data['commande_detail'] = $this->article_model->get_method_simple('app_commande_article');
        $this->load->view('commande/commande_view', $data);
    }

    function get_commande_detail()
    {
        $id_commande = $this->input->post("id_commande");
        $data['commande'] = $this->article_model->get_method_where_simple('app_commande', array('id_commande'=>$id_commande));

        $data['commande_detail'] = $this->article_model->get_method_where_simple('app_commande_article', array('id_cmd'=>$id_commande));
        $this->load->view('commande/detail_cmd', $data);
    }

    function edit_cmd_state(){
        $this->form_validation->set_rules('id_commande', 'identifiant', 'required');

        if ($this->form_validation->run()) {
            $id_cmd = $this->input->post("id_commande");
            $statut = $this->input->post("statut_comande");
            $data = array(
                'statut_comande' => $statut,
            );
            $commande_detail = $this->article_model->get_method_where_simple('app_commande_article', array('id_cmd'=>$id_cmd));

            if($statut == 'livrer'){
                foreach ($commande_detail as $detail){
                    $qte = $detail['quantite_article'];
                    $article_id = $detail['id_article'];
                    $article_detail = $this->article_model->get_method_where_simple('app_article', array('article_id '=>$article_id));
                    $new_stock = $article_detail[0]['stock'] - $qte;
                    $data2 = array(
                        'stock' => $new_stock
                    );
                    $this->article_model->update_method('app_article', $data2, array('article_id '=>$article_id));
                }
            }
            $commande = $this->article_model->update_method('app_commande', $data, array('id_commande'=>$id_cmd));

            if ($commande){
                echo json_encode(true);
            } else {
                echo json_encode('quelque chose à mal fonctionné '.$commande);
            }
        } else {
            echo json_encode('Validation failed');
        }
    }

}