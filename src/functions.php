<?php
/* Options Framework Theme */
if ( ! function_exists( 'optionsframework_init' ) ) {
 define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
 require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}

if ( ! isset( $content_width ) ) $content_width = 900;
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 825, 510, true );
add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
add_editor_style('css/editor-style.css');
add_theme_support( 'html5', array(
                                  'comment-list',
                                  'comment-form',
                                  'search-form',
                                  'gallery',
                                  'caption'
                                  )
);

function register_my_menus() {
  register_nav_menus(
                     array(
                           'header-menu' => __( 'Header Menu', 'portfolio-one'),
                           'footer-menu' => __( 'Footer Menu', 'portfolio-one')
                           )
                     );
}
add_action('init', 'register_my_menus');

function plugin_register_sidebar(){
  register_sidebar(array(
                         'id' => 'sidebar-$i',
                         'name' => 'Sidebar Lateral',
                         'description' => '&#193;rea para colocar widget lateral',
                         'before_title' => '<h3>',
                         'after_title' => '</h3>',
                         'before_widget' => '<article class="sidebar__content">',
                         'after_widget' => '</article>'
                         )
  );
};
add_action('widgets_init', 'plugin_register_sidebar');

function insertScript(){
    if( !is_admin() ){
        wp_register_script('myScript', get_template_directory_uri(). '/js/main.min.js', array('jquery'), '1', true );
        wp_enqueue_script('myScript');
    }
}
add_action("wp_enqueue_scripts", "insertScript", 11);

function insertStyle() {
    wp_enqueue_style( 'mytheme-style', get_stylesheet_uri() ); 
}
add_action( 'wp_enqueue_scripts', 'insertStyle' );

$arg = array(
             'before' => '<p>' . __( 'P&#225;ginas:', 'portfolio-one' ),
             'after' => '</p>',
             'link_before'      => '',
             'link_after'       => '',
             'next_or_number'   => 'number',
             'separator'        => ' ',
             'nextpagelink'     => __( 'Pr&#243;ximo', 'portfolio-one' ),
             'previouspagelink' => __( 'Anterior', 'portfolio-one' ),
             'pagelink'         => '%',
             'echo'             => 1
             );
wp_link_pages( $arg );

$value = array(
        'prev_text'          => __( 'Previous page', 'portfolio-one' ),
        'next_text'          => __( 'Next page', 'portfolio-one' ),
        'mid_size' => 2,
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'portfolio-one' ) . ' </span>',
      );
the_posts_pagination($value);

function wp_pagenavi() {
 global $wp_query, $wp_rewrite;
 $pages = '';
 $max = $wp_query->max_num_pages;
 if (!$current = get_query_var('paged')) $current = 1;
 $args['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
 $args['total'] = $max;
 $args['current'] = $current;
$total = 1;
 $args['mid_size'] = 3;
 $args['end_size'] = 1;
 $args['prev_text'] = '<i class="fa fa-chevron-left"></i>';
 $args['next_text'] = '<i class="fa fa-chevron-rigth"></i>';
if ($max > 1) echo '<div class="wp-pagenavi">';
 if ($total == 1 && $max > 1) $pages = '<span class="pages">P&aacute;gina ' . $current . ' de ' . $max . '</span>';
 echo $pages . paginate_links($args);
 if ($max > 1) echo '</div>';
 }

 /*Breadcrumbs*/
function the_breadcrumb() {
 echo '<p>';
 if (!is_front_page()) {
 echo '<a href="';
 echo home_url();
 echo '">';
 echo 'Inicio';
 echo "</a> &raquo; ";
 if (is_category() || is_single()) {
 the_category(' &raquo; ');
 if (is_single()) { echo the_title(); }
 } elseif (is_page()) { echo the_title(); }
 elseif (is_tag()) { single_tag_title(); }
 elseif (is_day()) { echo "Archivo de "; the_date( get_option( 'date_format' ) );}
 elseif (is_month()) { echo "Archivo de "; the_date( get_option( 'date_format' ) ); }
 elseif (is_year()) { echo "Archivo de "; the_date( get_option( 'date_format' ) ); }
 elseif (is_author()) { echo "Archivo de Autor"; }
 elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { echo "Archivo"; }
 elseif (is_search()) { echo "Resultados de b&uacute;squeda";}
 elseif (is_404()) { echo "Error 404";}
 }else{
 echo '<a href="';
 echo home_url();
 echo '">';
 echo 'Inicio';
 echo "</a>";
 }
 echo '</p>';
}
/*End of Breadcrumbs*/
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
                                          'name' => 'Título',
                                          'desc' => 'Nombre del proyecto',
                                          'id' => 'titulo', //cliente
                                          'type' => 'text',
                                          'std' => 'Título del proyecto...'
                                          ),
                                    array(
                                          'name' => 'Descripción',
                                          'desc' => 'Descripción del proyecto',
                                          'id' => 'descripcion', //socios
                                          'type' => 'text',
                                          'std' => 'Descripción del proyecto...'
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

/* Convertir la primera imágen en destacada */
function autoset_featured() {
    global $post;
    $already_has_thumb = has_post_thumbnail($post->ID);
    if (!$already_has_thumb) {
        $attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
        if ($attached_image) {
            foreach ($attached_image as $attachment_id => $attachment) {
                set_post_thumbnail($post->ID, $attachment_id);
            }
        }
    }
    } //end function
add_action('the_post', 'autoset_featured');
add_action('save_post', 'autoset_featured');
add_action('draft_to_publish', 'autoset_featured');
add_action('new_to_publish', 'autoset_featured');
add_action('pending_to_publish', 'autoset_featured');
add_action('future_to_publish', 'autoset_featured');
/* Fin convertir la primera imágen en destacada */
?>
