<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>ANVI-ADMIN SITE | Modifie password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="Finasys technologies CI" name="author" />
        <!-- App favicon -->
        <!-- <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin/images/favicon.ico"> -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin/admin/t01/img/favicon.ico" type="image/x-icon"/>
        <!-- Bootstrap Css -->
        <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo base_url(); ?>assets/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo base_url(); ?>assets/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="text-center"><h4><font color="red" style="text-transform: uppercase;"><b><?php echo $notifications_page; ?></b></font></h4></div>
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">&nbsp;</h5>
                                            <p><?php //echo $notifications_page; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="<?php echo base_url(); ?>assets/admin/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="auth-logo">
                                    <a href="Javascript:void(0);" class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="<?php echo base_url(); ?>assets/admin/t01/img/logo.png" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>

                                    <a href="<?php echo base_url(); ?>" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
<!--                                                <img src="--><?php //echo base_url(); ?><!--assets/admin/t01/img/logo.png" alt="" class="rounded-circle" height="34">-->
                                                <img src="<?php echo base_url(); ?>assets/front-end/img/logo.png" alt="" class="img-fluid">

                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                            <?php echo form_open('authentification/changepass', 'class="form-horizontal" id="myforma"'); ?>
                            <input type="hidden" name="id_acl" id="id_acl" value="<?php echo $id_user;?>">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Login</label>
                <input type="text" class="form-control" id="username" name="login" readonly value="<?php echo $matricule;?>">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Nouveau mot de passe</label>
                                            <div class="input-group auth-pass-inputgroup">
                    <input type="password" class="form-control" placeholder="Enter le mot de passe" aria-label="Password" aria-describedby="password-addon" name="lepass" id="lepass" required>
                    <button class="btn btn-light" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Repeter le mot de passe</label>
                                            <div class="input-group auth-pass-inputgroup">
                    <input type="password" class="form-control" placeholder="Repeter le mot de passe" aria-label="Password2" aria-describedby="password-addon2" name="repetpass" id="repetpass" required>
                    <button class="btn btn-light" type="button" id="password-addon2">&nbsp;</button>
                                            </div>
                                        </div>

                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-success waves-effect waves-light" type="button" id="validok">Valider</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            &nbsp;
                                        </div>
                                    <?php echo form_close(); ?>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">

                            <div>
                                <!-- <p>Don't have an account ? <a href="auth-register.html" class="fw-medium text-primary"> Signup now </a> </p> -->
                                <p>© <script>document.write(new Date().getFullYear())</script> <i class="mdi mdi-heart text-danger"></i> Design & Develop by Leaders Tech</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url(); ?>assets/admin/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/node-waves/waves.min.js"></script>
        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/admin/js/app.js"></script>
        <script type="text/javascript">

        $(document).ready(
      function()
      {

            $("#validok").on("click",
            function()
                     {

     var lepassvide=$("#lepass").val().trim();
     var lepass=$("#lepass").val();
     var repetpass=$("#repetpass").val();

    if(lepassvide==""){
        alert("La creation du mot de passe est incorrecte!");
        return false;
                }
    else if(lepass!=repetpass){
        alert("Erreur sur la repetition du mot de passe!");
        return false;
        }

    else $("form#myforma").submit();
            });

        });

        </script>

    </body>
</html>
