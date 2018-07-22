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
	wp_enqueue_script( 'wpb_slidepanel', get_template_directory_uri() . '/assets/js/slidepanel.js', array('jquery'), '20160909', true );

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


/*----------------------

REGISTER ACFs

-----------------------*/

//HOME PAGE HIGHLIGHTS


if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_home-highlights',
		'title' => 'Home Highlights',
		'fields' => array (
			array (
				'key' => 'field_5b4bc3a8dd6b1',
				'label' => 'Home Highlights',
				'name' => 'home_highlights',
				'type' => 'repeater',
				'instructions' => 'Add all of your highlights with featured images and skill lists!',
				'sub_fields' => array (
					array (
						'key' => 'field_5b4bc4743f885',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'instructions' => 'Title of the skill!',
						'required' => 1,
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5b4bc3e1dd6b3',
						'label' => 'Sub skills',
						'name' => 'sub_skills',
						'type' => 'repeater',
						'column_width' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_5b4bc3efdd6b4',
								'label' => 'Sub skill',
								'name' => 'sub_skill',
								'type' => 'text',
								'required' => 1,
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
						),
						'row_min' => '',
						'row_limit' => '',
						'layout' => 'table',
						'button_label' => 'Add Row',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '8',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}


//PROJECT DETAILS

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_project-details',
		'title' => 'Project Details',
		'fields' => array (
			array (
				'key' => 'field_5b4cb8d22e7ff',
				'label' => 'Project Type',
				'name' => 'project_type',
				'type' => 'select',
				'required' => 1,
				'choices' => array (
					'Website' => 'Website',
					'Print' => 'Print',
					'Video' => 'Video',
					'Other' => 'Other',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5b4cb8f62e800',
				'label' => 'Required Skills',
				'name' => 'required_skills',
				'type' => 'checkbox',
				'required' => 1,
				'choices' => array (
					'Adobe Illustrator' => 'Adobe Illustrator',
					'Adobe Photoshop' => 'Adobe Photoshop',
					'Adobe InDesign' => 'Adobe InDesign',
					'Adobe After Effects' => 'Adobe After Effects',
					'HTML' => 'HTML',
					'CSS' => 'CSS',
					'PHP' => 'PHP',
					'JavaScript' => 'JavaScript',
					'WordPress' => 'WordPress',
					'Java' => 'Java',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_5b4cb9692e802',
				'label' => 'Website Link',
				'name' => 'website_link',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5b4cb8d22e7ff',
							'operator' => '==',
							'value' => 'Website',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => 'http://',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5b4cb9892e803',
				'label' => 'Video Link',
				'name' => 'video_link',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5b4cb8d22e7ff',
							'operator' => '==',
							'value' => 'Video',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => 'http://',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5b4cb9b32e804',
				'label' => 'Full Size Images',
				'name' => 'full_size_images',
				'type' => 'repeater',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5b4cb8d22e7ff',
							'operator' => '==',
							'value' => 'Print',
						),
					),
					'allorany' => 'all',
				),
				'sub_fields' => array (
					array (
						'key' => 'field_5b4cb9c32e805',
						'label' => 'Project Image',
						'name' => 'project_image',
						'type' => 'image',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5b4cb8d22e7ff',
									'operator' => '==',
									'value' => 'Print',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'project',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}



?>
