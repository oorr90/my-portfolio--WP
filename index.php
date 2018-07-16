<?php get_header(); ?>

<div class="col">
		<?php if ( have_posts() ) : ?>
		    <?php while ( have_posts() ) : the_post(); ?>

		        <div class="page-intro">
					<div class="page-intro-image">
		    			<img src="<?php echo get_template_directory_uri() . '/assets/images/intro-image.png'; ?>" alt="three cubic shapes">
		    		</div>

		    		<h1><?php the_title(); ?></h1>
		    		
		    		<div class="page-intro-content">
		    			<p><?php the_content(); ?></p>
		    		</div>
		    	</div>

		    	<?php 

		    		if( is_page( 'Services' ) ):

		    			get_template_part( 'partials/acf', 'services' );

		    		elseif( is_page( 'Experience' ) ):

		    			get_template_part( 'partials/acf', 'experience' );

		    		elseif( is_page('Resources') ):

		    			get_template_part( 'partials/acf', 'resources' );

		    		endif;

		    	?>

		    <?php endwhile; ?>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>
