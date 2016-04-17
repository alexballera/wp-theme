<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />

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
    <!-- START - Facebook Open Graph, Google+ and Twitter Card Tags  -->
    <meta name="author" content="Alex Ballera"/>
    <meta name="description" content="<?php bloginfo('description'); ?>"/>
    <meta property="fb:app_id" content="586663831475504"/>
    <meta property="fb:admins" content="721354641"/>
    <meta property="og:locale" content="es_ES"/>
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
    <meta property="og:title" content="<?php wp_title('|', true, 'right'); ?>"/>
    <meta property="og:url" content="<?php echo esc_url( home_url( '/' ) ); ?>"/>
    <meta property="og:type" content="blog"/>
    <meta property="og:description" content="<?php bloginfo('description'); ?>"/>
    <meta property="og:image" content="http://i2.wp.com/web.alexballera.com/wp-content/uploads/2016/02/alex-ballera.jpg?w=400"/>
    <meta property="og:image:width" content="400"/>
    <meta property="og:image:height" content="400"/>
    <meta property="article:publisher" content="https://www.facebook.com/AlexBallera.Dev"/>
    <meta property="article:author" content="https://www.facebook.com/alexballera"/>
    <!-- Twitter Card -->
    <meta name="twitter:title" content="<?php wp_title('|', true, 'right'); ?>"/>
    <meta name="twitter:url" content="<?php echo esc_url( home_url( '/' ) ); ?>"/>
    <meta name="twitter:site" content="@alexballera"/>
    <meta name="twitter:creator" content="@alexballera"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:description" content="<?php bloginfo('description'); ?>"/>
    <meta name="twitter:image:src" content="http://i0.wp.com/web.alexballera.com/wp-content/uploads/2016/03/alexballera825x300.png"/>
    <meta name="twitter:image" content="http://i0.wp.com/web.alexballera.com/wp-content/uploads/2016/03/alexballera825x300.png"/>
    <link rel="canonical" href="http://alexballera.com"/>
    <link rel="publisher" href="https://plus.google.com/100946240394478170627"/>
    <link rel="author" href="https://plus.google.com/101028757520419920996"/>
    <!-- END - Facebook Open Graph, Google+ and Twitter Card Tags -->

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
    <script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "Article",
          "mainEntityOfPage":{
            "@type":"WebPage",
            "@id":"http://alexballera.com"
          },
          "headline": "<?php bloginfo('description'); ?>",
          "image": {
            "@type": "ImageObject",
            "url": "http://i2.wp.com/web.alexballera.com/wp-content/uploads/2016/02/alex-ballera.jpg",
            "height": 800,
            "width": 800
          },
          "datePublished": "2015-02-05T08:00:00+08:00",
          "dateModified": "2015-02-05T09:20:00+08:00",
          "author": {
            "@type": "Person",
            "name": "Alex Ballera"
          },
           "publisher": {
            "@type": "Organization",
            "name": "Alex Ballera",
            "logo": {
              "@type": "ImageObject",
              "url": "http://i2.wp.com/web.alexballera.com/wp-content/uploads/2016/02/alex-ballera.jpg",
              "width": 600,
              "height": 60
            }
          },
          "description": "<?php bloginfo('description'); ?>"
        }
    </script>

    <!--[if (gte IE 6)&(lte IE 8)]>
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/main.min.js"></script>
    <noscript><link rel="stylesheet" href="[fallback css]" /></noscript>
    <![endif]-->
  <?php wp_enqueue_script("jquery"); ?>
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
    <!-- Barra de Navegaci&#243;n -->
        <nav id="header" class="nav">
            <div class="nav__mobile">
                  <a class="nav__mobile--logo" href="<?php echo esc_url( __('http://alexballera.com', 'portfolio-one')); ?>" target="_blank">
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
            <?php get_template_part('/templates/searchform'); ?>
        </nav>
    <!-- Fin de Barra de Navegaci&#243;n -->