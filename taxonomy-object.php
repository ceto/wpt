<?php
  //global $query_string;
  query_posts( $query_string . '&orderby=date&order=ASC&posts_per_page=-1' );
  $term_id = term_exists( get_query_var( 'term' ) );
  //$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
?>

<div class="head-lead">
  <?php get_template_part('templates/page', 'header'); ?>
  <?php echo wpautop(get_tax_meta($term_id ,'_meta_content')); ?>
</div>

<?php 
  //print_r(get_tax_meta( $term_id ,'_meta_image'));
  $ima = get_tax_meta( $term_id ,'_meta_image');
  $imci = wp_get_attachment_image_src( $ima[id], 'banner169');
?>
<img class="csimg" src="<?php echo $imci[0]; ?>" alt="">


<div class="data-table">
<?php while (have_posts()) : the_post(); ?>
  <a id="ap-<?php echo $post->ID; ?>" 
    class="data-row status-<?php echo get_post_meta( $post->ID, '_meta_status', true ); ?>"
    href="<?php the_permalink(); ?>"
    data-svg="<?php echo get_post_meta( $post->ID, '_meta_svgdata', true ); ?>"
    data-url="<?php the_permalink(); ?>"
    data-status="<?php echo get_post_meta( $post->ID, '_meta_status', true ); ?>"
  >
    <span class="data-cell title">
      <?php the_title(); ?>
    </span>
    <span class="data-cell lage"> 
        <?php echo get_post_meta($post->ID, '_meta_lage', true ); ?>
    </span>
    <span class="data-cell wnf"> 
        <?php echo get_post_meta($post->ID, '_meta_wnf', true ); ?> m<sup>2</sup>
    </span>
    <span class="data-cell price">
       <?php echo number_format(get_post_meta( $post->ID, '_meta_price', true ), 0, ',', ' '); ?> EUR
    </span>

    <span class="data-cell status status-<?php echo get_post_meta( $post->ID, '_meta_status', true ); ?>">
      <?php echo get_post_meta( $post->ID, '_meta_status', true ); ?>
    </span>

  </a><!-- /.data-row -->
<?php endwhile; ?>
</div>