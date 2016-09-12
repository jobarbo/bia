<?php /* Template Name: Page Accueil */ ?>

	<div id="listeProfessionel" >
		<div class="row borderBox">
			<div class="row-height">
				<div class="col-md-8 col-md-height imgProfessionel" style="background-image: url(<?php echo get_field('image_section_1'); ?>">

				</div>
				<div class="col-md-4 col-md-height col-sm-middle textProfessionel">
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
	<div id="formateursRenommes">
		<div class="container-fluid">
		<div class="carre" data-bottom-top="opacity:0;margin-top:-250px" data-center="opacity:1;margin-top:0px"><p>1</p></div>
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
		<div class="carre" data-bottom-top="opacity:0;margin-top:-250px" data-center="opacity:1;margin-top:0px"><p>2</p></div>
			<div class="row borderBox">
			
				<div class="row-height">
						<div class="col-md-6 col-md-height col-md-middle leftBox">
							<div class="triangle">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/images/triangle_red.png" />
							</div>
						</div>
						<h3 class="titreSection"><?php echo get_field('titre_4'); ?></h3>
						<div class="col-md-6 col-md-height col-md-middle rightBox">
							<div class="infoFormation">
								<?php echo get_field('texte_4'); ?>
								<br/><br/>
								<ul>
									<a class="button" href="<?php echo get_permalink(122); ?>"><?php echo _e('Liste des formations','bia'); ?></a>
								</ul>
							</div>
						</div>
					
				</div>			
			</div>
		</div>
	</div>
	

	<div id="approcheScientifique">
		<div class="container-fluid">
		<div class="carre" data-bottom-top="opacity:0;margin-top:-150px" data-center="opacity:1;margin-top:0px"><p>3</p></div>
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

