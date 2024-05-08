<section class="about-section pt-115 pb-115">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-10 wow fadeInLeft" data-wow-delay=".3s">
                <div class="row about-features-boxes fetaure-masonary">
                    <div class="col-sm-6">
                        <div class="single-feature-box">
                            <div class="icon">
                                <i class="flaticon-ring"></i>
                            </div>
                            <h4><a href="#">Nouvelles bagues</a></h4>
                            <p>

                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="single-feature-box only-bg mt-30" style="background-image: url(<?php echo base_url()?>assets/front-end/img/banner/b9.jpeg);">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="single-feature-box only-bg mt-30" style="background-image: url(<?php echo base_url()?>assets/front-end/img/banner/b7.jpeg);">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="single-feature-box dark mt-30">
                            <div class="icon">
                                <i class="flaticon-necklace"></i>
                            </div>
                            <h4><a href="#">Collection de mariage</a></h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-10 wow fadeInRight" data-wow-delay=".3s">
                <div class="abour-text pl-50 pr-50">
                    <div class="section-title mb-30">
                        <span class="title-tag">à propos de nous</span>
                        <h2>Création de bijoux depuis 2020  </h2>
                    </div>
                    <p>
                        <?php echo  character_limiter(strip_tags($infos['court_description']),200); ?>
                    </p>
                    <a href="contact.html" class="main-btn btn-filled mt-40"> Savoir plus</a>
                </div>
            </div>
        </div>
    </div>
    <div class="about-right-bottom">
        <div class="about-bottom-img">
            <img src="<?php echo base_url()?>assets/front-end/img/bg/03.jpg" alt="">
        </div>
    </div>
</section>