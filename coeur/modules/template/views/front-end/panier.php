<?php
$panier = panier();


?>
<?php
if(!empty($panier['data'])){
    $articles = $panier['data'];

    ?>
    <ul class="list-unstyled px-3 pt-3" style="overflow: auto; max-height: 400px">
        <!--        --><?php //foreach ($articles as $article){?>
        <?php foreach ($articles as $article){?>
            <li class="border-bottom pb-3 mb-3">
                <div class="">
                    <ul class="list-unstyled row mx-n2">
                        <li class="px-2 col-auto">
                            <img class="img-fluid" src="<?php echo base_url('uploads/articles/').$article['image_principale_article']; ?>" alt="Image Description" style="width: 100px !important;">
                        </li>
                        <li class="px-2 col">
                            <h5 class="text-blue font-size-14 font-weight-bold"><?php echo ucwords($article['designation']); ?></h5>
                            <span class="font-size-14"><?php echo $article['qty']; ?> × <?php echo $article['prix']; ?></span>
                        </li>
                        <li class="px-2 col-auto">
                            <a href="javascript:;" class="text-gray-90 del_panier" data-id="<?php echo $article['article_id']; ?>"><i class="ec ec-close-remove"></i></a>
                        </li>
                    </ul>
                </div>
            </li>
        <?php } ?>
    </ul>
    <div class="flex-center-between px-4 pt-2">
        <a href="<?php echo base_url()?>panier" class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5">Voir panier</a>
        <a href="<?php echo base_url()?>panier/verification" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5">Verification</a>
    </div>
    <?php

    ?>
<?php }else{ ?>
    <div style="text-align: center">
        <span >Vide</span>
    </div>

<?php } ?>

