<?php get_header(); ?>
	
	<div class="container">
	
		<div id="content">
		
			<div id="main" <?php if(get_theme_mod('solopine_archive_layout') == 'full' || get_theme_mod('solopine_archive_layout') == 'grid-full' || get_theme_mod('solopine_archive_layout') == 'list-full') : ?>class="fullwidth"<?php else : ?>class="regular"<?php endif; ?>>
			
				<div class="archive-box">
	
					<?php
						if ( is_day() ) :
							echo wp_kses( __( '<span>Daily Archives:</span>', 'florence' ), array( 'span' => array( 'class' => array() ) ) );
							printf( wp_kses( __( '<h1>%s</h1>', 'florence' ), array( 'h1' => array( 'class' => array() ) ) ), get_the_date() );

						elseif ( is_month() ) :
						
							echo wp_kses( __( '<span>Monthly Archives:</span>', 'florence' ), array( 'span' => array( 'class' => array() ) ) );
							printf( wp_kses( __( '<h1>%s</h1>', 'florence' ), array( 'h1' => array( 'class' => array() ) ) ), get_the_date( _x( 'F Y', 'monthly archives date format', 'florence' ) ) );

						elseif ( is_year() ) :
							
							echo wp_kses( __( '<span>Yearly Archives:</span>', 'florence' ), array( 'span' => array( 'class' => array() ) ) );
							printf( wp_kses( __( '<h1>%s</h1>', 'florence' ), array( 'h1' => array( 'class' => array() ) ) ), get_the_date( _x( 'Y', 'yearly archives date format', 'florence' ) ) );

						else :
							echo wp_kses( __( '<h1>Archives:</h1>', 'florence' ), array( 'h1' => array( 'class' => array() ) ) );

						endif;
					?>
					
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