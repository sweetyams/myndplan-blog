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
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array( 'showposts' => 6,'post_status'=>"publish",'post_type'=>"post",'orderby'=>"post_date", 'paged' => $paged );
		$postslist = query_posts($args);
		foreach ($postslist as $post) :  setup_postdata($post); ?> 
			<div class="post">
				<?php if ( has_post_thumbnail() ) : ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<div class="image zoom" ><?php the_post_thumbnail(); ?></div>
				</a>
				<?php endif; ?>
				
				<div class="info">
					<div class="title">
						<h5>
						<?php foreach((get_the_category()) as $category) { 
						    echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
						} ?>
						</h5>
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"> <?php the_title(); ?></a></h2>
					</div>
					
					<div class="exerpt">
						<h4>
							<?php echo wp_trim_words( get_the_content(), 25, '...' ); ?>
						</h4>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<?php if ( function_exists('FoundationPress_pagination') ) { FoundationPress_pagination(); } else if ( is_paged() ) { ?>
    <nav id="post-nav">
        <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'FoundationPress' ) ); ?></div>
        <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'FoundationPress' ) ); ?></div>
    </nav>
<?php } ?>

<div class="subscribe-section">
	<div class="row">
		<div class="subscribe-content">
			<h2>Subscribe and get access to more amazing articles</h2>
			<?php echo do_shortcode("[mc4wp_form id='5']"); ?>
		</div>
	</div>
 </div>


<?php get_footer();
