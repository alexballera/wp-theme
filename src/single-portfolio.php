<?php get_header(); ?>
<div class="container">
<div class="portfolio__container">
<?php global $post; $layout = get_post_meta(get_the_id(), 'layout', TRUE);
if ($layout == 'Layout1') {
 if ( have_posts() ) : while ( have_posts() ) : the_post();
 $titulo = get_post_meta(get_the_id(), 'titulo', TRUE);
 $descripcion = get_post_meta(get_the_id(), 'descripcion', TRUE);
 $cliente = get_post_meta(get_the_id(), 'cliente', TRUE);
 ?>
    <div class="portfolio__one">
        <div class="portfolio__one--detalle">
            <?php the_post_thumbnail('thumb'); ?>
            <?php echo '<p><div class="portfolio__titulo">Título: </div> '.$titulo;
            echo '<br /><div class="portfolio__titulo">Descripción: </div> '.$descripcion;
            echo '<br /><div class="portfolio__titulo">Cliente: </div> '.$cliente.'</p>'?>
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
 $titulo = get_post_meta(get_the_id(), 'titulo', TRUE);
 $descripcion = get_post_meta(get_the_id(), 'descripcion', TRUE);
 $cliente = get_post_meta(get_the_id(), 'cliente', TRUE);
 ?>
 <div class="portfolio__two">
 <?php the_content(); ?>
 </div><!-- end of portfolioDos -->
 <div class="portfolio__two--sidebar">
 <div class="portfolio__two--detalle">
 <?php echo '<p><div class="portfolio__titulo">Título: </div> '.$titulo;
 echo '<br /><div class="portfolio__titulo">Descripción: </div> '.$descripcion;
 echo '<br /><div class="portfolio__titulo">Cliente: </div> '.$cliente.'</p>'?>
 </div>
 <?php the_post_thumbnail('layout2'); ?>
 </div>
<?php endwhile; endif; ?>
<?php } else { ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 <div class="portfolio__three">
 <?php the_content(); ?>
 </div><!-- end of dos-tercios -->
<?php endwhile; endif; ?>
<?php } ?>
</div><!-- end of wrapper-->
</div>
<?php get_footer(); ?>