  <?php get_header(); ?>
        <!-- Header -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <header class="header">
              <picture class="header__picture">
                  <img src="<?php the_post_thumbnail( $size='thumbnail', $attr ); ?>">
              </picture>
        </header>
    <!-- Fin de Header -->
    <!-- Contenido -->
        <section class="content">
              <!-- Servicios, Proyectos & Art&#237;culos -->
                    <!-- Art&#237;culos -->
                          <article id="content_articles" class="content__articles content__articles--background">
                                <div class="content__articles--container">
                                  <div id="post-<?php the_ID(); ?>" <?php post_class( 'content__articles--post' ); ?>>
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" target="_blank">
                                      <section>
                                        <h3 class="content__articles--post--title"><?php the_title(); ?></h3>
                                      </section>
                                    </a>
                                    <div><?php the_content(); ?></div>
                                    <section class="content__articles--post--footer">
                                      <i class="fa fa-user"><?php the_author_posts_link() ?></i>
                                      <i class="fa fa-calendar"><?php the_date( get_option( 'date_format' ) ); ?></i>
                                      <i class="fa fa-folder-open-o"><?php the_category(', '); ?></i>
                                      <i class="fa fa-tags"><?php the_tags($before = '', $sep = ', ', $after = ''); ?></i>
                                    </section>
                                  <?php endwhile; else: ?>
                                  <p>Lo siento, no encontre nada para mostrar.</p>
                                  </div>
                                </div>
                          </article>
                    <!-- Fin de Art&#237;culos -->
              <!-- Fin de Servicios, Proyectos & Art&#237;culos -->
              <?php endif; ?>
        </section>
        <?php get_template_part('/templates/form'); ?>
    <!-- Fin del Contenido -->
    <?php get_footer(); ?>
