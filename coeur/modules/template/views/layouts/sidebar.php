
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li class="<?php if($activebloc=="accueil") echo "mm-active";?>">
                    <a href="<?php echo base_url();?>administration" class="waves-effect <?php if($activebloc=="accueil") echo "mm-active";?>">
                        <i class="bx bx-home"></i>
                        <span key="t-accueil">Panneaux d'accueil</span>
                    </a>
                </li>
                <?php
                if($listeblocmenu>0){
                    foreach ($listeblocmenu as $rowas){
                        $ids=$rowas->id_blocmenu;
                        if(isset($blocmenu_profil[$ids]) && !empty($blocmenu_profil[$ids])){ ?>
                            <li class="<?php if($activebloc==$rowas->nom_blocmenu) echo "mm-active";?>">
                                <a href="javascript: void(0);" class="waves-effect <?php if($activebloc==$rowas->nom_blocmenu) echo "mm-active";?>">
                                    <i class="bx bx-<?php echo $rowas->icone_blocmenu;?>"></i>
                                    <span key="t-<?php echo mb_strtolower($rowas->nom_blocmenu);?>"><?php echo ucfirst($rowas->nom_blocmenu);?></span>
                                </a>
                                <?php
                                if(isset($element_blocmenu[$ids]) && !empty($element_blocmenu[$ids])){?>
                                    <ul class="sub-menu" aria-expanded="<?php if(mb_strtolower($activebloc)==mb_strtolower($rowas->nom_blocmenu)) echo "true"; else echo "false"; ?>">
                                        <?php  foreach ($element_blocmenu[$ids] as $ligos){ ?>
                                            <?php if(in_array($ligos->modulenom_element,$blocmenu_profil[$ids])){ ?>
                                                <li class="<?php if($activemenu==$ligos->modulenom_element) echo "mm-active";?>">
                                                    <a class="<?php if($activemenu==$ligos->modulenom_element) echo "active";?>" href="<?php echo base_url()."administration/".$ligos->modulenom_element; ?>" key="t-<?php echo mb_strtolower($ligos->nom_element); ?>"><?php echo ucfirst($ligos->nom_element); ?> </a></li>

                                                <?php
                                            }
                                        }?>
                                    </ul>
                                <?php  }?>
                            </li>
                            <?php
                        }
                    }
                }

                ?>
                <li>
                    <a href="<?php echo base_url();?>" class="waves-effect">
                        <i class="bx bx-world"></i>
                        <span key="t-site">Aller au site</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>administration/logout" class="waves-effect">
                        <i class="bx bx-power-off"></i>
                        <span key="t-deconnexion">Deconnexion</span>
                    </a>
                </li>

            </ul>
            <!-- <a href="#" class="scrollup">Scroll</a>
            <div class="clearfix"></div> -->
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->