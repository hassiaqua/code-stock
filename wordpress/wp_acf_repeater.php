<?php if(have_rows('repeater')): ?>
	<?php while (have_rows('repeater')):the_row(); ?>

		<?php the_sub_field('data01'); ?>
		<?php the_sub_field('data01'); ?>

	<?php endwhile; ?>
<?php endif; ?>