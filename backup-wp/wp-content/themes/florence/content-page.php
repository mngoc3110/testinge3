<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
	<?php if(has_post_thumbnail()) : ?>
	<div class="post-img">
		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full-thumb'); ?></a>
	</div>
	<?php endif; ?>
	
	<div class="post-header">
		
		<h1><?php the_title(); ?></h1>
		
	</div>
	
	<div class="post-entry">
		
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
		
	</div>
	
	<?php if(!get_theme_mod('solopine_page_share')) : ?>
	<div class="post-meta">
		
		<div class="post-share">
			<?php if(function_exists('florence_core_get_social_share')) { florence_core_get_social_share(); } ?>
		</div>
		
	</div>
	<?php endif; ?>
	
</article>

<?php comments_template( '', true );  ?>