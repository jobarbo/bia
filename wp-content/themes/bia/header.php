<header class="banner">
  <div class="container">
    <nav class="nav-primary">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
    </nav>
  </div>
</header>
	<div id="splash" style="background-image: url(<?php echo get_field('image_splash'); ?>)">
		<div id="barreH">
			<a href="#" ><button >Menu<!--<?php echo _e('Contact','bia'); ?>--></button></a>
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