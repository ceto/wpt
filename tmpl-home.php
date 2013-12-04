<?php
/*
Template Name: Home Template
*/
?>
<div class="intro">
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
</div><!-- /.intro -->
<div class="news-block">
  <h2 class="block-title"><?php _e('News & Events'); ?></h2>
  <?php
      $args = array(
        'post_type' => array( 'post' ),
        'posts_per_page'         => 3,
      );
    
    $query = new WP_Query( array(
      'post_type' => array( 'post' ),
      'posts_per_page' => 3,
    ));
  ?>
  <?php while ($query->have_posts()) : $query->the_post(); ?>
    <?php get_template_part('templates/content', get_post_format()); ?>
  <?php endwhile; ?>
</div><!-- /.news-block -->
