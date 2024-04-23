<!DOCTYPE html>
<html lang="fr" class="light">

<head>
    <meta charset="utf-8">
    <link href="<?php echo base_url() ?>assets/admin/images/favicon.ico" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>admin-Connexion</title>

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/bootstrap.min.css" id="bootstrap-style" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/notiflix.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/sweetalert2/sweetalert2.min.css">
    <!-- Icons Css -->
    <link href="<?php echo base_url() ?>assets/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url() ?>assets/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="login">
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Bienvenu !</h5>
                                        <p>Connectez vous.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="<?php echo base_url() ?>assets/admin/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="index.html" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="<?php echo base_url() ?>assets/admin/images/logo-light.svg" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>

                                <a href="index.html" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="<?php echo base_url() ?>assets/admin/images/logo.svg" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <form class="form-horizontal" id="login_form">

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" required class="form-control" id="email" name="email" placeholder="Entrez votre email">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" id="password">Mot de passe</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" required name="password" id="password" class="form-control" placeholder="Entrez votre mot de passe" aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Connection</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Mot de passe oublié?</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <p>© <script>
                                    document.write(new Date().getFullYear())
                                </script> Ivoire-Lagune-Service by Dev </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->


    <!-- BEGIN: JS Assets-->
    <!-- END: JS Assets-->
    <script src="<?php echo base_url() ?>assets/admin/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/notiflix.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/sweetalert2/sweetalert2.all.min.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/libs/node-waves/waves.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/app.js"></script>

    <script>
        $(document).ready(function() {
            $("#login_form").submit(function(event) {
                event.preventDefault();
                var data = $(this).serialize();
                // AJAX Code To Submit Form.
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('user/login'); ?>",
                    dataType: 'json',
                    data: data,
                    cache: false,
                    success: function(response) {
                        console.log(response);
                        if (response === '0') {
                            swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Vérifiez vos données 😐!!!'
                            });
                        } else {
                            console.log(response)
                            Notiflix.Loading.standard('Connection...');
                            window.location.href = "<?php echo base_url() ?>" + response;
                        }
                    },
                    error: function() {
                        swal.fire('error');
                    }
                });
                return false;
            });
        });
    </script>
</body>

</html>