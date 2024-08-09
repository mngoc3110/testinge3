<?php
//////////////////////////////////////////////////////////////////
// Add Dynamic CSS
//////////////////////////////////////////////////////////////////
if(!function_exists('solopine_dynamic_css')) {
function solopine_dynamic_css() {
	$css = '';
	
	if(get_theme_mod('solopine_header_padding_top')) {
		$css .= '#logo { padding-top: '. get_theme_mod('solopine_header_padding_top') .'px; }';
	}
	if(get_theme_mod('solopine_header_padding_bottom')) {
		$css .= '#logo { padding-bottom: '. get_theme_mod('solopine_header_padding_bottom') .'px; }';
	}
	if(get_theme_mod('solopine_topbar_bg')) {
		$css .= '#top-bar, .slicknav_menu { background: '. get_theme_mod('solopine_topbar_bg') .'; }';
	}
	if(get_theme_mod('solopine_topbar_nav_color')) {
		$css .= '.menu li a, .slicknav_nav a { color: '. get_theme_mod('solopine_topbar_nav_color') .'; }';
	}
	if(get_theme_mod('solopine_topbar_nav_color_active')) {
		$css .= '.menu li.current-menu-item > a, .menu li.current_page_item > a, .menu li a:hover { color: '. get_theme_mod('solopine_topbar_nav_color_active') .'; }';
	}
	if(get_theme_mod('solopine_topbar_nav_color_active')) {
		$css .= '.slicknav_nav a:hover { color: '. get_theme_mod('solopine_topbar_nav_color_active') .'; background:none; }';
	}
	if(get_theme_mod('solopine_drop_bg')) {
		$css .= '.menu .sub-menu, .menu .children { background: '. get_theme_mod('solopine_drop_bg') .'; }';
	}
	if(get_theme_mod('solopine_drop_border')) {
		$css .= 'ul.menu ul a, .menu ul ul a { border-top: 1px solid '. get_theme_mod('solopine_drop_border') .'; }';
	}
	if(get_theme_mod('solopine_drop_text_color')) {
		$css .= 'ul.menu ul a, .menu ul ul a { color: '. get_theme_mod('solopine_drop_text_color') .'; }';
	}
	if(get_theme_mod('solopine_drop_text_hover_color')) {
		$css .= 'ul.menu ul a:hover, .menu ul ul a:hover { color: '. get_theme_mod('solopine_drop_text_hover_color') .'; }';
	}
	if(get_theme_mod('solopine_drop_text_hover_bg')) {
		$css .= 'ul.menu ul a:hover, .menu ul ul a:hover { background: '. get_theme_mod('solopine_drop_text_hover_bg') .'; }';
	}
	if(get_theme_mod('solopine_topbar_social_color')) {
		$css .= '#top-social a i { color: '. get_theme_mod('solopine_topbar_social_color') .'; }';
	}
	if(get_theme_mod('solopine_topbar_social_color_hover')) {
		$css .= '#top-social a:hover i { color: '. get_theme_mod('solopine_topbar_social_color_hover') .'; }';
	}
	if(get_theme_mod('solopine_topbar_search_bg')) {
		$css .= '#top-search a { background: '. get_theme_mod('solopine_topbar_search_bg') .'; }';
	}
	if(get_theme_mod('solopine_topbar_search_magnify')) {
		$css .= '#top-search a { color: '. get_theme_mod('solopine_topbar_search_magnify') .'; }';
	}
	if(get_theme_mod('solopine_footer_insta_bg')) {
		$css .= '#footer-instagram { background: '. get_theme_mod('solopine_footer_insta_bg') .'; }';
	}
	if(get_theme_mod('solopine_footer_insta_text')) {
		$css .= '#footer-instagram h4.block-heading { color: '. get_theme_mod('solopine_footer_insta_text') .'; }';
	}
	if(get_theme_mod('solopine_footer_social_bg')) {
		$css .= '#footer-social { background: '. get_theme_mod('solopine_footer_social_bg') .'; }';
	}
	if(get_theme_mod('solopine_footer_social_bg')) {
		$css .= '#footer-social a i { color: '. get_theme_mod('solopine_footer_social_bg') .'; }';
	}
	if(get_theme_mod('solopine_footer_social_icon')) {
		$css .= '#footer-social a i { background: '. get_theme_mod('solopine_footer_social_icon') .'; }';
	}
	if(get_theme_mod('solopine_footer_social_icon')) {
		$css .= '#footer-social a { color: '. get_theme_mod('solopine_footer_social_icon') .'; }';
	}
	if(get_theme_mod('solopine_footer_copyright_text')) {
		$css .= '#footer-copyright { color: '. get_theme_mod('solopine_footer_copyright_text') .'; }';
	}
	if(get_theme_mod('solopine_footer_copyright_bg')) {
		$css .= '#footer-copyright { background: '. get_theme_mod('solopine_footer_copyright_bg') .'; }';
	}
	if(get_theme_mod('solopine_sidebar_heading')) {
		$css .= '.widget-heading { color: '. get_theme_mod('solopine_sidebar_heading') .'; }';
	}
	if(get_theme_mod('solopine_sidebar_heading_line')) {
		$css .= '.widget-heading > span:before, .widget-heading > span:after { border-color: '. get_theme_mod('solopine_sidebar_heading_line') .'; }';
	}
	if(get_theme_mod('solopine_sidebar_social_icon')) {
		$css .= '.widget-social a i { color: '. get_theme_mod('solopine_sidebar_social_icon') .'; }';
	}
	if(get_theme_mod('solopine_sidebar_social_bg')) {
		$css .= '.widget-social a i { background: '. get_theme_mod('solopine_sidebar_social_bg') .'; }';
	}
	if(get_theme_mod('solopine_color_accent')) {
		$css .= 'a, .author-content a.author-social:hover, .woocommerce .star-rating { color: '. get_theme_mod('solopine_color_accent') .'; }';
	}
	if(get_theme_mod('solopine_color_accent')) {
		$css .= '.more-button:hover, .post-share a i:hover, .post-pagination a:hover, .pagination a:hover, .widget .tagcloud a, .side-count, .cart-contents .sp-count { background: '. get_theme_mod('solopine_color_accent') .'; }';
	}
	if(get_theme_mod('solopine_color_accent')) {
		$css .= '.more-button:hover, .post-share a i:hover, .post-entry blockquote { border-color: '. get_theme_mod('solopine_color_accent') .'; }';
	}
	if(get_theme_mod('solopine_post_title_lowercase')) {
		$css .= '.post-header h1 a, .post-header h2 a, .post-header h1 { text-transform:none; letter-spacing:1px; }';
	}
	
	if( !empty( $css ) ) {
		wp_add_inline_style( 'solopine_style', $css );
	}
}
}
add_action( 'wp_enqueue_scripts', 'solopine_dynamic_css' );

if(!function_exists('solopine_dynamic_customizer_css')) {
function solopine_dynamic_customizer_css() {
	
	$css = '.editor-styles-wrapper p a { color: '. get_theme_mod('solopine_color_accent', '#EF9D87') .'; }';
	
	return $css;
	
}
}