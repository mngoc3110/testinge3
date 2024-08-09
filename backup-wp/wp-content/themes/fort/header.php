<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fort
 */
global $fort_theme_options;
$fort_theme_options = fort_get_options_value();
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	//wp_body_open hook from WordPress 5.2
	wp_body_open();
	?><div id="page" class="site">
		<?php

		/**
		 * fort_before_header hook.
		 *
		 * @since 1.0.0
		 *
		 * @hooked fort_do_skip_to_content_link - 10
		 *
		 */
		do_action('fort_before_header');

		/**
		 * fort_header hook.
		 *
		 * @since 1.0.0
		 *
		 * @hooked fort_construct_header - 10
		 */
		do_action('fort_header');
		?>
		<div id="content" class="site-content">