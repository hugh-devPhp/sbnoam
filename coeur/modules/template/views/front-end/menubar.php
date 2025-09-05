<div class="main-menu-area sticky-header">
    <div class="container-fluid container-custom-three">
        <div class="nav-container d-flex align-items-center justify-content-between">
            <!-- Site Logo -->
            <div class="site-logo site-logo-text">
                <a href="<?php echo base_url() ?>accueil">
                    <img class="img-fluid" width="140" height="140" src="<?php echo base_url() ?>uploads/logo/<?php echo $infos['logo_info'] ?>" alt="">
                    <div class="site-logo-text">
                        <h3>Shine By Noam</h3>
                        <h6>Le meilleur choix pour sublimer</h6>
                    </div>
                </a>
            </div>
            <!-- Main Menu -->
            <div class="nav-menu d-lg-flex align-items-center justify-content-between">
                <!-- Navbar Close Icon -->
                <div class="navbar-close">
                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>
                <!-- Mneu Items -->
                <div class="sigma-header-nav">
                    <div class="container">
                        <div class="sigma-header-nav-inner">
                            <nav>
                                <ul class="sigma-main-menu">
                                    <li class="menu-item">
                                        <a href="<?php echo base_url() ?>accueil">
                                            Accueil
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="<?php echo base_url() ?>collection">
                                            Collections
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="<?php echo base_url() ?>boutique">
                                            Boutique
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="<?php echo base_url() ?>blog">
                                            Blog
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="<?php echo base_url() ?>a_propos">A propos</a>
                                    </li>

                                    <li class="menu-item">
                                        <a href="<?php echo base_url() ?>contact">
                                            Contact
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- navbar right content -->
            <div class="menu-right-buttons">
                <!-- search btton -->
                <div class="search">
                    <a href="#" class="search-icon" id="searchBtn">
                        <i class="fal fa-search open-icon"></i>
                        <i class="fal fa-times close-icon"></i>
                    </a>
                    <div class="search-form">
                        <form action="#">
                            <input type="text" placeholder="Entrez un mot clé...">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <!-- Off canvas Toggle -->
                <!-- <div class="toggle">
                    <a href="#" id="offCanvasBtn"><i class="fal fa-bars"></i></a>
                </div> -->

                <!-- Navbar Toggler -->
                <div class="navbar-toggler">
                    <span></span><span></span><span></span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mobile menu -->
<?php $this->load->view('template/front-end/mobile_menu') ?>
<!-- End Mobile menu -->