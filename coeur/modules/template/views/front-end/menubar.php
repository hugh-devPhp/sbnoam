<?php
$this->load->model('administration/information_model');
$this->load->model('administration/article_model');
$categories = $this->article_model->get_method('app_category');
$sous_categories = $this->article_model->get_method('app_sous_category');
$infoss = $this->information_model->get_information();
$infos = (array)$infoss[0];
?>
<div class="main-menu-area sticky-header">
    <div class="container-fluid container-custom-three">
        <div class="nav-container d-flex align-items-center justify-content-between">
            <!-- Site Logo -->
            <div class="site-logo site-logo-text">
                <a href="index-2.html">
                    <img class="img-fluid" width="120" height="120" src="<?php echo base_url()?>assets/sbnoam_logo.png" alt="">
                    <div class="site-logo-text">
                        <h3>Shine By Noame</h3>
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
                                    <li class="menu-item menu-item-has-children">
                                        <a href="<?php echo base_url()?>">
                                            Accueil
                                        </a>
                                    </li>
                                    <li class="menu-item menu-item-has-children menu-item-has-megamenu">
                                        <a href="#">
                                            Categories
                                        </a>
                                        <div class="sub-menu">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <ul class="sigm-megamenu-nav nav nav-tabs">
                                                            <li class="nav-item">
                                                                <a href="#tab1" class="nav-link active" data-toggle="tab"><i class="fal fa-female"></i> Rings</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="#tab2" class="nav-link" data-toggle="tab"><i class="fal fa-user"></i> Earrings</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="#tab3" class="nav-link" data-toggle="tab"><i class="fal fa-baby"></i> Bracelets</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="#tab4" class="nav-link" data-toggle="tab"><i class="fal fa-suitcase-rolling"></i>  Pendants</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="#tab5" class="nav-link" data-toggle="tab"><i class="fal fa-badge-check"></i> Necklaces</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tab-content">
                                                            <div class="tab-item show active" id="tab1">
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <div class="sigma-megamenu-navbox menu-item-has-children">
                                                                            <h5 class="sigma-title">Shop Pages</h5>
                                                                            <ul class="sub-menu">
                                                                                <li class="menu-item">
                                                                                    <a href="shop-left.html">Shop Left Sidebar</a>
                                                                                </li>
                                                                                <li class="menu-item">
                                                                                    <a href="shop-left-style-2.html">Shop Left Sidebar v2</a>
                                                                                </li>
                                                                                <li class="menu-item">
                                                                                    <a href="shop-right.html">Shop Right Sidebar</a>
                                                                                </li>
                                                                                <li class="menu-item">
                                                                                    <a href="shop-right-style-2.html">Shop Right Sidebar v2</a>
                                                                                </li>
                                                                                <li class="menu-item">
                                                                                    <a href="shop-detail.html">Product Details</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div class="sigma-megamenu-navbox menu-item-has-children">
                                                                            <h5 class="sigma-title">Other Shop Pages</h5>
                                                                            <ul class="sub-menu">
                                                                                <li class="menu-item">
                                                                                    <a href="my-account.html">My Account</a>
                                                                                </li>
                                                                                <li class="menu-item">
                                                                                    <a href="checkout.html">Checkout</a>
                                                                                </li>
                                                                                <li class="menu-item">
                                                                                    <a href="wishlist.html">Wishlist</a>
                                                                                </li>
                                                                                <li class="menu-item">
                                                                                    <a href="cart.html">Cart</a>
                                                                                </li>
                                                                                <li class="menu-item">
                                                                                    <a href="login.html">Login</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div class="sigma-megamenu-img">
                                                                            <a href="#">
                                                                                <img src="assets/img/others/01.png" alt="img">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-item" id="tab2">
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <div class="sigma-megamenu-navbox menu-item-has-children">
                                                                            <h5 class="sigma-title">Type Of Earrings</h5>
                                                                            <ul class="sub-menu">
                                                                                <li class="menu-item">
                                                                                    <a href="shop-left.html">Ruby Earrings</a>
                                                                                </li>
                                                                                <li class="menu-item">
                                                                                    <a href="shop-left-style-2.html">Emareld Earrings</a>
                                                                                </li>
                                                                                <li class="menu-item">
                                                                                    <a href="shop-left.html">Saphire Earrings</a>
                                                                                </li>
                                                                                <li class="menu-item">
                                                                                    <a href="shop-left-style-2.html">Diamond Earrings</a>
                                                                                </li>
                                                                                <li class="menu-item">
                                                                                    <a href="shop-left.html">Gold Earrings</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-5">
                                                                        <div class="sigma-megamenu-navbox">
                                                                            <h5 class="sigma-title">Size</h5>
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6 menu-item-has-children">
                                                                                    <ul class="sub-menu">
                                                                                        <li class="menu-item">
                                                                                            <a href="shop-left.html">Hoop Earrings</a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a href="shop-left-style-2.html">Dangle Earrings</a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a href="shop-left.html">Stud Earrings</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="col-md-6 menu-item-has-children">
                                                                                    <ul class="sub-menu">
                                                                                        <li class="menu-item">
                                                                                            <a href="shop-left-style-2.html">Barbell Earrings</a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a href="shop-left.html">Huggy Earrings</a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a href="shop-left-style-2.html">Ear Thread Earrings</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <h5 class="sigma-title">Top Picks</h5>
                                                                            <div class="row">
                                                                                <div class="col-md-6 menu-item-has-children">
                                                                                    <ul class="sub-menu">
                                                                                        <li class="menu-item">
                                                                                            <a href="shop-detail.html">Jiara Blessing</a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a href="shop-detail.html">Hentry Firana</a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a href="shop-detail.html">Lucrative Li</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="col-md-6 menu-item-has-children">
                                                                                    <ul class="sub-menu">
                                                                                        <li class="menu-item">
                                                                                            <a href="shop-detail.html">Mirana Go</a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a href="shop-detail.html">Fira Diamond Ring</a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a href="shop-detail.html">Fanir Lo</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div class="sigma-megamenu-img">
                                                                            <a href="#">
                                                                                <img src="assets/img/others/02.png" alt="img">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-item" id="tab3">
                                                                <div class="row">
                                                                    <div class="col-lg-8">
                                                                        <div class="sigma-megamenu-navbox">
                                                                            <h5 class="sigma-title">Type Of Earrings</h5>
                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <div class="sigma-megamenu-image">
                                                                                        <a href="shop-left.html">
                                                                                            <img src="assets/img/others/b-1.png" alt="img">
                                                                                            <span>Ruby</span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="sigma-megamenu-image">
                                                                                        <a href="shop-left.html">
                                                                                            <img src="assets/img/others/b-2.png" alt="img">
                                                                                            <span>Emarald</span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="sigma-megamenu-image">
                                                                                        <a href="shop-left-style-2.html">
                                                                                            <img src="assets/img/others/b-3.png" alt="img">
                                                                                            <span>Saphire</span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="sigma-megamenu-image">
                                                                                        <a href="shop-left.html">
                                                                                            <img src="assets/img/others/b-4.png" alt="img">
                                                                                            <span>Diamond</span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="sigma-megamenu-image">
                                                                                        <a href="shop-left-style-2.html">
                                                                                            <img src="assets/img/others/b-5.png" alt="img">
                                                                                            <span>Topaz</span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="sigma-megamenu-image">
                                                                                        <a href="shop-left.html">
                                                                                            <img src="assets/img/others/b-6.png" alt="img">
                                                                                            <span>Amber</span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="sigma-megamenu-image">
                                                                                        <a href="shop-left-style-2.html">
                                                                                            <img src="assets/img/others/b-7.png" alt="img">
                                                                                            <span>Gold</span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="sigma-megamenu-image">
                                                                                        <a href="shop-left.html">
                                                                                            <img src="assets/img/others/b-8.png" alt="img">
                                                                                            <span>Silver</span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div class="sigma-megamenu-navbox">
                                                                            <h5 class="sigma-title">Top picks</h5>
                                                                            <div class="row mb-4">
                                                                                <div class="col-md-6 menu-item-has-children">
                                                                                    <ul class="sub-menu">
                                                                                        <li class="menu-item">
                                                                                            <a href="shop-detail.html">Jiara Blessing</a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a href="shop-detail.html">Hentry Firana</a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a href="shop-detail.html">Lucrative Li</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="col-md-6 menu-item-has-children">
                                                                                    <ul class="sub-menu">
                                                                                        <li class="menu-item">
                                                                                            <a href="shop-detail.html">Mirana Go</a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a href="shop-detail.html">Fira Diamond Ring</a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a href="shop-detail.html">Fanir Lo</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <h5 class="sigma-title">Shape</h5>
                                                                            <div class="row">
                                                                                <div class="col-md-12 menu-item-has-children">
                                                                                    <ul class="sub-menu">
                                                                                        <li class="menu-item">
                                                                                            <a href="shop-detail.html">Lira Jo</a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a href="shop-detail.html">Fandi Hambi</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-item" id="tab4">
                                                                <div class="row">
                                                                    <div class="col-lg-8">
                                                                        <div class="sigma-megamenu-navbox">
                                                                            <h5 class="sigma-title">Pendants Articles <a href="blog-grid.html">View All</a></h5>
                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <div class="sigma-blog-block">
                                                                                        <img src="assets/img/others/news-1.png" alt="img">
                                                                                        <p>Gold Pendants </p>
                                                                                        <a href="blog-details.html">View Post</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="sigma-blog-block">
                                                                                        <img src="assets/img/others/news-2.png" alt="img">
                                                                                        <p>Gold Pendants </p>
                                                                                        <a href="blog-details.html">View Post</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="sigma-blog-block">
                                                                                        <img src="assets/img/others/news-3.png" alt="img">
                                                                                        <p>Gold Pendants </p>
                                                                                        <a href="blog-details.html">View Post</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="sigma-blog-block">
                                                                                        <img src="assets/img/others/news-4.png" alt="img">
                                                                                        <p>Gold Pendants </p>
                                                                                        <a href="blog-details.html">View Post</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div class="sigma-megamenu-navbox menu-item-has-children">
                                                                            <h5 class="sigma-title">Collections</h5>
                                                                            <ul class="sub-menu">
                                                                                <li class="menu-item">
                                                                                    <a href="blog-details.html">Vivamus suscipit tortor eget</a>
                                                                                </li>
                                                                                <li class="menu-item">
                                                                                    <a href="blog-details.html">Vivamus suscipit tortor eget</a>
                                                                                </li>
                                                                                <li class="menu-item">
                                                                                    <a href="blog-details.html">Vivamus suscipit tortor eget</a>
                                                                                </li>
                                                                                <li class="menu-item">
                                                                                    <a href="blog-details.html">Vivamus suscipit tortor eget</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-item" id="tab5">
                                                                <div class="row justify-content-center">
                                                                    <div class="col">
                                                                        <div class="sigma-megamenu-img">
                                                                            <a href="#">
                                                                                <img src="assets/img/others/a-1.png" alt="img">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="sigma-megamenu-img">
                                                                            <a href="#">
                                                                                <img src="assets/img/others/a-2.png" alt="img">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="sigma-megamenu-img">
                                                                            <a href="#">
                                                                                <img src="assets/img/others/a-3.png" alt="img">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="sigma-megamenu-img">
                                                                            <a href="#">
                                                                                <img src="assets/img/others/a-4.png" alt="img">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="sigma-megamenu-img">
                                                                            <a href="#">
                                                                                <img src="assets/img/others/a-5.png" alt="img">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">
                                            Blog
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="<?php echo base_url()?>a_propos/index">A propos</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="about.html">
                                            Boutique
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="<?php echo base_url()?>contact/index">
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
                            <input type="text" placeholder="Search your keyword...">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <!-- Off canvas Toggle -->
                <div class="toggle">
                    <a href="#" id="offCanvasBtn"><i class="fal fa-bars"></i></a>
                </div>

                <!-- Navbar Toggler -->
                <div class="navbar-toggler">
                    <span></span><span></span><span></span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mobile menu -->
<?php $this->load->view('template/front-end/mobile_menu')?>
<!-- End Mobile menu -->
