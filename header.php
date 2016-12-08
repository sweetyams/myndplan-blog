<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head <?php do_action( 'add_head_attributes' ); ?>>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
		<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/assets/images/icons/favicon.png" />
		<script src="https://use.typekit.net/ojv4gvu.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
		<link rel="stylesheet" href="https://s3.amazonaws.com/icomoon.io/25495/Myndplan/style.css?8j8dwl">
		<script type="text/javascript">
    window.heap=window.heap||[],heap.load=function(e,t){window.heap.appid=e,window.heap.config=t=t||{};var r=t.forceSSL||"https:"===document.location.protocol,a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=(r?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+e+".js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n);for(var o=function(e){return function(){heap.push([e].concat(Array.prototype.slice.call(arguments,0)))}},p=["addEventProperties","addUserProperties","clearEventProperties","identify","removeEventProperty","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=o(p[c])};
      heap.load("3457144130");
</script>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="row ">
		<div class="title-bar" data-responsive-toggle="site-navigation">
			<button class="menu-icon" type="button" data-toggle="mobile-menu"></button>
			<div class="title-bar-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</div>
		</div>

		<nav id="site-navigation" class="main-navigation top-bar" role="navigation">
			<div class="top-bar-left">
				<a href="<?php echo home_url(); ?>"><div class="logo">Myndplan</div></a>
			</div>
			<div class="top-bar-right">
				<?php foundationpress_top_bar_r(); ?>
				
				<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>
					<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
				<?php endif; ?>

				<ul class="menu-icons">
				<!-- <li><a><span class="icon-search"></span></a></li> -->
				<?php if( have_rows('header_icons', 'options') ): 
	    			while ( have_rows('header_icons', 'options') ) : the_row();
			        ?>
			        <li><a target="_blank" href="<?php the_sub_field('link'); ?>"><span class="icon-<?php the_sub_field('icon'); ?>"></span></a></li>
			        <?php endwhile;
					else :
 				endif; ?>
			</ul>

			

			</div>

		</nav>
		</div>
	</header>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' );
