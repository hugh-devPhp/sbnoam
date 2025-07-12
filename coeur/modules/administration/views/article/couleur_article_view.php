<!-- DataTables -->
<link href="<?php echo base_url(); ?>assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"><?php echo $onglet_title; ?></h4>
                    <div class="mb-3 page-title-right">

                        <div class="mb-2">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#add_couleur_modal" class="btn btn-primary waves-effect waves-light">Ajouter +
                            </button>
                        </div>
                        <a href="javascript:" class="btn btn-sm btn-danger float-end" id="delete_all_couleur">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <input class="btn btn-outline-primary form-check-input form-check-success float-end waves-effect waves-light me-2" type="checkbox" name="checkAllCouleur" id="checkAllCouleur">
                    </div>
                </div>
                <table id="datatable-couleur" class="table table-bordered dt-responsive  nowrap w-100 text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Code couleur</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($couleurs as $item) :
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $item['code_couleur']; ?></td>
                                <td>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#manage_couleur_modal" onclick="record_name('<?php echo $item['id_couleur']; ?>', '<?php echo $item['code_couleur']; ?>')" class="btn btn-success waves-effect waves-light me-2">
                                        <i class="bx bx-pencil font-size-16"></i>
                                    </button>
                                    <button type="button" onclick="delete_couleur('<?php echo $item['id_couleur']; ?>')" class="btn btn-danger waves-effect waves-light me-2">
                                        <i class="bx bx-trash font-size-16"></i>
                                    </button>
                                    <button class="btn btn-outline-primary waves-effect waves-light me-2">
                                        <input class="form-check-input form-check-success checkbox1" type="checkbox" name="couleur_check_id" data-id="<?php echo $item['id_couleur']; ?>">
                                    </button>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<div>
    <!-- Add couleur modal -->
    <div id="add_couleur_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content card">
                <form id="add_couleur_form" method="post" class="repeater">
                    <div class="modal-body card-body">
                        <div class="modal-header mb-2">
                            <h5 class="modal-title" id="myModalLabel">Creation d'une couleur</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div data-repeater-list="">
                            <div class="row mb-4" data-repeater-item>
                                <label for="code_couleur" class="col-sm-3 col-form-label">Designation de la couleur :</label>
                                <div class="col-6">
                                    <input type="text" name="code_couleur" placeholder="Nom de la couleur" required class="form-control desc-vil-input" id="code_couleur">
                                </div>
                                <div class="col-2">
                                    <div class="d-grid">
                                        <button data-repeater-delete type="button" class="btn btn-danger">
                                            <i class="bx bx-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button data-repeater-create type="button" class="btn btn-success btn-sm mt-3 mt-lg-0 float-start">
                                <i class="bx bx-plus-circle bx-sm"></i>
                            </button>
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">
                                Fermer
                            </button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Ajouter
                            </button>
                        </div>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

<div>
    <!-- Update couleur modal content -->
    <div id="manage_couleur_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content card">
                <form id="manage_couleur">
                    <div class="modal-body card-body">
                        <div class="modal-header mb-2">
                            <h5 class="modal-title" id="myModalLabel">Modification d'une couleur</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <input type="hidden" name="id_couleur" id="id_couleur">
                        <div class="row mb-4">
                            <label for="code_couleur_up" class="col-sm-3 col-form-label">Designation de la couleur :</label>
                            <div class="col-sm-9">
                                <input type="text" name="code_couleur_up" class="form-control" id="code_couleur_up">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">
                                Fermer
                            </button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Valider
                            </button>
                        </div>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

<!-- Required datatable js -->
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- form repeater js -->
<script src="<?php echo base_url(); ?>assets/admin/libs/jquery.repeater/jquery.repeater.min.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/js/pages/form-repeater.int.js"></script>

<script src="<?php echo base_url() ?>assets/admin/sweetalert2/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable-couleur').DataTable({
            lengthChange: true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
        });

        $('#add_couleur_form').submit(function(e) {
            e.preventDefault();
            var $this = $(this);
            var code_couleur = $("[name='[code_couleur]']").map(function() {
                return $(this).val();
            }).get();
            Notiflix.Loading.dots('Patientez...');
            $.ajax({
                url: "<?php echo base_url(); ?>administration/article_config/add_article_couleur",
                type: $this.attr('method'),
                data: {
                    'code_couleur': code_couleur
                },
                dataType: 'json', // JSON
                success: function(json) {
                    if (json.reponse === true) {
                        // $("#lg-modal1").modal('hide');
                        Notiflix.Loading.remove();
                        $("#add_couleur_modal").modal('toggle');
                        $("#getcontent").load("<?php echo base_url("administration/article_config/get_article_color") ?>");
                        $.growl.notice({
                            message: "Votre opération s'est bien effectuée!"
                        });

                    } else {
                        $.growl.error({
                            message: "Echec de l'opération, veuillez verifier et reprendre."
                        });
                        $("#okvalid").attr("disabled", false).html("Valider");
                        Notiflix.Loading.remove();
                        return false;
                    }
                },
                error: function() {
                    Notiflix.Loading.remove();
                    Notiflix.Notify.failure(
                        "error", {
                            timeout: 5000,
                        });
                }
            });
        });

        $('#manage_couleur').submit(function(e) {
            e.preventDefault();
            var url = '<?php echo base_url(); ?>administration/article_config/edit_article_couleur';
            var code_couleur = $("[name='code_couleur_up']").val();
            var id_couleur = $("[name='id_couleur']").val();
            console.log(code_couleur)
            Notiflix.Loading.dots('Patientez...');
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    "code_couleur_up": code_couleur,
                    "id_couleur": id_couleur,
                },
                dataType: 'json',
                success: function(response) {
                    if (response.reponse === true) {
                        Notiflix.Notify.success("Modifiée avec succès.");
                        Notiflix.Loading.remove();
                        $("#getcontent").load("<?php echo base_url("administration/article_config/get_article_color") ?>");
                        $("#manage_couleur_modal").modal('toggle');
                    } else {
                        console.log('message js :', response);
                        Notiflix.Loading.remove();
                        Notiflix.Notify.failure(
                            response.reponse, {
                                timeout: 5000,
                            });
                    }
                },
                error: function() {
                    Notiflix.Loading.remove();
                    Notiflix.Notify.failure(
                        "error", {
                            timeout: 5000,
                        });
                }
            });
        });

        $('#checkAllCouleur').click(function(event) {
            if (this.checked) { // check select status
                $('.checkbox1').each(function() { //loop through each checkbox
                    this.checked = true;
                });
            } else {
                $('.checkbox1').each(function() {
                    this.checked = false;
                });
            }
        });

        $('.checkbox1').click(function(event) {
            if (!this.checked) { // check select status
                $('#checkAllCouleur').prop("checked", 0);
            }
        });

        $("#delete_all_couleur").on('click', function(event) {
            if ($("input:checkbox:checked").length > 0) {
                var id_couleur = $("input[name='couleur_check_id']:checkbox:checked").map(function() {
                    return $(this).attr("data-id");
                }).get();
                Swal.fire({
                    title: "Êtes-vous sûr?",
                    text: "Vous ne pourrez pas revenir en arrière !",
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Oui"
                }).then(function(t) {
                    if (t.isConfirmed) {
                        Notiflix.Loading.dots('Patientez...');
                        $.ajax({
                            url: "<?php echo base_url(); ?>administration/article_config/delete_article_couleur_selected",
                            method: 'post',
                            datatype: 'json',
                            data: {
                                "id_couleur": id_couleur
                            },
                            success: function(response) {
                                if (response === 'true') {
                                    Notiflix.Loading.remove();
                                    Notiflix.Notify.success('Supprimé avec succès.', {
                                        position: 'right-bottom',
                                    }, );
                                    $("#getcontent").load("<?php echo base_url("administration/article_config/get_article_color") ?>");
                                } else {
                                    Notiflix.Loading.remove();
                                    console.log(response);
                                    swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: response,
                                    });
                                }

                            }
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'Annulé'
                        });
                    }
                })
            } else {
                Notiflix.Notify.failure('cochez au moins une couleur !!', {
                    position: 'right-top',
                }, );
            }
        });
    });

    function record_name(id_couleur, name) {
        $("#id_couleur").val(id_couleur);
        $("#code_couleur_up").val(name);
    }

    function delete_couleur(id_couleur) {
        Swal.fire({
            title: 'Êtes vous sur 🤔?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui'
        }).then((result) => {
            if (result.isConfirmed) {
                Notiflix.Loading.dots('Patientez...');
                $.ajax({
                    url: "<?php echo base_url(); ?>administration/article_config/delete_article_couleur",
                    method: "post",
                    dataType: "json",
                    data: {
                        'id_couleur': id_couleur
                    },
                    success: function(response) {
                        if (response === true) {
                            Notiflix.Loading.remove();
                            Notiflix.Notify.success('Supprimée avec succès.', {
                                position: 'right-bottom',
                            }, );
                            $("#getcontent").load("<?php echo base_url("administration/article_config/get_article_color") ?>");
                        } else {
                            Notiflix.Loading.remove();
                            console.log(response);
                            swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response,
                            });
                        }
                    },
                    error: function(e) {
                        Notiflix.Loading.remove();
                        console.log(e);
                        swal.fire("Quelque chose à mal fonctionné veuillez réessayez s'il vous plait. " +
                            "Si le problème persiste veillez contacter l'administrateur.");
                    }
                });
            } else {
                Toast.fire({
                    icon: 'error',
                    title: 'Annulé'
                })
            }
        })
    }
</script>