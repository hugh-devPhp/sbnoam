<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>SBNoame - Administration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="shine by noame site" name="description" />
        <meta content="hugues_ody" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url()?>assets/front-end/sbnoam_logo.ico">
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
                        <div class="text-center"><h4><font color="red" style="text-transform: uppercase;"><b><?php echo $this->session->flashdata('notifications_page'); ?></b></font></h4></div>
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Bienvenue !</h5>
                                            <p>Connectez-vous à votre espace.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="<?php echo base_url(); ?>assets/sbnoam_logo.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div class="auth-logo">
                                    <a href="Javascript:void(0);" class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="<?php echo base_url(); ?>assets/sbnoam_logo.png" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>

                                    <a href="<?php echo base_url(); ?>" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="<?php echo base_url(); ?>assets/sbnoam_logo.png" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                        <?php echo form_open('authentification', 'class="form-horizontal" id="myform"'); ?>
        
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Login</label>
                                            <input type="text" class="form-control" id="username" name="login" placeholder="Enter le login">
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label">Mot de passe</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" placeholder="Enter le mot de passe" aria-label="Password" aria-describedby="password-addon" name="pass">
                                                <button class="btn btn-light" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>

                                       <!--  <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-check">
                                            <label class="form-check-label" for="remember-check">
                                                Remember me
                                            </label>
                                        </div> -->
                                        
                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Connexion</button>
                                        </div>
            
                                       <!--  <div class="mt-4 text-center">
                                            <h5 class="font-size-14 mb-3">Sign in with</h5>
            
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="javascript::void()" class="social-list-item bg-primary text-white border-primary">
                                                        <i class="mdi mdi-facebook"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript::void()" class="social-list-item bg-info text-white border-info">
                                                        <i class="mdi mdi-twitter"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript::void()" class="social-list-item bg-danger text-white border-danger">
                                                        <i class="mdi mdi-google"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div> -->

                                        <div class="mt-4 text-center">
                                            <a href="Javascript:voidd(0);" class="text-muted"><i class="mdi mdi-lock me-1"></i> Mot de passe oublié?</a>
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

    </body>
</html>
