<div class="mb-5">
    <div class="bg-img-hero" style="background-image: url(<?php echo base_url()?>assets/front-end/img/1920X422/img1.jpg);">
        <div class="container min-height-420 overflow-hidden">
            <div class="js-slick-carousel u-slick"
                 data-pagi-classes="text-center position-absolute right-0 bottom-0 left-0 u-slick__pagination u-slick__pagination--long justify-content-start mb-3 mb-md-4 offset-xl-3 pl-2 pb-1" data-autoplay="true">
                <?php
                foreach ($sliders as $slider):
                ?>
                <div class="js-slide bg-img-hero-center">
                    <div class="row min-height-420 py-7 py-md-0">
                        <div class="offset-xl-3 col-xl-4 col-6 mt-md-8">
                            <h1 class="font-size-64 text-lh-57 font-weight-light"
                                data-scs-animation-in="fadeInUp">
                                <?php echo $slider['titre']; ?>
                            </h1>
                            <h6 class="font-size-15 font-weight-bold mb-3"
                                data-scs-animation-in="fadeInUp"
                                data-scs-animation-delay="200">
                                <?php echo $slider['description']; ?>
                            </h6>
                            <div class="mb-4"
                                 data-scs-animation-in="fadeInUp"
                                 data-scs-animation-delay="300">
                                <span class="font-size-13">A</span>
                                <div class="font-size-50 font-weight-bold text-lh-45">
                                    <?php echo $slider['price']; ?><sup class="">XOF</sup>
                                </div>
                            </div>
                            <a href="<?php echo $slider['lien_slider']; ?>" class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-16"
                               data-scs-animation-in="fadeInUp" data-scs-animation-delay="400">
                                <?php echo $slider['bouton_label']; ?>
                            </a>
                        </div>
                        <div class="col-xl-5 col-6  d-flex align-items-center"
                             data-scs-animation-in="zoomIn"
                             data-scs-animation-delay="500">
                            <img class="img-fluid"
                                 src="<?php echo base_url()?>uploads/site/<?php echo $slider['slider_image'] ?>"
                                 alt="Image Description" >
                        </div>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>
</div>