<style>
    .pagination {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }

    .pagination li {
        display: inline-block;
        margin-right: 5px;
    }

    .pagination li a {
        display: block;
        padding: 5px 10px;
        text-decoration: none;
        color: #333;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .pagination li.active a {
        background-color: #337ab7;
        color: #fff;
        border-color: #337ab7;
    }

    .pagination li a:hover {
        background-color: #f5f5f5;
    }
</style>
<main id="content" role="main">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="<?php echo base_url()?>accueil">Accueil</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Pack auto</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="row mb-8">
            <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                <form action="<?php echo base_url()?>parking/index/" method="post" id="form_search">
                <div class="mb-6">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Filtres</h3>
                    </div>
                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="font-size-14 mb-3 font-weight-bold">Catégories</h4>

                        <!-- Checkboxes -->
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" onclick="search()"  name="type[]" value="1" id="type-1" <?php if(!is_null($type_selected) && in_array("1", $type_selected)){ echo "checked"; }?>>
                                <label class="custom-control-label" for="type-1">Location <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" onclick="search()" name="type[]" value="2" id="type-2" <?php if(!is_null($type_selected) && in_array("2", $type_selected)){ echo "checked"; }?>>
                                <label class="custom-control-label" for="type-2">Vente <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="font-size-14 mb-3 font-weight-bold">Marques</h4>

                        <?php
                        if(!empty($marques)){
                            $i=0;
                            foreach ($marques as $marque){ $i++; $marque = (array)$marque; ?>
                                <!-- Checkboxes -->
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" onclick="search()" <?php if(!is_null($type_selected) && in_array($marque['id_marque'], $marque_selected)){ echo "checked"; }?> name="marque[]" id="marque-<?php echo $i; ?>" value="<?php echo $marque['id_marque']; ?>">
                                        <label class="custom-control-label" for="marque-<?php echo $i; ?>"><?php echo ucfirst($marque['code_marque'])?>
                                        </label>
                                    </div>
                                </div>
                            <?php     }
                        }
                        ?>


                    </div>
                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="font-size-14 mb-3 font-weight-bold">Transmission</h4>

                        <!-- Checkboxes -->
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" onclick="search()"  name="transmission[]" id="transmission-1" value="auto" <?php if(!is_null($transmission_selected) && in_array("auto", $transmission_selected)){ echo "checked"; }?>>
                                <label class="custom-control-label" for="transmission-1" >Automatique <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input"  onclick="search()"  name="transmission[]" id="transmission-2" value="manuel" <?php if(!is_null($transmission_selected) && in_array("manuel", $transmission_selected)){ echo "checked"; }?>>
                                <label class="custom-control-label" for="transmission-2">Manuelle <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                            </div>
                        </div>

                        <!-- End Link -->
                    </div>

                    <!--                        <div class="range-slider">-->
                    <!--                            <h4 class="font-size-14 mb-3 font-weight-bold">Price</h4>-->
                    <!--                            <!-- Range Slider -->-->
                    <!--                            <input class="js-range-slider" type="text"-->
                    <!--                                   data-extra-classes="u-range-slider u-range-slider-indicator u-range-slider-grid"-->
                    <!--                                   data-type="double"-->
                    <!--                                   data-grid="false"-->
                    <!--                                   data-hide-from-to="true"-->
                    <!--                                   data-prefix="$"-->
                    <!--                                   data-min="0"-->
                    <!--                                   data-max="3456"-->
                    <!--                                   data-from="0"-->
                    <!--                                   data-to="3456"-->
                    <!--                                   data-result-min="#rangeSliderExample3MinResult"-->
                    <!--                                   data-result-max="#rangeSliderExample3MaxResult">-->
                    <!--                            <!-- End Range Slider -->-->
                    <!--                            -->
                    <!--                            <div class="mt-1 text-gray-111 d-flex mb-4">-->
                    <!--                                <span class="mr-0dot5">Price: </span>-->
                    <!--                                <span>$</span>-->
                    <!--                                <span id="rangeSliderExample3MinResult" class=""></span>-->
                    <!--                                <span class="mx-0dot5"> — </span>-->
                    <!--                                <span>$</span>-->
                    <!--                                <span id="rangeSliderExample3MaxResult" class=""></span>-->
                    <!--                            </div> -->
                    <!--                            -->
                    <!--                            <button type="submit" class="btn px-4 btn-primary-dark-w py-2 rounded-lg">Filter</button>-->
                    <!--                        </div>-->
                </div>
                </form>
            </div>
            <div class="col-xl-9 col-wd-9gdot5">
                <!-- Shop-control-bar Title -->
                <!-- End shop-control-bar Title -->
                <!-- Shop-control-bar -->
                <!-- End Shop-control-bar -->
                <!-- Shop Body -->
                <!-- Tab Content -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                        <ul class="row list-unstyled products-group no-gutters">
                            <?php
                                if(!empty($vehicules)){
                                    foreach($vehicules as $vehicule){

                                        ?>
                            <li class="col-6 col-md-4 col-wd-3gdot4 product-item">
                                <div class="product-item__outer h-100">
                                    <div class="product-item__inner px-xl-4 p-3">
                                        <div class="product-item__body pb-xl-2">
                                            <div class="mb-2"><a href="product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">
                                                <?php
                                                                if($vehicule['en_location'] == "1"){
                                                                    echo "Location";
                                                                }else{
                                                                    echo 'Vente';
                                                                }


                                                                ?>
                                            </a></div>
                                            <h5 class="mb-1 product-item__title"><a href="<?php echo base_url('parking/detail_automobile/').$vehicule['id_auto'];?>" class="text-blue font-weight-bold">
                                                <?php $model = infos_model($vehicule['model_id']); $marque = infos_marque($vehicule['marque_id']); echo ucfirst($marque['code_marque']).' '.ucfirst($model['code_model']); ?>
                                            </a></h5>
                                            <div class="mb-2">
                                                <a href="<?php echo base_url('parking/detail_automobile/').$vehicule['id_auto'];?>" class="d-block text-center"><img class="img-fluid" style="height: 172.41px !important;" src="<?php echo base_url('uploads/vehicules/').$vehicule["image_principale_auto"]?>" alt="Image Description"></a>
                                            </div>
                                            <div style="font-size: 12px; text-align: center">
                                                <span><i class="fa fa-sitemap"></i> <?php if($vehicule['transmission_auto'] == "auto"){ echo "Automatique"; }else{ echo "Manuel";} ?> &nbsp;</span>
                                                <span><i class="fa fa-gas-pump"></i> <?php echo ucfirst($vehicule['carburant_auto']); ?> &nbsp;</span>
                                                <br>
                                                <span><i class="fa fa-user"></i> <?php echo ucfirst($vehicule['nb_place_auto']); ?> &nbsp;</span>
                                                <span><i class="fa fa-road"></i> <?php echo number_format($vehicule['kilometrage_auto'], 0, ',', ' '); ?>km/h &nbsp;</span>
                                            </div>
                                            <div class="flex-center-between mb-1">
                                                <div class="prodcut-price">
                                                    <div class="text-gray-100"><?php echo number_format($vehicule['prix_auto'], 0, ',', ' '); ?> <sup>XOF</sup></div>
                                                </div>
<!--                                                <div class="d-none d-xl-block prodcut-add-cart">-->
<!--                                                    <a href="single-product-fullwidth.html" class="btn-add-cart btn-primary transition-3d-hover"><i class="fa fa-shopping-cart"></i></a>-->
<!--                                                </div>-->
                                            </div>
                                        </div>
<!--                                        <div class="product-item__footer">-->
<!--                                            <div class="border-top pt-2 flex-wrap">-->
<!--                                                <a href="wishlist.html" class="text-gray-6 font-size-10" style="font-size: 12px"><i class="ec ec-favorites mr-1 font-size-10"></i> Ajouter à mes souhaits</a>-->
<!--                                            </div>-->
<!--                                        </div>-->
                                    </div>
                                </div>
                            </li>
                            <?php
                                    }
                                }else{ ?>
                                    <div class="col-md-12">
                                        <img src="<?php echo base_url() ?>assets/front-end/vide.png" style="width: 100%" alt="">
                                    </div>

                                <?php }
                                ?>
                        </ul>
                    </div>
                </div>
                <!-- End Tab Content -->
                <!-- End Shop Body -->
                <!-- Shop Pagination -->
                <?php
                if($total>0){
                ?>
                <nav class="d-md-flex justify-content-between align-items-center border-top pt-3" aria-label="Page navigation example">
                    <div class="text-center text-md-left mb-3 mb-md-0">Affichage 1–<?php echo count($vehicules);?> sur <?php echo $total;?> total</div>
                    <?php
                    echo $this->pagination->create_links();
                    ?>

                </nav>
                <?php } ?>
                <!-- End Shop Pagination -->
            </div>
        </div>
        <!-- Brand Carousel -->
        <div class="mb-6">
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
                            <img class="img-fluid m-auto max-height-50" src="<?php echo base_url()?>assets/front-end/img/200X60/img1.png" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50" src="<?php echo base_url()?>assets/front-end/img/200X60/img2.png" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50" src="<?php echo base_url()?>assets/front-end/img/200X60/img3.png" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50" src="<?php echo base_url()?>assets/front-end/img/200X60/img4.png" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50" src="<?php echo base_url()?>assets/front-end/img/200X60/img5.png" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50" src="<?php echo base_url()?>assets/front-end/img/200X60/img6.png" alt="Image Description">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Brand Carousel -->
    </div>
</main>