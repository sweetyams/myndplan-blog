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

<div class="image no-zoom" style="background-image: url(<?php echo $thumbnail[0]; ?>); background-position: center center;"></div>
<div id="single-post" class="row page-center" role="main">

<div class="entry-content"> 

		<header>
			<h2 class="entry-title"><?php the_title(); ?> <span><?php the_field('secondary_title'); ?></span></h2>

			<div class="catformats">
			<!-- <div class="categories "><span class="icon-category"></span></div> -->
			<h5><span>Categories: </span>
				<?php
				$cat = array();
				foreach((get_the_category()) as $category) { 
				    array_push($cat, '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>');
				}
				echo implode(', ', $cat);
				?>
			</h5>
			<h5><span>Formats: </span>
			<?php 
			$formats = array();
			$term_list = wp_get_post_terms($post->ID, 'formats', array("fields" => "all"));
			foreach($term_list as $format) { 
					array_push($formats, '<a href="http://blog.myndplan.dev/format/' . $format->slug . '">' . $format->name . '</a>');
				}
				echo implode(', ', $formats);
				?>
				</h5>
				</div>
		</header>



		<?php foundationpress_entry_meta(); ?>
	<?php dynamic_sidebar('post-widgets'); ?>
	
	<div class="card discussion">
		<h3><?php the_field('discussion_title'); ?></h3>
		<h4><?php the_field('discussion'); ?></h4>
	</div>

	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
		
		<?php do_action( 'foundationpress_post_before_entry_content' ); ?>

		<?php the_content(); ?>
		
		<?php if( have_rows('reference') ):
			?><h2 class="references">References</h2><?php
		    while ( have_rows('reference') ) : the_row();
				?>

				<div id="reference-<?php the_sub_field('number'); ?>" class="reference">
					<a class="number" href="#returntoread-<?php the_sub_field('number'); ?>"><?php the_sub_field('number'); ?></a>
					<p><?php the_sub_field('ref'); ?></p>
					</div>
					
				<?php 
		    endwhile;
		else :
		endif; ?>



		
		<?php // the_post_navigation(); ?>
		<?php do_action( 'foundationpress_post_before_comments' ); ?>
		<?php comments_template(); ?>
		<?php do_action( 'foundationpress_post_after_comments' ); ?>
	</article>
	</div>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>
<?php get_footer();
