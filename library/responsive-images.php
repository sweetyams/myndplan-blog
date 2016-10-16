<?php
/**
 * Configure responsive images sizes
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 2.6.0
 */

function paulund_remove_default_image_sizes( $sizes) {
    unset( $sizes['thumbnail']);
    unset( $sizes['medium']);
    unset( $sizes['large']);
     
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'paulund_remove_default_image_sizes');

// Add additional image sizes
add_image_size( 'fp-small', 1024 );
add_image_size( 'fp-medium', 2000 );
add_image_size( 'fp-large', 3000 );

// Register the new image sizes for use in the add media modal in wp-admin
add_filter( 'image_size_names_choose', 'wpshout_custom_sizes' );
function wpshout_custom_sizes( $sizes ) {
	return array_merge( $sizes, array(
		'fp-small'  => __( 'FP Small' ),
		'fp-medium' => __( 'FP Medium' ),
		'fp-large'  => __( 'FP Large' ),
	) );
}

// Add custom image sizes attribute to enhance responsive image functionality for content images
function foundationpress_adjust_image_sizes_attr( $sizes, $size ) {

	// Actual width of image
	$width = $size[0];

	3000 < $width && $sizes = '(max-width: 29999px) 98vw, 3000px';
	1600 > $width && $sizes = '(max-width: 1599px) 98vw, 2000px';
	
	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'foundationpress_adjust_image_sizes_attr', 10 , 2 );

// Remove inline width and height attributes for post thumbnails
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', '', $html );
	return $html;
}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );