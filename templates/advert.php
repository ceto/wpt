    <section class="advert-block" 
      <?php if ( (is_single() || is_page()) && has_post_thumbnail() ) :  ?>
      <?php
        $fimi = (is_page())?wp_get_attachment_image_src(get_post_thumbnail_id(),'banner169'):wp_get_attachment_image_src(get_post_thumbnail_id(),'banner21');
      ?>
      style="background-image:url(<?php echo $fimi[0]; ?>)"
      <?php endif; ?>
    >
      <div class="trapezoid"></div>
      <?php if (is_single() ) : ?>
      <div class="ferde-row">
        <div class="left">
          <p class="title ptitle">News & Events</p>
          <p class="desc"> <?php get_template_part('templates/entry-meta' ); ?></p>
          <a href="#" class="btn">Nahere infos here</a>
        </div>
        <div class="center"></div>
        <div class="right">
         <?php the_title(); ?>
        </div>
      </div>
    <?php else : ?>
      <div class="ferde-row">
        <div class="left">
          <p class="title">Grillfest</p>
          <p class="desc">am 15.10.2013 bei uns</p>
          <a href="#" class="btn">Nahere infos here</a>
        </div>
        <div class="center"></div>
        <div class="right">
          Lorem ipsum<br />adipisicing elit.
        </div>
      </div>
    <?php endif; ?>
      <p class="signo">Bauparzellen • Doppelhauser • Wohnungen</p>
    </section>