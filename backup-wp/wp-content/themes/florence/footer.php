		
		<!-- END CONTENT -->
		</div>
		
	<!-- END CONTAINER -->
	</div>
	
	<footer id="footer">
		
		<div id="footer-instagram">
					
			<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-2') ) ?>
					
		</div>
		
		<?php if(!get_theme_mod('solopine_footer_social')) : ?>
		<div id="footer-social">

			<div class="container">
			
				<?php if(function_exists('florence_core_get_social_icons_footer')) { florence_core_get_social_icons_footer(); } ?>
			
			</div>
			
		</div>
		<?php endif; ?>
		
		<div id="footer-copyright">
			
			<div class="container">

				<span class="left"><?php echo wp_kses_post(get_theme_mod('solopine_footer_copyright', '&copy; 2019 - Solo Pine. All Rights Reserved. Designed & Developed by <a href="http://solopine.com">SoloPine.com</a>')); ?></span>
				<a href="#" class="to-top"><?php esc_html_e( 'Back to top', 'florence' ); ?> <i class="fa fa-angle-double-up"></i></a>
				
			</div>
			
		</div>
		
	</footer>
	
	<?php wp_footer(); ?>
</body>

</html>