<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	
	<div id="top-bar">
		
		<div class="container">
			
			<div id="navigation-wrapper">
				<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'main-menu', 'menu_class' => 'menu' ) ); ?>
			</div>
			
			<div class="menu-mobile"></div>
			
			<?php if(!get_theme_mod('solopine_topbar_social_check')) : ?>
			<div id="top-social">
				
				<?php if(function_exists('florence_core_get_social_icons')) { florence_core_get_social_icons(); } ?>
				
				<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) : ?>
				<?php if(!get_theme_mod('solopine_woo_cart_icon')) : ?>
				<div id="sp-shopping-cart">
				<?php $count = WC()->cart->cart_contents_count; ?>
					<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_html_e( 'View your shopping cart', 'florence' ); ?>"><?php if ( $count >= 0 ) echo '<span class="sp-count">' . esc_html($count) . '</span>'; ?></a>
				</div>
				<?php endif; ?>
				<?php endif; ?>
				
			</div>
			<?php endif; ?>
			
			<?php if(!get_theme_mod('solopine_topbar_search_check')) : ?>
			<div id="top-search">
					<a href="#"><i class="fa fa-search"></i></a>
			</div>
			<div class="show-search">
				<?php get_search_form(); ?>
			</div>
			<?php endif; ?>
			
		</div>
	
	</div>
	
	<header id="header">
	
		<div class="container">
			
			<div id="logo">
				
				<?php if(!get_theme_mod('solopine_logo')) : ?>
					
					<?php if(is_front_page()) : ?>
						<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php esc_attr(bloginfo( 'name' )); ?>" /></a></h1>
					<?php else : ?>
						<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php esc_attr(bloginfo( 'name' )); ?>" /></a></h2>
					<?php endif; ?>
					
				<?php else : ?>
					
					<?php if(is_front_page()) : ?>
						<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_theme_mod('solopine_logo')); ?>" alt="<?php esc_attr(bloginfo( 'name' )); ?>" /></a></h1>
					<?php else : ?>
						<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_theme_mod('solopine_logo')); ?>" alt="<?php esc_attr(bloginfo( 'name' )); ?>" /></a></h2>
					<?php endif; ?>
					
				<?php endif; ?>
				
			</div>
			
		</div>
		
	</header>