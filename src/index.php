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
                      <span>Mobile Optimization & Responsive Design</span>
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
            <div class="container">
            <div class="content__container">
              <div class="content__container--inner">
                <!-- Servicios, Proyectos & Art&#237;culos -->
                      <!-- Art&#237;culos -->
                            <article id="content_articles" class="content__articles">
                                <?php get_template_part('/templates/content'); ?>
                            </article>
                      <!-- Fin de Art&#237;culos -->
                      <!-- Proyectos -->
                            <article id="content_articles" class="content__articles">
                                        <?php get_template_part('/templates/content-portfolio'); ?>
                            </article>
                      <!-- Fin de Proyectos -->
                <!-- Fin de Servicios, Proyectos & Art&#237;culos -->
              </div>
               <?php get_sidebar(); ?>
               </div>
            </div>
        </section>
    <!-- Fin del Contenido -->
    <?php get_template_part('/templates/adsense-webdev'); ?>
    <?php get_template_part('/templates/form'); ?>
    <?php get_footer(); ?>
