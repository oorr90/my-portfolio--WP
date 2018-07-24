<?php get_header(); ?>


<div class="introduction add-margin">
	<div class="intro-col">
		<h1>Hi,<br>I'm <span>Olivia</span> and I like to <span>create</span> things.</h1>
	</div>
	<div class="intro-col">
		<img src="<?php echo get_template_directory_uri() . '/assets/images/intro-image.png'; ?>" alt="three cubic shapes">
	</div>
</div>



<div class="skills">

	<?php get_template_part( 'partials/acf', 'featured' ); ?>

</div>

<div class="home-learn-more">
	<div class="button">
		<a href="<?php echo get_permalink('10'); ?>">My Work &rarr;</a>
	</div>
</div>

<div class="outro add-padding">
	
	<?php

		if ( have_posts() ):
			while( have_posts() ): the_post(); ?>
				<p><?php the_content(); ?></p>
			<?php endwhile;
		endif;
	?>

</div>

<?php get_footer(); ?>
