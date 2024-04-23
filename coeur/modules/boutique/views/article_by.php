<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel"
         aria-labelledby="pills-one-example1-tab" data-target-group="groups">
        <ul class="row list-unstyled products-group no-gutters">
            <?php
            if (!empty($articles_page[0])) {
                foreach ($articles_page as $articles_) {
                    foreach ($articles_ as $article) {
                    ?>
                    <li class="col-6 col-wd-3 col-md-4 product-item">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-xl-4 p-3">
                                <div class="product-item__body pb-xl-2">
                                    <div class="mb-2">
                                        <a href="<?php echo base_url(); ?>boutique/article_detail/<?php echo $article->article_id; ?>"
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
                                            <img class="" height="190" width="200"
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
                                        <a href="#" class="text-gray-6 font-size-13"><i
                                                    class="ec ec-favorites mr-1 font-size-15"></i>
                                            favoris</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                        <?php
                    }
                    }
            }
            else{ ?>
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