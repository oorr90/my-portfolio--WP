<?php


/*----------------------

ADD CSS AND JAVASCRIPT

-----------------------*/

function olivia_script_enqueue() {

	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0', 'all' );

	wp_enqueue_script( 'customjs', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0.0', true );
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








?>
