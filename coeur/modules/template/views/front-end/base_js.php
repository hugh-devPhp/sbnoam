
<!--====== jquery js ======-->
<script src="<?php echo base_url()?>assets/front-end/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="<?php echo base_url()?>assets/front-end/js/vendor/jquery-1.12.4.min.js"></script>
<!--====== Bootstrap js ======-->
<script src="<?php echo base_url()?>assets/front-end/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/front-end/js/popper.min.js"></script>
<!--====== Slick js ======-->
<script src="<?php echo base_url()?>assets/front-end/js/slick.min.js"></script>
<!--====== Isotope js ======-->
<script src="<?php echo base_url()?>assets/front-end/js/isotope.pkgd.min.js"></script>
<!--====== Magnific Popup js ======-->
<script src="<?php echo base_url()?>assets/front-end/js/jquery.magnific-popup.min.js"></script>
<!--====== inview js ======-->
<script src="<?php echo base_url()?>assets/front-end/js/jquery.inview.min.js"></script>
<!--====== counterup js ======-->
<script src="<?php echo base_url()?>assets/front-end/js/jquery.countTo.js"></script>
<!--====== Nice Select ======-->
<script src="<?php echo base_url()?>assets/front-end/js/jquery.nice-select.min.js"></script>
<!--====== Bootstrap datepicker ======-->
<script src="<?php echo base_url()?>assets/front-end/js/bootstrap-datepicker.js"></script>
<!--====== Ion Rangeslider ======-->
<script src="<?php echo base_url()?>assets/front-end/js/ion.rangeSlider.min.js"></script>
<!--====== Jquery Countdown ======-->
<script src="<?php echo base_url()?>assets/front-end/js/jquery.countdown.min.js"></script>
<!--====== Wow JS ======-->
<script src="<?php echo base_url()?>assets/front-end/js/wow.min.js"></script>
<!--====== Mapbox Map ======-->
<script src="<?php echo base_url()?>assets/front-end/js/leaflet.js"></script>
<script src="<?php echo base_url()?>assets/front-end/js/mapbox-gl.min.js"></script>
<script src="<?php echo base_url()?>assets/front-end/js/map.js"></script>
<!--====== Main js ======-->
<script src="<?php echo base_url()?>assets/front-end/js/main.js"></script>
<script>
    $(document).ready(function (){

        $('#form_newsletter').on('submit', function(e){
            e.preventDefault();
            var email_news = $('#email_news').val();

            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if(email_news === ""){
                return false;
            }
            if (!emailRegex.test(email_news)) {
                $('#message_newletters').show();
                $('#message_newletters').html('Format d\'e-mail invalide').css('color', 'red');
                return false;
            }


            $.ajax({
                url: "<?php echo base_url();?>contact/newletters/",
                type: "post",
                data: {email:email_news},
                success: function(json) {
                    // console.log(json);
                    //$('#bs-example-modal-lg').modal('hide');
                    $('#email_news').val('');
                    $('#message_newletters').show();
                    $('#message_newletters').html('Votre email a bien été ajouté dans notre base de donnée').css('color', '#00CC00');
                    //if(json===true){
                    //    $("#getcontent").load("<?php //echo base_url("administration/information/get_information/")?>//");
                    //    $.growl.notice({ message: "Votre suppression effectuée avec succès !" });
                    //} else {
                    //    $.growl.error({ message: "Echec de l'opération. Reprendre!" });
                    //    return false;
                    //}

                }
            });

        })

    })
</script>
<!-- JS Plugins Init. -->
<script>
    $(window).on('load', function () {


        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
            event: 'hover',
            direction: 'horizontal',
            pageContainer: $('.container'),
            breakpoint: 767.98,
            hideTimeOut: 0
        });

        // initialization of svg injector module
        $.HSCore.components.HSSVGIngector.init('.js-svg-injector');
    });

    $(document).on('ready', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#header'));

        // initialization of animation
        $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
            afterOpen: function () {
                $(this).find('input[type="search"]').focus();
            }
        });

        // initialization of popups
        $.HSCore.components.HSFancyBox.init('.js-fancybox');

        // initialization of countdowns
        var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
            yearsElSelector: '.js-cd-years',
            monthsElSelector: '.js-cd-months',
            daysElSelector: '.js-cd-days',
            hoursElSelector: '.js-cd-hours',
            minutesElSelector: '.js-cd-minutes',
            secondsElSelector: '.js-cd-seconds'
        });

        // initialization of malihu scrollbar
        $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

        // initialization of forms
        $.HSCore.components.HSFocusState.init();

        // initialization of form validation
        $.HSCore.components.HSValidation.init('.js-validate', {
            rules: {
                confirmPassword: {
                    equalTo: '#signupPassword'
                }
            }
        });

        // initialization of show animations
        $.HSCore.components.HSShowAnimation.init('.js-animation-link');

        // initialization of fancybox
        $.HSCore.components.HSFancyBox.init('.js-fancybox');

        // initialization of slick carousel
        $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');

        // initialization of hamburgers
        $.HSCore.components.HSHamburgers.init('#hamburgerTrigger');

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
            beforeClose: function () {
                $('#hamburgerTrigger').removeClass('is-active');
            },
            afterClose: function() {
                $('#headerSidebarList .collapse.show').collapse('hide');
            }
        });

        $('#headerSidebarList [data-toggle="collapse"]').on('click', function (e) {
            e.preventDefault();

            var target = $(this).data('target');

            if($(this).attr('aria-expanded') === "true") {
                $(target).collapse('hide');
            } else {
                $(target).collapse('show');
            }
        });

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

        // initialization of select picker
        $.HSCore.components.HSSelectPicker.init('.js-select');
    });

    $(document).ready(function () {
        $('.cart').on('click', function () {
            var id = $(this).attr('data-id');
            var prix = $(this).attr('data-price');

            $.ajax({
                url: "<?php echo base_url();?>accueil/insert_favoris/"+id+"/"+prix,
                type: "post",
                dataType: 'json', // JSON
                success: function(json) {
                    console.log(json);
                    //$('#bs-example-modal-lg').modal('hide');
                    // if(json.response === "1"){
                    //
                    //     $('#ok_valid').prop('disabled', true);
                    //     $("#msg_email").html("l'email est déjà utilisé", 3000);
                    // }else{
                    //     $('#ok_valid').prop('disabled', false);
                    //     $("#msg_email").html("");
                    // }



                }
            });
        })
    })
</script>

<script>
    $(document).ready(function(){
        panier();
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });

        $('.panier').on('click', function(){

            var id = $(this).attr('data-id');
            var nom = $(this).attr('data-nom');
            var prix = $(this).attr('data-prix');

            $.ajax({
                url: "<?php echo base_url();?>accueil/insert_panier/"+id+"/"+prix,
                dataType: 'json', // JSON
                success: function(json) {

                    console.log(json['data']['nb_article']);
                    var nb_item = json['data']['nb_article'];
                    var price_item = json['data']['prix_article'];
                    $('#counteur_cart').html(nb_item);
                    $('#total_cart').html(price_item+"<sup>XOF</sup>");

                    Toast.fire({
                        icon: "success",
                        title: "L'article ajouté dans le panier!!"
                    });
                    panier();

                }
            });

        });

        $('#basicDropdownHover').on('click', '.del_panier', function(){
            var id = $(this).attr('data-id');

            //var prix = $(this).attr('data-prix');
            //
            $.ajax({
                url: "<?php echo base_url();?>accueil/delete_panier/"+id,
                dataType: 'json', // JSON
                success: function(json) {
                    $('#basicDropdownHover').load("<?php echo base_url('template/panier')?>");
                    count_panier();
                    // var data  = JSON.parse(json);
                    // var nb_item = json['data']['nb_article'];
                    // var price_item = json['data']['prix_article'];
                    // $('#counteur_favorite').html(nb_item);
                    // $('#total_cart').html(price_item);
                    // console.log(json['data']);
                    // $('#bs-example-modal-lg').modal('hide');
                    //if(json===true){
                    //    $("#getcontent").load("<?php //echo base_url("administration/solutions/get_solution/")?>//");
                    //    $.growl.notice({ message: "Votre suppression effectuée avec succès !" });
                    //} else {
                    //    $.growl.error({ message: "Echec de l'opération. Reprendre!" });
                    //    return false;
                    //}

                }
            });

        })

        $('#valide').on('click', function(){
            // alert('click');

            if ($('input[name="date_debut"]').length > 0 && $('input[name="date_fin"]').length > 0) {
                var date_debut = $('input[name="date_debut"]').val();
                var datedebut = date_debut.replace(/-/g, '');

                var date_fin = $('input[name="date_fin"]').val();
                var datefin = date_fin.replace(/-/g, '');

                if (datefin < datedebut) {
                    alert("Veuillez ajuster les dates svp!!!");
                    return false;
                }
            }


            var connected = in_connected();

            if(connected){
                $('#form_reservation').submit();
            }



        })


    })

    function count_panier(){

        $.ajax({
            url: "<?php echo base_url();?>accueil/count_cart/",
            dataType: 'json', // JSON
            success: function(json) {

                // console.log(json['data']['nb_article']);
                var nb_item = json['data']['nb_article'];
                var price_item = json['data']['prix_article'];
                $('#counteur_cart').html(nb_item);
                $('#total_cart').html(price_item+"<sup>XOF</sup>");


            }
        });

    }

    function panier(){
        $('#basicDropdownHover').load("<?php echo base_url('template/panier')?>");
    }

    function in_connected(){
        var id_client = "<?php echo $this->session->userdata('id_client'); ?>";
        if(!id_client){
            Swal.fire({
                title: "<strong>Vous n'êtes pas connecté</strong>",
                icon: "warning",
                html: `
   Veuillez vous connecter afin d'effectuer cette action
  `,
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: `
    <a href="<?php echo base_url()?>connexion">Connectez-vous</a>
  `,
                confirmButtonAriaLabel: "Thumbs up, great!",
                confirmButton:true,
                cancelButtonText: `
    Fermer
  `,
                cancelButtonAriaLabel: "Thumbs down",
                buttons: {
                    confirm: {
                        text: '<a href="https://example.com">Oui</a>',
                        closeModal: false,
                        callback: (result) => {
                            if (result.isConfirmed) {
                                window.location.href = "https://example.com"; // Rediriger lorsque le lien est cliqué
                            }
                        }
                    },
                    cancel: {
                        text: 'Non',
                        closeModal: true,
                        className: 'swal-button swal-button--cancel'
                    }
                }
            });
            return false;
        }
        return true;
    }
</script>