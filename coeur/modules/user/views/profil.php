<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mon profil</title>
    <?php
    $this->load->view('admin/layouts/css');
    ?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style>
        .color-r {
            color: #FF7000;
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
                                <h4 class="mb-sm-0 font-size-18">Profile</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Paramètres</a></li>
                                        <li class="breadcrumb-item active">Profile</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="checkout-tabs">
                        <div class="row">
                            <div class="col-xl-12 col-sm-12">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="profil-pills" role="tabpanel" aria-labelledby="profil-tab">

                                        <div class="row">
                                            <div class="col-xl-4">
                                                <div class="card overflow-hidden">
                                                    <div class="bg-primary bg-soft">
                                                        <div class="row">
                                                            <div class="col-7">
                                                                <div class="text-primary p-3">
                                                                    <h5 class="text-primary">Bienvenu !</h5>
                                                                    <p>Ceci est votre profil personnel</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-5 align-self-end">
                                                                <img src="<?php echo base_url() ?>assets/admin/images/profile-img.png" alt="" class="img-fluid">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body pt-0">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <div class="avatar-md profile-user-wid mb-4">
                                                                    <img src="<?php echo base_url() ?>assets/admin/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
                                                                </div>
                                                                <h5 class="font-size-15 text-truncate"><?php echo $this->session->userdata('name') ?></h5>
                                                                <p class="text-muted mb-0 text-truncate">Nom utilisateur</p>
                                                            </div>

                                                            <div class="col-sm-8">
                                                                <div class="pt-4">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <h5 class="font-size-15">Responsable</h5>
                                                                            <p class="text-muted mb-0">profile</p>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <h5 class="font-size-15"><?php echo $this->session->userdata('birth') ?></h5>
                                                                            <p class="text-muted mb-0">Date de naissance</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end card -->

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title mb-4 color-r">Informations Personnelles</h4>
                                                        <div class="table-responsive">
                                                            <table class="table table-nowrap mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">Nom & Prénom :</th>
                                                                        <td><?php echo $this->session->userdata('name') ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Contacts :</th>
                                                                        <td><?php echo $this->session->userdata('phone') ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Email :</th>
                                                                        <td><?php echo $this->session->userdata('email') ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Adresse :</th>
                                                                        <td><?php echo $this->session->userdata('address') ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end card -->
                                            </div>

                                            <div class="col-xl-8">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title mb-4 color-r">Modifiez vos informations</h4>
                                                        <form id="edit_me">
                                                            <div class="row col-span-12 sm:col-span-3">
                                                                <div class="avatar-upload">
                                                                    <div class="avatar-edit">
                                                                        <input type='file' name="picture" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                                        <label for="imageUpload"></label>
                                                                    </div>
                                                                    <div class="avatar-preview">
                                                                        <div id="imagePreview" style="background-image: url('<?php echo base_url() ?>assets/admin/images/users/avatar-1.jpg')">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="firstname-input" class="form-label">Nom & prénom</label>
                                                                        <input type="text" class="form-control" name="first_name" id="firstname-input" value="<?php echo $this->session->userdata('name') ?>" placeholder="Nom">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="formrow-date-input" class="form-label">Date de naissance</label>
                                                                        <input type="date" class="form-control" name="birth" id="formrow-date-input" value="<?php echo $this->session->userdata('birth') ?>" placeholder="Nom">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label for="formrow-email-input" class="form-label">Email</label>
                                                                        <input type="email" class="form-control" name="email" id="formrow-email-input" value="<?php echo $this->session->userdata('email') ?>" placeholder="Entrez votre Email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label for="add-input" class="form-label">adresse</label>
                                                                        <input type="text" class="form-control" name="adresse" id="add-input" value="<?php echo $this->session->userdata('address') ?>" placeholder="ville, commune">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label for="contact-input" class="form-label">Contact</label>
                                                                        <input type="text" class="form-control" name="contacts" id="contact-input" value="<?php echo $this->session->userdata('phone') ?>" placeholder="../../../../..">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <button type="submit" class="btn btn-primary w-md">
                                                                    Modifier
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title mb-4 color-r">Changer mot de passe</h4>
                                                        <form action="" id="change_psd_form">
                                                            <div class="mb-3">
                                                                <label for="old_psd" class="form-label">Ancien Mot de passe</label>
                                                                <div class="input-group auth-pass-inputgroup">
                                                                    <input type="password" class="form-control" required placeholder="Votre ancien mot de passe" aria-label="Password" id="old_psd" name="old_psd" aria-describedby="password-addon">
                                                                    <button class="btn btn-light " type="button" id="password-addon">
                                                                        <i class="mdi mdi-eye-outline"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="new_psd" class="form-label">Nouveau Mot de passe</label>
                                                                <div class="input-group auth-pass-inputgroup">
                                                                    <input type="password" class="form-control" placeholder="Votre nouveau mot de passe" required aria-label="Password" id="new_psd" name="new_psd" aria-describedby="password-addon2">
                                                                    <button class="btn btn-light " type="button" id="password-addon2">
                                                                        <i class="mdi mdi-eye-outline"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="c_new_psd" class="form-label">
                                                                    Confirmation nouveau Mot de passe</label>
                                                                <div class="input-group auth-pass-inputgroup">
                                                                    <input type="password" class="form-control" placeholder="confirmez Mot de passe" required aria-label="Password" id="c_new_psd" name="c_new_psd" aria-describedby="password-addon3">
                                                                    <button class="btn btn-light " type="button" id="password-addon3">
                                                                        <i class="mdi mdi-eye-outline"></i></button>
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                                Changer
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end checkout-tabs -->

                </div> <!-- container-fluid -->
            </div>

            <?php
            $this->load->view('admin/layouts/footer');
            ?>
        </div>
    </div>
    <?php
    $this->load->view('admin/layouts/js');
    ?>


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