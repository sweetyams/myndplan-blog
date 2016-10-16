<?php
/*
Template Name: Front
*/
get_header(); ?>

<header id="featured" class="row" role="banner">
	<div class="featured">
		<?php $args = array( 'numberposts' => 1, 'post_status'=>"publish",'post_type'=>"post",'orderby'=>"post_date");
		$postslist = get_posts( $args );
		foreach ($postslist as $post) :  setup_postdata($post); ?> 
			
			<?php if ( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<div class="image zoom" ><?php the_post_thumbnail(); ?></div>
				</a>
			<?php endif; ?>
			
			<div class="row info">
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
						<?php echo wp_trim_words( get_the_content(), 30, '...' ); ?>
					</h4>
				</div>
			</div>
			
		<?php endforeach; ?>
	</div>
	<div class="popular">
		<div class="card">
		<?php $args = array(
			    'header' => 'Most popular',
			    'limit' => 4,
			    'header_start' => '<h2 class="title">',
			    'header_end' => '</h2>',
			    'range' => 'monthly',
			    'stats_views' => 0,
			    'title_by_words' => 1,
			    'title_length' => 7,
			    'post_html' => '<li><h4><a href="{url}">{text_title}</a></h4></li>'
			);
			wpp_get_mostpopular( $args ); ?>
		</div>
	</div>	
</header>


<div class="row">
	<div class="home-posts">
		<?php $args = array( 'numberposts' => 3, 'offset' => 1,'post_status'=>"publish",'post_type'=>"post",'orderby'=>"post_date");
		$postslist = get_posts( $args );
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

<div class="featured-posts">

<div class="row">
	<div class="columns small-12">
		<h2>Featured Articles</h2>
	</div>
	
		<?php 
$posts = get_field('home_featured','options');
if( $posts ): ?>
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
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
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
</div>
</div>

<div class="row">
	<div class="home-posts">
		<?php $args = array( 'numberposts' => 3, 'offset' => 4,'post_status'=>"publish",'post_type'=>"post",'orderby'=>"post_date");
		$postslist = get_posts( $args );
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

<div class="subscribe-section">
	<div class="row">
		<div class="subscribe-content">
			<h2>Subscribe and get access to more amazing articles</h2>
			<?php echo do_shortcode("[mc4wp_form id='5']"); ?>
		</div>
	</div>
 </div>


<?php get_footer();
