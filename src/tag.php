  <?php get_header(); ?>
        <!-- Header -->
        <header class="header taxonomy" style="color:white;">
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
                                                    <i class="fa fa-calendar"><?php the_time('j F Y'); ?></i>
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
                    <!-- Begin MailChimp Signup Form -->
                      <div class="container form__container--purple">
                          <div id="contactame"></div>
                          <div id="mc_embed_signup" class="form content__responsive--form">
                                <div class="form__content form__content--purple">
                                  <h2>&#191;Te gusta lo que lees? Cont&#225;ctame!</h2> 
                                  <p class="form__content--white">Si quieres recibir de primero mis &#250;ltimos art&#237;culos o contactarme, s&#243;lo tienes que dejar tu nombre y direcci&#243;n de correo electr&#243;nico <em>aqu&#237;</em>.</p>
                                </div>
                                <form action="//alexballera.us8.list-manage.com/subscribe/post?u=8d7312e4347b5791968e24e78&amp;id=d7ed361251" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                      <div id="mc_embed_signup_scroll" class="form__email form__purple">
                                        <div class="indicates-required"><span class="asterisk">*</span> Requerido</div>
                                          <input type="text" value="" name="FNAME" class="" id="mce-FNAME" placeholder="*Tu nombre aqu&#237;...">
                                          <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="*Tu email aqu&#237;...">
                                          <input type="text" value="" name="MMERGE2" class="" id="mce-MMERGE2" placeholder="Deja tu mensaje aqu&#237;...">
                                          <div id="mce-responses" class="clear">
                                            <div class="response" id="mce-error-response"></div>
                                            <div class="response" id="mce-success-response"></div>
                                          </div>
                                            <div class="mc__input" aria-hidden="true"><input type="text" name="b_8d7312e4347b5791968e24e78_d7ed361251" tabindex="-1" value=""></div>
                                            <div class="clear form__email--button">
                                            <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="button"><i class="fa fa-envelope-o"></i> Cont&#225;ctame</button>
                                            </div>
                                      </div>
                                </form>
                          </div>
                        </div>
                    <!--End MailChimp Signup Form-->
              <!-- Fin de Servicios, Proyectos & Art&#237;culos -->
        </section>
    <!-- Fin del Contenido -->
   <?php endif; ?>
    <?php get_footer(); ?>
