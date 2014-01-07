<?php
/*
Template Name: Apartment Chooser Start Template
*/
?>
<?php
  //global $query_string;
  query_posts( $query_string . '&orderby=date&order=ASC&posts_per_page=-1' );
  $term_id = term_exists( get_query_var( 'term' ) );
  //$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
?>

<div class="head-lead">
  <?php 

    $ima = get_tax_meta( $term_id ,'_meta_image');
    $imci = wp_get_attachment_image_src( $ima[id], 'banner169');

    $actual_term = get_term( $term_id, 'object' );
    $parent_term = get_term( $actual_term->parent, 'object' );
    $term_children = get_term_children( $parent_term->term_id, 'object' );

  ?>
  <div class="page-header">
    <?php the_content(); ?>
    <h1>Wohnungen Navigator
      <small>
      <?php if ($parent_term->term_id!=0) : ?>
        <?php echo $parent_term->name; ?>
        <span class="icon icon-arrow-right"></span>
      <?php endif; ?>
      <?php echo roots_title(); ?>
      </small>
    </h1>
  </div>
  <?php 
    $the_text = new WP_Query( array(
      'post_type' => 'page',
      'page_id' => '8'
    ));
    
    $the_text->the_post();
    the_content();
  ?>

</div><!-- /.head-lead -->
<ul class="nav nav-tabs ch-tabs">
<?php 
  foreach ( $term_children as $child_id ) {
    if ($child_id!=$actual_term->term_id) {
      $term = get_term_by( 'id', $child_id, 'object' );
      echo '<li><a class="toggle-side nav-tab" href="' . get_term_link( $child_id, 'object' ) . '">' . $term->name . '</a></li>';
    } else {
      $term = get_term_by( 'id', $child_id, 'object' );
      echo '<li class="active"><a class="toggle-side nav-tab" href="' . get_term_link( $child_id, 'object' ) . '">' . $term->name . '</a></li>';
    }
  }
?>
</ul>
<div id="apartment-chooser" class="apartment-chooser" style="background-image:url('<?php echo $imci[0]; ?>')">
</div>

<div class="data-table">
<?php while (have_posts()) : the_post(); ?>
  <a id="ap-<?php echo $post->ID; ?>" 
    class="data-row status-<?php echo get_post_meta( $post->ID, '_meta_status', true ); ?>"
    href="<?php the_permalink(); ?>"
    data-svg="<?php echo get_post_meta( $post->ID, '_meta_svgdata', true ); ?>"
    data-url="<?php the_permalink(); ?>"
    data-name="<?php the_title(); ?>"
    data-wnf="<?php echo get_post_meta( $post->ID, '_meta_wnf', true ); ?>"
    data-price="<?php echo number_format(get_post_meta( $post->ID, '_meta_price', true ), 0, ',', ' '); ?> EUR"
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