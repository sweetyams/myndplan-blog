<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div class="post">
	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<div class="image zoom" ><?php the_post_thumbnail(); ?></div>
	</a>
	<?php endif; ?>
	
	<div class="info">
		<div class="title">
			<h5>
			<?php
	$cat = array();
	foreach((get_the_category()) as $category) { 
	    array_push($cat, '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>');
	}
	echo implode('<span class="divider"></span>', $cat);
	?>
			</h5>

			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"> <?php the_title(); ?> <span><?php the_field('secondary_title'); ?></span></a></h2>
		</div>
		
	</div>
</div>
