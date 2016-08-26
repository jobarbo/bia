
<?php /* Template Name: Page Formateurs */ ?>

<div class="container-fluid">
	
		<?php
	if( have_rows('liste_sections') ):

	    while ( have_rows('liste_sections') ) : the_row(); ?>
			<div class="row row-title" data-bottom-top="opacity:0;transform:translateY(-30px)" data-center="opacity:1;transform:translateY(0px)">
	        	<h4><?php the_sub_field('titre_section'); ?></h4>
	        </div>
	        <?php $listPosts = get_sub_field('content_section'); ?>
	        <?php if($listPosts){ 
	        	foreach($listPosts as $singlePost){ ?>
	        		
	        		<div id="<?php echo $singlePost->ID; ?>" class="row row-post">
	        		 <div class="row-sm-height" data-bottom-top="opacity:0;" data-center="opacity:1;">
	        		 	<div class="col-sm-6 col-sm-height col-middle post-in-list">
	        		 		<?php echo get_the_post_thumbnail( $singlePost->ID, 'normal' ); ?>
	        		 		<div class="formateurs-link">
	        		 			<a class="bouton" href="<?php echo get_permalink(122); ?>?formateurs=<?php echo $singlePost->ID; ?>"><?php echo _e('Mes formations','bia'); ?></a>
							<?php if(get_field('site_web',$singlePost->ID)){ ?>
								<a class="bouton" href="<?php echo get_field('site_web',$singlePost->ID); ?>" target="_blank"><?php echo _e('Site web','bia'); ?></a>
							<?php } ?>
							<?php if(get_field('linked_in',$singlePost->ID)){ ?>
								<a class="bouton" href="<?php echo get_field('linked_in',$singlePost->ID); ?>" target="_blank"><?php echo _e('LinkedIn','bia'); ?></a>
							<?php } ?>	
							</div>
	        		 		
	        		 	</div>
	        		 	<div class="col-sm-6 col-sm-height col-middle post-in-list">
	        		 		<h5><?php echo get_the_title($singlePost->ID); ?></h5>
	        		 		<p class="titre"><?php echo get_field('titre',$singlePost->ID); ?></p>
	        		 		
	        		 		<?php $content_post = get_post($singlePost->ID); ?>
							<div class="contenu">
								<?php echo $content_post->post_content; ?>
							</div>							
							
	        		 	</div>
	        		 </div>
	        		</div>

	        <?php } 
				} ?>

	    <?php endwhile;

	endif;

	?>
</div>