<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="utf-8">
    <link href="<?php base_url() ?>assets/corporate/img/logov.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>gdj-modifier_admin</title>
    <?php
    $this->load->view('admin/layouts/css');
    ?>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/notiflix.css" />
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
                <div class="flex items-center mt-8">
                    <h2 class="intro-y text-lg font-medium mr-auto">
                        Modification du profil <?php echo $user['username']; ?>
                    </h2>
                </div>

                <div class="intro-y box py-10 sm:py-20 mt-5">
                    <div class="px-5 mt-10">
                        <div class="font-medium text-center text-lg">Modifier ce compte.</div>
                        <div class="text-slate-500 text-center mt-2">Pour commencer, veuillez saisir le nom d'utilisateur,
                            l'adresse e-mail et le mot de passe.
                        </div>
                    </div>
                    <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                        <div class="font-medium text-base">Profil Admin</div>
                        <form method="post" id="edit_user">
                            <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                                <input type="text" hidden name="user_id" value="<?php echo $user['user_id']; ?>">
                                <div class="intro-y col-span-12 sm:col-span-3">
                                    <label for="input-wizard-2" class="form-label">Nom d'utilisateur</label>
                                    <input id="input-wizard-2" type="text" class="form-control" name="username" placeholder="Vos prénoms" value="<?php echo $user['username']; ?>">
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-3">
                                    <label for="input-wizard-3" class="form-label">Email</label>
                                    <input id="input-wizard-3" type="text" class="form-control" name="email" placeholder="exemple@exple.com" value="<?php echo $user['email']; ?>">
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-3">
                                    <label for="input-wizard-4" class="form-label">Nom & prénom</label>
                                    <input id="input-wizard-4" type="text" class="form-control" name="first_name" placeholder="nom & prénom" value="<?php echo $user['name']; ?>">
                                </div>
                                <div class="intro-y col-span-6 sm:col-span-3">
                                    <label for="input-wizard-6" class="form-label">Adresse</label>
                                    <input id="input-wizard-6" type="text" class="form-control" name="address" placeholder="Ville, pays" value="<?php echo $user['address']; ?>">
                                </div>
                                <div class="intro-y col-span-6 sm:col-span-3">
                                    <label for="input-wizard-7" class="form-label">Genre</label>
                                    <select id="input-wizard-7" class="form-select" name="gender">
                                        <option value="<?php echo $user['gender']; ?>"><?php echo $user['gender']; ?></option>
                                        <option value="M">M</option>
                                        <option value="F">F</option>
                                    </select>
                                </div>
                                <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                                    <input class="btn btn-primary w-24 ml-2" type="submit" value="Modifier">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $this->load->view('admin/layouts/js');
    ?>

    <script src="<?php echo base_url() ?>assets/admin/js/notiflix.js"></script>

    <script>
        $('.side-menu').removeClass('side-menu--active');
        $("#user_side_menu").addClass('side-menu--active');
        $("#user_side_menu ~ ul").addClass('side-menu__sub-open');
        $("#add_admin_side_menu").addClass('side-menu--active');

        $("#locate_link").text('Modifier Utilisateur');


        $(document).ready(function() {
            $('#edit_user').submit(function(e) {
                e.preventDefault();
                var url = '<?php echo base_url() ?>user/update_user';
                var data = $(this).serialize();
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    dataType: 'JSON',
                    success: function(response) {
                        if (response === true) {
                            Swal.fire(
                                'Succès!',
                                'Utilisateur modifié!',
                                'success'
                            ).then((result) => {
                                if (result) {
                                    window.location.reload();
                                }
                            })
                        } else if (response === false) {
                            Swal.fire(
                                'Echèc!',
                                'Utilisateur non modifié!',
                                'error'
                            )
                        } else {
                            console.log('message js :', response);
                            Notiflix.Notify.failure(
                                response, {
                                    timeout: 5000,
                                });
                        }
                    },
                    error: function() {
                        window.location.reload();
                    }
                });
            });
        });
    </script>

</body>

</html>