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
?>
