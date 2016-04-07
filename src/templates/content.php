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
      <i class="fa fa-user"><?php the_author_posts_link() ?></i>
      <i class="fa fa-calendar"><?php the_date( get_option( 'date_format' ) ); ?></i>
      <i class="fa fa-folder-open-o"><?php the_category(', '); ?></i>
      <i class="fa fa-tags"><?php the_tags($before = '', $sep = ', ', $after = ''); ?></i>
    </section>
  </div>
  <?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  <?php endif; ?>
</div>
<!-- Fin de los Art&#237;culos -->