<!-- タイトル固定 -->
<?php
$previous_post = get_previous_post();
$next_post = get_next_post();
if($previous_post) :
	echo '<a href="'.get_the_permalink($previous_post->ID).'">前の記事を見る</a>';
endif;
if($next_post) :
	echo '<a href="'.get_the_permalink($next_post->ID).'">次の記事を見る</a>';
endif;
?>

<!-- タイトル固定 -->
<?php
$prev_post = get_previous_post();
$next_post = get_next_post();
if( !empty($prev_post) || !empty($next_post)):
?>
	<div class="post-nav">
	<?php if(!empty($prev_post)):
		$prev_url = get_permalink($prev_post->ID);
	?>
			<a href="<?php echo $prev_url; ?>">
				<span>PREV</span>
				<p><?php echo $prev_post->post_title; ?></p>
			</a>
	<?php endif; ?>
	<?php if(!empty($next_post)):
		$next_url = get_permalink($next_post->ID);
	?>
		<a href="<?php echo $next_url; ?>">
			<span>NEXT</span>
			<p><?php echo $next_post->post_title; ?></p>
		</a>
	<?php endif; ?>
	</div>
<?php endif; ?>