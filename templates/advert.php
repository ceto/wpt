    <section class="nagyfej-block" 
      <?php if ( is_page() && has_post_thumbnail() ) :  ?>
      <?php
        $fimi = (is_page())?wp_get_attachment_image_src(get_post_thumbnail_id(),'banner169'):wp_get_attachment_image_src(get_post_thumbnail_id(),'banner21');
      ?>
      style="background-image:url(<?php echo $fimi[0]; ?>)"
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
          <span class="icon-tram"></span> 18 Min. nach Wien<br />
          <span class="icon-tree"></span> 2 Min. ins grüne
        </div>
      </div>

      <p class="signo"><a href="<?php echo get_permalink(691); ?>">Wohnungen</a> • <a href="<?php echo get_permalink(10); ?>">Bauparzellen</a> • <a href="<?php echo get_permalink(109); ?>">Häuser</a></p>
    </section>
    
    <section class="nagyfej-block mobile_version" 
      <?php if ( is_page() && has_post_thumbnail() ) :  ?>
      <?php
        $fimi = (is_page())?wp_get_attachment_image_src(get_post_thumbnail_id(),'banner169'):wp_get_attachment_image_src(get_post_thumbnail_id(),'banner21');
      ?>
      style="background-image:url(<?php echo $fimi[0]; ?>)"
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
        
        <p class="signo"><a href="#">Wohnungen</a> • <a href="<?php echo get_permalink(10); ?>">Bauparzellen</a> • <a href="<?php echo get_permalink(109); ?>">Häuser</a></p>
        
      </div>
      

    </section>
    <div class="mobile_version right">
          <span class="icon-tram"></span> 18 Min. nach Wien
          &nbsp;&nbsp;
          <span class="icon-tree"></span> 2 Min. ins grüne
      </div>