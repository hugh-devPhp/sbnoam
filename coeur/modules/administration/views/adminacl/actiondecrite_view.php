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
                                    </div>

                                </div>
        
                                       <!--  <h4 class="card-title">Example</h4>
                                        <p class="card-title-desc">This is an experimental awesome solution for responsive tables with complex data.</p> -->
        
                        <table class="table table-striped table-bordered dt-responsive  nowrap w-100">

                             <thead>
                            <tr>
                                <th width="5%">N&ordm;</th>
                                <th>Nom action</th>
                                <th>Module</th>
                                <th>Description</th>
                                <?php if(in_array('edit_commentaire_action', is_inarray())) { ?>
                                <th width="10%"> Actions</th>
                                <?php }  ?>
                            </tr>
                            </thead>
                                                    
                                                    <tbody>
            <?php if($liste_desactions>0){ $cpk=0;
                foreach($liste_desactions as $row){
                    $cpk++;?>
                                    <tr>
                                        <td><?=$cpk;?></td>
                                        <td class="v-align-middle"><?=$row->nom_action;?></td>
                                        <td class="v-align-middle"><?=$row->nom_module_action;?></td>
                                        <td class="v-align-middle">
                                            <div class="mb-3">
                                                <input type="text"  name="cmt_<?=$cpk;?>" id="cmt_<?=$cpk;?>" class="form-control"  value="<?=$row->description_action;?>" />
                                            </div>
                                        </td>
                                        
                                        <?php if(in_array('edit_commentaire_action', is_inarray())) { ?>
                                        <td>
                                           <div >
            <a href="Javascript:void(0)"  class="green" data-name="<?php echo $row->id_liste_action;?>" data-num="<?=$cpk;?>">
                <button class="btn btn-primary waves-effect waves-light"><i class="bx bx-pencil font-size-16 align-middle "></i> valider</button>
            </a>
                                            </div>
                                        </td>
                                        <?php } ?>
                                    </tr>

            <?php           }
                    }
                            ?>
                                                    </tbody>
                                                </table>
                                           
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
<script>
    $(document).ready(function(){

        $(".green").on('click',function() { 
            var id = $(this).attr("data-name");
            var num = $(this).attr("data-num");
            var commentexte= $('#cmt_'+num).val();

      
      $.ajax({
             type: "POST",
             url: "<?php echo base_url("administration/adminacl/edit_commentaire_action") ;?>",
             data: "upcomment=ok&id_action="+id+"&comments="+commentexte,
             success: function(msg){
                          if(msg==1)
                          {
              $("#getcontent").load("<?php echo base_url("administration/adminacl/get_action") ?>");
              $.growl.notice({ message: "Votre commentaire a été validée!" });     
                
                          } else {
                $.growl.error({ message: "Echec de l'opération. Reprendre!" });
                return false;
              }
                         
             }
          });
          
          return false;
          
        });

     
 });



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

      