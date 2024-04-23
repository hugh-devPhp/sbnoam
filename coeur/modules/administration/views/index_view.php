
<?php
//print_r($this->session->all_userdata());
$id_user=(String)$this->session->userdata('id_utilisateur');
$sexe = $this->session->userdata('user_sexe');
$pseudo= $this->session->userdata('user_login');
$id_profil= $this->session->userdata('user_idprofil');
$info_profil = infos_profil($id_profil);

?>
<!doctype html>
<html lang="en">

<head>
    <?php $this->load->view("template/layouts/meta.php"); ?>
    <?php $this->load->view("template/layouts/head-css.php"); ?>
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

                                <input type="hidden" name="libel_1" id="libel_1" value="1">
                                <li class="nav-item active" id="adtab1">
                                    <a class="nav-link tab active" data-name="1" data-bs-toggle="tab" href="Javascript:void(0);" role="tab">
                                        <span class="d-block d-sm-none"></span><span class="d-none d-sm-block">Accueil</span>
                                    </a>
                                </li>
                            </ul>

                            <div id="getcontent">
                                <!--                //mettre le contenu ici-->
                                <!-- start page title -->
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                                            <div class="page-title-right">
                                                <ol class="breadcrumb m-0">
                                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                                    <li class="breadcrumb-item active">Dashboard</li>
                                                </ol>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- end page title -->

                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="card overflow-hidden">
                                            <div class="bg-primary bg-soft">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <div class="text-primary p-3">
                                                            <h5 class="text-primary">Bienvenue!</h5>
                                                            <p>Ivoire Lagune Services</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-5 align-self-end">
                                                        <img src="<?php echo base_url()?>assets/front-end/images/profile-img.png" alt="" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="avatar-md profile-user-wid mb-4">
                                                            <img class="img-thumbnail rounded-circler" src="<?php echo base_url(); ?>assets/admin/images/users/avatar.png" />
                                                        </div>

                                                    </div>

                                                    <div class="col-sm-8">
                                                        <div class="pt-4">

                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <h5 class="font-size-15 text-truncate"><?php   echo $pseudo;?></h5>
                                                                    <p class="text-muted mb-0 text-truncate"><?php echo strtoupper($info_profil['code_profils']);?></p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-4">
                                                                <a href="<?php echo base_url() ?>administration/infoperso" class="btn btn-primary waves-effect waves-light btn-sm">Voir profil<i class="mdi mdi-arrow-right ms-1"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-8">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="card mini-stats-wid">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1">
                                                                <p class="text-muted fw-medium">Visiteurs/jour</p>

                                                                <h4 class="mb-0"><?php echo $visite_jour; ?></h4>
                                                            </div>

                                                            <div class="flex-shrink-0 align-self-center">
                                                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="fa fa-eye font-size-24"></i>
                                                            </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card mini-stats-wid">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1">
                                                                <p class="text-muted fw-medium">Visiteurs/mois</p>

                                                                <h4 class="mb-0"><?php echo $visite_mois; ?></h4>
                                                            </div>

                                                            <div class="flex-shrink-0 align-self-center ">
                                                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="fa fa-eye font-size-24"></i>
                                                            </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card mini-stats-wid">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1">
                                                                <p class="text-muted fw-medium">Visiteurs/an</p>

                                                                <h4 class="mb-0"><?php echo $visite_annee; ?></h4>
                                                            </div>

                                                            <div class="flex-shrink-0 align-self-center">
                                                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="fa fa-eye font-size-24"></i>
                                                            </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="card mini-stats-wid">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1">
                                                                <p class="text-muted fw-medium">Reservation</p>
                                                                <h4 class="mb-0"><?php echo $nb_reservation; ?></h4>

                                                            </div>

                                                            <div class="flex-shrink-0 align-self-center">
                                                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card mini-stats-wid">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1">
                                                                <p class="text-muted fw-medium">Commandes</p>
                                                                <h4 class="mb-0"><?php echo $nb_commande; ?></h4>

                                                            </div>

                                                            <div class="flex-shrink-0 align-self-center ">
                                                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-archive-in font-size-24"></i>
                                                            </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card mini-stats-wid">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1">
                                                                <p class="text-muted fw-medium">Message non lu</p>
                                                                <h4 class="mb-0"><?php echo $message_nonlu; ?></h4>
                                                            </div>

                                                            <div class="flex-shrink-0 align-self-center">
                                                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                            </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title mb-4">Les 10 dernières commandes</h4>
                                                <div class="table-responsive">
                                                    <table class="table align-middle table-nowrap mb-0">
                                                        <thead class="table-light">
                                                        <tr>
                                                            <th class="align-middle" width="5%">#</th>
                                                            <th class="align-middle">Nom & prénoms</th>
                                                            <th class="align-middle">N° commande</th>
                                                            <th class="align-middle">Contact</th>
                                                            <th class="align-middle">Montant</th>
                                                            <th class="align-middle">Mode livraison</th>
                                                            <th class="align-middle">Initié le</th>
                                                            <th class="align-middle">Statut</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $i = 1;

                                                        foreach ($commandes as $commande) :
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td valign="middle"><?php echo $commande['nom_recepteur']; ?></td>
                                                                <td valign="middle"><?php echo $commande['numero_commande']; ?></td>
                                                                <td valign="middle"><?php echo $commande['contact_recepteur']; ?></td>
                                                                <td valign="middle"><?php echo number_format($commande['montant_commande'], 0, ',', ' '); ?>
                                                                    FCFA
                                                                </td>
                                                                <td valign="middle"><?php echo $commande['description_livraison']; ?></td>
                                                                <td valign="middle"><?php echo $commande['date_commande']; ?></td>
                                                                <td valign="middle">
                                                                    <?php
                                                                    if ($commande['statut_comande'] == 'annuler'):
                                                                        ?>
                                                                        <span class="badge-soft-danger"><?php echo $commande['statut_comande'] ?></span>
                                                                    <?php
                                                                    endif;
                                                                    ?>
                                                                    <?php
                                                                    if ($commande['statut_comande'] == 'en cours'):
                                                                        ?>
                                                                        <span class="badge-soft-primary"><?php echo $commande['statut_comande'] ?></span>
                                                                    <?php
                                                                    endif;
                                                                    if ($commande['statut_comande'] == 'en attente'):
                                                                        ?>
                                                                        <span class="badge-soft-warning"><?php echo $commande['statut_comande'] ?></span>
                                                                    <?php
                                                                    endif;
                                                                    ?>
                                                                    <?php
                                                                    if ($commande['statut_comande'] == 'livrer'):
                                                                        ?>
                                                                        <span class="badge-soft-info"><?php echo $commande['statut_comande'] ?></span>
                                                                    <?php
                                                                    endif;
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            $i++;
                                                        endforeach;
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- end table-responsive -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

<?php $this->load->view("template/layouts/vendor-scripts-accueil.php"); ?>

</body>

</html>