<?php 

function imagen_destacada_automatica() {
    global $post;
    $ya_tiene_imagen_destacada = has_post_thumbnail($post->ID);
    if (!$ya_tiene_imagen_destacada)  {
    $attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
        if ($attached_image) {
            foreach ($attached_image as $attachment_id => $attachment) {
                set_post_thumbnail($post->ID, $attachment_id);
            }
           }
     }
}
add_action('the_post', 'imagen_destacada_automatica');
add_action('save_post', 'imagen_destacada_automatica');
add_action('draft_to_publish', 'imagen_destacada_automatica');
add_action('new_to_publish', 'imagen_destacada_automatica');
add_action('pending_to_publish', 'imagen_destacada_automatica');
add_action('future_to_publish', 'imagen_destacada_automatica');

 ?>