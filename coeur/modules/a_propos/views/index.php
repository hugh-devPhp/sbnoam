<?php $this->load->view('template/front-end/haut_template', array("menu_actif"=>$menu_actif))?>

    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
<?php
if(isset($page_content)){
    $this->load->view("$page_content");
}
?>

<?php $this->load->view('template/front-end/bas_template')?>