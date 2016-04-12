  <?php get_header(); ?>
        <!-- Header -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <header class="header">
              <h1 class="content__single--title"><?php the_title(); ?></h1>
        </header>
    <!-- Fin de Header -->
    <!-- Contenido -->
        <section class="content">
              <!-- Servicios, Proyectos & Art&#237;culos -->
                    <!-- Art&#237;culos -->
                          <article class="container">
                                <div>
                                  <div id="post-<?php the_ID(); ?>" <?php post_class( 'content__single' ); ?>>
                                    <div class="content__single--text"><?php the_content(); ?></div>
                                  <?php endwhile; else: ?>
                                  <p>Lo siento, no encontre nada para mostrar.</p>
                                  </div>
                                </div>
                          </article>
                    <!-- Fin de Art&#237;culos -->
              <!-- Fin de Servicios, Proyectos & Art&#237;culos -->
              <?php endif; ?>
        </section>
    <!-- Fin del Contenido -->
    <?php get_footer(); ?>
