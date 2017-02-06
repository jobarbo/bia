<?php /* Template Name: Page Formations */ ?>
<div id="filtres" class="container-fluid" data-bottom-top="opacity:0;transform:translateY(-30px)" data-center="opacity:1;transform:translateY(0px)">
	<div class="row">
		<div class="col-sm-12">
			<h4><?php echo _e('Filtres','bia'); ?></h4>
		</div>
	</div>
	<div class="row white-bloc" data-bottom-top="opacity:0;" data-center="opacity:1;">
		

		<?php
			if(isset($_GET['ville'])){
				$ville = $_GET['ville'];
			}else{
				$ville = '';
			}

			if(isset($_GET['formateurs'])){
				$formateurs = $_GET['formateurs'];
				$toListFormation = 1;
			}else{
				$formateurs = '';
				$toListFormation = 0;
			}

			if(isset($_GET['interets'])){
				$interets = $_GET['interets'];
			}else{
				$interets = '';
			}

			if(isset($_GET['type'])){
				$type = $_GET['type'];
			}else{
				$type = '';
			}

			$arrVille = explode('-',$ville);
			$arrFormateurs = explode('-', $formateurs);
			$arrInterets = explode('-', $interets);
			$arrType = explode('-', $type);

		?>

		<form id="form-filtres">
			<input id="ville-input" type="text" name="ville" value="<?php echo $ville; ?>"/>
			<input id="formateurs-input" type="text" name="formateurs" value="<?php echo $formateurs; ?>"/>
			<input id="interets-input" type="text" name="interets" value="<?php echo $interets; ?>"/>
			<input id="type-input" type="text" name="type" value="<?php echo $type; ?>"/>
			
		</form>

		<div class="section-filtre col-sm-3">
			<button data-filtre="ville">Ville</button>
		</div>
		<div class="section-filtre col-sm-3">
			<button data-filtre="formateurs">Formateurs</button>
		</div>
		<div class="section-filtre col-sm-3">
			<button data-filtre="interets">Intérêts</button>
		</div>
		<div class="section-filtre col-sm-3">
			<button data-filtre="type" >Types de formations</button>
		</div>
		<div id="ville" class="col-sm-12 list-filtre">
		<?php
				$terms = get_terms( array(
				    'taxonomy' => 'pa_ville'
				) );

				?>
				<div class="row">
				<?php foreach($terms as $term){ ?>
					
					<?php
						
						if(in_array($term->term_id,$arrVille)){
							$activeVille  = 'active';
						}else{
							$activeVille  = '';
						}

					?>

					<div class="col-sm-3 list-item single-option <?php echo $activeVille; ?>" data-input="ville-input" data-id="<?php echo $term->term_id ?>"><?php echo $term->name; ?></div>
				<?php } ?>
				</div>
		</div>
		<div id="formateurs" class="col-sm-12 list-filtre">
		<?php $loop = new WP_Query( array( 'post_type' => 'formateur', 'posts_per_page' => -1 ) ); ?>
			<div class="row">
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php

						if(in_array(get_the_id(),$arrFormateurs)){
							$activeFormateurs  = 'active';
						}else{
							$activeFormateurs  = '';
						}

					?>
					<div  class="col-sm-3 list-item <?php echo $activeFormateurs; ?>" data-input="formateurs-input" data-id="<?php echo get_the_id(); ?>"><?php echo get_the_title(); ?></div>
				<?php endwhile; wp_reset_query(); ?>
			</div>
		</div>
		<div id="interets" class="col-sm-12 list-filtre">
		<?php
				$terms = get_terms( array(
				    'taxonomy' => 'pa_interets'
				    
				) );

				?>
				<div class="row">
				<?php foreach($terms as $term){ ?>
					<?php

						if(in_array($term->term_id,$arrInterets)){
							$activeInterets  = 'active';
						}else{
							$activeInterets  = '';
						}

					?>
					<div class="col-sm-3 list-item <?php echo $activeInterets; ?>" data-input="interets-input" data-id="<?php echo $term->term_id ?>"><?php echo $term->name; ?></div>
				<?php } ?>
				</div>
		</div>
		<div id="type" class="col-sm-12 list-filtre">			
			<?php
				$terms = get_terms( array(
				    'taxonomy' => 'pa_type-de-formation'
				    
				) );

				?>
			<div class="row">
			<?php foreach($terms as $term){ ?>
				<?php
						
						if(in_array($term->term_id,$arrType)){
							$activeType  = 'active';
						}else{
							$activeType  = '';
						}

					?>
				<div class="col-sm-3 list-item <?php echo $activeType; ?>" data-input="type-input"  data-id="<?php echo $term->term_id ?>"><?php echo $term->name; ?></div>
			<?php } ?>
			</div>
		</div>
		<span class="clear"></span>
		<hr>
		<button id="btFiltres">Soumettre</button>
	</div>

</div>

<?php 

	$ville = $_GET['ville'];
	$interets = $_GET['interets'];
	$type = $_GET['type'];

	$tax_query = array(        array(
            'taxonomy'  => 'product_cat',
            'field'     => 'id', 
            'terms'     => 7
        ));

	if($ville || $interets || $type){
		
		if($ville){
			$selectedVille = array(
				'taxonomy' => 'pa_ville',
				'field' => 'term_id',
				'terms' => $ville);

			array_push($tax_query, $selectedVille);
		}

		if($type){
			$typeArray = explode('-', $type);
			$selectedType = array(
				'taxonomy' => 'pa_type-de-formation',
				'field' => 'term_id',
				'terms' => $typeArray);

			array_push($tax_query, $selectedType);
		}

		if($interets){
			$interetArray = explode('-', $interets);
			$selectedInterets = array(
				'taxonomy' => 'pa_interets',
				'field' => 'term_id',
				'terms' => $interetArray);

			array_push($tax_query, $selectedInterets);
		}
	}

?>


<div id="list-formations" class="container-fluid" data-to-list-formation="<?php echo $toListFormation; ?>">

	<?php 
	global $product;


	$loop = new WP_Query( array( 'post_type' => 'product', 'posts_per_page' => -1, 'order'=>'ASC', 'tax_query' =>  $tax_query,  'orderby' => 'meta_value',
	'meta_key' => 'date_de_la_formation') ); ?>


    <?php // Gestion des rows 
    	$cpt = 0; 
    ?>
	
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>	
		
		<?php //Gestion des formateurs (visible ou pas en fonction des formateurs sélectionnés) 

		if(isset($_GET['formateurs']) && $_GET['formateurs'] !== ''){
			
			$visible = false;			
			$posts = get_field('list_form');
			

			if( $posts ):
				foreach( $posts as $p):
					if($visible == false){

						$currentFormateur = $_GET['formateurs'];
						$arrFormateurs = explode('-',$_GET['formateurs']);
						
						if(in_array($p->ID,$arrFormateurs)){
							$visible = true;						
						}

					}
				endforeach;					    
					    
			 endif;

		}else{
			$visible = true;
		} 

		?>


		<?php if($visible == true){ ?>
			
		<?php
			if($cpt == 0){
				echo '<div class="row" data-bottom-top="opacity:0;transform:translateY(-30px)" data-center="opacity:1;transform:translateY(0px)">';
			}else{
				if($cpt%3 == 0){
					echo "</div>";
					echo '<div class="row" data-bottom-top="opacity:0;transform:translateY(-30px)" data-center="opacity:1;transform:translateY(0px)">';
				}
			}

		?>

		<?php
			if(round($product->stock) == 0){
				$location = '';
			}else{
				$url =  "'".get_permalink()."'";
				$location = "onclick='window.location.href=$url'";
			}

		?>

		<div class="formation col-md-4" <?php if($location !== ''){ ?> onclick="window.location.href=<?php echo $url; ?>"	<?php } ?>>
			<div class="content">
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
					<?php
						if(current_user_can('manage_options')){
							if(get_field('date_fin_formation')){
								echo '<br/>au '.get_field('date_fin_formation');
							}
						}
					?>
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
				
				<?php
					if(round($product->stock) <= 3){ ?>
				<div class="qty">
					<p><?php echo _e('Places restantes','bia'); ?></p>
					<?php
						echo round($product->stock);
					?>
				</div>
				<?php } ?>
				<?php
					if(round($product->stock) == 0){ ?>
						<a href="mailto:info@biaformations.com" class="bouton"><?php echo _e("Écrivez-nous pour vous</br>inscrire sur la liste d'attente",'bia'); ?></a>
					<?php }else{ ?>
						<a class="button" href="<?php echo get_permalink(); ?>"><?php echo _e('En savoir plus','bia'); ?></a>
					<?php }	?>
				<span class="clear"></span>
			</div>
		</div>	

		<?php $cpt++; ?>
		<?php } ?>

	<?php endwhile;  ?>
	
	
	<?php if($cpt !== 0){ ?>
		</div>
	<?php } ?>

	<?php if(!$loop->have_posts()){ ?>
		<div class="row">
			<div class="formation no-formation">
				<div class="content">
					<p><?php echo _e("Malheureusement, il n’y a pas de résultat à votre recherche.",'bia'); ?></p>
					<a href="<?php echo get_permalink(122); ?>" class="bouton"><?php echo _e("< Retour à la liste complète des formations",'bia'); ?></a>

				</div>
			</div>	
		</div>		
	<?php } ?>

	<?php wp_reset_query(); ?>

</div>
<div class="sur-demande" class="row"  data-bottom-top="opacity:0;transform:translateY(-30px)" data-center="opacity:1;transform:translateY(0px)">
		<div class="row-sm-height">
			<div class="col-sm-6 col-sm-height col-sm-middle">
				<img src="<?php echo get_field('image_sur_mesure'); ?>" alt="Formation sur demande" />
			</div>
			<div class="col-sm-6 col-sm-height col-sm-middle">
			<?php $arrPost = get_field('lien_article'); ?>
				<div class="content-sur-demande">
					<h4 class="titreSection"><?php echo get_field('titre_sur_mesure_1'); ?></h4>
					<p><?php echo get_field('texte_sur_mesure'); ?></p>
					<!--a class="bouton white" href="<?php echo get_permalink($arrPost[0]); ?>"><?php echo _e('Proposer votre formation','bia'); ?></a-->
					<a class="bouton white" href="mailto:info@biaformations.com"><?php echo _e('Proposer votre formation','bia'); ?></a>
				</div>
			</div>
		</div>
		<span class="clear"></span>
	</div>