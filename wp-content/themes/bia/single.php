<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="container-single">
    <?php if(get_field('nouvelles_ou_article')){
		if(get_field('nouvelles_ou_article') == 'nouvelles'){ ?>
		<span class="encadre"><?php echo _e('Nouvelles','bia'); ?></span>
	<?php }else{ ?>
		<span class="encadre"><?php echo _e('Articles','bia'); ?></span>
	<?php }
	} ?>

	<p class="author"><? echo get_avatar($post->post_author); ?><?php echo _e('Par ','bia'); ?><?php echo get_the_author(); ?></p>
    <h3><?php the_title(); ?></h3>
    </div>
    <div id="page-builder" class="entry-content">
      <?php

		// check if the repeater field has rows of data
		if( have_rows('page_builder') ):

		 	// loop through the rows of data
		    while ( have_rows('page_builder') ) : the_row();

		        // display a sub field value
		        $sectionType = get_sub_field('section_type');

		        if($sectionType == 'text'){
		        	get_template_part('templates/page-builder-text');
		        }else{
		        	if($sectionType == 'image'){
		        		get_template_part('templates/page-builder-image');
		        	}else{
		        		get_template_part('templates/page-builder-link');
		        	}		        	
		        }

		    endwhile;
		endif;

		?>
    </div>
    
  </article>
<?php endwhile; ?>
