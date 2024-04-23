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

                          </div>

                </div>

                <!--  <h4 class="card-title">Example</h4>
                 <p class="card-title-desc">This is an experimental awesome solution for responsive tables with complex data.</p> -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Informations</h4>
                                <p class="card-title-desc">Remplissez toutes les informations ci-dessous</p>

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
                                                            <option value="<?php echo $marque['id_marque']; ?>" <?php if(isset($auto['marque_id']) && $auto['marque_id'] == $marque['id_marque']){ echo "selected"; }?> ><?php echo ucwords($marque['code_marque']); ?></option>
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
                                                            <option value="<?php echo $modele['id_model']; ?>" <?php if(isset($auto['model_id']) && $auto['model_id'] == $modele['id_model']){ echo "selected"; }?> ><?php echo ucwords($modele['code_model']); ?></option>
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
                                                            <option value="<?php echo $moteur['id_moteur']; ?>" <?php if(isset($auto['moteur_id']) && $auto['moteur_id'] == $moteur['id_moteur']){ echo "selected"; }?>><?php echo ucwords($moteur['code_moteur']); ?></option>
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
                                                    <option value="" >Selection</option>
                                                    <option value="auto" <?php if(isset($auto['transmission_auto']) && $auto['transmission_auto'] == "auto"){ echo "selected"; }?> >Automatique</option>
                                                    <option value="manuel" <?php if(isset($auto['transmission_auto']) && $auto['transmission_auto'] == "manuel"){ echo "selected"; }?>>Manuelle</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="carburant">Carburant</label>
                                                <select name="carburant" id="carburant" class="form-control">
                                                    <option value="" >Selection</option>
                                                    <option value="essence" <?php if(isset($auto['carburant_auto']) && $auto['carburant_auto'] == "essence"){ echo "selected"; }?> >Essence</option>
                                                    <option value="gazol" <?php if(isset($auto['carburant_auto']) && $auto['carburant_auto'] == "gazol"){ echo "selected"; }?>>Gazol</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="climatisation">Climatisation</label>
                                                <select name="climatisation" id="climatisation" class="form-control">
                                                    <option value="" >Selection</option>
                                                    <option value="1" <?php if(isset($auto['climatisation_auto']) && $auto['climatisation_auto'] == "1"){ echo "selected"; }?>>Oui</option>
                                                    <option value="0" <?php if(isset($auto['climatisation_auto']) && $auto['climatisation_auto'] == "0"){ echo "selected"; }?>>Non</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="couleur_ext">Année de fabrication</label>
                                                <input type="number" name="annee" id="annee" value="<?php if(isset($auto['annee_auto'])){ echo $auto['annee_auto']; }?>"  class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="transmission">Kilométrage</label>
                                                <input type="number" name="kilometrage" id="kilometrage" value="<?php if(isset($auto['kilometrage_auto'])){ echo $auto['kilometrage_auto']; }?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="place">Nombre de place</label>
                                                <select name="place" id="place" class="form-control">
                                                    <option value="" >Selection</option>
                                                    <?php
                                                    for($i=1; $i<60; $i++){ ?>
                                                        <option value="<?php echo $i; ?>" <?php if(isset($auto['nb_place_auto']) && $auto['nb_place_auto'] == $i){ echo "selected"; }?> ><?php echo $i; ?></option>
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
                                                        <option value="<?php echo $i; ?>" <?php if(isset($auto['nb_porte_auto']) && $auto['nb_porte_auto'] == $i){ echo "selected"; }?> ><?php echo $i; ?></option>
                                                    <?php      }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="categorie">Catégorie</label>
                                                <select name="categorie" id="categorie" class="form-control">
                                                    <option value="" >Selection</option>
                                                    <option value="1" <?php if(isset($auto['en_location']) && $auto['en_location'] == "1"){ echo "selected"; }?>>Location</option>
                                                    <option value="0" <?php if(isset($auto['en_location']) && $auto['en_location'] == "0"){ echo "selected"; }?>>Vente</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="prix">Prix</label>
                                                <input type="number" name="prix" id="prix" value="<?php if(isset($auto['prix_auto'])){ echo $auto['prix_auto']; }?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-3" style="text-align: center !important;">
                                            <img class="img-fluid" style="height:200px !important;" src="<?php echo base_url("uploads/vehicules/").$auto['image_principale_auto']?>" alt="Image Description">
                                            <div class="mb-3">
                                                <label for="img_principale">Image Principale</label>
                                                <input name="img_principale" type="file"  />
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
<!--                                            --><?php
//                                            echo "<pre>";
//                                            var_dump($images);
//                                            echo "</pre>";
//                                            ?>
                                            <div style="width: auto;overflow-x: auto;">
                                                <div class="images" style="white-space: nowrap;">
                                                    <?php
                                                    if(!empty($images)){
                                                        foreach ($images as $image){ ?>
                                                            <div style="display: inline-block; margin-right: 10px; text-align: center" id="<?php echo $image['id_img']?>">
                                                                <img class="img-fluid"  src="<?php echo base_url("uploads/vehicules/").$image['image_auto']; ?>" alt=<?php echo $image['image_auto']; ?>" style="height:200px !important; margin-right: 10px; " >
                                                                <button type="button" class="btn btn-sm btn-danger del" data-id="<?php echo $image['id_img']?>" style="display: block; margin-top: 5px; ">Supprimer</button>
                                                            </div>
                                                        <?php     }
                                                    }
                                                    ?>

                                                    <!-- Ajoutez autant d'images que nécessaire -->
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="autre_img">Autres images</label>
                                                <input name="autre_img[]" type="file"  multiple/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                                <label for="prix">Description</label>
                                                <textarea id="elm1" name="area"><?php if(isset($auto['description_auto'])){ echo $auto['description_auto']; }?></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Modifier</button>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                url: "<?php echo base_url('administration/automobile/edit_vehicule/').$auto['id_auto'];?>",
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

        $('.del').on('click', function(){

            var id = $(this).attr('data-id');
            Swal.fire({
                title: "Êtes-vous sur ?",
                text: "Vous ne pouvez plus revenir en arrière!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Oui, Supprimer",
                cancelButtonText: "Annuler"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?php echo base_url('administration/automobile/delete_image/');?>"+id,
                        type: "post",
                        dataType: 'json', // JSON
                        success: function(json) {

                            // Swal.fire({
                            //     title: "Supprimé!!",
                            //     text: "Votre opération a été effectué",
                            //     icon: "success"
                            // });
                            // location.reload();
                            $.growl.notice({ message: "Votre opération s'est bien effectuée!" });
                            $('#'+id).remove();
                            // var option = "<option value=''>Selection</option>";
                            //
                            // for(var i=0; i<json.length; i++){
                            //     option += "<option value='"+json[i]['id_model']+"'>"+json[i]['code_model'].toUpperCase()+"</option>";
                            // }
                            //
                            // $('#serie').html(option);
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


      