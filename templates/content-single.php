<?php $classmod=(get_post_meta( $post->ID, '_cmb_test_wysiwyg', true )!='')?'dupla':'szimpla'; ?>
<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class($classmod); ?>>
    <!-- header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header -->
    <?php if ($classmod=='dupla') :  ?>
      <div class="entry-add">
       <?php echo do_shortcode(get_post_meta( $post->ID, '_cmb_test_wysiwyg', true )); ?>
      </div>
    <?php endif;  ?>
    <div class="entry-content">
      <?php the_content(); ?>
      <a class="backtotheblog" href="<?php echo get_permalink(16); ?>">Zur Übersicht</a>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php //  comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
