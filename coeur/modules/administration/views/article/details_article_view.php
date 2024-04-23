<!-- select2 css -->
<link href="<?php echo base_url(); ?>assets/admin/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

<!-- dropzone css -->
<link href="<?php echo base_url(); ?>assets/admin/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

<!-- Bootstrap Css -->
<link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

<!-- App Css-->
<link href="<?php echo base_url(); ?>assets/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p></p>
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"><?php echo $onglet_title;?></h4>
                </div>

                <!--  <h4 class="card-title">Example</h4>
                 <p class="card-title-desc">This is an experimental awesome solution for responsive tables with complex data.</p> -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="product-detai-imgs">
                                            <div class="row">
                                                <div class="col-md-2 col-sm-3 col-4">
                                                    <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                        <a class="nav-link active" id="product-1-tab" data-bs-toggle="pill" href="#product-1" role="tab" aria-controls="product-1" aria-selected="true">
                                                            <img src="<?php echo base_url(); ?>uploads/articles/<?php echo $article[0]['image_principale_article']; ?>" alt="" class="img-fluid mx-auto d-block rounded">
                                                        </a>
                                                        <?php
                                                        if(!empty($articles_img)){
                                                            $i=1;
                                                            foreach ($articles_img as $img){
                                                                $i++;
                                                        ?>
                                                        <a class="nav-link" id="product-<?php echo $i;?>-tab" data-bs-toggle="pill" href="#product-<?php echo $i;?>" role="tab" aria-controls="product-2" aria-selected="false">
                                                            <img src="<?php echo base_url() ?>uploads/articles/<?php echo $img['name']; ?>" alt=""
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
                                                        <div class="tab-pane fade show active" id="product-1" role="tabpanel" aria-labelledby="product-1-tab">
                                                            <div>
                                                                <img src="<?php echo base_url(); ?>uploads/articles/<?php echo $article[0]['image_principale_article']; ?>" alt="" class="img-fluid mx-auto d-block">
                                                            </div>
                                                        </div>
                                                        <?php
                                                        if(!empty($articles_img)){
                                                            $i=1;
                                                        foreach ($articles_img as $img){
                                                            $i++;
                                                        ?>
                                                        <div class="tab-pane fade" id="product-<?php echo $i;?>" role="tabpanel" aria-labelledby="product-<?php echo $i;?>-tab">
                                                            <div>
                                                                <img src="<?php echo base_url() ?>uploads/articles/<?php echo $img['name']; ?>" alt="" class="img-fluid mx-auto d-block">
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
                                            <a href="javascript: void(0);" class="text-primary">
                                                <?php
                                                foreach ($categories as $cat) :
                                                    if ($cat['category_id'] == $article[0]['category_id']) :
                                                        echo ucfirst($cat['name']);
                                                    endif;
                                                endforeach;
                                                ?>
                                            </a>
                                            <?php
                                            if($article[0]['sous_category_id']):
                                            ?>
                                                / <a href="javascript: void(0);" class="text-primary">
                                                <?php
                                                foreach ($sous_categories as $s_cat) :
                                                    if ($s_cat['sous_category_id'] == $article[0]['sous_category_id']) :
                                                        echo ucfirst($s_cat['name']);
                                                    endif;
                                                endforeach;
                                                ?>
                                            </a>
                                            <?php
                                            endif;
                                            ?>
                                            <h4 class="mt-1 mb-3"><?php echo ucfirst($article[0]['designation']); ?></h4>

<!--                                            <p class="text-muted mb-4">( 50 vues )</p>-->
                                            <h5 class="mb-4">Prix : <span class="text-muted me-2"></span>
                                                <b><?php echo number_format($article[0]['prix'], 0, ',', ' '); ?> Fcfa</b></h5>
                                            <div>

                                            </div>
                                            <p class="text-muted mb-4">
                                            <div class="mt-5">
                                                <h5 class="mb-3">Details :</h5>

                                                <div class="table-responsive">
                                                    <table class="table mb-0 table-bordered">
                                                        <tbody>
                                                        <tr>
                                                            <th scope="row" style="width: 400px;">Marque</th>
                                                            <td>
                                                                <?php
                                                                foreach ($marques as $marq) :
                                                                    if ($marq['article_marque_id'] == $article[0]['marque_id']) {
                                                                        echo ucfirst($marq['name']);
                                                                    }
                                                                endforeach;
                                                                ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" style="width: 400px;">Couleur</th>
                                                            <td>
                                                                <?php
                                                                foreach ($couleurs as $color) :
                                                                    if ($color['id_couleur'] == $article[0]['couleur_id']) {
                                                                        echo ucfirst($color['code_couleur']);
                                                                    }
                                                                endforeach;
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" style="width: 400px;">Garantie:</th>
                                                            <td><?php echo $article[0]['garantie']; ?> mois</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" style="width: 400px;">Dimension:</th>
                                                            <td>
                                                                <?php echo $article[0]['dimension']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" style="width: 400px;">SKU:</th>
                                                            <td><?php echo $article[0]['sku']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Stock:</th>
                                                            <td><?php echo $article[0]['stock']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Poids</th>
                                                            <td><?php echo $article[0]['poids']; ?> kg</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="mt-5">
                                    <h5 class="mb-3">Description :</h5>

                                    <div class="table-responsive">
                                        <?php echo $article[0]['description']; ?>
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
    $(document).ready(function(){

        $("#back").on('click',function() {
            $("#getcontent").load("<?php echo base_url("administration/automobile/get_vehicule")?>");

        });


        $('#form_auto').on('submit', function(e){
            e.preventDefault();
            var $this = $(this);
            var formdata = (window.FormData) ? new FormData($this[0]) : null;
            var data = (formdata !== null) ? formdata : $this.serialize();
            // console.log(data);
            $.ajax({
                url: "<?php echo base_url();?>administration/automobile/add_vehicule/",
                type: "post",
                contentType: false, // obligatoire pour de l'upload
                processData: false, // obligatoire pour de l'upload
                dataType: 'json', // JSON
                data: data,
                success: function(json) {
                    console.log(json);
                    //$('#bs-example-modal-lg').modal('hide');
                    //$("#get_content").load("<?php //echo base_url("candidats/get_candidat/") ?>//"+id_session+"/"+id_examen);
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


      