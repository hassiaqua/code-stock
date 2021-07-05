<!-- main loop -->
<?php
$big = 999999999;
$args = array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'total' =>  $wp_query->max_num_pages,
	'current' => max( 1, get_query_var('paged') ),
	'prev_text' => '&laquo;',
	'next_text' => '&raquo;',
	'end_size' => 1,
	'mid_size' => 2,
);
echo '<div class="pagination">';
echo paginate_links($args);
echo '</div>';
?>


<!-- sub loop -->
<?php
$big = 999999999;
$args = array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'total' =>  $the_query->max_num_pages,
	'current' => max( 1, get_query_var('paged') ),
	'prev_text' => '&laquo;',
	'next_text' => '&raquo;',
	'end_size' => 1,
	'mid_size' => 2,
	'paged' => get_query_var('paged'),
);
echo '<div class="pagination">';
echo paginate_links($args);
echo '</div>';
?>