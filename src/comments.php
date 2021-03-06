<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 */
if ( post_password_required() ) {
  return;
}
?>

<div id="comments" class="comments-area">

  <?php if ( have_comments() ) : ?>
    <h2 class="comments-title">
      <?php
        printf( _nx( 'Un comentario en &ldquo;%2$s&rdquo;', '%1$s comentarios en &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'portfolio-one' ),
          number_format_i18n( get_comments_number() ), get_the_title() );
      ?>
    </h2>

    <?php the_comments_navigation(); ?>
    <ol class="comment-list">
      <?php
        wp_list_comments( array(
          'style'       => 'ol',
          'short_ping'  => true,
          'avatar_size' => 50,
        ) );
      ?>
    </ol><!-- .comment-list -->

  <?php endif; // have_comments() ?>

  <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
  ?>
    <p class="no-comments"><?php _e( 'Comments are closed.', 'portfolio-one' ); ?></p>
  <?php endif; ?>

  <?php comment_form(); ?>

</div><!-- .comments-area -->