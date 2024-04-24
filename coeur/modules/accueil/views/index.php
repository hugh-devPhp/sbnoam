<?php $this->load->view('template/front-end/haut_template', array("menu_actif" => $menu_actif)) ?>

    <!--====== BANNER PART START ======-->
    <?php $this->load->view('template/sections/banner') ?>
    <!--====== BANNER PART ENDS ======-->

    <!--====== Category START ======-->
    <?php $this->load->view('template/sections/cat_box') ?>
    <!--====== Category EN ======-->

    <!--====== ABOUT PART START ======-->
    <?php $this->load->view('template/sections/about_home') ?>
    <!--====== ABOUT PART END ======-->

    <!--====== Our Jewelries START ======-->
    <?php $this->load->view('template/sections/collection_home') ?>
    <!--====== Our Jewelries End ======-->

    <!--====== Condos Overlay START ======-->
    <?php $this->load->view('template/sections/condos') ?>
    <!--====== Condos Overlay END ======-->

    <!--====== COUNTER UP START ======-->
    <?php $this->load->view('template/sections/counter') ?>
    <!--====== COUNTER UP END ======-->

    <!--====== LATEST NEWS START ======-->
    <?php $this->load->view('template/sections/news_home') ?>
    <!--====== LATEST NEWS END ======-->


<?php $this->load->view('template/front-end/bas_template') ?>