<div class="top-bar-boxed h-[70px] z-[51] relative border-b border-white/[0.08] mt-12 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
    <div class="h-full flex items-center">

        <a href="" class="-intro-x hidden md:flex">
            <img alt="sup'note logo" class="w-20" src="<?php echo base_url() ?>assets/sbnoam_logo.png">
        </a>

        <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
            <ol class="breadcrumb breadcrumb-light">
                <li class="breadcrumb-item"><a href="#">Application</a></li>
                <li class="breadcrumb-item active" aria-current="page" id="locate_link"></li>
            </ol>
        </nav>

        <!-- BEGIN: Notifications -->
        <div class="intro-x dropdown mr-4 sm:mr-6">
            <div class="dropdown-toggle notification {% if msg %}notification--bullet{% endif %} cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i>
            </div>
            <div class="notification-content pt-2 dropdown-menu">
                <div class="notification-content__box dropdown-content">
                    <div class="notification-content__title">Notifications</div>
                    <!--                    {% for sms in msg %}-->
                    <div class=" relative flex items-center mt-5">
                        <div class="ml-2 overflow-hidden">
                            <a href="">
                                <div class="flex items-center">
                                    <span class="font-medium text-danger truncate mr-5"></span>
                                    <div class="text-xs text-slate-400 ml-auto whitespace-nowrap"></div>
                                </div>
                                <div class="w-full truncate font-bold text-slate-500 mt-0.5">
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--                    {% endfor %}-->
                </div>
            </div>
        </div>
        <!-- END: Notifications -->

        <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                <?php if ($this->session->userdata('picture')) { ?>
                    <img src="<?php echo base_url(); ?>assets/admin/images/users/<?php echo $this->session->userdata('picture'); ?>" alt="User-Profile-Image">
                <?php } else { ?>
                    <img src="<?php echo base_url() ?>assets/admin/images/users/user.png" alt="User-Profile-Image">
                <?php } ?>
            </div>
            <div class="dropdown-menu w-56">
                <ul class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                    <li class="p-2">
                        <div class="font-medium"> <?php echo $this->session->userdata('name') ?> </div>
                        <div class="text-xs text-white/60 mt-0.5 dark:text-slate-500">Administrateur</div>
                    </li>
                    <li>
                        <hr class="dropdown-divider border-white/[0.08]">
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>mon_profil" class="dropdown-item hover:bg-white/5">
                            <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>add_user" class="dropdown-item hover:bg-white/5">
                            <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Ajout admin
                        </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item hover:bg-white/5">
                            <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Réinitialiser mot de passe
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider border-white/[0.08]">
                    </li>
                    <li>
                        <a href="javascript:" class="dropdown-item hover:bg-white/5" onclick="logout()">
                            <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>