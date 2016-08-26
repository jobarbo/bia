<?php if(comments_open()){ ?>
<div id="comments" class="row">
<h4 class="title-comments titreSection"><?php echo _e('Commentaires','bia'); ?></h4>
<section class="comments col-sm-10 col-sm-push-1">

  <div id="comments-content">
  <?php if (have_comments()) : ?>
    <ul class="comment-list">
      <?php wp_list_comments(['style' => 'ul', 'short_ping' => true]); ?>
    </ul>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
      <nav>
        <ul class="pager">
          <?php if (get_previous_comments_link()) : ?>
            <li class="previous"><?php previous_comments_link(__('&larr; Older comments', 'sage')); ?></li>
          <?php endif; ?>
          <?php if (get_next_comments_link()) : ?>
            <li class="next"><?php next_comments_link(__('Newer comments &rarr;', 'sage')); ?></li>
          <?php endif; ?>
        </ul>
      </nav>
    <?php endif; ?>
  <?php endif; // have_comments() ?>

  <?php comment_form(); ?>
  <span class="clear"></span>
  </div>
</section>
</div>
<?php } ?>