<section class="sidebar">
  <?php dynamic_sidebar('sidebar-lateral'); ?>
  <article class="sidebar__content">
    <h3>&#218;ltimos art&#237;culos</h3>
    <ul>
    <?php if ( have_posts() ) : $i = 1; while (have_posts() && $i < 6) : the_post(); ?>
      <li>
        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?>
        </a>
        <?php the_date( get_option( 'date_format' ) ); ?>
      </li>
    <?php $i++; endwhile; else: ?>
    </ul>
    <p>Lo siento, no encontre nada para mostrar.</p>
    <?php endif; ?>
  </article>
</section><!-- end of sidebar -->