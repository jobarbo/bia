
	<div id="btMenu">
		  	<span class="barre"></span>
		   	<span class="barre"></span>
		   	<span class="barre"></span>
		</div>
		<div class="cart-button">
		    	<a href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( "Voir le panier d'achats" ); ?>">
		    		
		    		<img width="30px" height="23px" src='<?php echo get_template_directory_uri(); ?>/dist/images/cart.svg' alt="Panier" />
		    		<span class="qty" data-qty="<?php echo WC()->cart->get_cart_contents_count(); ?>"></span>
		    	</a>
		    	
		    </div>
		<div id="barreH">
			<!--a href="#" ><button >Menu<!--<?php echo _e('Contact','bia'); ?>--></button></a-->
			    <nav class="nav-primary">
		      <?php
		      if (has_nav_menu('top_navigation')) :
		        wp_nav_menu(['theme_location' => 'top_navigation', 'menu_class' => 'nav']);
		      endif;
		      ?>
		      
		    </nav>
		</div>
		<h1>Bia</h1>
		<a href="<?php echo get_home_url(); ?>"><img id="logo" src='<?php echo get_template_directory_uri(); ?>/dist/images/bia_logo.png' alt="Logo Bia" /></a>
		
		
	<header id="splash" style="background-image: url(<?php echo get_field('image_splash'); ?>)">
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
				<?php if(get_field('linkedin','option')){ ?>
							<li><a href="<?php echo get_field('linkedin','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/linkedin_white.svg" alt="Logo LinkedIn" /></a></li>
				<?php } ?>
			</ul>
		</div>
		<div id="splashTitre">
			<?php if(is_page('2')){ ?>
				<h2><?php echo _e('Formations en</br> activité physique','bia'); ?></h2>
			<?php }else{ ?>
				<h2><?php echo get_field('titre_splash'); ?></h2>
			<?php } ?>
			
		</div>
		<?php if(is_page('2')){ ?>
		<div class="enSavoirPlus">
			<img id="logoEncadre" src="<?php echo get_field('image_information') ?>" /> 
			<?php echo get_field('texte_information'); ?>
			<?php if(get_field('lien_evenement')){ ?>
				<a href="<?php echo get_field('lien_evenement'); ?>" target="_blank">En savoir plus</a>
			<?php } ?>
		</div>
		<?php } ?>
	</header>

		<div id="side-menu" class="container-fluid visually-hidden">
			<div class="background-menu"></div>
			<div class="row">
				<div id="p-gauche" class="col-sm-6">
					<span class="circle-image" style="background-image:url('<?php echo get_field('right_image','option'); ?>');"></span>

				</div>
				<div id="p-droite" class="col-sm-6">
					<?php
				      if (has_nav_menu('side_navigation')) :
				        wp_nav_menu(['theme_location' => 'side_navigation', 'menu_class' => 'nav', 'link_before' =>'<span class="title-menu">', 'link_after' => '</span><span></span>']);
				      endif;
				      ?>

				      <?php if(get_field('tel','option')){ ?>
				      	<p class="tel"><?php echo get_field('tel','option'); ?></p>
				      <?php } ?>
				      <?php if(get_field('email','option')){ ?>
				      <a href="mailto:<?php echo get_field('email','option'); ?>" class="email"><?php echo get_field('email','option'); ?></a>
				      <?php } ?>
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
						<?php if(get_field('linkedin','option')){ ?>
							<li><a href="<?php echo get_field('linkedin','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/linkedin_white.svg" alt="Logo LinkedIn" /></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
			
		</div>