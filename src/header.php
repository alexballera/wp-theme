<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <!-- Mobile Optimization -->
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <!-- Images Icon -->
    <link rel="shortcut icon" href="http://i1.wp.com/web.alexballera.com/wp-content/uploads/2016/02/touch-icon-iphone.png?w=57" />
    <link rel="apple-touch-icon" href="http://i1.wp.com/web.alexballera.com/wp-content/uploads/2016/02/touch-icon-iphone.png?w=57" />
    <link rel="apple-touch-icon" sizes="72x72" href="http://i0.wp.com/web.alexballera.com/wp-content/uploads/2016/02/touch-icon-ipad.png?w=72" />
    <link rel="apple-touch-icon" sizes="114x114" href="http://i1.wp.com/web.alexballera.com/wp-content/uploads/2016/02/touch-icon-iphone-retina.png?w=114" />
    <link rel="apple-touch-icon" sizes="152x152" href="http://i1.wp.com/web.alexballera.com/wp-content/uploads/2016/02/touch-icon-ipad-retina.png?w=152">

    <!--[if (gte IE 6)&(lte IE 8)]>
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/main.min.js"></script>
    <noscript><link rel="stylesheet" href="[fallback css]" /></noscript>
    <![endif]-->
  <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
  <?php wp_head(); ?>
  </head>
  <body <?php body_class('body'); ?>>
    <!--[if lt  IE  8]>
    <p  class="browsehappy">
      Est&#225;s usando  un  navegador <strong>desactualizado</strong>.
      Por favor <a  href="http://browsehappy.com/">actualiza  tu  navegador</a>
      Para  mejorar la  experiencia..
    </p>
    <![endif]-->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-1689752734604820",
        enable_page_level_ads: true
      });
    </script>
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