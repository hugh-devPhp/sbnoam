
<link href="<?php echo base_url(); ?>assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
      rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
      rel="stylesheet" type="text/css"/>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"><?php echo $onglet_title; ?></h4>
                    <div class="mb-3 page-title-right">
                        <div class="mb-2">
                                <a href="<?php echo base_url('administration/blog/add_article_blog'); ?>" class="btn btn-primary mb-3 waves-effect waves-light">Ajouter un article</a>

                        </div>
                        <a href="javascript:" class="btn btn-sm btn-danger float-end" id="delete_all_article">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <input class="btn btn-outline-primary form-check-input form-check-success float-end waves-effect waves-light me-2"
                               type="checkbox" name="checkAllArticle" id="checkAllArticle">
                    </div>
                </div>
    <h2 class="mb-4">Gestion des articles de blog</h2>
    <table id="datatable-article" class="table table-bordered dt-responsive nowrap w-100 text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Catégorie</th>
                <th>Etat</th>
                <th>Date création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($articles)): ?>
            <?php foreach ($articles as $article): ?>
                <tr>
                    <td><?php echo $article->article_id; ?></td>
                    <td><?php echo htmlspecialchars($article->title); ?></td>
                    <td><?php echo htmlspecialchars($article->edit_pseudo); ?></td>
                    <td><?php echo htmlspecialchars($article->category); ?></td>
                    <td><?php echo $article->etat == 1 ? '<span class="badge bg-success">Publié</span>' : '<span class="badge bg-secondary">Brouillon</span>'; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($article->create_at)); ?></td>
                    <td>
                        <a href="<?php echo base_url('administration/blog/edit/' . $article->article_id); ?>" class="btn btn-sm btn-warning">Editer</a>
                        <a href="<?php echo base_url('administration/blog/delete/' . $article->article_id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cet article ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7" class="text-center">Aucun article trouvé.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
        </div>
        </div>
        </div>
</div>


<!-- Required datatable js -->
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>


<script src="<?php echo base_url() ?>assets/admin/sweetalert2/sweetalert2.all.min.js"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    $(document).ready(function () {
        $('#datatable-article').DataTable({
            lengthChange: true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
        });



        $('#checkAllArticle').click(function (event) {
            if (this.checked) { // check select status
                $('.checkbox1').each(function () { //loop through each checkbox
                    this.checked = true;
                });
            } else {
                $('.checkbox1').each(function () {
                    this.checked = false;
                });
            }
        });

        $('.checkbox1').click(function (event) {
            if (!this.checked) { // check select status
                $('#checkAllArticle').prop("checked", 0);
            }
        });

        $("#delete_all_article").on('click', function (event) {
            if ($("input:checkbox:checked").length > 0) {
                var article_id = $("input[name='article_check_id']:checkbox:checked").map(function () {
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
                }).then(function (t) {
                    if (t.isConfirmed) {
                        Notiflix.Loading.dots('Patientez...');
                        $.ajax({
                            url: "<?php echo base_url(); ?>administration/article/delete_article_selected",
                            method: 'post',
                            datatype: 'json',
                            data: {
                                "article_id": article_id
                            },
                            success: function (response) {
                                if (response === 'true') {
                                    Notiflix.Loading.remove();
                                    Notiflix.Notify.success('Supprimé avec succès.', {
                                        position: 'right-bottom',
                                    },);
                                    $("#getcontent").load("<?php echo base_url("administration/article/get_articles") ?>");
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
                Notiflix.Notify.failure('cochez au moins un article !!', {
                    position: 'right-top',
                },);
            }
        });
    });

    function delete_article(article_id) {
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
                    url: "<?php echo base_url(); ?>administration/article/delete_article",
                    method: "post",
                    dataType: "json",
                    data: {
                        'article_id': article_id
                    },
                    success: function (response) {
                        if (response === true) {
                            Notiflix.Loading.remove();
                            Notiflix.Notify.success('Supprimée avec succès.', {
                                position: 'right-bottom',
                            },);
                            $("#getcontent").load("<?php echo base_url("administration/article/get_articles") ?>");
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
                    error: function (e) {
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

    function edit_article(article_id) {
        $.ajax({
            url: "<?php echo base_url(); ?>administration/article/edit_article",
            method: "post",
            dataType: "html",
            data: {
                'article_id': article_id
            },
            success: function (response) {
                $("#getcontent").html(response);
            },
            error: function (e) {
                Notiflix.Loading.remove();
                console.log(e);
                swal.fire("Quelque chose à mal fonctionné veuillez réessayez s'il vous plait. " +
                    "Si le problème persiste veillez contacter l'administrateur.");
            }
        });

    }

    function detail_article(article_id) {
        $.ajax({
            url: "<?php echo base_url(); ?>administration/article/detail_article",
            method: "post",
            dataType: "html",
            data: {
                'article_id': article_id
            },
            success: function (response) {
                $("#getcontent").html(response);
            },
            error: function (e) {
                Notiflix.Loading.remove();
                console.log(e);
                swal.fire("Quelque chose à mal fonctionné veuillez réessayez s'il vous plait. " +
                    "Si le problème persiste veillez contacter l'administrateur.");
            }
        });

    }
</script>