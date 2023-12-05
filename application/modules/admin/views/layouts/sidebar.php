<nav class="side-nav">
    <ul>
        <li>
            <a href="<?php echo base_url() ?>dashboard" class="side-menu side-menu--active">
                <div class="side-menu__icon"><i data-lucide="home"></i></div>
                <div class="side-menu__title">
                    Tableau de bord
                </div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="javascript:" class="side-menu" id="actu_menu">
                <div class="side-menu__icon"><i data-lucide="shopping-bag"></i></div>
                <div class="side-menu__title">
                    Actualités
                    <div class="side-menu__sub-icon "><i data-lucide="chevron-down"></i></div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="" class="side-menu" id="cat_menu">
                        <div class="side-menu__icon"><i data-lucide="activity"></i></div>
                        <div class="side-menu__title"> Categories</div>
                    </a>
                </li>
                <li>
                    <a href="" class="side-menu" id="add_actu_menu">
                        <div class="side-menu__icon"><i data-lucide="activity"></i></div>
                        <div class="side-menu__title"> Ajouter</div>
                    </a>
                </li>
                <li>
                    <a href="" class="side-menu" id="liste_actu_menu">
                        <div class="side-menu__icon"><i data-lucide="activity"></i></div>
                        <div class="side-menu__title"> Liste</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="javascript:" class="side-menu" id="user_side_menu">
                <div class="side-menu__icon"><i data-lucide="users"></i></div>
                <div class="side-menu__title">
                    Utilisateurs
                    <div class="side-menu__sub-icon "><i data-lucide="chevron-down"></i></div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="<?php echo base_url() ?>mon_profil" class="side-menu" id="profil_side_menu">
                        <div class="side-menu__icon"><i data-lucide="activity"></i></div>
                        <div class="side-menu__title"> Mon profil</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>user_list" class="side-menu" id="user_list_side_menu">
                        <div class="side-menu__icon"><i data-lucide="activity"></i></div>
                        <div class="side-menu__title"> Liste utilisateur</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>add_user" class="side-menu" id="add_admin_side_menu">
                        <div class="side-menu__icon"><i data-lucide="activity"></i></div>
                        <div class="side-menu__title"> Ajouter</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="javascript:" class="side-menu" id="pages_menu">
                <div class="side-menu__icon"><i data-lucide="layout"></i></div>
                <div class="side-menu__title">
                    Demandes
                    <div class="side-menu__sub-icon "><i data-lucide="chevron-down"></i></div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="<?php echo base_url() ?>demandes" class="side-menu" id="slide_menu">
                        <div class="side-menu__icon"><i data-lucide="inbox"></i></div>
                        <div class="side-menu__title"> Toutes les demandes</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>demandes_val" class="side-menu" id="about_menu">
                        <div class="side-menu__icon"><i data-lucide="hard-drive"></i></div>
                        <div class="side-menu__title"> Demandes Validées</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>demandes_en_attente" class="side-menu" id="module_menu">
                        <div class="side-menu__icon"><i data-lucide="credit-card"></i></div>
                        <div class="side-menu__title"> Demandes en attentes</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="javascript:" class="side-menu" id="award_menu">
                <div class="side-menu__icon"><i data-lucide="layout"></i></div>
                <div class="side-menu__title">
                    Award
                    <div class="side-menu__sub-icon "><i data-lucide="chevron-down"></i></div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="<?php echo base_url() ?>award_categories" class="side-menu" id="cat_menu">
                        <div class="side-menu__icon"><i data-lucide="inbox"></i></div>
                        <div class="side-menu__title"> Catégories</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>add_laureat" class="side-menu" id="add_award_menu">
                        <div class="side-menu__icon"><i data-lucide="hard-drive"></i></div>
                        <div class="side-menu__title">Ajout Lauréats</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>award_laureats" class="side-menu" id="list_award_menu">
                        <div class="side-menu__icon"><i data-lucide="credit-card"></i></div>
                        <div class="side-menu__title"> Liste Lauréats</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>