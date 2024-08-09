<?php
/**
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Hawthorn for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'florence_register_required_plugins' );


function florence_register_required_plugins() {

	$plugins = array(

		array(
			'name'     				=> 'Florence Core',
			'slug'     				=> 'florence-core',
			'source'   				=> get_stylesheet_directory() . '/plugins/florence-core.zip',
			'required' 				=> true,
			'version' 				=> '1.1',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'     				=> 'Vafpress Post Formats UI',
			'slug'     				=> 'vafpress-post-formats-ui-develop',
			'source'   				=> get_stylesheet_directory() . '/plugins/vafpress-post-formats-ui-develop.zip',
			'required' 				=> true,
			'version' 				=> '1.6.2',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'      => 'Smash Balloon Instagram Feed',
			'slug'      => 'instagram-feed',
			'required'  => false,
		),
		array(
			'name'     				=> 'Contact Form 7',
			'slug'     				=> 'contact-form-7',
			'required' 				=> false,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		)

	);

	$config = array(
		'id'           => 'florence',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',

	);

	tgmpa( $plugins, $config );
}