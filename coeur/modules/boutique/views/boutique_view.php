<?php $this->load->view('template/front-end/haut_template', array("menu_actif" => $menu_actif)) ?>

<!--====== BREADCRUMB PART START ======-->
<?php $this->load->view('template/front-end/page_head', array("title"=>$title, "menu_actif"=>$menu_actif))?>

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
                        <h5 class="widget-title">Search Objects</h5>
                        <form action="#">
                            <input type="text" placeholder="Search your keyword...">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                    <!-- Popular Post Widget -->
                    <div class="widget popular-feeds mb-40">
                        <h5 class="widget-title">Popular Products</h5>
                        <div class="popular-feed-loop">
                            <div class="single-popular-feed">
                                <div class="feed-img">
                                    <img src="assets/img/recent-post-wid/04.png" alt="Image">
                                </div>
                                <div class="feed-desc desc">
                                    <h6><a href="shop-detail.html">Golden Pendant.</a></h6>
                                    <span class="price">$500 <span>$580</span></span>
                                </div>
                            </div>
                            <div class="single-popular-feed">
                                <div class="feed-img">
                                    <img src="assets/img/recent-post-wid/05.png" alt="Image">
                                </div>
                                <div class="feed-desc desc">
                                    <h6><a href="shop-detail.html">Silver Pendant.</a></h6>
                                    <span class="price">$400 <span>$520</span></span>
                                </div>
                            </div>
                            <div class="single-popular-feed">
                                <div class="feed-img">
                                    <img src="assets/img/recent-post-wid/06.png" alt="Image">
                                </div>
                                <div class="feed-desc desc">
                                    <h6><a href="shop-detail.html">Diamond Ring.</a></h6>
                                    <span class="price">$390 <span>$450</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Popular Tags Widget -->
                    <div class="widget popular-tag-widget">
                        <h5 class="widget-title">Popular Tags</h5>
                        <ul>
                            <li><a href="#">Rings</a></li>
                            <li><a href="#">earrings</a></li>
                            <li><a href="#">necklace</a></li>
                            <li><a href="#">bracelets</a></li>
                            <li><a href="#">wedding ring</a></li>
                            <li><a href="#">bangles</a></li>
                            <li><a href="#">hard ring</a></li>
                            <li><a href="#">ankle bracelet</a></li>
                            <li><a href="#">silver braclet</a></li>
                            <li><a href="#">earring</a></li>
                            <li><a href="#">copper bracelet</a></li>
                            <li><a href="#">tech</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-10">
                <div class="shop-products-wrapper">
                    <div class="shop-product-top">
                        <p>Showing 1 To 9 Of 60 results</p>
                        <div class="sorting-box">
                            <select name="guests" id="guests">
                                <option value="" disabled selected>Default Sorting</option>
                                <option value="1">Sort By Popularity</option>
                                <option value="2">Sort By Latest</option>
                                <option value="4">Sort By Rating</option>
                                <option value="8">Sort By Price:Low to High</option>
                                <option value="8">Sort By Price:High to Low</option>
                            </select>
                        </div>
                    </div>
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
                                            <span class="price discounted">-15%</span>
                                        </div>
                                        <?php
                                        endif;
                                        ?>
                                        <div class="button-group">
                                            <a href="#"><i class="far fa-heart"></i></a>
                                            <a href="#"><i class="far fa-sync-alt"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#quickViewModal">
                                                <i class="far fa-eye"></i></a>
                                        </div>
                                    </div>
                                    <div class="desc">
                                        <h4>
                                            <a href="shop-detail.html">
                                                <?php echo ucfirst($article->designation); ?>
                                            </a>
                                        </h4>
                                    <?php
                                    if ($article->prix_promo) :
                                        ?>
                                        <span class="price">
                                            <?php echo number_format($article->prix_promo, 0, ',', ' '); ?> FCFA
                                            <span style="font-size: 9px;">
                                                <?php echo number_format($article->prix, 0, ',', ' '); ?> FCFA
                                            </span>
                                        </span>
                                    <?php
                                    else:
                                        ?>
                                        <span class="price"><?php echo number_format($article->prix, 0, ',', ' '); ?> FCFA</span>
                                    <?php
                                    endif;
                                    ?>
                                        <a href="shop-detail.html" class="link"><i class="fal fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                                <?php }
                            }
                            ?>
                        </div>
                        <div class="pagination-wrap">
                            <ul>
                                <li><a href="#"><i class="far fa-angle-double-left"></i></a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">10</a></li>
                                <li><a href="#"><i class="far fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
</section>
<!--====== SHOP SECTION END ======-->

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

