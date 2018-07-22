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
		    			<?php
			    			if( is_page( 'Portfolio' ) ): ?>
			    				<div class="click-project">
									<p>Click project name to view details</p>
									<img src="<?php echo get_template_directory_uri() . '/img/down-arrow.png'; ?>" alt="blue down arrow">
								</div>
			    			<?php endif;
		    			?>
		    		</div>
		    	</div>

		    	<?php 
		    		if( is_page( 'Portfolio' ) ):
		    			get_template_part( 'partials/acf', 'portfolio' );
		    			//get_template_part('partials/coming', 'soon');
		    		endif;
		    	?>

		    <?php endwhile; ?>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>
