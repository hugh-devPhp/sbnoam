<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="<?php echo base_url(); ?>assets/admin/libs/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/metismenu/metisMenu.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/simplebar/simplebar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/node-waves/waves.min.js"></script>

<!-- apexcharts -->
<script src="<?php echo base_url(); ?>assets/admin/libs/apexcharts/apexcharts.min.js"></script>

<!-- dashboard init -->
<script src="<?php echo base_url(); ?>assets/admin/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="<?php echo base_url(); ?>assets/admin/js/app.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plus_libs/js/sweetalert.min.js" type="text/javascript" ></script>
<script type="text/javascript">
    $(document).ready(
      function()
      {
        $(".ologoff").on("click", logoff);

              
      }
    );
   

         function logoff(){
        swal(
            {
                title: "Attention",
                text: "Vous vous déconnectez ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Oui, déconnecter",
                cancelButtonText: "Annuler",
                closeOnConfirm: false,
                dangerMode: true

            },

            function(){

                window.location.href = "<?php echo base_url('administration/logout');?>";

            }

        );
//       swal("A wild Pikachu appeared! What do you want to do?", {
//           buttons: ["Oh noez!", "Aww yiss!"]
//       })
    }

</script>