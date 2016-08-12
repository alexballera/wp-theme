<?php 
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