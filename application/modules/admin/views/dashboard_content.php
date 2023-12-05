<div class="content">
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Rapport General
                        </h2>
                        <a href="" class="ml-auto flex items-center text-primary">
                            <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i>
                            Reload Data
                        </a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="file-text" class="report-box__icon text-primary"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"><?php echo $demand; ?></div>
                                    <div class="text-base text-slate-500 mt-1">Demandes</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="check" class="report-box__icon text-pending"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"> <?php echo $demand_val; ?> </div>
                                    <div class="text-base text-slate-500 mt-1">Validées</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="x" class="report-box__icon text-warning"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"> <?php echo $demand_wait; ?> </div>
                                    <div class="text-base text-slate-500 mt-1">En attente</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="user" class="report-box__icon text-success"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"> <?php echo $user_nb; ?> </div>
                                    <div class="text-base text-slate-500 mt-1">Administrateurs</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->

                <!-- BEGIN: users table  -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Article les plus vues
                        </h2>
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">Images</th>
                                    <th class="whitespace-nowrap">Titres</th>
                                    <th class="text-center whitespace-nowrap">Catégories</th>
                                    <th class="text-center whitespace-nowrap">Auteurs</th>
                                    <th class="text-center whitespace-nowrap">Nombres de vues</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--                                {% for actu in articles %}-->
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="user_pp" class="rounded-full" src="">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">
                                            actu.title</a>
                                    </td>
                                    <td class="text-center">actu.categories </td>
                                    <td class="text-center"> actu.author </td>
                                    <td class="text-center text-success"> actu.views_number </td>
                                </tr>
                                <!--                                {% endfor %}-->
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END: users table  --> <!-- BEGIN: users table  -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Administrateurs
                        </h2>
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">Photos</th>
                                    <th class="whitespace-nowrap">Noms & prénoms</th>
                                    <th class="text-center whitespace-nowrap">Emails</th>
                                    <th class="text-center whitespace-nowrap">Genres</th>
                                    <th class="text-center whitespace-nowrap">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($users as $user) :
                                ?>
                                    <tr class="intro-x">
                                        <td class="w-40">
                                            <div class="flex">
                                                <div class="w-10 h-10 image-fit zoom-in">
                                                    <img alt="user_pp" class="rounded-full" src="<?php if ($user['picture']) {
                                                                                                        echo base_url(); ?>assets/admin/images/users/<?php echo $user['picture'];
                                                                                                                                                    } else {
                                                                                                                                                        echo base_url(); ?>assets/admin/images/users/user.png<?php } ?>">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="javascript:" class="font-medium whitespace-nowrap">
                                                <?php echo $user['username']; ?> </a>
                                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                                <?php echo $user['name']; ?>
                                            </div>
                                        </td>
                                        <td class="text-center"> <?php echo $user['email']; ?> </td>
                                        <td class="text-center"> <?php echo $user['gender']; ?> </td>
                                        <td class="w-40">
                                            <?php if ($user['status'] == 0) { ?>
                                                <div class="flex items-center justify-center text-danger">
                                                    <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Inactive
                                                </div>
                                            <?php } else { ?>
                                                <div class="flex items-center justify-center text-success">
                                                    <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Active
                                                </div>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php
                                    $i++;
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END: users table  -->
            </div>
        </div>
        <div class="col-span-12 2xl:col-span-3">
            <div class="2xl:border-l -mb-10 pb-10">
                <div class="2xl:pl-6 grid grid-cols-12 gap-x-6 2xl:gap-x-0 gap-y-6">
                    <!-- BEGIN: Galleries -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-12 mt-3 2xl:mt-8">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-auto">
                                Galleries
                            </h2>
                            <button data-carousel="important-notes" data-target="prev" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2">
                                <i data-lucide="chevron-left" class="w-4 h-4"></i></button>
                            <button data-carousel="important-notes" data-target="next" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2">
                                <i data-lucide="chevron-right" class="w-4 h-4"></i></button>
                        </div>
                        <div class="mt-5 intro-x">
                            <div class="box zoom-in">
                                <div class="tiny-slider" id="important-notes">
                                    <!--                                        {% for img in img_datas %}-->
                                    <div class="p-5">
                                        <img src="" class="img-fluid" alt="">
                                    </div>
                                    <!--                                        {% endfor %}-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Galleries -->

                    <!-- BEGIN: project -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-12 mt-3 2xl:mt-8">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-auto">
                                Projets
                            </h2>
                            <button data-carousel="important-notes" data-target="prev" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2">
                                <i data-lucide="chevron-left" class="w-4 h-4"></i></button>
                            <button data-carousel="important-notes" data-target="next" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2">
                                <i data-lucide="chevron-right" class="w-4 h-4"></i></button>
                        </div>
                        <div class="mt-5 intro-x">
                            <div class="box zoom-in">
                                <div class="tiny-slider" id="important-notes">
                                    <!--                                        {% for img in img_datas %}-->
                                    <div class="p-5">
                                        <img src="" class="img-fluid" alt="">
                                    </div>
                                    <!--                                        {% endfor %}-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: project -->
                    <!-- BEGIN: Calendar -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 xl:col-start-1 xl:row-start-2 2xl:col-start-auto 2xl:row-start-auto mt-3">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Calendrier
                            </h2>
                        </div>
                        <div class="mt-5">
                            <div class="intro-x box">
                                <div class="calendar dark">
                                    <!-- Calendar Header -->
                                    <div class="calendar-header">
                                        <span class="month-picker" id="month-picker">
                                            Février
                                        </span>
                                        <div class="year-picker">
                                            <span class="year-change mt-3" id="prev-year">
                                                <pre> < </pre>
                                            </span>
                                            <span id="year">2023</span>
                                            <span class="year-change mt-3" id="next-year">
                                                <pre> > </pre>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Calendar Body -->
                                    <div class="calendar-body">
                                        <div class="calendar-week-day">
                                            <div>Dim</div>
                                            <div>Lun</div>
                                            <div>Mar</div>
                                            <div>Mer</div>
                                            <div>Thu</div>
                                            <div>Fri</div>
                                            <div>Sat</div>
                                        </div>
                                        <div class="calendar-day">
                                            <div>
                                                1
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div>2</div>
                                            <div>3</div>
                                            <div>4</div>
                                            <div>5</div>
                                            <div>6</div>
                                            <div>7</div>
                                            <div>1</div>
                                            <div>2</div>
                                            <div>3</div>
                                            <div>4</div>
                                            <div>5</div>
                                            <div>6</div>
                                            <div>7</div>
                                        </div>
                                    </div>
                                    <!-- Calendar Footer -->
                                    <div class="calendar-footer">
                                        <div class="toggle">
                                            <span>Dark Mode</span>
                                            <div class="dark-mode-switch">
                                                <div class="dark-mode-switch-ident"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="month-list"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Calendar -->
                </div>
            </div>
        </div>
    </div>
</div>


<script src="<?php base_url() ?>assets/admin/mastercalendar/script.js"></script>