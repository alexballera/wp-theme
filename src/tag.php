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
              <!-- Servicios, Proyectos & Art&#237;culos -->
                    <!-- Art&#237;culos -->
                          <article id="content_articles" class="content__articles content__articles--background">
                                <div class="container">
                                      <div id="articles"></div>
                                      <h2 class="content__articles--title title">Disfruta de los art&#237;culos de <?php single_tag_title(); ?></h2>
                                      <!-- Inicio de los Art&#237;culos -->
                                      <div class="content__articles--container">
                                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                        <div id="post-<?php the_ID(); ?>" class="content__articles--post">
                                              <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" target="_blank">
                                                  <section>
                                                    <picture class="content__articles--post--picture">
                                                        <img src="<?php the_post_thumbnail( $size='thumbnail', $attr ); ?>">
                                                    </picture>
                                                    <h3 class="content__articles--post--title"><?php the_title(); ?></h3>
                                                </section>
                                              </a>
                                                <section class="content__articles--post--footer">
                                                    <i class="fa fa-user"><?php the_author(); ?></i>
                                                    <i class="fa fa-calendar"><?php the_date( get_option( 'date_format' ) ); ?></i>
                                                    <i class="fa fa-folder-open-o"><?php the_category(', '); ?></i>
                                                    <i class="fa fa-tags"><?php the_tags($before = '', $sep = ', ', $after = ''); ?></i>
                                                </section>
                                        </div>
                                        <?php endwhile; else: ?>
                                        <p><?php _e('Lo siento, no encontre nada para mostrar.'); ?></p>
                                        <?php endif; ?>
                                      </div>
                                      <!-- Fin de los Art&#237;culos -->
                                </div>
                          </article>
                    <!-- Fin de Art&#237;culos -->
                    <?php get_template_part('/templates/form'); ?>
              <!-- Fin de Servicios, Proyectos & Art&#237;culos -->
        </section>
    <!-- Fin del Contenido -->
   <?php endif; ?>
    <?php get_footer(); ?>
