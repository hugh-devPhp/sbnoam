<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           

          

                        <!-- start page title -->
                        <!-- <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18"><?php echo $onglet_title;?></h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Responsive Table</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div> -->
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <p></p>
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18"><?php echo $onglet_title;?></h4>

                                    <div class="page-title-right">
                                    <?php //if(in_array('add_user', is_inarray())) { ?>
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bx bx-pencil font-size-16 align-middle me-2"></i>Modifier mes infos</button>&nbsp;&nbsp;<button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#EditMyModal"><i class="bx bx-reset font-size-16 align-middle me-2"></i>Modifier mot de passe</button>
                                    <?php //} ?> 
                                    <!-- sample modal content -->
                    <div id="myModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

    <?php $attributes = array('id' => 'addoform', 'name'=> 'addoform', 'enctype'=> 'multipart/form-data', 'method'=> 'post', 'role'=> 'form', "class"=>"custom-validation");  echo form_open('', $attributes);?>
    <input type="hidden" name="docok" id="docok" value="ok">
                                                        <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel" >MODIFIER MES INFOS</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">


                      <div class="mb-3">
                      <?php  if(($mesinfos->laphoto!="") && is_file("assets/img_photo/".$mesinfos->laphoto)){ ?>
                         <img src="<?php echo  base_url()."assets/img_photo/".$mesinfos->laphoto;?>" alt="" data-src="<?php echo  base_url()."assets/img_photo/".$mesinfos->laphoto;?>" data-src-retina="<?php echo  base_url()."assets/img_photo/".$mesinfos->laphoto;?>" width="120">
                        <?php }

                        else if((mb_strtolower($mesinfos->civilite)=='mme') || (strtolower($mesinfos->civilite)=='mlle')){ ?>
                        <div class="profile-wrapper">
                          <img src="<?=base_url();?>assets/images/users/avatar-1.jpg" alt="" >
                        </div>
                         <?php } else { ?>
                         <div class="profile-wrapper">
                          <img src="<?=base_url();?>assets/images/users/avatar-2.jpg" alt="" >
                        </div>
                         <?php } ?>
                      </div>
                      <div class="mb-3">
                                        <label class="form-label">Photo</label>
                                        <input type="file" name="photo" id="photo">
                                                            </div>





                                                            <div class="mb-3">
                                        <label class="form-label">Pseudo</label>
                                        <input type="text" id="pseudo" name="pseudo" class="form-control" required value="<?php echo $mesinfos->matricule;?>"/>
                                                            </div>
                                                             <div class="mb-3">
                                        <label class="form-label">Nom</label>
                                        <input type="text" id="nom" name="nom" class="form-control" required value="<?php echo mb_strtoupper($mesinfos->nom);?>" />
                                                            </div>
                                                             <div class="mb-3">
                                        <label class="form-label">Prénoms</label>
                                        <input type="text" id="prenom" name="prenom" class="form-control" value="<?php echo $mesinfos->prenom;?>" />
                                                            </div>
                                                            <div class="mb-3">
                                            <div class="templating-select">
                                            <label class="form-label">Civilité</label>
                                <?php echo form_dropdown("civil", $liste_civil, $mesinfos->civilite,"id='civil'  class='form-control' "); ?>
                                            </div>
                                                            </div>
                                                            <div class="mb-3">
                                        <label for="formrow-prof-input" class="form-label">Profil</label>
                                        <input type="text" class="form-control" id="formrow-prof-input" readonly value="<?php echo mb_strtoupper($mesinfos->code_profils);?>">
                                            </div>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Annuler</button>
                                                            <button type="submit" id="okvalid" class="btn btn-primary waves-effect waves-light">Valider</button>
                                                        </div>
                    <?php echo form_close();?>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <div id="EditMyModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
    <?php $attributes = array('id' => 'modform', 'name'=> 'modform', "class"=>"custom-validation"); echo form_open('', $attributes);?>
    <input type="hidden" name="initok" id="initok" value="ok">
                                                        <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel" >MODIFIER MOT DE PASSE</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <div class="mb-3">
                                            <label for="password-addon" class="form-label">Ancien Mot de passe</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" aria-label="Password" aria-describedby="password-addon" name="oldpass" id="oldpass" required>
                                                <button class="btn btn-light" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                        <label class="form-label">Nouveau Mot de passe</label>
                                        <input type="password" id="newpass" name="newpass" class="form-control" required value="" /></div>

                                                        <div class="mb-3">
                                        <label class="form-label">Retaper nouveau passe</label>
                                        <input type="password" id="repeatpass" name="repeatpass" class="form-control" required value="" />
                                    </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Annuler</button>
                                                            <button type="submit" id="validedit" class="btn btn-primary waves-effect waves-light">Modifier</button>
                                                        </div>
                    <?php echo form_close();?>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    
                    
                                    </div>

                                </div>
        <?php //print_r($mesinfos);?>
                                       <!--  <h4 class="card-title">Example</h4>
                                        <p class="card-title-desc">This is an experimental awesome solution for responsive tables with complex data.</p> -->


                            <div class="col-xl-12">
                                <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">

                                        <form>
                                        <?php  if(($mesinfos->laphoto!="") && is_file("assets/img_photo/".$mesinfos->laphoto)){ ?>
                                            <div class="mb-3">
                         <div class="profile-wrapper">
                           <img src="<?php echo  base_url()."assets/img_photo/".$mesinfos->laphoto;?>" alt="" data-src="<?php echo  base_url()."assets/img_photo/".$mesinfos->laphoto;?>" data-src-retina="<?php echo  base_url()."assets/img_photo/".$mesinfos->laphoto;?>" >
                         </div>
                                            </div>
                                            <?php } ?>
                                            <div class="mb-3">
                                                <label >Pseudo</label>
                                                <input type="text" class="form-control" readonly value="<?php echo $mesinfos->matricule;?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="formrow-nom-input" class="form-label">Nom</label>
                                                <input type="text" class="form-control" id="formrow-nom-input" readonly value="<?php echo mb_strtoupper($mesinfos->nom);?>">
                                            </div>

                                            <div class="mb-3">
                                                <label>Prenoms</label>
                                                <input type="text" class="form-control" id="formrow-prenoms-input" readonly value="<?php echo $mesinfos->prenom;?>">
                                            </div>

                                            <div class="mb-3">
                                                <label>Civilité</label>
                                                <input type="text" class="form-control" id="formrow-civil-input" readonly value="<?php echo $mesinfos->civilite;?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="formrow-prof-input" class="form-label">Profil</label>
                                                <input type="text" class="form-control" id="formrow-prof-input" readonly value="<?php echo mb_strtoupper($mesinfos->code_profils);?>">
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                        </div>  

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
<script>
    $(document).ready(function(){

        $("#oldpass").on('input',function() { 
            $("#oldpass").css({ "background-color": "#ffffff"});
        });

        $("#newpass").on('focus',function() { 
      
        var letype = $("#oldpass").attr('type');
        if(letype=='password') {
                document.getElementById("newpass").type="password";
                document.getElementById("repeatpass").type="password";
                } 
                    else { 
                document.getElementById("newpass").type="text";
                document.getElementById("repeatpass").type="text";
            }
        
        });

        $("#repeatpass").on('focus',function() { 
            $("#repeatpass").css({ "background-color": "#ffffff"});
      
        var letype = $("#oldpass").attr('type');
        if(letype=='password') {
                document.getElementById("newpass").type="password";
                document.getElementById("repeatpass").type="password";
                } 
                    else { 
                document.getElementById("newpass").type="text";
                document.getElementById("repeatpass").type="text";
            }
        
        });

        //////////
         $("form#addoform").on(
            "submit",
            function(e)
                     {
                           // On empêche le navigateur de soumettre le formulaire
                         e.preventDefault();

          $("#okvalid").attr("disabled", "disabled").html("Enregistrement des données en cours... ");

        var $this = $(this);

        var formdata = (window.FormData) ? new FormData($this[0]) : null;
        var data = (formdata !== null) ? formdata : $this.serialize();

        $.ajax({
          url: "<?php echo base_url();?>administration/infoperso/do_infoperso",
          type: $this.attr('method'),
          contentType: false, // obligatoire pour de l'upload
          processData: false, // obligatoire pour de l'upload
          dataType: 'json', // JSON
          data: data,
          success: function(json) {
                    if(json.reponse === '1') {
              $("body, div").removeClass('modal-open modal-backdrop');
              $('html, body').css({overflow: 'auto', height: 'auto'});
              window.location.href = "<?php echo base_url('administration/infoperso');?>";
              //$("#getcontent").load("<?php echo base_url("administration/infoperso/get_infoperso")?>");
              $.growl.notice({ message: "Votre opération s'est bien effectuée!" });
          }  else {
                  $.growl.error({ message: "Echec de l'opération, veuillez verifier et reprendre." });
                   $("#okvalid").attr("disabled", false).html("Valider");
                  return false;
                    }
                }
            });

          return false;
                }
              );
            ///////////////////////////

         $("form#modform").on(
            "submit",
            function(e)
                     {
                           // On empêche le navigateur de soumettre le formulaire
                         e.preventDefault();

          var newpass= $('#newpass').val();
          var repeatpass= $('#repeatpass').val();

          if(newpass!=repeatpass){
          bootbox.alert("la répétition du nouveau mot de passe est incorrecte");
          $("#repeatpass").css({ "background-color": "#f0e68c"});
          return false;
          }

          $("#validedit").attr("disabled", "disabled").html("Enregistrement des données en cours... ");
          var $this = $(this);

          $.ajax({
                url: "<?php echo base_url();?>administration/infoperso/do_motpass",
                type: $this.attr('method'),
                data: $this.serialize(),
                dataType: 'json', // JSON
                success: function(json) {
                    if(json.reponse === '1') {
              // $("#lg-modal1").modal('hide');
              $("body, div").removeClass('modal-open modal-backdrop');
              $('html, body').css({overflow: 'auto', height: 'auto'});
              $("#getcontent").load("<?php echo base_url("administration/infoperso/get_infoperso")?>");
              $.growl.notice({ message: "Votre opération s'est bien effectuée!" });

            } else  if(json.reponse === '2') {
             bootbox.alert("La répétition du nouveau mot de passe est incorrecte!");
             $("#repeatpass").css({ "background-color": "#f0e68c"});
             $("#validedit").attr("disabled", false).html("Valider");
                  return false;
            } else  if(json.reponse === '3') {
              
             bootbox.alert("L'ancien mot de passe est incorrect");
             $("#oldpass").css({ "background-color": "#f0e68c"});
             $("#validedit").attr("disabled", false).html("Valider");
                  return false;

            } else {
              $.growl.error({ message: "Echec de l'opération, veuillez verifier et reprendre." });
                   $("#validedit").attr("disabled", false).html("Valider");
                  return false;
                      }
                    }
                });


          return false;
                }
              );

        });
        /////// 

		</script>
<!-- App js -->
        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>       


      