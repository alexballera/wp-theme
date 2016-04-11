<?php get_header(); ?>
<!-- Header -->
<header class="header taxonomy">
  <?php if ( is_tag() ) : ?>
  <h1 class="taxonomy__title">Etiqueta: <?php single_tag_title(); ?></h1>
  <?php add_filter('tag_description', 'wpautop'); ?>
  <?php add_filter('tag_description', 'wptexturize'); ?>
  <div class="taxonomy__description">
    <?php echo tag_description(); ?>
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
          <h2 class="content__articles--title title">Disfruta de los art&#237;culos de <?php single_tag_title(); ?></h2>
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
<?php endif; ?>
<?php get_footer(); ?>