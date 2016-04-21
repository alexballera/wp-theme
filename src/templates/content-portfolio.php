<!-- Inicio de los Art&#237;culos -->
<div class="content__articles--container">
<?php
  $args= array(
  'posts_per_page' => 9999,
  'post_type' => 'Portfolio'
  );
  query_posts($args);
  if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
  <div id="post-<?php the_ID(); ?>" <?php post_class( 'content__articles--post' ); ?>>
    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" target="_blank">
        <section>
            <?php the_post_thumbnail('portfolioitem'); ?>
            <h3 class="content__articles--post--title"><?php the_title(); ?></h3>
        </section>
    </a>
       <!--  <section class="content__articles--post--footer">
      <i class="fa fa-user"><?php the_author_posts_link() ?></i>
      <i class="fa fa-calendar"><?php the_date( get_option( 'date_format' ) ); ?></i>
    </section> -->
  </div>
  <?php endwhile; ?>
  <?php wp_link_pages(); ?>
  <?php the_posts_pagination(); ?>
  <div class="navigation"><?php wp_pagenavi(); ?></div>

  <?php else: ?>
  <p>Lo siento, no encontre nada para mostrar.</p>
  <?php endif; ?>
</div>
<!-- Fin de los Art&#237;culos -->