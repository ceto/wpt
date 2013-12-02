<header class="banner container" role="banner">
  <a class="brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
  <nav class="nav-main" role="navigation">
    <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-pills'));
      endif;
    ?>
  </nav>
  <section class="advert-block">
    <div class="ferde-row">
      <div class="left">
        <p class="title">Grillfest</p>
        <p class="desc">Numquam, maiores, cum nihil esed.</p>
        <a href="#" class="btn">Nahere infos here</a>
      </div>
      <div class="center"></div>
      <div class="right">
        Lorem ipsum<br />adipisicing elit.
      </div>
    </div>
    <p class="signo">Bauparzellen * Doppelhauser * Wohnungen</p>
  </section>
</header>
