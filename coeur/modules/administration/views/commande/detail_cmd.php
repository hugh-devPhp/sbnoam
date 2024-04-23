<!-- Bootstrap Css -->
<link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="<?php echo base_url(); ?>assets/admin/css/icons.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url(); ?>assets/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body px-4">
                <div class="invoice-title">
                    <h4 class="float-end font-size-16">Commandes #<?php echo $commande[0]['numero_commande'] ?></h4>
                    <div class="mb-4">
                        <img src="<?php echo base_url() ?>assets/front-end/img/logo.png" alt="logo" height="60"/>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <address>
                            <strong>Commande pour:</strong><br>
                            <?php echo $commande[0]['nom_recepteur'] ?><br>
                            <?php echo $commande[0]['ville_recepteur'] ?>, <?php echo $commande[0]['commune_recepteur'] ?>, <?php echo $commande[0]['quartier_recepteur'] ?><br>
                            <?php echo $commande[0]['contact_recepteur'] ?><br>
                        </address>
                    </div>
                    <div class="col-sm-6 text-sm-end">
                        <address class="mt-2 mt-sm-0">
                            <strong>Commandé chez:</strong><br>
                            Ivoire lagune service<br>
                            Port-Bouët<br>
                            Abidjan, Côte d'Ivoire<br>
                            +225 05 05 56 56 56
                        </address>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mt-3">
                        <address>
                            <strong>Methode de livraison:</strong><br>
                            <?php echo $commande[0]['mode_livraison'] ?><br>
                        </address>
                    </div>
                    <div class="col-sm-6 mt-3 text-sm-end">
                        <address>
                            <strong>Date commande:</strong><br>
                            <?php
                            // Créer un objet DateTime à partir de la date d'entrée
                            $date_objet = new DateTime($commande[0]['date_commande']);

                            // Formater la date dans le nouveau format
                            $date_sortie = $date_objet->format('d-m-Y à H:i:s');
                            echo $date_sortie;

                            ?><br><br>
                        </address>
                    </div>
                </div>
                <div class="py-2 mt-3">
                    <h3 class="font-size-15 fw-bold">Detail de la commande</h3>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0 table-nowrap">
                        <thead class="table-light">
                        <tr>
                            <th scope="col">Produit</th>
                            <th scope="col">Description</th>
                            <th scope="col">prix</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($commande_detail as $item):
                        ?>
                        <tr>
                            <th scope="row">
                                <img src="<?php echo base_url();?>uploads/articles/<?php echo $item['image_article']; ?>" alt="product-img" title="product-img" class="avatar-md">
                            </th>
                            <td>
                                <h5 class="font-size-14 text-truncate">
                                    <a href="#" class="text-dark">
                                        <?php echo $item['designation_article']; ?>
                                    </a>
                                    <p class="text-muted mb-0"> x<?php echo $item['quantite_article']; ?></p>
                                </h5>
                            </td>
                            <td><?php echo number_format($item['prix'], 0, ',', ' '); ?> XOF</td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                        <tr>
                            <td colspan="2">
                                <h6 class="m-0 text-end">Prix Total:</h6>
                            </td>
                            <td>
                                <?php echo number_format($commande[0]['montant_commande'], 0, ',', ' '); ?> XOF
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="border-0 text-end">
                                <strong>Signature client</strong></td>
                            <td class="text-end">
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
                <div class="d-print-none">
                    <div class="float-end">
                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                        <?php
                        if ($commande[0]['statut_comande'] == 'en attente'):
                            ?>
                            <button type="button"
                                    onclick="change_cmd_state('<?php echo $commande[0]['id_commande']; ?>', 'en cours')"
                                    class="btn btn-success w-md waves-effect waves-light me-2">
                                Valider
                            </button>
                            <button type="button"
                                    onclick="change_cmd_state('<?php echo $commande[0]['id_commande']; ?>', 'annuler')"
                                    class="btn btn-danger w-md waves-effect waves-light me-2">
                                Annuler
                            </button>
                        <?php
                        endif;
                        if ($commande[0]['statut_comande'] == 'en cours'):
                            ?>
                            <button type="button"
                                    onclick="change_cmd_state('<?php echo $commande[0]['id_commande']; ?>', 'livrer')"
                                    class="btn btn-primary waves-effect waves-light me-2">
                                Livré
                            </button>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="<?php echo base_url() ?>assets/admin/sweetalert2/sweetalert2.all.min.js"></script>
<script>
    function change_cmd_state(id_commande, statut_comande) {
        Swal.fire({
            title: 'Êtes vous sur?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo base_url(); ?>administration/commandes/edit_cmd_state",
                    method: "post",
                    dataType: "json",
                    data: {
                        id_commande: id_commande,
                        statut_comande: statut_comande
                    },
                    success: function (response) {
                        if (response === true) {
                            $("#getcontent").load("<?php echo base_url("administration/commandes/get_commandes") ?>");
                            Notiflix.Notify.success('succès.',
                                {
                                    position: 'right-bottom',
                                },
                            );
                        } else {
                            Notiflix.Loading.remove();
                            console.log(response);
                            swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response,
                            });
                        }
                    },
                    error: function (e) {
                        Notiflix.Loading.remove();
                        console.log(e);
                        swal.fire("Quelque chose à mal fonctionné veuillez réessayez s'il vous plait. " +
                            "Si le problème persiste veillez contacter l'administrateur.");
                    }
                });
            } else {
                swal.fire({
                    icon: 'error',
                    title: 'Annulé'
                })
            }
        })
    }
</script>
