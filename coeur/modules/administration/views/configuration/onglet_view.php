            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <p></p>
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18"><?php echo $onglet_title;?></h4>

                                    <div class="page-title-right">
                                    <?php if(in_array('add_onglet', is_inarray())) { ?>
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bx bx-plus font-size-16 align-middle me-2"></i>Ajouter</button>&nbsp;&nbsp;
                                    <button type="button" class="btn btn-warning waves-effect waves-light" id="maj_methode"><i class="bx bx-revision font-size-16 align-middle me-2"></i>Actualisation des methodes</button>
                                   <?php } ?>
                                    <!-- sample modal content -->
                    <div id="myModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
    <?php $attributes = array('id' => 'addoform', 'name'=> 'addoform', "class"=>"custom-validation"); 
    echo form_open('', $attributes);?>
    <input type="hidden" name="passok" id="passok" value="ok">
                                                        <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel" >AJOUTER ONGLET</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                    <div class="mb-3">
                        <label class="form-label">Nom onglet</label>
                        <input type="text" id="username" name="username" class="form-control" required placeholder="Inscrire le nom de l'onglet" />
                                    </div>
                                    <div class="mb-3">
                                            <div class="templating-select">
                                            <label class="form-label">Module parent</label>
                                            <select class="form-control" name="lemodule" id="lemodule" required>
                                                <option value="">Selection ...</option>
                                                            <?php foreach ($liste_module as $valor) {?>
                            <option value="<?php echo $valor->id_liste_module;?>"><?php echo mb_strtolower($valor->designation_module);?></option>
                                                            <?php } ?>
                                            </select>
                                                        </div>
                                    </div>
                                    <div class="mb-3" id="parmodule">
                                    <div class="templating-select">
                                            <label class="form-label">Methode d'appel</label>
                                            <select class="form-control" name="lamethode" id="lamethode" required>
                                                <option value="">Selection ...</option>
                                            </select>
                                                        </div>
                                    <br>
                        <label class="form-label">Position de l'onglet</label>
                        <input type="number" step=1 min=1  class="form-control"  name="position_onglet" id="position_onglet" value="" required>
                        <input type="hidden" name="maxpos" id="maxpos" value="">
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
    <?php $attributes = array('id' => 'modform', 'name'=> 'modform', "class"=>"custom-validation"); echo form_open('', $attributes);?>
    <input type="hidden" name="editok" id="editok" value="ok">
    <input type="hidden" name="id_onglet" id="id_onglet" value="">
    <input type="hidden" name="old_pos" id="old_pos" value="">
    <input type="hidden" name="old_module" id="old_module" value="">

                                                        <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel" >MODIFIER UN ONGLET</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                    <div class="mb-3">
                        <label class="form-label">Nom onglet</label>
                        <input type="text" id="username_edit" name="username" class="form-control" required/>
                                    </div>
                                    <div class="mb-3">
                                            <div class="templating-select">
                                            <label class="form-label">Module parent</label>
                                            <select class="form-control" name="lemodule" id="lemodule_edit" required>
                                                <option value="">Selection ...</option>
                                                            <?php foreach ($liste_module as $valor) {?>
                            <option value="<?php echo $valor->id_liste_module;?>"><?php echo mb_strtolower($valor->designation_module);?></option>
                                                            <?php } ?>
                                            </select>
                                                        </div>
                                    </div>
                                    <div class="mb-3" id="parmodule_2">
                                    <div class="templating-select">
                                            <label class="form-label">Methode d'appel</label>
                                            <select class="form-control" name="lamethode" id="lamethode_edit" required>
                                                <option value="">Selection ...</option>
                                            </select>
                                                        </div>
                                    <br>
                        <label class="form-label">Position de l'onglet</label>
                        <input type="number" step=1 min=1  class="form-control"  name="position_onglet" id="position_onglet_edit" value="" required>
                        <input type="hidden" name="maxpos" id="maxpos_edit" value="">
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
        
                        <table id="datatable" class="table table-striped table-bordered dt-responsive  nowrap w-100">
                                                    <thead>
                                                    <tr>
                                                        <th width="6%">N&ordm;</th>
                                                        <th>Libellé de l'onglet</th>
                                                        <th>Numero position</th>
                                                        <th>Module parent</th>
                                                        <th width="12%">Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                    <?php
                if($liste_onglet>0){ $cpk=0;
                foreach($liste_onglet as $row){
                    $cpk++;?>
                                    <tr>
                                        <td><?=$cpk;?></td>
                                        <td style="text-transform: uppercase;"><?=$row->designation_onglet;?></td>
                                        <td><?=$row->numero_ordre;?></td>
                                        <td style="text-transform: uppercase;"><?=$row->nom_module_onglet;?></td>
                                        <td>
                                           <div >
        <?php if(in_array('edit_onglet', is_inarray())) { ?>
            <a href="Javascript:void(0)" data-bs-toggle="modal" data-bs-target="#EditMyModal"class="green" data-name="<?php echo $row->id_liste_onglet;?>" data-nom="<?php echo $row->designation_onglet;?>" data-pos="<?php echo $row->numero_ordre;?>" data-idmod="<?php echo $row->id_liste_module_onglet;?>" data-modul="<?php echo $row->nom_module_onglet;?>"><button class="btn btn-success waves-effect waves-light"><i class="bx bx-pencil font-size-16 align-middle "></i></button></a>&nbsp;
        <?php } 
        if(in_array('delete_onglet', is_inarray())) { ?>
            <a href="Javascript:void(0)"  class="red"  data-name="<?php echo $row->id_liste_onglet;?>"><button class="btn btn-danger waves-effect waves-light"><i class="bx bx-trash font-size-16 align-middle"></i></button></a>
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

        //////
      $("#maj_methode").on('click',function() {
          bootbox.confirm("Souhaitez-vous lancer l'actualisation des methodes?",
                function(result) {
                if (result === true) {Actu_methode();} else {}
                });
            });

      
        //////////////////////
        $(".green").on('click',function() { 

          var id_onglet = $(this).attr("data-name");
          var nom_onglet = $(this).attr("data-nom");
          var position = $(this).attr("data-pos");
          var id_module = $(this).attr("data-idmod");

          $('#id_onglet').val(id_onglet);
          $('#old_pos').val(position);
          $('#username_edit').val(nom_onglet);
          $('#lemodule_edit').val(id_module);
          $('#old_module').val(id_module);

           $.ajax({
            url: "<?php echo base_url();?>administration/configuration/do_listemethod",
            type: 'POST',
            data: "lotact=ok&id_onglet="+id_onglet,
            dataType: 'html',
            success: function(data){
                $("#parmodule_2").html(data);
            },
            error: function(){
                alert('erreur');
            }
          });

        });

       //////////////////////
         $("#lemodule").on('change',function() {
          var id =  $('#lemodule').val();
          $.ajax({
            url: "<?php echo base_url();?>administration/configuration/do_lotonglet",
            type: 'POST',
            data: "lotong=ok&moduleid="+id,
            dataType: 'html',
            success: function(data){
                $("#parmodule").html(data);
            },
            error: function(){
                alert('erreur');
            }
          });
          
        });

          //////////////////////
         $("#lemodule_edit").on('change',function() {
          var id =  $('#lemodule_edit').val();
          var id_onglet =  $('#id_onglet').val();
          $.ajax({
            url: "<?php echo base_url();?>administration/configuration/do_lotonglet_2",
            type: 'POST',
            data: "lotong2=ok&moduleid="+id+"&ongletid="+id_onglet,
            dataType: 'html',
            success: function(data){
                $("#parmodule_2").html(data);
            },
            error: function(){
                alert('erreur');
            }
          });
          
        });
        

         $(".red").on('click',function() { 
          var id = $(this).attr("data-name");

           bootbox.confirm("<span style='color:red;'>Attention!! Attention!!<br></span> Souhaitez-vous réellement supprimer cet enrégistrement?",
                function(result) {
                if (result === true) {DeleteForm(id);} else {}
                });
         });

         $("form#addoform").on(
            "submit",
            function(e)
                     {
                           // On empêche le navigateur de soumettre le formulaire
                         e.preventDefault();

                         // alert();
                         // return false;

          var username= $('#username').val().trim();
          if(username==""){
          bootbox.alert("le nom de l'onglet est obligatoire");
          $("#username").css({ "background-color": "#f0e68c"});
          return false;
          }

          $("#okvalid").attr("disabled", "disabled").html("Enregistrement des données en cours... ");
          var $this = $(this);

          $.ajax({
                url: "<?php echo base_url();?>administration/configuration/add_onglet",
                type: $this.attr('method'),
                data: $this.serialize(),
                dataType: 'json', // JSON
                success: function(json) {
                    if(json.reponse === '1') {
              // $("#lg-modal1").modal('hide');
              $("body, div").removeClass('modal-open modal-backdrop');
              $('html, body').css({overflow: 'auto', height: 'auto'});
              $("#getcontent").load("<?php echo base_url("administration/configuration/get_onglet")?>");
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



         $("form#modform").on(
            "submit",
            function(e)
            {

            e.preventDefault();

          var username= $('#username_edit').val().trim();
          if(username==""){
          bootbox.alert("le nom du module est obligatoire");
          $("#username_edit").css({ "background-color": "#f0e68c"});
          return false;
          }

          $("#validedit").attr("disabled", "disabled").html("Modification des données en cours... ");
          var $this = $(this);

          $.ajax({
                url: "<?php echo base_url();?>administration/configuration/edit_onglet",
                type: $this.attr('method'),
                data: $this.serialize(),
                dataType: 'json', // JSON
                success: function(json) {
                    if(json.reponse === '1') {
              $("body, div").removeClass('modal-open modal-backdrop');
              $('html, body').css({overflow: 'auto', height: 'auto'});
              $("#getcontent").load("<?php echo base_url("administration/configuration/get_onglet");?>");
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

        $.ajax({
           type: "POST",
           url: "<?php echo base_url("administration/configuration/delete_onglet");?>",
           data: "delok=ok&id="+id,
           success: function(msg){
              if(msg==1){
        $("#getcontent").load("<?php echo base_url("administration/configuration/get_onglet")?>");
        $.growl.notice({ message: "Votre suppression effectuée avec succès !" });
              } else {
                $.growl.error({ message: "Echec de l'opération. Reprendre!" });
                return false;
              }
           }
        });

        return false;
      }  

       function Actu_methode()
      {
          $.ajax({
             type: "POST",
             url: "<?php echo base_url("administration/configuration/do_actualiser_methode");?>",
             data: "actu=ok",
             success: function(msg){
                          if(msg==1)
                         {
              $("#getcontent").load("<?php echo base_url("administration/configuration/get_onglet") ?>");
              $.growl.notice({ message: "Votre actualisation a été un succès!" });
                          }
                          else 
                          {
              $.growl.error({ message: "Echec de votre opération !" });
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

      