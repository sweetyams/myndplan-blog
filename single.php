<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>


<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>

	<?php
	if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) );
	endif;
	?>

	<div class="toc">
		<?php dynamic_sidebar('single-widgets'); ?>
	</div>

	<div class="image no-zoom" style="background-image: url(<?php echo $thumbnail[0]; ?>); background-position: center center;">
		<div class="meta">
			<div class="info">
				<?php foundationpress_entry_meta(); ?>
				<?php dynamic_sidebar('post-widgets'); ?>
			</div>
		</div>
	</div>

	<div id="single-post" class="row page-center" role="main">

		<div class="entry-content"> 
			<header>
				<h2 class="entry-title"><?php the_title(); ?> <span><?php the_field('secondary_title'); ?></span></h2>

				<div class="catformats">
					<!-- <div class="categories "><span class="icon-category"></span></div> -->
					<h5>

						<?php
						$cat = array();
						$result = get_the_category();
						if(get_the_category()){
							?><span>Categories: </span><?php
						}

						foreach($result as $category) { 
							array_push($cat, '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>');
						}
						echo implode('<span class="divider"></span>', $cat);
						?>
					</h5>
					<h5>
						<?php 
						$formats = array();
						$term_list = wp_get_post_terms($post->ID, 'formats', array("fields" => "all"));
						if($term_list){
							?><span>Formats: </span><?php
						}
						foreach($term_list as $format) { 
							array_push($formats, '<a href="http://blog.myndplan.dev/format/' . $format->slug . '">' . $format->name . '</a>');
						}
						echo implode(', ', $formats);
						?>
					</h5>
				</div>
			</header>

			<?php if( get_field('discussion_title') ): ?>
				<div class="card discussion">
					<h5><?php the_field('discussion_title'); ?></h5>
					<h4><?php the_field('discussion'); ?></h4>
				</div>
			<?php endif; ?>

			<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
				<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
				<?php the_content(); ?>
			</article>
		</div>
	</div>
	<div class="row comment-section">
		<div class="entry-content"> 
			<?php do_action( 'foundationpress_post_before_comments' ); ?>
			<?php comments_template(); ?>
			<?php do_action( 'foundationpress_post_after_comments' ); ?>
		</div>
	</div>
</div>

<div class="related-posts-bg">
	<?php related_posts(); ?>
</div>

<div class="row reference-section">
	<div class="entry-content"> 
		<?php get_template_part( 'template-parts/references', 'none' ); ?>
	</div>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>
<?php get_footer();
