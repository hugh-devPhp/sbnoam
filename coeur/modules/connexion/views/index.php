<?php $this->load->view('template/front-end/haut_template', array("menu_actif"=>$menu_actif))?>
<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="<?php echo base_url()?>accueil">Accueil</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Connexion</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="mb-4">
            <h1 class="text-center">Mon Compte</h1>
        </div>
        <?php
        $error = $this->session->flashdata('error');
        if($error){
        ?>
        <div class="alert alert-danger">
            <span><?php echo $error; ?></span>
        </div>
        <?php
        }
        ?>
        <?php
        $success = $this->session->flashdata('success');
        if($success){
            ?>
            <div class="alert alert-success">
                <span><?php echo $success; ?></span>
            </div>
            <?php
        }
        ?>
        <div class="my-4 my-xl-8">
            <div class="row">
                <div class="col-md-5 ml-xl-auto mr-md-auto mr-xl-0 mb-8 mb-md-0">
                    <!-- Title -->
                    <div class="border-bottom border-color-1 mb-6">
                        <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Connexion</h3>
                    </div>
                    <p class="text-gray-90 mb-4">Bon retour! Connectez-vous à votre compte</p>
                    <!-- End Title -->
                    <form method="post" action="<?php echo base_url()?>connexion/do_connexion">
                        <!-- Form Group -->
                        <div class="js-form-message form-group">
                            <label class="form-label" for="signinSrEmailExample3">Email
                                <span class="text-danger">*</span>
                            </label>
                            <input type="email" class="form-control" name="login"  placeholder="Login" aria-label="" required>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="js-form-message form-group">
                            <label class="form-label" for="signinSrPasswordExample2">Mot de passe <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" placeholder="Mot de passe"  required>
                        </div>
                        <!-- End Form Group -->

                        <!-- Checkbox -->

                        <!-- End Checkbox -->

                        <!-- Button -->
                        <div class="mb-1">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary-dark-w px-5">Connexion</button>
                            </div>
                            <div class="mb-2">
                                <a class="text-blue" href="#">Mot de passe oublié ?</a>
                            </div>
                        </div>
                        <!-- End Button -->
                    </form>
                </div>
                <div class="col-md-1 d-none d-md-block">
                    <div class="flex-content-center h-100">
                        <div class="width-1 bg-1 h-100"></div>
                        <div class="width-50 height-50 border border-color-1 rounded-circle flex-content-center font-italic bg-white position-absolute">ou</div>
                    </div>
                </div>
                <div class="col-md-5 ml-md-auto ml-xl-0 mr-xl-auto">
                    <!-- Title -->
                    <div class="border-bottom border-color-1 mb-6">
                        <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Inscription</h3>
                    </div>
                    <p class="text-gray-90 mb-4">Créez un nouveau compte aujourd'hui pour profiter des avantages d'une expérience d'achat personnalisée.</p>
                    <!-- End Title -->
                    <!-- Form Group -->
                    <form novalidate="novalidate" method="post" action="<?php echo base_url()?>inscription/add_client">
                        <div class="js-form-message form-group">
                            <label class="form-label" for="signinSrPasswordExample2">Nom Complet <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nom_complet"  placeholder=""  required>
                        </div>
                        <div class="form-group mb-5">
                            <label class="form-label" for="RegisterSrEmailExample3">Email
                                <span class="text-danger">*</span>
                            </label>
                            <input type="email" class="form-control" name="email" id="email"  placeholder="Email addressss"  >
                            <span style="color: red" id="msg_email"></span>
                        </div>
                        <div class="js-form-message form-group">
                            <label class="form-label" for="signinSrPasswordExample2">Nouveau Mot de passe <span class="text-danger">*</span></label>
                            <input type="password" class="form-control password" name="new_password" id="new_password" placeholder="Password" aria-label="Password" required
                                   data-msg="Your password is invalid. Please try again."
                                   data-error-class="u-has-error"
                                   data-success-class="u-has-success">
                        </div>
                        <div class="js-form-message form-group">
                            <label class="form-label" for="signinSrPasswordExample2">Confirmation Mot de passe <span class="text-danger">*</span></label>
                            <input type="password" class="form-control password" name="conf_password" id="conf_password" placeholder="Password" aria-label="Password" required
                                   data-msg="Your password is invalid. Please try again."
                                   data-error-class="u-has-error"
                                   data-success-class="u-has-success">
                            <span style="color: red" id="msg_password"></span>
                        </div>
                        <!-- End Form Group -->
                        <div class="mb-6">
                            <div class="mb-3">
                                <button type="submit" id="ok_valid" class="btn btn-primary-dark-w px-5">Inscription</button>
                            </div>
                        </div>
                        <!-- End Button -->
                    </form>

                </div>
            </div>
        </div>
    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->


<?php $this->load->view('template/front-end/bas_template')?>

<script>
    $(document).ready(function (){

        $('#email').on('blur', function () {
            var email = $(this).val();

            $.ajax({
                url: "<?php echo base_url();?>inscription/verification_email/",
                type: "post",
                dataType: 'json', // JSON
                data: {email:email},
                success: function(json) {
                    console.log(json);
                    //$('#bs-example-modal-lg').modal('hide');
                    if(json.response === "1"){

                        $('#ok_valid').prop('disabled', true);
                        $("#msg_email").html("l'email est déjà utilisé", 3000);
                    }else{
                        $('#ok_valid').prop('disabled', false);
                        $("#msg_email").html("");
                    }



                }
            });

        });

        $('.password').on('blur', function () {
            var new_password = $("#new_password").val();
            var conf_password = $("#conf_password").val();

            if(new_password === "" ){
                return false;
            }
            if(conf_password === ""){
                return false;
            }

            if(new_password !== conf_password){
                $("#msg_password").html("La confirmation du mot de passe n'est pas identique à celui de l'ancien", 3000);
                $('#ok_valid').prop('disabled', true);
            }else{
                $("#msg_password").html("", 3000);
                $('#ok_valid').prop('disabled', false);
            }


        })

    })
</script>
