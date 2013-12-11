    <section class="advert-block" 
      <?php if ( (is_single() || is_page()) && has_post_thumbnail() ) :  ?>
      <?php
        $fimi = (is_page())?wp_get_attachment_image_src(get_post_thumbnail_id(),'banner169'):wp_get_attachment_image_src(get_post_thumbnail_id(),'banner21');
      ?>
      style="background-image:url(<?php echo $fimi[0]; ?>)"
      <?php endif; ?>
    >
      <div class="trapezoid"></div>
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
      <p class="signo">Bauparzellen * Doppelhauser * Wohnungen</p>
    </section>