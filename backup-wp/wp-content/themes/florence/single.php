<?php
	/****
	* Get Post Layout
	****/
?>

	<?php 
	
		$florence_get_template = get_page_template_slug( $post->ID );

		if($florence_get_template == 'single-sidebar.php') {
			get_template_part('single', 'sidebar');
		} elseif($florence_get_template == 'single-fullwidth.php') {
			get_template_part('single', 'fullwidth');
		} elseif($florence_get_template == 'single-fullwidth-narrow.php') {
			get_template_part('single', 'fullwidth-narrow');
		} else {
			
			if(get_theme_mod('solopine_post_layout', 'sidebar') == 'sidebar') {
				$florence_default_template = 'post_sidebar';
			} elseif(get_theme_mod('solopine_post_layout', 'sidebar') == 'full_narrow') {
				$florence_default_template = 'post_fullwidth_narrow';
			} else {
				$florence_default_template = 'post_fullwidth';
			}
			
			if($florence_default_template == 'post_sidebar') {
				get_template_part('single', 'sidebar');
			} elseif($florence_default_template == 'post_fullwidth_narrow') {
				get_template_part('single', 'fullwidth-narrow');
			} else {
				get_template_part('single', 'fullwidth');
			}

		}
		
	?>