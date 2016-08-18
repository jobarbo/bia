<?php /* Template Name: Page Formations */ ?>
<div id="filtres" class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<h4><?php echo _e('Filtres','bia'); ?></h4>
		</div>
	</div>
	<div class="row white-bloc">
		<div class="section-filtre col-sm-3">
			<button data-filtre="ville">Ville +</button>
		</div>
		<div class="section-filtre col-sm-3">
			<button data-filtre="formateurs">Formateurs +</button>
		</div>
		<div class="section-filtre col-sm-3">
			<button data-filtre="interets">Intérêts +</button>
		</div>
		<div class="section-filtre col-sm-3">
			<button data-filtre="type" >Types de formations +</button>
		</div>
		<div id="ville" class="col-sm-12 list-filtre">
		<?php
				$terms = get_terms( array(
				    'taxonomy' => 'pa_ville',
				    'hide_empty' => false,
				) );

				?>
				<div class="row">
				<?php foreach($terms as $term){ ?>
					<div class="col-sm-3" data-id="<?php echo $term->term_id ?>"><?php echo $term->name; ?></div>
				<?php } ?>
				</div>
		</div>
		<div id="formateurs" class="col-sm-12 list-filtre">
		<?php $loop = new WP_Query( array( 'post_type' => 'formateur', 'posts_per_page' => -1 ) ); ?>
			<div class="row">
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<div  class="col-sm-3"  data-id="<?php echo get_the_id(); ?>"><?php echo get_the_title(); ?></div>
				<?php endwhile; wp_reset_query(); ?>
			</div>
		</div>
		<div id="interets" class="col-sm-12 list-filtre">
		<?php
				$terms = get_terms( array(
				    'taxonomy' => 'pa_interets',
				    'hide_empty' => false,
				) );

				?>
				<div class="row">
				<?php foreach($terms as $term){ ?>
					<div class="col-sm-3"  data-id="<?php echo $term->term_id ?>"><?php echo $term->name; ?></div>
				<?php } ?>
				</div>
		</div>
		<div id="type" class="col-sm-12 list-filtre">			
			<?php
				$terms = get_terms( array(
				    'taxonomy' => 'pa_type-de-formation',
				    'hide_empty' => false,
				) );

				?>
			<div class="row">
			<?php foreach($terms as $term){ ?>
				<div class="col-sm-3"  data-id="<?php echo $term->term_id ?>"><?php echo $term->name; ?></div>
			<?php } ?>
			</div>
		</div>
	</div>
</div>

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

    <?php 

    	$totalPost = $loop->found_posts; 
    	$cpt = 0;

    ?>
	
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
	
		<?php
			if($cpt == 0){
				echo '<div class="row">';
			}else{
				if($cpt%3 == 0){
					echo "</div>";
					echo '<div class="row">';
				}
			}

		?>


		<div class="formation col-sm-4">
			<div class="content">
				<div class="location">
					<?php $location = get_field('location_short');
					echo $location->name; ?>
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
					        	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($p->ID), 'thumbnail_size' );?>
					        	<?php if($thumb['0']){ ?>
					        		<img src="<?php echo $thumb['0']; ?>" alt="<?php echo get_the_title($p->ID); ?>"/>
					        	<?php } ?>
					            <p><?php echo get_the_title($p->ID); ?></p>			            
					        </li>
					    <?php endforeach; ?>
					    </ul>
					    
					<?php endif; ?>					
					</div>
				<?php } ?>

				<div class="qty">
					<p>Place restante</p>
					<?php echo round($product->stock); ?>
				</div>

				<a class="bouton" href="<?php echo get_permalink(); ?>">S'inscrire</a>
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