<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>gdj-ajout_admin</title>
    <?php
    $this->load->view('admin/layouts/css');
    ?>
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
            <div class="flex items-center mt-8">
                <h2 class="intro-y text-lg font-medium mr-auto">
                    Ajout Administrateur
                </h2>
            </div>

            <div class="intro-y box py-10 sm:py-20 mt-5">
                <div class="px-5 mt-10">
                    <div class="font-medium text-center text-lg">Créer un compte administrateur</div>
                    <div class="text-slate-500 text-center mt-2">Pour commencer, veuillez saisir votre nom
                        d'utilisateur,
                        votre adresse e-mail et mot de passe.
                    </div>
                </div>
                <div id="dom-jqry" class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                    <div class="col-12">
                        <div id="error">

                        </div>
                    </div>
                    <div class="font-medium text-base">Profil Admin</div>
                    <form method="post" id="create_user">
                        <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                            <div class="intro-y col-span-6 sm:col-span-3">
                                <label for="input-wizard-2" class="form-label">Nom d'utilisateur</label>
                                <input id="input-wizard-2" type="text" class="form-control" name="username"
                                       placeholder="Vos prénoms" required>
                            </div>
                            <div class="intro-y col-span-6 sm:col-span-3">
                                <label for="input-wizard-3" class="form-label">Email</label>
                                <input id="input-wizard-3" type="text" class="form-control" name="email"
                                       placeholder="exemple@exple.com" required>
                            </div>
                            <div class="intro-y col-span-6 sm:col-span-3">
                                <label for="input-wizard-4" class="form-label">Adresse</label>
                                <input id="input-wizard-4" type="text" class="form-control" name="address"
                                       placeholder="Ville, pays">
                            </div>
                            <div class="intro-y col-span-6 sm:col-span-3">
                                <label for="input-wizard-7" class="form-label">Genre</label>
                                <select id="input-wizard-7" class="form-select" name="gender">
                                    <option value="M">M</option>
                                    <option value="F">F</option>
                                </select>
                            </div>
                            <div class="intro-y col-span-6 sm:col-span-3">
                                <label for="input-wizard-8" class="form-label">Mot de passe</label>
                                <input id="input-wizard-8" type="password" class="form-control" name="pass"
                                       placeholder="*****" required>
                            </div>
                            <div class="intro-y col-span-6 sm:col-span-3">
                                <label for="input-wizard-9" class="form-label">Confirme mot de passe</label>
                                <input id="input-wizard-9" type="password" class="form-control" name="c_pass"
                                       placeholder="****" required>
                            </div>
                            <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                                <input class="btn btn-primary w-24 ml-2 mr-2" type="submit" value="Créer">
                                <button class="btn btn-secondary w-24" id="clear">Clear</button>
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

    $("#locate_link").text('Ajout utilisateur');


    $(document).ready(function () {
        $('#create_user').submit(function (e) {
            e.preventDefault();
            var url = '<?php echo base_url('add_user'); ?>';
            var data = $(this).serialize();
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                dataType: 'JSON',
                success: function (response) {
                    if (response === true) {
                        $('#create_user')[0].reset();
                        Notiflix.Notify.success('success',
                            {
                                position: 'top-bottom',
                            },
                        );
                    } else {
                        $('#create_user')[0].reset();
                        Notiflix.Notify.failure(response,
                            {
                                position: 'right-bottom',
                            },
                        );

                     }
                },
                error: function () {
                    $('#create_user')[0].reset();
                    swal.fire('error');
                   }
            });
        });

        $('#clear').on('click', function (e) {
            e.preventDefault();
            $(this).closest('form').find("input[type=text], textarea, select").val("");
        })
    });
</script>

</body>
</html>