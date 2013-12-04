<?php while (have_posts()) : the_post(); ?>
  <section class="chooser">
    <img src="<?php echo get_template_directory_uri();  ?>/assets/img/overbanner.jpg" alt="Chooser">
  </section>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <figure class="entry-figure">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('large'); ?>
      </a>
    </figure>
    <section class="details">
      <ul class="nav nav-tabs" id="custom-tabs-65">
        <li class="active"><a href="#custom-tab-0-lorem-ipsum" data-toggle="tab">Lorem ipsum</a></li>
        <li><a href="#custom-tab-0-integer-posuere-erat" data-toggle="tab">Integer</a></li>
        <li><a href="#custom-tab-0-dapibus-posuere" data-toggle="tab">Dapibus</a></li>
      </ul>
      <div class="tab-content">
        <div id="custom-tab-0-lorem-ipsum" class="tab-pane fade active in">
        <p>Sed posuere consectetur est at lobortis. Nulla vitae elit libero, a pharetra augue. Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Vestibulum id ligula porta felis euismod semper.</p>
        <p>Cras mattis consectetur purus sit amet fermentum. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Curabitur blandit tempus porttitor.</p>
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
