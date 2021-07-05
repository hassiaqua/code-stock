<?php if (have_posts()): ?>
<?php while (have_posts()):the_post(); ?>
	<a href="<?php the_permalink() ?>">
		<?php the_title() ?>
		<?php the_excerpt(); ?>
		<?php the_permalink() ?>
	</a>
<?php endwhile; ?>
<?php elseif(): ?>
	<div class="text-md text-align-center">検索結果が見つかりませんでした。</div>
<?php endif; ?>


<!-- カウント -->
<?php
if(have_posts()):
	my_result_count();
	while ( have_posts()):
		the_post();
	endwhile;
else:
	echo '<div class="text-md text-align-center">検索結果が見つかりませんでした。</div>';
endif;
?>

<?php
function my_result_count() {
	global $wp_query;

	$paged = get_query_var( 'paged' ) - 1;
	$ppp   = get_query_var( 'posts_per_page' );
	$count = $total = $wp_query->post_count;
	$from = 0;
	if ( 0 < $ppp ) {
		$total = $wp_query->found_posts;
		if ( 0 < $paged )
			$from = $paged * $ppp;
	}
	printf(
		'<p>全%1$s件中 %2$s%3$s件目を表示</p>',
		$total,
		( 1 < $count ? ($from + 1 . '〜') : '' ),
		($from + $count )
	);
}
?>