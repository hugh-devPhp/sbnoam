<?php
$this->load->model('administration/information_model');
$this->load->model('administration/article_model');
$categories = $this->article_model->get_method('app_category');
$sous_categories = $this->article_model->get_method('app_sous_category');
$infoss = $this->information_model->get_information();
$infos = (array)$infoss[0];
?>

<!-- Mobile Header Start -->
<div class="sigma-mobile-header">
    <div class="container">
        <div class="sigma-mobile-header-inner">
            <!-- Site Logo -->
            <div class="site-logo site-logo-text">
                <a href="index-2.html">
                    <img class="img-fluid" width="100" height="100" src="<?php echo base_url()?>assets/sbnoam_logo.png" alt="">
                    <div class="site-logo-text">
                        <h3>Shine By Noam</h3>
                        <h6>Le meilleur choix pour sublimer</h6>
                    </div>
                </a>
            </div>
            <div class="sigma-hamburger-menu">
                <div class="sigma-menu-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Header End -->

<!-- Mobile Menu Start -->
<aside class="sigma-mobile-menu">
    <ul class="sigma-main-menu">
        <li class="menu-item menu-item-has-children">
            <a href="#">
                Accueil
            </a>
        </li>
        <li class="menu-item menu-item-has-children">
            <a href="#">Boutique</a>
        </li>
        <li class="menu-item menu-item-has-children">
            <a href="#">
                Blog
            </a>
        </li>
        <li class="menu-item">
            <a href="<?php echo base_url()?>a_propos/index">
                A propos
            </a>
        </li>
        <li class="menu-item">
            <a href="<?php echo base_url()?>contact/index">
                Contact
            </a>
        </li>
    </ul>
</aside>
<!-- Mobile Menu End -->