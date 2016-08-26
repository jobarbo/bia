
<?php /* Template Name: Page À propos */ ?>
<?php while (have_posts()) : the_post(); ?>
<div class="container-fluid">
	<div class="row row-title" data-bottom-top="opacity:0;" data-center="opacity:1;">
		<div class="col-sm-12">
			
			<div class="texte-intro">
			<h4><?php echo _e("L'équipe",'bia'); ?></h4>
				<?php echo get_the_content(); ?>
			</div>
		</div>
		
	</div>
		<?php
	if( have_rows('liste-sections') ):

	    while ( have_rows('liste-sections') ) : the_row(); ?>
			
			<div class="row row-post" data-bottom-top="opacity:0;" data-center="opacity:1;">
				<div class="col-sm-6 post-left col-sm-height col-sm-middle">
					<img src="<?php echo get_sub_field('image'); ?>" />
				</div>
				<div class="col-sm-6 post-right col-sm-height">
					<h4><?php echo get_sub_field('nom'); ?></h4>
					<p class="titre"><?php echo get_sub_field('titre'); ?></h4>
					<div class="content"><?php echo get_sub_field('description'); ?></div>
					<?php if(get_sub_field('linked_in')){ ?>
						<a class="bouton" href="<?php echo get_sub_field('linked_in'); ?>" target="_blank"><?php echo _e('LinkedIn','bia'); ?></a>
					<?php } ?>
				</div>
			</div>
	    
	    <?php endwhile;

	endif;

	?>
</div>
<?php endwhile; ?>