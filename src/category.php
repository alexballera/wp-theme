  <?php get_header(); ?>
        <!-- Header -->
        <header class="header taxonomy">
                <?php if ( is_category() ) : ?>
                <h1 class="taxonomy__title">Categor&#237;a: <?php single_cat_title(); ?></h1>
                <?php add_filter('category_description', 'wpautop'); ?>
                <?php add_filter('category_description', 'wptexturize'); ?>
                <div class="taxonomy__description">
                <?php echo category_description(); ?>
                </div>
        </header>
    <!-- Fin de Header -->
    <!-- Contenido -->
        <section class="content">
              <!-- Servicios, Proyectos & Art&#237;culos -->
                    <!-- Art&#237;culos -->
                          <article id="content_articles" class="content__articles content__articles--background">
                                <div class="container">
                                      <div id="articles"></div>
                                      <h2 class="content__articles--title title">Disfruta de los art&#237;culos de la categor&#237;a <?php single_cat_title(); ?></h2>
                                      <?php get_template_part('/templates/content'); ?>
                                </div>
                          </article>
                    <!-- Fin de Art&#237;culos -->
                    <?php get_template_part('/templates/form'); ?>
              <!-- Fin de Servicios, Proyectos & Art&#237;culos -->
        </section>
    <!-- Fin del Contenido -->
    <?php endif; ?>
    <?php get_footer(); ?>
