<?php
//////////////////////////////////////////////////////////////////
// Set Content Width
//////////////////////////////////////////////////////////////////
if ( ! isset( $content_width ) )
	$content_width = 1080;

//////////////////////////////////////////////////////////////////
// Theme set up
//////////////////////////////////////////////////////////////////
add_action( 'after_setup_theme', 'solopine_theme_setup' );

if ( !function_exists('solopine_theme_setup') ) {

	function solopine_theme_setup() {
	
		// Register navigation menu
		register_nav_menus(
			array(
				'main-menu' => esc_html__('Primary Menu', 'florence'),
			)
		);
		
		// Title tag
		add_theme_support( 'title-tag' );
		
		// Localization support
		load_theme_textdomain('florence', get_template_directory() . '/lang');
		
		// Background
		$solopine_background = array(
			'default-color' => 'f5f5f5'
		);
		add_theme_support( 'custom-background', $solopine_background );
		
		// Post formats
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );
		
		// Feed Links
		add_theme_support( 'automatic-feed-links' );
		
		// Featured image
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'solopine-full-thumb', 1080, 0, true );
		add_image_size( 'solopine-misc-thumb', 500, 380, true );
		
		// WooCommerce Support
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		
		// Gutenberg
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'editor-style.css' );
		add_editor_style( solopine_fonts_url() );
		
	}

}

//////////////////////////////////////////////////////////////////
// Register & enqueue styles/scripts
//////////////////////////////////////////////////////////////////
// Register Fonts
if(!function_exists('solopine_fonts_url')) {
function solopine_fonts_url() {
	$font_url = '';
	if ( 'off' !== _x( 'on', 'Google font: on or off', 'florence' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Oswald:400,700|Crimson Text:400,700,400italic,700italic|Open Sans:400italic,700italic,400,700&subset=cyrillic,latin' ), "https://fonts.googleapis.com/css" );
	}
	return $font_url;
}
}

add_action( 'wp_enqueue_scripts','solopine_load_scripts' );
if(!function_exists('solopine_load_scripts')) {
function solopine_load_scripts() {

	// Register scripts and styles
	wp_enqueue_style('solopine_style', get_stylesheet_directory_uri() . '/style.css', array(), '1.5');
	wp_enqueue_style('bxslider-css', get_template_directory_uri() . '/css/jquery.bxslider.css');
	wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/css/font-awesome.min.css');
	if(!get_theme_mod('solopine_responsive')) {
	wp_enqueue_style('solopine_responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1.5');
	}

	wp_enqueue_script('slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array( 'jquery' ), '', true);
	wp_enqueue_script('bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array( 'jquery' ), '', true);
	wp_enqueue_script('fitvids', get_template_directory_uri() . '/js/fitvids.js', array( 'jquery' ), '', true);
	wp_enqueue_script('solopine_scripts', get_template_directory_uri() . '/js/solopine.js', array( 'jquery' ), '', true);
	wp_enqueue_script('retina', get_template_directory_uri() . '/js/retina.min.js', array( 'jquery' ), '', true);
	
	// Enqueue fonts
	wp_enqueue_style( 'solopine_fonts', solopine_fonts_url(), array(), '1.5' );
	
	if (is_singular() && get_option('thread_comments'))	wp_enqueue_script('comment-reply');
	
}
}

// Add customizer colors to Gutenberg editor
if(!function_exists('solopine_editor_style_customizer')) {
function solopine_editor_style_customizer() {
	wp_enqueue_style( 'solopine-editor-style-customizer', get_theme_file_uri( 'editor-style-customizer.css' ), false, '1.0', 'all' );
	wp_add_inline_style( 'solopine-editor-style-customizer', solopine_dynamic_customizer_css());
}
}
add_action( 'enqueue_block_editor_assets', 'solopine_editor_style_customizer' );

//////////////////////////////////////////////////////////////////
// Include files
//////////////////////////////////////////////////////////////////

// Theme Options
include(get_template_directory() . '/functions/customizer/sp_custom_controller.php');
include(get_template_directory() . '/functions/customizer/sp_customizer_settings.php');
include(get_template_directory() . '/functions/customizer/sp_customizer_style.php');

// Widgets
include(get_template_directory() . '/inc/widgets/about_widget.php');
include(get_template_directory() . '/inc/widgets/social_widget.php');
include(get_template_directory() . '/inc/widgets/facebook_widget.php');
include(get_template_directory() . '/inc/widgets/post_widget.php');
include(get_template_directory() . '/inc/widgets/promo_widget.php');

// TGMPA
include(get_template_directory() . '/florence-tgm.php');

//////////////////////////////////////////////////////////////////
// Register footer widgets
//////////////////////////////////////////////////////////////////
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => esc_html__('Sidebar', 'florence'),
		'id' => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-heading"><span>',
		'after_title' => '</span></h4>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Instagram', 'florence'),
		'id' => 'sidebar-2',
		'before_widget' => '<div id="%1$s" class="widget-instagram %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="block-heading">',
		'after_title' => '</h4>',
		'description' => wp_kses(__( '<a target="_blank" href="https://solopine.ticksy.com/article/14117/">Instructions</a> on how to set up your Instagram footer', 'florence'), array( 'a' => array( 'href' => array(), 'target' => array()))),
	));
}

//////////////////////////////////////////////////////////////////
// PAGINATION
//////////////////////////////////////////////////////////////////
if ( !function_exists('solopine_pagination') ) {
function solopine_pagination() {
	
	?>
	
	<div class="pagination">

		<div class="older"><?php next_posts_link(wp_kses(__( 'Older Posts <i class="fa fa-angle-double-right"></i>', 'florence'), array( 'i' => array( 'class' => array() )))); ?></div>
		<div class="newer"><?php previous_posts_link(wp_kses(__( '<i class="fa fa-angle-double-left"></i> Newer Posts', 'florence'), array( 'i' => array( 'class' => array() )))); ?></div>
	
	</div>
					
	<?php
	
}
}

//////////////////////////////////////////////////////////////////
// THE_CONTENT() READ MORE
//////////////////////////////////////////////////////////////////
if(!function_exists('solopine_read_more_link')) {
function solopine_read_more_link() {
    return '<p><a class="more-link" href="' . esc_url(get_permalink()) . '"><span class="more-button">' . esc_html__('Continue Reading', 'florence') . '</span></a></p>';
}
}
add_filter( 'the_content_more_link', 'solopine_read_more_link' );

//////////////////////////////////////////////////////////////////
// COMMENTS LAYOUT
//////////////////////////////////////////////////////////////////
if ( !function_exists('solopine_comments') ) {
	function solopine_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
			
			<div class="thecomment">
						
				<div class="author-img">
					<?php echo get_avatar($comment,$args['avatar_size']); ?>
				</div>
				
				<div class="comment-text">
					<span class="reply">
						<?php comment_reply_link(array_merge( $args, array('reply_text' => esc_html__('Reply', 'florence'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?>
						<?php edit_comment_link(esc_html__('Edit', 'florence')); ?>
					</span>
					<span class="author"><?php echo get_comment_author_link(); ?></span>
					<span class="date"><?php printf(esc_html__('%1$s at %2$s', 'florence'), get_comment_date(),  get_comment_time()) ?></span>
					<?php if ($comment->comment_approved == '0') : ?>
						<em><i class="icon-info-sign"></i> <?php esc_html_e('Comment awaiting approval', 'florence'); ?></em>
						<br />
					<?php endif; ?>
					<?php comment_text(); ?>
				</div>
						
			</div>
			
			
		</li>

		<?php 
	}
}

//////////////////////////////////////////////////////////////////
// PREVENT SCROLL ON READ MORE LINK
//////////////////////////////////////////////////////////////////
if ( !function_exists('solopine_remove_more_link_scroll') ) {
function solopine_remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
}
add_filter( 'the_content_more_link', 'solopine_remove_more_link_scroll' );

//////////////////////////////////////////////////////////////////
// Allow iframe
//////////////////////////////////////////////////////////////////
if(!function_exists('solopine_allow_iframe')) {
function solopine_allow_iframe( $allowedposttags ) {
	if ( !current_user_can( 'publish_posts' ) ) return $allowedposttags;
	$allowedposttags['iframe'] = array(
		'align' => true,
		'width' => true,
		'height' => true,
		'frameborder' => true,
		'name' => true,
		'src' => true,
		'id' => true,
		'class' => true,
		'style' => true,
		'scrolling' => true,
		'marginwidth' => true,
		'marginheight' => true,
	);
	return $allowedposttags;
}
}
add_filter( 'wp_kses_allowed_html', 'solopine_allow_iframe' );

//////////////////////////////////////////////////////////////////
// THE EXCERPT
//////////////////////////////////////////////////////////////////
if ( !function_exists('solopine_custom_excerpt_length') ) {
function solopine_custom_excerpt_length( $length ) {
	return 50;
}
}
add_filter( 'excerpt_length', 'solopine_custom_excerpt_length', 999 );

if ( !function_exists('solopine_string_limit_words') ) {
function solopine_string_limit_words($string, $word_limit)
{
	$words = explode(' ', $string, ($word_limit + 1));
	
	if(count($words) > $word_limit) {
		array_pop($words);
	}
	
	return implode(' ', $words);
}
}

//////////////////////////////////////////////////////////////////
// WooCommerce functions
//////////////////////////////////////////////////////////////////

// Make sure WooCommerce is active
if ( class_exists( 'WooCommerce' ) ) {
	
	// Create WooCommerce sidebar-1
	if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
			'name' => esc_html__('WooCommerce Sidebar', 'florence'),
			'id' => 'sidebar-3',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-heading"><span>',
			'after_title' => '</span></h4>',
			'description' => esc_html__('Widgets here will appear on your WooCommerce shop and product pages.', 'florence'),
		));
	}

}

// search filter limit to posts only
function searchfilter($query) {
 
    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('post'));
    }
 
return $query;
}
 
add_filter('pre_get_posts','searchfilter');