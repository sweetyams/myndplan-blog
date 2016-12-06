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
