<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="utf-8">
    <link href="<?php base_url() ?>assets/corporate/img/logov.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>gdj-award_categories</title>
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
                        <a href="#modalx-slideUp" id="modalx_btn_show" class="btn btn-primary shadow-md mr-2 modalx-slideUp_open">Ajouter</a>
                    </div>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <div class="overflow-x-auto">
                        <table class="table table-bordered table-striped nowrap w-100" id="datatable-demand">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">#</th>
                                    <th>Désignation</th>
                                    <th>Description</th>
                                    <th>Nombre lauréat</th>
                                    <th>Nombre Votes</th>
                                    <th>Etat</th>
                                    <th>Date d'ajout</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($categories as $cat) :
                                ?>
                                    <tr class="record">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $cat['cat_name']; ?></td>
                                        <td><?php echo $cat['cat_desc']; ?></td>
                                        <td><?php echo $cat['nb_laureat']; ?></td>
                                        <td><?php echo $cat['nb_votant']; ?></td>
                                        <td>
                                            <?php if ($cat['state'] == 1) { ?>
                                                <button type="button" class="btn btn-sm btn-success-soft tooltip" title="Validée">
                                                    Actif
                                                </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-sm btn-danger-soft tooltip" title="En attente">
                                                    Inactif
                                                </button>
                                            <?php } ?>
                                        <td><?php echo $cat['add_at']; ?></td>
                                        <td>
                                            <a href="#modalx-slideUp" class="modalx-slideUp_open modalx-collect btn btn-sm tooltip" data-id="<?php echo $cat['cat_id']; ?>" title="Modifier <?php echo $cat['cat_name']; ?>">
                                                <i data-lucide="edit" style="color: orange;"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm sup tooltip" onclick="delete_cat('<?php echo $cat['cat_id']; ?>')" title="Supprimer <?php echo $cat['cat_name']; ?>">
                                                <i data-lucide="trash-2" style="color: crimson;"></i>
                                            </button>
                                            <?php if ($cat['state'] == 1) { ?>
                                                <button type="button" class="btn btn-sm float-end tooltip" onclick="disableFun('<?php echo $cat['cat_id']; ?>')" title="Désactiver <?php echo $cat['cat_name']; ?>">
                                                    <i data-lucide="x" style="color: red"></i>
                                                </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-sm float-end tooltip" onclick="enableFun('<?php echo $cat['cat_id']; ?>')" title="Activer <?php echo $cat['cat_name']; ?>">
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
                <!-- modalx lightspeed add cat form -->
                <div id="modalx-slideUp" class="body-modalx hidden">
                    <form action="" id="cat_form">
                        <div class="p-5">
                            <h2 id="mod_title" class="text-lg mb-4 border-b border-slate-200/60 dark:border-darkmode-400">
                                Ajoutez une catégorie</h2>
                            <input type="hidden" id="cat_id" name="cat_id" value>
                            <div class="col-span-6">
                                <label for="cat_name" class="form-label text-primary text-lg">Désignation</label>
                                <div class="flex mt-2 flex-1">
                                    <input type="text" id="cat_name" name="cat_name" required class="form-control" value>
                                </div>
                            </div>
                            <div class="col-span-12">
                                <label for="cat_desc" class="form-label text-primary text-lg">Description</label>
                                <textarea id="cat_desc" name="cat_desc" class="form-control w-full mt-2" rows="5"></textarea>
                            </div>
                        </div>
                        <button class="modalx-slideUp_close btn-close-modalx pull-right" style="background-color: #fa5c5c;">
                            Fermer
                        </button>
                        <button class="btn-close-modalx pull-right" type="submit">Ajouter</button>
                    </form>
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
        $("#cat_menu").addClass('side-menu--active');
        $("#award_menu ~ ul").addClass('side-menu__sub-open');
        $("#award_menu").addClass('side-menu--active');

        $("#locate_link").text('Liste des Catégories');

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
    </script>


    <script src="<?php echo base_url() ?>assets/admin/js/modal.js"></script>
    <script>
        $(document).ready(function() {
            $("#modalx_btn_show").on("click", function(e) {
                $("#cat_id").val('');
                $("#cat_name").val('');
                $("#cat_desc").val('');
                $('#mod_title').text('Ajouter une catégorie');
                return $('#modalx-slideUp').popup({
                    pagecontainer: '.container',
                    transition: 'all 0.5s',
                    background: true,
                    color: '#000',
                    opacity: '0.5',
                });
            });

            $(".modalx-collect").on("click", function(e) {
                var $this = $(this);
                let name = $this.parents(".record").find('td').eq(1).text();
                let desc = $this.parents(".record").find('td').eq(2).text();
                var cat_id = $this.attr('data-id');

                $("#cat_id").val(cat_id);
                $("#cat_name").val(name);
                $("#cat_desc").val(desc);

                $('#mod_title').text('Modifier la catégorie');

                return $('#modalx-slideUp').popup({
                    pagecontainer: '.container',
                    transition: 'all 0.5s',
                    background: true,
                    color: '#000',
                    opacity: '0.5',
                });
            });

        })

        $("#cat_form").submit(function(e) {
            e.preventDefault();
            var $this = $(this);
            var url = '<?php echo base_url('award_categories'); ?>';
            var data = $this.serialize();
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function(response) {
                    if (response === true) {
                        $("#modalx-slideUp").hide();
                        Notiflix.Notify.success('Effectué', {
                            position: 'right-top',
                        }, );
                        setTimeout(() => {
                            location.reload();
                        }, 1000);

                    } else {
                        Notiflix.Notify.failure('echèc', {
                            position: 'right-bottom',
                        }, );
                    }
                },
                error: function() {
                    swal.fire('error');
                }
            });
        });

        function delete_cat(cat_id) {
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
                        url: "<?php echo base_url() ?>delete_award_cat",
                        method: "post",
                        dataType: "json",
                        data: {
                            cat_id: cat_id
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

        function disableFun(cat_id) {
            Swal.fire({
                title: 'Êtes vous sur 🤔!!?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Désactive le!!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: "<?php echo base_url() ?>admin/invalid_award_cat",
                        method: "post",
                        dataType: "json",
                        data: {
                            cat_id: cat_id
                        },
                        success: function(response) {
                            if (response === true) {
                                Notiflix.Notify.success('Désactivé🙂', {
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

        function enableFun(cat_id) {
            Swal.fire({
                title: 'Êtes vous sur 🤔!!?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Active le!!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?php echo base_url() ?>admin/valid_award_cat",
                        method: "post",
                        dataType: "json",
                        data: {
                            cat_id: cat_id
                        },
                        success: function(response) {
                            if (response === true) {
                                Notiflix.Notify.success('Activé👍👍', {
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