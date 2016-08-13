<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <!-- Mobile Optimization -->
    <?php get_template_part( 'templates/mobileoptimization'); ?>
    <!-- End Mobile Oimization -->

    <!-- Favicon: http://www.favicon-generator.org/ -->
    <?php get_template_part( 'templates/favicon'); ?>
    <!-- End Favicon -->

    <!-- Selectivizr -->
    <?php get_template_part( 'templates/selectivizr'); ?>
    <!-- End Selectivizr -->

  <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

  <!-- Injection wp_head -->
  <?php wp_head(); ?>
  <!-- End injection wp_head -->
  </head>
  <body <?php body_class('body'); ?>>

    <!-- Browsehappy -->
    <?php get_template_part( 'templates/browsehappy'); ?>
    <!-- End Browsehappy -->

    <!-- Ads By Google -->
    <?php get_template_part( 'templates/addsbygoogle'); ?>
    <!-- End AdsByGoogle -->

    <!-- Barra de Navegaci&#243;n -->
        <nav id="header" class="nav">
            <div class="nav__mobile">
                  <a class="nav__mobile--logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <picture class="nav__mobile--logo--picture">
                      <source
                        srcset="http://i2.wp.com/web.alexballera.com/wp-content/uploads/2016/02/alex-ballera.jpg?w=50,
                        http://i2.wp.com/web.alexballera.com/wp-content/uploads/2016/02/alex-ballera.jpg?w=100 2x" type="image/jpg">
                        <img
                        src="http://i2.wp.com/web.alexballera.com/wp-content/uploads/2016/02/alex-ballera.jpg?w=50"
                        srcset="http://i2.wp.com/web.alexballera.com/wp-content/uploads/2016/02/alex-ballera.jpg?w=50,
                        http://i2.wp.com/web.alexballera.com/wp-content/uploads/2016/02/alex-ballera.jpg?w=100 2x"
                        alt="Alex Ballera">
                    </picture>
                    <h2 class="title__nav">Alex Ballera | Front End Developer</h2>
                  </a>
                  <button id="btnMenu" class="nav__mobile--btn inactive active"><i id="btnButton" class="fa fa-bars"></i></button>
            </div>
            <?php get_template_part('/templates/nav-header'); ?>
            <!-- <?php get_template_part('/templates/searchform'); ?> -->
            <?php get_template_part('/templates/searchgoogle'); ?>
        </nav>
    <!-- Fin de Barra de Navegaci&#243;n -->