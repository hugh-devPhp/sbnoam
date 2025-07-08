<?php $this->load->view('template/front-end/haut_template', array("menu_actif" => $menu_actif)) ?>
<!-- ========== END HEADER ========== -->
<!--====== BREADCRUMB PART START ======-->
<?php $this->load->view('template/front-end/page_head', array("title" => $title, "menu_actif" => $menu_actif)) ?>
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a
                                href="<?php echo base_url() ?>accueil">Accueil</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a
                                href="<?php echo base_url() ?>boutique/boutique_view">Boutique</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="#">Detail article</a>
                        </li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">
                            <?php echo ucfirst($article[0]['designation']); ?>
                        </li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->
    <div class="container">
        <!-- Single Product Body -->
        <div class="mb-14">
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-5 mb-4 mb-md-0">
                    <div class="shop-detail-image">
                        <div class="detail-slider-1">
                            <div class="slide-item">
                                <div class="image-box">
                                    <a href="#">
                                        <img
                                            src="<?php echo base_url(); ?>uploads/articles/<?php echo $article[0]['image_principale_article']; ?>"
                                            class="img-fluid" alt="img">
                                    </a>
                                    <span class="price">Sale</span>
                                </div>
                            </div>
                            <?php
                            $i = 1;
                            foreach ($articles_img as $img) :
                            ?>
                                <div class="slide-item">
                                    <div class="image-box">
                                        <a href="#">
                                            <img class="img-fluid" src="<?php echo base_url(); ?>uploads/articles/<?php echo $img['name']; ?>">
                                        </a>
                                    </div>
                                </div>
                            <?php
                                $i++;
                            endforeach;
                            ?>
                        </div>
                        <div class="detail-slider-2">
                            <div class="slide-item">
                                <div class="image-box">
                                    <img
                                        src="<?php echo base_url(); ?>uploads/articles/<?php echo $article[0]['image_principale_article']; ?>"
                                        class="img-fluid" alt="img">
                                </div>
                            </div>
                            <?php
                            $i = 1;
                            foreach ($articles_img as $img) :
                            ?>
                                <div class="slide-item">
                                    <div class="image-box">
                                        <img class="img-fluid" src="<?php echo base_url(); ?>uploads/articles/<?php echo $img['name']; ?>"
                                            alt="Image Description">
                                    </div>
                                </div>
                            <?php
                                $i++;
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 mb-md-6 mb-lg-0">
                    <div class="mb-2">
                        <a href="#" class="font-size-12 text-gray-5 mb-2 d-inline-block">
                            <?php
                            foreach ($collections as $collection) :
                                if ($collection['id_collection'] == $article[0]['collection_id']) :
                                    echo ucfirst($collection['name']);
                                endif;
                            endforeach;
                            ?>
                        </a>
                        <h2 class="font-size-25 text-lh-1dot2"><?php echo ucfirst($article[0]['designation']); ?></h2>
                        <div class="mb-2">
                            <a class="d-inline-flex align-items-center small font-size-15 text-lh-1" href="#">
                                <div class="text-warning mr-2">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="far fa-star text-muted"></small>
                                </div>
                                <span class="text-secondary font-size-13">(3 vues)</span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <ul class="font-size-14 pl-3 ml-1 text-gray-110">
                                <?php
                                if ($article[0]['marque_id']) {
                                ?>
                                    <li>Marque:
                                        <?php
                                        foreach ($marques as $marq) :
                                            if ($marq['article_marque_id'] == $article[0]['marque_id']) {
                                                echo ucfirst($marq['name']);
                                            }
                                        endforeach;
                                        ?>
                                    </li>
                                <?php
                                }
                                ?>
                                <?php
                                if ($article[0]['couleur_id']) {
                                ?>
                                    <li>Couleur:
                                        <?php
                                        foreach ($couleurs as $color) :
                                            if ($color['id_couleur'] == $article[0]['couleur_id']) {
                                                echo ucfirst($color['code_couleur']);
                                            }
                                        endforeach;
                                        ?>
                                    </li>
                                <?php
                                }
                                ?>

                                <?php
                                if ($article[0]['garantie']) {
                                ?>
                                    <li>Garantie:<?php echo $article[0]['garantie']; ?> mois</li>
                                <?php
                                }
                                ?>

                                <?php
                                if ($article[0]['dimension']) {
                                ?>
                                    <li>Dimension:<?php echo $article[0]['dimension']; ?></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <p><strong>SKU</strong>: <?php echo $article[0]['sku']; ?></p>
                    </div>
                </div>
                <div class="mx-md-auto mx-lg-0 col-md-6 col-lg-4 col-xl-4">
                    <div class="mb-2">
                        <div class="card p-5 border-width-2 border-color-1 borders-radius-17">
                            <div class="text-gray-9 font-size-14 pb-2 border-color-1 border-bottom mb-3">
                                Disponibles:
                                <span class="text-green font-weight-bold"><?php echo $article[0]['stock']; ?> en stock</span>
                            </div>
                            <div class="mb-3">

                                <?php
                                if ($article[0]['prix_promo']) :
                                ?>
                                    <del class="font-size-20 text-gray-9 d-block"><?php echo number_format($article[0]['prix'], 0, ',', ' '); ?>
                                        XOF
                                    </del>
                                    <ins class="font-size-36 text-red text-decoration-none d-block"><?php echo number_format($article[0]['prix_promo'], 0, ',', ' '); ?>
                                        XOF
                                    </ins>
                                <?php
                                else:
                                ?>
                                    <div class="font-size-36"><?php echo number_format($article[0]['prix'], 0, ',', ' ') . ' XOF'; ?></div>
                                <?php
                                endif;
                                ?>
                            </div>
                            <!--                                <div class="mb-3">-->
                            <!--                                    <h6 class="font-size-14">Quantité</h6>-->
                            <!-- Quantity -->
                            <!--                                    <div class="border rounded-pill py-1 w-md-60 height-35 px-3 border-color-1">-->
                            <!--                                        <div class="js-quantity row align-items-center">-->
                            <!--                                            <div class="col">-->
                            <!--                                                <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none"-->
                            <!--                                                       type="text" value="1">-->
                            <!--                                            </div>-->
                            <!--                                            <div class="col-auto pr-1">-->
                            <!--                                                <a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"-->
                            <!--                                                   href="javascript:;">-->
                            <!--                                                    <small class="fas fa-minus btn-icon__inner"></small>-->
                            <!--                                                </a>-->
                            <!--                                                <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"-->
                            <!--                                                   href="javascript:;">-->
                            <!--                                                    <small class="fas fa-plus btn-icon__inner"></small>-->
                            <!--                                                </a>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- End Quantity -->
                            <!--                                </div>-->
                            <div class="mb-2 pb-0dot5">
                                <a href="#" class="btn btn-block btn-primary-dark panier"
                                    data-id="<?php echo $article[0]['article_id']; ?>"
                                    data-prix="<?php echo $article[0]['prix']; ?>">
                                    <i class="ec ec-add-to-cart mr-2 font-size-20"></i> Ajouter au panier</a>
                            </div>
                            <div class="mb-3">
                                <a href="<?php echo base_url() ?>panier/verification" class="btn btn-block btn-dark">Acheter maintenant</a>
                            </div>
                            <div class="flex-content-center flex-wrap">
                                <a href="#" class="text-gray-6 font-size-13 mr-2 favorite"
                                    data-id="<?php echo $article[0]['article_id']; ?>"
                                    data-prix="<?php echo $article[0]['prix']; ?>">
                                    <i class="ec ec-favorites mr-1 font-size-15"></i> Favoris</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Product Body -->
        <div class="mb-8">
            <div class="position-relative position-md-static px-md-6">
                <ul class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-0 pb-1 pb-xl-0 mb-n1 mb-xl-0"
                    id="pills-tab-8" role="tablist">
                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                        <a class="nav-link active" id="Jpills-two-example1-tab" data-toggle="pill"
                            href="#Jpills-two-example1" role="tab" aria-controls="Jpills-two-example1"
                            aria-selected="false">Description</a>
                    </li>
                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                        <a class="nav-link" id="Jpills-three-example1-tab" data-toggle="pill"
                            href="#Jpills-three-example1" role="tab" aria-controls="Jpills-three-example1"
                            aria-selected="false">Specification</a>
                    </li>
                    <!--                <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">-->
                    <!--                    <a class="nav-link" id="Jpills-four-example1-tab" data-toggle="pill" href="#Jpills-four-example1" role="tab" aria-controls="Jpills-four-example1" aria-selected="false">Commentaires</a>-->
                    <!--                </li>-->
                </ul>
            </div>
            <!--         Tab Content -->
            <div class="borders-radius-17 border p-4 mt-4 mt-md-0 px-lg-10 py-lg-9">
                <div class="tab-content" id="Jpills-tabContent">
                    <div class="tab-pane fade active show" id="Jpills-two-example1" role="tabpanel"
                        aria-labelledby="Jpills-two-example1-tab">
                        <div class="row">
                            <?php echo $article[0]['description']; ?>
                        </div>
                        <ul class="nav flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1"><strong>SKU:</strong>
                                <span class="sku"><?php echo $article[0]['sku']; ?></span>
                            </li>
                            <li class="nav-item text-gray-111 mx-3 flex-shrink-0 flex-xl-shrink-1">/</li>
                            <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1">
                                <strong>collection :</strong> <a href="#" class="text-blue">
                                    <?php
                                    foreach ($collections as $collection) :
                                        if ($collection['id_collection'] == $article[0]['collection_id']) :
                                            echo ucfirst($collection['name']);
                                        endif;
                                    endforeach;
                                    ?>
                                </a>
                            </li>
                            <li class="nav-item text-gray-111 mx-3 flex-shrink-0 flex-xl-shrink-1">/</li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="Jpills-three-example1" role="tabpanel"
                        aria-labelledby="Jpills-three-example1-tab">
                        <div class="mx-md-5 pt-1">
                            <div class="table-responsive mb-4">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th class="px-4 px-xl-5 border-top-0">Poids</th>
                                            <td class="border-top-0"> <?php echo $article[0]['poids']; ?> kg</td>
                                        </tr>
                                        <tr>
                                            <th class="px-4 px-xl-5">Dimensions</th>
                                            <td> <?php echo $article[0]['dimension']; ?></td>
                                        </tr>
                                        <tr>
                                            <th class="px-4 px-xl-5">Marque</th>
                                            <td>
                                                <?php
                                                foreach ($marques as $marq) :
                                                    if ($marq['article_marque_id'] == $article[0]['marque_id']) {
                                                        echo ucfirst($marq['name']);
                                                    }
                                                endforeach;
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="px-4 px-xl-5">couleur</th>
                                            <td>
                                                <?php
                                                foreach ($couleurs as $color) :
                                                    if ($color['id_couleur'] == $article[0]['couleur_id']) {
                                                        echo ucfirst($color['code_couleur']);
                                                    }
                                                endforeach;
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="px-4 px-xl-5">Garantie</th>
                                            <td> <?php echo $article[0]['garantie']; ?> mois</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--                <div class="tab-pane fade" id="Jpills-four-example1" role="tabpanel" aria-labelledby="Jpills-four-example1-tab">-->
                    <!--                    <div class="row mb-8">-->
                    <!--                        <div class="col-md-6">-->
                    <!--                            <div class="mb-3">-->
                    <!--                                <h3 class="font-size-18 mb-6">Basé sur 10 commentaires</h3>-->
                    <!--                                <h2 class="font-size-30 font-weight-bold text-lh-1 mb-0">4.3</h2>-->
                    <!--                                <div class="text-lh-1">globalement</div>-->
                    <!--                            </div>-->
                    <!---->
                    <!--                             Ratings -->
                    <!--                            <ul class="list-unstyled">-->
                    <!--                                <li class="py-1">-->
                    <!--                                    <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">-->
                    <!--                                        <div class="col-auto mb-2 mb-md-0">-->
                    <!--                                            <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">-->
                    <!--                                                <small class="fas fa-star"></small>-->
                    <!--                                                <small class="fas fa-star"></small>-->
                    <!--                                                <small class="fas fa-star"></small>-->
                    <!--                                                <small class="fas fa-star"></small>-->
                    <!--                                                <small class="far fa-star text-muted"></small>-->
                    <!--                                            </div>-->
                    <!--                                        </div>-->
                    <!--                                        <div class="col-auto mb-2 mb-md-0">-->
                    <!--                                            <div class="progress ml-xl-5" style="height: 10px; width: 200px;">-->
                    <!--                                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>-->
                    <!--                                            </div>-->
                    <!--                                        </div>-->
                    <!--                                        <div class="col-auto text-right">-->
                    <!--                                            <span class="text-gray-90">205</span>-->
                    <!--                                        </div>-->
                    <!--                                    </a>-->
                    <!--                                </li>-->
                    <!--                                <li class="py-1">-->
                    <!--                                    <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">-->
                    <!--                                        <div class="col-auto mb-2 mb-md-0">-->
                    <!--                                            <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">-->
                    <!--                                                <small class="fas fa-star"></small>-->
                    <!--                                                <small class="fas fa-star"></small>-->
                    <!--                                                <small class="fas fa-star"></small>-->
                    <!--                                                <small class="far fa-star text-muted"></small>-->
                    <!--                                                <small class="far fa-star text-muted"></small>-->
                    <!--                                            </div>-->
                    <!--                                        </div>-->
                    <!--                                        <div class="col-auto mb-2 mb-md-0">-->
                    <!--                                            <div class="progress ml-xl-5" style="height: 10px; width: 200px;">-->
                    <!--                                                <div class="progress-bar" role="progressbar" style="width: 53%;" aria-valuenow="53" aria-valuemin="0" aria-valuemax="100"></div>-->
                    <!--                                            </div>-->
                    <!--                                        </div>-->
                    <!--                                        <div class="col-auto text-right">-->
                    <!--                                            <span class="text-gray-90">55</span>-->
                    <!--                                        </div>-->
                    <!--                                    </a>-->
                    <!--                                </li>-->
                    <!--                                <li class="py-1">-->
                    <!--                                    <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">-->
                    <!--                                        <div class="col-auto mb-2 mb-md-0">-->
                    <!--                                            <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">-->
                    <!--                                                <small class="fas fa-star"></small>-->
                    <!--                                                <small class="fas fa-star"></small>-->
                    <!--                                                <small class="far fa-star text-muted"></small>-->
                    <!--                                                <small class="far fa-star text-muted"></small>-->
                    <!--                                                <small class="far fa-star text-muted"></small>-->
                    <!--                                            </div>-->
                    <!--                                        </div>-->
                    <!--                                        <div class="col-auto mb-2 mb-md-0">-->
                    <!--                                            <div class="progress ml-xl-5" style="height: 10px; width: 200px;">-->
                    <!--                                                <div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>-->
                    <!--                                            </div>-->
                    <!--                                        </div>-->
                    <!--                                        <div class="col-auto text-right">-->
                    <!--                                            <span class="text-gray-90">23</span>-->
                    <!--                                        </div>-->
                    <!--                                    </a>-->
                    <!--                                </li>-->
                    <!--                                <li class="py-1">-->
                    <!--                                    <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">-->
                    <!--                                        <div class="col-auto mb-2 mb-md-0">-->
                    <!--                                            <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">-->
                    <!--                                                <small class="fas fa-star"></small>-->
                    <!--                                                <small class="far fa-star text-muted"></small>-->
                    <!--                                                <small class="far fa-star text-muted"></small>-->
                    <!--                                                <small class="far fa-star text-muted"></small>-->
                    <!--                                                <small class="far fa-star text-muted"></small>-->
                    <!--                                            </div>-->
                    <!--                                        </div>-->
                    <!--                                        <div class="col-auto mb-2 mb-md-0">-->
                    <!--                                            <div class="progress ml-xl-5" style="height: 10px; width: 200px;">-->
                    <!--                                                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>-->
                    <!--                                            </div>-->
                    <!--                                        </div>-->
                    <!--                                        <div class="col-auto text-right">-->
                    <!--                                            <span class="text-muted">0</span>-->
                    <!--                                        </div>-->
                    <!--                                    </a>-->
                    <!--                                </li>-->
                    <!--                                <li class="py-1">-->
                    <!--                                    <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">-->
                    <!--                                        <div class="col-auto mb-2 mb-md-0">-->
                    <!--                                            <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">-->
                    <!--                                                <small class="fas fa-star"></small>-->
                    <!--                                                <small class="far fa-star text-muted"></small>-->
                    <!--                                                <small class="far fa-star text-muted"></small>-->
                    <!--                                                <small class="far fa-star text-muted"></small>-->
                    <!--                                                <small class="far fa-star text-muted"></small>-->
                    <!--                                            </div>-->
                    <!--                                        </div>-->
                    <!--                                        <div class="col-auto mb-2 mb-md-0">-->
                    <!--                                            <div class="progress ml-xl-5" style="height: 10px; width: 200px;">-->
                    <!--                                                <div class="progress-bar" role="progressbar" style="width: 1%;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>-->
                    <!--                                            </div>-->
                    <!--                                        </div>-->
                    <!--                                        <div class="col-auto text-right">-->
                    <!--                                            <span class="text-gray-90">4</span>-->
                    <!--                                        </div>-->
                    <!--                                    </a>-->
                    <!--                                </li>-->
                    <!--                            </ul>-->
                    <!--                             End Ratings -->
                    <!--                        </div>-->
                    <!--                        <div class="col-md-6">-->
                    <!--                            <h3 class="font-size-18 mb-5">Add a review</h3>-->
                    <!--                            Form -->
                    <!--                            <form class="js-validate">-->
                    <!--                                <div class="row align-items-center mb-4">-->
                    <!--                                    <div class="col-md-4 col-lg-3">-->
                    <!--                                        <label for="rating" class="form-label mb-0">Your Review</label>-->
                    <!--                                    </div>-->
                    <!--                                    <div class="col-md-8 col-lg-9">-->
                    <!--                                        <a href="#" class="d-block">-->
                    <!--                                            <div class="text-warning text-ls-n2 font-size-16">-->
                    <!--                                                <small class="far fa-star text-muted"></small>-->
                    <!--                                                <small class="far fa-star text-muted"></small>-->
                    <!--                                                <small class="far fa-star text-muted"></small>-->
                    <!--                                                <small class="far fa-star text-muted"></small>-->
                    <!--                                                <small class="far fa-star text-muted"></small>-->
                    <!--                                            </div>-->
                    <!--                                        </a>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                                <div class="js-form-message form-group mb-3 row">-->
                    <!--                                    <div class="col-md-4 col-lg-3">-->
                    <!--                                        <label for="descriptionTextarea" class="form-label">Your Review</label>-->
                    <!--                                    </div>-->
                    <!--                                    <div class="col-md-8 col-lg-9">-->
                    <!--                                                    <textarea class="form-control" rows="3" id="descriptionTextarea"-->
                    <!--                                                              data-msg="Please enter your message."-->
                    <!--                                                              data-error-class="u-has-error"-->
                    <!--                                                              data-success-class="u-has-success"></textarea>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                                <div class="js-form-message form-group mb-3 row">-->
                    <!--                                    <div class="col-md-4 col-lg-3">-->
                    <!--                                        <label for="inputName" class="form-label">Name <span class="text-danger">*</span></label>-->
                    <!--                                    </div>-->
                    <!--                                    <div class="col-md-8 col-lg-9">-->
                    <!--                                        <input type="text" class="form-control" name="name" id="inputName" aria-label="Alex Hecker" required-->
                    <!--                                               data-msg="Please enter your name."-->
                    <!--                                               data-error-class="u-has-error"-->
                    <!--                                               data-success-class="u-has-success">-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                                <div class="js-form-message form-group mb-3 row">-->
                    <!--                                    <div class="col-md-4 col-lg-3">-->
                    <!--                                        <label for="emailAddress" class="form-label">Email <span class="text-danger">*</span></label>-->
                    <!--                                    </div>-->
                    <!--                                    <div class="col-md-8 col-lg-9">-->
                    <!--                                        <input type="email" class="form-control" name="emailAddress" id="emailAddress" aria-label="alexhecker@pixeel.com" required-->
                    <!--                                               data-msg="Please enter a valid email address."-->
                    <!--                                               data-error-class="u-has-error"-->
                    <!--                                               data-success-class="u-has-success">-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                                <div class="row">-->
                    <!--                                    <div class="offset-md-4 offset-lg-3 col-auto">-->
                    <!--                                        <button type="submit" class="btn btn-primary-dark btn-wide transition-3d-hover">Add Review</button>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                            </form>-->
                    <!--                            End Form -->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                </div>
            </div>
            <!--         End Tab Content -->
        </div>
    </div>


</main>
<!-- ========== END MAIN CONTENT ========== -->


<?php $this->load->view('template/front-end/bas_template') ?>