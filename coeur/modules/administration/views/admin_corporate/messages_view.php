<!-- DataTables -->
<link href="<?php echo base_url(); ?>assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
      rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
      rel="stylesheet" type="text/css"/>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-lg">
                        <h4 class="color-r">Liste des messages</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table id="datatable" class="table table-bordered dt-responsive w-100" style="width:100%">
                            <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Message</th>
                                <th>Statut</th>
                                <th width="10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            foreach ($messages as $message) :
                                ?>
                                <tr style="{% if message.lu == 0 %}font-weight: bold {% endif %}">
                                    <td><?php echo $i; ?></td>
                                    <td valign="middle"><?php echo $message['nom']; ?></td>
                                    <td valign="middle"><?php echo $message['email']; ?></td>
                                    <td valign="middle"><?php echo $message['telephone']; ?></td>
                                    <td valign="middle"
                                        style="word-break: break-all;"><?php echo character_limiter(strip_tags($message['message']), 20); ?></td>
                                    <td valign="middle">
                                        <?php
                                        if ($message['is_read']):
                                            ?>
                                            <span class="badge-soft-success">Lu</span>
                                        <?php
                                        else:
                                            ?>
                                            <span class="badge-soft-danger">Non lu</span>
                                        <?php
                                        endif;
                                        ?>
                                    </td>
                                    <td align="middle" valign="middle">
                                        <button type="button" class="btn btn-sm btn-outline-success detail"
                                                data-id="<?php echo $message['message_id']; ?>">
                                            <i class="far fa-eye"></i></button>
<!--                                        <button type="button" class="btn btn-sm btn-outline-danger delete"-->
<!--                                                data-id="--><?php //echo $message['message_id']; ?><!--"><i-->
<!--                                                    class="far fa-trash-alt"></i>-->
<!--                                        </button>-->
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
    </div>
</div>
<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail du Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nom" class="col-form-label">Nom & prenom:</label>
                            <input type="text" class="form-control" id="nom" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="col-form-label">Contact:</label>
                            <input type="text" id="telephone" class="form-control" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="text" id="email" class="form-control" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="col-form-label">Message:</label>
                            <textarea name="" id="message" class="form-control" cols="30" rows="10" disabled></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal"
                                onclick="$('#getcontent').load('<?php echo base_url("administration/message/get_messages") ?>');">Fermer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

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

    $('.detail').on('click', function () {
        Notiflix.Loading.dots('Patientez...');
        var id = $(this).attr('data-id');
        $.ajax({
            url: "<?php echo base_url(); ?>administration/message/get_message",
            method: 'post',
            data: {
                'message_id': id,
            },
            dataType: 'json',
            success: function (response) {
                $('#nom').val(response.nom);
                $('#message').text(response.message);
                $('#email').val(response.email);
                $('#telephone').val(response.telephone);
                $('#exampleModal').modal('toggle');
                Notiflix.Loading.remove();
            }
        })
    })

    // $(".delete").click(function () {
    //     var id = $(this).attr('data-id');
    //     Swal.fire({
    //         title: "Êtes-vous sûr ?",
    //         text: "Vous ne pourrez pas revenir en arrière !",
    //         icon: "warning",
    //         showCancelButton: !0,
    //         confirmButtonColor: "#3085d6",
    //         cancelButtonColor: "#d33",
    //         confirmButtonText: "Oui, Supprimer le!"
    //     }).then(function (t) {
    //         if (t.isConfirmed) {
    //             Notiflix.Loading.dots('Patientez...');
    //             $.ajax({
    //                 url: "{% url 'delete_message' %}",
    //                 dataType: 'json',
    //                 method: 'post',
    //                 data: {
    //                     message_id: id,
    //                 },
    //                 headers: {'X-CSRFToken': '{{ csrf_token }}'},
    //                 success: function (response) {
    //                     if (response === true) {
    //                         location.reload();
    //                         Notiflix.Notify.success('Supprimé avec succès.',
    //                             {
    //                                 position: 'right-bottom',
    //                             },
    //                         );
    //                     } else {
    //                         Notiflix.Loading.remove();
    //                         console.log(response);
    //                         swal.fire({
    //                             icon: 'error',
    //                             title: 'Oops...',
    //                             text: response['detail'],
    //                         });
    //                     }
    //                 }
    //             })
    //         }
    //     })
    // });
</script>