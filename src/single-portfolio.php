<?php get_header(); ?>
<div class="container">
<div class="portfolio__container">
<?php global $post; $layout = get_post_meta(get_the_id(), 'layout', TRUE);
if ($layout == 'Layout1') {
 if ( have_posts() ) : while ( have_posts() ) : the_post();
 $cliente = get_post_meta(get_the_id(), 'cliente', TRUE);
 $socios = get_post_meta(get_the_id(), 'socios', TRUE);
 $descripcion = get_post_meta(get_the_id(), 'descripcion', TRUE);
 ?>
    <div class="portfolio__one">
    <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        <div class="portfolio__one--detalle">
            <?php the_post_thumbnail('thumb'); ?>
            <?php echo '<p><div class="portfolio__titulo">Cliente</div> '.$cliente;
            echo '<br /><div class="portfolio__titulo">Socios</div> '.$socios;
            echo '<br /><div class="portfolio__titulo">Decripcion</div> '.$descripcion.'</p>'?>
        </div>
    <?php the_content(); ?>
    </div><!-- end of portfolioUno -->
<?php endwhile; endif; ?>
<div class="portfolio__sidebar">
    <div class="portfolio__sidebar--item">
        <h3>Otros trabajos relacionados</h3>
    </div>
    <?php
    $categories = get_the_category($post->ID);
    $args= array(
        'cat'      => $categories,
        'posts_per_page' => 4,
        'post_type' => 'Portfolio'
    );
    query_posts($args);
    if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="portfolio__sidebar--item">
            <?php the_post_thumbnail('portfolio'); ?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        </div>
    <?php endwhile; endif; ?>
</div>
<?php } else if ($layout == 'Layout2') { ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
 $cliente = get_post_meta(get_the_id(), 'cliente', TRUE);
 $socios = get_post_meta(get_the_id(), 'socios', TRUE);
 $descripcion = get_post_meta(get_the_id(), 'descripcion', TRUE);
 ?>
 <div class="portfolio__two">
 <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
 <?php the_content(); ?>
 </div><!-- end of portfolioDos -->
 <div class="portfolio__two--sidebar">
 <div class="portfolioDosDetalle">
 <?php echo '<p><div class="portfolio__titulo">Cliente</div> '.$cliente;
 echo '<br /><div class="portfolio__titulo">Socios</div> '.$socios;
 echo '<br /><div class="portfolio__titulo">Decripcion</div> '.$descripcion.'</p>'?>
 </div>
 <?php the_post_thumbnail('layout2'); ?>
 </div>
<?php endwhile; endif; ?>
<?php } else { ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 <div class="dos-tercios listado">
 <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
 <?php the_content(); ?>
 </div><!-- end of dos-tercios -->
<?php endwhile; endif;
get_sidebar(); ?>
<?php } ?>
</div><!-- end of wrapper-->
</div>
<?php get_footer(); ?>