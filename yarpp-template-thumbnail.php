<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>



<?php if (have_posts()):?>
<div class="related-posts">
<div class="row ">
	<div class="columns small-12 medium-10 large-9 small-centered">
		<h2>Related Posts</h2>
		<div class="row">
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
		<?php endwhile; ?>
		</div>
	</div>
</div>
</div>
<?php else: ?>
<p>No related photos.</p>
<?php endif; ?>

