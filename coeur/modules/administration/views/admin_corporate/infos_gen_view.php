

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-lg">
                        <h4 class="color-r">Modifier les informations du site</h4>
                    </div>
                </div>
                <form action="" id="form_info" enctype="multipart/form-data"
                      style="border: solid 0; width: 100%; display: flex; justify-content: center;">
                    <div class="row" style="width: 100%;">
                        <div class="col-lg-3">
                            <?php
                            if ($infos['logo_info']):
                                ?>
                                <img src="<?php echo base_url() ?>uploads/logo/<?php echo $infos['logo_info'] ?>"
                                     alt=""  class="img-fluid">
                            <?php
                            else:
                                ?>
                                <img src="<?php echo base_url() ?>assets/admin/images/user.jpg" alt=""
                                     style="width:200px">
                            <?php
                            endif;
                            ?>
                        </div>
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Contact1</label>

                                    <input type="text" name="contact1" class="form-control" required placeholder="Inscrire le contact" value="<?php if (isset($infos['contact1_info'])){ echo $infos['contact1_info']; }?>" />
                                    <input type="hidden" name="id" class="form-control" value="<?php if (isset($infos['id_info'])){ echo $infos['id_info']; }?>" />
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Contact2</label>
                                    <input type="text" name="contact2" class="form-control" value="<?php if (isset($infos['contact2_info'])){ echo $infos['contact2_info']; }?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control" required  value="<?php if (isset($infos['email_info'])){ echo $infos['email_info']; }?>" />
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">localisation</label>
                                    <input type="text" name="localisation" class="form-control" required value="<?php if (isset($infos['localisation_info'])){ echo $infos['localisation_info']; }?>" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">lien Facebook</label>
                                    <input type="link" name="facebook" class="form-control"  value="<?php if (isset($infos['lien_facebook'])){ echo $infos['lien_facebook']; }?>" />
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">lien Whatsapp</label>
                                    <input type="link" name="whatsapp" class="form-control"  value="<?php if (isset($infos['lien_whatsapp'])){ echo $infos['lien_whatsapp']; }?>" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">lien linkedIn</label>
                                    <input type="link" name="linkedin" class="form-control"  value="<?php if (isset($infos['lien_linkedIn'])){ echo $infos['lien_linkedIn']; }?>" />
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">lien instagram</label>
                                    <input type="link" name="instagram" class="form-control"  value="<?php if (isset($infos['lien_instagram'])){ echo $infos['lien_instagram']; }?>" />
                                </div>
                            </div>
                            <div class="row">

                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">lien tiktok</label>
                                    <input type="link" name="tiktok" class="form-control"  value="<?php if (isset($infos['lien_tiktok'])){ echo $infos['lien_tiktok']; }?>" />
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Logo</label>
                                    <input type="file" class="form-control" name="logo">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="">Courte description</label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control"><?php if (isset($infos['court_description'])){ echo $infos['court_description']; }?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12" style="text-align: center">
                                    <br>
                                    <br>
                                    <button type="submit" class="btn btn-primary" style="width: 70%">Mise à jour</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function () {
        $("form#form_info").on(
            "submit",
            function(e)
            {
                // On empêche le navigateur de soumettre le formulaire
                e.preventDefault();
                // alert();
                // return false;

                var $this = $(this);
                var formdata = (window.FormData) ? new FormData($this[0]) : null;
                var data = (formdata !== null) ? formdata : $this.serialize();

                $.ajax({
                    url: "<?php echo base_url();?>administration/admin_corporate/add_information/",
                    type: "post",
                    contentType: false, // obligatoire pour de l'upload
                    processData: false, // obligatoire pour de l'upload
                    dataType: 'json', // JSON
                    data: data,
                    success: function(json) {
                        // console.log(json);
                        //$('#bs-example-modal-lg').modal('hide');
                        if(json===true){
                            $("#getcontent").load("<?php echo base_url("administration/admin_corporate/get_infos_gen/")?>");
                            $.growl.notice({ message: "Votre suppression effectuée avec succès !" });
                        } else {
                            $.growl.error({ message: "Echec de l'opération. Reprendre!" });
                            return false;
                        }

                    }
                });
                return false;
            }
        );
    });

</script>