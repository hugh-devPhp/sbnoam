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
                        <?php if(in_array('add_droit_onglet', is_inarray())) { ?>
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bx bx-plus font-size-16 align-middle me-2"></i>Nouvelle affectation</button>
                        <?php } ?>
                        <!-- sample modal content -->
                        <div id="myModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <?php $attributes = array('id' => 'addmodform1', 'name'=> 'addmodform1', "class"=>"custom-validation");
                                    echo form_open('', $attributes);?>
                                    <input type="hidden" name="passok" id="passok" value="ok">
                                    <input type="hidden" name="designation_onglet" id="designation_onglet">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel" >AJOUT DE DROIT PAR ONGLET</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Choisir l'onglet</label>
                                            <?php echo form_dropdown("select-onglet", $liste_onglet, "","id='select-onglet'  class='form-control' "); ?>
                                            <div>
                                                <br>
                                                <span><a href="Javascript:void(0);" id="add_more" style="display: none"><i class="bx bx-plus-circle" style="font-size: 26px; color:green;"></i> </a></span>
                                            </div>
                                            <div style="clear: both"></div>

                                        </div>
                                        <div class="mb-3" id="list-content">

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Annuler</button>
                                        <button type="submit" id="okajout" class="btn btn-primary waves-effect waves-light">Valider</button>
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
                        <th>Libellé Onglet</th>
                        <th>Nom module</th>
                        <th width="5%">N&ordm; Ordre</th>
                        <th>Methode</th>
                        <th width="10%">Nbre affect&eacute;</th>
                        <th>liste des affect&eacute;s</th>
                        <th width="10%"> Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php if($liste_desonglets>0){ $cpk=0;
                        foreach($liste_desonglets as $row){
                            $cpk++;?>
                            <tr>
                                <td><?=$cpk;?></td>
                                <td class="v-align-middle" style="text-transform: uppercase;"><?=$row->designation_onglet;?></td>
                                <td class="v-align-middle" style="text-transform: uppercase;"><?=$row->nom_module_onglet;?></td>
                                <td class="v-align-middle"><?=$row->numero_ordre;?></td>
                                <td class="v-align-middle"><?=$row->action_url;?></td>
                                <td class="v-align-middle"><?=$row->nb_affecte;?></td>
                                <td class="v-align-middle">
                                    <?php if(!empty($row->liste_affecte) && (count($row->liste_affecte)>0))
                                    {
                                        $cpfc=0;
                                        for ($fc = 0; $fc < count($row->liste_affecte); $fc++) {
                                            if (($fc > 0) && ($fc < 4)) echo "<br>";
                                            $cpfc++;
                                            if ($cpfc < 3) echo $cpfc." - " . $row->liste_affecte[$fc];
                                            else if ($cpfc == 3) echo "+  ......";
                                        }

                                    }


                                    ?>
                                </td>
                                <td>
                                    <div >
                                        <?php if(in_array('detail_droitonglet', is_inarray())) { ?>
                                            <?php if(!empty($row->liste_affecte) && (count($row->liste_affecte)>0))
                                            {?>
                                                <a href="Javascript:void(0)"  class="blues" data-name="<?php echo $row->id_liste_onglet;?>">
                                                    <button class="btn btn-primary waves-effect waves-light"><i class="bx bxs-zoom-in font-size-16 align-middle "></i></button>
                                                </a>
                                            <?php } ?>
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

        $(".blues").on('click',function() {
            var id = $(this).attr("data-name");
            listeaffecte(id);

        });

        $("#select-onglet").on("change", function () {

            var opt = $("#select-onglet").val();

            if (opt != "") {

                $("#add_more").show();
                $("#list-content").html("");
            } else {
                $("#add_more").hide();
                $("#list-content").html("");

            }

        });

        $("#add_more").on("click", function () {

            var id_onglet = $("#select-onglet").val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url("administration/adminacl/bloc_profil") ;?>",
                data: {id_onglet: id_onglet},
                dataType: 'html', // JSON
                success: function (data) {


                    $("#list-content").append(data);

                    if ($(".selprofil")[0]) {

                        $("#okajout").show();
                    } else {

                        $("#okajout").hide();
                        // Do something if class does not exist
                    }


                }
            });

        });

        $("body").on("click", ".delete-p", function () {
            $(this).closest('.selectprofil').remove();
            if ($(".selprofil")[0]) {
                $("#okajout").show();
            } else {
                $("#okajout").hide();
                // Do something if class does not exist
            }

        });


        $("#list-content").on("change", ".selprofil", function () {


            var mythis = this;
            var array = [];
            var elt = $(mythis).val();

            $(mythis).removeClass("selprofil");

            $('.selprofil  option:selected').each(function () {

                array.push($(this).val());

            });

            $(mythis).addClass("selprofil");


            if ($.inArray(elt, array) == -1) {
                array.push(elt);

            } else {
                $(mythis).val("").prop('selected', true);
                $.growl.error({message: "ce profil a été déjà selectionné."});

            }
//        console.log(array);
        });

        $("form#addmodform1").on(
            "submit",
            function () {

                var onglet = $('#select-onglet  option:selected').text();

                $("#designation_onglet").val(onglet);

                $("#okajout").attr("disabled", "disabled").html("Validation en cours.... ");
                var $this = $(this);

                $.ajax({
                    url: "<?php echo base_url();?>administration/adminacl/add_droit_onglet",
                    type: "POST",
                    data: $this.serialize(),
                    dataType: 'json', // JSON
                    success: function (json) {
                        if (json.reponse === '1') {

                            $("#modaladd").modal('hide');
                            $("body, div").removeClass('modal-open modal-backdrop');
                            $('html, body').css({overflow: 'auto', height: 'auto'});
                            $("#getcontent").load("<?php echo base_url("administration/adminacl/get_droitonglet")?>");
                            $.growl.notice({message: "Votre opération a été effectuée!"});

                        } else {
                            $.growl.error({message: "Echec de l'opération, veuillez verifier et reprendre."});
                            $("#okajout").attr("disabled", false).html("Valider");
                            return false;
                        }
                    }
                });


                return false;
            }
        );

        function listeaffecte(id) {
            $("#getcontent").load("<?php echo base_url('administration/adminacl/detail_droitonglet') ;?>/" + id);
        }

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

      