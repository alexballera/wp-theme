  <?php get_header(); ?>
        <!-- Header -->
        <header class="header taxonomy">
                <?php
                    the_archive_title( '<h1 class="taxonomy__title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy__description">', '</div>' );
                ?>
        </header>
    <!-- Fin de Header -->
    <!-- Contenido -->
        <section class="content">
            <div class="container">
              <div class="content__container">
              <div class="breadcrumb"><?php the_breadcrumb(); ?></div>
                <!-- Servicios, Proyectos & Art&#237;culos -->
                      <!-- Art&#237;culos -->
                            <article id="content_articles" class="content__articles content__articles--background">
                                  <div class="container">
                                        <div id="articles"></div>
                                        <h2 class="content__articles--title title">Disfruta de los art&#237;culos de <?php the_archive_title(); ?></h2>
                                        <?php get_template_part('/templates/content', 'taxonomies'); ?>
                                  </div>
                            </article>
                            <!-- <?php get_sidebar(); ?> -->
                      <!-- Fin de Art&#237;culos -->
                <!-- Fin de Servicios, Proyectos & Art&#237;culos -->
                </div>
              </div>
        </section>
    <!-- Fin del Contenido -->
    <?php get_template_part('/templates/form'); ?>
    <?php get_footer(); ?>
