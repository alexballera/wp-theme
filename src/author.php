<?php get_header(); ?>
<!-- Header -->
<header class="header taxonomy">
  <h1 class="taxonomy__title"><?php _e( 'Autor: ', 'portfolio-one' ); ?><?php echo get_the_author(); ?></h1>
  <?php echo get_avatar( get_the_author_meta('ID'), $size = '150'); ?>
  <div class="taxonomy__description">
    <?php the_author_meta( 'description' ); ?>
  </div>
</header>
<!-- Fin de Header -->
<!-- Contenido -->
<section class="content">
  <div class="container">
    <div class="content__container">
      <!-- Servicios, Proyectos & Art&#237;culos -->
      <!-- Art&#237;culos -->
      <article id="content_articles" class="content__articles content__articles--background">
        <div class="container">
          <div id="articles"></div>
          <h2 class="content__articles--title title">Disfruta de los art&#237;culos de <?php echo get_the_author(); ?></h2>
          <?php get_template_part('/templates/content'); ?>
        </div>
      </article>
      <?php get_sidebar(); ?>
      <!-- Fin de Art&#237;culos -->
      <!-- Fin de Servicios, Proyectos & Art&#237;culos -->
    </div>
  </div>
  <?php get_template_part('/templates/form'); ?>
</section>
<!-- Fin del Contenido -->
<?php get_footer(); ?>