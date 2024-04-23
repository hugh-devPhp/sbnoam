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
                                    <?php if(in_array('add_menu', is_inarray())) { ?>
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bx bx-plus font-size-16 align-middle me-2"></i>Ajouter</button>
                                    <?php } ?>  
                                    <!-- sample modal content -->
                    <div id="myModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
    <?php $attributes = array('id' => 'addoform', 'name'=> 'addoform', "class"=>"custom-validation"); 
    echo form_open('', $attributes);?>
    <input type="hidden" name="passok" id="passok" value="ok">
                                                        <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel" >AJOUTER DU MENU</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                        <label class="form-label">Nom du menu</label>
                                        <input type="text" id="username" name="username" class="form-control" required placeholder="Inscrire le nom du menu" />
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
                                                            <div class="mb-3">
                                                                <div class="templating-select">
                                                        <label class="form-label">Bloc parent</label>
                                                        <select class="form-control" name="blocmenu" id="blocmenu" required>
                                                            <option value="">Selection ...</option>
                                                            <?php foreach ($liste_blocmenu as $lines) {?>
                            <option value="<?php echo $lines->id_blocmenu;?>"><?php echo mb_strtoupper($lines->nom_blocmenu);?></option>
                                                            <?php } ?>
                                                        </select>
                                                        </div>
                                                            </div>
                                                            <div class="mb-3" id="positmenu">
                        <label class="form-label">Position du menu</label>
                        <input type="number" step=1 min=1  class="form-control"  name="position_menu" id="position_menu" value="" required>
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
    <input type="hidden" name="id_menu" id="id_menu" value="">
    <input type="hidden" name="oldbloc" id="oldbloc" value="">
    <input type="hidden" name="old_pos" id="old_pos" value="">


                                                        <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel" >MODIFIER DE MENU</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                           <div class="mb-3">
                                        <label class="form-label">Nom blocmenu</label>
                                        <input type="text" id="username_edit" name="username" class="form-control" required />
                                                            </div>
                                                            <div class="mb-3">
        
                                                        <div class="templating-select">
                                                        <label class="form-label">Module parent</label>
                                                        <select class="form-control" name="lemodule" id="lemodule_edit" required>
                                                            <option value="">Selection ...</option>
                                                            <?php foreach ($liste_module_all as $valor) {?>
                            <option value="<?php echo $valor->id_liste_module;?>"><?php echo mb_strtolower($valor->designation_module);?></option>
                                                            <?php } ?>
                                                        </select>
                                                        </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <div class="templating-select">
                                                        <label class="form-label">Bloc parent</label>
                                                        <select class="form-control" name="blocmenu" id="blocmenu_edit" required>
                                                            <option value="">Selection ...</option>
                                                            <?php foreach ($liste_blocmenu as $lines) {?>
                            <option value="<?php echo $lines->id_blocmenu;?>"><?php echo mb_strtoupper($lines->nom_blocmenu);?></option>
                                                            <?php } ?>
                                                        </select>
                                                        </div>
                                                            </div>
                                                            <div class="mb-3" id="positmenu_2">
                <label class="form-label">Position du menu</label>
                <input type="number" step=1 min=1 max=""  class="form-control"  name="position_menu" id="position_menu_edit" value="" required>
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
        
                                       <!--  <h4 class="card-title">Example</h4>
                                        <p class="card-title-desc">This is an experimental awesome solution for responsive tables with complex data.</p> -->
        
                                       

                        <table id="datatable" class="table table-striped table-bordered dt-responsive  nowrap w-100">
                                                    <thead>
                                                    <tr>
                                                        <th width="6%">N&ordm;</th>
                                                        <th>Libellé du menu</th>
                                                        <th>position</th>
                                                        <th>Module</th>
                                                        <th>Titre du bloc</th>
                                                        <th width="12%">Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
            <?php if($liste_menu>0){ $cpk=0;
                foreach($liste_menu as $row){

                    if(isset($maxbloc[$row->blocmenu_id])) $topmax=$maxbloc[$row->blocmenu_id];
                    else $topmax="";
                    $cpk++;?>
                                    <tr>
                                        <td><?=$cpk;?></td>
                                        <td style="text-transform: uppercase;"><?=$row->nom_element;?></td>
                                        <td><?=$row->numero_element;?></td>
                                        <td style="text-transform: uppercase;"><?=$row->modulenom_element;?></td>
                                        <td style="text-transform: uppercase;"><?=$row->blocmenu_nom;?></td>
                                        <td>
                                           <div >
        <?php if(in_array('edit_menu', is_inarray())) { ?>
            <a href="Javascript:void(0)" data-bs-toggle="modal" data-bs-target="#EditMyModal"class="green" data-name="<?php echo $row->id_element_blocmenu;?>" data-nom="<?php echo $row->nom_element;?>" data-pos="<?php echo $row->numero_element;?>" data-mod="<?php echo $row->liste_module_id;?>" data-blok="<?php echo $row->blocmenu_id;?>" data-max="<?php echo $topmax;?>"><button class="btn btn-success waves-effect waves-light"><i class="bx bx-pencil font-size-16 align-middle "></i></button></a>&nbsp;
        <?php } 
        if(in_array('delete_menu', is_inarray())) { ?><a href="Javascript:void(0)"  class="red"  data-name="<?php echo $row->id_element_blocmenu;?>"><button class="btn btn-danger waves-effect waves-light"><i class="bx bx-trash font-size-16 align-middle"></i></button></a>
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
          var blokid = $(this).attr("data-blok");
          var moduleid = $(this).attr("data-mod");
          var numero = $(this).attr("data-pos");
          var topmaxi = $(this).attr("data-max");
          var maxi = parseInt(topmaxi);


          $('#id_menu').val(id);
          $('#username_edit').val(nom);
          $('#lemodule_edit').val(moduleid);
          $('#blocmenu_edit').val(blokid);
          $('#oldbloc').val(blokid);
          $('#position_menu_edit').val(numero);
          $('#maxpos_edit').val(topmaxi);
          $('#old_pos').val(numero);
          $('#position_menu_edit').attr('max', maxi);
          
        });

        $("#blocmenu").on('change',function() {
          var id =  $('#blocmenu').val();
          $.ajax({
            url: "<?php echo base_url();?>administration/configuration/do_maxposition",
            type: 'POST',
            data: "lapos=ok&bloc="+id,
            dataType: 'html',
            success: function(data){
                $("#positmenu").html(data);
            },
            error: function(){
                alert('erreur');
            }
          });
          
        });

        $("#blocmenu_edit").on('change',function() {
          var id =  $('#blocmenu_edit').val();
          var id_menu =  $('#id_menu').val();
          $.ajax({
            url: "<?php echo base_url();?>administration/configuration/do_maxposition_edit",
            type: 'POST',
            data: "laposedit=ok&bloc="+id+"&id_menu="+id_menu,
            dataType: 'html',
            success: function(data){
                $("#positmenu_2").html(data);
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
          bootbox.alert("le nom du bloc module est obligatoire");
          $("#username").css({ "background-color": "#f0e68c"});
          return false;
          }

          $("#okvalid").attr("disabled", "disabled").html("Enregistrement des données en cours... ");
          var $this = $(this);

          $.ajax({
                url: "<?php echo base_url();?>administration/configuration/add_menu",
                type: $this.attr('method'),
                data: $this.serialize(),
                dataType: 'json', // JSON
                success: function(json) {
                    if(json.reponse === '1') {
              // $("#lg-modal1").modal('hide');
              $("body, div").removeClass('modal-open modal-backdrop');
              $('html, body').css({overflow: 'auto', height: 'auto'});
              $("#getcontent").load("<?php echo base_url("administration/configuration/get_menu")?>");
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
                url: "<?php echo base_url();?>administration/configuration/edit_menu",
                type: $this.attr('method'),
                data: $this.serialize(),
                dataType: 'json', // JSON
                success: function(json) {
                    if(json.reponse === '1') {
              $("body, div").removeClass('modal-open modal-backdrop');
              $('html, body').css({overflow: 'auto', height: 'auto'});
              $("#getcontent").load("<?php echo base_url("administration/configuration/get_menu");?>");
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
           url: "<?php echo base_url("administration/configuration/delete_menu");?>",
           data: "delok=ok&id="+id,
           success: function(msg){
              if(msg==1){
        $("#getcontent").load("<?php echo base_url("administration/configuration/get_menu")?>");
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

      