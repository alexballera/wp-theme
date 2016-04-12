<?php 
add_theme_support( 'post-thumbnails' );
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
                           'header-menu' => __( 'Header Menu' ),
                           'footer-menu' => __( 'Footer Menu' )
                           )
                     );
}
add_action('init', 'register_my_menus');

function wpdocs_filter_wp_title( $title, $sep ) {
    global $paged, $page;
 
    if ( is_feed() )
        return $title;
 
    // Add the site name.
    $title .= get_bloginfo( 'name' );
 
    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";
 
    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'portfolio-one' ), max( $paged, $page ) );
 
    return $title;
}
add_filter( 'wp_title', 'wpdocs_filter_wp_title', 10, 2 );

function plugin_register_sidebar(){
  register_sidebar(
                   array(
                         'id' => 'sidebar-$i',
                         'name' => 'Sidebar Lateral',
                         'description' => 'Área para colocar widget lateral',
                         'before_title' => '<h3>',
                         'after_title' => '</h3>',
                         'before_widget' => '<article class="sidebar__content">',
                         'after_widget' => '</article>'
                         )
                   );
};
add_action('init', 'plugin_register_sidebar');

?>
