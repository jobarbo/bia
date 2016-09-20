<div id="pageContact">
		<div class="container-fluid">
			<div class="row borderBox">
			
				<div class="footerBloc" data-bottom-top="opacity:0;" data-bottom="opacity:1;">
					<div class="row">
						<?php if(!is_page('122')){ ?>
							<div class="col-md-6 bg-photo">
								<div class="imgLienGauche" style="background-image:url(<?php echo get_field('image_p_formations','option');  ?>)">
								<h3 class="titreSection"><?php echo _e('Prochaines Formations','bia'); ?></h3>	
								<a class="bouton white" href="<?php echo get_permalink(122); ?>"><?php echo _e('Voir le calendrier','bia'); ?></a>
								</div>
							</div>
						<?php }else{ ?>
							<div class="col-md-6 bg-photo">
								<div class="imgLienGauche" style="background-image:url(<?php echo get_field('image_supporteurs','option');  ?>)">
								<h3 class="titreSection"><?php echo _e('Nos<br/>partenaires','bia'); ?></h3>	
								<a class="bouton white" class="bouton" href="<?php echo get_permalink(126); ?>"><?php echo _e('Nos partenaires','bia'); ?></a>
								</div>
							</div>
						<?php } ?>

						<?php if(!is_page('152')){ ?>
						<div class="col-md-6 bg-blanc">
							<div class="imgLienDroit" style="background-image:url(<?php echo get_field('image_c_bia','option');  ?>)">	
								<h3 class="titreSection"><?php echo _e('Club bia','bia'); ?></h3>
								<a class="bouton" href="<?php echo get_permalink(152); ?>"><?php echo _e('Découvrez les avantages','bia'); ?></a>
							</div>
						</div>
						<?php }else{ ?>
							<div class="col-md-6 bg-photo">
								<div class="imgLienGauche" style="background-image:url(<?php echo get_field('image_supporteurs','option');  ?>)">
								<h3 class="titreSection"><?php echo _e('Nos<br/>partenaires','bia'); ?></h3>	
								<a class="bouton white" href="<?php echo get_permalink(126); ?>"><?php echo _e('Nos partenaires','bia'); ?></a>
								</div>
							</div>
						<?php } ?>
					</div>					
				</div>
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
						<?php if(get_field('linkedin','option')){ ?>
							<li><a href="<?php echo get_field('linkedin','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/linkedin.svg" alt="Logo LinkedIn" /></a></li>
						<?php } ?>
			</ul>
				<div class="containerFeed" >
					<div id="instagramFeed">
						
						<span class="clear"></span>
					</div>
				</div>
				<a href="https://www.instagram.com/explore/tags/biaformations/" target="_blank"><h3 class="titreSection" data-bottom-top="opacity:0;" data-center="opacity:1;">#biaformations</h3></a>
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
						<?php if(get_field('linkedin','option')){ ?>
							<li><a href="<?php echo get_field('linkedin','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/linkedin.svg" alt="Logo LinkedIn" /></a></li>
						<?php } ?>
					</ul>
						<?php include("contact-form.php"); ?>
					
				</div>			
			</div>
		</div>
	</div>
<footer class="content-info">
  <div class="container-fluid">
    <div class="row">
    	<div class="col-sm-6 sub-menu-footer">
    		<?php
				if (has_nav_menu('top_navigation')) :
				    wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav']);
				endif;
			?>
    	</div>
    	<div class="col-sm-6 information-contact">
    		<?php
    			$tel = get_field('tel','option');
    			$formattedTel = str_replace('-','',$tel);
    			$formattedTel = str_replace(' ','',$formattedTel);
    		?>
    		<a href="tel:+1<?php echo $formattedTel; ?>" class="tel"><?php echo get_field('tel','option'); ?></a>
    		<a href="mailto:info@biaformations.com" class="email">info@biaformations.com</a>
    	</div>
    </div>
  </div>
</footer>
 