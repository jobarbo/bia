<?php /* Template Name: Page Formations */ ?>
<div id="list-formations" class="container-fluid">

	<?php 
	global $product;

	$loop = new WP_Query( array( 'post_type' => 'product', 'posts_per_page' => -1, 'order'=>'ASC',    'tax_query'     => array(
        array(
            'taxonomy'  => 'product_cat',
            'field'     => 'id', 
            'terms'     => 7
        )
    ) ) ); ?>
	
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
	
		<div class="col-sm-4">
			<div class="location">
				<?php echo get_field('location'); ?>
			</div>
			<div class="date">
				<?php echo get_field('date_de_la_formation'); ?>
			</div>
			<?php echo get_the_title(); ?>
			<div class="qty">
			<?php echo $product->stock; ?>
			</div>


			<a href="<?php echo get_permalink(); ?>"><button>S'inscrire</button></a>
			<div class="formateurs-list">
				<?php
					$posts = get_field('list_form');

					if( $posts ): ?>
			    <ul>
			    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
			        <?php setup_postdata($post); ?>
			        <li>
			            <?php the_title(); ?>
			            
			        </li>
			    <?php endforeach; ?>
			    </ul>
			    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>
				
			</div>

		</div>	

	<?php endwhile; wp_reset_query(); ?>
</div>
