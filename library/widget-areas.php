<?php
/**
 * Register widget areas
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_sidebar_widgets' ) ) :
function foundationpress_sidebar_widgets() {
	register_sidebar(array(
	  'id' => 'sidebar-widgets',
	  'name' => __( 'Sidebar widgets', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this sidebar container.', 'foundationpress' ),
	  'before_widget' => '<article id="%1$s" class="widget %2$s">',
	  'after_widget' => '</article>',
	  'before_title' => '<h6>',
	  'after_title' => '</h6>',
	));

	register_sidebar(array(
	  'id' => 'post-widgets',
	  'name' => __( 'Post widgets', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this blog post container', 'foundationpress' ),
	  'before_widget' => '',
	  'after_widget' => '',
	  'before_title' => '<h6>',
	  'after_title' => '</h6>',
	));

	register_sidebar(array(
	  'id' => 'footer-widgets',
	  'name' => __( 'Footer widgets', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this footer container', 'foundationpress' ),
	  'before_widget' => '<article id="%1$s" class="small-6 columns widget %2$s">',
	  'after_widget' => '</article>',
	  'before_title' => '<h4>',
	  'after_title' => '</h4>',
	));

	register_sidebar(array(
	  'id' => 'menu-widgets',
	  'name' => __( 'Menu widgets', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this menu container', 'foundationpress' ),
	  'before_widget' => '<article id="%1$s" class="small-12 medium-6 large-3 columns widget %2$s">',
	  'after_widget' => '</article>',
	  'before_title' => '<h4>',
	  'after_title' => '</h4>',
	));

	register_sidebar(array(
	  'id' => 'single-widgets',
	  'name' => __( 'Single widgets', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this sidebar container', 'foundationpress' ),
	  'before_widget' => '<article id="%1$s" class="widget %2$s">',
	  'after_widget' => '</article>',
	  'before_title' => '<h4>',
	  'after_title' => '</h4>',
	));
}

add_action( 'widgets_init', 'foundationpress_sidebar_widgets' );
endif;
