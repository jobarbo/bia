
<?php /* Template Name: Page FAQ */ ?>

<?php
	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}else{
		$return = 0;
	}
?>

<div id="list-post-blog-faq" class="container-fluid" data-return="<?php echo $return; ?>" >	
	<?php $loop = new WP_Query( array( 'post_type' => 'faq-article', 'posts_per_page' => -1 ) ); ?>
	 <?php 

    	$totalPost = $loop->found_posts; 
    	$cpt = 0;

    ?>
	
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
	<?php
			if($cpt == 0){
				echo '<div class="row"  data-bottom-top="opacity:0;transform:translateY(-30px)" data-center="opacity:1;transform:translateY(0px)">';
			}else{
				if($cpt%2 == 0){
					echo "</div>";
					echo '<div class="row"  data-bottom-top="opacity:0;transform:translateY(-30px)" data-center="opacity:1;transform:translateY(0px)">';
				}
			}

		?>
	<div class="col-sm-6 post" onclick="window.location.href='<?php echo get_permalink($post->ID); ?>'">
		<div class="content">
			<!--?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' ); ?>
			<div class="image" style="background-image:url('<?php echo $thumb['0']; ?>');">
			</div--> 
			<!--p class="author"><? echo get_avatar($post->post_author); ?><?php echo _e('Par ','bia'); ?><?php echo get_the_author(); ?></p-->
			<h4><?php the_title(); ?></h4>
			<div class="description">
				<?php the_excerpt(); ?>
				<a class="bouton" href="<?php echo get_the_permalink(); ?>">Lire la suite</a>
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