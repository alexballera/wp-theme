<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
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

    <!-- Google Analytics -->
    <?php include_once('templates/analyticstracking.php') ?>
    <!-- End Google Analytics -->

    <!-- Browsehappy -->
    <?php get_template_part( 'templates/browsehappy'); ?>
    <!-- End Browsehappy -->

    <!-- Ads By Google -->
    <?php get_template_part( 'templates/addsbygoogle'); ?>
    <!-- End AdsByGoogle -->

    <!-- Barra de Navegaci&#243;n -->
    <?php get_template_part( 'templates/nav', 'header'); ?>
    <!-- Fin de Barra de Navegaci&#243;n -->