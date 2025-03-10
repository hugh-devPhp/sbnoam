<!--======  START Hotel Intro ======-->
<section class="items-overlay-sec pt-115 pb-155">
    <div class="container-fluid">
        <div class="section-title text-center mb-50">
            <div class="section-title-icon">
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
            <span class="title-tag"> Profitez de nos offres  </span>
            <h2>Nos Collections</h2>
        </div>
    </div>
</section>
<!--======  END Hotel Intro ======-->
 <!--====== Category START ======-->
<div class="category-box-sec pb-155 bg-black">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <?php
            $i = 1;
            foreach ($collections as $collection) :
            ?>
            <div class="col-lg-6 mb-3">
                <div class="category-box-wrap">
                    <div class="" style="object-fit: cover;">
                        <img src="<?php echo base_url()?>uploads/collections/<?php echo $collection['image_princ']; ?>"
                             width="340" height="260" alt="img">
                    </div>
                    <div class="category-box-content">
                        <div class="content text-center">
                            <h3 class="title"><a href="shop-left.html"><?php echo $collection['name']; ?></a></h3>
                            <a href="shop-left.html" class="main-btn btn-filled">Voir details</a>
                        </div>
                    </div>
                </div>
            </div>
                <?php
                $i++;
            endforeach;
            ?>
        </div>
    </div>
</div>
<!--====== Category EN ======-->