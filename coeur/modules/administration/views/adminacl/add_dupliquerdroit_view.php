            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           

          

                        <!-- start page title -->
                        <!-- <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18"><?php echo $onglet_title;?></h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Responsive Table</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div> -->
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <p></p>
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18"><?php echo $onglet_title;?></h4>

                                    <div class="page-title-right">
                                        <button type="button" class="btn btn-danger waves-effect waves-light" id="backto"><i class="bx bx-undo font-size-16 align-middle me-2"></i>Retour</button>
                                    <!-- sample modal content -->
                                    </div>

                                    </div>
        
                                       <!--  <h4 class="card-title">Example</h4>
                                        <p class="card-title-desc">This is an experimental awesome solution for responsive tables with complex data.</p> -->
                                        <div class="col-6">






                                <p class="card-title-desc">Dupliquer les droits du profil souhaité à l'aide du formulaire</p>

    <?php $attributes = array('id' => 'addmodform1', 'name'=> 'addmodform1', "class"=>"custom-validation"); 
    echo form_open('', $attributes);?>
    <input type="hidden" name="passok" id="passok" value="ok">

                                     <div class="col-lg-6">
                                                    <div class="mb-3">
                                                <label for="duplique_id" class="form-label">Profil mod&egrave;le &agrave; dupliquer</label>
                            <?php echo form_dropdown("duplique_id",$levelprofil,"","id='duplique_id' class='form-select' required"); ?>

                                                    </div>
                                                    <div class="mb-3">
                                                <label for="destine_id" class="form-label">Profil destinataire</label>
                            <?php echo form_dropdown("destine_id",$levelprofil,"","id='destine_id' class='form-select' required"); ?>

                                                    </div>
                                                

                                </div>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="reset" class="btn btn-secondary waves-effect">
                                            Annuler
                                        </button>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light" id="okvalid">
                                            Valider
                                        </button>
                                        
                                    </div>
    <?php echo form_close();?>
                                           
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
<script>
    $(document).ready(function(){

        $("#backto").on("click", 
         function()
          {
        $("#getcontent").load("<?php echo base_url();?>administration/adminacl/get_droitprofil"); 
      
          }
        );

        $("#duplique_id").on('change',function() { 
          var duplique_id = $("#duplique_id").val();
          var destine_id = $("#destine_id").val();
          if(duplique_id!='' && (duplique_id==destine_id)){
            bootbox.alert("le module modele doit etre different du module destinataire");
            $("#duplique_id").css({ "background-color": "#f0e68c"});
            $("#duplique_id").val("");
            return false;
          }
        });

        $("#destine_id").on('change',function() { 
          var duplique_id = $("#duplique_id").val();
          var destine_id = $("#destine_id").val();
          if(destine_id!='' && (destine_id==duplique_id)){
            bootbox.alert("le module destinataire doit etre different du module modele");
            $("#destine_id").css({ "background-color": "#f0e68c"});
            $("#destine_id").val("");
            return false;

          }
        });

         $(".red").on('click',function() { 
          var id = $(this).attr("data-name");

           bootbox.confirm("<span style='color:red;'>Attention!! Attention!!<br></span> Souhaitez-vous réellement supprimer cet enrégistrement?",
                function(result) {
                if (result === true) {DeleteForm(id);} else {}
                });
         });

         $("form#addmodform1").on(
            "submit",
            function(e)
                     {
                         // On empêche le navigateur de soumettre le formulaire
                         e.preventDefault();
                         // alert();
                         // return false;

          var duplique_id = $("#duplique_id").val();
          var destine_id = $("#destine_id").val();

          if(duplique_id==''){
          bootbox.alert("le nom du module modele est obligatoire");
          $("#duplique_id").css({ "background-color": "#f0e68c"});
          return false;
          }

          if(destine_id==''){
          bootbox.alert("le nom du module destinataire est obligatoire");
          $("#destine_id").css({ "background-color": "#f0e68c"});
          return false;
          }

          if(duplique_id==destine_id){
          bootbox.alert("le module destinataire doit etre different");
          $("#destine_id").css({ "background-color": "#f0e68c"});
          return false;
          }

           var $this = $(this);

          bootbox.confirm("Souhaitez-vous réellement effectuer cette replique?",
                function(result) {
                if (result === true) {

          $("#okvalid").attr("disabled", "disabled").html("Validation des données en cours... ");

          $.ajax({
                url: "<?php echo base_url();?>administration/adminacl/add_dupliquerdroit",
                type: $this.attr('method'),
                data: $this.serialize(),
                dataType: 'json', // JSON
                success: function(json) {
                    if(json.reponse === '1') {
             
              $("#getcontent").load("<?php echo base_url("administration/adminacl/add_dupliquerdroit")?>");
              $.growl.notice({ message: "Votre opération s'est bien effectuée!" });

                } else {
              $.growl.error({ message: "Echec de l'opération, veuillez verifier et reprendre." });
                   $("#okvalid").attr("disabled", false).html("Valider");
                  return false;
                      }
                    }
                });
                } else {}
                });



          return false;
                }
              );


        });

  
</script>

        

        <!-- Required datatable js -->
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/jszip/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="<?php echo base_url(); ?>assets/js/pages/datatables.init.js"></script>    

      