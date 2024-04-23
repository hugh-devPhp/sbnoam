<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->


<!-- start page title -->
<!-- <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18"><?php echo $onglet_title; ?></h4>

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
                    <h4 class="mb-sm-0 font-size-18"><?php echo $onglet_title; ?></h4>

                    <div class=page-title-right">
                        <?php if (in_array('add_user', is_inarray())) { ?>
                            <button type="button" class="btn btn-primary waves-effect waves-light"
                                    data-bs-toggle="modal" data-bs-target="#myModal"><i
                                        class="bx bx-plus font-size-16 align-middle me-2"></i>Ajouter
                            </button>
                        <?php } ?>
                        <!-- sample modal content -->
                        <div id="myModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <?php $attributes = array('id' => 'addmodform1', 'name' => 'addmodform1', "class" => "custom-validation");
                                    echo form_open('', $attributes); ?>
                                    <input type="hidden" name="passok" id="passok" value="ok">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">AJOUTER UN UTILISATEUR</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Pseudo</label>
                                            <input type="text" id="pseudo" name="pseudo" class="form-control" required
                                                   placeholder="Inscrire le pseudo"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nom</label>
                                            <input type="text" id="nom" name="nom" class="form-control" required
                                                   placeholder="Inscrire le nom"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Prenoms</label>
                                            <input type="text" id="prenoms" name="prenoms" class="form-control"
                                                   placeholder="Inscrire le prenom"/>
                                        </div>
                                        <div class="mb-3">
                                            <div class="templating-select">
                                                <label class="form-label">Civilité</label>
                                                <?php echo form_dropdown("civil", $liste_civil, "", "id='civil'  class='form-control' "); ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="templating-select">
                                                <label class="form-label">Profil</label>
                                                <?php echo form_dropdown("leprofil", $liste_desprofils, "", "id='leprofil'  class='form-control' required "); ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Statut</label>
                                            <?php echo form_dropdown("statut", $liste_active, "", "id='statut'  class='form-control' "); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Mot de passe</label>
                                            <input type="password" id="mdp" name="mdp" class="form-control"
                                                   placeholder="Par défaut le mot de passe est 0000"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Retaper le mot de passe</label>
                                            <input type="password" id="retap_mdp" name="retap_mdp" class="form-control"
                                                   placeholder="Retaper le même mot de passe"/>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect"
                                                data-bs-dismiss="modal">Annuler
                                        </button>
                                        <button type="submit" id="okvalid"
                                                class="btn btn-primary waves-effect waves-light">Valider
                                        </button>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <div id="EditMyModal" class="modal fade" role="dialog" tabindex="-1"
                             aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <?php $attributes = array('id' => 'editmodform1', 'name' => 'editmodform1', "class" => "custom-validation");
                                    echo form_open('', $attributes); ?>
                                    <input type="hidden" name="editok" id="editok" value="ok">
                                    <input type="hidden" name="id_user" id="id_user" value="">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">MODIFIER UN UTILISATEUR</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Pseudo</label>
                                            <input type="text" id="pseudo_edit" name="pseudo" class="form-control"
                                                   required/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nom</label>
                                            <input type="text" id="nom_edit" name="nom" class="form-control" required/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Prenoms</label>
                                            <input type="text" id="prenoms_edit" name="prenoms" class="form-control"/>
                                        </div>
                                        <div class="mb-3">
                                            <div class="templating-select">
                                                <label class="form-label">Civilité</label>
                                                <?php echo form_dropdown("civil", $liste_civil, "", "id='civil_edit'  class='form-control' "); ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="templating-select">
                                                <label class="form-label">Profil</label>
                                                <?php echo form_dropdown("leprofil", $liste_desprofils, "", "id='leprofil_edit'  class='form-control' required "); ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Statut</label>
                                            <?php echo form_dropdown("statut", $liste_active, "", "id='statut_edit'  class='form-control' "); ?>
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect"
                                                data-bs-dismiss="modal">Annuler
                                        </button>
                                        <button type="submit" id="validedit"
                                                class="btn btn-primary waves-effect waves-light">Modifier
                                        </button>
                                    </div>
                                    <?php echo form_close(); ?>
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
                        <th>Nom complet</th>
                        <th>Civilité</th>
                        <th>Pseudo</th>
<!--                        <th>Corporation</th>-->
                        <th>Profil</th>
                        <th>Statut</th>
                        <th width="15%"> Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($liste_users > 0) {
                        $cpk = 0;
                        foreach ($liste_users as $row) {
                            $cpk++; ?>
                            <tr>
                                <td><?= $cpk; ?></td>
                                <td style="text-transform: uppercase;"><?= $row->nom_complet; ?></td>
                                <td style="text-transform: uppercase;"><?= $row->civilite; ?></td>
                                <td style="text-transform: uppercase;"><?= $row->matricule; ?></td>
<!--                                --><?php //if ($row->id_compte > 0) {/////PROFIL CLIENT) ?>
<!--                                    <td style="text-transform: uppercase;">COMPTE CLIENT</td>-->
<!--                                --><?php //} else {/////PROFIL CLIENT) ?>
<!--                                    <td style="text-transform: uppercase;">ANVI</td>-->
<!--                                --><?php //} ?>
                                <td style="text-transform: uppercase;"><?= $row->code_profils; ?></td>
                                <td style="text-transform: uppercase;"><?php if ($row->activation == 1) echo "Active"; else echo "Inactive"; ?></td>
                                <td>
                                    <div>
                                        <?php if (in_array('edit_statut_user', is_inarray())) { ?>
                                            <a href="Javascript:void(0)" class="blues"
                                               data-name="<?php echo $row->id_utilisateur; ?>"
                                               data-act="<?php echo $row->activation; ?>" title="basculer le statut">
                                                <?php if ($row->activation == 1) { ?>
                                                    <button class="btn btn-warning waves-effect waves-light"><i
                                                                class="bx bx-power-off font-size-16 align-middle "></i>
                                                    </button><?php } else { ?>
                                                    <button class="btn btn-primary waves-effect waves-light"><i
                                                                class="bx bxs-torch font-size-16 align-middle "></i>
                                                    </button><?php } ?></a>&nbsp;
                                        <?php }
                                        if (in_array('edit_user', is_inarray())) { ?><a href="Javascript:void(0)"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#EditMyModal"
                                                                                        class="green"
                                                                                        data-name="<?php echo $row->id_utilisateur; ?>"
                                                                                        data-mat="<?php echo $row->matricule; ?>"
                                                                                        data-nom="<?php echo $row->nom; ?>"
                                                                                        data-pren="<?php echo $row->prenom; ?>"
                                                                                        data-act="<?php echo $row->activation; ?>"
                                                                                        data-civil="<?php echo $row->civilite; ?>"
                                                                                        data-prof="<?php echo $row->profil_user; ?>"
                                                                                        title="Editer">
                                                <button class="btn btn-success waves-effect waves-light"><i
                                                            class="bx bx-pencil font-size-16 align-middle "></i>
                                                </button></a>&nbsp;
                                        <?php }
                                        if (in_array('edit_reinitpass', is_inarray())) { ?>
                                            <a href="Javascript:void(0)" class="yellow"
                                               data-name="<?php echo $row->id_utilisateur; ?>"
                                               title="Réinitialisation du mot de passe">
                                                <button class="btn btn-info waves-effect waves-light"><i
                                                            class="bx bx-reset font-size-16 align-middle "></i></button>
                                            </a>&nbsp;
                                        <?php }
                                        if (in_array('delete_user', is_inarray())) { ?>
                                            <a href="Javascript:void(0)" class="red"
                                               data-name="<?php echo $row->id_utilisateur; ?>" title="Suppression">
                                                <button class="btn btn-danger waves-effect waves-light"><i
                                                            class="bx bx-trash font-size-16 align-middle"></i></button>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </td>
                            </tr>

                        <?php }
                    }
                    ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<script>
    $(document).ready(function () {


        $("#mdp").on('input', function () {

            var mdp = $('#mdp').val().trim();
            $('#mdp').val(mdp);
            if (mdp != "") $("#retap_mdp").attr("required", true);
            else $("#retap_mdp").attr("required", false);

        });

        $(".green").on('click', function () {
            var id = $(this).attr("data-name");
            var pseudo = $(this).attr("data-mat");
            var nom = $(this).attr("data-nom");
            var prenom = $(this).attr("data-pren");
            var civilite = $(this).attr("data-civil");
            var idprofil = $(this).attr("data-prof");
            var activa = $(this).attr("data-act");

            $('#id_user').val(id);
            $('#pseudo_edit').val(pseudo);
            $('#nom_edit').val(nom);
            $('#prenoms_edit').val(prenom);
            $('#civil_edit').val(civilite);
            $('#leprofil_edit').val(idprofil);
            $('#statut_edit').val(activa);

        });

        $(".blues").on('click', function () {
            var id = $(this).attr("data-name");
            var statut = $(this).attr("data-act");
            if (statut == 1) {
                bootbox.confirm("Souhaitez-vous désactiver cet utilisateur?",
                    function (result) {
                        if (result === true) {
                            statut_user(id, 0);
                        } else {
                        }
                    });

            } else {

                bootbox.confirm("Souhaitez-vous activer cet utilisateur?",
                    function (result) {
                        if (result === true) {
                            statut_user(id, 1);
                        } else {
                        }
                    });

            }


        });

        $(".yellow").on('click', function () {
            var id = $(this).attr("data-name");

            bootbox.confirm("<span style='color:red;'>Attention!! Attention!!<br></span> Souhaitez-vous reinitialiser le mot de passe de cet utilisateur?",
                function (result) {
                    if (result === true) {
                        Reinit_pass(id);
                    } else {
                    }
                });
        });

        $(".red").on('click', function () {
            var id = $(this).attr("data-name");

            bootbox.confirm("<span style='color:red;'>Attention!! Attention!!<br></span> Souhaitez-vous réellement supprimer cet enrégistrement?",
                function (result) {
                    if (result === true) {
                        DeleteForm(id);
                    } else {
                    }
                });
        });


        $("form#addmodform1").on(
            "submit",
            function (e) {
                // On empêche le navigateur de soumettre le formulaire
                e.preventDefault();

                var mdp = $('#mdp').val();
                var retap_mdp = $('#retap_mdp').val();

                if (mdp != "" && (mdp != retap_mdp)) {
                    bootbox.alert("Retaper correctement le mot de passe");
                    $("#retap_mdp").css({"background-color": "#f0e68c"});
                    return false;
                }

                $("#okvalid").attr("disabled", "disabled").html("Enregistrement des données en cours... ");
                var $this = $(this);

                $.ajax({
                    url: "<?php echo base_url();?>administration/utilisateur/add_user",
                    type: $this.attr('method'),
                    data: $this.serialize(),
                    dataType: 'json', // JSON
                    success: function (json) {
                        if (json.reponse === '1') {
                            // $("#lg-modal1").modal('hide');
                            $("body, div").removeClass('modal-open modal-backdrop');
                            $('html, body').css({overflow: 'auto', height: 'auto'});
                            $("#getcontent").load("<?php echo base_url("administration/utilisateur/get_users")?>");
                            $.growl.notice({message: "Votre opération s'est bien effectuée!"});

                        } else {
                            $.growl.error({message: "Echec de l'opération, veuillez verifier et reprendre."});
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
            function () {


                $("#validedit").attr("disabled", "disabled").html("Modification des données en cours... ");
                var $this = $(this);

                $.ajax({
                    url: "<?php echo base_url();?>administration/utilisateur/edit_user",
                    type: $this.attr('method'),
                    data: $this.serialize(),
                    dataType: 'json', // JSON
                    success: function (json) {
                        if (json.reponse === '1') {
                            $("body, div").removeClass('modal-open modal-backdrop');
                            $('html, body').css({overflow: 'auto', height: 'auto'});
                            $("#getcontent").load("<?php echo base_url("administration/utilisateur/get_users");?>");
                            $.growl.notice({message: "Votre opération s'est bien effectuée!"});

                        } else {
                            $.growl.error({message: "Echec de l'opération, veuillez verifier et reprendre."});
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
    function DeleteForm(id) {

        $.ajax({
            type: "POST",
            url: "<?php echo base_url("administration/utilisateur/delete_user");?>",
            data: "delok=ok&id=" + id,
            success: function (msg) {
                if (msg == 1) {
                    $("#getcontent").load("<?php echo base_url("administration/utilisateur/get_users")?>");
                    $.growl.notice({message: "Votre suppression effectuée avec succès !"});
                } else {
                    $.growl.error({message: "Echec de l'opération. Reprendre!"});
                    return false;
                }
            }
        });

        return false;
    }

    ///////
    function statut_user(id, etat) {

        $.ajax({
            type: "POST",
            url: "<?php echo base_url("administration/utilisateur/edit_statut_user");?>",
            data: "etatok=ok&id=" + id + "&new_etat=" + etat,
            success: function (msg) {
                if (msg == 1) {
                    $("#getcontent").load("<?php echo base_url("administration/utilisateur/get_users")?>");
                    $.growl.notice({message: "Votre opération effectuée avec succès !"});
                } else {
                    $.growl.error({message: "Echec de l'opération. Reprendre!"});
                    return false;
                }
            }
        });

        return false;
    }

    ///////
    function Reinit_pass(id) {

        $.ajax({
            type: "POST",
            url: "<?php echo base_url("administration/utilisateur/edit_reinitpass");?>",
            data: "initok=ok&id=" + id,
            success: function (msg) {
                if (msg == 1) {
                    $("#getcontent").load("<?php echo base_url("administration/utilisateur/get_users")?>");
                    $.growl.notice({message: "Votre opération effectuée avec succès !"});
                } else {
                    $.growl.error({message: "Echec de l'opération. Reprendre!"});
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

      