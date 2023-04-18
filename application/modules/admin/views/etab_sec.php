<!DOCTYPE html>
<html lang="fr">
<?php
$this->load->view('index/css');
?>

<body>
<div style="background-image: url(<?php echo base_url() ?>assets/images/bg-ecolemedia.jpg);  background-position: center;  background-repeat: no-repeat; background-size: cover;">
	<?php
		$this->load->view('index_element/index_header');
	?>

	<div class="page-header theme-bg-dark py-5 text-center position-relative">
		<div class="theme-bg-shapes-right"></div>
		<div class="theme-bg-shapes-left"></div>
		<div class="container">
			<h1 class="page-heading single-col-max mx-auto">Documentations établissements secondaires</h1>
			<div class="page-intro single-col-max mx-auto">
				Le Guide d'utilisation de La plateforme intégrée de gestion des
				<br><span style="color: #000000; font-size: 24px">établissements secondaires</span> de Côte d'Ivoire.
			</div>
			<div class="main-search-box pt-3 d-block mx-auto">
				<form class="search-form w-100">
					<input type="search" value="" placeholder="Faire une recherche..."
						   name="search" id="search" class="form-control">
					<button type="submit" class="btn search-btn" value="Search" onclick="mysearch()">
						<i class="fas fa-search"></i></button>
				</form>
			</div>
		</div>
	</div>

	<?php
		$this->load->view('secondaire/etab_sec_content');
	?>

    <section class="cta-section text-center py-5 theme-bg-dark position-relative opac-90">
        <div class="theme-bg-shapes-right"></div>
        <div class="theme-bg-shapes-left"></div>
        <div class="container">
            <h3 class="mb-2 text-white mb-3">Pour les informations complémentaires et en cas de difficultés.</h3>
            <div class="section-intro text-white mb-3 single-col-max mx-auto">
                Vous pouvez nous envoyer un email sur
                <a class="text-white" href="mailto:ecolemediaci@gmail.com">
                    ecolemediaci@gmail.com
                </a> Ou nous contacter aux numéros suivants : 01 42 42 77 88 - 07 09 99 55 09 - 05 05 50 05 11
            </div>
            <div class="pt-3 text-center">
                <a class="btn btn-light" target="_blank" href="https://www.ecolemedia.net/">
                    Visitez le site <i class="fas fa-arrow-alt-circle-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>


	<?php
	$this->load->view('index_element/index_footer');
	?>

</div>
<?php
$this->load->view('js');
?>

<script>
	function mysearch(){
		var element = document.getElementById("search").value;
		var a = element.toLowerCase()
		if (a.includes('souscription')){
			window.open("<?php echo base_url() ?>secondaire/documentation/#subscribe")
		}
		if (a.includes('paiement')){
			window.open("<?php echo base_url() ?>secondaire/documentation/#sub-3")
		}
		if (a.includes('connexion')){
			window.open("<?php echo base_url() ?>secondaire/documentation/#connexion")
		}
		if (a.includes('mot de passe')){
			window.open("<?php echo base_url() ?>secondaire/documentation/#connexion-2")
		}
		if (a.includes('patrimoine')){
			window.open("<?php echo base_url() ?>secondaire/documentation/#Prise_en_main-1")
		}
		if (a.includes('Périodicité') || a.includes('Periodicite')){
			window.open("<?php echo base_url() ?>secondaire/documentation/#Prise_en_main-2")
		}
		if (a.includes('matière') || a.includes('matiere')){
			window.open("<?php echo base_url() ?>secondaire/documentation/#Prise_en_main-3")
		}
		if (a.includes('classe')){
			window.open("<?php echo base_url() ?>secondaire/documentation/#Prise_en_main-4")
		}
		if (a.includes('importation') || a.includes('fichier')){
			window.open("<?php echo base_url() ?>secondaire/documentation/#Prise_en_main-5")
		}
		if (a === "emploi du temps"){
			window.open("<?php echo base_url() ?>secondaire/documentation/#Prise_en_main-6")
		}
		if (a === "inscrits"){
			window.open("<?php echo base_url() ?>secondaire/documentation/#Prise_en_main-7")
		}
		if (a.includes('devoir')){
			window.open("<?php echo base_url() ?>secondaire/documentation/#Prise_en_main-8")
		}
		if (a.includes('note')){
			window.open("<?php echo base_url() ?>secondaire/documentation/#Prise_en_main-9")
		}
		if (a.includes('absence')){
			window.open("<?php echo base_url() ?>secondaire/documentation/#Prise_en_main-10")
		}
		if (a.includes('document') || a.includes('administratif')){
			window.open("<?php echo base_url() ?>secondaire/documentation/#Prise_en_main-11")
		}
		if (a.includes('activité') || a.includes('rapport')){
			window.open("<?php echo base_url() ?>secondaire/documentation/#Prise_en_main-12")
		}
		if (a.includes('notification')){
			window.open("<?php echo base_url() ?>secondaire/documentation/#Prise_en_main-13")
		}
		if (a.includes('statistique')){
			window.open("<?php echo base_url() ?>secondaire/documentation/#Prise_en_main-14")
		}
		if (a.includes('rh')){
			window.open("<?php echo base_url() ?>secondaire/documentation/#Prise_en_main-15")
		}
		if (a.includes('sms') || a.includes('message')){
			window.open("<?php echo base_url() ?>secondaire/documentation/#Prise_en_main-16")
		}
		if (a.includes('examen blanc')){
			window.open("<?php echo base_url() ?>secondaire/documentation/#Prise_en_main-17")
		}
		if (a.includes('edition diverse') || a.includes('edition')){
			window.open("<?php echo base_url() ?>secondaire/documentation/#Prise_en_main-18")
		}
	}
</script>
</body>
</html>

