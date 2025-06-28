<section class="banner-area banner-style-one position-relative">

    <!-- Follow Circle -->

    <div class="d-none d-md-block vertical-text wow fadeIn" data-wow-delay=".3s">
        <ul>
            <li> <a href="#"> <i class="fab fa-facebook"></i> Facebook </a> </li>
            <li> <a href="#"> <i class="fab fa-instagram"></i> Instagram </a> </li>
            <li> <a href="#"> <i class="fab fa-twitter"></i> Twitter </a> </li>
        </ul>
    </div>

    <div class="d-none d-md-block vertical-text right wow fadeIn mt-5" data-wow-delay=".3s">
        <span>Appelez nous: </span>
        <span>+225 78 70 17 73</span>
    </div>

    <div class="container container-custom-two">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="banner-content">
                    <span class="promo-tag wow fadeInDown" data-wow-delay=".3s">CONCEPTION DE BIJOUX AVEC AMOUR</span>
                    <h1 class="title wow fadeInLeft" data-wow-delay=".5s">Bijoux haut <br> de gamme </h1>
                    <ul>
                        <li>
                            <a class="main-btn btn-filled wow fadeInUp" data-wow-delay=".7s" href="about.html">Acheter </a>
                        </li>
                        <li>
                            <a class="main-btn btn-border wow fadeInUp" data-wow-delay=".9s" href="about.html">Explorer</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="0.5s">
                <div class="banner-thumb d-none d-md-block">
                    <div class="hero-slider-one">
                        <?php
                        foreach ($sliders as $slider):
                        ?>
                            <div class="single-thumb">
                                <img width="500" height="600" src="<?php echo base_url() ?>uploads/site/<?php echo $slider['slider_image'] ?>" alt="images">
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>