<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<?php while (have_posts()) : the_post(); ?>
<div class="container-fluid container-single-product" data-bottom-top="opacity:0;transform:translateY(-30px)" data-center="opacity:1;transform:translateY(0px)">
	<div class="row">
		<div class="row-sm-height">
			<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail_size' );?>
			<div class="formation col-sm-6 col-sm-height">
				<div class="content">
					<div>
					<div class="location">
						<?php  

							global $product;
							$ville_name = array_shift( wc_get_product_terms( $product->id, 'pa_ville', array( 'fields' => 'names' ) ) );
							

						?>

						<?php 
						echo $ville_name; ?>
					</div>
					<div class="date">
						<?php echo get_field('date_de_la_formation'); ?>
					</div>
					<h5><?php echo get_the_title(); ?></h5>

					<?php
						if(get_field('list_form')){
					?>
						<div class="formateurs-list">
							<h6>Formateurs</h6>
							<?php
								$posts = get_field('list_form');

								if( $posts ): ?>
						    <ul>
						    <?php foreach( $posts as $p): // variable must be called $post (IMPORTANT) ?>
						        
						        <li>
						        	<a href="<?php echo get_the_permalink(124)."#".$p->ID; ?>">
							        	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($p->ID), 'thumbnail_size' );?>
							        	<?php if($thumb['0']){ ?>
							        		<img src="<?php echo $thumb['0']; ?>" alt="<?php echo get_the_title($p->ID); ?>"/>
							        	<?php } ?>
							            <p><?php echo get_the_title($p->ID); ?></p>
						            </a>	            
						        </li>
						    <?php endforeach; ?>
						    </ul>
						    
						<?php endif; ?>					
						</div>
					<?php } ?>

					<div class="price"><?php echo $product->price; ?> $</div>

					<button type="submit" data-quantity="1" data-product_id="<?php echo $product->id; ?>" class="button ajax_add_to_cart add_to_cart_button product_type_simple"><?php echo _e('Ajouter au panier','bia'); ?></button>

						
					<span class="clear"></span>
					</div>
				</div>
			</div>
			<div class="content-formation col-sm-6 col-sm-height col-sm-top">
				<div class="description">
					<?php the_content(); ?>
				</div>
				<div class="date"><p class="width-fixed" ><?php echo _e('Date','bia'); ?></p><p><?php echo get_field('date_de_la_formation'); ?></p></div>
				<div class="heure"><p class="width-fixed" ><?php echo _e('Heure','bia'); ?></p><span><?php echo get_field('heure'); ?></span></div>
				<div class="endroit"><p class="width-fixed" ><?php echo _e('Endroit','bia'); ?></p><span><?php echo get_field('location_long'); ?></span></div>
				<a class="bouton" href="<?php echo get_permalink(237); ?>" target="_blank"><?php echo _e('Politique de remboursement','bia'); ?></a>
				<a class="bouton" href="<?php echo get_permalink(238); ?>" target="_blank"><?php echo _e('Crédits HFC','bia'); ?></a>
			</div>
		</div>
	</div>
</div>  
<?php endwhile; ?>
<?php do_action( 'woocommerce_after_single_product' ); ?>

