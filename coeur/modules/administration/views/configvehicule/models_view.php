
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p></p>
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"><?php echo $onglet_title;?></h4>

                    <div class="page-title-right">
                        <?php  if(in_array('add_model', is_inarray())) { ?>
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
                                            <label class="form-label">Marque</label>
                                            <?php echo form_dropdown("marque", $marques, "","id='marque'  class='form-control' "); ?>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px">
                                            <div class="col-lg-10">
                                                <input type="text" name="model[]" class="form-control" placeholder="Inscrire le model">
                                            </div>
                                            <div class="col-lg-2" style="float: left">
                                                <button type="button" id="add" class="btn btn-primary">+</button>
                                            </div>
                                        </div>
                                        <div id="div_model"></div>
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
                                    <input type="hidden" name="id_model" id="id_model" value="">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel" >MODIFIER UN MODEL</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Marque</label>
                                            <?php echo form_dropdown("marque", $marques, "","id='marque_edit'  class='form-control' "); ?>
                                        </div>
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

                <table id="datatable" class="table table-striped table-bordered dt-responsive  nowrap w-100">
                    <thead>

                    <tr>
                        <th width="5%">N&ordm;</th>
                        <th>Model</th>
                        <th>Marque</th>
                        <th>Statut</th>
                        <th style="width: 10% !important;"> Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($models) && !empty($models)){ $cpk=0;
                        foreach($models as $row){
                            $cpk++;?>
                            <tr>
                                <td><?=$cpk;?></td>
                                <td style="text-transform: uppercase;"><?=$row['code_model'];?></td>
                                <td style="text-transform: uppercase;"><?=$row['code_marque'];?></td>
                                <td style="text-transform: uppercase;"><?php if($row['activation_model']==1) echo "Active"; else echo "Inactive";?></td>
                                <td>
                                    <div >
                                        <?php if(in_array('edit_statut_model', is_inarray())) { ?>
                                            <a href="Javascript:void(0)"  class="blues" data-name="<?php echo $row['id_model'];?>" data-act="<?php echo $row['activation_model'];?>">
                                                <?php if($row['activation_model']==1){?><button class="btn btn-warning waves-effect waves-light"><i class="bx bx-power-off font-size-16 align-middle "></i></button><?php } else {?><button class="btn btn-primary waves-effect waves-light"><i class="bx bxs-torch font-size-16 align-middle "></i></button><?php } ?></a>&nbsp;
                                        <?php }
                                        if(in_array('edit_model', is_inarray())) { ?><a href="Javascript:void(0)" data-bs-toggle="modal" data-bs-target="#EditMyModal" class="green" data-name="<?php echo $row['id_model'];?>" data-nom="<?php echo $row['code_model']; ?>" data-marque="<?php echo $row['id_marque']; ?>"  data-act="<?php echo $row['activation_model'];?>" ><button class="btn btn-success waves-effect waves-light"><i class="bx bx-pencil font-size-16 align-middle "></i></button></a>&nbsp;
                                        <?php }
                                        if(in_array('delete_model', is_inarray())) { ?>
                                            <a href="Javascript:void(0)"  class="red"  data-name="<?php echo $row['id_model'];?>"><button class="btn btn-danger waves-effect waves-light"><i class="bx bx-trash font-size-16 align-middle"></i></button></a>
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
        var i=0;
        $(".green").on('click',function() {
            var id = $(this).attr("data-name");
            var nom = $(this).attr("data-nom");
            var marque = $(this).attr("data-marque");
            var activa = $(this).attr("data-act");

            $('#id_model').val(id);
            $('#code_edit').val(nom);
            $('#marque_edit').val(marque);
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

        $('#code').on('blur', function (){
            var code = $(this).val();

            $.ajax({
                url: "<?php echo base_url();?>administration/configvehicule/verification_marque",
                type: "post",
                data: {"code": code, "passok":"ok"},
                dataType: 'json', // JSON
                success: function(json) {
                    // console.log(json);
                    // return false;
                    if(json.reponse === '1') {
                        // $("#lg-modal1").modal('hide');
                        $("#okvalid").attr("disabled", "disabled");
                        $('#msg_error_marque').html('la marque existe déjà dans la base de donnée.');

                    } else {
                        $("#okvalid").attr("disabled", false);
                        $('#msg_error_marque').html('');
                    }
                }
            });


            return false;
        });

        $("#add").on('click', function () {
            i++;
            var model = '<div class="row" id="'+i+'" style="margin-bottom: 15px">'+
                '<div class="col-lg-10">'+
                '<input type="text" name="model[]" class="form-control" placeholder="Inscrire le model">'+
                '</div>'+
                '<div class="col-lg-2">'+
                '<button type="button" data-id="'+i+'" class="btn btn-danger remove">-</button>'+
                '</div>'+
                '</div>';
            $("#div_model").append(model)
        });

        $("#div_model").on('click', '.remove', function () {
            var number = $(this).attr('data-id')
            $('#'+number).remove();

        });

        $("form#addmodform1").on(
            "submit",
            function(e)
            {
                // On empêche le navigateur de soumettre le formulaire
                e.preventDefault();
                // alert();
                // return false;

                $("#okvalid").attr("disabled", "disabled").html("Enregistrement des données en cours... ");
                var $this = $(this);

                $.ajax({
                    url: "<?php echo base_url();?>administration/configvehicule/add_model",
                    type: $this.attr('method'),
                    data: $this.serialize(),
                    dataType: 'json', // JSON
                    success: function(json) {


                        if(json.reponse === '1') {
                            // $("#lg-modal1").modal('hide');
                            $("body, div").removeClass('modal-open modal-backdrop');
                            $('html, body').css({overflow: 'auto', height: 'auto'});
                            $("#getcontent").load("<?php echo base_url("administration/configvehicule/get_model")?>");
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



                $("#validedit").attr("disabled", "disabled").html("Modification des données en cours... ");
                var $this = $(this);

                $.ajax({
                    url: "<?php echo base_url();?>administration/configvehicule/edit_model",
                    type: $this.attr('method'),
                    data: $this.serialize(),
                    dataType: 'json', // JSON
                    success: function(json) {
                        if(json.reponse === '1') {
                            $("body, div").removeClass('modal-open modal-backdrop');
                            $('html, body').css({overflow: 'auto', height: 'auto'});
                            $("#getcontent").load("<?php echo base_url("administration/configvehicule/get_model");?>");
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
            url: "<?php echo base_url("administration/configvehicule/delete_model");?>",
            data: "delok=ok&id="+id,
            dataType: 'json', // JSON
            success: function(json){
                if(json.reponse=='1'){
                    $("#getcontent").load("<?php echo base_url("administration/configvehicule/get_model")?>");
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

<!-- Responsive examples -->
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="<?php echo base_url(); ?>assets/admin/js/pages/datatables.init.js"></script>

      