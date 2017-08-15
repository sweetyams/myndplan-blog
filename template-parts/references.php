<?php if( have_rows('reference') ):
	?>
<div class="reference-section">
	<h2 class="references">References</h2><?php
	while ( have_rows('reference') ) : the_row();
		?>

		<div id="reference-<?php the_sub_field('number'); ?>" class="reference">
			<a class="number" href="#returntoread-<?php the_sub_field('number'); ?>"><span class="icon-corner-up-left"></span><?php the_sub_field('number'); ?></a>
			<p><?php the_sub_field('ref'); ?></p>
			</div>
			
		<?php 
	endwhile;
	else :
	?></div><?php endif; ?>