<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div id="single-post" class="row" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="entry-info">

	<?php foundationpress_entry_meta(); ?>
	<?php dynamic_sidebar('post-widgets'); ?>
	
	<div class="card discussion">
		<h3><?php the_field('discussion_title'); ?></h3>
		<h4><?php the_field('discussion'); ?></h4>
	</div>

</div>

<div class="entry-content">

		<header>
			
			<div class="image no-zoom">
			<?php
				if ( has_post_thumbnail() ) :
					the_post_thumbnail();
				endif;
			?>
			</div>

			<!-- <div class="category "><span class="icon-category"></span></div> -->
			<h5>

				<?php foreach((get_the_category()) as $category) { 
				    echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
				} ?>
			</h5>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>

		<div class="entry-mobile">

			<?php foundationpress_entry_meta(); ?>
			<?php dynamic_sidebar('post-widgets'); ?>
			
			<div class="card discussion">
				<h3><?php the_field('discussion_title'); ?></h3>
				<h4><?php the_field('discussion'); ?></h4>
			</div>

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
					<p><?php the_sub_field('author'); ?> (<?php the_sub_field('year'); ?>). <span><?php the_sub_field('title'); ?></span><?php the_sub_field('title'); ?> <?php the_sub_field('publication'); ?> <?php if ( get_sub_field('link') ): ?><a href="<?php the_sub_field('link'); ?>">[link]</a><?php endif; ?></p>
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
