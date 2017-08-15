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

<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
<script>
   WebFontConfig = {
      typekit: { id: 'ojv4gvu' },
      google: { families: ['Lora'] }
   };

   (function(d) {
      var wf = d.createElement('script'), s = d.scripts[0];
      wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
      wf.async = true;
      s.parentNode.insertBefore(wf, s);
   })(document);
</script>

		<link rel="stylesheet" href="https://i.icomoon.io/public/83069ee1f8/MyndplanBlog/style.css">
		<script type="text/javascript">
    window.heap=window.heap||[],heap.load=function(e,t){window.heap.appid=e,window.heap.config=t=t||{};var r=t.forceSSL||"https:"===document.location.protocol,a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=(r?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+e+".js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n);for(var o=function(e){return function(){heap.push([e].concat(Array.prototype.slice.call(arguments,0)))}},p=["addEventProperties","addUserProperties","clearEventProperties","identify","removeEventProperty","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=o(p[c])};
      heap.load("3457144130");
</script>
	</head>
	<body <?php body_class(); ?>>

	<?php do_action( 'foundationpress_after_body' ); ?>

<div id="navigation" class="overlay">

  <!-- Button to close the overlay navigation -->

  <!-- Overlay content -->
  <div class="row ">
  	<div class="menu-limiter">

  	<div class="row">
  	  	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><span class="icon-x"></span></a>

	  <?php dynamic_sidebar( 'menu-widgets' ); ?>
	  </div></div>
  </div>

</div>
	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

<!-- The overlay -->


	<header id="masthead" class="site-header" role="banner">
		<div class="row ">
		<nav id="site-navigation" class="main-navigation top-bar" role="navigation">
			<div class="top-bar-left">
				<a class="top-logo" href="<?php echo home_url(); ?>"><span class="icon-mp_icon"></span><span class="top-title">Blog</span></a>
			</div>
			<div class="top-bar-right">
				<?php foundationpress_top_bar_r(); ?>
				
				<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>
					<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
				<?php endif; ?>
			</div>

		</nav>
		</div>
	</header>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' );
