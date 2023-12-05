<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="utf-8">
    <link href="<?php base_url() ?>assets/corporate/img/logov.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>gdj-modifier_award_lauréats</title>
    <?php
    $this->load->view('admin/layouts/css');
    ?>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/notiflix.css" />

    <style>
        h1 small {
            display: block;
            font-size: 15px;
            padding-top: 8px;
            color: gray;
        }

        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 20px auto;
        }

        .avatar-upload .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
        }

        .avatar-upload .avatar-edit input {
            display: None;
        }

        .avatar-upload .avatar-edit input+label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #FFFFFF;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }

        .avatar-upload .avatar-edit input+label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }

        .avatar-upload .avatar-edit input+label:after {
            content: "\f040";
            font-family: 'FontAwesome';
            color: #757575;
            position: absolute;
            top: 10px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }

        .avatar-upload .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }

        .avatar-upload .avatar-preview>div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
</head>

<body class="main">
    <?php
    $this->load->view('admin/layouts/mobile_menu');
    ?>

    <?php
    $this->load->view('admin/layouts/top_bar');
    ?>


    <div class="wrapper">
        <div class="wrapper-box">
            <?php
            $this->load->view('admin/layouts/sidebar');
            ?>
            <div class="content">
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Modifier le lauréat
                    </h2>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <div class="overflow-x-auto">
                        <form method="post" id="edit_laureate" enctype="multipart/form-data">
                            <input type="hidden" name="l_id" value="<?php echo $laureat['l_id']; ?>">
                            <div class="intro-y col-span-12 sm:col-span-3">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' name="l_image" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url('<?php echo base_url(); ?>assets/admin/images/laureates/<?php echo $laureat['l_image']; ?>')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                                <div class="intro-y col-span-12 sm:col-span-4">
                                    <label for="input-wizard-4" class="form-label">Nom & Prénoms</label>
                                    <input id="input-wizard-4" type="text" value="<?php echo $laureat['l_name']; ?>" required class="form-control" name="l_name" placeholder="Nom $ prénoms">
                                </div>
                                <div class="intro-y col-span-6 sm:col-span-4">
                                    <label for="input-wizard-7" class="form-label">Niveau</label>
                                    <select id="input-wizard-7" class="form-select" name="l_level">
                                        <option value="<?php echo $laureat['l_level']; ?>"><?php echo $laureat['l_level']; ?></option>
                                        <option value="Licence 1">Licence 1</option>
                                        <option value="Licence 2">Licence 2</option>
                                        <option value="Licence 3 privée">Licence 3 privée</option>
                                        <option value="Licence 3 public">Licence 3 public</option>
                                        <option value="Master 1">Master 1</option>
                                        <option value="Master 2">Master 2</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020 </option>
                                        <option value="2021">2021 </option>
                                        <option value="2022">2022 </option>
                                        <option value="2023">2023</option>
                                        <option value="Autres">Autres</option>
                                        <option value="Autres">Autres</option>
                                    </select>
                                </div>
                                <div class="intro-y col-span-6 sm:col-span-4">
                                    <label for="input-wizard-7" class="form-label">Catégorie</label>
                                    <select id="input-wizard-7" class="form-select" required name="award_id">
                                        <?php
                                        foreach ($categories as $cat) :
                                            if ($cat['cat_id'] == $laureat['award_id']) {
                                        ?>
                                                <option selected value="<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_name']; ?></option>
                                        <?php
                                            }
                                        endforeach
                                        ?>

                                        <?php
                                        foreach ($categories as $cat) :
                                        ?>
                                            <option value="<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_name']; ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                                    <input class="btn btn-primary w-24 ml-2" type="submit" value="Modifer">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    $this->load->view('admin/layouts/js');
    ?>
    <script src="<?php echo base_url() ?>assets/admin/fontawesome/js/all.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/notiflix.js"></script>

    <script>
        $('.side-menu').removeClass('side-menu--active');
        $("#add_award_menu").addClass('side-menu--active');
        $("#award_menu ~ ul").addClass('side-menu__sub-open');
        $("#award_menu").addClass('side-menu--active');

        $("#locate_link").text('Ajout de lauréat');
    </script>


    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageUpload").change(function() {
            readURL(this);
        });
    </script>
    <script>
        $("#edit_laureate").submit(function(e) {
            e.preventDefault();
            var $this = $(this);
            var url = '<?php echo base_url('update_laureates'); ?>';
            var data = new FormData(this);
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response === true) {
                        Swal.fire(
                            'Succès!',
                            'Lauréat Modifié!',
                            'success'
                        ).then((result) => {
                            if (result) {
                                window.location.reload();
                            }
                        })
                    } else if (response === false) {
                        Swal.fire(
                            'Echèc!',
                            'lauréat non créé Modifié à nouveau!',
                            'error'
                        )
                    } else {
                        console.log('message js :', response);
                        Notiflix.Notify.failure(
                            response, {
                                timeout: 5000,
                            });
                    }
                },
                error: function() {
                    swal.fire('error');
                }
            });
        });
    </script>

</body>

</html>