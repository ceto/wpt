    <section class="nagyfej-block" 
      <?php if ( is_page() && has_post_thumbnail() ) :  ?>
      <?php
        $fimi = (is_page())?wp_get_attachment_image_src(get_post_thumbnail_id(),'banner169'):wp_get_attachment_image_src(get_post_thumbnail_id(),'banner21');
      ?>
      style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/flower.png), url(<?php echo $fimi[0]; ?>)"
      <?php endif; ?>
    >
      <div class="trapezoid"></div>
      <?php 
        $wopt=get_option('my_option_name');
      ?>
      <div class="ferde-row">
        <div class="left">
          <p class="title"><?php echo $wopt['title']; ?></p>
          <p class="desc"><?php echo $wopt['subtitle'] ; ?></p>
          <a href="<?php echo $wopt['button_url'] ; ?>" class="btn"><span><?php echo $wopt['button_text'] ; ?></span></a>
        </div>
        <div class="center"></div>
        <div class="right">
          <span class="icon-tram"></span> 18 min. nach Wien<br />
          <span class="icon-tree"></span> 2 min. ins grüne
        </div>
      </div>

      <p class="signo"><a href="<?php echo get_permalink(10); ?>">Bauparzellen</a> • <a href="<?php echo get_permalink(109); ?>">Doppelhäuser</a> • <a href="#">Wohnungen</a></p></p>
    </section>