<?php get_header(); ?>
<!-- Header -->
<header class="header taxonomy">
  <h1 class="taxonomy__title">Resultados de tu b&#250;squeda: <?php the_search_query(); ?></h1>
</header>
<!-- Fin de Header -->
    <!-- Contenido -->
        <section class="content">
            <div class="container">
            <div class="content__container">
              <div class="content__container--inner">
                <!-- Servicios, Proyectos & Art&#237;culos -->
                      <!-- Art&#237;culos -->
                            <h2 class="content__articles--title title">Disfruta de los art&#237;culos de <?php the_search_query(); ?></h2>
                            <article id="content_articles" class="content__articles">
                                <?php get_template_part('/templates/content'); ?>
                            </article>
                      <!-- Fin de Art&#237;culos -->
                <!-- Fin de Servicios, Proyectos & Art&#237;culos -->
              </div>
               <?php get_sidebar(); ?>
               </div>
            </div>
        </section>
    <!-- Fin del Contenido -->
    <?php get_template_part('/templates/searchgoogle'); ?>
    <?php get_template_part('/templates/form'); ?>
    <?php get_footer(); ?>