<?php
/*
* Twitter ampersand entity decode
*/
if(!function_exists('florence_core_social_title')) {
function florence_core_social_title( $title ) {
    $title = html_entity_decode( $title );
    $title = urlencode( $title );
    return $title;
}
}

/*
* Get share buttons
*/
if(!function_exists('florence_core_get_social_share')) {
function florence_core_get_social_share() {

	// Get Featured image for pinterest
	$pin_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID())); ?>

	<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(the_permalink()); ?>"><i class="fa fa-facebook"></i></a>
	<a target="_blank" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20article:%20<?php print florence_core_social_title( get_the_title() ); ?>%20-%20<?php echo urlencode(the_permalink()); ?>"><i class="fa fa-twitter"></i></a>
	<?php $pin_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
	<a target="_blank" data-pin-do="skipLink" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(the_permalink()); ?>&media=<?php echo $pin_image; ?>&description=<?php the_title(); ?>"><i class="fa fa-pinterest"></i></a>
	<a class="share-button linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(the_permalink()); ?>&title=<?php print florence_core_social_title( get_the_title() ); ?>"><i class="fa fa-linkedin"></i></a>
	<?php if ( comments_open() ) : ?><a href="<?php echo get_permalink(); ?>#comments_wrapper"><i class="fa fa-comments"></i></a><?php endif; ?>


<?php }
}