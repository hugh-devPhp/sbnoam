<?php $this->load->view('template/front-end/haut_template', array("menu_actif" => $menu_actif)) ?>

<!--====== BREADCRUMB PART START ======-->
<?php $this->load->view('template/front-end/page_head', array("title" => $title, "menu_actif" => $menu_actif)) ?>

<!--====== BREADCRUMB PART END ======-->
<!--====== SHOP SECTION START ======-->
<section class="Shop-section pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Shop Sidebar -->
            <div class="col-lg-4 col-md-10 col-sm-10">
                <div class="sidebar">
                    <!-- About Author Widget -->
                    <!-- Search Widget -->
                    <div class="widget search-widget mb-40">
                        <h5 class="widget-title">Faite une recherhce</h5>
                        <form action="#">
                            <input type="text" placeholder="entrez un mot clé...">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                    <!-- Popular Post Widget -->
                    <div class="widget popular-feeds mb-40">
                        <h5 class="widget-title">Produits populaire</h5>
                        <div class="popular-feed-loop">
                            <?php
                            if (!empty($pop_articles)) {
                                $i = 1;
                                foreach ($pop_articles as $pop) {
                                    if ($i <= 3) {
                            ?>
                                        <div class="single-popular-feed">
                                            <div class="feed-img">
                                                <img src="<?php echo base_url() ?>uploads/articles/<?php echo $pop->image_principale_article; ?>"
                                                    alt="Image">
                                            </div>
                                            <div class="feed-desc desc">
                                                <h6>
                                                    <a href="<?php echo base_url(); ?>boutique/article_detail/<?php echo $pop->article_id; ?>"><?php echo ucfirst($pop->designation); ?></a>
                                                </h6>
                                                <div class="font-weight-bold">
                                                    <?php
                                                    if ($pop->prix_promo) :
                                                    ?>
                                                        <del class="d-block"
                                                            style="font-size:11px; font-weight: 9;"><?php echo number_format($pop->prix, 0, ',', ' '); ?>
                                                            FCFA
                                                        </del>
                                                        <ins class="font-size-15 text-red text-decoration-none d-block price"><?php echo number_format($pop->prix_promo, 0, ',', ' '); ?>
                                                            FCFA
                                                        </ins>
                                                    <?php
                                                    else:
                                                        echo '<span  class="price">' . number_format($pop->prix, 0, ',', ' ') . ' FCFA </span>';
                                                    endif;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                            <?php }
                                    $i++;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-10">
                <div class="shop-products-wrapper">
                    <?php
                    if ($total > 0) {
                    ?>
                        <div class="shop-product-top">
                            <p> Affichage 1–<?php echo count($articles_page); ?> sur <?php echo $total; ?> total</p>
                        </div>
                    <?php } ?>
                    <div class="product-wrapper restaurant-tab-area">
                        <div class="row">
                            <?php
                            if (!empty($articles_page)) {
                                foreach ($articles_page as $article) {
                            ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="food-box shop-box">
                                            <div class="thumb" style="height: 150px !important;">
                                                <img src="<?php echo base_url() ?>uploads/articles/<?php echo $article->image_principale_article; ?>"
                                                    alt="images">
                                                <?php
                                                if ($article->prix_promo) :
                                                ?>
                                                    <div class="badges">
                                                        <span class="price">Promo</span>
                                                        <!--                                                        <span class="price discounted">-15%</span>-->
                                                    </div>
                                                <?php
                                                endif;
                                                ?>
                                                <div class="button-group">
                                                    <a href="<?php echo base_url(); ?>boutique/article_detail/<?php echo $article->article_id; ?>">
                                                        <i class="far fa-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="desc">
                                                <h4>
                                                    <a href="<?php echo base_url(); ?>boutique/article_detail/<?php echo $article->article_id; ?>">
                                                        <?php echo ucfirst($article->designation); ?>
                                                    </a>
                                                </h4>
                                                <?php
                                                if ($article->prix_promo) :
                                                ?>
                                                    <span class="price">
                                                        <?php echo number_format($article->prix_promo, 0, ',', ' '); ?>
                                                        <row style="font-size:10px;"><sup>Fcfa</sup></row>
                                                        <span style="font-size:11px; font-weight: 9;">
                                                            <?php echo number_format($article->prix, 0, ',', ' '); ?>
                                                            <row style="font-size:10px;"><sup>Fcfa</sup></row>
                                                        </span>
                                                    </span>
                                                <?php
                                                else:
                                                ?>
                                                    <span class="price"><?php echo number_format($article->prix, 0, ',', ' '); ?><row
                                                            style="font-size:10px;"> <sup>Fcfa</sup></row>
                                                    </span>
                                                <?php
                                                endif;
                                                ?>
                                                <a href="<?php echo base_url(); ?>boutique/article_detail/<?php echo $article->article_id; ?>" class="link">
                                                    <i class="fal fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            }
                            ?>
                        </div>
                        <div class="pagination-wrap">
                            <?php
                            if ($total > 0) {
                            ?>
                                <?php
                                echo $this->pagination->create_links();
                                ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
</section>
<!--====== SHOP SECTION END ======-->

<script>
    function getProductByCat() {
        if ($("input:checkbox:checked").length > 0) {
            var cats_id = $("input[name='category_id']:checkbox:checked").map(function() {
                return $(this).attr("data-id");
            }).get();
            $("input[name='marque_id']").each(function() {
                this.checked = false;
            });

            // $("input[name='color_id']").each(function () {
            //     this.checked = false;
            // });

            $.ajax({
                url: '<?php echo base_url(); ?>boutique/boutique_by_cat',
                data: {
                    'cats_id': cats_id
                },
                method: 'post',
                datatype: 'html',
                success: function(response) {
                    if (response === false) {
                        Notiflix.Notify.failure('Rien.', {
                            position: 'right-bottom',
                        }, );
                    } else {
                        $('#showProduct').html(response);
                    }
                }
            });
        }
    }

    function getProductByMarque() {
        if ($("input:checkbox:checked").length > 0) {
            var marques_id = $("input[name='marque_id']:checkbox:checked").map(function() {
                return $(this).attr("data-id");
            }).get();
            $("input[name='category_id']").each(function() {
                this.checked = false;
            });

            // $("input[name='color_id']").each(function () {
            //     this.checked = false;
            // });

            $.ajax({
                url: '<?php echo base_url(); ?>boutique/boutique_by_mark',
                data: {
                    'marques_id': marques_id
                },
                method: 'post',
                datatype: 'html',
                success: function(response) {
                    if (response === false) {
                        Notiflix.Notify.failure('Rien.', {
                            position: 'right-bottom',
                        }, );
                    } else {
                        $('#showProduct').html(response);
                    }
                }
            });
        }
    }

    function getProductByColor() {
        if ($("input:checkbox:checked").length > 0) {
            var colors_id = $("input[name='color_id']:checkbox:checked").map(function() {
                return $(this).attr("data-id");
            }).get();
            $("input[name='category_id']").each(function() {
                this.checked = false;
            });

            $("input[name='marque_id']").each(function() {
                this.checked = false;
            });
            $.ajax({
                url: '<?php echo base_url(); ?>boutique/boutique_by_color',
                data: {
                    'colors_id': colors_id
                },
                method: 'post',
                datatype: 'html',
                success: function(response) {
                    if (response === false) {
                        Notiflix.Notify.failure('Rien.', {
                            position: 'right-bottom',
                        }, );
                    } else {
                        $('#showProduct').html(response);
                    }
                }
            });
        }
    }
</script>
<?php $this->load->view('template/front-end/bas_template') ?>