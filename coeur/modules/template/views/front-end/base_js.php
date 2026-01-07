
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

<script src="<?php echo base_url()?>assets/admin/sweetalert2/sweetalert2.all.min.js"></script>

<!--====== Main js ======-->
<script src="<?php echo base_url()?>assets/front-end/js/main.js"></script>
<script>
    // $(document).ready(function (){
    //     $('#form_newsletter').on('submit', function(e){
    //         e.preventDefault();
    //         var email_news = $('#email_news').val();

    //         var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    //         if(email_news === ""){
    //             return false;
    //         }
    //         if (!emailRegex.test(email_news)) {
    //             $('#message_newletters').show();
    //             $('#message_newletters').html('Format d\'e-mail invalide').css('color', 'red');
    //             return false;
    //         }

    //         $.ajax({
    //             url: "<?php echo base_url();?>contact/newletters/",
    //             type: "post",
    //             data: {email:email_news},
    //             success: function(json) {
    //                 // console.log(json);
    //                 //$('#bs-example-modal-lg').modal('hide');
    //                 $('#email_news').val('');
    //                 $('#message_newletters').show();
    //                 $('#message_newletters').html('Votre email a bien été ajouté dans notre base de donnée').css('color', '#00CC00');
    //                 //if(json===true){
    //                 //    $("#getcontent").load("<?php //echo base_url("administration/information/get_information/")?>//");
    //                 //    $.growl.notice({ message: "Votre suppression effectuée avec succès !" });
    //                 //} else {
    //                 //    $.growl.error({ message: "Echec de l'opération. Reprendre!" });
    //                 //    return false;
    //                 //}

    //             }
    //         });

    //     })
    // })
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
</script>
