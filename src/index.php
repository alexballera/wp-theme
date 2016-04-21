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
                <!-- Servicios, Proyectos & Art&#237;culos -->
                      <!-- Art&#237;culos -->
                            <article id="content_articles" class="content__articles">
                                        <div id="articles"></div>
                                        <h2 class="content__articles--title title">&#191;Qu&#233; quieres aprender hoy?</h2>
                                        <?php get_template_part('/templates/content'); ?>
                                        <?php get_template_part('/templates/content-portfolio'); ?>
                            </article>
                      <!-- Fin de Art&#237;culos -->
                <!-- Fin de Servicios, Proyectos & Art&#237;culos -->
                <?php get_sidebar(); ?>
              </div>
            </div>
        </section>
    <?php get_template_part('/templates/form'); ?>
    <!-- Fin del Contenido -->
    <?php get_footer(); ?>
