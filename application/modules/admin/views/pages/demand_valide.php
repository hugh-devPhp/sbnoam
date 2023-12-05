<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="utf-8">
    <link href="<?php base_url() ?>assets/corporate/img/logov.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>gdj-liste_validées</title>
    <?php
    $this->load->view('admin/layouts/css');
    ?>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/notiflix.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/dataTables.bootstrap4.min.css">
</head>

<body class="main">
    <?php
    $this->load->view('admin/layouts/mobile_menu');
    ?>

    <?php
    $this->load->view('admin/layouts/top_bar');
    ?>


    <div class="wrapper">
        <div class="wrapper-box">
            <?php
            $this->load->view('admin/layouts/sidebar');
            ?>
            <div class="content">
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Liste des demandes validées
                    </h2>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <div class="overflow-x-auto">
                        <table class="table table-bordered table-striped nowrap w-100" id="datatable-demand">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">#</th>
                                    <th>Nom & Prénom</th>
                                    <th>Email</th>
                                    <th>Couleur pref</th>
                                    <th>téléphone</th>
                                    <th>Etat</th>
                                    <th>Adresse</th>
                                    <th>Type ticket</th>
                                    <th>Contact dépôt</th>
                                    <th>ID transaction</th>
                                    <th>montant</th>
                                    <th>Nb ticket</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($demands as $demand) :
                                ?>
                                    <tr class="">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $demand['name']; ?></td>
                                        <td><?php echo $demand['email']; ?></td>
                                        <td><?php echo $demand['couleur']; ?></td>
                                        <td><?php echo $demand['contact']; ?></td>
                                        <td>
                                            <?php if ($demand['state'] == 1) { ?>
                                                <button type="button" class="btn btn-sm btn-success tooltip" title="Validée">
                                                    Validée
                                                </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-sm btn-warning tooltip" title="En attente">
                                                    En attente
                                                </button>
                                            <?php } ?>
                                        </td>
                                        <td><?php echo $demand['address']; ?></td>
                                        <td><?php echo $demand['type_demand']; ?></td>
                                        <td>0<?php echo $demand['contact_depot']; ?></td>
                                        <td><?php echo $demand['ref']; ?></td>
                                        <td><?php echo $demand['montant']; ?></td>
                                        <td><?php echo $demand['nb_ticket']; ?></td>
                                        <td><?php echo $demand['date']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-sm sup tooltip" onclick="delete_user('<?php echo $demand['id_demand']; ?>')" title="Supprimer <?php echo $demand['name']; ?>">
                                                <i data-lucide="trash-2" style="color: crimson;"></i>
                                            </button>
                                            <?php if ($demand['state'] == 1) { ?>
                                                <button type="button" class="btn btn-sm float-end tooltip" onclick="disableFun('<?php echo $demand['id_demand']; ?>')" title="Invalider <?php echo $demand['name']; ?>">
                                                    <i data-lucide="x" style="color: red"></i>
                                                </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-sm float-end tooltip" onclick="enableFun('<?php echo $demand['id_demand']; ?>')" title="Valider <?php echo $demand['name']; ?>">
                                                    <i data-lucide="check" style="color: deepskyblue"></i>
                                                </button>
                                            <?php } ?>
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

    <?php
    $this->load->view('admin/layouts/js');
    ?>

    <script src="<?php echo base_url() ?>assets/admin/fontawesome/js/all.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/notiflix.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/datatables.init.js"></script>
    <script>
        var table_sorti = $('#datatable-demand').DataTable({
            lengthChange: true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
        });
    </script>
    <script>
        $('.side-menu').removeClass('side-menu--active');
        $("#about_menu").addClass('side-menu--active');
        $("#pages_menu ~ ul").addClass('side-menu__sub-open');
        $("#pages_menu").addClass('side-menu--active');

        $("#locate_link").text('Liste demandes');

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        function delete_user(id_demand) {
            Swal.fire({
                title: 'Êtes vous sur 🤔!!?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui svp!!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?php echo base_url() ?>admin/delete_demand",
                        method: "post",
                        dataType: "json",
                        data: {
                            id_demand: id_demand
                        },
                        success: function(response) {
                            if (response === true) {
                                Notiflix.Notify.success('Supprimé👍👍', {
                                    position: 'right-bottom',
                                }, );
                                window.location.reload();
                            } else {
                                swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'échec 😐!!!'
                                });
                            }
                        },
                        error: function() {
                            swal.fire("Quelque chose à mal fonctionné veuillez réessayez s'il vous plait. " +
                                "Si le problème persiste veillez contacter l'administrateur.");
                        }
                    });
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Annulé'
                    })
                }
            })
        }

        function disableFun(id_demand) {
            Swal.fire({
                title: 'Êtes vous sur 🤔!!?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui!!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: "<?php echo base_url() ?>admin/invalid",
                        method: "post",
                        dataType: "json",
                        data: {
                            id_demand: id_demand
                        },
                        success: function(response) {
                            if (response === true) {
                                Notiflix.Notify.success('Invalidée🙂', {
                                    position: 'right-bottom',
                                }, );
                                window.location.reload();
                            } else {
                                swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'échec 😐!!!'
                                });
                            }
                        },
                        error: function() {
                            swal.fire("Quelque chose à mal fonctionné veuillez réessayez s'il vous plait. " +
                                "Si le problème persiste veillez contacter l'administrateur.");
                        }
                    });
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Annulé'
                    })
                }
            })
        }

        function enableFun(id_demand) {
            Swal.fire({
                title: 'Êtes vous sur 🤔!!?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui!!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?php echo base_url() ?>admin/valid",
                        method: "post",
                        dataType: "json",
                        data: {
                            id_demand: id_demand
                        },
                        success: function(response) {
                            if (response === true) {
                                Notiflix.Notify.success('Validée👍👍', {
                                    position: 'right-bottom',
                                }, );
                                window.location.reload();
                            } else {
                                swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'échec 😐!!!'
                                });
                            }
                        },
                        error: function() {
                            swal.fire("Quelque chose à mal fonctionné veuillez réessayez s'il vous plait. " +
                                "Si le problème persiste veillez contacter l'administrateur.");
                        }
                    });
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Annulé'
                    })
                }
            })
        }
    </script>

</body>

</html>