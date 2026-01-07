<!-- select2 css -->
<link href="<?php echo base_url(); ?>assets/admin/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

<!-- dropzone css -->
<link href="<?php echo base_url(); ?>assets/admin/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

<!-- Bootstrap Css -->
<link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

<!-- App Css-->
<link href="<?php echo base_url(); ?>assets/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<style>
    .article-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .article-header h4 {
        color: white;
        margin: 0;
        font-weight: 600;
    }

    .product-card {
        border: none;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    .product-card .card-body {
        padding: 25px;
    }

    .nav-pills .nav-link {
        border: 2px solid #e9ecef;
        margin-bottom: 10px;
        border-radius: 8px;
        transition: all 0.3s;
    }

    .nav-pills .nav-link:hover {
        border-color: #667eea;
        transform: scale(1.05);
    }

    .nav-pills .nav-link.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-color: #667eea;
    }

    .category-badge {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
        display: inline-block;
        margin-right: 5px;
    }

    .product-title {
        color: #2c3e50;
        font-weight: 700;
        font-size: 28px;
        margin: 15px 0;
    }

    .price-badge {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        color: white;
        padding: 12px 25px;
        border-radius: 25px;
        font-size: 24px;
        font-weight: 700;
        display: inline-block;
        box-shadow: 0 4px 15px rgba(17, 153, 142, 0.3);
    }

    .details-section {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        margin-top: 20px;
    }

    .details-section h5 {
        color: #667eea;
        font-weight: 700;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 3px solid #667eea;
    }

    .details-table {
        background: white;
        border-radius: 8px;
        overflow: hidden;
    }

    .details-table thead {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .details-table th {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        font-weight: 600;
        padding: 15px;
        border: none;
    }

    .details-table td {
        padding: 15px;
        border-bottom: 1px solid #e9ecef;
        vertical-align: middle;
    }

    .details-table tbody tr:hover {
        background-color: #f8f9fa;
        transition: background-color 0.3s;
    }

    .info-badge {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
        padding: 5px 12px;
        border-radius: 15px;
        font-size: 13px;
        font-weight: 500;
    }

    .stock-badge {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        color: #2c3e50;
        padding: 5px 12px;
        border-radius: 15px;
        font-size: 13px;
        font-weight: 600;
    }

    .description-section {
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        padding: 25px;
        border-radius: 10px;
        margin-top: 30px;
        border-left: 5px solid #667eea;
    }

    .description-section h5 {
        color: #2c3e50;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .image-container {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .image-container img {
        transition: transform 0.3s;
    }

    .image-container:hover img {
        transform: scale(1.05);
    }
</style>
<?php
$current_article = !empty($article) && isset($article[0]) ? $article[0] : array();
$article_images = !empty($articles_img) ? $articles_img : array();

$articlePrix = isset($current_article['prix']) ? (float)$current_article['prix'] : 0;
$articleDesignation = isset($current_article['designation']) ? ucfirst($current_article['designation']) : '';
$articleDescription = isset($current_article['description']) ? $current_article['description'] : '';
$articleGarantie = isset($current_article['garantie']) ? (int)$current_article['garantie'] : null;
$articleDimension = isset($current_article['dimension']) ? $current_article['dimension'] : '';
$articleSku = isset($current_article['sku']) ? $current_article['sku'] : '';
$articleStock = isset($current_article['stock']) ? (int)$current_article['stock'] : 0;
$articlePoids = isset($current_article['poids']) ? $current_article['poids'] : '';
$articleImagePrincipale = isset($current_article['image_principale_article']) ? $current_article['image_principale_article'] : '';
$articleCategoryId = isset($current_article['category_id']) ? $current_article['category_id'] : null;
$articleSousCategoryId = isset($current_article['sous_category_id']) ? $current_article['sous_category_id'] : null;
$articleCouleurId = isset($current_article['couleur_id']) ? $current_article['couleur_id'] : null;
$articleMarqueId = isset($current_article['marque_id']) ? $current_article['marque_id'] : null;

$categoryName = '';
if (!empty($categories) && $articleCategoryId !== null) {
    foreach ($categories as $cat) {
        if ((int)$cat['category_id'] === (int)$articleCategoryId) {
            $categoryName = ucfirst($cat['name']);
            break;
        }
    }
}

$sousCategoryName = '';
if (!empty($sous_categories) && $articleSousCategoryId !== null) {
    foreach ($sous_categories as $s_cat) {
        if ((int)$s_cat['sous_category_id'] === (int)$articleSousCategoryId) {
            $sousCategoryName = ucfirst($s_cat['name']);
            break;
        }
    }
}

$colorName = '';
if (!empty($couleurs) && $articleCouleurId !== null) {
    foreach ($couleurs as $color) {
        if ((int)$color['id_couleur'] === (int)$articleCouleurId) {
            $colorName = ucfirst($color['code_couleur']);
            break;
        }
    }
}

$brandName = '';
if (!empty($marques) && $articleMarqueId !== null) {
    foreach ($marques as $marq) {
        if ((int)$marq['article_marque_id'] === (int)$articleMarqueId) {
            $brandName = ucfirst($marq['name']);
            break;
        }
    }
}
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="article-header">
                    <h4 class="mb-0"><?php echo $onglet_title; ?></h4>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card product-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="product-detai-imgs">
                                            <div class="row">
                                                <div class="col-md-2 col-sm-3 col-4">
                                                    <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                        <?php if (!empty($articleImagePrincipale)) : ?>
                                                            <a class="nav-link active" id="product-1-tab" data-bs-toggle="pill" href="#product-1" role="tab" aria-controls="product-1" aria-selected="true">
                                                                <img src="<?php echo base_url(); ?>uploads/articles/<?php echo $articleImagePrincipale; ?>" alt="" class="img-fluid mx-auto d-block rounded">
                                                            </a>
                                                        <?php endif; ?>
                                                        <?php
                                                        if (!empty($article_images)) {
                                                            $i = 1;
                                                            foreach ($article_images as $img) {
                                                                if (empty($img['name'])) {
                                                                    continue;
                                                                }
                                                                $i++;
                                                        ?>
                                                                <a class="nav-link <?php echo $i === 2 && empty($articleImagePrincipale) ? 'active' : ''; ?>" id="product-<?php echo $i; ?>-tab" data-bs-toggle="pill" href="#product-<?php echo $i; ?>" role="tab" aria-controls="product-<?php echo $i; ?>" aria-selected="false">
                                                                    <img src="<?php echo base_url(); ?>uploads/articles/<?php echo $img['name']; ?>" alt=""
                                                                        class="img-fluid mx-auto d-block rounded">
                                                                </a>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        <?php if (!empty($articleImagePrincipale)) : ?>
                                                            <div class="tab-pane fade show active" id="product-1" role="tabpanel" aria-labelledby="product-1-tab">
                                                                <div class="image-container">
                                                                    <img src="<?php echo base_url(); ?>uploads/articles/<?php echo $articleImagePrincipale; ?>" alt="" class="img-fluid mx-auto d-block">
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php
                                                        if (!empty($article_images)) {
                                                            $i = !empty($articleImagePrincipale) ? 1 : 0;
                                                            foreach ($article_images as $img) {
                                                                if (empty($img['name'])) {
                                                                    continue;
                                                                }
                                                                $i++;
                                                        ?>
                                                                <div class="tab-pane fade <?php echo $i === 1 && empty($articleImagePrincipale) ? 'show active' : ''; ?>" id="product-<?php echo $i; ?>" role="tabpanel" aria-labelledby="product-<?php echo $i; ?>-tab">
                                                                    <div class="image-container">
                                                                        <img src="<?php echo base_url(); ?>uploads/articles/<?php echo $img['name']; ?>" alt="" class="img-fluid mx-auto d-block">
                                                                    </div>
                                                                </div>
                                                        <?php
                                                            }
                                                        }
                                                        ?>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="mt-4 mt-xl-3">
                                            <?php if (!empty($categoryName)) : ?>
                                                <span class="category-badge"><?php echo $categoryName; ?></span>
                                            <?php endif; ?>
                                            <?php if (!empty($sousCategoryName)) : ?>
                                                <span class="category-badge"><?php echo $sousCategoryName; ?></span>
                                            <?php endif; ?>
                                            <h4 class="product-title"><?php echo $articleDesignation; ?></h4>

                                            <div class="mb-4">
                                                <?php if ($articlePrix > 0) : ?>
                                                    <span class="price-badge"><?php echo number_format($articlePrix, 0, ',', ' ') . ' Fcfa'; ?></span>
                                                <?php else : ?>
                                                    <span class="price-badge" style="background: linear-gradient(135deg, #95a5a6 0%, #7f8c8d 100%);">—</span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="details-section">
                                                <h5>Détails de l'article</h5>

                                                <div class="table-responsive">
                                                    <table class="table mb-0 details-table">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row" style="width: 200px;">Marque</th>
                                                                <td>
                                                                    <?php if (!empty($brandName)) : ?>
                                                                        <span class="info-badge"><?php echo $brandName; ?></span>
                                                                    <?php else : ?>
                                                                        <span>—</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" style="width: 200px;">Couleur</th>
                                                                <td>
                                                                    <?php if (!empty($colorName)) : ?>
                                                                        <span class="info-badge"><?php echo $colorName; ?></span>
                                                                    <?php else : ?>
                                                                        <span>—</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" style="width: 200px;">Garantie</th>
                                                                <td>
                                                                    <?php if ($articleGarantie) : ?>
                                                                        <span class="info-badge"><?php echo $articleGarantie . ' mois'; ?></span>
                                                                    <?php else : ?>
                                                                        <span>—</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" style="width: 200px;">Dimension</th>
                                                                <td>
                                                                    <?php if (!empty($articleDimension)) : ?>
                                                                        <span class="info-badge"><?php echo $articleDimension; ?></span>
                                                                    <?php else : ?>
                                                                        <span>—</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" style="width: 200px;">SKU</th>
                                                                <td>
                                                                    <?php if (!empty($articleSku)) : ?>
                                                                        <span class="info-badge"><?php echo $articleSku; ?></span>
                                                                    <?php else : ?>
                                                                        <span>—</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Stock</th>
                                                                <td>
                                                                    <span class="stock-badge"><?php echo $articleStock; ?> unités</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Poids</th>
                                                                <td>
                                                                    <?php if (!empty($articlePoids)) : ?>
                                                                        <span class="info-badge"><?php echo $articlePoids . ' kg'; ?></span>
                                                                    <?php else : ?>
                                                                        <span>—</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="description-section">
                                    <h5>Description</h5>
                                    <div>
                                        <?php echo !empty($articleDescription) ? $articleDescription : '<p class="text-muted">Aucune description disponible.</p>'; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end row -->

            </div>
            <!-- end row -->

        </div>
    </div>
</div> <!-- end col -->
</div> <!-- end row -->
<script>
    $(document).ready(function() {

        $("#back").on('click', function() {
            $("#getcontent").load("<?php echo base_url("administration/automobile/get_vehicule") ?>");

        });


        $('#form_auto').on('submit', function(e) {
            e.preventDefault();
            var $this = $(this);
            var formdata = (window.FormData) ? new FormData($this[0]) : null;
            var data = (formdata !== null) ? formdata : $this.serialize();
            // console.log(data);
            $.ajax({
                url: "<?php echo base_url(); ?>administration/automobile/add_vehicule/",
                type: "post",
                contentType: false, // obligatoire pour de l'upload
                processData: false, // obligatoire pour de l'upload
                dataType: 'json', // JSON
                data: data,
                success: function(json) {
                    console.log(json);
                    //$('#bs-example-modal-lg').modal('hide');
                    //$("#get_content").load("<?php //echo base_url("candidats/get_candidat/") 
                                                ?>//"+id_session+"/"+id_examen);
                }
            });
        })
    });
</script>

<!-- Required datatable js -->
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>


<!-- select 2 plugin -->
<script src="<?php echo base_url(); ?>assets/admin/libs/select2/js/select2.min.js"></script>

<!-- dropzone plugin -->
<script src="<?php echo base_url(); ?>assets/admin/libs/dropzone/min/dropzone.min.js"></script>

<!--tinymce js-->
<script src="<?php echo base_url(); ?>assets/admin/libs/tinymce/tinymce.min.js"></script>

<!-- init js -->
<script src="<?php echo base_url(); ?>assets/admin/js/pages/form-editor.init.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/pages/ecommerce-select2.init.js"></script>