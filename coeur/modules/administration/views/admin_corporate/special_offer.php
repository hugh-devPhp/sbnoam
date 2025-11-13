<!-- DataTables -->
<link href="<?php echo base_url(); ?>assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
    rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
    rel="stylesheet" type="text/css" />


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-lg">
                        <h4 class="color-r">Liste des Offres</h4>
                    </div>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive w-100 text-center"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Image</th>
                            <th>Nom produit</th>
                            <th>Prix (Fcfa)</th>
                            <th>Prix promo (Fcfa)</th>
                            <th>Date fin</th>
                            <th>Statut</th>
                            <th>
                                <button type="button" class="btn btn-sm btn-primary"
                                    id="add" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"
                                    data-bs-whatever="@getbootstrap"
                                    style="float:right"><i class="fas fa-plus"></i>
                                </button>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($offers as $offer) :
                        ?>
                            <tr>
                                <td valign="middle"><?php echo $i; ?></td>
                                <td valign="middle">
                                    <?php
                                    foreach ($articles as $article):
                                        if ($article['article_id'] == $offer['article_id']):
                                    ?>
                                            <img src="<?php echo base_url() ?>uploads/articles/<?php echo $article['image_principale_article']; ?>"
                                                style="width:100px" alt="">
                                    <?php
                                        endif;
                                    endforeach;
                                    ?>
                                </td>
                                <td valign="middle">
                                    <?php
                                    foreach ($articles as $article) {
                                        if ($article['article_id'] == $offer['article_id']) {
                                            echo $article['designation'];
                                        }
                                    }
                                    ?>
                                </td>
                                <td valign="middle">
                                    <?php
                                    foreach ($articles as $article) {
                                        if ($article['article_id'] == $offer['article_id']) {
                                            $prix_promo = number_format($article['prix_promo'], 0, ',', '.');
                                            echo number_format($article['prix'], 0, ',', '.');
                                        }
                                    }
                                    ?>
                                </td>
                                <td valign="middle"><?php echo $article['prix_promo']; ?></td>
                                <td valign="middle"><?php echo $offer['date_fin']; ?></td>
                                <td valign="middle">
                                    <?php
                                    if ($offer['statut']):
                                    ?>
                                        <span class="badge bg-success rounded-pill">Activer</span>
                                    <?php
                                    else:
                                    ?>
                                        <span class="badge bg-danger rounded-pill">Désactiver</span>
                                    <?php
                                    endif;
                                    ?>
                                </td>
                                <td align="middle" valign="middle">
                                    <button type="button" class="btn btn-outline-success edite"
                                        data-id="<?php echo $offer['offer_id']; ?>">
                                        <i class="far fa-edit"></i></button>

                                    <button type="button" class="btn btn-outline-danger delete"
                                        data-id="<?php echo $offer['offer_id']; ?>">
                                        <i class="far fa-trash-alt"></i></button>
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
    </div>
</div>

<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nouvelle offres</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="add_offre" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nom_produit" class="col-form-label">Produit:</label>
                            <select name="product_id" id="" class="form-select">
                                <?php
                                foreach ($articles as $article):
                                ?>
                                    <option value="<?php echo $article['article_id'] ?>"><?php echo $article['designation'] ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="prix_promo" class="col-form-label">Prix promo:</label>
                            <input type="number" class="form-control" id="prix_promo" name="prix_promo" required>
                        </div>
                        <div class="mb-3">
                            <label for="qte_produit" class="col-form-label">Date fin:</label>
                            <input type="date" class="form-control" id="date_fin" name="date_fin" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" id="btn-add" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="modal fade" id="editeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editeModalLabel">Modification offre</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="post" id="update_offre" enctype="multipart/form-data">
                    <div class="modal-body">
                        <!--                        <div class="mb-3">-->
                        <input type="hidden" name="offre_id" id="id">
                        <!--                            <label for="edit_prix_promo" class="col-form-label">Prix promo:</label>-->
                        <!--                            <input type="number" class="form-control" id="edit_prix_promo" name="edit_prix_promo"-->
                        <!--                                   required>-->
                        <!--                        </div>-->
                        <div class="mb-3">
                            <label for="edit_qte_produit" class="col-form-label">Date fin:</label>
                            <input type="date" class="form-control" id="edit_date_fin" name="edit_date_fin"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="statut" class="col-form-label">Statut: <small class="text-muted">(optionnel)</small></label>
                            <select name="statut" id="statut" class="form-control">
                                <option value="" id="option1">Ne pas modifier</option>
                                <option value="1">Activer</option>
                                <option value="0">Désactiver</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" id="btn-edite" class="btn btn-success">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Required datatable js -->
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/sweetalert2/sweetalert2.all.min.js"></script>

<script>
    // datable js
    $(document).ready(function() {
        $('#datatable').DataTable({
            lengthChange: true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
        });
    });


    $('#add_offre').submit(function(e) {
        e.preventDefault();
        var url = '<?php echo base_url(); ?>administration/admin_corporate/add_special_offer';
        var data = new FormData(this);
        $('#btn-add').html('Ajout en cours...');
        $('#btn-add').attr('disabled', 'disabled');
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType: 'JSON',
            contentType: false,
            processData: false,
            success: function(response) {
                if (response === true) {
                    Notiflix.Notify.success("Ajouté avec succès.");
                    $("#exampleModal").modal('toggle');
                    $("#getcontent").load("<?php echo base_url("administration/admin_corporate/get_special_offer") ?>");

                } else {
                    console.log('message js :', response);
                    Notiflix.Notify.failure(
                        response.error, {
                            timeout: 5000,
                        });
                }
            },
            error: function(e) {
                Notiflix.Loading.remove();
                console.log('error ajax :', e);
                Notiflix.Notify.failure(
                    "error", {
                        timeout: 5000,
                    });
            }
        });
    });

    $('.edite').on('click', function() {
        var id = $(this).attr('data-id');
        if (!id) {
            Notiflix.Notify.failure('ID offre manquant');
            return;
        }
        $.ajax({
            url: "<?php echo base_url(); ?>administration/admin_corporate/get_special_offer_edit",
            method: 'post',
            data: {
                'offre_id': id,
            },
            dataType: 'json',
            success: function(json) {
                if (json.error) {
                    Notiflix.Notify.failure(json.error);
                    return;
                }
                if (json.offer_id) {
                    $('#id').val(json.offer_id);
                    $('#edit_date_fin').val(json.date_fin || '');
                    // Gérer le statut : si null ou undefined, laisser vide, sinon utiliser la valeur
                    var statutValue = (json.statut !== null && json.statut !== undefined) ? json.statut.toString() : '';
                    $('#statut').val(statutValue);
                    $('#editeModal').modal('toggle');
                } else {
                    Notiflix.Notify.failure('Données invalides reçues');
                }
            },
            error: function(xhr, status, error) {
                console.error('Erreur AJAX:', error);
                Notiflix.Notify.failure('Erreur lors du chargement des données');
            }
        });
    })

    $("#update_offre").on('submit', function(e) {
        e.preventDefault();
        var dateFin = $('#edit_date_fin').val();
        if (!dateFin) {
            Notiflix.Notify.failure('Veuillez sélectionner une date de fin');
            return;
        }

        var data = new FormData(this);
        $('#btn-edite').html('Modification en cours...');
        $('#btn-edite').attr('disabled', 'disabled');
        $.ajax({
            url: "<?php echo base_url(); ?>administration/admin_corporate/edit_special_offer",
            method: 'post',
            data: data,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                $('#btn-edite').html('Modifier');
                $('#btn-edite').removeAttr('disabled');

                if (response === true) {
                    $('#editeModal').modal('toggle');
                    Notiflix.Notify.success("Modifié avec succès.");
                    $("#getcontent").load("<?php echo base_url("administration/admin_corporate/get_special_offer") ?>");
                } else {
                    var errorMsg = (typeof response === 'object' && response.error) ? response.error : response;
                    Notiflix.Notify.failure(errorMsg, {
                        timeout: 5000,
                    });
                }
            },
            error: function(xhr, status, error) {
                $('#btn-edite').html('Modifier');
                $('#btn-edite').removeAttr('disabled');
                console.error('Erreur AJAX:', error);
                Notiflix.Notify.failure('Erreur lors de la modification');
            }
        })
    })


    $(".delete").click(function() {
        var id = $(this).attr('data-id');
        var image_name = $(this).attr('data-name');
        Swal.fire({
            title: "Êtes-vous sûr ?",
            text: "Vous ne pourrez pas revenir en arrière !",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Oui, Supprimer le!"
        }).then(function(t) {
            if (t.isConfirmed) {
                Notiflix.Loading.dots('Patientez...');
                $.ajax({
                    url: "<?php echo base_url(); ?>administration/admin_corporate/delete_special_offer",
                    dataType: 'json',
                    method: 'post',
                    data: {
                        offre_id: id,
                    },
                    success: function(response) {
                        if (response === true) {
                            $("#getcontent").load("<?php echo base_url("administration/admin_corporate/get_special_offer") ?>");
                            Notiflix.Notify.success('Supprimé avec succès.', {
                                position: 'right-bottom',
                            }, );
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
                swal.fire({
                    icon: 'error',
                    title: 'Annulé'
                })
            }
        })
    });
</script>