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
                                    <?php if(in_array('add_onglet', is_inarray())) { ?>
                                    <button type="button" class="btn btn-warning waves-effect waves-light" id="maj_methode"><i class="bx bx-reset font-size-16 align-middle me-2"></i>Actualisation des methodes</button>  
                                    <?php }  ?>
                                    <!-- sample modal content -->
                    
                                    </div>

                                   </div>
                                   <div class="col-12">
                                    <div class="col-3">
                                   <div class="mb-3">
                                            <div class="templating-select">
                                            <label class="form-label">Le Module</label>
                                <?php echo form_dropdown("lemodule", $option_module, $nom_module,"id='lemodule'  class='form-control' "); ?>
                                            </div>
                                    </div>
                                  </div>
                                  </div>
                                       <!--  <h4 class="card-title">Example</h4>
                                        <p class="card-title-desc">This is an experimental awesome solution for responsive tables with complex data.</p> -->
                        <?php  if($nom_module!=""){?>

                        <table id="datatable" class="table table-striped table-bordered dt-responsive  nowrap w-100">
                                                    <thead>
                                                    <tr>
                                                        <th width="5%">N&ordm;</th>
                                                        <th>Nom methode</th>
                                                        <th width="60%">Description</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                <?php  if($liste_methodes>0){
                                  $cpk=0;
                                foreach($liste_methodes as $row){ 
                                  $cpk++;
                                  ?>
                                    <tr>
                                        <td class="v-align-middle" ><?=$cpk;?></td>
                                        <td class="v-align-middle"><?=mb_strtolower($row->nom_action);?></td>
                                        <td class="v-align-middle"><?=mb_strtolower($row->description_action);?></td>
                                    </tr>
                                    <?php
                                              }

                                        }
                             ?>
                                                    </tbody>
                        </table>
                            <?php } else {
                                ?>

        
                        <table  class="table table-bordered table- dt-responsive  nowrap w-100">
                                                        <thead>
                                                        <tr>
                                                          <th width="20%">Module</th>
                                                          <th width="5%">N&ordm;</th>
                                                          <th>Nom methode</th>
                                                          <th width="40%">Description</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                          <?php
                              if($liste_module>0){ 
                                $cpt_mod=0;
                              foreach($liste_module as $row){  
                                
                                $cpk=0;
                                $designation_module=$row;
                               

                                if(isset($liste_methodes[$designation_module])){
                                  $cpt_mod++;
                                  if($cpt_mod%2 == 0) $bg="#ffffff";
                                 else $bg="#e5e9ec";
                                  $count_arr=count($liste_methodes[$designation_module]);

                                  foreach($liste_methodes[$designation_module] as $row){ 
                                  $cpk++;

                            ?>
            <tr >
            <?php if($cpk==1){?>
              <td class="v-align-middle" <?php if($count_arr>1){?> rowspan="<?php echo $count_arr;?>"<?php } ?> style="background-color: <?php echo $bg;?>;  vertical-align: middle; font-weight:bold;" ><?php echo mb_strtoupper($row->nom_module_action);?></td>
            <?php } ?>
            <td style="background-color: <?php echo $bg;?>;" class="v-align-middle"><?php echo $cpk;?></td>
            <td  style="background-color: <?php echo $bg;?>;" class="v-align-middle"><?php echo mb_strtolower($row->nom_action);?></td>
            <td  style="background-color: <?php echo $bg;?>;" class="v-align-middle"><?php echo mb_strtolower($row->description_action);?></td>
            </tr>
                

            <?php           }
                    }
                  }
                }
                            ?>
                                                    </tbody>
                                                </table>
                                           <?php }  ?>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
<script>
    $(document).ready(function(){

      //////
      $("#maj_methode").on('click',function() {
          bootbox.confirm("Souhaitez-vous lancer l'actualisation des methodes?",
                function(result) {
                if (result === true) {Actu_methode();} else {}
                });
            });

      //////////////////////
        $("#lemodule").on('change',function() { 
          var lemodule = $("#lemodule").val();
        $("#getcontent").load("<?php echo base_url("administration/configuration/get_methodes_module")?>/"+lemodule);
        });

    });

   /////////////
  function Actu_methode()
      {
          $.ajax({
             type: "POST",
             url: "<?php echo base_url("administration/configuration/do_actualiser_methode");?>",
             data: "actu=ok",
             success: function(msg){
                          if(msg==1)
                         {
              $("#getcontent").load("<?php echo base_url("administration/configuration/get_methodes_module")?>/<?php echo $nom_module;?>");
              $.growl.notice({ message: "Votre actualisation a été un succès!" });
                          }
                          else 
                          {
              $.growl.error({ message: "Echec de votre opération !" });
                          }

             }
          });

          return false;
      }
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

      