<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/fancybox.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/panzoom.css" type="text/css">
<link type="text/css" href="<?php echo base_url(); ?>assets/admin/css/knockout-file-bindings.css" rel="stylesheet">
<style>
    .imagePreview {
        width: 100%;
        height: 180px;
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
        display: inline-block;
        box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
        display: block;
        border-radius: 0px;
        box-shadow: 0px 4px 6px 2px rgba(0, 0, 0, 0.2);
        margin-top: -5px;
    }

    .imgUp {
        margin-bottom: 15px;
    }

    .del {
        position: absolute;
        top: 0px;
        right: 15px;
        width: 30px;
        height: 30px;
        text-align: center;
        line-height: 30px;
        background-color: rgba(255, 255, 255, 0.6);
        cursor: pointer;
    }

    .imgAdd {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #4bd7ef;
        color: #fff;
        box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, 0.2);
        text-align: center;
        line-height: 30px;
        margin-top: 0px;
        cursor: pointer;
        font-size: 15px;
    }

    .file-upload {
        background-color: #ffffff;
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
    }

    .file-upload-btn {
        width: 100%;
        margin: 0;
        color: #fff;
        background: #f69900;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #f69900;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .file-upload-btn:hover {
        background: #f69900;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .file-upload-btn:active {
        border: 0;
        transition: all .2s ease;
    }

    .file-upload-content {
        display: none;
        text-align: center;
    }

    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }

    .image-upload-wrap {
        margin-top: 20px;
        border: 4px dashed #f69900;
        position: relative;
    }

    .image-dropping,
    .image-upload-wrap:hover {
        background-color: #f69900;
        border: 4px dashed #ffffff;
    }

    .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
    }

    .drag-text {
        text-align: center;
    }

    .drag-text h3 {
        font-weight: 300;
        text-transform: uppercase;
        color: #000000;
        padding: 60px 0;
    }

    .file-upload-image {
        max-height: 200px;
        max-width: 200px;
        margin: auto;
        padding: 20px;
    }

    .remove-image {
        width: 200px;
        margin: 0;
        color: #fff;
        background: #cd4535;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #b02818;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .remove-image:hover {
        background: #c13b2a;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .remove-image:active {
        border: 0;
        transition: all .2s ease;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-4 color-r"><?php echo $onglet_title; ?></h4>

                <div id="vertical-example" class="vertical-wizard">
                    <h3>Information generale</h3>
                    <form id="update_product" enctype="multipart/form-data">
                        <input type="hidden" name="article_id" value="<?php echo $article[0]['article_id']; ?>">
                        <section>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="mb-3">
                                        <label for="firstname">Designation </label>
                                        <input type="text" class="form-control" value="<?php echo $article[0]['designation']; ?>"
                                            id="firstname" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="mb-3">
                                        <label for="price">Prix</label>
                                        <input type="text" class="form-control" value="<?php echo  $article[0]['prix']; ?>"
                                            id="price" name="price">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="mb-3">
                                        <label for="prix_promo">Prix promo</label>
                                        <input type="text" class="form-control" value="<?php echo  $article[0]['prix_promo']; ?>"
                                            id="prix_promo" name="prix_promo">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="mb-3">
                                        <label for="qte" class="form-label">Quantité</label>
                                        <input type="text" class="form-control" id="qte"
                                            value="<?php echo  $article[0]['stock']; ?>" name="qte">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="mb-3">
                                        <label for="garantie" class="form-label">Garantie</label>
                                        <input type="text" class="form-control" id="garantie"
                                            value="<?php echo  $article[0]['garantie']; ?>" name="garantie">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="mb-3">
                                        <label for="brand">Marque</label>
                                        <select id="brand" class="form-select" name="brand">
                                            <?php
                                            foreach ($marques as $marq) :
                                                if ($marq['article_marque_id'] ==  $article[0]['marque_id']) {
                                            ?>
                                                    <option value="<?php echo $marq['article_marque_id']; ?>"><?php echo $marq['name']; ?></option>
                                            <?php
                                                }
                                            endforeach;
                                            ?>

                                            <?php
                                            foreach ($marques as $marq) :
                                            ?>
                                                <option value="<?php echo $marq['article_marque_id']; ?>"><?php echo $marq['name']; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="mb-3">
                                        <label for="color">Couleur</label>
                                        <select id="color" class="form-select" name="color">
                                            <?php
                                            foreach ($couleurs as $color) :
                                                if ($color['id_couleur'] ==  $article[0]['couleur_id']) {
                                            ?>
                                                    <option value="<?php echo $color['id_couleur']; ?>"><?php echo $color['code_couleur']; ?></option>
                                            <?php
                                                }
                                            endforeach;
                                            ?>
                                            <?php
                                            foreach ($couleurs as $color) :
                                            ?>
                                                <option value="<?php echo $color['id_couleur']; ?>"><?php echo $color['code_couleur']; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="mb-3">
                                        <label for="materiel">materiel</label>
                                        <select id="materiel" class="form-select" name="materiel">
                                            <?php
                                            foreach ($materiels as $materiel) :
                                                if ($materiel['materiel_id'] ==  $article[0]['materiel_id']) {
                                            ?>
                                                    <option value="<?php echo $materiel['materiel_id']; ?>"><?php echo $materiel['name']; ?></option>
                                            <?php
                                                }
                                            endforeach;
                                            ?>
                                            <?php
                                            foreach ($materiels as $materiel) :
                                            ?>
                                                <option value="<?php echo $materiel['materiel_id']; ?>"><?php echo $materiel['name']; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <h3>Details</h3>
                        <section>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="elm1" class="form-label">
                                            Description :</label>
                                        <textarea name="desc" id="elm1"><?php echo $article[0]['description']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="mb-3">
                                        <label for="sku" class="form-label">SKU</label>
                                        <input type="text" class="form-control" id="sku" name="sku"
                                            value="<?php echo  $article[0]['sku']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="mb-3">
                                        <label for="dimension" class="form-label">Dimension</label>
                                        <input type="text" class="form-control" id="dimension" name="dimension"
                                            value="<?php echo  $article[0]['dimension']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="mb-3">
                                        <label for="poids" class="form-label">Poids</label>
                                        <input type="text" class="form-control" id="poids" name="poids"
                                            value="<?php echo  $article[0]['poids']; ?>">
                                    </div>
                                </div>
                            </div>
                        </section>

                        <h3 class="mb-2">Images (format accepté : jpeg|jpg|png|webp)</h3>
                        <section>
                            <div>
                                <div class="card-body p-0 p-md-4">
                                    <div class="row">
                                        <div class="col-3 col-lg-1  me-4">
                                            <div class="image_min image">
                                                <img src="<?php echo base_url(); ?>uploads/articles/<?php echo  $article[0]['image_principale_article']; ?>" alt="image"
                                                    width="100" height="100" />
                                                <div class="overlay border_radius">
                                                    <a class="fancybox centered"
                                                        href="<?php echo base_url(); ?>uploads/articles/<?php echo  $article[0]['image_principale_article']; ?>"
                                                        data-fancybox="gallery">
                                                        <i class="icon-focus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $i = 1;
                                        foreach ($articles_img as $img) :
                                        ?>
                                            <div class="col-3 col-lg-1 me-4" id="image_liste">
                                                <div class="image_min image">
                                                    <img src="<?php echo base_url(); ?>uploads/articles/<?php echo $img['name']; ?>" alt="image"
                                                        width="100" height="100" />
                                                    <div class="overlay border_radius">
                                                        <a class="fancybox centered"
                                                            href="<?php echo base_url(); ?>uploads/articles/<?php echo $img['name']; ?>"
                                                            data-fancybox="gallery">
                                                            <i class="icon-focus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-3 col-lg-1 my-1 mb-4">
                                                    <button type="button"
                                                        class="btn btn-outline-danger btn-sm"
                                                        style="width: 100px" onclick="deleteImage('<?php echo $img['id']; ?>')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php
                                            $i++;
                                        endforeach;
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="mb-3">
                                            <div class="file-upload">
                                                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">
                                                    Choisir une image Principale
                                                </button>

                                                <div class="image-upload-wrap">
                                                    <input class="file-upload-input" name="picture" type='file' onchange="readURL(this);" accept="image/*" />
                                                    <div class="drag-text">
                                                        <h3>Faites glisser et déposez un fichier ou
                                                            cliquez sur choisir une image</h3>
                                                    </div>
                                                </div>
                                                <div class="file-upload-content">
                                                    <img class="file-upload-image" src="#" alt="your image" />

                                                    <div class="image-title-wrap">
                                                        <button type="button" onclick="removeUpload()" class="remove-image">supprimer <span class="image-title">Uploaded Image</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 col-sm-3 col-6  imgUp">
                                                    <div class="imagePreview"></div>
                                                    <label class="btn btn-primary">
                                                        charger
                                                        <input type="file" class="uploadFile img" multiple name="images[]" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                                    </label>
                                                </div>
                                                <!--                                                <i class="fa fa-plus imgAdd"></i>-->
                                            </div><!-- row -->
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Valider
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

</div>


<script src="<?php echo base_url(); ?>assets/admin/js/knockout.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/knockout-file-bindings.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/js/fancybox.umd.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/libs/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/pages/form-editor.init.js"></script>

<script>
    /*galerie Image*/
    Fancybox.bind('[data-fancybox="gallery"]', {
        caption: function(fancybox, carousel, slide) {
            return (
                `${slide.index + 1} / ${carousel.slides.length} <br />` + slide.caption
            );
        },
    });
</script>
<script>
    //beautiful multiple image field
    var viewModel = {};
    viewModel.fileData = ko.observable({
        dataURL: ko.observable(),
    });
    viewModel.multiFileData = ko.observable({
        dataURLArray: ko.observableArray(),
    });
    viewModel.onClear = function(fileData) {
        fileData.clear && fileData.clear();
    };
    viewModel.debug = function() {
        window.viewModel = viewModel;
        console.log(ko.toJSON(viewModel));
        debugger;
    };
    ko.fileBindings.defaultOptions.buttonText = 'Choisir';
    ko.fileBindings.defaultOptions.changeButtonText = 'Changer';
    ko.applyBindings(viewModel);
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image-upload-wrap').hide();

                $('.file-upload-image').attr('src', e.target.result);
                $('.file-upload-content').show();

                $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
        $('.file-upload-content').hide();
        $('.image-upload-wrap').show();
    }

    $('.image-upload-wrap').bind('dragover', function() {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function() {
        $('.image-upload-wrap').removeClass('image-dropping');
    });
</script>
<script>
    $(".imgAdd").click(function() {
        $(this).closest(".row").find('.imgAdd').before('<div class="col-lg-3 col-md-4 col-sm-3 col-6 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" name="images" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
    });
    $(document).on("click", "i.del", function() {
        // 	to remove card
        $(this).parent().remove();
        // to clear image
        // $(this).parent().find('.imagePreview').css("background-image","url('')");
    });
    $(function() {
        $(document).on("change", ".uploadFile", function() {
            var uploadFile = $(this);
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

            if (/^image/.test(files[0].type)) { // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function() { // set image data as background of div
                    uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url(" + this.result + ")");
                }
            }

        });
    });
</script>

<script>
    $(document).ready(function() {
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

        $('#update_product').submit(function(e) {
            e.preventDefault();
            var url = '<?php echo base_url(); ?>administration/article/edit_data_article';
            var data = new FormData(this);
            Notiflix.Loading.dots('Patientez...');
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                dataType: 'JSON',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response === true) {
                        Notiflix.Notify.success("modifié avec succès.");
                        $("#getcontent").load("<?php echo base_url("administration/article/get_articles") ?>");
                        Notiflix.Loading.remove();
                    } else {
                        Notiflix.Loading.remove();
                        console.log('message js :', response);
                        Notiflix.Notify.failure(
                            response, {
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
    });

    function deleteImage(image_id) {
        Swal.fire({
            title: 'Confirmation',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Supprimer'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo base_url(); ?>administration/article/delete_article_image",
                    method: "post",
                    dataType: "json",
                    data: {
                        image_id: image_id
                    },
                    success: function(response) {
                        if (response === true) {
                            Notiflix.Notify.success('Supprimé avec succès.', {
                                position: 'right-bottom',
                            }, );
                            $("#image_liste").load(location.href + " #image_liste");
                        } else {
                            swal.fire({
                                icon: 'error',
                                title: response
                            });
                        }
                    },
                    error: function() {
                        swal.fire('error');
                    }
                });
            } else {
                Toast.fire({
                    icon: 'error',
                    title: 'Annulé'
                })
            }
        });
    }
</script>