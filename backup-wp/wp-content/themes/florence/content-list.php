<article id="post-<?php the_ID(); ?>" <?php post_class('list-item'); ?>>		
		
	<?php if(has_post_thumbnail()) : ?>
	<div class="post-img">
		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('solopine-misc-thumb'); ?></a>
	</div>
	<?php endif; ?>
	
	<div class="list-content">
	
		<div class="post-header">
			
			<?php if(!get_theme_mod('solopine_post_cat')) : ?>
			<span class="cat"><?php the_category(', '); ?></span>
			<?php endif; ?>
			
			<?php if(is_single()) : ?>
				<h1><?php the_title(); ?></h1>
			<?php else : ?>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php endif; ?>
			
		</div>
		
		<div class="post-entry">
			
			<?php if(is_home()) : ?>
				<?php if(get_theme_mod('solopine_home_layout') == 'list-full') : ?>
					<p><?php echo wp_kses_post(solopine_string_limit_words(get_the_excerpt(), 34)); ?>&hellip;</p>
				<?php else : ?>
					<p><?php echo wp_kses_post(solopine_string_limit_words(get_the_excerpt(), 19)); ?>&hellip;</p>
				<?php endif; ?>
			<?php else : ?>
				<?php if(get_theme_mod('solopine_archive_layout') == 'list-full') : ?>
					<p><?php echo wp_kses_post(solopine_string_limit_words(get_the_excerpt(), 34)); ?>&hellip;</p>
				<?php else : ?>
					<p><?php echo wp_kses_post(solopine_string_limit_words(get_the_excerpt(), 19)); ?>&hellip;</p>
				<?php endif; ?>
			<?php endif; ?>
			
		</div>
		
		<div class="post-meta">
			
			<span class="meta-info">
				
				<?php if(!get_theme_mod('solopine_post_date')) : ?>
				<?php the_time( get_option('date_format') ); ?>
				<?php endif; ?>
				
				<?php if(!get_theme_mod('solopine_post_author_name')) : ?>
				<?php esc_html_e('by', 'florence'); ?> <?php the_author_posts_link(); ?>
				<?php endif; ?>
				
			</span>
			
		</div>
	
	</div>
	
</article>