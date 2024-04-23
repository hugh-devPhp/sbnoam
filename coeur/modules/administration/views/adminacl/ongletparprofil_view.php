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
                                    <!-- sample modal content -->
                    <div id="EditMyModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
    <?php $attributes = array('id' => 'editmodform1', 'name'=> 'editmodform1', "class"=>"custom-validation"); echo form_open('', $attributes);?>
    <input type="hidden" name="editok" id="editok" value="ok">
    <input type="hidden" name="id_onglet" id="id_onglet" value="">
    <input type="hidden" name="old_pos" id="old_pos" value="">
    <input type="hidden" name="id_module" id="id_module" value="">
    <input type="hidden" name="edit_profil" id="edit_profil" value="<?php echo  $profilselect;?>">
                                                        <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel" >MODIFIER POSITION ONGLET</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                        <label class="form-label">L'onglet</label>
                                        <input type="text" id="longlet" name="longlet" class="form-control" readonly />
                                                            </div>

                                                            <div class="mb-3">
                                        <label class="form-label">Le module</label>
                                        <input type="text" id="lemodule" name="lemodule" class="form-control" readonly />
                                                            </div>

                                                            <div class="mb-3">
                                        <label class="form-label">La position</label>
                                        <input type="number" step=1 min=1 max="1" id="numero" name="numero" class="form-control" required />
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

    <div class="col-12">
    <input type="hidden" name="profilselect" id="profilselect" value="<?php echo  $profilselect;?>">
        <div class="col-4">
            <fieldset style="padding:10px; border:1px dashed #CCCCCC;;width:99%"><legend style="font-size:14px">&nbsp;</legend>
                <form   id="formadd" name="formadd" id="formadd" class="custom-validation">
                    <div class="row"> 
                        <div class="mb-3">
                        <label for="leprofil" class="form-label">Choix du profil</label>
                        <?php echo form_dropdown("leprofil",$levelprofil, $profilselect,"id='leprofil' class='form-select'"); ?>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
    <p>&nbsp;</p>
                                       <!--  <h4 class="card-title">Example</h4>
                                        <p class="card-title-desc">This is an experimental awesome solution for responsive tables with complex data.</p> -->
        <?php if($profilselect!=""){ ?>
                   
    <h4 class="card-title text-center"> Les onglets de <span style="text-transform:uppercase; color: blue;"><?php echo $levelprofil[$profilselect]; ?></span></h4>
            <br>
         <?php  if(count($liste_onglets)>0){ $cpk=0;?>
            
                        <table id="datatable" class="table table-striped table-bordered dt-responsive  nowrap w-100">
                                                    <thead>
                                                    <tr>
                                                        <th width="6%">N&ordm;</th>
                                                        <th>Nom onglet</th>
                                                        <th>Nom module</th>
                                                        <th>N&ordm; position</th>
                                                        <th width="12%">Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
            <?php foreach($liste_onglets as $row){
                    $cpk++;?>
                                    <tr>
                                        <td><?=$cpk;?></td>
                                        <td style="text-transform: uppercase;"><?=$row->designation_onglet;?></td>
                                        <td style="text-transform: uppercase;"><?=$row->nom_module_onglet;?></td>
                                        <td style="text-transform: uppercase;"><?=$row->numero_ordre;?></td>
                                        <td>
                                           <div >
        <?php if(in_array('edit_ongletprofil', is_inarray())) { ?>
            <a href="Javascript:void(0)" data-bs-toggle="modal" data-bs-target="#EditMyModal"class="green" data-name="<?php echo $row->id_liste_onglet;?>" data-nom="<?php echo $row->designation_onglet;?>" data-pos="<?php echo $row->numero_ordre;?>" data-mod="<?php echo $row->nom_module_onglet;?>" data-idmod="<?php echo $row->id_liste_module_onglet;?>" <?php if(isset($lemax[$row->id_liste_module_onglet])) {?> data-maxi="<?php echo $lemax[$row->id_liste_module_onglet];?>" <?php } else {?> data-maxi="1" <?php } ?>><button class="btn btn-success waves-effect waves-light"><i class="bx bx-pencil font-size-16 align-middle "></i></button></a>&nbsp;
        <?php } 
        if(in_array('delete_ongletprofil', is_inarray())) { ?>
        <a href="Javascript:void(0)"  class="red"  data-name="<?php echo $row->id_liste_onglet;?>"><button class="btn btn-danger waves-effect waves-light"><i class="bx bx-trash font-size-16 align-middle"></i></button></a>
          <?php } ?>
                                            </div>
                                        </td>
                                    </tr>

            <?php } ?>
                                                    </tbody>
                                                </table>
                                           
            <?php  }  else {?>
                <div class="alert alert-danger" role="alert">
                                                <p class="text-center">AUCUN ONGLET AFFECTE A CE PROFIL</p>
                                            </div>

            <?php  }  
        }?>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
<script>
    $(document).ready(function(){

        $("#leprofil").on('change',function() { 
       
          var monprofil=$('#leprofil').val();
          $("#getcontent").load("<?php echo base_url("administration/adminacl/get_ongletparprofil")?>/"+monprofil);
          
        });

         $(".green").on('click',function() { 
          var id = $(this).attr("data-name");
          var nomonglet = $(this).attr("data-nom");
          var idmodule = $(this).attr("data-idmod");
          var lemodule = $(this).attr("data-mod");
          var laposition = $(this).attr("data-pos");
          var lemaxi = $(this).attr("data-maxi");

          $('#id_onglet').val(id);
          $('#longlet').val(nomonglet);
          $('#id_module').val(idmodule);
          $('#lemodule').val(lemodule);
          $('#old_pos').val(laposition);
          $('#numero').val(laposition);
          $('#numero').attr('max', lemaxi);
          
        });

         $(".red").on('click',function() { 
          var id = $(this).attr("data-name");

           bootbox.confirm("<span style='color:red;'>Attention!! Attention!!<br></span> Souhaitez-vous réellement supprimer cet enrégistrement?",
                function(result) {
                if (result === true) {DeleteForm(id);} else {}
                });
         });


         $("form#editmodform1").on(
            "submit",
            function()
            {

           var profilselect=$("#profilselect").val();
          $("#validedit").attr("disabled", "disabled").html("Modification des données en cours... ");
          var $this = $(this);

          $.ajax({
                url: "<?php echo base_url();?>administration/adminacl/edit_onglet_parprofil",
                type: $this.attr('method'),
                data: $this.serialize(),
                dataType: 'json', // JSON
                success: function(json) {
                    if(json.reponse === '1') {
              $("body, div").removeClass('modal-open modal-backdrop');
              $('html, body').css({overflow: 'auto', height: 'auto'});
              $("#getcontent").load("<?php echo base_url("administration/adminacl/get_ongletparprofil");?>/"+profilselect);
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

    function DeleteForm(id){
        var profilselect=$("#profilselect").val();
        $.ajax({
           type: "POST",
           url: "<?php echo base_url("administration/adminacl/delete_onglet_parprofil");?>",
           data: "delok=ok&id="+id,
           success: function(msg){
              if(msg==1){
        $("#getcontent").load("<?php echo base_url("administration/adminacl/get_ongletparprofil")?>/"+profilselect);
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

      