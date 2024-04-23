<?php $this->load->view('template/front-end/haut_template', array("menu_actif"=>$menu_actif))?>
<style>
    /* Style the tab */
    .tab {
        float: left;
        border: 1px solid #ff;
        background-color: #ccc;
        width: 20%;
        margin-bottom: 10px
    }

    /* Style the buttons inside the tab */
    .tab a {
        display: block;
        background-color: inherit;
        color: black;
        padding: 22px 16px;
        width: 100%;
        border: none;
        outline: none;
        text-align: left;
        cursor: pointer;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab a:hover {
        background-color: #fff !important;
    }

    /* Create an active/current "tab button" class */
    .tab a.active {
        background-color: #fff !important;
        font-weight: bold !important;
    }

    /* Style the tab content */
    .tabcontent {
        float: left;
        padding: 0px 12px;
        width: 70%;
        border-left: none;
        margin-left: 10px;
        margin-bottom: 10px
    }
</style>
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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Mon compte</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->
    <?php if(isset($page_content)){
        $this->load->view("$page_content");
    }?>

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
<script>

</script>
