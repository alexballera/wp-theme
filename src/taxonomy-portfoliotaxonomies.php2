<?php get_header(); ?>
<div class="wrapperPortfolio">
<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
$cliente = get_post_meta(get_the_id(), 'cliente', TRUE);
$descripcion = get_post_meta(get_the_id(), 'descripcion', TRUE); ?>
  <div class="portfolioItem">
    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
      <?php the_post_thumbnail('portfolioitem'); ?>
      <div class="portfolioItemDetalle">
        <h2><?php the_title(); ?></h2>
        <?php
        if ($cliente) { echo '<p><div class="detalleTitulo">Cliente</div> '.$cliente; }
        if ($descripcion) { echo '<br /><div class="detalleTitulo">Descripcion</div> '.$descripcion.'</p>'; } ?>
      </div>
    </a>
  </div><!-- end of portfolioItem -->
<?php endwhile; endif; ?>
<script type="text/javascript">
 $(function() {
 $(".portfolioItem").hover(function() {
 $(this).children(".portfolioItemDetalle").show("fast");
 },function(){
 $(this).children(".portfolioItemDetalle").hide("fast");
 });
 });
</script>
<div class="navigation"><?php wp_pagenavi(); ?></div>
</div>
<?php get_footer(); ?>