<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="utf-8">
    <link href="<?php base_url() ?>assets/corporate/img/logov.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>gdj-ajout_admin</title>
    <?php
    $this->load->view('admin/layouts/css');
    ?>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/notiflix.css" />
    <style>
        h1 small {
            display: block;
            font-size: 15px;
            padding-top: 8px;
            color: gray;
        }

        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 20px auto;
        }

        .avatar-upload .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
        }

        .avatar-upload .avatar-edit input {
            display: None;
        }

        .avatar-upload .avatar-edit input+label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #FFFFFF;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }

        .avatar-upload .avatar-edit input+label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }

        .avatar-upload .avatar-edit input+label:after {
            content: "\f040";
            font-family: 'FontAwesome';
            color: #757575;
            position: absolute;
            top: 10px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }

        .avatar-upload .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }

        .avatar-upload .avatar-preview>div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
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
                <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Mon profil
                    </h2>
                </div>
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: Profile Menu -->
                    <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
                        <div class="intro-y box mt-5">
                            <div class="relative flex items-center p-5">
                                <div class="w-12 h-12 image-fit">
                                    <img alt="user_pp" class="rounded-full" src="<?php if ($this->session->userdata('picture')) {
                                                                                        echo base_url(); ?>assets/admin/images/users/<?php echo $this->session->userdata('picture');
                                                                                                                                    } else {
                                                                                                                                        echo base_url(); ?>assets/admin/images/users/user.png<?php } ?>">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium text-base"><?php echo $this->session->userdata('name') ?></div>
                                    <div class="text-slate-500">Administrateur</div>
                                </div>
                            </div>
                            <div class="preview p-5 border-t border-slate-200/60">
                                <ul class="nav-tabs" role="tablist">
                                    <li id="data_perso" class="nav-item flex-1" role="presentation">
                                        <a class="nav-link flex items-center active" data-tw-toggle="pill" data-tw-target="#data_perso_tab" role="tab" href="javascript:">
                                            <i data-lucide="activity" class="w-4 h-4 mr-2"></i>
                                            Personal Information
                                        </a>
                                    </li>
                                    <li id="data_setting" class="nav-item flex-1" role="presentation">
                                        <a class="nav-link flex items-center mt-5" data-tw-toggle="pill" data-tw-target="#data_setting_tab" role="tab" href="javascript:">
                                            <i data-lucide="settings" class="w-4 h-4 mr-2"></i>
                                            Paramètre
                                        </a>
                                    </li>
                                    <li id="change_psd_nav" class="nav-item flex-1" role="presentation">
                                        <a class="nav-link flex items-center mt-5" data-tw-toggle="pill" data-tw-target="#change_psd_tab" role="tab" href="javascript:">
                                            <i data-lucide="lock" class="w-4 h-4 mr-2"></i>
                                            Changer mot de passe
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END: Profile Menu -->
                    <div class="tab-content col-span-12 lg:col-span-8 2xl:col-span-9">
                        <div id="data_perso_tab" class="tab-pane box lg:mt-5 p-5 active" role="tabpanel" aria-labelledby="data_perso">
                            <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
                                <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                                    <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                                        <img alt="" class="rounded-full" src="<?php if ($this->session->userdata('picture')) {
                                                                                    echo base_url(); ?>assets/admin/images/users/<?php echo $this->session->userdata('picture');
                                                                                                                                } else {
                                                                                                                                    echo base_url(); ?>assets/admin/images/users/user.png<?php } ?>">
                                        <div class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-primary rounded-full p-2">
                                            <i class="w-4 h-4 text-white" data-lucide="camera"></i>
                                        </div>
                                    </div>
                                    <div class="ml-5">
                                        <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">
                                            <?php echo $this->session->userdata('name') ?>
                                        </div>
                                        <div class="text-slate-500">Administrateur</div>
                                    </div>
                                </div>
                                <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                                    <div class="font-medium text-center lg:text-left lg:mt-3">Contact Details</div>
                                    <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                                        <div class="truncate sm:whitespace-normal flex items-center">
                                            <i data-lucide="mail" class="w-4 h-4 mr-2"></i>
                                            <?php echo $this->session->userdata('email') ?>
                                        </div>
                                        <div class="truncate sm:whitespace-normal flex items-center mt-3">
                                            <i data-lucide="map-pin" class="w-4 h-4 mr-2"></i>
                                            <?php echo $this->session->userdata('address') ?>
                                        </div>
                                        <div class="truncate sm:whitespace-normal flex items-center mt-3">
                                            <i data-lucide="user" class="w-4 h-4 mr-2"></i>
                                            <?php echo $this->session->userdata('gender') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="data_setting_tab" class="tab-pane leading-relaxed box lg:mt-5 p-5" role="tabpanel" aria-labelledby="data_setting">
                            <form method="post" id="edit_user" enctype="multipart/form-data">
                                <div class="intro-y col-span-12 sm:col-span-3">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' name="picture" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview"
                                                 style="background-image: url('<?php if ($this->session->userdata('picture')) {
                                                     echo base_url(); ?>assets/admin/images/users/<?php echo $this->session->userdata('picture');
                                                 } else {
                                                     echo base_url(); ?>assets/admin/images/users/user.png<?php } ?>')">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                                    <input type="text" hidden name="user_id" value="<?php echo $this->session->userdata('user_id') ?>">
                                    <div class="intro-y col-span-12 sm:col-span-3">
                                        <label for="input-wizard-2" class="form-label">Nom d'utilisateur</label>
                                        <input id="input-wizard-2" type="text" class="form-control" name="username" placeholder="username" value="<?php echo $this->session->userdata('username') ?>">
                                    </div>
                                    <div class="intro-y col-span-12 sm:col-span-3">
                                        <label for="input-wizard-3" class="form-label">Email</label>
                                        <input id="input-wizard-3" type="text" class="form-control" name="email" placeholder="exemple@exple.com" value="<?php echo $this->session->userdata('email') ?>">
                                    </div>
                                    <div class="intro-y col-span-12 sm:col-span-3">
                                        <label for="input-wizard-4" class="form-label">Nom & Prénoms</label>
                                        <input id="input-wizard-4" type="text" class="form-control" name="name" placeholder="Nom $ prénoms" value="<?php echo $this->session->userdata('name') ?>">
                                    </div>
                                    <div class="intro-y col-span-6 sm:col-span-3">
                                        <label for="input-wizard-6" class="form-label">Adresse</label>
                                        <input id="input-wizard-6" type="text" class="form-control" name="address" placeholder="Ville, pays" value="<?php echo $this->session->userdata('address') ?>">
                                    </div>
                                    <div class="intro-y col-span-6 sm:col-span-3">
                                        <label for="input-wizard-8" class="form-label">Contact</label>
                                        <input id="input-wizard-8" type="text" class="form-control" name="phone" placeholder="Ville, pays" value="<?php echo $this->session->userdata('phone') ?>">
                                    </div>
                                    <div class="intro-y col-span-6 sm:col-span-3">
                                        <label for="input-wizard-7" class="form-label">Genre</label>
                                        <select id="input-wizard-7" class="form-select" name="gender">
                                            <option value="<?php echo $this->session->userdata('gender') ?>"><?php echo $this->session->userdata('gender') ?></option>
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
                        <!-- BEGIN: Change Password -->
                        <div id="change_psd_tab" class="tab-pane box lg:mt-5" role="tabpanel" aria-labelledby="change_psd_nav">
                            <div class="flex items-center p-5 border-b border-slate-200/60">
                                <h2 class="font-medium text-base mr-auto">
                                    Changez votre mot de passe
                                </h2>
                            </div>
                            <div class="p-5">
                                <form action="" id="change_psd">
                                    <label for="change-password-form-1" class="">Ancien mot de passe</label>
                                    <div class="input-group  mb-3">
                                        <input id="change-password-form-1" type="password" class="form-control" placeholder="********" name="old_password" required>
                                        <button class="input-group-text btn" type="button">
                                            <i id="old_psd" class="fa fa-eye"></i></button>
                                    </div>
                                    <label for="change-password-form-2" class="">Nouveau mot de passe</label>
                                    <div class="input-group mb-3">
                                        <input id="change-password-form-2" type="password" class="form-control" placeholder="*********" name="new_password" required>
                                        <button class="input-group-text btn" type="button">
                                            <i id="new_psd" class="fa fa-eye"></i></button>
                                    </div>
                                    <label for="change-password-form-3" class="">Confirmer mot de passe</label>
                                    <div class="input-group">
                                        <input id="change-password-form-3" type="password" class="form-control" placeholder="*********" name="confirm_new_password" required>
                                        <button class="input-group-text btn" type="button">
                                            <i id="c_new_psd" class="fa fa-eye"></i></button>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Changer</button>
                                </form>
                            </div>
                        </div>
                        <!-- END: Change Password -->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php
    $this->load->view('admin/layouts/js');
    ?>

    <script src="<?php echo base_url() ?>assets/admin/js/notiflix.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/password.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageUpload").change(function() {
            readURL(this);
        });
    </script>

    <script>
        $('.side-menu').removeClass('side-menu--active');
        $("#user_side_menu").addClass('side-menu--active');
        $("#user_side_menu ~ ul").addClass('side-menu__sub-open');
        $("#profil_side_menu").addClass('side-menu--active');

        $("#locate_link").text('Mon profil');

        $('#change_psd').submit(function(e) {
            e.preventDefault();
            var url = '<?php base_url() ?>user/change_pass';
            var data = $(this).serialize();
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                dataType: 'JSON',
            }).done(function(response) {
                if (response === true) {
                    window.location.replace('<?php base_url() ?>user/logout');
                } else {
                    Notiflix.Notify.failure(
                        response, {
                            timeout: 5000,
                        });
                }
            });
        });

        $(document).ready(function() {
            $('#edit_user').submit(function(e) {
                e.preventDefault();
                var url = '<?php echo base_url() ?>user/update_user';
                var data = new FormData(this);
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
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
                                'Utilisateur non modifié essayez à nouveau!',
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