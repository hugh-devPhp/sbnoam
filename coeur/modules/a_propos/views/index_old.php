<?php $this->load->view('template/front-end/haut_template', array("menu_actif"=>$menu_actif))?>
<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <div class="bg-img-hero" style="background-image: url(<?php echo base_url()?>assets/front-end/image1.jpg);">
        <div class="container">
            <div class="flex-content-center max-width-620-lg flex-column mx-auto text-center min-height-564" >
                <h1 class="h1 font-weight-bold" style="color: white" >A propos de nous</h1>
                <p class="text-gray-39 font-size-18 text-lh-default" style="color: white !important;">Passion may be a friendly or eager interest in or admiration for a proposal, cause, discovery, or activity or love to a feeling of unusual excitement.</p>
            </div>
        </div>
    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->


<?php $this->load->view('template/front-end/bas_template')?>