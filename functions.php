<?php


//HIDE ADMIN BAR IN FRONT END WHEN LOGGED IN
add_filter('show_admin_bar', '__return_false');

/*----------------------

ADD CSS AND JAVASCRIPT

-----------------------*/

function olivia_script_enqueue() {

	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0', 'all' );

	wp_enqueue_script( 'customjs', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true );
	//If you want JS in footer, TRUE as bool

}
add_action( 'wp_enqueue_scripts', 'olivia_script_enqueue');



/*----------------------

ACTIVATE CUSTOM MENUS

-----------------------*/

function olivia_theme_setup() {


	add_theme_support( 'menus' );

	//Create a custom menu
	register_nav_menu( 'primary', 'Primary Navigation' );
	register_nav_menu( 'secondary', 'Secondary Navigation' );	


}
add_action( 'init', 'olivia_theme_setup' );



/*----------------------

ENABLE FEATURED IMAGES ON POSTS

-----------------------*/
add_theme_support( 'post-thumbnails' );



/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string Filtered title.
 */
/* https://developer.wordpress.org/reference/hooks/wp_title/ */
function wpdocs_filter_wp_title( $title, $sep ) {
    global $paged, $page;
 
    if ( is_feed() )
        return $title;
 
    // Add the site name.
    $title .= get_bloginfo( 'name' );
 
    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";
 
    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );
 
    return $title;
}
add_filter( 'wp_title', 'wpdocs_filter_wp_title', 10, 2 );




/*----------------------

PROJECT LIST

-----------------------*/

//GET SINGLE PROJECT
function get_project($post, $getPosts = true){
    global $wpdb;

    $post -> additional_fields = get_fields($post -> ID);
    $post -> thumbnail = get_the_post_thumbnail($post -> ID, array(200));
    $post -> content_filtered = apply_filters('the_content', $post -> post_content);
    $post -> permalink = get_permalink($post -> ID);
    $post -> image_paths = get_image_paths($post -> ID);

    return $post;
}



function get_project_list() {
    global $wpdb;
    $projects = array();  
    $sql = 'SELECT * FROM ' . $wpdb -> prefix . 'posts WHERE post_type="project" and post_status="publish"';
    $posts = $wpdb->get_results($sql);

    foreach ($posts as $post) {
        $projects[] = get_project($post, false);
    }
    return $projects;
}


// GET IMAGE SIZES
function get_image_paths($postId){
    $photoId = get_post_thumbnail_id($postId);
    return array(
        "thumb" => wp_get_attachment_image_src($photoId, 'thumbnail')[0],
        "medium" => wp_get_attachment_image_src($photoId, 'medium')[0],
        "large" => wp_get_attachment_image_src($photoId, 'large')[0],
    );
} 







?>
