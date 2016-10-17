<?php
function register_my_menus() {
  register_nav_menus(
                     array(
                           'navbar-menu' => __( 'Navbar Menu', 'portfolio-one'),
                           'content-menu' => __( 'Content Menu', 'portfolio-one'),
                           'footer-menu' => __( 'Footer Menu', 'portfolio-one')
                           )
                     );
}
add_action('init', 'register_my_menus');


 ?>
