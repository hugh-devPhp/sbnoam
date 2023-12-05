<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="utf-8">
    <link href="<?php base_url() ?>assets/corporate/img/logov.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>gdj-list_admin</title>
    <?php
    $this->load->view('admin/layouts/css');
    ?>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/notiflix.css"/>
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
                    Liste des utilisateurs
                </h2>
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                    <a href="<?php echo base_url(); ?>add_user" class="btn btn-primary shadow-md mr-2">Ajouter</a>
                </div>
            </div>
            <div class="intro-y box p-5 mt-5">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="whitespace-nowrap">#</th>
                            <th>Nom utilisateur</th>
                            <th>Nom & Prénom</th>
                            <th>Email</th>
                            <th>phone</th>
                            <th>Date ajout</th>
                            <th>Action</th>
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
                                    <a href="<?php echo base_url() ?>edit_user/<?php echo $user['user_id']; ?>"
                                       class="btn edit_user tooltip" data-id="<?php echo $user['user_id']; ?>"
                                       title="Modifier <?php echo $user['username']; ?>">
                                        <i data-lucide="edit" style="color: orangered;"></i>
                                    </a>

                                    <button type="button" class="btn btn-sm sup tooltip"
                                            onclick="delete_user('<?php echo $user['user_id']; ?>')"
                                            title="Supprimer <?php echo $user['username']; ?>">
                                        <i data-lucide="trash-2" style="color: crimson;"></i>
                                    </button>
                                    <?php if ($user['status'] == 1) { ?>
                                        <button type="button" class="btn btn-sm float-end tooltip"
                                                onclick="enableFun('<?php echo $user['user_id']; ?>')"
                                                title="Activez <?php echo $user['username']; ?>">
                                            <i data-lucide="user-x" style="color: red"></i>
                                        </button>
                                    <?php } else { ?>
                                        <button type="button" class="btn btn-sm float-end tooltip"
                                                onclick="disableFun('<?php echo $user['user_id']; ?>')"
                                                title="Désactivez <?php echo $user['username']; ?>">
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

<?php
$this->load->view('admin/layouts/js');
?>

<script src="<?php echo base_url() ?>assets/admin/fontawesome/js/all.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/js/notiflix.js"></script>
<script>
    $('.side-menu').removeClass('side-menu--active');
    $("#user_side_menu").addClass('side-menu--active');
    $("#user_side_menu ~ ul").addClass('side-menu__sub-open');
    $("#user_list_side_menu").addClass('side-menu--active');

    $("#locate_link").text('Liste utilisateurs');

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
                    success: function (response) {
                        if (response === true) {
                            Notiflix.Notify.success('Supprimé👍👍', {
                                position: 'right-bottom',
                            },);
                            window.location.reload();
                        } else {
                            swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'échec 😐!!!'
                            });
                        }
                    },
                    error: function () {
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
                    success: function (response) {
                        if (response === true) {
                            Notiflix.Notify.success('Désactivé🙂', {
                                position: 'right-bottom',
                            },);
                            window.location.reload();
                        } else {
                            swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'échec 😐!!!'
                            });
                        }
                    },
                    error: function () {
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
                    success: function (response) {
                        if (response === true) {
                            Notiflix.Notify.success('Activé👍👍', {
                                position: 'right-bottom',
                            },);
                            window.location.reload();
                        } else {
                            swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'échec 😐!!!'
                            });
                        }
                    },
                    error: function () {
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