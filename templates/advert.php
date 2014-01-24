    <section class="nagyfej-block" 
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
          <p class="desc"><?php get_template_part('templates/entry-meta' ); ?></p>
          <a href="#" class="btn"><span>NÄHERE INFOS HIER</span></a>
        </div>
        <div class="center"></div>
        <div class="right">
         <?php the_title(); ?>
        </div>
      </div>
    <?php else : ?>
      <div class="ferde-row">
        <div class="left">
          <p class="title">Kommen Sie vorbei!</p>
          <p class="desc">24. - 26. Jänner</p>
          <a href="<?php echo get_permalink(601);  ?>" class="btn"><span>Zur Messe Tulln</span></a>
        </div>
        <div class="center"></div>
        <div class="right">
          <span class="icon-tram"></span> 18 min. nach Wien<br />
          <span class="icon-tree"></span> 2 min. ins grüne
        </div>
      </div>
    <?php endif; ?>
      <p class="signo"><a href="<?php echo get_permalink(10); ?>">Bauparzellen</a> • <a href="<?php echo get_permalink(109); ?>">Doppelhäuser</a> • <a href="#">Wohnungen</a></p></p>
    </section>