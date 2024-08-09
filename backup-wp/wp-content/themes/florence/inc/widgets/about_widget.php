<?php
/**
 * Plugin Name: About Widget
 */

if(!class_exists('solopine_about_widget')) {
 
add_action( 'widgets_init', 'solopine_about_load_widget' );

function solopine_about_load_widget() {
	register_widget( 'solopine_about_widget' );
}

class solopine_about_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function __construct() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'solopine_about_widget', 'description' => esc_html__('A widget that displays an About widget', 'florence') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'solopine_about_widget' );

		/* Create the widget. */
		parent::__construct( 'solopine_about_widget', esc_html__('Florence: About Me', 'florence'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$image = $instance['image'];
		$description = $instance['description'];
		
		/* Before widget */
		echo wp_kses_post( $args['before_widget'] );

		/* Display the widget title if one was input */
		if ( $title ) {
			echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );
		}
		?>
			
			<div class="about-widget">
			
			<?php if($image) : ?>
			<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" />
			<?php endif; ?>
			
			<?php if($description) : ?>
			<p><?php echo wp_kses_post($description); ?></p>
			<?php endif; ?>	
			
			</div>
			
		<?php

		/* After widget (defined by themes). */
		echo wp_kses_post( $args['after_widget'] );
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['image'] = strip_tags( $new_instance['image'] );
		$instance['description'] = $new_instance['description'];

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'About Me', 'image' => '', 'description' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title', 'florence' ); ?>:</label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" style="width:96%;" />
		</p>
		
		<!-- image url -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'image' )); ?>"><?php esc_html_e( 'Image URL', 'florence' ); ?>:</label>
			<input id="<?php echo esc_attr($this->get_field_id( 'image' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'image' )); ?>" value="<?php echo esc_url($instance['image']); ?>" style="width:96%;" /><br />
			<small><?php esc_html_e( 'Enter the image URL you want to use. You can upload your image via Media > Add New', 'florence' ); ?></small>
		</p>

		<!-- description -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'description' )); ?>"><?php esc_html_e( 'About me text', 'florence' ); ?>:</label>
			<textarea id="<?php echo esc_attr($this->get_field_id( 'description' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'description' )); ?>" style="width:95%;" rows="6"><?php echo esc_textarea($instance['description']); ?></textarea>
		</p>


	<?php
	}
}
}
?>