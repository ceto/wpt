<?php $classmod=(get_post_meta( $post->ID, '_cmb_test_wysiwyg', true )!='')?'dupla':'szimpla'; ?>
<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class($classmod); ?>>
    <!-- header>
      <h1 class="entry-title"><?php the_title(); ?></h1>

      <?php get_template_part('templates/entry-meta'); ?>
    </header -->
    <div class="entry-add">
      <?php if ($classmod=='dupla') :  ?>
       <?php echo do_shortcode(get_post_meta( $post->ID, '_cmb_test_wysiwyg', true )); ?>
      <?php else : ?>
        <?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium11');  ?>
        <a href="<?php echo $imgsrc[0]; ?>" class="popup-zoom">
          <?php the_post_thumbnail('medium11'); ?>
        </a>
      <?php endif;  ?>
    </div>

    <div class="entry-content">
      <h1 class="entry-title"><?php the_title() ?></h1>
       <?php the_content(); ?>
      <a class="backtotheblog" href="<?php echo get_permalink(16); ?>">Zur Übersicht</a>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php //  comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
