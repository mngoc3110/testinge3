<?php

if ( ! function_exists( 'fort_load_widgets' ) ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function fort_load_widgets() {

        // Author Widget.
        register_widget( 'Fort_Author_Widget' );
		
		// Social Widget.
        register_widget( 'Fort_Social_Widget' );

        // Recent Posts Widget.
        register_widget( 'Fort_Recent_Post' );

    }

endif;
add_action( 'widgets_init', 'fort_load_widgets' );