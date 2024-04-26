<?php $this->load->view('template/front-end/haut_template', array("menu_actif"=>$menu_actif))?>

    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <?php
    if(isset($page_content)){
        $this->load->view("$page_content");
    }
    ?>

<?php $this->load->view('template/front-end/bas_template')?>
<script>
    $(document).ready( function (){

    })
    function search(){

        var types = $('input[name="type[]"]:checked').map(function(){
            return $(this).val(); // Récupérer la valeur de chaque case cochée
        }).get().join(',');

        var marques = $('input[name="marque[]"]:checked').map(function(){
            return $(this).val(); // Récupérer la valeur de chaque case cochée
        }).get().join(',');

        var transmissions = $('input[name="transmission[]"]:checked').map(function(){
            return $(this).val(); // Récupérer la valeur de chaque case cochée
        }).get().join(',');

        var queryString = jQuery.param({ type: types, marque: marques, transmission: transmissions });
        $('#form_search').attr("action","<?php echo base_url()?>parking/index?"+queryString);
        window.location.href = "<?php echo base_url()?>parking/index?"+queryString;

    }
</script>

