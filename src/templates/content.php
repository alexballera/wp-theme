<div id="articles"></div>
<!-- Inicio de los Art&#237;culos -->
  <?php if ( have_posts() ) : ?>
  <h2 class="content__articles--title title">&#191;Qu&#233; quieres aprender hoy?</h2>
<div class="content__articles--container">
  <?php while ( have_posts() ) : the_post(); ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class( 'content__articles--post' ); ?>>
    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" target="_blank">
      <section>
          <?php the_post_thumbnail( $size='thumbnail' ); ?>
        <h3 class="content__articles--post--title"><?php the_title(); ?></h3>
      </section>
    </a>
    <section class="content__articles--post--footer">
      <i class="fa fa-user"><?php the_author_posts_link() ?></i>
      <i class="fa fa-calendar"><?php the_date( get_option( 'date_format' ) ); ?></i>
    </section>
  </div>
  <?php endwhile; ?>
  <?php wp_link_pages(); ?>
  <div class="navigation"><?php wp_pagenavi(); ?></div>
  <?php endif; ?>
</div>
<!-- Fin de los Art&#237;culos -->
