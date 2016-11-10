<?php
/**
 * Tribal Database functions and definitions
 *
 * @package Tribal Database
 * @version 0.0.9
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'tribaldb_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tribaldb_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Tribal Database, use a find and replace
	 * to change 'tribaldb' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'tribaldb', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'tribaldb' ),
		'footer' => __( 'Footer Menu', 'tribaldb' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tribaldb_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // tribaldb_setup
add_action( 'after_setup_theme', 'tribaldb_setup' );


/**
 * Register widgetized area and update sidebar with default widgets.
 */
function tribaldb_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'tribaldb' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Front Page Widgets', 'tribaldb' ),
		'id'            => 'front-page',
		'description'	=> 'Add all home page widgets to this location.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Above Post Widgets', 'tribaldb' ),
		'id'            => 'sidebar-top',
		'description'	=> 'Add widgets above the post',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Below Post Widgets', 'tribaldb' ),
		'id'            => 'sidebar-bottom',
		'description'	=> 'Add widgets below the post',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Above Columns Widgets', 'tribaldb' ),
		'id'            => 'sidebar-above-columns',
		'description'	=> 'Add widgets above columns in a two-column layout.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Below Columns Widgets', 'tribaldb' ),
		'id'            => 'sidebar-below-columns',
		'description'	=> 'Add widgets below columns in a two-column layout.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );	

}
add_action( 'widgets_init', 'tribaldb_widgets_init' );

/**
* Add custom post types.
*/

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'organization',
		array(
			'labels' => array(
				'name' => __( 'Organization' ),
				'singular_name' => __( 'Organization' )
			),
		'public' => true,
		'has_archive' => true,
		'capability_type' => 'post',
		'rewrite' => array('slug' => 'organizations'),  
		'supports' => array(
            'title',
            'excerpt',
            'editor',
            'custom-fields',
            'revisions',
            'thumbnail',
            'author'),
        'taxonomies' => array('category', 'post_tag'),
        /*'show_in_nav_menus' => true*/
		)
	);
} 

/**
 * Enqueue scripts and styles.
 */
function tribaldb_scripts() {

	wp_enqueue_style( 'tribaldb-bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '20140512', 'all' );

	wp_enqueue_style( 'tribaldb-magnific-popup-style', get_template_directory_uri() . '/css/magnific-popup.css', array(), '20150318', 'all' );

	wp_enqueue_style( 'tribaldb-flexslider-style', '/wp-content/plugins/tribal-banner-widget/flexslider.css', array(), '20140506', 'all' );

	wp_enqueue_style( 'umc-slick-style', get_template_directory_uri() . '/css/slick.css', array(), '20150220', 'all' );

	/* If using a child theme, auto-load the parent theme style. */
	if ( is_child_theme() ) {
		wp_enqueue_style( 'tribaldb-parent-style', trailingslashit( get_template_directory_uri() ) . 'style.css', 'screen, print'  );
	}

	wp_enqueue_style( 'umc-theme-style', get_stylesheet_uri(), 'screen, print' );

	// BEGIN SCRIPTS

	wp_enqueue_script( 'jquery', '/wp-includes/js/jquery/jquery.js', false, '20150304', true);

	// Checking if the wp-local-config.php file exists
	$localConfig = $_SERVER['DOCUMENT_ROOT'] .'/wp-local-config.php';
	if (file_exists($localConfig)) {
	  // Load dev styles
	  // load dev js
		wp_enqueue_script( 'tribaldb-navigation', get_template_directory_uri() . '/js/dev/navigation.js', array(), '20120206', true );

		wp_enqueue_script( 'tribaldb-skip-link-focus-fix', get_template_directory_uri() . '/js/dev/skip-link-focus-fix.js', array(), '20130115', true );

		// wp_enqueue_script( 'tribaldb-retina',  get_template_directory_uri() . '/js/dev/retina.min.js', array('jquery'), '20140602', true );

		wp_enqueue_script( 'tribaldb-flexslider',  get_template_directory_uri() . '/js/dev/jquery.flexslider.js', array('jquery'), '20140506', true );

		wp_enqueue_script( 'umc-slick',  get_template_directory_uri() . '/js/dev/slick.min.js', array('jquery'), '20150220', true );

		wp_enqueue_script( 'parallax-bg-stellar',  get_template_directory_uri() . '/js/dev/jquery.stellar.js', array('jquery'), '20150209', true );

		// Allows for getting height and width of hidden elements: http://dreamerslab.com/blog/en/get-hidden-elements-width-and-height-with-jquery/
		wp_enqueue_script( 'umc-jquery-actual',  get_template_directory_uri() . '/js/dev/jquery.actual.min.js', array('jquery', 'tribaldb-global'), '20150206', true );

		wp_enqueue_script( 'tribaldb-global',  get_template_directory_uri() . '/js/dev/global.js', array('jquery'), '20140506', true );

	}
	else {
	  // Load Prod CSS
	  // Load Prod JS
		wp_enqueue_script( 'tribaldb-combined',  get_template_directory_uri() . '/js/prod/combined.min.js', array('jquery'), '20150304', true );

	}
	// keep Magnific js from being added to combined.min.js file
	wp_enqueue_script( 'umc-magnific-popup-js',  get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), '20150318', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tribaldb_scripts' );

add_action('admin_head', 'admin_form_styles');

function admin_form_styles() {
  echo '<style>
textarea.utah-txt-area{
	height: 100px;
}
  </style>';
}

// Hide all Revolution slider layer style options except the "uu" styles
function rev_slider_admin_styles(){
	echo'<style>
		#ui-id-1 .ui-menu-item[original-title]{display:none;}
		#ui-id-1 .ui-menu-item[original-title*="uu"]{display:block;}
	</style>';
}

add_action('admin_head', 'rev_slider_admin_styles');


// Callback function to insert 'styleselect' into the $buttons array (which adds a styleselect dropdown menu to the second row of the tinymce buttons)
function uu_mce_buttons_2($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'uu_mce_buttons_2');

/*
* Callback function to filter the MCE settings
*/

function my_mce_before_init_insert_formats( $init_array ) {  

// Define the style_formats array

	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'Button',  
			'selector' => 'a',  
			'classes' => 'btn',
			'wrapper' => false
		),
		array(  
			'title' => 'Uppercase Button',  
			'selector' => 'a',  
			'classes' => 'btn uppercase',
			'wrapper' => false
		),
		array(  
			'title' => 'Full-Width Button',
			'selector' => 'a',  
			'classes' => 'btn btn-full-width',
			'wrapper' => false
		),
		array(  
			'title' => 'Red Button',  
			'selector' => 'a',  
			'classes' => 'btn-primary',
			'wrapper' => false
		),
		array(  
			'title' => 'Uppercase Red Button',  
			'selector' => 'a',  
			'classes' => 'btn-primary uppercase',
			'wrapper' => false
		),
		array(  
			'title' => 'Full-Width Red Button',
			'selector' => 'a',  
			'classes' => 'btn-primary btn-full-width',
			'wrapper' => false
		),
		array(  
			'title' => 'Gray Button',  
			'selector' => 'a',  
			'classes' => 'btn-secondary',
			'wrapper' => false
		),
		array(  
			'title' => 'Uppercase Gray Button',  
			'selector' => 'a',  
			'classes' => 'btn-secondary uppercase',
			'wrapper' => false
		),
		array(  
			'title' => 'Full-Width Gray Button',
			'selector' => 'a',  
			'classes' => 'btn-secondary btn-full-width',
			'wrapper' => false
		), 
		array(  
			'title' => 'Drop Cap',  
			'selector' => 'p',  
			'classes' => 'drop-cap',
			'wrapper' => false
		)
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

function tribaldb_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'tribaldb_add_editor_styles' );

/*  Add responsive container to embeds
/* ------------------------------------ */ 
function umc_embed_html( $html ) {
    return '<div class="video-container">' . $html . '</div>';
}
 
add_filter( 'embed_oembed_html', 'umc_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'umc_embed_html' ); // Jetpack

add_filter('upload_mimes', 'add_custom_mime_types');

function add_custom_mime_types($mimes){
		return array_merge($mimes,array (
			'zip' => 'application/x-compressed-zip',
		));
}


/**
 * Load CSS for IE 8 and lower
 */
function ie_style_sheets () {
	wp_register_style( 'ie8', get_template_directory_uri() . '/css/ie8.css', array('utah-grid-css'), '20140710', 'all' );
	$GLOBALS['wp_styles']->add_data( 'ie8', 'conditional', 'lte IE 8' );
	wp_enqueue_style( 'ie8');
}
add_action ('wp_enqueue_scripts','ie_style_sheets');

/**
 * META BOXES
 */
add_filter( 'rwmb_meta_boxes', 'tribal_register_meta_boxes' );
function tribal_register_meta_boxes( $meta_boxes ) {
    $prefix = 'tribal_';
    // Add Meta Boxes For Attached Documents (note: this applies to all images, pdfs, doc, and excel files)
    $meta_boxes[] = array(
        'id'         => 'personal',
        'title'      => __( 'Document Details', 'tribal' ),
        'post_types' => array( 'attachment' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
			// HEADLINE TEXT
			array(
				'name' => __( 'File Name', 'tribal' ),
				'id'   => "{$prefix}textarea1",
				'type' => 'textarea',
				'cols' => 10,
				'rows' => 1,
			),
			// SUBHEAD TEXT
			array(
				'name' => __( 'Submitted By', 'tribal' ),
				'id'   => "{$prefix}textarea2",
				'type' => 'textarea',
				'cols' => 10,
				'rows' => 1,
			),
			// DESCRIPTION TEXT
			array(
				'name' => __( 'Submittion Date', 'tribal' ),
				'id'   => "{$prefix}textarea3",
				'type' => 'date',
				// jQuery date picker options. See here http://api.jqueryui.com/datepicker
				'js_options' => array(
					'appendText'      => __( '(yyyy-mm-dd)', 'your-prefix' ),
					'dateFormat'      => __( 'yy-mm-dd', 'your-prefix' ),
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
				),
			),
        )
    );
    // ALLOW ATTACHMENT OF FILES TO ORGANIZATION CUSTOM POST TYPE
    $meta_boxes[] = array(
        'title'      => __( 'File Attachment', 'tribal' ),
        'post_types' => 'organization',
        'fields'     => array(
            // FILE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'File Upload', 'tribal' ),
				'id'               => "{$prefix}file_advanced",
				'type'             => 'file_advanced',
				'mime_type'        => 'application,audio,video', // Leave blank for all file types
			),
        )
    );
    return $meta_boxes;
}

add_filter( 'user_meta_field_config', 'user_meta_field_config_populate_categories', 10, 3 );
function user_meta_field_config_populate_categories( $field, $fieldID, $formName){ 
	//get list of organizations
 	$args = array(
		'posts_per_page'   => 5,
		'offset'           => 0,
		'category'         => '',
		'category_name'    => '',
		'orderby'          => 'date',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'organization',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'author'	   => '',
		'author_name'	   => '',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);
	$posts_array = get_posts( $args );

    if( $fieldID != '3' ) // Put your desired field id here
        return $field;
 	
    $output = null;
    foreach( $posts_array as $post ):
        $output .= $post->ID.'='.$post->post_name.',';
    endforeach;
    $output = ',' . trim( $output, ',' );
 
    $field['options'] = $output;
 
    return $field;
}				
/*add_filter( 'user_meta_field_config', 'user_meta_field_config_populate_categories', 10, 3 );
function user_meta_field_config_populate_categories( $field, $fieldID, $formName ){ 
 
    if( $fieldID != '1' ) // Put your desired field id here
        return $field;
 
    $output = null;
    $cats = get_categories();
    foreach( $cats as $cat ):
        $output .= $cat->term_id.'='.$cat->name.',';
    endforeach;
    $output = ',' . trim( $output, ',' );
 
    $field['options'] = $output;
 
    return $field;
}*/
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load theme customization file.
 */
require get_template_directory() . '/inc/theme-options.php';
