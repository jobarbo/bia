<?php /* Template Name: Page Club BIA */ ?>


<div id="header-club-bia">
	<div class="row">
		<div class="row-sm-height">
			<div class="col-sm-6 col-sm-height col-bottom">
				<div id="splashTitre">
					<h2><?php echo get_field('title_top'); ?></h2>
				</div>
			</div>
			<div class="image-header col-sm-6 col-sm-height col-middle">
				<img src="<?php echo get_field('image_top'); ?>" />
			</div>
		</div>
	</div>
</div>
<?php $arrPosts = get_field('partenaires', false, false); ?>
	<?php $loop = new WP_Query( array( 'post_type' => 'product', 'posts_per_page' => 1, 'post__in' => array(351) ) ); ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<div id="section-product" class="woocommerce" data-bottom-top="opacity:0;transform:translateY(-30px)" data-center="opacity:1;transform:translateY(0px)">
			<div class="row">
				<div class="row-sm-height">
					<div class="col-sm-6 col-middle gauche col-sm-height">
						<?php the_post_thumbnail(); ?>
					</div>
					<?php
						$product = new WC_product(351);
					?>
					<div class="col-sm-6 col-top droite col-sm-height">
						<div class="content">
							<p class="bouton">Abonnement à vie +</p>
							<div class="price"><?php echo $product->price; ?> $</div>
							<span class="clear"></span>
							<?php the_content(); ?>
							<button type="submit" data-quantity="1" data-product_id="<?php echo $product->id; ?>" class="button ajax_add_to_cart add_to_cart_button product_type_simple"><?php echo _e('Ajouter au panier','bia'); ?></button>
						</div>
					</div>
				</div>
			</div>
		</div>		
<?php endwhile; wp_reset_query(); ?>

<div id="partenaires" data-bottom-top="opacity:0;" data-center="opacity:1;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<h4 class="titreSection"><?php echo _e('Partenaires</br>participants','bia'); ?></h4>
			</div>
		</div>
		
		<?php $arrPosts = get_field('partenaires', false, false); ?>
		<?php $loop = new WP_Query( array( 'post_type' => 'commanditaire', 'posts_per_page' => -1, 'post__in' => $arrPosts ) ); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<div class="row row-post" data-bottom-top="opacity:0;" data-center="opacity:1;">
	        		 <div class="row-sm-height">
	        		 	<div class="col-sm-6 col-sm-height col-middle post-in-list">
	        		 		<?php echo get_the_post_thumbnail(); ?>
	        		 		</br>
	        		 		<a class="bouton"  target="_blank" href="<?php echo get_field('site_web') ?>"><?php echo _e('Site web','bia'); ?></a>
	        		 	</div>
	        		 	<div class="col-sm-6 col-sm-height col-middle post-in-list">
	        		 		<h5><?php echo get_the_title(); ?></h5>
	        		 		<div class="contenu">
								<?php echo get_field('avantages'); ?>
							</div>
	        		 	</div>
	        		 </div>
	        		</div>
		<?php endwhile; wp_reset_query(); ?>
		
	</div>
</div>

<div id="disclaimer" data-bottom-top="opacity:0;transform:translateY(-30px)" data-center="opacity:1;transform:translateY(0px)">
	<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<?php echo get_field('note'); ?>
		</div>
	</div>
	</div>
</div>