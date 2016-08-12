<?php 
/*Portfolio*/
function register_cpt_portfolio() {
    $labels = array(
        'name' => 'Portfolio',
        'singular_name' => 'Portfolio',
        'add_new' => 'Agregar',
        'add_new_item' => 'Agregar proyecto',
        'edit_item' => 'Editar proyecto',
        'new_item' => 'Nuevo proyecto',
        'view_item' => 'Ver proyecto',
        'search_items' => 'Buscar en Porfolio',
        'not_found' => 'No se encontraron trabajos',
        'not_found_in_trash' => 'No se encontraron en la papelera',
        'parent_item_colon' => 'Parent Portfolio:',
        'menu_name' => 'Portfolio',
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Trabajos que realizamos recientemente',
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type( 'portfolio', $args );
}
add_action( 'init', 'register_cpt_portfolio' );

function register_portfoliotaxonomies() {
    $labels = array(
        'name'                  => 'Tipos',
        'singular_name'         => 'Tipo',
        'add_new'               => 'Agregar tipo',
        'add_new_item'          => 'Agregar tipo',
        'edit_item'             => 'Editar tipo',
        'new_item'              => 'Nuevo tipo',
        'view_item'             => 'Ver tipo',
        'search_items'          => 'Buscar tipos',
        'not_found'             => 'No encontrado',
        'not_found_in_trash'    => 'No encotrado',
    );
    $pages = array('portfolio');
    $args = array(
        'labels'            => $labels,
        'singular_label'    => 'Tipo',
        'public'            => true,
        'show_ui'           => true,
        'hierarchical'      => true,
        'show_tagcloud'     => false,
        'show_in_nav_menus' => true,
        '_builtin'          => false,
        'rewrite'           => array('slug' => 'porfoliotax','with_front' => FALSE ),
     );
    register_taxonomy('portfoliotaxonomies', $pages, $args);
}
add_action('init', 'register_portfoliotaxonomies');
add_image_size( 'portfolioitem', 230,230, true );

/* Metabox */
$meta_box = array(
                  'id' => 'metabox-portfolio',
                  'title' => 'Elementos del Portfolio',
                  'page' => 'portfolio',
                  'context' => 'normal',
                  'priority' => 'high',
                  'fields' => array(
                                    array(
                                          'name' => 'T&#237;tulo',
                                          'desc' => 'Nombre del proyecto',
                                          'id' => 'titulo', //cliente
                                          'type' => 'text',
                                          'std' => 'T&#237;tulo del proyecto...'
                                          ),
                                    array(
                                          'name' => 'Descripci&#243;n',
                                          'desc' => 'Descripci&#243;n del proyecto',
                                          'id' => 'descripcion', //socios
                                          'type' => 'text',
                                          'std' => 'Descripci&#243;n del proyecto...'
                                          ),
                                    array(
                                          'name' => 'Cliente',
                                          'desc' => 'Nombre del cliente',
                                          'id' => 'cliente', //descripcion
                                          'type' => 'text',
                                          'std' => 'Nombre del cliente...'
                                         ),
                                    array(
                                          'name' => 'Layout',
                                          'id' => 'layout',
                                          'type' => 'radio',
                                          'options' => array(
                                                             array('name' => 'Con Relacionados ', 'value' => 'Layout1'),
                                                             array('name' => 'Con Datos del Proyecto ', 'value' => 'Layout2'),
                                                             array('name' => 'Con Sidebar ', 'value' => 'Layout3')
                                                             )
                                          )
                                    )
                  );
add_action('admin_menu', 'mytheme_add_box');

// Add meta box
function mytheme_add_box() {
    global $meta_box;
    add_meta_box($meta_box['id'],
                 $meta_box['title'],
                 'mytheme_show_box',
                 $meta_box['page'],
                 $meta_box['context'],
                 $meta_box['priority']);
}

// Callback function to show fields in meta box
function mytheme_show_box() {
    global $meta_box, $post;
    // Use nonce for verification
    echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table">';
    foreach ($meta_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr>',
        '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
        '<td>';
        switch ($field['type']) {
            case 'text':
            echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />',
            '<br />', $field['desc'];
            break;
            case 'textarea':
            echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>',
            '<br />', $field['desc'];
            break;
            case 'select':
            echo '<select name="', $field['id'], '" id="', $field['id'], '">';
            foreach ($field['options'] as $option) {
                echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
            }
            echo '</select>';
            break;
            case 'radio':
            foreach ($field['options'] as $option) {
                echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
            }
            break;
            case 'checkbox':
            echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
            break;
        }
        echo '<td>',
        '</tr>';
    }
    echo '</table>';
}
add_action('save_post', 'mytheme_save_data');

// Save data from meta box
function mytheme_save_data($post_id) {
    global $meta_box;
    // verify nonce
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    foreach ($meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
add_image_size( 'portfolio', 230,130, true );
add_image_size( 'layout2', 340, 300, true);
/*End of Portfolio*/

 ?>