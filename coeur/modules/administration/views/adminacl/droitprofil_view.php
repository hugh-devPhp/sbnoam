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

                                    <div class="page-title-right">&nbsp;
                                      <?php if(in_array('add_dupliquerdroit', is_inarray())) { ?>
                                      <a href="Javascript:void(0);" id="duplic_profil">
                                      <button type="button" class="btn btn-primary waves-effect waves-light"><i class="bx bx-copy font-size-16 align-middle me-2"></i>Dupliquer un profil</button></a>
                                     <?php } ?>
                                    </div>
                                </div>
<div class="col-12">
  <div class="col-6">
  <fieldset style="padding:5px; border:1px dashed #CCCCCC;;width:99%"><legend style="font-size:14px">&nbsp;</legend>

                                    <form   id="formadd" name="formadd" id="formadd" class="custom-validation">
                                      <div class="row">
                                            <div class="form-group col-sm-5">
                                              <div class="mb-3">
                                            <div class="templating-select">
                                            <label class="form-label">Profil</label>
                                            <div class="controls">
                                            <?php echo form_dropdown("select-profil",$levelprofil,"","id='select-profil' style='width:99%;' required"); ?>
                                          </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-5">
                                              <div class="mb-3">
                                            <div class="templating-select">
                                            <label class="form-label">Module</label>
                                            <div class="controls">
                                            <?php echo form_dropdown("select-module",$select_modules,"","id='select-module' style='width:99%;' required"); ?>
                                          </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label class="form-label">&nbsp;</label>
                                                <div class="controls">
                                                    <div><span>
              <a href="Javascript:void(0);" id="add_valid"  style="margin-left: 8px" ><button type="submit" class="btn btn-primary "><span >valider</span></button></a>

                                            </span></div>
                                                </div>
                                            </div>

                                        </div>




                                    </form>

                                </fieldset>
                                
                        </div>
                        <div class="col-6"></div>
                        <div class="clearfix"></div>
                        <br>
                        <div id="list_content" >

                            </div>
                        </div>


        
                                       <!--  <h4 class="card-title">Example</h4>
                                        <p class="card-title-desc">This is an experimental awesome solution for responsive tables with complex data.</p> -->
        
                      
                                           
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
<script>
    $(document).ready(function(){

      $("#duplic_profil").on("click", 
         function()
          {
        $("#getcontent").load("<?php echo base_url();?>administration/adminacl/add_dupliquerdroit"); 
      
          }
        );

    $("#list_content").on("click", ".checkAllNiveau", function(){

      var elt = $(this).attr("data-check");
      if(this.checked){// ckeck select status
          $('.'+elt).each(function(){//loop through each checkbox
              this.checked = true;// select all checkboxes with class "checkbox1"

          });
      }else{
          $('.'+elt).each(function(){//loop through each checkbox
              this.checked = false;// deselect all checkboxes with class "checkbox1"

          });
      }



  });
    ////
    $("#list_content").on("click", ".checkbox-elt", function(){

      var elt = $(this).attr("data-parent");

      if(!this.checked){// ckeck select status
          $('.'+elt).prop("checked", 0);
      }


  });
    /////
     $("#list_content").on("click", ".checkbox-noactiv", function(){

      var deep=0;
                $('.checkbox-noactiv').each(function(){//loop through each checkbox
                    if(this.checked==false) deep++;
                });
                //alert(deep);
                if(deep>0) $("#checkAlldesactive").prop("checked", false);
                else $("#checkAlldesactive").prop("checked", true);
     });
     /////////////
     $("#list_content").on("click", ".checkbox-activ", function(){

      var deep=0;
                $('.checkbox-activ').each(function(){//loop through each checkbox
                    if(this.checked==false) deep++;
                });
                //alert(deep);
                if(deep>0) $("#checkAllactive").prop("checked", false);
                else $("#checkAllactive").prop("checked", true);
     });
     ///////////////
    $("#list_content").on("click", "#desactive-action", function(){

      if ($(".checkbox1:checked").length > 0)
      {

          swal({
                  title: "Souhaitez-vous desactiver ces actions ?",
//                text: "Vous ne pourrez pas revenir en arrière !",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "oui",
                  cancelButtonText: "non",
                  closeOnConfirm: false
              },
              function () {

                  var id = $(".checkbox1:checked").map(function(){
                      return $(this).attr("data-id");
                  }).get();

                  var list_module = $(".checkbox1:checked").map(function(){
                      return $(this).attr("data-module");
                  }).get();

                  var lemodule= $("#module").val();
                  var leprofil= $("#profil").val();


                  $.ajax({
                      type: "POST",
                      url: "<?php echo base_url("administration/adminacl/desactive_action");?>",
                      data:{id:id,module:lemodule,profil:leprofil,list_module:list_module},
                      dataType: 'html',
                      success: function(result){

                          swal({
                              title: "Succès!",
                              text: "Votre opération s'est bien effectuée!",
                              type: "success"
                          }, function () {

                              $("#list_content").html(result);
//                                        console.log(json);
                          });

                      }
                  });

              });







      }
      else
      {
          $.growl.error({ message: "cochez au moins une action !" });
      }

  });

    $("#list_content").on("click", "#active-action", function(){
      if ($(".checkbox2:checked").length > 0)
      {
          swal({
                  title: "Souhaitez-vous activer ces actions ?",
//                text: "Vous ne pourrez pas revenir en arrière !",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "oui",
                  cancelButtonText: "non",
                  closeOnConfirm: false
              },
              function () {

                  var id = $(".checkbox2:checked").map(function(){
                      return $(this).attr("data-id");
                  }).get();

                  var list_module = $(".checkbox2:checked").map(function(){
                      return $(this).attr("data-module");
                  }).get();


                  var lemodule= $("#module").val();
                  var profil= $("#profil").val();


                  $.ajax({
                      type: "POST",
                      url: "<?php echo base_url("administration/adminacl/active_action");?>",
                      data:{id:id,module:lemodule,profil:profil,list_module:list_module},
                      dataType: 'html',
                      success: function(result){

                          swal({
                              title: "Succès!",
                              text: "Votre opération s'est bien effectuée!",
                              type: "success"
                          }, function () {

                              $("#list_content").html(result);
//                                        console.log(json);
                          });

                      }
                  });

              });






      }
      else
      {
          $.growl.error({ message: "cochez au moins une action !" });
      }

  });



      $("form#formadd").on(
          "submit",
          function()
          {

              var $this = $(this);
              $.ajax({
                  url: "<?php echo base_url();?>administration/adminacl/do_module_action",
                  type: "POST",
                  data: $this.serialize(),
                  success: function(result) {

                      $("#list_content").html(result);

                  }
              });


              return false;
          });
    
  });

     ////////
    



        </script>

        <!-- Required datatable js -->
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/jszip/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="<?php echo base_url(); ?>assets/js/pages/datatables.init.js"></script>    