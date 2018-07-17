<?php 


$args = array( 'post_type' => 'project', 'posts_per_page' => 10 );
$loop = new WP_Query( $args );

while ( $loop->have_posts() ) : $loop->the_post();
  echo the_title();
  echo '<div class="entry-content">';
  echo the_content();
  echo '</div>';
endwhile;


?>
