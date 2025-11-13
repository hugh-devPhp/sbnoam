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
                    <form id="add_product" enctype="multipart/form-data">
                        <section>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-4">
                                    <div class="mb-3">
                                        <label for="firstname">Designation </label>
                                        <input type="text" class="form-control" id="firstname" name="name" placeholder="Nom du produit" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4">
                                    <div class="mb-3">
                                        <label for="price">Prix</label>
                                        <input type="number" class="form-control" required id="price" name="price" min="0" step="0.01">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4">
                                    <div class="mb-3">
                                        <label for="prix_promo">Prix promo</label>
                                        <input type="number" class="form-control" id="prix_promo" name="prix_promo" min="0" step="0.01">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="mb-3">
                                        <label for="qte" class="form-label">Quantité</label>
                                        <input type="number" class="form-control" id="qte" required name="qte" min="0">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="mb-3">
                                        <label for="garantie" class="form-label">Garantie (en mois)</label>
                                        <input type="number" class="form-control" id="garantie" required name="garantie" min="0">
                                    </div>
                                </div>
                                <!-- <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="mb-3">
                                        <label for="brand">Marque</label>
                                        <select id="brand" class="form-select" name="brand" required>
                                            <option value="">Choisir...</option>
                                            <?php
                                            foreach ($marques as $marq) :
                                            ?>
                                                <option value="<?php echo $marq['article_marque_id']; ?>"><?php echo $marq['name']; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="mb-3">
                                        <label for="color">Couleur</label>
                                        <select id="color" class="form-select" name="color" required>
                                            <option value="">Choisir...</option>
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
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="mb-3">
                                        <label for="cat">Collection</label>
                                        <select id="cat" class="form-select" name="collection" required>
                                            <option value="">Choisir...</option>
                                            <?php
                                            foreach ($collection as $col) :
                                            ?>
                                                <option value="<?php echo $col['id_collection']; ?>"><?php echo $col['name']; ?></option>
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
                                        <textarea id="elm1" name="desc"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="mb-3">
                                        <label for="sku" class="form-label">SKU</label>
                                        <input type="text" class="form-control" id="sku" name="sku" placeholder="Numéro sku">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="mb-3">
                                        <label for="dimension" class="form-label">Dimension</label>
                                        <input type="text" class="form-control" id="dimension" name="dimension" placeholder="Dimension de l'article">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="mb-3">
                                        <label for="poids" class="form-label">Poids (en kg)</label>
                                        <input type="number" class="form-control" id="poids" step="0.01" name="poids">
                                    </div>
                                </div>
                            </div>
                        </section>

                        <h3 class="mb-2">Images</h3>
                        <section>
                            <div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="mb-3">
                                            <div class="file-upload">
                                                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">
                                                    Choisir une image Principale
                                                </button>

                                                <div class="image-upload-wrap">
                                                    <input class="file-upload-input" name="picture" required type='file' onchange="readURL(this);" accept="image/*" />
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


<!--tinymce js-->
<script src="<?php echo base_url(); ?>assets/admin/libs/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/pages/form-editor.init.js"></script>
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

        $('#add_product').submit(function(e) {
            e.preventDefault();
            var url = '<?php echo base_url(); ?>administration/article/add_article';
            var data = new FormData(this);
            console.log('data =', data.get('picture'));
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
                        Notiflix.Notify.success("Ajouté avec succès.");
                        $("#getcontent").load("<?php echo base_url("administration/article/get_articles") ?>");
                        Notiflix.Loading.remove();
                    } else {
                        Notiflix.Loading.remove();
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
    });
</script>