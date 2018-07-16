<?php

	$highlights = 'home_highlights';

	// check if the repeater field has rows of data
	if( have_rows($highlights) ):

	 	// loop through the rows of data
	    while ( have_rows($highlights) ) : the_row(); ?>

	    	<?php $image = get_sub_field('highlight_image'); ?>

	    	<div class="single-skill">

	    		<img src="<?php echo get_template_directory_uri() . '/img/home-iconography.png'; ?>" alt="three cubic shapes">

	        	<h2><?php the_sub_field('title'); ?></h2>

	        	<div class="sub-skills">
	        		<?php while ( have_rows('sub_skills') ) : the_row(); ?>

				        <li><?php the_sub_field('sub_skill'); ?></li>

					<?php endwhile; ?>
				</div>
	        </div>

	    <?php endwhile;

	else :

	    // no rows found
	    echo "Experience coming soon!";

	endif;

?>
