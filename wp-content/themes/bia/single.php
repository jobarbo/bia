<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="container-single" data-bottom-top="opacity:0;transform:translateY(-30px)" data-center="opacity:1;transform:translateY(0px)">
   	<?php if(is_singular('faq-article')){ ?>
   		<a href="<?php echo get_permalink(132); ?>?return=1" class="bouton"><?php echo _e('< Revenir au FAQ','bia'); ?></a>
   	<?php }else{ ?>
   		<a href="<?php echo get_permalink(130); ?>?return=1" class="bouton"><?php echo _e('< Revenir au blog','bia'); ?></a>
   	<?php } ?>
    <?php if(get_field('nouvelles_ou_article')){
		if(get_field('nouvelles_ou_article') == 'nouvelles'){ ?>
		<span class="encadre"><?php echo _e('Nouvelles','bia'); ?></span>
	<?php }else{ ?>
		<span class="encadre"><?php echo _e('Articles','bia'); ?></span>
	<?php }
	} ?>

	<?php if(!is_singular('faq-article')){ ?>
   		<p class="author"><? echo get_avatar($post->post_author); ?><?php echo _e('Par ','bia'); ?><?php echo get_the_author(); ?></p>
   	<?php } ?>

	
    <h3><?php the_title(); ?></h3>
    </div>
    <div id="page-builder" class="entry-content" >
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

    <?php
	  $urlEncode = rawurlencode(get_permalink());
	?>

     <a class="bouton share" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $urlEncode; ?>&t=bia formations - <?php the_title(); ?>"
               onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
               target="_blank" title="Partager sur Facebook" ><?php echo _e('Partager sur facebook','bia'); ?></a>
  </article>
  <?php comments_template('/templates/comments.php'); ?>
<?php endwhile; ?>
