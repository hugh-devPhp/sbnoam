<?php
$this->load->model('administration/information_model');
$this->load->model('administration/article_model');
$categories = $this->article_model->get_method('app_category');
$sous_categories = $this->article_model->get_method('app_sous_category');
$infoss = $this->information_model->get_information();
$infos = (array)$infoss[0];
?>
<!--====== FOOTER PART START ======-->
<footer class="sigma-footer">
    <div class="sigma-footer-top">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-lg-6">
                            <!--====== Back to top ======-->
                            <div class="sigma-backto-top">
                                <a href="#" class="back-to-top" id="backToTop">
                                    <i class="fal fa-chevron-up"></i>
                                    Retour en haut
                                </a>
                            </div>
                        </div>
                    </div>

                    <!--====== Footer content ======-->
                    <div class="sigma-footer-box" style="padding-bottom: 0;">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="sigma-footer-box-top">
                                    <div class="ft-logo">
                                        <a href="index-2.html">
                                            <img width="250" height="250" src="<?php echo base_url() ?>uploads/logo/<?php echo $infos['logo_info'] ?>" alt="Logo">
                                        </a>
                                    </div>
                                    <ul class="ft-social-media">
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="sigma-footer-nav">
                                    <ul class="ft-nav">
                                        <li class="menu-item">
                                            <a href="index-2.html">
                                                Accueil
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="<?php echo base_url()?>a_propos/index">
                                                Apropos de nous
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="blog-grid.html">
                                                Blog
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="gallery.html">
                                                Gallérie
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="<?php echo base_url()?>contact/index">
                                                Contact
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sigma-footer-bottom">
        <div class="container-fluid">
            <div class="sigma-footer-bottom-inner" style="padding-top: 0; padding-bottom: 0;">
                <div class="row no-gutters align-items-end">
                    <div class="col-lg-6">
                        <div class="sigma-footer-contact">
                            <ul>
                                <li>
                                    <i class="flaticon-phone"></i>
                                    <a href="tel:"><span>Telephone</span> <?php echo $infos['contact1_info'] ?></a>
                                </li>
                                <li>
                                    <i class="flaticon-message"></i>
                                    <a href="mailto:<?php echo $infos['email_info'] ?>"><span>Email</span> <?php echo $infos['email_info'] ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="sigma-footer-search">
                            <form>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button><i class="fal fa-search"></i></button>
                                    </div>
                                    <input type="text" name="#" class="form-control" placeholder="Search...">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="sigma-footer-contact style-2">
                            <ul>
                                <li>
                                    <i class="flaticon-location-pin"></i>
                                    <a href="#"><span>Adresse bureau </span><?php echo $infos['localisation_info'] ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright -->
    <div class="sigma-copyright">
        <div class="container-fluid">
            <div class="sigma-copyright-inner">
                <div class="row">
                    <div class="col-lg-6 col-md-5 order-2 order-md-1">
                        <p class="sigma-copyright-text">Copyright By@<a href="#">shinebynoam</a> - 2022</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--====== FOOTER PART END ======-->