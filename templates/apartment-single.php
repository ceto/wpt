<?php $obj_terms = wp_get_object_terms($post->ID, 'object', array (
   'orderby' => 'date',
   'order' => 'ASC',
   'fields' => 'all' 
  )
);
//$termi=$obj_terms[0]; 
?> 
<?php while (have_posts()) : the_post(); ?>
  <section class="chooser">
    <img src="<?php echo get_template_directory_uri();  ?>/assets/img/image_map_south.jpg" alt="Chooser">
  </section>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title">Navigator<small>
        <?php foreach ($obj_terms as $termi) {  ?>
        <a href="<?php echo ($termi->parent!=0)?get_term_link($termi->slug, 'object'):'#'; ?>">
                  <?php echo ($termi->parent!=0)?$termi->name:$termi->name; ?>
        </a><span class="icon icon-arrow-right"></span>
        <?php } ?>
        <?php the_title(); ?></small></h1>
        <a class="ch-back btn" href="<?php echo ($termi->parent!=0)?get_term_link($termi->slug, 'object'):'#'; ?>">
          <span class="icon icon-arrow-left"></span>
          Zurück
        </a>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <section class="panel">
      <figure class="entry-plan">
        
        <?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'largefree');  ?>
          <?php if ($imgsrc[0]!='') : ?>
            <a class="popup-zoom" href="<?php echo $imgsrc[0]; ?>">
              <?php the_post_thumbnail('largefree'); ?>
            </a>
          <?php else : ?>
            <a class="popup-zoom" href="http://placehold.it/600x600&text=Plan">
              <img src="http://placehold.it/600x600&text=Plan" alt="<?php the_title(); ?>">
            </a>
          <?php endif; ?>

      </figure>
      <div class="action-block">
        <h2><?php the_title(); ?></h2>
        <div class="deta">
          <div class="w"><span>Wnf: </span><?php echo get_post_meta( $post->ID, '_meta_wnf', true ); ?> m<sup>2</sup></div> 
          <div class="p"><?php echo number_format(get_post_meta( $post->ID, '_meta_price', true ), 0, ',', ' '); ?> EUR</div>
        </div>
        <figure class="entry-floormap">
          <?php if (get_post_meta($post->ID, '_meta_floormap', true)!='') : ?>
          <a class="popup-zoom" href="<?php echo get_post_meta($post->ID, '_meta_floormap', true); ?>">
              <img src="<?php echo get_post_meta($post->ID, '_meta_floormap', true); ?>" />
          </a>
          <?php else : ?>
            <a class="popup-zoom" href="http://placehold.it/600x300&text=Lage">
              <img src="http://placehold.it/600x300&text=Lage" alt="<?php the_title(); ?>">
            </a>
          <?php endif; ?>
        </figure>
          <div class="action-buttons">
            <a href="<?php echo get_post_meta($post->ID, '_meta_pdf', true); ?>" class="btn download"><span class="icon-download"></span>Download Grundriss PDF</a>
            <a href="<?php echo get_permalink(487); ?>?ap_id=<?php echo urlencode(get_the_title()); ?>" class="btn buy"><span class="icon-envelope"></span>Anfrage</a>
          </div>
      </div>
    </section>

    <section class="details">
      <ul class="nav nav-tabs" id="custom-tabs-65">
        <li class="active"><a href="#tab-facts" data-toggle="tab">Facts</a></li>
        <li><a href="#tab-lage" data-toggle="tab">Lage</a></li>
      </ul>
      <div class="tab-content">
        <div id="tab-facts" class="tab-pane fade active in data-list">
          <p class="data-item"><span>Wohnfläche</span> <?php echo get_post_meta( $post->ID, '_meta_wnf', true ); ?> m<sup>2</sup></p>
          <p class="price data-item"><span>Kaufpreis (exkl. Nebenkosten*)</span> <?php echo number_format(get_post_meta( $post->ID, '_meta_price', true ), 0, ',', ' '); ?> EUR</p>
          <p class="data-item"><span>Beziehbar</span> <?php echo get_post_meta( $post->ID, '_meta_status', true ); ?></p>
          <p class="data-item"><span>Lage</span> <?php echo get_post_meta( $post->ID, '_meta_lage', true ); ?></p>
          <?php if (get_post_meta( $post->ID, '_meta_balkon', true ) ) : ?>          
          <p class="data-item"><span>Balkon</span> <?php echo get_post_meta( $post->ID, '_meta_balkon', true ); ?> m<sup>2</sup></p>
          <?php endif; ?>
          <?php if (get_post_meta( $post->ID, '_meta_terasse', true ) ) : ?>
          <p class="data-item"><span>Terasse</span> <?php echo get_post_meta( $post->ID, '_meta_terasse', true ); ?> m<sup>2</sup></p>
          <?php endif; ?>          
          <?php if (get_post_meta( $post->ID, '_meta_garten', true ) ) : ?>
          <p class="data-item"><span>Garten</span> <?php echo get_post_meta( $post->ID, '_meta_garten', true ); ?> m<sup>2</sup></p>
          <?php endif; ?>
          <p class="data-item"><span>Tiefgarage</span><?php echo get_post_meta( $post->ID, '_meta_tg', true )?get_post_meta( $post->ID, '_meta_tg', true ).' m<sup>2</sup>':'NEIN'; ?></p>
          <p class="data-item"><span>Abstellplatz</span><?php echo get_post_meta( $post->ID, '_meta_ap', true )?get_post_meta( $post->ID, '_meta_ap', true ).' m<sup>2</sup>':'NEIN'; ?></p>
          <p class="data-item"><span>Keller</span><?php echo get_post_meta( $post->ID, '_meta_keller', true )?get_post_meta( $post->ID, '_meta_keller', true ).' m<sup>2</sup>':'NEIN'; ?></p>
        </div>
        <div id="tab-lage" class="tab-pane fade ">
        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Maecenas sed diam eget risus varius blandit sit amet non magna. Nulla vitae elit libero, a pharetra augue. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
        </div>
      </div>
      <div class="disclaimer">
        *Grunderwerbssteuer 3,5%, Vertragserrichtung und –abwicklung 1,8%, Eintragungsgebühr Grundbuch 1,1%, HWB: 27-28kWh/m<sup>2</sup>a
      </div>
    </section>  
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php //  comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
