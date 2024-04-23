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
                                    <?php if(in_array('add_profil', is_inarray())) { ?>
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bx bx-plus font-size-16 align-middle me-2"></i>Ajouter</button> 
                                    <?php } ?> 
                                    <!-- sample modal content -->
                    <div id="myModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
    <?php $attributes = array('id' => 'addmodform1', 'name'=> 'addmodform1', "class"=>"custom-validation"); 
    echo form_open('', $attributes);?>
    <input type="hidden" name="passok" id="passok" value="ok">
                                                        <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel" >AJOUTER UN PROFIL</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                        <label class="form-label">Nom profil</label>
                                        <input type="text" id="username" name="username" class="form-control" required placeholder="Inscrire le nom du profil" />
                                                            </div>
                                                            <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea id="decrit" name="decrit" class="form-control" rows="3"></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                        	<div class="templating-select">
                                            <label class="form-label">Parent profil</label>
                                <?php echo form_dropdown("leparent", $liste_desprofils, "","id='leparent'  class='form-control' "); ?>
                                            </div>
                                                            </div>
                                                            <div class="mb-3">
                                        <label class="form-label">Statut</label>
                                <?php echo form_dropdown("statut", $liste_active, "","id='statut'  class='form-control' "); ?>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Annuler</button>
                                                            <button type="submit" id="okvalid" class="btn btn-primary waves-effect waves-light">Valider</button>
                                                        </div>
                    <?php echo form_close();?>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <div id="EditMyModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
    <?php $attributes = array('id' => 'editmodform1', 'name'=> 'editmodform1', "class"=>"custom-validation"); echo form_open('', $attributes);?>
    <input type="hidden" name="editok" id="editok" value="ok">
    <input type="hidden" name="id_profil" id="id_profil" value="">
                                                        <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel" >MODIFIER UN PROFIL</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                        <label class="form-label">Nom profil</label>
                                        <input type="text" id="username_edit" name="username" class="form-control" required/>
                                                            </div>
                                                            <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea id="decrit_edit" name="decrit" class="form-control" rows="3"></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                        	<div class="templating-select">
                                            <label class="form-label">Parent profil</label>
                                <?php echo form_dropdown("leparent", $liste_desprofils, "","id='leparent_edit'  class='form-control' required"); ?>
                                            </div>
                                                            </div>
                                                            <div class="mb-3">
                                        <label class="form-label">Statut</label>
                                <?php echo form_dropdown("statut", $liste_active, "","id='statut_edit'  class='form-control' "); ?>
                                                            </div>
                                                       
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Annuler</button>
                                                            <button type="submit" id="validedit" class="btn btn-primary waves-effect waves-light">Modifier</button>
                                                        </div>
                    <?php echo form_close();?>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                                    </div>

                                </div>
        
                                       <!--  <h4 class="card-title">Example</h4>
                                        <p class="card-title-desc">This is an experimental awesome solution for responsive tables with complex data.</p> -->
        
                        <table id="datatable" class="table table-striped table-bordered dt-responsive  nowrap w-100">
                                                    <thead>
                                                   
                                                    <tr>
                                <th width="5%">N&ordm;</th>
                                <th>Code</th>
                                <th>Description</th>
                                <th>activation</th>
                                <th>profil parent</th>
                                <th width="15%"> Actions</th>
                            						</tr>
                                                    </thead>
                                                    <tbody>
            <?php if($liste_profil>0){ $cpk=0;
                foreach($liste_profil as $row){
                    $cpk++;?>
                                    <tr>
                                        <td><?=$cpk;?></td>
                                        <td style="text-transform: uppercase;"><?=$row->code_profils;?></td>
                                        <td style="text-transform: uppercase;"><?=$row->description_profils;?></td>
                                        <td style="text-transform: uppercase;"><?php if($row->activation_profils==1) echo "Active"; else echo "Inactive";?></td>
                                        <td style="text-transform: uppercase;"><?=$row->nom_parent;?></td>
                                        <td>
                                           <div >
        <?php if(in_array('edit_statut_profil', is_inarray())) { ?>
            <a href="Javascript:void(0)"  class="blues" data-name="<?php echo $row->id_profils;?>" data-act="<?php echo $row->activation_profils;?>">
            	<?php if($row->activation_profils==1){?><button class="btn btn-warning waves-effect waves-light"><i class="bx bx-power-off font-size-16 align-middle "></i></button><?php } else {?><button class="btn btn-primary waves-effect waves-light"><i class="bx bxs-torch font-size-16 align-middle "></i></button><?php } ?></a>&nbsp;
        <?php } 
        if(in_array('edit_profil', is_inarray())) { ?><a href="Javascript:void(0)" data-bs-toggle="modal" data-bs-target="#EditMyModal"class="green" data-name="<?php echo $row->id_profils;?>" data-nom="<?php echo $row->code_profils;?>" data-desc="<?php echo $row->description_profils;?>" data-act="<?php echo $row->activation_profils;?>" data-parid="<?php echo $row->profilparent_profils;?>"><button class="btn btn-success waves-effect waves-light"><i class="bx bx-pencil font-size-16 align-middle "></i></button></a>&nbsp;
        <?php } 
        if(in_array('delete_profil', is_inarray())) { ?>
            <a href="Javascript:void(0)"  class="red"  data-name="<?php echo $row->id_profils;?>"><button class="btn btn-danger waves-effect waves-light"><i class="bx bx-trash font-size-16 align-middle"></i></button></a>
          <?php } ?>
                                            </div>
                                        </td>
                                    </tr>

            <?php           }
                    }
                            ?>
                                                    </tbody>
                                                </table>
                                           
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
<script>
    $(document).ready(function(){

        $(".green").on('click',function() { 
          var id = $(this).attr("data-name");
          var nom = $(this).attr("data-nom");
          var desc = $(this).attr("data-desc");
          var parent_id = $(this).attr("data-parid");
          var activa = $(this).attr("data-act");

          $('#id_profil').val(id);
          $('#username_edit').val(nom);
          $('#decrit_edit').val(desc);
          $('#leparent_edit').val(parent_id);
          $('#statut_edit').val(activa);
          
        });

        $(".blues").on('click',function() { 
          var id = $(this).attr("data-name");
          var statut = $(this).attr("data-act");
          if(statut==1){

          	bootbox.confirm("Souhaitez-vous désactiver ce profil?",
                function(result) {
                if (result === true) {statut_profil(id,0);} else {}
                });

          } else {

          	bootbox.confirm("Souhaitez-vous activer ce profil?",
                function(result) {
                if (result === true) {statut_profil(id,1);} else {}
                });

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

          var username= $('#username').val().trim();

          if(username==""){
          bootbox.alert("le nom du profil est obligatoire");
          $("#username").css({ "background-color": "#f0e68c"});
          return false;
          }

          $("#okvalid").attr("disabled", "disabled").html("Enregistrement des données en cours... ");
          var $this = $(this);

          $.ajax({
                url: "<?php echo base_url();?>administration/adminacl/add_profil",
                type: $this.attr('method'),
                data: $this.serialize(),
                dataType: 'json', // JSON
                success: function(json) {
                    if(json.reponse === '1') {
              // $("#lg-modal1").modal('hide');
              $("body, div").removeClass('modal-open modal-backdrop');
              $('html, body').css({overflow: 'auto', height: 'auto'});
              $("#getcontent").load("<?php echo base_url("administration/adminacl/get_profils")?>");
              $.growl.notice({ message: "Votre opération s'est bien effectuée!" });

          } else {
              $.growl.error({ message: "Echec de l'opération, veuillez verifier et reprendre." });
                   $("#okvalid").attr("disabled", false).html("Valider");
                  return false;
                      }
                    }
                });


          return false;
                }
              );



         $("form#editmodform1").on(
            "submit",
            function()
            {

          var username= $('#username_edit').val().trim();
          if(username==""){
          bootbox.alert("le nom du profil est obligatoire");
          $("#username_edit").css({ "background-color": "#f0e68c"});
          return false;
          }

          $("#validedit").attr("disabled", "disabled").html("Modification des données en cours... ");
          var $this = $(this);

          $.ajax({
                url: "<?php echo base_url();?>administration/adminacl/edit_profil",
                type: $this.attr('method'),
                data: $this.serialize(),
                dataType: 'json', // JSON
                success: function(json) {
                    if(json.reponse === '1') {
              $("body, div").removeClass('modal-open modal-backdrop');
              $('html, body').css({overflow: 'auto', height: 'auto'});
              $("#getcontent").load("<?php echo base_url("administration/adminacl/get_profils");?>");
              $.growl.notice({ message: "Votre opération s'est bien effectuée!" });

          } else {
                  $.growl.error({ message: "Echec de l'opération, veuillez verifier et reprendre." });
                   $("#validedit").attr("disabled", false).html("Enregistrer");
                  return false;
                      }
                    }
                });


          return false;
                }
              );

        });
        ///////
    	function DeleteForm(id){

        $.ajax({
           type: "POST",
           url: "<?php echo base_url("administration/adminacl/delete_profil");?>",
           data: "delok=ok&id="+id,
           success: function(msg){
              if(msg==1){
        $("#getcontent").load("<?php echo base_url("administration/adminacl/get_profils")?>");
        $.growl.notice({ message: "Votre suppression effectuée avec succès !" });
              } else {
                $.growl.error({ message: "Echec de l'opération. Reprendre!" });
                return false;
              }
           }
        });

        return false;
      }  
      ///////
      function statut_profil(id, etat){

        $.ajax({
           type: "POST",
           url: "<?php echo base_url("administration/adminacl/edit_statut_profil");?>",
           data: "etatok=ok&id="+id+"&new_etat="+etat,
           success: function(msg){
              if(msg==1){
        $("#getcontent").load("<?php echo base_url("administration/adminacl/get_profils")?>");
        $.growl.notice({ message: "Votre suppression effectuée avec succès !" });
              } else {
                $.growl.error({ message: "Echec de l'opération. Reprendre!" });
                return false;
              }
           }
        });

        return false;
      	}  

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

      