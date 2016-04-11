<section class="sidebar">
  <article class="sidebar__content">
    <h3>Ultimas noticias</h3>
    <?php if ( have_posts() ) : $i = 1; while (have_posts() && $i < 6) : the_post(); ?>
    <ul>
      <li>
        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?>
        </a><br>
        Escrito por <?php the_author_posts_link() ?> -
        <?php the_date( get_option( 'date_format' ) ); ?>
      </li>
    </ul>
    <?php $i++; endwhile; else: ?>
    <p>Lo siento, no encontre nada para mostrar.</p>
    <?php endif; ?>
  </article>
</section><!-- end of sidebar -->