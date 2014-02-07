<?php while (have_posts()) : the_post(); ?>
  <div class="head-lead">
    <?php get_template_part('templates/page', 'header'); ?>
    <div class="pri-cont">
      <?php the_content(); ?>
    </div>
  </div>
<?php endwhile; ?>
<div id="bau-chooser" class="bau-chooser">
</div>
<div class="bau-data">
  <?php
    $the_bau = new WP_Query(array(
      'post_type'=>'bauparzellen',
      'posts_per_page'=>-1
    ));
  ?>
  <?php while ($the_bau->have_posts()) : $the_bau->the_post(); ?>
  <?php $nupri=get_post_meta( $post->ID, '_meta_price', true )?get_post_meta( $post->ID, '_meta_price', true ):'0'; ?>
    <p id="ap-<?php echo $post->ID; ?>" 
      class="datacont ap-list status-<?php echo get_post_meta( $post->ID, '_meta_status', true ); ?>"
      data-svg="<?php echo get_post_meta( $post->ID, '_meta_svgdata', true ); ?>"
      data-link="<?php echo get_post_meta( $post->ID, '_meta_link', true ); ?>"
      data-status="<?php echo get_post_meta( $post->ID, '_meta_status', true ); ?>"
      data-size="<?php echo get_post_meta( $post->ID, '_meta_size', true ); ?>"
      data-price="<?php echo number_format($nupri, 0, ',', ' '); ?>,- EUR"
      data-name="<?php the_title(); ?>"
      data-permalink="<?php the_permalink(); ?>"
    >
    <a href="<?php the_permalink(); ?>">
      <?php the_title(); ?>
        <span class="status status-<?php echo get_post_meta( $post->ID, '_meta_status', true ); ?>">
          <?php echo get_post_meta( $post->ID, '_meta_status', true ); ?>
        </span>
      <span>
        <?php echo number_format($nupri, 0, ',', ' '); ?>,- EUR | 
        <?php echo get_post_meta( $post->ID, '_meta_size', true ); ?> m<sup>2</sup>
      </span>
    </a></p>
  <?php endwhile; ?>
</div>
<?php wp_reset_query(); ?>
  <?php if (get_post_meta( $post->ID, '_cmb_test_wysiwyg', true )!='') :?>
  <div class="sec-cont">
    <?php echo wpautop( get_post_meta( $post->ID, '_cmb_test_wysiwyg', true ) ); ?> 
  </div>
<?php endif; ?>
