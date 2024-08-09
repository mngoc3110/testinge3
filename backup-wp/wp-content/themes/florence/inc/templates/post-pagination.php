<div class="post-pagination">
	
	<?php
		$prev_post = get_previous_post();
		$next_post = get_next_post();
	?>
	
	<?php if (!empty( $prev_post )) : ?>
	<span class="pagi-prev"><a href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>"><i class="fa fa-angle-double-left"></i> <?php esc_html_e('Previous Post', 'florence'); ?></a></span>
	<?php endif; ?>
	
	<?php if (!empty( $next_post )) : ?>
	<span class="pagi-next"><a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php esc_html_e('Next Post', 'florence'); ?> <i class="fa fa-angle-double-right"></i></a></span>
	<?php endif; ?>
	
</div>