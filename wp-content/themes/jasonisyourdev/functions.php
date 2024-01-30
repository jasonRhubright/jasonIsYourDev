<?php 
/*
	============================================
	Add Css and js to page:
	============================================
*/
if ( ! function_exists( 'tdfScriptEnqueue' ) ){

	/**
	 * Enqueue styles.
	 *
	 *
	 * @return void
	 */
	function tdfScriptEnqueue(){

		// Enqueue styles
		wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.min.css', array(), '');
		wp_enqueue_style('webflow', get_template_directory_uri() . '/css/webflow.min.css', array('normalize'), '');
		wp_enqueue_style('my-portfolio', get_template_directory_uri() . '/css/my-portfolio-08ad56.webflow.min.css', array('webflow'), '');

		// Enqueue external styles
		wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com', array(), null);
		wp_enqueue_style('google-fonts-gstatic', 'https://fonts.gstatic.com', array('google-fonts'), null);

		// Enqueue scripts
		wp_enqueue_script('webfont', 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js', array(), null, false);
		wp_enqueue_script('recaptcha', 'https://www.google.com/recaptcha/api.js', array(), null, false);

		// TELL WORDPRESS DON'T USE THEIR JQUERY, USE THE ONE I SPECIFY. 
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', 'https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=65a047c9531fb709838e1e28', array(), null, true);

        // Enqueue Webflow.js
        wp_enqueue_script('webflow', get_template_directory_uri() . '/js/webflow.js', array('jquery'), null, true);
	}
}

//add_action( string $tag, callable $function_to_add, int $priority = 10, int $accepted_args = 1 )
add_action( 'wp_enqueue_scripts', 'tdfScriptEnqueue');



function tdfThemeSetup(){

	add_theme_support( 'title-tag' );

	// Add menu support
	add_theme_support('menus');

	register_nav_menu('primary', 'Primary Nav Header');

	register_nav_menu('secondary', 'Secondary Nav Header');


}

add_action('init', 'tdfThemeSetup');


function project_post_type()
{
	$args = array(
		'labels' => array(
			'name' => 'Projects',
			'singular_name' => "Project"
		),
		'hierarchical' => false,
		'public' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-art',
		'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'), 
		//'rewrite' => array
	);

	register_post_type("projects", $args);
}
add_action('init', 'project_post_type');

/*
	============================================
	Activate theme supports
	============================================
*/ 
add_theme_support('custom-background');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('aside', 'image', 'video', 'gallery'));


/*
	============================================
	Sidebar Function
	============================================
*/ 

function tdf_widget_setup(){

	register_sidebar( array(
			'name' 			=> 'Sidebar',
			'id'   			=> 'sidebar-1',
			'class'			=> 'tdf-custom',
			'description' 	=> 'Standard Sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',

		)
	);

	register_sidebar( array(
			'name' 			=> 'Homepage Row 1',
			'id'   			=> 'homerow1',
			'class'			=> 'tdf-custom',
			'description' 	=> 'Homepage content row. Refer to styleguide.',
			'before_widget' => '<div id="%1$s" class="widget %2$s homerow">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',

		)
	);

	register_sidebar( array(
			'name' 			=> 'Homepage Row 2',
			'id'   			=> 'homerow2',
			'class'			=> 'tdf-custom',
			'description' 	=> 'Homepage content row. Refer to styleguide.',
			'before_widget' => '<div id="%1$s" class="widget %2$s homerow">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',

		)
	);

	register_sidebar( array(
			'name' 			=> 'Homepage Row 3',
			'id'   			=> 'homerow3',
			'class'			=> 'tdf-custom',
			'description' 	=> 'Homepage content row. Refer to styleguide.',
			'before_widget' => '<div id="%1$s" class="widget %2$s homerow">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',

		)
	);

	register_sidebar( array(
			'name' 			=> 'Homepage Row 4',
			'id'   			=> 'homerow4',
			'class'			=> 'tdf-custom',
			'description' 	=> 'Homepage content row. Refer to styleguide.',
			'before_widget' => '<div id="%1$s" class="widget %2$s homerow">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',

		)
	);

	register_sidebar( array(
			'name' 			=> 'Homepage Row 5 - Parallax Scroll',
			'id'   			=> 'homerow5',
			'class'			=> 'tdf-custom',
			'description' 	=> 'Parallax scrolling picture - Use Parallax Scroll Plugin. Only use shortcode widget and paste Parallax shortcode here.',
			'before_widget' => '<div id="%1$s" class="widget %2$s homerow">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',

		)
	);

	register_sidebar( array(
			'name' 			=> 'Homepage Row 7',
			'id'   			=> 'homerow7',
			'class'			=> 'tdf-custom',
			'description' 	=> 'Homepage content row. Refer to styleguide.',
			'before_widget' => '<div id="%1$s" class="widget %2$s homerow">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',

		)
	);

	register_sidebar( array(
			'name' 			=> 'Secondary Nav Menu',
			'id'   			=> 'secondaryNav',
			'class'			=> 'tdf-custom',
			'description' 	=> 'Secondary Navigation Menu #nosidebars',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',

		)
	);

	register_sidebar( array(
			'name' 			=> 'Footer Left',
			'id'   			=> 'footer-left',
			'class'			=> 'tdf-custom',
			'description' 	=> '',
			'before_widget' => '<div id="%1$s" class="widget %2$s footer-column footer-left">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',

		)
	);

	register_sidebar( array(
			'name' 			=> 'Footer Middle left',
			'id'   			=> 'footer-middle-1',
			'class'			=> 'tdf-custom',
			'description' 	=> '',
			'before_widget' => '<div id="%1$s" class="widget %2$s footer-column footer-middle-1">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',

		)
	);

	register_sidebar( array(
			'name' 			=> 'Footer Middle Right',
			'id'   			=> 'footer-middle-2',
			'class'			=> 'tdf-custom',
			'description' 	=> '',
			'before_widget' => '<div id="%1$s" class="widget %2$s footer-column footer-middle-2">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',

		)
	);

	register_sidebar( array(
			'name' 			=> 'Footer Right',
			'id'   			=> 'footer-right',
			'class'			=> 'tdf-custom',
			'description' 	=> '',
			'before_widget' => '<div id="%1$s" class="widget %2$s footer-column footer-right">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',

		)
	);

	register_sidebar( array(
			'name' 			=> 'Bottom Left Footer',
			'id'   			=> 'bottom-left-footer',
			'class'			=> 'tdf-custom',
			'description' 	=> '',
			'before_widget' => '<div id="%1$s" class="widget %2$s bottom-left-footer">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',

		)
	);

	register_sidebar( array(
			'name' 			=> 'Footer Search',
			'id'   			=> 'footer-search',
			'class'			=> 'tdf-custom',
			'description' 	=> '',
			'before_widget' => '<div id="%1$s" class="widget %2$s footer-search">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',

		)
	);

	register_sidebar( array(
			'name' 			=> 'Partner-Sidebar',
			'id'   			=> 'tdfPartners',
			'class'			=> 'tdf-custom',
			'description' 	=> 'Only shows on partner pages.',
			'before_widget' => '<div id="%1$s" class="partnerSideBar">',
			'after_widget'  => '</div>',
			'before_title'  => '<p class="widgettitle">',
			'after_title'   => '</p>',

		)
	);
}

add_action('widgets_init', 'tdf_widget_setup');

// Check to see is page is related to blog
// function is_blog () {
//     return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
// }



?>