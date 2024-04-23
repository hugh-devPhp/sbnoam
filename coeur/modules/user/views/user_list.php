<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>ain4ce-admin</title>
    <?php
    $this->load->view('admin/layouts/css');
    ?>

    <!-- DataTables -->
    <link href="<?php base_url() ?>assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php base_url() ?>assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?php base_url() ?>assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />


</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php
        $this->load->view('admin/layouts/top_bar');
        ?>

        <!-- ========== Left Sidebar Start ========== -->
        <?php
        $this->load->view('admin/layouts/sidebar');
        ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Liste des Administrateurs</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Gestion administrateur</a>
                                        </li>
                                        <li class="breadcrumb-item active">Liste administrateur</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="checkout-tabs">
                        <div class="row">
                            <div class="col-xl-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="admin-pills" role="tabpanel" aria-labelledby="admin-tab">
                                                <div>
                                                    <div class="row mb-3">
                                                        <div class="col-lg">
                                                            <h4 class="color-r">Liste des utilisateurs</h4>
                                                        </div>
                                                        <div class="col-lg  text-end">
                                                            <a href="{% url 'add_admin' %}" type="button" class="btn btn-primary waves-effect waves-light">Ajouter +</a>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <a href="javascript:" class="btn btn-sm btn-danger float-end" id="delete_all_admin">
                                                            <i class="fas fa-trash-alt"></i></a>
                                                        <input class="btn btn-outline-primary form-check-input form-check-success float-end waves-effect waves-light me-2" type="checkbox" name="checkAllAdmin" id="checkAllAdmin">
                                                    </div>
                                                    <table id="datatable-admin" class="table table-bordered dt-responsive  nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Nom & Prénom</th>
                                                                <th>Email</th>
                                                                <th>Mail vérifié</th>
                                                                <th>status</th>
                                                                <th>action</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php
                                                            $i = 1;
                                                            foreach ($users as $user) :
                                                            ?>
                                                                <tr class="">
                                                                    <td><?php echo $i; ?></td>
                                                                    <td>
                                                                        <div class="w-10 h-10 image-fit zoom-in">
                                                                            <img alt="user_pp" class="rounded-full" src="<?php if ($user['picture']) {
                                                                                                                                echo base_url(); ?>assets/admin/images/users/<?php echo $user['picture'];
                                                                                                                                                                            } else {
                                                                                                                                                                                echo base_url(); ?>assets/admin/images/users/user.png<?php } ?>">
                                                                        </div>
                                                                        <?php echo $user['username']; ?>
                                                                    </td>
                                                                    <td><?php echo $user['name']; ?></td>
                                                                    <td><?php echo $user['email']; ?></td>
                                                                    <td><?php echo $user['phone']; ?></td>
                                                                    <td><?php echo $user['create_at']; ?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url() ?>edit_user/<?php echo $user['user_id']; ?>" class="btn edit_user tooltip" data-id="<?php echo $user['user_id']; ?>" title="Modifier <?php echo $user['username']; ?>">
                                                                            <i data-lucide="edit" style="color: orangered;"></i>
                                                                        </a>

                                                                        <button type="button" class="btn btn-sm sup tooltip" onclick="delete_user('<?php echo $user['user_id']; ?>')" title="Supprimer <?php echo $user['username']; ?>">
                                                                            <i data-lucide="trash-2" style="color: crimson;"></i>
                                                                        </button>
                                                                        <?php if ($user['status'] == 1) { ?>
                                                                            <button type="button" class="btn btn-sm float-end tooltip" onclick="enableFun('<?php echo $user['user_id']; ?>')" title="Activez <?php echo $user['username']; ?>">
                                                                                <i data-lucide="user-x" style="color: red"></i>
                                                                            </button>
                                                                        <?php } else { ?>
                                                                            <button type="button" class="btn btn-sm float-end tooltip" onclick="disableFun('<?php echo $user['user_id']; ?>')" title="Désactivez <?php echo $user['username']; ?>">
                                                                                <i data-lucide="user-check" style="color: deepskyblue"></i>
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
                            </div>
                        </div>
                    </div>
                </div><!-- container-fluid -->
            </div>
            <?php
            $this->load->view('admin/layouts/footer');
            ?>
        </div>
    </div>
    <?php
    $this->load->view('admin/layouts/js');
    ?>


    <!-- Responsive examples -->
    <script src="<?php base_url() ?>assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php base_url() ?>assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable-admin').DataTable({
                lengthChange: true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                }
            });
        });
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

        function delete_user(user_id) {
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
                        url: "<?php echo base_url() ?>delete_user",
                        method: "post",
                        dataType: "json",
                        data: {
                            user_id: user_id
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

        function disableFun(user_id) {
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
                        url: "<?php echo base_url() ?>user/desable",
                        method: "post",
                        dataType: "json",
                        data: {
                            user_id: user_id
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

        function enableFun(user_id) {
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
                        url: "<?php echo base_url() ?>user/enable",
                        method: "post",
                        dataType: "json",
                        data: {
                            user_id: user_id
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