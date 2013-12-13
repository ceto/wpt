<?php while (have_posts()) : the_post(); ?>
  <div class="pri-cont">
    <?php the_content(); ?>
  </div>
  <?php if (get_post_meta( $post->ID, '_cmb_test_wysiwyg', true )!='') :?>
    <div class="sec-cont">
       <?php echo wpautop( get_post_meta( $post->ID, '_cmb_test_wysiwyg', true ) ); ?> 
    </div>
  <?php endif; ?>
  <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
<?php endwhile; ?>
