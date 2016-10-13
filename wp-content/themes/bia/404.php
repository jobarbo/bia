<?php get_template_part('templates/page', 'header'); ?>

<div class="container-fluid error">
	
	<div class="white-bloc">
		<h3 class="titreSection"><?php echo _e('Erreur 404','bia'); ?></h3>
		<p><?php echo _e('Il semblerait que la page que vous cherchez n\'existe pas. <br><a class="button" href="'.get_home_url().'">< Retour à l\'accueil</a>','bia'); ?></p>
	</div>
</div>
