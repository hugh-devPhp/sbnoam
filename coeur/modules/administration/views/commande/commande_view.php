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
                        <h4 class="color-r">Liste des commandes</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table id="datatable" class="table table-bordered dt-responsive w-100" style="width:100%">
                            <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Nom & prénoms</th>
                                <th>N° commande</th>
                                <th>Contact</th>
                                <th>Montant</th>
                                <th>Mode livraison</th>
                                <th>Initié le</th>
                                <th>Statut</th>
                                <th width="10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            foreach ($commandes as $commande) :
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td valign="middle"><?php echo $commande['nom_recepteur']; ?></td>
                                    <td valign="middle"><?php echo $commande['numero_commande']; ?></td>
                                    <td valign="middle"><?php echo $commande['contact_recepteur']; ?></td>
                                    <td valign="middle"><?php echo number_format($commande['montant_commande'], 0, ',', ' '); ?>
                                        FCFA
                                    </td>
                                    <td valign="middle"><?php echo $commande['description_livraison']; ?></td>
                                    <td valign="middle"><?php echo $commande['date_commande']; ?></td>
                                    <td valign="middle">
                                        <?php
                                        if ($commande['statut_comande'] == 'annuler'):
                                            ?>
                                            <span class="badge-soft-danger"><?php echo $commande['statut_comande'] ?></span>
                                        <?php
                                        endif;
                                        ?>
                                        <?php
                                        if ($commande['statut_comande'] == 'en cours'):
                                            ?>
                                            <span class="badge-soft-primary"><?php echo $commande['statut_comande'] ?></span>
                                        <?php
                                        endif;
                                        if ($commande['statut_comande'] == 'en attente'):
                                            ?>
                                            <span class="badge-soft-warning"><?php echo $commande['statut_comande'] ?></span>
                                        <?php
                                        endif;
                                        ?>
                                        <?php
                                        if ($commande['statut_comande'] == 'livrer'):
                                            ?>
                                            <span class="badge-soft-info"><?php echo $commande['statut_comande'] ?></span>
                                        <?php
                                        endif;
                                        ?>
                                    </td>
                                    <td valign="middle">
                                        <button type="button" class="btn btn-sm btn-success detail"
                                                data-id="<?php echo $commande['id_commande']; ?>">
                                            <i class="far fa-eye"></i></button>
                                        <?php
                                        if ($commande['statut_comande'] == 'en attente'):
                                            ?>
                                            <button type="button" title="Accepter la commande"
                                                    onclick="change_cmd_state('<?php echo $commande['id_commande']; ?>', 'en cours')"
                                                    class="btn btn-sm btn-success waves-effect waves-light">
                                                <i class="bx bx-check"></i>
                                            </button>
                                            <button type="button"
                                                    onclick="change_cmd_state('<?php echo $commande['id_commande']; ?>', 'annuler')"
                                                    class="btn btn-sm btn-danger waves-effect waves-light">
                                                Annuler
                                            </button>
                                        <?php
                                        endif;
                                        if ($commande['statut_comande'] == 'en cours'):
                                            ?>
                                            <button type="button"
                                                    onclick="change_cmd_state('<?php echo $commande['id_commande']; ?>', 'livrer')"
                                                    class="btn btn-sm btn-primary waves-effect waves-light">
                                                livré
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

    $('.detail').on('click', function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url: "<?php echo base_url(); ?>administration/commandes/get_commande_detail",
            method: 'post',
            data: {
                'id_commande': id,
            },
            dataType: 'html',
            success: function (response) {
                $("#getcontent").html(response);
            },
            error: function (e) {
                console.log(e);
            }
        })
    })

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