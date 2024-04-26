<!-- DataTables -->
<link href="<?php echo base_url(); ?>assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
      rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
      rel="stylesheet" type="text/css"/>


<div class="row">
    <div class="col-xl-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="slider-pills" role="tabpanel"
                         aria-labelledby="slider-tab">
                        <div>
                            <div class="row mb-3">
                                <div class="col-lg">
                                    <h4 class="color-r">Liste des sliders</h4>
                                </div>
                            </div>
                            <table id="datatable"
                                   class="table table-bordered dt-responsive  nowrap w-100 text-center"
                                   style="width:100%">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="15%">Slider</th>
                                    <th>Date ajout</th>
                                    <th>Statut</th>
                                    <th width="10%">
                                        <button type="button" class="btn btn-sm btn-primary"
                                                id="add" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                data-bs-whatever="@getbootstrap" style="float:right">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                foreach ($sliders as $slider) :
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><img src="<?php echo base_url() ?>uploads/site/<?php echo $slider['slider_image']; ?>" alt=""
                                                 style="width: 200px;"></td>
                                        <td valign="middle"><?php echo $slider['date_add']; ?></td>
                                        <td valign="middle">
                                            <?php
                                            if ($slider['statut']):
                                            ?>
                                            <span class="badge bg-success rounded-pill">Activé</span>
                                            <?php
                                            else:
                                            ?>
                                            <span class="badge bg-danger rounded-pill">Désactivé</span>
                                            <?php
                                            endif;
                                            ?>
                                        </td>
                                        <td align="middle" valign="middle">
                                            <button type="button" class="btn btn-outline-danger delete"
                                                    data-id="<?php echo $slider['slider_id']; ?>" data-name="<?php echo $slider['slider_image']; ?>">
                                                <i class="far fa-trash-alt"></i></button>
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
        </div>
    </div>
</div>
<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nouveau Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="add_slider" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="position" class="col-form-label">Image:</label>
                            <input type="file" name="image" class="form-control" required>
                            <span>Taille recommandée : 500 x 600 px</span>
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


<!-- Required datatable js -->
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/sweetalert2/sweetalert2.all.min.js"></script>

<script>
    // datable js
    $(document).ready(function () {
        $('#datatable').DataTable({
            lengthChange: true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
        });
    });

    $('#add_slider').submit(function(e) {
        e.preventDefault();
        var url = '<?php echo base_url(); ?>administration/admin_corporate/add_slider';
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
                    $("#getcontent").load("<?php echo base_url("administration/admin_corporate/get_sliders") ?>");
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


    $(".delete").click(function () {
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
        }).then(function (t) {
            if (t.isConfirmed) {
                $.ajax({
                    url: "<?php echo base_url(); ?>administration/admin_corporate/delete_slider",
                    dataType: 'json',
                    method: 'post',
                    data: {
                        slider_id: id,
                        image_name: image_name,
                    },
                    success: function (response) {
                        if (response === true) {
                            $("#getcontent").load("<?php echo base_url("administration/admin_corporate/get_sliders") ?>");
                            Notiflix.Notify.success('Supprimé avec succès.',
                                {
                                    position: 'right-bottom',
                                },
                            );
                        } else {
                            console.log(response);
                            swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response,
                            });
                        }
                    }
                })
            }
        })
    });

   </script>