<?php /* Template Name: Page Accueil */ ?>
	<div id="splash">
		<div id="barreH">
			<a href="#formulaireInscription" ><button ><?php echo _e('Contact','bia'); ?></button></a>
		</div>
		<h1>Bia</h1>
		<img id="logo" src='<?php echo get_template_directory_uri(); ?>/dist/images/bia_logo.svg' alt="Logo Bia" />
		<div id="barreV">
			<ul class="social"> 
				<?php if(get_field('facebook','option')){ ?>
					<li><a href="<?php echo get_field('facebook','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/facebook_white.svg" alt="Logo Facebook" /></a></li>
				<?php } ?>
				<?php if(get_field('instagram','option')){ ?>
					<li><a href="<?php echo get_field('instagram','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/instagram_white.svg" alt="Logo Instagram" /></a></li>
				<?php } ?>
				<?php if(get_field('twitter','option')){ ?>
					<li><a href="<?php echo get_field('twitter','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/twitter_white.svg" alt="Logo Twitter" /></a></li>
				<?php } ?>
			</ul>
		</div>
		<div id="splashTitre">
			<h2>Formations</br> de haut niveau</h2>
		</div>
		<div class="enSavoirPlus">
		<img id="logoEncadre" src="<?php echo get_field('image_information') ?>"> 
			<?php echo get_field('texte_information'); ?>
			<?php if(get_field('lien_evenement')){ ?>
				<a href="<?php echo get_field('lien_evenement'); ?>" target="_blank">En savoir plus</a>
			<?php } ?>
		</div>
	</div>
	<div id="listeProfessionel" >
		<div class="row borderBox">
			<div class="row-height">
				<div class="col-md-8 col-md-height imgProfessionel">

				</div>
				<div class="col-md-4 col-md-height textProfessionel">
					<div id="proContent">
						<h3 class="titreSection" "><?php echo get_field('titre_1'); ?></h3>
						<?php echo get_field('texte_1'); ?>
					</div>
				</div>
				<div id="triangle-bottomright1"></div>
				<div id="triangle-bottomright2"></div>
			</div>
		</div>
	</div>
	<div id="approcheScientifique">
		<div class="container-fluid">
		<div class="carre" data-bottom-top="opacity:0;margin-top:-150px" data-center="opacity:1;margin-top:0px"><p>1</p></div>
			<div class="row borderBox">
				
				<div class="row-height">
						<div class="col-md-6 col-md-height col-md-middle leftBox">
							<div class="electrocardiogram">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/images/electrocardiogram.png" />
							</div>
						</div>
						<h3 class="titreSection"><?php echo get_field('titre_2'); ?></h3>
						<div class="col-md-6 col-md-height col-md-middle rightBox">
							<p><?php echo get_field('texte_2'); ?></p>
						</div>
					
				</div>
			</div>
		</div>
	</div>
	<div id="formateursRenommes">
		<div class="container-fluid">
		<div class="carre" data-bottom-top="opacity:0;margin-top:-250px" data-center="opacity:1;margin-top:0px"><p>2</p></div>
			<div class="row borderBox">
			
				<div class="row-height">
					
						
						<div class="col-md-6 col-md-height col-md-middle leftBox">
							<div class="imgBulle">
								<div class="bulle2" style="background-image: url(<?php echo get_field('image_1_3'); ?>)">
								</div>
								<div class="bulle1" style="background-image: url(<?php echo get_field('image_2_3');  ?>)">
								</div>
								<div class="bulle3" style="background-image: url(<?php echo get_field('image_3_3');  ?>)">
								</div>
								<div class="bulle4" style="background-image: url(<?php echo get_field('image_4_3');  ?>)">
								</div>
							</div>
							<span class="clear"></span>
						</div>
						<h3 class="titreSection" ><?php echo get_field('titre_3'); ?></h3>
						<div class="col-md-6 col-md-height col-md-middle rightBox">
							<div class="infoFormateur">
								<?php echo get_field('texte_3'); ?>
							</div>
							<span class="clear"></span>
						</div>
					
				</div>
			</div>
		</div>
	</div>
	<div id="formationsVariee">
		<div class="container-fluid">
		<div class="carre" data-bottom-top="opacity:0;margin-top:-250px" data-center="opacity:1;margin-top:0px"><p>3</p></div>
			<div class="row borderBox">
			
				<div class="row-height">
					
						
						<div class="col-md-6 col-md-height col-md-middle leftBox">
							<div class="triangle">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/images/triangle_white.png" />
							</div>
						</div>
						<h3 class="titreSection"><?php echo get_field('titre_4'); ?></h3>
						<div class="col-md-6 col-md-height col-md-middle rightBox">
							<div class="infoFormation">
								<?php echo get_field('texte_4'); ?>
							</div>
						</div>
					
				</div>			
			</div>
		</div>
	</div>
	<div id="pageContact">
		<div class="container-fluid">
			<div class="row borderBox">
			<ul class="social mobile"> 
						<?php if(get_field('facebook','option')){ ?>
							<li><a href="<?php echo get_field('facebook','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/facebook.svg" alt="Logo Facebook" /></a></li>
						<?php } ?>
						<?php if(get_field('instagram','option')){ ?>
							<li><a href="<?php echo get_field('instagram','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/instagram.svg" alt="Logo Instagram" /></a></li>
						<?php } ?>
						<?php if(get_field('twitter','option')){ ?>
							<li><a href="<?php echo get_field('twitter','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/twitter.svg" alt="Logo Twitter" /></a></li>
						<?php } ?>
					</ul>
				<!--div class="containerFeed">
					<div id="instagramFeed">
						<div class="instagramImage" >
							<div class="image" style="background-image: url(<?php echo get_template_directory_uri(); ?>/dist/images/instagram1.jpg);">
							</div>
						</div>
						<div class="instagramImage">
							<div class="image" style="background-image: url(<?php echo get_template_directory_uri(); ?>/dist/images/instagram2.jpg);">
							</div>
						</div>
						<div class="instagramImage">
							<div class="image" style="background-image: url(<?php echo get_template_directory_uri(); ?>/dist/images/instagram3.jpg);">
							</div>
						</div>
						<div class="instagramImage">
							<div class="image" style="background-image: url(<?php echo get_template_directory_uri(); ?>/dist/images/instagram4.jpg);">	
							</div>
						</div>
						<span class="clear"></span>
					</div>
				</div>
				<h3 class="titreSection">#onsueensemble</h3-->
				<div class="row-height">
					
					<ul class="social desktop"> 
						<?php if(get_field('facebook','option')){ ?>
							<li><a href="<?php echo get_field('facebook','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/facebook.svg" alt="Logo Facebook" /></a></li>
						<?php } ?>
						<?php if(get_field('instagram','option')){ ?>
							<li><a href="<?php echo get_field('instagram','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/instagram.svg" alt="Logo Instagram" /></a></li>
						<?php } ?>
						<?php if(get_field('twitter','option')){ ?>
							<li><a href="<?php echo get_field('twitter','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/twitter.svg" alt="Logo Twitter" /></a></li>
						<?php } ?>
					</ul>
						<?php include("templates/contact-form.php"); ?>
					
				</div>			
			</div>
		</div>
	</div>

