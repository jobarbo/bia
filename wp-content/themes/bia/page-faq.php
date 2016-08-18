
<?php /* Template Name: Page FAQ */ ?>

<div class="container-fluid">	
	<?php $loop = new WP_Query( array( 'post_type' => 'faq-article', 'posts_per_page' => -1 ) ); ?>
	 <?php 

    	$totalPost = $loop->found_posts; 
    	$cpt = 0;

    ?>
	
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
	<?php
			if($cpt == 0){
				echo '<div class="row">';
			}else{
				if($cpt%2 == 0){
					echo "</div>";
					echo '<div class="row">';
				}
			}

		?>
	<div class="col-sm-6 post">
		<div class="content">
			<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' ); ?>
			<div class="image" style="background-image:url('<?php echo $thumb['0']; ?>');">
			</div>
			<p class="author"><? echo get_avatar($post->post_author); ?><?php echo _e('Par ','bia'); ?><?php echo get_the_author(); ?></p>
			<h4><?php the_title(); ?></h4>
			<div class="description">
				<?php the_excerpt(); ?>
			</div>
		</div>
	</div>

	<?php
			if($cpt == $totalPost-1){
				echo '</div>';
			}


			$cpt++;
		?>
	
	<?php endwhile; wp_reset_query(); ?>
	
</div>