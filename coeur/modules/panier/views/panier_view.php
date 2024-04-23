<style>
    .contenu {
        margin: 50px auto;
        background-color: #fff;
        padding: 100px 0;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .panier-vide {
        text-align: center;
    }

    .panier-vide p {
        font-size: 20px;
        color: #555;
    }

    .panier-vide a {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .panier-vide a:hover {
        background-color: #0056b3;
    }
</style>
<div class="container">

    <?php
    $panier = panier();


    ?>
    <?php
    if(!empty($panier['data'])){
    $articles = $panier['data'];
    ?>
        <div class="mb-4">
            <h1 class="text-center">Panier</h1>
        </div>
    <div class="mb-10 cart-table">
        <form class="mb-4" action="#" method="post">

            <table class="table" cellspacing="0">
                <thead>
                <tr>
                    <th class="product-remove">&nbsp;</th>
                    <th class="product-thumbnail">&nbsp;</th>
                    <th class="product-name">Produit</th>
                    <th class="product-price">Prix</th>
                    <th class="product-quantity w-lg-15">Quantité</th>
                    <th class="product-subtotal">Total</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($articles as $item){
                    $id_article = $item['article_id'];
                    if((int)$item['prix_promo']>0){ $prix =  $item['prix_promo']; }else{ $prix = $item['prix']; }
                    ?>
                <tr class="">
                    <td class="text-center">
                        <a href="javascript:;" data-id="<?php echo "$id_article"; ?>" class="text-gray-32 font-size-26 delete">×</a>
                    </td>
                    <td class="d-none d-md-table-cell">
                        <a href="#"><img class="img-fluid max-width-200 p-1 border border-color-1" src="<?php echo base_url('uploads/articles/').$item['image_principale_article']; ?>" alt="Image Description"></a>
                    </td>

                    <td data-title="Product">
                        <a href="#" class="text-gray-90"><?php echo ucwords($item['designation']); ?></a>
                    </td>

                    <td data-title="Price">
                        <span class=""><?php  echo $prix; ?></span>
                    </td>

                    <td data-title="Quantity">
                        <span class="sr-only">Quantité</span>
                        <!-- Quantity -->
                        <div class="border rounded-pill py-1 width-122 w-xl-80 px-3 border-color-1">
                            <div class="js-quantity row align-items-center">
                                <div class="col">
                                    <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none" id="<?php echo "id-$id_article"; ?>"  type="text" value="<?php echo $item['qty']; ?>" disabled>
                                </div>
                                <div class="col-auto pr-1">
                                    <a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0 reduit" data-id="<?php echo "$id_article"; ?>"  data-prix="<?php echo $prix; ?>"  href="javascript:;">
                                        <small class="fas fa-minus btn-icon__inner"></small>
                                    </a>
                                    <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0 ajouter" data-id="<?php echo "$id_article"; ?>"  data-prix="<?php echo $prix; ?>"  href="javascript:;">
                                        <small class="fas fa-plus btn-icon__inner"></small>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Quantity -->
                    </td>

                    <td data-title="Total">
                        <span id="<?php echo "prix-$id_article"; ?>"><?php echo $item['qty']*$prix; ?></span>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>

        </form>
    </div>
    <div class="mb-8 cart-total">
        <div class="row">
            <div class="col-xl-5 col-lg-6 offset-lg-6 offset-xl-7 col-md-8 offset-md-4">
                <div class="border-bottom border-color-1 mb-3">
                    <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Total Panier</h3>
                </div>
                <table class="table mb-3 mb-md-0">
                    <tbody>
                    <tr class="cart-subtotal">
                        <th>Sous-total</th>
                        <td data-title="Subtotal"><span class="amount sub_total"><?php echo $panier['prix_article']; ?></span></td>
                    </tr>
                    <tr class="shipping">
                        <th>Livraison</th>
                        <td data-title="Shipping">
                            Tarif fixe : <span class="amount">2000</span>
                            <div class="mt-1">
                            </div>
                        </td>
                    </tr>
                    <tr class="order-total">
                        <th>Total</th>
                        <td data-title="Total"><strong><span class="amount total_cart" ><?php echo $panier['prix_article']+2000; ?></span></strong></td>
                    </tr>
                    </tbody>
                </table>
                <div class="d-md-flex" style="float: right">

                    <a href="<?php echo base_url()?>panier/verification" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block">Verification</a>
                </div>
            </div>
        </div>
    </div>
    <?php }else{ ?>
        <div class="contenu">
            <div class="panier-vide">
                <p>Votre panier est vide.</p>
                <a href="<?php echo base_url()?>boutique/boutique_view">Continuer vos achats</a>
            </div>
        </div>
    <?php } ?>
</div>
<script src="<?php echo base_url()?>assets/front-end/vendor/jquery/dist/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        $('.ajouter').on('click', function(){

            var id = $(this).attr('data-id');
            var prix = $(this).attr('data-prix');

            var value = $('#id-'+id).val();



            value = parseInt(value)+1;
            var prix_article = parseInt(value)*parseInt(prix);

            $.ajax({
                url: "<?php echo base_url();?>accueil/insert_panier/"+id+"/"+prix,
                dataType: 'json', // JSON
                success: function(json) {

                    // console.log(json);
                    $('#id-'+id).val(value);
                    $('#prix-'+id).html(prix_article);
                    var nb_item = json['data']['nb_article'];
                    var price_item = json['data']['prix_article'];
                    $('#counteur_cart').html(nb_item);
                    $('#total_cart').html(price_item+"<sup>XOF</sup>");
                    $('.sub_total').html(parseInt(price_item));
                    $('.total_cart').html(parseInt(price_item)+2000);
                    Toast.fire({
                        icon: "success",
                        title: "L'operation a été effectué avec succès!!!"
                    });
                }
            });

        });

        $('.reduit').on('click', function(){

            var id = $(this).attr('data-id');
            var prix = $(this).attr('data-prix');


            var value = $('#id-'+id).val();


            if (parseInt(value) === 1){
                return false;
            }

            value = parseInt(value)-1;

            var prix_article = parseInt(value)*parseInt(prix);


            $.ajax({
                url: "<?php echo base_url();?>accueil/reduit_panier/"+id,
                dataType: 'json', // JSON
                success: function(json) {
                    $('#id-'+id).val(value);
                    $('#prix-'+id).html(prix_article);

                    var nb_item = json['data']['nb_article'];
                    var price_item = json['data']['prix_article'];
                    $('#counteur_cart').html(nb_item);
                    $('#total_cart').html(price_item+"<sup>XOF</sup>");
                    $('.sub_total').html(parseInt(price_item));
                    $('.total_cart').html(parseInt(price_item)+2000);
                    Toast.fire({
                        icon: "success",
                        title: "L'operation a été effectué avec succès!!!"
                    });

                    count_panier();
                }
            });

        });
        $('.delete').on('click', function (){
            var id = $(this).attr('data-id');

            Swal.fire({
                title: "Êtes-vous sur ?",
                text: "Vous ne pouvez plus revenir en arrière!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Oui, Supprimer",
                cancelButtonText: "Annuler"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?php echo base_url();?>accueil/delete_panier/"+id,
                        dataType: 'json', // JSON
                        success: function(json) {
                            $('#basicDropdownHover').load("<?php echo base_url('template/panier')?>");
                            count_panier();
                            Swal.fire({
                                title: "Supprimé!!",
                                text: "Votre opération a été effectué",
                                icon: "success"
                            });
                            location.reload();
                            // var data  = JSON.parse(json);
                            // var nb_item = json['data']['nb_article'];
                            // var price_item = json['data']['prix_article'];
                            // $('#counteur_favorite').html(nb_item);
                            // $('#total_cart').html(price_item);
                            // console.log(json['data']);
                            // $('#bs-example-modal-lg').modal('hide');
                            //if(json===true){
                            //    $("#getcontent").load("<?php //echo base_url("administration/solutions/get_solution/")?>//");
                            //    $.growl.notice({ message: "Votre suppression effectuée avec succès !" });
                            //} else {
                            //    $.growl.error({ message: "Echec de l'opération. Reprendre!" });
                            //    return false;
                            //}

                        }
                    });

                }
            });

        })
    })
</script>
