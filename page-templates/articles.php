<?php
/*
Template Name: Articles
*/
get_header(); ?>


<div class="row">
 <div class="page-header">
 	<h2 class="lora">Articles</h2>
 </div>
</div>

<div class="row">
	<div class="article-posts">


  <?php
$paged = (get_query_var('page')) ? get_query_var('page') : 1;
$args = array( 'post_type' => 'post', 'posts_per_page' => '6', 'paged' => $paged );
$wp_query = new WP_Query( $args );


if ( $wp_query->have_posts() ) : ?>

<?php do_action( 'foundationpress_before_content' ); ?>

<?php while ( $wp_query->have_posts() ) : ?>
<?php $wp_query->the_post(); ?>

	<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

		<?php endwhile; ?>
<?php endif;?>
		  <?php do_action( 'foundationpress_before_pagination' ); ?>
  <?php do_action( 'foundationpress_after_content' ); ?>

	</div>
</div>

<?php if ( function_exists('FoundationPress_pagination') ) { FoundationPress_pagination(); } else if ( is_paged() ) { ?>
    <nav id="post-nav">
        <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'FoundationPress' ) ); ?></div>
        <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'FoundationPress' ) ); ?></div>
    </nav>
<?php } ?>


<?php get_template_part( 'template-parts/subscribe-section', 'none' ); ?>

<?php get_footer();
