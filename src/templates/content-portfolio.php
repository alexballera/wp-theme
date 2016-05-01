<!-- Inicio de los Art&#237;culos -->
<div class="content__articles--container">
<?php
  $args= array(
  'posts_per_page' => 9999,
  'post_type' => 'Portfolio'
  );
  query_posts($args);
  if ( have_posts() ) : ?>
<div id="projects"></div>
<h2 class="content__articles--title title">Conoce un poco de los proyectos que he realizado y en los que he participado</h2>

 <?php while ( have_posts() ) : the_post();
?>
  <div id="post-<?php the_ID(); ?>" <?php post_class( 'content__articles--post' ); ?>>
    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" target="_blank">
        <section>
            <?php the_post_thumbnail('portfolioitem'); ?>
            <h3 class="content__articles--post--title"><?php the_title(); ?></h3>
        </section>
    </a>
  </div>
  <?php endwhile; ?>
  <?php wp_link_pages(); ?>
  <?php the_posts_pagination(); ?>
  <div class="navigation"><?php wp_pagenavi(); ?></div>
  <?php endif; ?>
</div>
<!-- Fin de los Art&#237;culos -->