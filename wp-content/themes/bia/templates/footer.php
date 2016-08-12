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
				<div class="footerBloc">
					<div class="row">
						<?php if(!is_page('122')){ ?>
							<div class="col-md-6 bg-photo">
								<div class="imgLienGauche" style="background-image:url(<?php echo get_field('image_p_formations','option');  ?>)">
								<h3 class="titreSection"><?php echo _e('Prochaines Formations','bia'); ?></h3>	
								<a href="<?php echo get_permalink('122'); ?>"><?php echo _e('Voir le calendrier','bia'); ?></a>
								</div>
							</div>
						<?php }else{ ?>
							<div class="col-md-6 bg-photo">
								<div class="imgLienGauche" style="background-image:url(<?php echo get_field('image_supporteurs','option');  ?>)">
								<h3 class="titreSection"><?php echo _e('Nos<br/>supporteurs','bia'); ?></h3>	
								<a href="<?php echo get_permalink('12'); ?>"><?php echo _e('Nos commanditaires','bia'); ?></a>
								</div>
							</div>
						<?php } ?>

						<?php if(!is_page('152')){ ?>
						<div class="col-md-6 bg-blanc">
							<div class="imgLienDroit" style="background-image:url(<?php echo get_field('image_c_bia','option');  ?>)">	
								<h3 class="titreSection"><?php echo _e('Club bia','bia'); ?></h3>
								<a href="<?php echo get_permalink('152'); ?>"><?php echo _e('Découvrez les avantages','bia'); ?></a>
							</div>
						</div>
						<?php }else{ ?>
							<div class="col-md-6 bg-photo">
								<div class="imgLienGauche" style="background-image:url(<?php echo get_field('image_supporteurs','option');  ?>)">
								<h3 class="titreSection"><?php echo _e('Nos<br/>supporteurs','bia'); ?></h3>	
								<a href="<?php echo get_permalink('12'); ?>"><?php echo _e('Nos commanditaires','bia'); ?></a>
								</div>
							</div>
						<?php } ?>
					</div>					
				</div>
				<div class="containerFeed">
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
				<h3 class="titreSection">#onsueensemble</h3>
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
						<?php include("contact-form.php"); ?>
					
				</div>			
			</div>
		</div>
	</div>
<footer class="content-info">
  <div class="container courriel">
    <?php dynamic_sidebar('sidebar-footer'); ?>
    <a href="mailto:info@biaformations.com"><p>info@biaformations.com</p></a>
  </div>
</footer>
 