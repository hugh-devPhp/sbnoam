<!-- Bootstrap Css -->
<link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="<?php echo base_url(); ?>assets/admin/css/icons.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url(); ?>assets/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="invoice-title">
                    <h4 class="float-end font-size-16">Reservation # <?php echo $reservation[0]['numero_reserv'] ?></h4>
                    <div class="mb-4">
                        <img src="<?php echo base_url() ?>assets/front-end/img/logo.png" alt="logo" height="60"/>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <address>
                            <strong>Reservation pour:</strong><br>
                            <?php echo $reservation[0]['nom'] ?><br>
                            <?php echo $reservation[0]['address'] ?><br>
                            <?php echo $reservation[0]['telephone'] ?><br>
                            <?php echo $reservation[0]['email'] ?>
                        </address>
                    </div>
                    <div class="col-sm-6 text-sm-end">
                        <address class="mt-2 mt-sm-0">
                            <strong>Réservé chez:</strong><br>
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
                            <strong>Method de paiement:</strong><br>
                            <?php echo $reservation[0]['moyen_paiement'] ?><br>
                        </address>
                    </div>
                    <div class="col-sm-6 mt-3 text-sm-end">
                        <address>
                            <strong>Date reservation:</strong><br>
                            <?php echo $reservation[0]['date_add'] ?><br><br>
                        </address>
                    </div>
                </div>
                <div class="py-2 mt-3">
                    <h3 class="font-size-15 fw-bold">Detail de la reservation</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-nowrap">
                        <thead>
                        <tr>
                            <th>Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="3">
                                <div class="bg-soft p-2 rounded">
                                    <h5 class="font-size-14 text-primary mb-0">
                                        <i class="fas fa-shipping-fast me-2"></i>
                                        Destination <span class="float-end"><?php echo $reservation[0]['destination'] ?></span>
                                    </h5>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="bg-soft p-2 rounded">
                                    <h5 class="font-size-14 text-primary mb-0">
                                        Date debut <span class="float-end"><?php echo $reservation[0]['date_debut'] ?></span>
                                    </h5>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="bg-soft p-2 rounded">
                                    <h5 class="font-size-14 text-primary mb-0">
                                        Date fin <span class="float-end"><?php echo $reservation[0]['date_fin'] ?></span>
                                    </h5>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Véhicule
                                <i class="fas fa-shipping-fast me-2"></i>
                            </th>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="bg-soft p-2 rounded">
                                    <h5 class="font-size-14 text-primary mb-0">
                                        Marque <span class="float-end"><?php echo $marque['code_marque'] ?></span>
                                    </h5>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="bg-soft p-2 rounded">
                                    <h5 class="font-size-14 text-primary mb-0">
                                        Model <span class="float-end"><?php echo $model['code_model'] ?></span>
                                    </h5>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="bg-soft p-2 rounded">
                                    <h5 class="font-size-14 text-primary mb-0">
                                        images <span class="float-end">
                                            <img width="100px" src="<?php echo base_url(); ?>/uploads/vehicules/<?php echo $vehicule['image_principale_auto'] ?>" alt="">
                                            <?php
                                            foreach ($vehicule['images'] as $auto):
                                            ?>
                                                <img width="100px" src="<?php echo base_url(); ?>/uploads/vehicules/<?php echo $auto['image_auto'] ?>" alt="">
                                            <?php
                                            endforeach;
                                            ?>
                                        </span>
                                    </h5>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="border-0 text-end">
                                <strong>Prix</strong></td>
                            <td class="border-0 text-end">
                                <h4 class="m-0"><?php echo number_format($reservation[0]['prix_reserv'], 0, ',', ' '); ?> FCFA</h4>
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
                        if ($reservation[0]['statut'] == 'en attente'):
                            ?>
                            <button type="button"
                                    onclick="change_reserv_state('<?php echo $reservation[0]['id_reserv']; ?>', 'valider')"
                                    class="btn btn-success w-md waves-effect waves-light me-2">
                                Valider
                            </button>
                            <button type="button"
                                    onclick="change_reserv_state('<?php echo $reservation[0]['id_reserv']; ?>', 'annuler')"
                                    class="btn btn-danger w-md waves-effect waves-light me-2">
                                Annuler
                            </button>
                        <?php
                        endif;
                        if ($reservation[0]['statut'] == 'valider'):
                            ?>
                            <button type="button"
                                    onclick="change_reserv_state('<?php echo $reservation[0]['id_reserv']; ?>', 'en cours')"
                                    class="btn btn-primary waves-effect waves-light me-2">
                                Récupéré
                            </button>
                        <?php
                        endif;
                        if ($reservation[0]['statut'] == 'en cours'):
                            ?>
                            <button type="button"
                                    onclick="change_reserv_state('<?php echo $reservation[0]['id_reserv']; ?>', 'terminer')"
                                    class="btn btn-info waves-effect waves-light me-2">
                                Terminé
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
    function change_reserv_state(id_reserv, statut) {
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
                    url: "<?php echo base_url(); ?>administration/reservation/edit_reserv_state",
                    method: "post",
                    dataType: "json",
                    data: {
                        id_reserv: id_reserv,
                        statut: statut
                    },
                    success: function (response) {
                        if (response === true) {
                            $("#getcontent").load("<?php echo base_url("administration/reservation/get_reservations") ?>");
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
