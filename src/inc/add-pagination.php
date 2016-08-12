<?php 
function wp_pagenavi() {
	global $wp_query, $wp_rewrite;
	$pages = '';
	$max = $wp_query->max_num_pages;
	if (!$current = get_query_var('paged')) $current = 1;
	$args['base'] = str_replace(999999999, '%#%',get_pagenum_link(999999999));
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

 ?>