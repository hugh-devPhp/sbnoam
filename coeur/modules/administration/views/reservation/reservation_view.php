<!-- DataTables -->
<link href="<?php echo base_url(); ?>assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
      rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
      rel="stylesheet" type="text/css"/>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-lg">
                        <h4 class="color-r">Liste des reservations</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table id="datatable" class="table table-bordered dt-responsive w-100" style="width:100%">
                            <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>N° commande</th>
                                <th>Nom & prénoms</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Destination</th>
                                <th>Véhicule</th>
                                <th>Debut</th>
                                <th>Fin</th>
                                <th>Initié le</th>
                                <th>Statut</th>
                                <th width="10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            foreach ($reservations as $reservation) :
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td valign="middle">#<?php echo $reservation['numero_reserv']; ?></td>
                                    <td valign="middle"><?php echo $reservation['nom']; ?></td>
                                    <td valign="middle"><?php echo $reservation['email']; ?></td>
                                    <td valign="middle"><?php echo $reservation['telephone']; ?></td>
                                    <td valign="middle"><?php echo $reservation['destination']; ?></td>
                                    <td valign="middle">
                                        <?php
                                        foreach ($autos as $auto) :
                                            if ($auto['id_auto'] == $reservation['id_vehicule']):
                                        ?>
                                                <img src="<?php echo base_url() ?>uploads/vehicules/<?php echo $auto['image_principale_auto']; ?>"
                                                     class="avatar-md" alt="">
                                            <?php
                                        endif;
                                        endforeach;
                                        ?>
                                    </td>
                                    <td valign="middle"><?php echo $reservation['date_debut']; ?></td>
                                    <td valign="middle"><?php echo $reservation['date_fin']; ?></td>
                                    <td valign="middle" style="word-break: break-all;"><?php echo $reservation['date_add'] ; ?></td>
                                    <td valign="middle">
                                        <?php
                                        if ($reservation['statut'] == 'valider'):
                                            ?>
                                            <span class="badge-soft-success"><?php echo $reservation['statut'] ?></span>
                                        <?php
                                        endif;
                                        if ($reservation['statut'] == 'annuler'):
                                            ?>
                                            <span class="badge-soft-danger"><?php echo $reservation['statut'] ?></span>
                                        <?php
                                        endif;
                                        ?>
                                        <?php
                                        if ($reservation['statut'] == 'en cours'):
                                            ?>
                                            <span class="badge-soft-primary"><?php echo $reservation['statut'] ?></span>
                                        <?php
                                        endif;
                                        if ($reservation['statut'] == 'en attente'):
                                            ?>
                                            <span class="badge-soft-warning"><?php echo $reservation['statut'] ?></span>
                                        <?php
                                        endif;
                                        ?>
                                        <?php
                                        if ($reservation['statut'] == 'terminer'):
                                            ?>
                                            <span class="badge-soft-info"><?php echo $reservation['statut'] ?></span>
                                        <?php
                                        endif;
                                        ?>
                                    </td>
                                    <td valign="middle">
                                        <button type="button" class="btn btn-sm btn-success waves-effect waves-light"
                                                onclick="detail('<?php echo $reservation['id_reserv']; ?>')">
                                            <i class="far fa-eye"></i></button>
                                        <?php
                                        if ($reservation['statut'] == 'en attente'):
                                            ?>
                                            <button type="button" title="Accepter la reservation"
                                                    onclick="change_reserv_state('<?php echo $reservation['id_reserv']; ?>', 'valider')"
                                                    class="btn btn-sm btn-success waves-effect waves-light">
                                                <i class="bx bx-check"></i>
                                            </button>
                                            <button type="button"
                                                    onclick="change_reserv_state('<?php echo $reservation['id_reserv']; ?>', 'annuler')"
                                                    class="btn btn-sm btn-danger waves-effect waves-light">
                                                Annuler
                                            </button>
                                        <?php
                                        endif;
                                        if ($reservation['statut'] == 'valider'):
                                            ?>
                                            <button type="button"
                                                    onclick="change_reserv_state('<?php echo $reservation['id_reserv']; ?>', 'en cours')"
                                                    class="btn btn-sm btn-primary waves-effect waves-light">
                                                Récupéré
                                            </button>
                                        <?php
                                        endif;
                                        if ($reservation['statut'] == 'en cours'):
                                            ?>
                                            <button type="button"
                                                    onclick="change_reserv_state('<?php echo $reservation['id_reserv']; ?>', 'terminer')"
                                                    class="btn btn-sm btn-info waves-effect waves-light me-1">
                                                Terminé
                                            </button>
                                        <?php
                                        endif;
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            endforeach;
                            ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<script src="<?php echo base_url() ?>assets/admin/sweetalert2/sweetalert2.all.min.js"></script>


<script>
    // datable js
    $(document).ready(function () {
        $('#datatable').DataTable({
            lengthChange: true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
        });
    });

    function detail(id){
        console.log("id =", id)
        $.ajax({
            url: "<?php echo base_url(); ?>administration/reservation/get_reservation",
            method:'post',
            data: {
                'id_reserv': id,
            },
            dataType:'html',
            success: function(response) {
                $("#getcontent").html(response);
            },
            error: function (e){
                console.log(e);
            }
        })
    }

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