  <?php get_header(); ?>
        <!-- Header -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <header class="header">
              <picture class="header__picture">
                  <?php the_post_thumbnail($size='thumbnail'); ?>
              </picture>
        </header>
    <!-- Fin de Header -->
    <!-- Contenido -->
        <section class="content">
              <!-- Servicios, Proyectos & Art&#237;culos -->
                    <!-- Art&#237;culos -->
                          <article class="container">
                                <div class="content__container">
                                <div class="content__container--inner">
                                  <div id="post-<?php the_ID(); ?>" <?php post_class( 'content__single' ); ?>>
                                    <h1 class="content__single--title"><?php the_title(); ?></h1>
                                    <div class="content__single--text"><?php the_content(); ?></div>
                                    <section class="content__single--footer">
                                      <i class="fa fa-user"><?php the_author_posts_link() ?></i>
                                      <i class="fa fa-calendar"><?php the_date( get_option( 'date_format' ) ); ?></i>
                                      <i class="fa fa-folder-open"><?php the_category(', '); ?></i>
                                      <i class="fa fa-tags"><?php the_tags($before = '', $sep = ', ', $after = ''); ?></i>
                                      <i class="fa fa-comment"><?php comments_number( $zero = false, $one = true, $more = true ); ?></i>
                                    </section>
                                  <?php comments_template(); ?>
                                  <?php endwhile; else: ?>
                                  <p>Lo siento, no encontre nada para mostrar.</p>
                                  <?php endif; ?>
                                  </div>
                               </div>
                              <?php get_sidebar(); ?>
                            </div>
                          </article>
                    <!-- Fin de Art&#237;culos -->
              <!-- Fin de Servicios, Proyectos & Art&#237;culos -->
        </section>
    <!-- Fin del Contenido -->
    <?php get_template_part('/templates/searchgoogle'); ?>
    <?php get_template_part('/templates/form'); ?>
    <?php get_footer(); ?>
