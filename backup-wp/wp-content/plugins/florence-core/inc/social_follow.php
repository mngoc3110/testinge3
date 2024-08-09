<?php
/*
* Social Media Customizer Settings
*/
function florence_core_register_social_follow( $wp_customize ) {
 	
	include( plugin_dir_path( __FILE__ ) . 'social_follow_settings.php');
 
}
add_action( 'customize_register', 'florence_core_register_social_follow' );

/*
* Get Social Follow Icons
*/
if(!function_exists('florence_core_get_social_icons')) {
function florence_core_get_social_icons() { ?>
	<?php if(get_theme_mod('solopine_facebook')) : ?><a href="https://facebook.com/<?php echo get_theme_mod('solopine_facebook'); ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_twitter')) : ?><a href="https://twitter.com/<?php echo get_theme_mod('solopine_twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_instagram')) : ?><a href="https://instagram.com/<?php echo get_theme_mod('solopine_instagram'); ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_pinterest')) : ?><a href="https://pinterest.com/<?php echo get_theme_mod('solopine_pinterest'); ?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_bloglovin')) : ?><a href="https://bloglovin.com/<?php echo get_theme_mod('solopine_bloglovin'); ?>" target="_blank"><i class="fa fa-heart"></i></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_tumblr')) : ?><a href="https://<?php echo esc_html(get_theme_mod('solopine_tumblr')); ?>.tumblr.com/" target="_blank"><i class="fa fa-tumblr"></i></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_youtube')) : ?><a href="https://youtube.com/<?php echo get_theme_mod('solopine_youtube'); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_dribbble')) : ?><a href="https://dribbble.com/<?php echo get_theme_mod('solopine_dribbble'); ?>" target="_blank"><i class="fa fa-dribbble"></i></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_soundcloud')) : ?><a href="https://soundcloud.com/<?php echo get_theme_mod('solopine_soundcloud'); ?>" target="_blank"><i class="fa fa-soundcloud"></i></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_vimeo')) : ?><a href="https://vimeo.com/<?php echo get_theme_mod('solopine_vimeo'); ?>" target="_blank"><i class="fa fa-vimeo-square"></i></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_linkedin')) : ?><a href="<?php echo esc_url(get_theme_mod('solopine_linkedin')); ?>" target="_blank"><i class="fa fa-linkedin"></i></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_snapchat')) : ?><a href="https://snapchat.com/add/<?php echo esc_html(get_theme_mod('solopine_snapchat')); ?>" target="_blank"><i class="fa fa-snapchat-ghost"></i></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_email')) : ?><a href="mailto:<?php echo get_theme_mod('solopine_email'); ?>"><i class="fa fa-envelope-o"></i></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_rss')) : ?><a href="<?php echo esc_url(get_theme_mod('solopine_rss')); ?>" target="_blank"><i class="fa fa-rss"></i></a><?php endif; ?>
<?php }
}

/*
* Get Social Follow Icons (Footer)
*/
if(!function_exists('florence_core_get_social_icons_footer')) {
function florence_core_get_social_icons_footer() { ?>
	<?php if(get_theme_mod('solopine_facebook')) : ?><a href="https://facebook.com/<?php echo get_theme_mod('solopine_facebook'); ?>" target="_blank"><i class="fa fa-facebook"></i> <span><?php esc_html_e( 'Facebook', 'florence-core' ); ?></span></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_twitter')) : ?><a href="https://twitter.com/<?php echo get_theme_mod('solopine_twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i> <span><?php esc_html_e( 'Twitter', 'florence-core' ); ?></span></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_instagram')) : ?><a href="https://instagram.com/<?php echo get_theme_mod('solopine_instagram'); ?>" target="_blank"><i class="fa fa-instagram"></i> <span><?php esc_html_e( 'Instagram', 'florence-core' ); ?></span></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_pinterest')) : ?><a href="https://pinterest.com/<?php echo get_theme_mod('solopine_pinterest'); ?>" target="_blank"><i class="fa fa-pinterest"></i> <span><?php esc_html_e( 'Pinterest', 'florence-core' ); ?></span></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_bloglovin')) : ?><a href="https://bloglovin.com/<?php echo get_theme_mod('solopine_bloglovin'); ?>" target="_blank"><i class="fa fa-heart"></i> <span><?php esc_html_e( 'Bloglovin', 'florence-core' ); ?></span></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_tumblr')) : ?><a href="https://<?php echo esc_html(get_theme_mod('solopine_tumblr')); ?>.tumblr.com/" target="_blank"><i class="fa fa-tumblr"></i> <span><?php esc_html_e( 'Tumblr', 'florence-core' ); ?></span></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_youtube')) : ?><a href="https://youtube.com/<?php echo get_theme_mod('solopine_youtube'); ?>" target="_blank"><i class="fa fa-youtube-play"></i> <span><?php esc_html_e( 'Youtube', 'florence-core' ); ?></span></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_dribbble')) : ?><a href="https://dribbble.com/<?php echo get_theme_mod('solopine_dribbble'); ?>" target="_blank"><i class="fa fa-dribbble"></i> <span><?php esc_html_e( 'Dribbble', 'florence-core' ); ?></span></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_soundcloud')) : ?><a href="https://soundcloud.com/<?php echo get_theme_mod('solopine_soundcloud'); ?>" target="_blank"><i class="fa fa-soundcloud"></i> <span><?php esc_html_e( 'Soundcloud', 'florence-core' ); ?></span></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_vimeo')) : ?><a href="https://vimeo.com/<?php echo get_theme_mod('solopine_vimeo'); ?>" target="_blank"><i class="fa fa-vimeo-square"></i> <span><?php esc_html_e( 'Vimeo', 'florence-core' ); ?></span></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_linkedin')) : ?><a href="<?php echo esc_url(get_theme_mod('solopine_linkedin')); ?>" target="_blank"><i class="fa fa-linkedin"></i> <span><?php esc_html_e( 'LinkedIn', 'florence-core' ); ?></span></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_snapchat')) : ?><a href="https://snapchat.com/add/<?php echo esc_html(get_theme_mod('solopine_snapchat')); ?>" target="_blank"><i class="fa fa-snapchat-ghost"></i> <span><?php esc_html_e( 'Snapchat', 'florence-core' ); ?></span></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_email')) : ?><a href="mailto:<?php echo get_theme_mod('solopine_email'); ?>"><i class="fa fa-envelope-o"></i> <span><?php esc_html_e( 'E-mail', 'florence-core' ); ?></span></a><?php endif; ?>
	<?php if(get_theme_mod('solopine_rss')) : ?><a href="<?php echo esc_url(get_theme_mod('solopine_rss')); ?>" target="_blank"><i class="fa fa-rss"></i> <span><?php esc_html_e( 'RSS', 'florence-core' ); ?></span></a><?php endif; ?>
	
<?php }
}

/*
* Author Social Links
*/
if(!function_exists('solopine_contactmethods')) {
function solopine_contactmethods( $contactmethods ) {

	$contactmethods['twitter']   = esc_html__('Twitter Username', 'florence-core');
	$contactmethods['facebook']  = esc_html__('Facebook Username', 'florence-core');
	$contactmethods['tumblr']    = esc_html__('Tumblr Username', 'florence-core');
	$contactmethods['instagram'] = esc_html__('Instagram Username', 'florence-core');
	$contactmethods['pinterest'] = esc_html__('Pinterest Username', 'florence-core');

	return $contactmethods;
}
}
add_filter('user_contactmethods','solopine_contactmethods',10,1);

if(!function_exists('florence_core_get_author_social')) {
function florence_core_get_author_social() { ?>
	<?php if(get_the_author_meta('facebook')) : ?><a target="_blank" class="author-social" href="https://facebook.com/<?php echo the_author_meta('facebook'); ?>"><i class="fa fa-facebook"></i></a><?php endif; ?>
	<?php if(get_the_author_meta('twitter')) : ?><a target="_blank" class="author-social" href="https://twitter.com/<?php echo the_author_meta('twitter'); ?>"><i class="fa fa-twitter"></i></a><?php endif; ?>
	<?php if(get_the_author_meta('instagram')) : ?><a target="_blank" class="author-social" href="https://instagram.com/<?php echo the_author_meta('instagram'); ?>"><i class="fa fa-instagram"></i></a><?php endif; ?>
	<?php if(get_the_author_meta('pinterest')) : ?><a target="_blank" class="author-social" href="https://pinterest.com/<?php echo the_author_meta('pinterest'); ?>"><i class="fa fa-pinterest"></i></a><?php endif; ?>
	<?php if(get_the_author_meta('tumblr')) : ?><a target="_blank" class="author-social" href="https://<?php echo the_author_meta('tumblr'); ?>.tumblr.com/"><i class="fa fa-tumblr"></i></a><?php endif; ?>
<?php }
}