<?php while (have_posts()) : the_post(); ?>
  <section class="chooser">
    <img src="<?php echo get_template_directory_uri();  ?>/assets/img/overbanner.jpg" alt="Chooser">
  </section>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title">Navigator<small><?php the_title(); ?></small></h1>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <section class="panel">
      <figure class="entry-plan">
        <?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large');  ?>
        <a class="popup-zoom" href="<?php echo $imgsrc[0]; ?>">
          <?php the_post_thumbnail('large'); ?>
        </a>
      </figure>
      <div class="action-block">
        <h2><?php the_title(); ?></h2>
        <div class="action-buttons">
          <a href="<?php echo get_post_meta($post->ID, '_meta_pdf', true); ?>" class="btn download"><span>D</span>Download grundris PDF</a>
          <a href="#" class="btn buy"><span>E</span>Anfrage</a>
        </div>
        <figure class="entry-floormap">
          <a class="popup-zoom" href="<?php echo get_post_meta($post->ID, '_meta_floormap', true); ?>">
              <img src="<?php echo get_post_meta($post->ID, '_meta_floormap', true); ?>" />
          </a>
        </figure>
      </div>
    </section>

    <section class="details">
      <ul class="nav nav-tabs" id="custom-tabs-65">
        <li class="active"><a href="#custom-tab-0-lorem-ipsum" data-toggle="tab">Details</a></li>
        <li><a href="#custom-tab-0-integer-posuere-erat" data-toggle="tab">Integer</a></li>
        <li><a href="#custom-tab-0-dapibus-posuere" data-toggle="tab">Dapibus</a></li>
      </ul>
      <div class="tab-content">
        <div id="custom-tab-0-lorem-ipsum" class="tab-pane fade active in data-list">
          <p class="data-item"><span>Wohnfläche</span> <?php echo get_post_meta( $post->ID, '_meta_wohn', true ); ?> m<sup>2</sup></p>
          <p class="price data-item"><span>Eigennutzer Kaufpreis</span> <?php echo number_format(get_post_meta( $post->ID, '_meta_price', true ), 0, ',', ' '); ?>,- EUR.</p>
          <p class="data-item"><span>Beziehbar</span> <?php echo get_post_meta( $post->ID, '_meta_status', true ); ?></p>
          <p class="data-item"><span>Raumaufteilung</span> <?php echo get_post_meta( $post->ID, '_meta_raum', true ); ?></p>
          
          <p class="data-item"><span>Wohnfläche</span> <?php echo get_post_meta( $post->ID, '_meta_wohn', true ); ?> m<sup>2</sup></p>
          <p class="price data-item"><span>Eigennutzer Kaufpreis</span> <?php echo number_format(get_post_meta( $post->ID, '_meta_price', true ), 0, ',', ' '); ?>,- EUR.</p>
          <p class="data-item"><span>Beziehbar</span> <?php echo get_post_meta( $post->ID, '_meta_status', true ); ?></p>
          <p class="data-item"><span>Raumaufteilung</span> <?php echo get_post_meta( $post->ID, '_meta_raum', true ); ?></p>


        </div>
        <div id="custom-tab-0-integer-posuere-erat" class="tab-pane fade ">
        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Maecenas sed diam eget risus varius blandit sit amet non magna. Nulla vitae elit libero, a pharetra augue. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
        </div>
        <div id="custom-tab-0-dapibus-posuere" class="tab-pane fade ">
        <p>Vestibulum id ligula porta felis euismod semper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
        </div>
      </div>
    </section>  
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php //  comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
