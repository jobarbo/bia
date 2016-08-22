<?php /* Template Name: Page Commanditaires */ ?>

<div class="container-fluid">
	
	<?php
	$arrPosts = array();
	if( have_rows('liste_sections') ):

	    while ( have_rows('liste_sections') ) : the_row(); ?>
			<div class="row row-title">
	        	<h4><?php the_sub_field('titre_section'); ?></h4>
	        </div>
	        <?php $listPosts = get_sub_field('content_section'); ?>
	        <?php if($listPosts){ 
	        	foreach($listPosts as $singlePost){ ?>
	        		<?php array_push($arrPosts, $singlePost->ID); ?>
	        		<div class="row row-post">
	        		 <div class="row-sm-height">
	        		 	<div class="col-sm-6 col-sm-height col-middle post-in-list">
	        		 		<?php echo get_the_post_thumbnail( $singlePost->ID, 'normal' ); ?>
	        		 		</br>
	        		 		<a class="bouton" href="<?php echo get_field('site_web', $singlePost->ID) ?>"><?php echo _e('Site web','bia'); ?></a>
	        		 	</div>
	        		 	<div class="col-sm-6 col-sm-height col-middle post-in-list">
	        		 		<h5><?php echo get_the_title($singlePost->ID); ?></h5>
	        		 		<div class="contenu">
								<?php $content_post = get_post($singlePost->ID);
								echo $content_post->post_content; ?>
							</div>
	        		 	</div>
	        		 </div>
	        		</div>

	        <?php } 
				} ?>

	    <?php endwhile;

	endif;

	$arrPosts = array_unique($arrPosts);

	?>

	<div id="list-post-type" class="row">
		<h4><?php echo _e('Commanditaires','bia'); ?></h4>
		<?php $loop = new WP_Query( array( 'post_type' => 'commanditaire', 'posts_per_page' => -1, 'post__not_in' => $arrPosts ) ); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
				<div class="post-in-list col-sm-6 col-lg-3">
					<?php the_post_thumbnail( ); ?>
					</br>
					<a class="bouton" href="<?php echo get_field('site_web', $singlePost->ID) ?>"><?php echo _e('Site web','bia'); ?></a>
				</div>
				
		<?php endwhile; wp_reset_query(); ?>
	</div>
</div>