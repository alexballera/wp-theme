        <nav id="header" class="nav">
            <div class="nav__mobile">
                  <a class="nav__mobile--logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <picture class="nav__mobile--logo--picture">
                      <source
                        srcset="http://i1.wp.com/web.alexballera.com/wp-content/uploads/2016/08/alexballera300x300.jpg?w=50,
                        http://i1.wp.com/web.alexballera.com/wp-content/uploads/2016/08/alexballera300x300.jpg?w=100 2x" type="image/jpg">
                        <img
                        src="http://i1.wp.com/web.alexballera.com/wp-content/uploads/2016/08/alexballera300x300.jpg?w=50"
                        srcset="http://i1.wp.com/web.alexballera.com/wp-content/uploads/2016/08/alexballera300x300.jpg?w=50,
                        http://i1.wp.com/web.alexballera.com/wp-content/uploads/2016/08/alexballera300x300.jpg?w=100 2x"
                        alt="Alex Ballera">
                    </picture>
                    <h2 class="title__nav">Alex Ballera | Front End Developer</h2>
                  </a>
                  <button id="btnMenu" class="nav__mobile--btn inactive active"><i id="btnButton" class="fa fa-bars"></i></button>
            </div>
            <?php get_template_part('/templates/nav', 'top'); ?>
            <!-- <?php get_template_part('/templates/searchform'); ?> -->
            <?php get_template_part('/templates/searchgoogle'); ?>
        </nav>
