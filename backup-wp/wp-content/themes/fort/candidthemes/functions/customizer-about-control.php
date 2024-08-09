<?php 
// Doing this customizer thang!
if ( ! class_exists( 'Fort_Customize_Static_Text_Control' ) ){
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
class Fort_Customize_Static_Text_Control extends WP_Customize_Control {
	/**
	 * Control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'static-text';

	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
	}

	protected function render_content() {
			?>
		<div class="description customize-control-description">
			
			<h2><?php esc_html_e('Get premium version', 'fort')?></h2>
			<p><?php esc_html_e('Buy Pro and get more features and support.', 'fort')?> </p>
			<p>
				<a href="<?php echo esc_url('https://www.candidthemes.com/themes/fort-pro'); ?>" target="_blank"><?php esc_html_e( 'Buy Pro Now!', 'fort' ); ?></a>
			</p>
			<h2><?php esc_html_e('About Fort', 'fort')?></h2>
			<p><?php esc_html_e('Fort is clean and minimal WordPress theme for blog website.', 'fort')?> </p>
			<p>
				<a href="<?php echo esc_url('https://fort.candidthemes.com/'); ?>" target="_blank"><?php esc_html_e( 'Fort All Demos', 'fort' ); ?></a>
			</p>
			<h3><?php esc_html_e('Documentation', 'fort')?></h3>
			<p><?php esc_html_e('Read documentation to learn more about theme.', 'fort')?> </p>
			<p>
				<a href="<?php echo esc_url('http://docs.candidthemes.com/fort/'); ?>" target="_blank"><?php esc_html_e( 'Fort Documentation', 'fort' ); ?></a>
			</p>
			
			<h3><?php esc_html_e('Support', 'fort')?></h3>
			<p><?php esc_html_e('For support, Kindly contact us and we would be happy to assist!', 'fort')?> </p>
			
			<p>
				<a href="<?php echo esc_url('https://www.candidthemes.com/support-tickets/'); ?>" target="_blank"><?php esc_html_e( 'Fort Support', 'fort' ); ?></a>
			</p>
			<h3><?php esc_html_e( 'Rate This Theme', 'fort' ); ?></h3>
			<p><?php esc_html_e('If you like fort Kindly Rate this Theme', 'fort')?> </p>
			<p>
				<a href="<?php echo esc_url('https://wordpress.org/support/theme/fort/reviews/#new-post'); ?>" target="_blank"><?php esc_html_e( 'Add Your Review', 'fort' ); ?></a>
			</p>
			</div>
			
		<?php
	}

}
}