<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="<?php echo base_url(); ?>assets/admin/libs/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/metismenu/metisMenu.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/simplebar/simplebar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/node-waves/waves.min.js"></script>

<!-- apexcharts -->
<script src="<?php echo base_url(); ?>assets/admin/libs/apexcharts/apexcharts.min.js"></script>

<!-- App js -->
<script src="<?php echo base_url(); ?>assets/admin/js/app.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plus_libs/js/bootbox.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plus_libs/js/preloader/loadingoverlay.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plus_libs/js/preloader/loadingoverlay.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plus_libs/js/sweetalert.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url(); ?>assets/admin/plus_libs/js/jquery.growl.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/select2/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/spectrum-colorpicker2/spectrum.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/@chenfengyuan/datepicker/datepicker.min.js"></script>


<script src="<?php echo base_url() ?>assets/admin/js/notiflix.js"></script>

<!-- form advanced init -->
<script src="<?php echo base_url(); ?>assets/admin/js/pages/form-advanced.init.js"></script>
<script type="text/javascript">
    $(document).ready(
      function()
      {
        $(".ologoff").on("click", logoff);
        
        var id= $('#leckp').val();
        loadcontent(id);
        <?php 
        
    if(($liste_onglet>0) && isset($liste_onglet))
            { ?>
    
     $(".tab").on('click',function() { var lecpt = $(this).attr("data-name");
        attab(lecpt);});
        <?php  } ?>
              
      }
    );
    ///////
    function attab(lecpt)
    {
      if(lecpt==1) loadcontent();
      else attab_func(lecpt);
    }
   ///////
    function loadcontent(lecpt)
    {
      if((lecpt===undefined) || (lecpt==null) || (lecpt=="")) lecpt=1;
      
    //loading("Chargement");
    $(document).ajaxStart(function(){
        $.LoadingOverlay("show");
        });
    $(document).ajaxStop(function(){
        $.LoadingOverlay("hide");
        });

  var myMat=[];
  var ckl=$("#cptmodule").val();

  for(v=1; v<=ckl; v++){
  if(v!=lecpt) document.getElementById('adtab'+v).classList.remove("active");
  else { document.getElementById('adtab'+lecpt).classList.add('active');
  myMat[lecpt]=document.getElementById('libel_'+lecpt).value;}
      }  
  $("#getcontent").load("<?php echo base_url("administration/".$nom_module) ;?>/"+myMat[lecpt]); 
    }
    ////////  
    function attab_func(lecpt)
    { 
    //loading("Chargement");
    $(document).ajaxStart(function(){
        $.LoadingOverlay("show");
    });
    $(document).ajaxStop(function(){
        $.LoadingOverlay("hide");
    });
  var myMat=[];

  var ckl=$("#cptmodule").val();
  for(v=1; v<=ckl; v++){
  if(v!=lecpt) document.getElementById('adtab'+v).classList.remove("active");
  else { document.getElementById('adtab'+lecpt).classList.add('active');
  myMat[lecpt]=document.getElementById('libel_'+lecpt).value;}
      }  
  $("#getcontent").load("<?php echo base_url("administration/".$nom_module) ;?>/"+myMat[lecpt]);   
        }


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