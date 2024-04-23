<?php $this->load->view('template/front-end/haut_template', array("menu_actif"=>$menu_actif))?>
<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <div class="mb-8">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!5.2555018!2d-3.9625487!3d-37.817327693787625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sin!4v1575470633967!5m2!1sen!2sin" width="100%" height="514" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>

        <div class="container">
            <div class="row mb-10">
                <div class="col-md-8 col-xl-9">
                    <?php
                    $error = $this->session->flashdata('error');
                    if(isset($error) && !empty($error)){
                        ?>
                        <div class="alert alert-danger">
                            <span><?php echo $error; ?></span>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    $success = $this->session->flashdata('success');
                    if(isset($success) && !empty($success)){
                        ?>
                        <div class="alert alert-success">
                            <span><?php echo $success; ?></span>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="mr-xl-6">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title mb-0 pb-2 font-size-25">Laissez-nous un message</h3>
                        </div>
                        <form class="js-validate" novalidate="novalidate" action="<?php echo base_url()?>contact/message" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-4">
                                        <label class="form-label">
                                            NOM
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="nom" placeholder="" aria-label="" required="" data-msg="Please enter your frist name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-4">
                                        <label class="form-label">
                                            Email
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="email" class="form-control" name="email" placeholder="" aria-label="" required="" data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-4">
                                        <label class="form-label">
                                            Contact
                                        </label>
                                        <input type="number" class="form-control" name="phone" placeholder="" aria-label="" data-msg="Please enter subject." data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-4">
                                        <label class="form-label">
                                            OBJET
                                        </label>
                                        <input type="text" class="form-control" name="objet" placeholder="" aria-label="" data-msg="Please enter subject." data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>
                                <div class="col-md-12">
                                    <div class="js-form-message mb-4">
                                        <label class="form-label">
                                            VOTRE MESSAGE
                                        </label>

                                        <div class="input-group">
                                            <textarea class="form-control p-5" rows="4" name="message" placeholder=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary-dark-w px-5">ENVOYER</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title mb-0 pb-2 font-size-25">Notre boutique</h3>
                    </div>
                    <div class="mr-xl-6">
                        <address class="mb-6">
                            <?php echo $infos[0]['location'] ?>
                        </address>
                        <h5 class="font-size-14 font-weight-bold mb-3">Heures d'ouverture</h5>
                        <ul class="list-unstyled mb-6">
                            <li class="flex-center-between mb-1"><span class="">Du Lundi au Samedi:</span><span class="">7h - 18h</span></li>
                            <li class="flex-center-between"><span class="">Dimanche</span><span class="" style="color: red !important;">Fermé</span></li>
                        </ul>
                        <h5 class="font-size-14 font-weight-bold mb-3">Carrières</h5>
                        <p class="text-gray-90">Si vous êtes intéressé par des opportunités d'emploi chez Electro, veuillez nous envoyer un courriel :
                            <br> <a class="text-blue text-decoration-on" href="mailto:<?php echo $infos[0]['site_mail_1'] ?>"><?php echo $infos[0]['site_mail_1'] ?></a></p>
                    </div>
                </div>
            </div>
            <!-- Brand Carousel -->
            <div class="mb-8">
                <div class="py-2 border-top border-bottom">
                    <div class="js-slick-carousel u-slick my-1"
                         data-slides-show="5"
                         data-slides-scroll="1"
                         data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y"
                         data-arrow-left-classes="fa fa-angle-left u-slick__arrow-classic-inner--left z-index-9"
                         data-arrow-right-classes="fa fa-angle-right u-slick__arrow-classic-inner--right"
                         data-responsive='[{
                                "breakpoint": 992,
                                "settings": {
                                    "slidesToShow": 2
                                }
                            }, {
                                "breakpoint": 768,
                                "settings": {
                                    "slidesToShow": 1
                                }
                            }, {
                                "breakpoint": 554,
                                "settings": {
                                    "slidesToShow": 1
                                }
                            }]'>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img1.png" alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img2.png" alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img3.png" alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img4.png" alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img5.png" alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img6.png" alt="Image Description">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Brand Carousel -->
        </div>
    </main>
<!-- ========== END MAIN CONTENT ========== -->


<?php $this->load->view('template/front-end/bas_template')?>