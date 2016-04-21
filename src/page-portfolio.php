<?php
/*
template name: Portfolio + Isotope
*/
get_header(); ?>
<div id="options">
  <ul id="filters" data-option-key="filter">
    <li><a href="#filter" data-option-value="*">Todos</a></li>
    <li><a href="#filter" data-option-value=".Logos">Logos</a></li>
    <li><a href="#filter" data-option-value=".Packaging">Packaging</a></li>
    <li><a href="#filter" data-option-value=".Websites">Sitios Web</a></li>
    <li><a href="#filter" data-option-value=".Tarjetas">Tarjetas</a></li>
  </ul>
</div
<div class="wrapperPortfolio">
  <?php
  $args= array(
  'posts_per_page' => 9999,
  'post_type' => 'Portfolio'
  );
  query_posts($args);
  if ( have_posts() ) : while ( have_posts() ) : the_post();
  $cliente = get_post_meta(get_the_id(), 'cliente', TRUE);
  $descripcion = get_post_meta(get_the_id(), 'descripcion', TRUE);
  $terms = get_the_terms( $post->ID , 'portfoliotaxonomies' );
  foreach ( $terms as $term ) { $isotopeClass = $term->name; }?>
  <div class="portfolioItem isotopeElement <?php echo $isotopeClass; ?>">
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
    <script type="text/javascript" language="javascript" src="<?php echo esc_url( get_template_directory_uri()); ?>/js/isotope.pkgd.min.js"></script>
    <script type="text/javascript">
    $(function(){
    var $container = $('#isotopeArea');
    $container.isotope({
    itemSelector : '.isotopeElement',
    animationEngine : 'best-available'
    });
    var $optionSets = $('#options .option-set'),
    $optionLinks = $optionSets.find('a');
    $optionLinks.click(function(){
    var $this = $(this);
    // don't proceed if already selected
    if ( $this.hasClass('selected') ) {
    return false;
    }
    var $optionSet = $this.parents('.option-set');
    $optionSet.find('.selected').removeClass('selected');
    $this.addClass('selected');
    // make option object dynamically, i.e. { filter: '.my-filter-class' }
    var options = {},
    key = $optionSet.attr('data-option-key'),
    value = $this.attr('data-option-value');
    // parse 'false' as false boolean
    value = value === 'false' ? false : value;
    options[ key ] = value;
    if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
    // changes in layout modes need extra logic
    changeLayoutMode( $this, options )
    } else {
    // otherwise, apply new options
    $container.isotope( options );
    }
    return false;
    });
    });
    </script>
  </div>
  <?php get_footer(); ?>