<!DOCTYPE html>
<html lang="en">
<?php
$this->load->view('index/css');
?>

<body class="docs-page">
<header class="header fixed-top">
	<div class="branding docs-branding">
		<div class="container-fluid position-relative py-2">
			<div class="docs-logo-wrapper">
				<button id="docs-sidebar-toggler" class="docs-sidebar-toggler docs-sidebar-visible me-2 d-xl-none" type="button">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<div class="site-logo">
					<a class="navbar-brand" href="<?php echo base_url() ?>">
						<img class="logo-icon me-2" src="<?php echo base_url() ?>assets/images/logoEM.png" alt="logo" style=" height: 4rem;
								width: 8rem;">
					</a>
				</div>
			</div>
			<div class="docs-top-utilities d-flex justify-content-end align-items-center">
				<div class="top-search-box d-none d-lg-flex">
					<form class="search-form">
						<input type="text" placeholder="Faire une recherche..." id="search"
							   name="search" class="form-control search-input">
						<button type="submit" class="btn search-btn" value="Search" onclick="mysearch()">
							<i class="fas fa-search"></i></button>
					</form>
				</div>

				<ul class="social-list list-inline mx-md-3 mx-lg-5 mb-0 d-none d-lg-flex">
					<li class="list-inline-item"><a href="https://www.ecolemedia.net/" target="_blank"><i class="fas fa-globe fa-fw"></i></a></li>
					<li class="list-inline-item"><a href="https://www.facebook.com/ecolemedias" target="_blank"><i class="fab fa-facebook-f fa-fw"></i></a></li>
				</ul>
				<a href="" class="btn btn-primary d-none d-lg-flex">Télécharger</a>
			</div>
		</div>
	</div>
</header>


<div class="docs-wrapper">
	<?php
	$this->load->view('secondaire/doc_element/sidebar');
	?>

	<div class="docs-content">
		<div class="container">
			<?php
			$this->load->view('secondaire/doc_element/introduction');
			$this->load->view('secondaire/doc_element/souscription');
			$this->load->view('secondaire/doc_element/connexion');
			$this->load->view('secondaire/doc_element/Prise_en_main');

			$this->load->view('index_element/index_footer');
			?>


		</div>
	</div>
</div>


<?php
$this->load->view('js');
?>
<script>
	console.log("avant0");
	function mysearch(){
		var element = document.getElementById("search").value;
		var a = element.toLowerCase()
		if (a.includes('souscription')){
			window.open("#subscribe", '_self')
		}
		if (a.includes('paiement')){
			window.open("#sub-3", '_self')
		}
		if (a.includes('connexion')){
			window.open("#connexion", '_self')
		}
		if (a.includes('mot de passe')){
			window.open("#connexion-2", '_self')
		}
		if (a.includes('patrimoine')){
			window.open("#Prise_en_main-1", '_self')
		}
		if (a.includes('Périodicité') || a.includes('Periodicite')){
			window.open("#Prise_en_main-2", '_self')
		}
		if (a.includes('matière') || a.includes('matiere')){
			window.open("#Prise_en_main-3", '_self')
		}
		if (a.includes('classe')){
			window.open("#Prise_en_main-4", '_self')
		}
		if (a.includes('importation') || a.includes('fichier')){
			window.open("#Prise_en_main-5", '_self')
		}
		if (a === "emploi du temps"){
			window.open("#Prise_en_main-6", '_self')
		}
		if (a === "inscrits"){
			window.open("#Prise_en_main-7", '_self')
		}
		if (a.includes('devoir')){
			window.open("#Prise_en_main-8", '_self')
		}
		if (a.includes('note')){
			window.open("#Prise_en_main-9", '_self')
		}
		if (a.includes('absence')){
			window.open("#Prise_en_main-10", '_self')
		}
		if (a.includes('document') || a.includes('administratif')){
			window.open("#Prise_en_main-11", '_self')
		}
		if (a.includes('activité') || a.includes('rapport')){
			window.open("#Prise_en_main-12", '_self')
		}
		if (a.includes('notification')){
			window.open("#Prise_en_main-13", '_self')
		}
		if (a.includes('statistique')){
			window.open("#Prise_en_main-14", '_self')
		}
		if (a.includes('rh')){
			window.open("#Prise_en_main-15", '_self')
		}
		if (a.includes('sms') || a.includes('message')){
			window.open("#Prise_en_main-16", '_self')
		}
		if (a.includes('examen blanc')){
			window.open("#Prise_en_main-17", '_self')
		}
		if (a.includes('edition diverse') || a.includes('edition')){
			window.open("#Prise_en_main-18", '_self')
		}
	}
</script>
</body>
</html>

