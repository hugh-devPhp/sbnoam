<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="utf-8">
    <link href="<?php base_url() ?>assets/corporate/img/logov.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>gdj-award_lauréats</title>
    <?php
    $this->load->view('admin/layouts/css');
    ?>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/notiflix.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/dataTables.bootstrap4.min.css">
    <link href="<?php echo base_url() ?>assets/admin/css/modal.css" rel="stylesheet">

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
                        Liste des Catégories des awards
                    </h2>
                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                        <a href="<?php echo base_url() ?>add_laureat" class="btn btn-primary shadow-md mr-2">Ajouter</a>
                    </div>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <div class="overflow-x-auto">
                        <table class="table table-bordered table-striped nowrap w-100" id="datatable-demand">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">#</th>
                                    <th>Photo</th>
                                    <th>Nom & Prénom</th>
                                    <th>Niveau</th>
                                    <th>Catégorie</th>
                                    <th>Nombre de vote</th>
                                    <th>Date d'ajout</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($laureates as $laureat) :
                                ?>
                                    <tr class="record">
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="user_pp" class="rounded-full" src="<?php echo base_url() ?>assets/admin/images/laureates/<?php echo $laureat['l_image']; ?>">
                                            </div>
                                        </td>
                                        <td><?php echo $laureat['l_name']; ?></td>
                                        <td><?php echo $laureat['l_level']; ?></td>
                                        <td>
                                            <?php
                                            foreach ($categories as $cat) :
                                                if ($cat['cat_id'] ===  $laureat['award_id']) {
                                            ?>
                                                    <?php echo $cat['cat_name']; ?>
                                            <?php
                                                }
                                            endforeach;
                                            ?>
                                        </td>
                                        <td><?php echo $laureat['nb_vote']; ?></td>
                                        <td><?php echo $laureat['update_at']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>edit_laureates/<?php echo $laureat['l_id']; ?>" class="btn btn-sm tooltip" data-id="<?php echo $laureat['l_id']; ?>" title="Modifier <?php echo $laureat['l_name']; ?>">
                                                <i data-lucide="edit" style="color: orange;"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm sup tooltip" onclick="delete_laureate('<?php echo $laureat['l_id']; ?>')" title="Supprimer <?php echo $laureat['l_name']; ?>">
                                                <i data-lucide="trash-2" style="color: crimson;"></i>
                                            </button>
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
        $("#list_award_menu").addClass('side-menu--active');
        $("#award_menu ~ ul").addClass('side-menu__sub-open');
        $("#award_menu").addClass('side-menu--active');

        $("#locate_link").text('Liste des Lauréats');
    </script>

    <script>
        function delete_laureate(l_id) {
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
                        url: "<?php echo base_url() ?>admin/delete_laureat",
                        method: "post",
                        dataType: "json",
                        data: {
                            l_id: l_id
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
    </script>

</body>

</html>