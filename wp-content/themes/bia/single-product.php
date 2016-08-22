<?php while (have_posts()) : the_post(); ?>
<div class="container-fluid">
	<div class="row">
		<div class="row-sm-height">
			<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail_size' );?>
			<div class="post col-sm-6 col-sm-height" style="background-image:url('<?php echo $thumb['0']; ?>')">
			<div class="date">
					<?php echo get_field('date_de_la_formation'); ?>
				</div>
				<h4><?php echo get_the_title(); ?></h4>
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
					        	
					            <p><?php echo get_the_title($p->ID); ?></p>			            
					        </li>
					    <?php endforeach; ?>
					    </ul>
					    
					<?php endif; ?>					
					</div>
				<?php } ?>

				<div class="price"><?php echo $product->regular_price; ?> $</div>

				<a class="bouton" href="#" target="_blank"><?php echo _e('Réserver ma place','bia'); ?></a>
			</div>
			<div class="content-formation col-sm-6 col-sm-height col-sm-top">
				<div class="description">
					<?php the_content(); ?>
				</div>
				<div class="date"><p class="width-fixed" ><?php echo _e('Date','bia'); ?></p><span><?php echo get_field('date_de_la_formation'); ?></span></div>
				<div class="heure"><p class="width-fixed" ><?php echo _e('Heure','bia'); ?></p><span><?php echo get_field('heure'); ?></span></div>
				<div class="endroit"><p class="width-fixed" ><?php echo _e('Endroit','bia'); ?></p><span><?php echo get_field('location_long'); ?></span></div>
				<a class="bouton" href="#" target="_blank"><?php echo _e('Politique de remboursement','bia'); ?></a>
				<a class="bouton" href="#" target="_blank"><?php echo _e('Crédits HFC','bia'); ?></a>
			</div>
		</div>
	</div>
</div>  
<?php endwhile; ?>

