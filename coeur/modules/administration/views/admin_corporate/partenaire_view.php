{% extends "dash_admin/base_admin.html" %}
{% load static %}
{% block title %}Partenaires{% endblock title %}
{% block stylesheets %}
    <!-- DataTables -->
    <link href="{% static 'dashboard/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css' %}"
          rel="stylesheet" type="text/css" xmlns="http://www.w3.org/1999/html"/>
    <link href="{% static 'dashboard/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css' %}"
          rel="stylesheet" type="text/css"/>

    <style>
        .color-r {
            color: #FF7000;
        }
    </style>
{% endblock stylesheets %}

{% block content %}
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Partenaires</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Config corporate</a></li>
                                <li class="breadcrumb-item active">partenaire</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="checkout-tabs">
                <div class="row">
                    <div class="col-xl-2 col-sm-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                             aria-orientation="vertical">
                            <a class="nav-link active" id="partenair-tab" data-bs-toggle="pill" href="#partenair-pills"
                               role="tab" aria-controls="partenair-pills" aria-selected="false">
                                <i class="bx bx-image d-block check-nav-icon mt-4 mb-2"></i>
                                <p class="fw-bold mb-4">Partenaires</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="partenair-pills" role="tabpanel"
                                         aria-labelledby="partenair-tab">
                                        <div>
                                            <div class="row mb-3">
                                                <div class="col-lg">
                                                    <h4 class="color-r">Liste des partenairs</h4>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <a href="javascript:" class="btn btn-sm btn-danger float-end"
                                                   id="delete_all_partenair">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                                <input class="btn btn-outline-primary form-check-input form-check-success float-end waves-effect waves-light me-2"
                                                       type="checkbox" name="checkAllPartenair" id="checkAllPartenair">
                                            </div>
                                            <table id="datatable" class="table table-bordered dt-responsive w-100 text-center"
                                                   style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th width="5%">#</th>
                                                    <th>Logo</th>
                                                    <th>Titre</th>
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
                                                {% for partenaire in partenaires %}
                                                    <tr>
                                                        <td>{{ forloop.counter }}</td>
                                                        <td valign="middle">
                                                            <img src="{{ image_path }}{{ partenaire.logo }}" style="width:100px"></td>
                                                        <td valign="middle">{{ partenaire.titre|capfirst }}</td>
                                                        <td valign="middle">
                                                            {% if partenaire.statut == 0 %}
                                                                <span class="badge bg-danger rounded-pill">Désactiver</span>
                                                            {% else %}
                                                                <span class="badge bg-success rounded-pill">Activer</span>
                                                            {% endif %}
                                                        </td>
                                                        <td align="middle" valign="middle">
                                                            <button type="button" class="btn btn-outline-success edite"
                                                                    data-id="{{ partenaire.id }}">
                                                                <i class="far fa-edit"></i></button>
                                                            <button type="button" class="btn btn-outline-danger delete"
                                                                    data-id="{{ partenaire.id }}" data-name="{{ partenaire.logo }}">
                                                                <i class="far fa-trash-alt"></i></button>
                                                             {% if partenaire.statut %}
                                                                <button type="button" onclick="disable_partenaire('{{ partenaire.id }}', '{{ partenaire.titre }}')"
                                                                        class="btn btn-outline-danger waves-effect waves-light me-2">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            {% else %}
                                                                <button type="button" onclick="enable_partenaire('{{ partenaire.id }}', '{{ partenaire.titre }}')"
                                                                        class="btn btn-outline-success waves-effect waves-light me-2">
                                                                    <i class="fa fa-check"></i>
                                                                </button>
                                                            {% endif %}
                                                        </td>
                                                    </tr>
                                                {% endfor %}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end checkout-tabs -->

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nouveau Partenaire</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="post" id="add_partenaire">
                            <div class="modal-body">

                                {% csrf_token %}
                                <div class="mb-3">
                                    <label for="titre" class="col-form-label">Titre:</label>
                                    <input type="text" class="form-control" id="titre" name="titre" required>
                                </div>
                                <div class="mb-3">
                                    <label for="logo" class="col-form-label">Logo:</label>
                                    <input type="file" name="logo" id="logo" class="form-control">
                                    <span>Taille recommandée : 200 x 60 px</span>
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
            <div class="modal fade" id="editeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editeModalLabel">Modification partenaire</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="#" method="post" id="update_partenaire">
                            <div class="modal-body">

                                {% csrf_token %}
                                <div class="mb-3">
                                    <label for="edit_titre" class="col-form-label">Titre:</label>
                                    <input type="text" class="form-control" name="edit_titre" id="edit_titre" required>
                                    <input type="hidden" name="partenaire_id" id="id">
                                    <input type="hidden" name="old_logo" id="old_logo">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_logo" class="col-form-label">Logo:</label>
                                    <input type="file" id="edit_logo" name="edit_logo" class="form-control">
                                    <span>Taille recommandée : 200 x 60 px</span>
                                </div>
                                <div class="mb-3">
                                    <label for="statut" class="col-form-label">Statut:</label>
                                    <select name="statut" id="statut" class="form-control">
                                        <option value="" id="option1">Sélection</option>
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
        </div> <!-- container-fluid -->
    </div>
{% endblock content %}

{% block javascript %}
    <!-- Required datatable js -->
    <script src="{% static 'dashboard/assets/libs/datatables.net/js/jquery.dataTables.min.js' %}"></script>
    <script src="{% static 'dashboard/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js' %}"></script>
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
        // datable js
        $(document).ready(function () {
            $('#datatable').DataTable({
                lengthChange: true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                }
            });
        });

        var errorToast = document.getElementById("errorToast");
        var successToast = document.getElementById("successToast");
        var token = $("input[name=csrfmiddlewaretoken]").val();


        $("#add_partenaire").on('submit', function (e) {
            e.preventDefault();
            var data = new FormData(this);
            $('#btn-add').html('Ajout en cours...');
            $('#btn-add').attr('disabled', 'disabled');
            $.ajax({
                url: "{% url 'partenaires' %}",
                method: 'post',
                data: data,
                dataType: 'json',
                processData: false,
                contentType: false,
                headers: {'X-CSRFToken': '{{ csrf_token }}'},
                success: function (response) {
                    $('#exampleModal').modal('toggle');
                    if (response === true) {
                            Notiflix.Notify.success("Ajouté!");
                            window.location.replace("{% url 'partenaires' %}");
                    } else {
                        Notiflix.Loading.remove();
                        Notiflix.Notify.failure(
                            response['detail'], {
                                timeout: 5000,
                            });
                    }


                }
            })

        });

        $('.edite').on('click', function () {
            var id = $(this).attr('data-id');
            $.ajax({
                url: "{% url 'partenaire' %}",
                method: 'post',
                data: {
                    'partenaire_id': id,
                },
                dataType: 'json',
                headers: {'X-CSRFToken': '{{ csrf_token }}'},
                success: function (json) {
                    $('#id').val(json.id);
                    $('#edit_titre').val(json.titre);
                    $('#old_logo').val(json.logo);
                    $('#option1').val(json.statut);
                    if(json.statut){
                        $('#option1').text('Activé');
                    }else{
                        $('#option1').text('Désactivé');
                    }
                    $('#editeModal').modal('toggle');
                }
            })

        })

        $("#update_partenaire").on('submit', function (e) {
            e.preventDefault();
            var data = new FormData(this);
            $('#btn-edite').html('Modification en cours...');
            $('#btn-edite').attr('disabled', 'disabled');
            $.ajax({
                url: "{% url 'edit_partenaire' %}",
                method: 'post',
                data: data,
                dataType: 'json',
                processData: false,
                contentType: false,
                headers: {'X-CSRFToken': '{{ csrf_token }}'},
                success: function (response) {
                    $('#editeModal').modal('toggle');
                    if (response === true) {
                        Notiflix.Notify.success("Modifié.");
                        window.location.replace("{% url 'partenaires' %}");
                    } else {
                      Notiflix.Notify.failure(
                            response['detail'], {
                                timeout: 5000,
                            });
                    }
                }
            })
        })


       $(".delete").click(function () {
            var id = $(this).attr('data-id');
            var logo_name = $(this).attr('data-name');
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
                    Notiflix.Loading.dots('Patientez...');
                    $.ajax({
                        url: "{% url 'delete_partenaire' %}",
                        dataType: 'json',
                        method: 'post',
                        data: {
                            partenaire_id: id,
                            logo_name: logo_name,
                        },
                        headers: {'X-CSRFToken': '{{ csrf_token }}'},
                        success: function (response) {
                            if (response === true) {
                                location.reload();
                                Notiflix.Notify.success('Supprimé avec succès.',
                                    {
                                        position: 'right-bottom',
                                    },
                                );
                            } else {
                                Notiflix.Loading.remove();
                                console.log(response);
                                swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response['detail'],
                                });                            }
                        }
                    })
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Annulé'
                    })
                }
            })
        });

        function disable_partenaire(partenaire_id, titre) {
            Swal.fire({
                title: 'Êtes vous sur?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui'
            }).then((result) => {
                if (result.isConfirmed) {
                    Notiflix.Loading.dots('Patientez...');
                    $.ajax({
                        url: "{% url 'disable_partenaire' %}",
                        method: "post",
                        dataType: "json",
                        data: {
                            partenaire_id: partenaire_id,
                            titre: titre
                        },
                        headers: {'X-CSRFToken': '{{ csrf_token }}'},
                        success: function (response) {
                            if (response === true) {
                                location.reload();
                                Notiflix.Notify.success('Désactivée avec succès.',
                                    {
                                        position: 'right-bottom',
                                    },
                                );
                            } else {
                                Notiflix.Loading.remove();
                                console.log(response);
                                swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response['detail'],
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

        function enable_partenaire(partenaire_id, titre) {
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
                        url: "{% url 'enable_partenaire' %}",
                        method: "post",
                        dataType: "json",
                        data: {
                            partenaire_id: partenaire_id,
                            titre: titre
                        },
                        headers: {'X-CSRFToken': '{{ csrf_token }}'},
                        success: function (response) {
                            if (response === true) {
                                location.reload();
                                Notiflix.Notify.success('Activée avec succès.',
                                    {
                                        position: 'right-bottom',
                                    },
                                );
                            } else {
                                Notiflix.Loading.remove();
                                console.log(response);
                                swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response['detail'],
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
    </script>
{% endblock %}