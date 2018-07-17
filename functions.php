<?php


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

GET PROJECT LIST

-----------------------*/











?>
