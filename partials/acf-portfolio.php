<?php 

$args = array( 'post_type' =>'project', );
$query = new WP_Query( $args ); 

if ( $query->have_posts()) : 
	while ( $query->have_posts() ) : $query->the_post(); ?>
		
		<h3><?php echo the_title(); ?></h3>
		


	<?php endwhile;
endif;

?>
