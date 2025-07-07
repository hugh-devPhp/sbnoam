<main id="content" role="main">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="https://transvelo.github.io/electro-html/2.0/html/home/index.html">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page"><?php echo strtoupper($vehicule['code_marque'])." ".$vehicule['code_model']; ?></li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->
    <div class="container">
        <!-- Single Product Body -->
        <div class="mb-xl-14 mb-6">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $error = $this->session->flashdata('error');
                    if($error){
                        ?>
                        <div class="alert alert-danger">
                            <span><?php echo $error; ?></span>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    $success = $this->session->flashdata('success');
                    if($success){
                        ?>
                        <div class="alert alert-success">
                            <span><?php echo $success; ?></span>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="col-md-7 mb-0 mb-md-0">
                    <div class="">
                        <div class=" pb-md-1 pb-3">
                            <div class="row">
                                <div class="col-8">
                                    <a href="#" class="font-size-12 text-gray-5 mb-2 d-inline-block"><?php if($vehicule['en_location'] == "0"){ echo "Vente"; }else{ echo "Location";} ?></a>
                                    <h2 class="text-lh-1dot2" style="font-size: 40px; font-weight: bold"><?php echo strtoupper($vehicule['code_marque'])." ".$vehicule['code_model']; ?></h2>
                                    <span>Année: <strong>2010</strong></span>
                                </div>
                                <div class="col-4">
                                    <ins class="font-size-36 text-decoration-none"><?php echo number_format($vehicule['prix_auto'], 0, ',', ' '); ?> <sup>XOF</sup></ins>

                                </div>
                            </div>


                        </div>
                    </div>
                    <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2"
                         data-infinite="true"
                         data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                         data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                         data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                         data-nav-for="#sliderSyncingThumb">
                        <div class="js-slide">
                            <img class="img-fluid" src="<?php echo base_url("uploads/vehicules/").$vehicule['image_principale_auto']?>" alt="Image Description" style="width: 100% !important;">
                        </div>
                        <?php
                        if(!empty($vehicule['images'])){
                            $i=1;
                            foreach ($vehicule['images'] as $image){
                                $i++;
                                ?>
                                <div class="js-slide">
                                    <img class="img-fluid" src="<?php echo base_url("uploads/vehicules/").$image['image_auto']?>" alt="Image Description">
                                </div>
                                <?php

                            }
                        }
                        ?>
                    </div>

                    <div id="sliderSyncingThumb" class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
                         data-infinite="true"
                         data-slides-show="5"
                         data-is-thumbs="true"
                         data-nav-for="#sliderSyncingNav">
                        <div class="js-slide" style="cursor: pointer;">
                            <img class="img-fluid" src="<?php echo base_url("uploads/vehicules/").$vehicule['image_principale_auto']?>" alt="Image Description">
                        </div>

                        <?php
                        if(!empty($vehicule['images'])){
                            $i=1;
                            foreach ($vehicule['images'] as $image){
                                $i++;
                                ?>
                                <div class="js-slide" style="cursor: pointer;">
                                    <img class="img-fluid" src="<?php echo base_url("uploads/vehicules/").$image['image_auto']?>" alt="Image Description">
                                </div>
                                <?php

                            }
                        }
                        ?>
                    </div>

                </div>
                <div class="mx-md-auto mx-lg-0 col-md-5">
                    <div class="">
                        <div class="card p-5 border-width-2 border-color-1 borders-radius-17" style="border-color: #ff9a2f !important;">
                            <form action="<?php echo base_url('collection/add_reservation')?>" method="post" id="form_reservation">
                                <div class="text-gray-9 font-size-14 pb-2 border-color-1 border-bottom mb-3" style="border-color: #ff9a2f !important; font-size: 40px !important; color: #000 !important;font-weight: bold;">
                                    Reservation
                                </div>
                                <div class="mb-3">
                                    <label for="nom">Nom</label>
                                    <input type="text" name="nom" class="form-control">
                                    <input type="hidden" name="id_auto" value="<?php echo $vehicule['id_auto']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="nom">Email</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="nom">Contact</label>
                                    <input type="text" name="contact" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="nom">Adresse</label>
                                    <input type="text" name="adresse" class="form-control">
                                </div>
                                <?php if($vehicule['en_location'] !== "0"){ ?>
                                    <div class="mb-3">
                                        <label for="nom">Destination</label>
                                        <input type="text" name="destination" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nom">Date de debut</label>
                                        <input type="date" name="date_debut" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nom">Date de fin</label>
                                        <input type="date" name="date_fin" class="form-control">
                                    </div>

                                <?php } ?>
                                <div class="mb-3">
                                    <label for="nom">Moyen de Paiement</label>
                                    <select name="paiement" id="paiement" class="form-control">
                                        <option value="">Selection</option>
                                        <option value="orange money">Orange Money</option>
                                        <option value="mtn money">MTN Money</option>
                                        <option value="moov money">Moov Money</option>
                                        <option value="wave">Wave</option>
                                        <option value="en espece">En espèce</option>
                                    </select>
                                </div>
                                <div class="mb-2 pb-0dot5">
                                    <button type="button" class="btn btn-block btn-primary-dark" id="valide">
                                        <i class="ec ec-add-to-cart mr-2 font-size-20"></i> Valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Product Body -->
        <!-- Single Product Tab -->
        <div class="mb-8">
            <div class="position-relative position-md-static px-md-6">
                <ul class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-0 pb-1 pb-xl-0 mb-n1 mb-xl-0" id="pills-tab-8" role="tablist">

                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                        <a class="nav-link active" id="Jpills-two-example1-tab" data-toggle="pill" href="#Jpills-two-example1" role="tab" aria-controls="Jpills-two-example1" aria-selected="false">Description</a>
                    </li>
                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                        <a class="nav-link" id="Jpills-three-example1-tab" data-toggle="pill" href="#Jpills-three-example1" role="tab" aria-controls="Jpills-three-example1" aria-selected="false">Fiche technique</a>
                    </li>
                </ul>
            </div>
            <!-- Tab Content -->
            <div class="borders-radius-17 border p-4 mt-4 mt-md-0 px-lg-10 py-lg-9">
                <div class="tab-content" id="Jpills-tabContent">
                    <div class="tab-pane fade active show" id="Jpills-two-example1" role="tabpanel" aria-labelledby="Jpills-two-example1-tab">
                        <?php echo $vehicule['description_auto']; ?>
                    </div>
                    <div class="tab-pane fade" id="Jpills-three-example1" role="tabpanel" aria-labelledby="Jpills-three-example1-tab">
                        <div class="mx-md-5 pt-1">
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered">
                                    <tbody>
                                    <tr>
                                        <th scope="row" style="width: 400px;">Année de Fabrication</th>
                                        <td><?php echo $vehicule['annee_auto']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 400px;">Moteur</th>
                                        <td><?php echo $vehicule['code_moteur']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 400px;">Transmission</th>
                                        <td><?php if($vehicule['transmission_auto'] == "auto"){ echo "Automatique"; }else{ echo "Manuel";} ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 400px;">Carburant</th>
                                        <td><?php echo $vehicule['carburant_auto']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 400px;">Climatisation</th>
                                        <td><?php if($vehicule['climatisation_auto'] == "0"){ echo "Non"; }else{ echo "Oui";} ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nombre de Place</th>
                                        <td><?php echo $vehicule['nb_place_auto']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nombre de Portière</th>
                                        <td><?php echo $vehicule['nb_porte_auto']; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Tab Content -->
        </div>
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