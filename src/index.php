  <?php get_header(); ?>
        <!-- Header -->
        <header class="header">
              <picture class="header__picture">
                  <source
                    srcset="http://i2.wp.com/web.alexballera.com/wp-content/uploads/2016/02/alex-ballera.jpg?w=300,
                    http://i2.wp.com/web.alexballera.com/wp-content/uploads/2016/02/alex-ballera.jpg?w=600 2x" type="image/jpg">
                    <img
                    src="http://i2.wp.com/web.alexballera.com/wp-content/uploads/2016/02/alex-ballera.jpg?w=300"
                    srcset="http://i2.wp.com/web.alexballera.com/wp-content/uploads/2016/02/alex-ballera.jpg?w=300,
                    http://i2.wp.com/web.alexballera.com/wp-content/uploads/2016/02/alex-ballera.jpg?w=600 2x"
                    alt="Alex Ballera">
              </picture>
              <section class="header__languages">
                  <h2 class="header__picture--figcaption">
                      <span>Alex Ballera
                      <span>Front End Developer</span></span>
                      <span>Mobile Optimization & Responsive Web Design</span>
                  </h2>
                    <ul class="header__languages--tech">
                          <li><i class="fa fa-html5"></i></li>
                          <li><i class="fa fa-css3"></i></li>
                          <li><i class="icon-javascript-alt"></i></li>
                          <li><i class="icon-ruby-on-rails"></i></li>
                          <li><i class="fa fa-wordpress"></i></li>
                          <li><i class="fa fa-git"></i></li>
                    </ul>
              </section>
        </header>
    <!-- Fin de Header -->
    <!-- Contenido -->
        <section class="content">
              <!-- Servicios, Proyectos & Art&#237;culos -->
                    <!-- Art&#237;culos -->
                          <article id="content_articles" class="content__articles content__articles--background">
                                <div class="container">
                                      <div id="articles"></div>
                                      <h2 class="content__articles--title title">&#191;Qu&#233; quieres aprender hoy?</h2>
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
                                                    <i class="fa fa-user"><?php the_author_posts_link() ?></i>
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
              <!-- Fin de Servicios, Proyectos & Art&#237;culos -->
              <?php get_template_part('/templates/form'); ?>
        </section>
    <!-- Fin del Contenido -->
    <?php get_footer(); ?>
