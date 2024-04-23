<?php $this->load->view('template/front-end/haut_template', array("menu_actif" => $menu_actif)) ?>

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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Pack
                            auto
                        </li>
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
                <div class="mb-6">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Filtres</h3>
                    </div>
                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="font-size-14 mb-3 font-weight-bold">Catégories</h4>

                        <!-- Checkboxes -->
                        <?php
                        $i = 1;
                        foreach ($categories as $cat) :
                            ?>
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="category_id" class="custom-control-input" data-id="<?php echo $cat['category_id']; ?>"
                                           onclick="getProductByCat()" id="category-<?php echo $i; ?>">
                                    <label class="custom-control-label"
                                           for="category-<?php echo $i; ?>"><?php echo ucfirst($cat['name']); ?>
                                    </label>
                                </div>
                            </div>
                            <?php
                            $i++;
                        endforeach;
                        ?>
                    </div>
                    <div class="">
                        <h4 class="font-size-14 mb-3 font-weight-bold">Marques</h4>

                        <!-- Checkboxes -->
                        <?php
                        $i = 0;
                        foreach ($marques as $marq) :
                            ?>
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="marque_id" onclick="getProductByMarque()" class="custom-control-input"
                                           id="brand-<?php echo $i; ?>" data-id="<?php echo $marq['article_marque_id']; ?>">
                                    <label class="custom-control-label"
                                           for="brand-<?php echo $i; ?>"><?php echo ucfirst($marq['name']); ?>
                                    </label>
                                </div>
                            </div>
                            <?php
                            $i++;
                        endforeach;
                        ?>
                    </div>
<!--                    <div class="border-bottom pb-4 mb-4">-->
<!--                        <h4 class="font-size-14 mb-3 font-weight-bold">Color</h4>-->
<!---->
                        <!-- Checkboxes -->
                            <?php
//                        $i = 0;
//                        foreach ($couleurs as $color) :
//                            ?>
<!--                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
<!--                                <div class="custom-control custom-checkbox">-->
<!--                                    <input type="checkbox" name="color_id" class="custom-control-input"-->
<!--                                           data-id="--><?php //echo $color['id_couleur']; ?><!--"-->
<!--                                           id="color---><?php //echo $i; ?><!--"  onclick="getProductByColor()">-->
<!--                                    <label class="custom-control-label" for="color---><?php //echo $i; ?><!--">-->
<!--                                        --><?php //echo ucfirst($color['code_couleur']); ?>
<!--                                    </label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        --><?php
//                            $i++;
//                        endforeach;
//                        ?>
<!--                    </div>-->
                </div>
                <div class="mb-8">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Récents</h3>
                    </div>
                    <ul class="list-unstyled">
                        <?php
                        if (!empty($articles)) {
                            $i = 1;
                            foreach ($articles as $article) {
                                if ($i <= 4) {
                                    ?>
                                    <li class="mb-4">
                                        <div class="row">
                                            <div class="col-auto">
                                                <a href="<?php echo base_url(); ?>boutique/article_detail/<?php echo $article['article_id']; ?>"
                                                   class="d-block width-75">
                                                    <img class="img-fluid" alt="Image Description"
                                                         src="<?php echo base_url() ?>uploads/articles/<?php echo $article['image_principale_article']; ?>">
                                                </a>
                                            </div>
                                            <div class="col">
                                                <h3 class="text-lh-1dot2 font-size-14 mb-0">
                                                    <a href="<?php echo base_url(); ?>boutique/article_detail/<?php echo $article['article_id']; ?>"><?php echo ucfirst($article['designation']); ?></a>
                                                </h3>
                                                <div class="text-warning text-ls-n2 font-size-16 mb-1"
                                                     style="width: 80px;">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                                <div class="font-weight-bold">
                                                    <?php
                                                    if ($article['prix_promo']) :
                                                        ?>
                                                        <del class="font-size-11 text-gray-9 d-block"><?php echo number_format($article['prix'], 0, ',', ' '); ?>
                                                            XOF
                                                        </del>
                                                        <ins class="font-size-15 text-red text-decoration-none d-block"><?php echo number_format($article['prix_promo'], 0, ',', ' '); ?>
                                                            XOF
                                                        </ins>
                                                    <?php
                                                    else:
                                                        echo number_format($article['prix'], 0, ',', ' ').' XOF';
                                                    endif;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                                $i++;
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-wd-9gdot5" id="showProduct">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel"
                         aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                        <h2><?php echo ucfirst($category[0]['name']); ?>/<?php echo ucfirst($sous_category[0]['name']); ?></h2>
                        <ul class="row list-unstyled products-group no-gutters">
                            <?php
                            if (!empty($articles_page[0])) {
                                foreach ($articles_page as $article) {
                                    ?>
                                    <li class="col-6 col-wd-3 col-md-4 product-item">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner px-xl-4 p-3">
                                                <div class="product-item__body pb-xl-2">
                                                    <div class="mb-2"><a
                                                                href="<?php echo base_url(); ?>boutique/article_detail/<?php echo $article->article_id; ?>"
                                                                class="font-size-12 text-gray-5">
                                                            <?php
                                                            foreach ($categories as $cat) :
                                                                if ($cat['category_id'] == $article->category_id) :
                                                                    echo ucfirst($cat['name']);
                                                                endif;
                                                            endforeach;
                                                            ?></a></div>
                                                    <h5 class="mb-1 product-item__title">
                                                        <a href="<?php echo base_url(); ?>boutique/article_detail/<?php echo $article->article_id; ?>"
                                                           class="text-blue font-weight-bold">
                                                            <?php echo ucfirst($article->designation); ?>
                                                        </a></h5>
                                                    <div class="mb-2">
                                                        <a href="<?php echo base_url(); ?>boutique/article_detail/<?php echo $article->article_id; ?>"
                                                           class="d-block text-center">
                                                            <img class="img-fluid" style="height: 172.41px !important;"
                                                                 src="<?php echo base_url() ?>uploads/articles/<?php echo $article->image_principale_article; ?>"
                                                                 alt="Image Description"></a>
                                                    </div>
                                                    <div class="flex-center-between mb-1">
                                                        <?php
                                                        if ($article->prix_promo) :
                                                            ?>
                                                            <div class="prodcut-price align-items-center flex-wrap position-relative">
                                                                <del class="font-size-12 tex-gray-6 "><?php echo number_format($article->prix, 0, ',', ' '); ?>
                                                                    XOF
                                                                </del>
                                                                <br>
                                                                <ins class="font-size-20 text-red text-decoration-none mr-2"><?php echo number_format($article->prix_promo, 0, ',', ' '); ?>
                                                                    XOF
                                                                </ins>
                                                            </div>
                                                        <?php
                                                        else:
                                                            ?>
                                                            <div class="prodcut-price">
                                                                <div class="text-gray-100"><?php echo number_format($article->prix, 0, ',', ' '); ?>
                                                                    XOF
                                                                </div>
                                                            </div>
                                                        <?php
                                                        endif;
                                                        ?>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="javascript:;"
                                                               class="btn-add-cart btn-primary transition-3d-hover panier"
                                                               data-id="<?php echo $article->article_id; ?>"
                                                               data-prix="<?php echo $article->prix; ?>">
                                                                <i class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-item__footer">
                                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                                        <a href="#" class="text-gray-6 font-size-13 favorite"
                                                           data-id="<?php echo $article->article_id; ?>"
                                                           data-prix="<?php echo $article->prix; ?>">
                                                            <i class="ec ec-favorites mr-1 font-size-15"></i>
                                                            favoris</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php }
                            }else{ ?>
                                <div class="col-md-12">
                                    <img src="<?php echo base_url() ?>assets/front-end/vide.png" style="width: 100%" alt="">
                                </div>
                                <?php
                            }
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
                        <div class="text-center text-md-left mb-3 mb-md-0">Affichage 1–<?php echo count($articles_page);?> sur <?php echo $total;?> total</div>
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
                            <img class="img-fluid m-auto max-height-50"
                                 src="<?php echo base_url() ?>assets/front-end/img/200X60/img1.png"
                                 alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50"
                                 src="<?php echo base_url() ?>assets/front-end/img/200X60/img2.png"
                                 alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50"
                                 src="<?php echo base_url() ?>assets/front-end/img/200X60/img3.png"
                                 alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50"
                                 src="<?php echo base_url() ?>assets/front-end/img/200X60/img4.png"
                                 alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50"
                                 src="<?php echo base_url() ?>assets/front-end/img/200X60/img5.png"
                                 alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50"
                                 src="<?php echo base_url() ?>assets/front-end/img/200X60/img6.png"
                                 alt="Image Description">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Brand Carousel -->
    </div>
</main>

<script>
    function getProductByCat() {
        if ($("input:checkbox:checked").length > 0) {
            var cats_id = $("input[name='category_id']:checkbox:checked").map(function () {
                return $(this).attr("data-id");
            }).get();
            $("input[name='marque_id']").each(function () {
                this.checked = false;
            });

            // $("input[name='color_id']").each(function () {
            //     this.checked = false;
            // });

        $.ajax({
            url: '<?php echo base_url(); ?>boutique/boutique_by_cat',
            data: {'cats_id': cats_id},
            method: 'post',
            datatype: 'html',
            success: function (response) {
                if (response === false) {
                    Notiflix.Notify.failure('Rien.',
                        {
                            position: 'right-bottom',
                        },
                    );
                } else {
                    $('#showProduct').html(response);
                }
            }
        });
    }
    }
    function getProductByMarque() {
        if ($("input:checkbox:checked").length > 0) {
            var marques_id = $("input[name='marque_id']:checkbox:checked").map(function () {
                return $(this).attr("data-id");
            }).get();
            $("input[name='category_id']").each(function () {
                this.checked = false;
            });

            // $("input[name='color_id']").each(function () {
            //     this.checked = false;
            // });

        $.ajax({
            url: '<?php echo base_url(); ?>boutique/boutique_by_mark',
            data: {'marques_id': marques_id},
            method: 'post',
            datatype: 'html',
            success: function (response) {
                if (response === false) {
                    Notiflix.Notify.failure('Rien.',
                        {
                            position: 'right-bottom',
                        },
                    );
                } else {
                    $('#showProduct').html(response);
                }
            }
        });
    }
    }
    function getProductByColor() {
        if ($("input:checkbox:checked").length > 0) {
            var colors_id = $("input[name='color_id']:checkbox:checked").map(function () {
                return $(this).attr("data-id");
            }).get();
            $("input[name='category_id']").each(function () {
                this.checked = false;
            });

            $("input[name='marque_id']").each(function () {
                this.checked = false;
            });
        $.ajax({
            url: '<?php echo base_url(); ?>boutique/boutique_by_color',
            data: {'colors_id': colors_id},
            method: 'post',
            datatype: 'html',
            success: function (response) {
                if (response === false) {
                    Notiflix.Notify.failure('Rien.',
                        {
                            position: 'right-bottom',
                        },
                    );
                } else {
                    $('#showProduct').html(response);
                }
            }
        });
    }
    }
</script>
<?php $this->load->view('template/front-end/bas_template') ?>

