<!doctype html>
<html lang="en">

<head>
    <?php $this->load->view("template/layouts/meta.php"); ?>
    <?php $this->load->view("template/layouts/head-css.php"); ?>
    <style>
        .color-r {
            color: #f69900;
        }
    </style>
</head>

<body data-sidebar="dark">
    <div id="preloader">
            <div id="status">
                <div class="spinner-chase">
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                </div>
            </div>
        </div>
<div id="layout-wrapper">

    <?php $this->load->view("template/layouts/navbar-header.php"); ?>
    <?php $this->load->view("template/layouts/sidebar.php"); ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
         <div class="page-content">
            <div class="container-fluid">

                <?php //$this->load->view("template/layouts/breadcrumb.php"); ?>

    <!-- INTERIEUR CONTENT --> 
    <input type="hidden" name="cptmodule" id="cptmodule" value="<?php echo $cptmodule; ?>">
    <input type="hidden" name="leckp" id="leckp" value="<?php echo $leckp; ?>">    
     <div id="container">
      <div class="row">   
      <div class="col-xl-12">
            <ul class="nav nav-tabs" role="tablist" id="listeonglet">
                <?php for($b=1; $b<=count($libelle_url); $b++) {?> 
                <input type="hidden" name="libel_<?php echo $b; ?>" id="libel_<?php echo $b; ?>" value="<?php echo $libelle_url[$b];?>">
    <li class="d-print-none nav-item <?php if($b==1) echo 'active';?>" id="adtab<?php echo $b; ?>">
        <a class="nav-link tab <?php if($b==1) echo 'active';?>" data-name="<?php echo $b; ?>" data-bs-toggle="tab" href="Javascript:void(0);" role="tab">
        <span class="d-block d-sm-none"></span><span class="d-none d-sm-block"><?php echo ucfirst($nom_url[$b]);?></span>    
        </a>
    </li>
            <?php
              }
            
          ?>
            </ul>
       <!-- Nav tabs -->
                                       
      <!-- <p></p> -->
      <div class="row" id="getcontent">
        <!--                //mettre le contenu ici-->
    
      </div>
      </div>
    </div>
     </div>
  <!-- END INTERIEUR CONTENT -->  
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <?php $this->load->view("template/layouts/footer.php"); ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->



<!-- Right bar overlay-->

<?php $this->load->view("template/layouts/vendor-scripts.php"); ?>

</body>

</html>