<?php
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

?>
