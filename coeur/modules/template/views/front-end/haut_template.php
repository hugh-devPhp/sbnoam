<!DOCTYPE html>
<html lang="zxx">

<head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="shyne, alliance, bague, collier, SBNoam, Noam, Boutique, E-commerce, Online Shopping, jewelry, bijouterie, bijoux" />
    <meta name="author" content="hugh_dev" />
    <link rel="shortcut icon" href="<?php echo base_url('assets/icon_shine.jpeg') ?>" type="image/png" />
    <!--====== Title ======-->
    <title> SBNoam </title>
    <?php $this->load->view('template/front-end/base_css') ?>

</head>

<body>
    <!--====== PRELOader ======-->
    <div class="preloader">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="45" height="45" x="0" y="0" viewBox="0 0 512 512" xml:space="preserve" class="">
            <path
                d="M369.853,250.251l-100-241C267.53,3.65,262.062,0,255.999,0s-11.531,3.65-13.854,9.251l-100,241    c-1.527,3.681-1.527,7.817,0,11.498l100,241c2.323,5.601,7.791,9.251,13.854,9.251s11.531-3.65,13.854-9.251l100-241    C371.381,258.068,371.381,253.932,369.853,250.251z M255.999,457.861L172.239,256l83.76-201.861L339.759,256L255.999,457.861z"
                fill="#613228" />
            <path class="diamond-spark spark-1"
                d="M139.606,118.393l-63-63c-5.858-5.857-15.356-5.857-21.213,0c-5.858,5.858-5.858,15.356,0,21.213l63,63    c2.928,2.929,6.767,4.394,10.606,4.394s7.678-1.465,10.607-4.394C145.465,133.748,145.465,124.25,139.606,118.393z" fill="#613228" />
            <path class="diamond-spark spark-2"
                d="M456.607,55.393c-5.858-5.857-15.356-5.857-21.213,0l-63,63c-5.858,5.858-5.858,15.356,0,21.213    c2.928,2.929,6.767,4.394,10.606,4.394s7.678-1.465,10.607-4.394l63-63C462.465,70.748,462.465,61.25,456.607,55.393z" fill="#613228" />
            <path class="diamond-spark spark-3"
                d="M139.606,372.393c-5.858-5.857-15.356-5.857-21.213,0l-63,63c-5.858,5.858-5.858,15.356,0,21.213    C58.322,459.535,62.16,461,65.999,461s7.678-1.465,10.607-4.394l63-63C145.465,387.748,145.465,378.25,139.606,372.393z" fill="#613228" />
            <path class="diamond-spark spark-4"
                d="M456.607,435.393l-63-63c-5.858-5.857-15.356-5.857-21.213,0c-5.858,5.858-5.858,15.356,0,21.213l63,63    c2.928,2.929,6.767,4.394,10.606,4.394s7.678-1.465,10.607-4.394C462.465,450.748,462.465,441.25,456.607,435.393z" fill="#613228" />
        </svg>
    </div>
    <!-- ========== HEADER ========== -->
    <header class="header-three header-absolute sticky-header sigma-header">
        <div class="u-header__section">
            <!-- Topbar -->
            <?php $this->load->view('template/front-end/topbar') ?>
            <!-- End Topbar -->

            <!-- Vertical-and-secondary-menu -->
            <?php $this->load->view('template/front-end/menubar', array("menu_actif" => $menu_actif)) ?>
            <!-- End Vertical-and-secondary-menu -->
        </div>
    </header>
    <!--====== HEADER PART END ======-->

    <!--====== OFF CANVAS START ======-->
    <div class="offcanvas-wrapper">
        <div class="offcanvas-overly"></div>
        <div class="offcanvas-widget">
            <a href="#" class="offcanvas-close"><i class="fal fa-times"></i></a>
            <!-- Search Widget -->
            <div class="widget search-widget">
                <h5 class="widget-title">Search list</h5>
                <form action="#">
                    <input type="text" placeholder="Search your keyword...">
                    <button type="submit"><i class="far fa-search"></i>
                    </button>
                </form>
            </div>
            <!-- About Widget -->
            <div class="widget about-widget">
                <h5 class="widget-title">About us</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia reiciendis illo ipsa asperiores, perspiciatis corrupti veritatis assumenda architecto commodi provident quas necessitatibus consequatur praesentium magnam optio deserunt fugiat repellat culpa.</p>
            </div>
            <!-- Nav Widget -->
            <div class="widget nav-widget">
                <h5 class="widget-title">Our pages</h5>
                <ul>
                    <li><a href="about.html">About Us</a>
                    </li>
                    <li><a href="classification.html">Classification</a>
                    </li>
                    <li>
                        <a href="shop-left.html">Shop</a>
                        <ul class="submenu">
                            <li><a href="shop-left.html">Shop Left Sidebar</a>
                            </li>
                            <li><a href="shop-left-style-2.html">Shop Left Sidebar v2</a>
                            </li>
                            <li><a href="shop-right.html">Shop Right Sidebar</a>
                            </li>
                            <li><a href="shop-right-style-2.html">Shop Right Sidebar v2</a>
                            </li>
                            <li><a href="shop-detail.html">Shop Detail</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blog-grid.html">Blog</a>
                        <ul class="submenu">
                            <li><a href="blog-grid-sidebar.html">Blog Grid Sidebar</a>
                            </li>
                            <li><a href="blog-details.html">Blog Details</a>
                            </li>
                            <li><a href="blog-grid.html">Blog Grid</a>
                            </li>
                            <li><a href="blog-list.html">Blog List</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="gallery.html">Our Gallery</a>
                    </li>
                    <li><a href="team.html">Team</a>
                    </li>
                    <li><a href="contact.html">Contact Us</a>
                    </li>
                </ul>
            </div>
            <!-- Social Link -->
            <div class="widget social-link">
                <h5 class="widget-title">Contact with us</h5>
                <ul>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fab fa-behance"></i></a>
                    </li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a>
                    </li>
                    <li><a href="#"><i class="fab fa-google"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--====== OFF CANVAS END ======-->