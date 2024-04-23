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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="product-detai-imgs">
                                            <div class="row">
                                                <div class="col-md-2 col-sm-3 col-4">
                                                    <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                        <a class="nav-link active" id="product-1-tab" data-bs-toggle="pill" href="#product-1" role="tab" aria-controls="product-1" aria-selected="true">
                                                            <img src="<?php echo base_url("uploads/vehicules/").$vehicule['image_principale_auto']?>" alt="" class="img-fluid mx-auto d-block rounded">
                                                        </a>
                                                        <?php
                                                        if(!empty($vehicule['images'])){
                                                            $i=1;
                                                            foreach ($vehicule['images'] as $image){
                                                                $i++;
                                                        ?>
                                                        <a class="nav-link" id="product-<?php echo $i;?>-tab" data-bs-toggle="pill" href="#product-<?php echo $i;?>" role="tab" aria-controls="product-2" aria-selected="false">
                                                            <img src="<?php echo base_url("uploads/vehicules/").$image['image_auto']?>" alt="" class="img-fluid mx-auto d-block rounded">
                                                        </a>
                                                        <?php

                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        <div class="tab-pane fade show active" id="product-1" role="tabpanel" aria-labelledby="product-1-tab">
                                                            <div>
                                                                <img src="<?php echo base_url("uploads/vehicules/").$vehicule['image_principale_auto']?>" alt="" class="img-fluid mx-auto d-block">
                                                            </div>
                                                        </div>
                                                        <?php
                                                        if(!empty($vehicule['images'])){
                                                            $i=1;
                                                        foreach ($vehicule['images'] as $image){
                                                            $i++;
                                                        ?>
                                                        <div class="tab-pane fade" id="product-<?php echo $i;?>" role="tabpanel" aria-labelledby="product-<?php echo $i;?>-tab">
                                                            <div>
                                                                <img src="<?php echo base_url("uploads/vehicules/").$image['image_auto']?>" alt="" class="img-fluid mx-auto d-block">
                                                            </div>
                                                        </div>
                                                            <?php

                                                        }
                                                        }
                                                        ?>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="mt-4 mt-xl-3">
                                            <a href="javascript: void(0);" class="text-primary"><?php if($vehicule['en_location'] == "0"){ echo "Vente"; }else{ echo "Location";} ?></a>
                                            <h4 class="mt-1 mb-3"><?php echo $vehicule['code_marque']." ".$vehicule['code_model']; ?></h4>

<!--                                            <p class="text-muted mb-4">( 50 vues )</p>-->
                                            <h5 class="mb-4">Price : <span class="text-muted me-2"></span> <b><?php echo number_format($vehicule['prix_auto'], 0, ',', ' '); ?>Fcfa</b></h5>
                                            <div>

                                            </div>
                                            <p class="text-muted mb-4">
                                            <div class="mt-5">
                                                <h5 class="mb-3">Fiche technique :</h5>

                                                <div class="table-responsive">
                                                    <table class="table mb-0 table-bordered">
                                                        <tbody>
                                                        <tr>
                                                            <th scope="row">Année de Fabrication</th>
                                                            <td><?php echo $vehicule['annee_auto']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" style="width: 400px;">Moteur</th>
                                                            <td><?php echo $vehicule['code_moteur']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" style="width: 400px;">Transmission</th>
                                                            <td><?php if($vehicule['transmission_auto'] == "auto"){ echo "Automatique"; }else{ echo "Manuel";} ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" style="width: 400px;">Carburant</th>
                                                            <td><?php echo $vehicule['carburant_auto']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" style="width: 400px;">Climatisation</th>
                                                            <td><?php if($vehicule['climatisation_auto'] == "0"){ echo "Non"; }else{ echo "Oui";} ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Nombre de Place</th>
                                                            <td><?php echo $vehicule['nb_place_auto']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Nombre de Portière</th>
                                                            <td><?php echo $vehicule['nb_porte_auto']; ?></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="mt-5">
                                    <h5 class="mb-3">Description :</h5>

                                    <div class="table-responsive">
                                        <?php echo $vehicule['description_auto']; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end row -->

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


        $('#form_auto').on('submit', function(e){
            e.preventDefault();
            var $this = $(this);
            var formdata = (window.FormData) ? new FormData($this[0]) : null;
            var data = (formdata !== null) ? formdata : $this.serialize();
            // console.log(data);
            $.ajax({
                url: "<?php echo base_url();?>administration/automobile/add_vehicule/",
                type: "post",
                contentType: false, // obligatoire pour de l'upload
                processData: false, // obligatoire pour de l'upload
                dataType: 'json', // JSON
                data: data,
                success: function(json) {
                    console.log(json);
                    //$('#bs-example-modal-lg').modal('hide');
                    //$("#get_content").load("<?php //echo base_url("candidats/get_candidat/") ?>//"+id_session+"/"+id_examen);
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


      