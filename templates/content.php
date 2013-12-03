<article <?php post_class(); ?>>
  <?php if (has_post_thumbnail()) : ?>
    <figure class="entry-figure">
      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
    </figure>
  <?php endif; ?>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
