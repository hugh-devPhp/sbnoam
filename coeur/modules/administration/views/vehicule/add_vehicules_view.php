<!-- select2 css -->
<link href="<?php echo base_url(); ?>assets/admin/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

<!-- dropzone css -->
<link href="<?php echo base_url(); ?>assets/admin/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

<!-- Bootstrap Css -->
<link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

<!-- App Css-->
<link href="<?php echo base_url(); ?>assets/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p></p>
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"><?php echo $onglet_title;?></h4>

                    <div class="page-title-right">
                        <?php  if(in_array('add_marque', is_inarray())) { ?>
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
                                        <h5 class="modal-title" id="myModalLabel" >AJOUTER UNE MARQUE</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Nom</label>
                                            <input type="text" id="code" name="code" class="form-control" required placeholder="Inscrire la marque" />
                                            <span style="color: #ff2626" id="msg_error_marque"></span>
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
                                    <input type="hidden" name="id_marque" id="id_marque" value="">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel" >MODIFIER UNE MARQUE</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Nom</label>
                                            <input type="text" id="code_edit" name="code" class="form-control" required placeholder="Inscrire la marque" />
                                            <span style="color: #ff2626" id="msg_error_marque_edit"></span>
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


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Informations</h4>
                                <p class="card-title-desc">Fill all information below</p>

                                <form id="form_auto" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <input type="hidden" name="passok" value="ok">
                                                <label for="productname">Marque</label>
                                                <select name="marque" id="marque" class="form-control">
                                                    <option value="" selected>Selection</option>
                                                    <?php
                                                    if(!empty($marques)){
                                                        foreach ($marques as $marque){ ?>
                                                            <option value="<?php echo $marque['id_marque']; ?>" ><?php echo ucwords($marque['code_marque']); ?></option>
                                                        <?php      }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="serie">Modeles</label>
                                                <select name="serie" id="serie" class="form-control">
                                                    <option value="" selected>Selection</option>
                                                    <?php
                                                    if(!empty($modeles)){
                                                        foreach ($modeles as $modele){ ?>
                                                            <option value="<?php echo $modele['id_model']; ?>" ><?php echo ucwords($modele['code_model']); ?></option>
                                                        <?php      }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="moteur">Moteur</label>
                                                <select name="moteur" id="moteur" class="form-control">
                                                    <option value="" selected>Selection</option>
                                                    <?php
                                                    if(!empty($moteurs)){
                                                        foreach ($moteurs as $moteur){ ?>
                                                            <option value="<?php echo $moteur['id_moteur']; ?>" ><?php echo ucwords($moteur['code_moteur']); ?></option>
                                                        <?php      }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="transmission">Transmition</label>
                                                <select name="transmission" id="transmission" class="form-control">
                                                    <option value="" selected>Selection</option>
                                                    <option value="auto" >Automatique</option>
                                                    <option value="manuel" >Manuelle</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="carburant">Carburant</label>
                                                <select name="carburant" id="carburant" class="form-control">
                                                    <option value="" selected>Selection</option>
                                                    <option value="essence" >Essence</option>
                                                    <option value="gazol" >Gazol</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="climatisation">Climatisation</label>
                                                <select name="climatisation" id="climatisation" class="form-control">
                                                    <option value="" selected>Selection</option>
                                                    <option value="1" >Oui</option>
                                                    <option value="0" >Non</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="couleur_ext">Année de fabrication</label>
                                                <input type="number" name="annee" id="annee" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="transmission">Kilométrage</label>
                                                <input type="number" name="kilometrage" id="kilometrage" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="place">Nombre de place</label>
                                                <select name="place" id="place" class="form-control">
                                                    <option value="" selected>Selection</option>
                                                    <?php
                                                    for($i=1; $i<60; $i++){ ?>
                                                        <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                                    <?php      }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="portiere">Nombre de portière</label>
                                                <select name="portiere" id="portiere" class="form-control">
                                                    <option value="" selected>Selection</option>
                                                    <?php
                                                    for($i=1; $i<60; $i++){ ?>
                                                        <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                                    <?php      }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="categorie">Catégorie</label>
                                                <select name="categorie" id="categorie" class="form-control">
                                                    <option value="" selected>Selection</option>
                                                    <option value="1" >Location</option>
                                                    <option value="0" >Vente</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="prix">Prix</label>
                                                <input type="number" name="prix" id="prix" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="img_principale">Image Principale</label>
                                                <input name="img_principale" type="file"  />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="autre_img">Image Principale</label>
                                                <input name="autre_img[]" type="file"  multiple/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                                <label for="prix">Description</label>
                                                <textarea id="elm1" name="area"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Ajouter</button>
                                        <button type="button" id="back" class="btn btn-danger waves-effect waves-light">Retour</button>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
    </div>
</div> <!-- end col -->
</div> <!-- end row -->
<script>
    $(document).ready(function(){

        $("#back").on('click',function() {
            $("#getcontent").load("<?php echo base_url("administration/automobile/get_vehicule")?>");

        });

        $("#marque").on('change',function() {
            var id_marque = $(this).val();
            $.ajax({
                url: "<?php echo base_url();?>administration/configvehicule/liste_model",
                type: "post",
                data: {id:id_marque},
                dataType: 'json', // JSON
                success: function(json) {
                    console.log(json);

                    var option = "<option value=''>Selection</option>";

                    for(var i=0; i<json.length; i++){
                        option += "<option value='"+json[i]['id_model']+"'>"+json[i]['code_model'].toUpperCase()+"</option>";
                    }

                    $('#serie').html(option);
                    //if(json.reponse === '1') {
                    //    $("body, div").removeClass('modal-open modal-backdrop');
                    //    $('html, body').css({overflow: 'auto', height: 'auto'});
                    //    $("#getcontent").load("<?php //echo base_url("administration/configvehicule/get_marque");?>//");
                    //    $.growl.notice({ message: "Votre opération s'est bien effectuée!" });
                    //
                    //} else {
                    //    $.growl.error({ message: "Echec de l'opération, veuillez verifier et reprendre." });
                    //    $("#validedit").attr("disabled", false).html("Enregistrer");
                    //    return false;
                    //}
                }
            });
            //$("#getcontent").load("<?php //echo base_url("administration/automobile/get_vehicule")?>//");

        });


        $('#form_auto').on('submit', function(e){
            e.preventDefault();
            var $this = $(this);
            var formdata = (window.FormData) ? new FormData($this[0]) : null;
            var data = (formdata !== null) ? formdata : $this.serialize();

            data.append('description',tinymce.get('elm1').getContent() );

            $.ajax({
                url: "<?php echo base_url();?>administration/automobile/add_vehicule/",
                type: "post",
                contentType: false, // obligatoire pour de l'upload
                processData: false, // obligatoire pour de l'upload
                dataType: 'json', // JSON
                data: data,
                success: function(json) {
                    // console.log(json);
                    //$('#bs-example-modal-lg').modal('hide');
                    if(json===true){
                        $("#getcontent").load("<?php echo base_url("administration/automobile/get_vehicule/")?>");
                        $.growl.notice({ message: "Votre suppression effectuée avec succès !" });
                    } else {
                        $.growl.error({ message: "Echec de l'opération. Reprendre!" });
                        return false;
                    }

                }
            });
        })
    });

</script>

<!-- Required datatable js -->
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>


<!-- select 2 plugin -->
<script src="<?php echo base_url(); ?>assets/admin/libs/select2/js/select2.min.js"></script>

<!-- dropzone plugin -->
<script src="<?php echo base_url(); ?>assets/admin/libs/dropzone/min/dropzone.min.js"></script>

<!--tinymce js-->
<script src="<?php echo base_url(); ?>assets/admin/libs/tinymce/tinymce.min.js"></script>

<!-- init js -->
<script src="<?php echo base_url(); ?>assets/admin/js/pages/form-editor.init.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/pages/ecommerce-select2.init.js"></script>


      