<?php get_header(); ?>
	
	<div class="container">
	
		<div id="content">
		
			<div id="main" <?php if(get_theme_mod('solopine_archive_layout') == 'full' || get_theme_mod('solopine_archive_layout') == 'grid-full' || get_theme_mod('solopine_archive_layout') == 'list-full') : ?>class="fullwidth"<?php else : ?>class="regular"<?php endif; ?>>
			
				<div class="archive-box">
	
					<span><?php esc_html_e( 'Browsing Category', 'florence' ); ?></span>
					<h1><?php printf( esc_html__( '%s', 'florence' ), single_cat_title( '', false ) ); ?></h1>
					<?php if(category_description()) : ?>
						<?php echo category_description(); ?>
					<?php endif; ?>
				</div>

				<?php if(get_theme_mod('solopine_archive_layout') == 'grid' || get_theme_mod('solopine_archive_layout') == 'grid-full') : ?><ul class="grid-layout"><?php endif; ?>
					
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
					<?php if(get_theme_mod('solopine_archive_layout') == 'grid' || get_theme_mod('solopine_archive_layout') == 'grid-full') : ?>
						<?php get_template_part('content', 'grid'); ?>
					<?php elseif(get_theme_mod('solopine_archive_layout') == 'list' || get_theme_mod('solopine_archive_layout') == 'list-full') : ?>
						<?php get_template_part('content', 'list'); ?>
					<?php else : ?>
						<?php get_template_part('content'); ?>
					<?php endif; ?>
						
				<?php endwhile; ?>

				<?php if(get_theme_mod('solopine_archive_layout') == 'grid' || get_theme_mod('solopine_archive_layout') == 'grid-full') : ?></ul><?php endif; ?>
				
				<?php solopine_pagination(); ?>
				
				<?php endif; ?>
			
			</div>
	
<?php if(get_theme_mod('solopine_archive_layout') == 'full' || get_theme_mod('solopine_archive_layout') == 'grid-full' || get_theme_mod('solopine_archive_layout') == 'list-full') : else : ?><?php get_sidebar(); ?><?php endif; ?>
<?php get_footer(); ?>