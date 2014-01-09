<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->


  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>
  <div class="minden">
  <div class="topwrap">
    <a href="#" class="menu-toggle"><span class="icon-menu"></span></a>
    <section class="btns">
      <a href="tel:0800221101" class="phone"><span class="icon-phone"></span>0800 / 22 11 01</a>
      <a href="http://www.wohnpark-tullnerfeld.at/kontaktanfrage/" class="mail"><span class="icon-mail"></span>JETZT ANFRAGEN</a>
    </section>

    <?php if ( ( is_singular() || is_home() ) && (!is_singular('apartment')) && (!is_page_template('tmpl-bauparzellen.php')) && (!is_page_template('taxonomy-object.php'))  ) : ?>
    <?php get_template_part('templates/advert'); ?>
    <?php endif; ?>

  <div class="wrap container" role="document">
    <div class="content row">
      <main class="main <?php echo roots_main_class(); ?>" role="main">
        <?php include roots_template_path(); ?>
      </main><!-- /.main -->
      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar clearfix <?php echo roots_sidebar_class(); ?>" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->

  </div><!-- /.topwrap -->

  <?php get_template_part('templates/footer'); ?>
  </div><!-- /.minden -->

</body>
</html>
