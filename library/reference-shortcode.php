<?php
/**
 * Refereence Shortcode
 *
 * @package FoundationPress
 */

function recent_posts_function($atts) {	
	$num = $atts['num'];
	return "<a id='returntoread-" . $num . "' class='reference-item' href='#reference-" . $num . "'>" . $num . "</a>";
}

function register_shortcodes(){
   add_shortcode('ref', 'recent_posts_function');
}

add_action( 'init', 'register_shortcodes');