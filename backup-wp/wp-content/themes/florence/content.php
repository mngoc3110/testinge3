<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
	<?php if(has_post_format('gallery')) : ?>
	
		<?php $images = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>
		
		<?php if($images) : ?>
		<div class="post-img">
		<ul class="bxslider">
		<?php foreach($images as $image) : ?>
			
			<?php $the_image = wp_get_attachment_image_src( $image, 'solopine-full-thumb' ); ?> 
			<?php $the_caption = get_post_field('post_excerpt', $image); ?>
			<li><img src="<?php echo esc_url($the_image[0]); ?>" <?php if($the_caption) : ?>title="<?php echo esc_attr($the_caption); ?>"<?php endif; ?> /></li>
			
		<?php endforeach; ?>
		</ul>
		</div>
		<?php endif; ?>
	
	<?php elseif(has_post_format('video')) : ?>
	
		<div class="post-img">
			<?php $sp_video = get_post_meta( $post->ID, '_format_video_embed', true ); ?>
			<?php if(wp_oembed_get( $sp_video )) : ?>
				<?php echo wp_oembed_get($sp_video); ?>
			<?php else : ?>
				<?php echo wp_kses_post($sp_video); ?>
			<?php endif; ?>
		</div>
	
	<?php elseif(has_post_format('audio')) : ?>
	
		<div class="post-img audio">
			<?php $sp_audio = get_post_meta( $post->ID, '_format_audio_embed', true ); ?>
			<?php if(wp_oembed_get( $sp_audio )) : ?>
				<?php echo wp_oembed_get($sp_audio); ?>
			<?php else : ?>
				<?php echo wp_kses_post($sp_audio); ?>
			<?php endif; ?>
		</div>
	
	<?php else : ?>
		
		<?php if(has_post_thumbnail()) : ?>
		<?php if(!get_theme_mod('solopine_post_thumb')) : ?>
		<div class="post-img">
			<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('solopine-full-thumb'); ?></a>
		</div>
		<?php endif; ?>
		<?php endif; ?>
		
	<?php endif; ?>
	
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
		
		<?php if(is_single()) : ?>
    		<?php the_content(__('<span class="more-button">Continue Reading</span>', 'solopine')); ?>
		<?php else : ?>
    		<p><?php the_excerpt(); ?></p>
   			<p><a href="<?php echo get_permalink(); ?>" class="more-link"><span class="more-button">Continue Reading</span></a></p>
		<?php endif; ?>
		
		<?php wp_link_pages(); ?>
		
		<?php if(!get_theme_mod('solopine_post_tags')) : ?>
		<?php if(is_single()) : ?>
		<?php if(has_tag()) : ?>
			<div class="post-tags">
				<?php the_tags("",""); ?>
			</div>
		<?php endif; ?>	
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
		
		<?php if(!get_theme_mod('solopine_post_share')) : ?>
		<div class="post-share">
			
			<?php if(function_exists('florence_core_get_social_share')) { florence_core_get_social_share(); } ?>
			
		</div>
		<?php endif; ?>
		
	</div>
	
	<?php if(!get_theme_mod('solopine_post_author')) : ?>
	<?php if(is_single()) : ?>
		<?php get_template_part('inc/templates/post-author'); ?>
	<?php endif; ?>
	<?php endif; ?>
	
	<?php if(!get_theme_mod('solopine_post_nav')) : ?>
	<?php if(is_single()) : ?>
		<?php get_template_part('inc/templates/post-pagination'); ?>
	<?php endif; ?>
	<?php endif; ?>
	
</article>

<?php if(!get_theme_mod('solopine_post_related')) : ?>
<?php if(is_single()) : ?>
	<?php get_template_part('inc/templates/post-related'); ?>
<?php endif; ?>
<?php endif; ?>

<?php comments_template( '', true );  ?>