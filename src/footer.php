    <!-- Footer -->
        <footer class="footer">
            <div id="footer"></div>
            <div id="showCategories" class="footer__content">
                <div class="footer__content--categories">
                    <?php wp_list_categories( array(
                        'orderby' => 'count',
                        'order' => 'DESC',
                        'title_li:' => false,
                        'show_count' => true
                    ) ); ?>
                </div>

            </div>
            <div id="lastArticles" class="footer__content footer__articles">
              <div class="footer__content--tags tags" id="tags">
                    <h3></i> Etiquetas</h3>
                    <?php
                        $valores = array(
                          'smallest' => 10,
                          'largest' => 18,
                          'unit' => 'px',
                          'number' => 0,
                          'format' => 'flat',
                          'orderby' => 'name',
                          'order' => 'ASC');
                        wp_tag_cloud($valores);
                        ?>
                </div>
                <!-- Publicidad -->
                <?php if ( of_get_option( 'image_ad_footer' ) ) { ?>
                 <div class="widget">
                   <a href="<?php echo of_get_option( 'link_ad_footer', 'no entry' ); ?>">
                      <img src="<?php echo of_get_option( 'image_ad_footer' ); ?>" />
                   </a>
                 </div>
               <?php } ?>
               <!-- Fin de Publicidad -->
            </div>
            <div class="footer__contact">
              <div class="footer__social">
                <h3>
                  <a href="mailto:alexballera@gmail.com" title="Cont&#225;ctame por email">Alex Ballera | Front End Developer</a>
                </h3>
                <p><?php bloginfo('description'); ?></p>
                <p class="footer__social--p">Conoce y utiliza, entre otros, los siguientes lenguajes y frameworks:</p>
                <ul class="footer__contact--tech">
                  <li><i class="fa fa-html5"></i></li>
                  <li><i class="fa fa-css3"></i></li>
                  <li><i class="icon-javascript-alt"></i></li>
                  <li><i class="icon-ruby-on-rails"></i></li>
                  <li><i class="fa fa-wordpress"></i></li>
                  <li><i class="fa fa-git"></i></li>
                </ul>
                <h3>S&#237;gueme y cont&#225;ctame</h3>
                <ul class="footer__social--redes">
                  <li><a href="<?php echo esc_url( __( 'https://www.facebook.com/alexballera', 'portfolio-one')); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="<?php echo esc_url( __( 'https://twitter.com/AlexBallera', 'portfolio-one')); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="<?php echo esc_url( __( 'https://www.linkedin.com/in/alexballera', 'portfolio-one')); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="<?php echo esc_url( __( 'https://plus.google.com/u/0/+AlexBallera/posts', 'portfolio-one')); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="<?php echo esc_url( __('https://github.com/alexballera', 'portfolio-one')); ?>" target="_blank"><i class="fa fa-github-alt"></i></a></li>
                <li><a href="mailto:alex@alexballera.com"><i class="fa fa-envelope-o"></i></a></li>
                </ul>
                  <a class="informacion__boton" href="<?php echo esc_url( __('http://alexballera.com/contactame.html', 'portfolio-one')); ?>" target="_blank"> <i class="fa fa-envelope-o"></i> Cont&#225;ctame</a>
                <div class="footer__validation">
                  <a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Falexballera.com%2F" target="_blank">
                    <img src="http://i2.wp.com/web.alexballera.com/wp-content/uploads/2016/03/W3C_HTML5_certified.png?w=65" alt="Valid HTML" title="Validate HTML5" />
                  </a>
                  <a href="https://validator.w3.org/unicorn/check?ucn_uri=alexballera.com&doctype=Inline&charset=(detect%20automatically)&ucn_lang=es&ucn_task=conformance#" target="_blank">
                    <img src="http://i2.wp.com/web.alexballera.com/wp-content/uploads/2016/03/W3C_CSS_certified.png?w=65" alt="Valid CSS" title="Validate CSS3" />
                  </a>
                  <a href="http://validator.w3.org/feed/check.cgi?url=http%3A//web.alexballera.com/feed/" target="_blank">
                    <img src="http://i2.wp.com/web.alexballera.com/wp-content/uploads/2016/03/valid-rss-rogers.png?w=65" alt="Valid Atom" title="Validate RSS" />
                  </a>
                </div>
              </div>
            </div>
        </footer>
    <!-- Fin de Footer -->
    <?php get_template_part('/templates/nav-footer'); ?>
    <?php wp_footer(); ?>
  </body>
</html>