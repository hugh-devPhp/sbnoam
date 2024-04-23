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
                                    <input type="hidden" id="id_onglet" name="id_onglet" value="<?php echo $id_onglet;?>">
                                    <div class="page-title-right">
                                    <button type="button" class="btn btn-danger waves-effect waves-light" id="backto"><i class="bx bx-undo font-size-16 align-middle me-2"></i>Retour</button>  
                                    <!-- sample modal content -->
                    
                

                    


                                    </div>

                                </div>

                        <table class="table table-striped table-bordered dt-responsive  nowrap w-100">
                                                    <thead>
                                                    <tr>
                                                        <th width="5%">N&ordm;</th>
                                                        <th>Profil concerne</th>
                                                        <th>Libelle onglet</th>
                                                        <th>Nom module</th>
                                                        <th>Ordre</th>
                                                        <?php if(in_array('delete_onglet_parprofil', is_inarray())) { ?>
                                                        <th width="10%">Actions</th>
                                                        <th width="5%">
                        <div class="checkbox check-danger">
                            <input type="checkbox" name="checkAllProfil" id="checkAllProfil"><label for="checkAllProfil"></label>
                        </div>
                                                        </th>
                                                        <th width="5%">
                        <div><button id="leformok" type="button" class="btn btn-warning"><span
                                                class="bold">OK</span></button></div>
                                                        </th>
                                                        <?php }  ?>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
            <?php if($liste_affecte>0){ $cpk=0;
                foreach($liste_affecte as $row){
                    $cpk++;?>
                                    <tr>
                                        <td><?=$cpk;?></td>
                                        <td style="text-transform: uppercase;"><?=$row->code_profils;?></td>
                                       
                                        <td><?=$row->designation_onglet;?></td>
                                        <td><?=$row->nom_module_onglet;?></td>
                                        <td><?=$row->numero_ordre;?></td>
                                        <?php if(in_array('delete_onglet_parprofil', is_inarray())) { ?>
                                        <td>
                                           <div>
           <a href="Javascript:void(0)"  class="red"  data-name="<?php echo $row->id_liste_onglet ;?>"><button class="btn btn-danger waves-effect waves-light"><i class="bx bx-trash font-size-16 align-middle"></i></button></a>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="checkbox check-success mb-3">
                                                <input type="checkbox" class="checkbox2" id="checkbox_<?php echo $cpk;?>" value="<?php echo $row->id_liste_onglet ;?>" name="checkboxlist[]">
                                                <label for="checkbox_<?php echo $cpk;?>"></label>
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

     

         $(".red").on('click',function() { 
          var id = $(this).attr("data-name");

           bootbox.confirm("<span style='color:red;'>Attention!! Attention!!<br></span> Souhaitez-vous réellement supprimer cet enrégistrement?",
                function(result) {
                if (result === true) {DeleteForm(id);} else {}
                });
         });

         $("#backto").on('click',function() { 
                $("#getcontent").load("<?php echo base_url('administration/adminacl/get_droitonglet') ;?>");
        });

          $('#checkAllProfil').click(function(event){
                if(this.checked){// ckeck select status
                    $('.checkbox2').each(function(){//loop through each checkbox
                        this.checked = true;// select all checkboxes with class "checkbox2"
                    });
                }else{
                    $('.checkbox2').each(function(){//loop through each checkbox
                        this.checked = false;// deselect all checkboxes with class "checkbox2"
                    });
                }
            });

            $('.checkbox2').click(function(event){
                var deep=0;
                $('.checkbox2').each(function(){//loop through each checkbox
                    if(this.checked==false) deep++;
                });
                //alert(deep);
                if(deep>0) $("#checkAllProfil").prop("checked", false);
                else $("#checkAllProfil").prop("checked", true);
            });
 

 $("#leformok").on('click', function () {
                var cpt=0;
                $('.checkbox2').each(function(){//loop through each checkbox
                    if(this.checked== true) cpt++;
                });
                if(cpt<1){
                    bootbox.alert("le choix minimum d'un profil est obligatoire pour la suppression");
                    return false;
                }
                bootbox.confirm("Attention! Attention! Souhaitez-vous réellement supprimer laffectation de l'onglet pour tous les profils selectionnés?",
                    function (result) {
                        if (result === true) {
                            DeleteLot_ongletaffecte();
                        } else {
                        }
                    });
            });


        

        });

    function DeleteForm(id){
        
        var id_onglet=$("#id_onglet").val();
        $.ajax({
           type: "POST",
           url: "<?php echo base_url("administration/adminacl/delete_onglet_parprofil");?>",
           data: "delok=ok&id="+id,
           success: function(msg){
              if(msg==1){
        $("#getcontent").load("<?php echo base_url("administration/adminacl/detail_droitonglet")?>/"+id_onglet);
        $.growl.notice({ message: "Votre suppression effectuée avec succès !" });
              } else {
                $.growl.error({ message: "Echec de l'opération. Reprendre!" });
                return false;
              }
           }
        });

        return false;
      } 

       function DeleteLot_ongletaffecte()
    {
        var id_onglet=$("#id_onglet").val();

        var myIdProfil=[];
        hnit=0;
        $('.checkbox2').each(function(){//loop through each checkbox
            if(this.checked==true) {
                lavaleur=this.value.trim();
                myIdProfil[hnit]=[lavaleur];
                hnit++;
            }
        });

        $.ajax({
            type: "POST",
            url: "<?php echo base_url("administration/adminacl/deletelot_ongletaffecte") ;?>",
            data: "delot=ok&lot_profil="+myIdProfil,
            success: function(msg){
                if(msg==1)
                {
                    $("#getcontent").load("<?php echo base_url("administration/adminacl/detail_droitonglet") ?>/"+id_onglet);
                    $.growl.notice({ message: "Votre suppression a été validée!" });

                }
                else {
                    $.growl.error({ message: "Echec de votre suppression !" });

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

      