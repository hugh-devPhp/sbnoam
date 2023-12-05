<!DOCTYPE html>
<html lang="fr" class="light">

<head>
    <meta charset="utf-8">
    <link href="<?php echo base_url() ?>assets/corporate/img/logogdj-2.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>gdj-Connexion</title>

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/app.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/notiflix.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/sweetalert2/sweetalert2.min.css">

</head>

<body class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Sup'Note logo" class="w-52" src="<?php echo base_url() ?>assets/corporate/img/logogdj-2.png">
                </a>
                <div class="my-auto">
                    <img alt="Image_bureau" class="-intro-x w-1/2 -mt-16" src="<?php echo base_url() ?>assets/admin/images/illustration.svg">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        Encore quelques clics pour vous

                        Connectez-vous à votre compte.
                    </div>
                </div>
            </div>

            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        S'identifier
                    </h2>
                    <div class="row btn-lg text-center btn-danger" id="err_msg" style="display: none">
                        Vérifiez vos données
                    </div>
                    <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">Encore quelques clics pour vous
                        connecter à votre compte. Gérez votre site en vous connectant.</div>
                    <div class=""></div>
                    <form action="" id="login_form">
                        <div class="intro-x mt-8">
                            <input type="email" id="email" name="email" class="intro-x login__input form-control py-3 px-4 block" placeholder="votre email">
                            <input type="password" id="password" name="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Mot de passe">
                        </div>
                        <div class="intro-x flex text-slate-600 text-xs sm:text-sm mt-4">
                            <a href="">Mot de passe oublié?</a>
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button class="btn py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" type="submit" style="background-color: #3DA2CE">Connexion</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN: JS Assets-->
    <script src="<?php echo base_url() ?>assets/admin/js/app.js"></script>
    <!-- END: JS Assets-->
    <script src="<?php echo base_url() ?>assets/admin/js/jquery/jquery-3.5.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/notiflix.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/sweetalert2/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#login_form").submit(function(event) {
                event.preventDefault();
                var email = $("#email").val();
                var password = $("#password").val();
                // Returns error message when submitted without req fields.
                if (email === '' || password === '') {
                    $("div#err_msg").show();
                } else {
                    // AJAX Code To Submit Form.
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('user/login'); ?>",

                        dataType: 'json',
                        data: {
                            email: email,
                            password: password
                        },
                        cache: false,
                        success: function(response) {
                            //swal.fire(response);
                            if (response === '0') {
                                swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Vérifiez vos données 😐!!!'
                                });
                            } else {
                                Notiflix.Loading.standard('Connection...');
                                window.location.replace(response);
                            }
                        },
                        error: function() {
                            swal.fire('error');
                        }
                    });
                }
                return false;
            });
        });
    </script>
</body>

</html>