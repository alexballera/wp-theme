  <?php get_header(); ?>
        <!-- Header -->
        <header class="header header__404">
              <picture class="header__picture">
                  <source
                    srcset="http://i2.wp.com/web.alexballera.com/wp-content/uploads/2016/02/alex-ballera.jpg?w=300,
                    http://i2.wp.com/web.alexballera.com/wp-content/uploads/2016/02/alex-ballera.jpg?w=600 2x" type="image/jpg">
                    <img
                    src="http://i2.wp.com/web.alexballera.com/wp-content/uploads/2016/02/alex-ballera.jpg?w=300"
                    srcset="http://i2.wp.com/web.alexballera.com/wp-content/uploads/2016/02/alex-ballera.jpg?w=300,
                    http://i2.wp.com/web.alexballera.com/wp-content/uploads/2016/02/alex-ballera.jpg?w=600 2x"
                    alt="Alex Ballera">
                  <figcaption class="header__picture--figcaption">
                      <span>Alex Ballera
                      <span>Front End Developer</span></span>
                  </figcaption>
              </picture>
              <section class="header__languages">
                    <ul class="header__languages--tech">
                          <li><i class="fa fa-html5"></i></li>
                          <li><i class="fa fa-css3"></i></li>
                          <li><i class="icon-javascript-alt"></i></li>
                          <li><i class="icon-ruby-on-rails"></i></li>
                          <li><i class="fa fa-wordpress"></i></li>
                          <li><i class="fa fa-git"></i></li>
                    </ul>
              </section>
              <div class="header__message">
                <span>Error 404</span>
                <p>P&#225;gina No Encontrada</p>
                <p>Visita: <a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank"><?php echo esc_url( home_url( '/' ) ); ?></a></p>
              </div>
        </header>
    <!-- Fin de Header -->
    <?php get_footer('error'); ?>
