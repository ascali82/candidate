<?php
/**
 * Candidate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Candidate
 */

if ( ! function_exists( 'candidate_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function candidate_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Candidate, use a find and replace
		 * to change 'candidate' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'candidate', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'candidate' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'candidate_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'candidate_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function candidate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'candidate_content_width', 640 );
}
add_action( 'after_setup_theme', 'candidate_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function candidate_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'candidate' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'candidate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'candidate_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function candidate_scripts() {
	wp_enqueue_style( 'bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css' ); // Bootstrap CSS
	wp_enqueue_style( 'candidate-style', get_stylesheet_uri() ); // Theme CSS
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); // Font Awesome CSS

  	wp_enqueue_script( 'jquery_js', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', array(), '3.2.1', true );
  	wp_enqueue_script( 'popper_js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js', array(), '1.12.3', true );
  	wp_enqueue_script( 'bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js', array(), '4.0.0-beta.2', true );
	wp_enqueue_script( 'candidate-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'candidate-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'candidate_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * navigation bootstrap
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';




// Register Custom Post Type
function workExperience() {

	$labels = array(
		'name'                  => _x( 'Work experiences', 'Post Type General Name', 'candidate' ),
		'singular_name'         => _x( 'Work Experience', 'Post Type Singular Name', 'candidate' ),
		'menu_name'             => __( 'Work experience', 'candidate' ),
		'name_admin_bar'        => __( 'Work experience', 'candidate' ),
		'archives'              => __( 'Item Archives', 'candidate' ),
		'attributes'            => __( 'Item Attributes', 'candidate' ),
		'parent_item_colon'     => __( 'Parent Item:', 'candidate' ),
		'all_items'             => __( 'All Items', 'candidate' ),
		'add_new_item'          => __( 'Add New Item', 'candidate' ),
		'add_new'               => __( 'Add New', 'candidate' ),
		'new_item'              => __( 'New Item', 'candidate' ),
		'edit_item'             => __( 'Edit Item', 'candidate' ),
		'update_item'           => __( 'Update Item', 'candidate' ),
		'view_item'             => __( 'View Item', 'candidate' ),
		'view_items'            => __( 'View Items', 'candidate' ),
		'search_items'          => __( 'Search Item', 'candidate' ),
		'not_found'             => __( 'Not found', 'candidate' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'candidate' ),
		'featured_image'        => __( 'Featured Image', 'candidate' ),
		'set_featured_image'    => __( 'Set featured image', 'candidate' ),
		'remove_featured_image' => __( 'Remove featured image', 'candidate' ),
		'use_featured_image'    => __( 'Use as featured image', 'candidate' ),
		'insert_into_item'      => __( 'Insert into item', 'candidate' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'candidate' ),
		'items_list'            => __( 'Items list', 'candidate' ),
		'items_list_navigation' => __( 'Items list navigation', 'candidate' ),
		'filter_items_list'     => __( 'Filter items list', 'candidate' ),
	);
	$args = array(
		'label'                 => __( 'Work Experience', 'candidate' ),
		'description'           => __( 'Work Experience', 'candidate' ),
		'labels'                => $labels,
		'supports'              => array( 'thumbnail', 'custom-fields', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-hammer',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'work_experience', $args );

}
add_action( 'init', 'workExperience', 0 );

// Register Custom Taxonomy
function workSector() {

	$labels = array(
		'name'                       => _x( 'Work sectors', 'Taxonomy General Name', 'candidate' ),
		'singular_name'              => _x( 'Work sector', 'Taxonomy Singular Name', 'candidate' ),
		'menu_name'                  => __( 'Work sector', 'candidate' ),
		'all_items'                  => __( 'All Items', 'candidate' ),
		'parent_item'                => __( 'Parent Item', 'candidate' ),
		'parent_item_colon'          => __( 'Parent Item:', 'candidate' ),
		'new_item_name'              => __( 'New Item Name', 'candidate' ),
		'add_new_item'               => __( 'Add New Item', 'candidate' ),
		'edit_item'                  => __( 'Edit Item', 'candidate' ),
		'update_item'                => __( 'Update Item', 'candidate' ),
		'view_item'                  => __( 'View Item', 'candidate' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'candidate' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'candidate' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'candidate' ),
		'popular_items'              => __( 'Popular Items', 'candidate' ),
		'search_items'               => __( 'Search Items', 'candidate' ),
		'not_found'                  => __( 'Not Found', 'candidate' ),
		'no_terms'                   => __( 'No items', 'candidate' ),
		'items_list'                 => __( 'Items list', 'candidate' ),
		'items_list_navigation'      => __( 'Items list navigation', 'candidate' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'work_sector', array( 'work_experience' ), $args );

}
add_action( 'init', 'workSector', 0 );

// Register Custom Post Type
function education() {

	$labels = array(
		'name'                  => _x( 'Post Types', 'Post Type General Name', 'candidate' ),
		'singular_name'         => _x( 'Education', 'Post Type Singular Name', 'candidate' ),
		'menu_name'             => __( 'Education', 'candidate' ),
		'name_admin_bar'        => __( 'Education', 'candidate' ),
		'archives'              => __( 'Item Archives', 'candidate' ),
		'attributes'            => __( 'Item Attributes', 'candidate' ),
		'parent_item_colon'     => __( 'Parent Item:', 'candidate' ),
		'all_items'             => __( 'All Items', 'candidate' ),
		'add_new_item'          => __( 'Add New Item', 'candidate' ),
		'add_new'               => __( 'Add New', 'candidate' ),
		'new_item'              => __( 'New Item', 'candidate' ),
		'edit_item'             => __( 'Edit Item', 'candidate' ),
		'update_item'           => __( 'Update Item', 'candidate' ),
		'view_item'             => __( 'View Item', 'candidate' ),
		'view_items'            => __( 'View Items', 'candidate' ),
		'search_items'          => __( 'Search Item', 'candidate' ),
		'not_found'             => __( 'Not found', 'candidate' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'candidate' ),
		'featured_image'        => __( 'Featured Image', 'candidate' ),
		'set_featured_image'    => __( 'Set featured image', 'candidate' ),
		'remove_featured_image' => __( 'Remove featured image', 'candidate' ),
		'use_featured_image'    => __( 'Use as featured image', 'candidate' ),
		'insert_into_item'      => __( 'Insert into item', 'candidate' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'candidate' ),
		'items_list'            => __( 'Items list', 'candidate' ),
		'items_list_navigation' => __( 'Items list navigation', 'candidate' ),
		'filter_items_list'     => __( 'Filter items list', 'candidate' ),
	);
	$args = array(
		'label'                 => __( 'Education', 'candidate' ),
		'description'           => __( 'Post Type Description', 'candidate' ),
		'labels'                => $labels,
		'supports'              => array( 'title', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-awards',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'education', $args );

}
add_action( 'init', 'education', 0 );

// Register Custom Post Type
function skills() {

	$labels = array(
		'name'                  => _x( 'Skills', 'Post Type General Name', 'candidate' ),
		'singular_name'         => _x( 'Skill', 'Post Type Singular Name', 'candidate' ),
		'menu_name'             => __( 'Skill', 'candidate' ),
		'name_admin_bar'        => __( 'Skills', 'candidate' ),
		'archives'              => __( 'Item Archives', 'candidate' ),
		'attributes'            => __( 'Item Attributes', 'candidate' ),
		'parent_item_colon'     => __( 'Parent Item:', 'candidate' ),
		'all_items'             => __( 'All Items', 'candidate' ),
		'add_new_item'          => __( 'Add New Item', 'candidate' ),
		'add_new'               => __( 'Add New', 'candidate' ),
		'new_item'              => __( 'New Item', 'candidate' ),
		'edit_item'             => __( 'Edit Item', 'candidate' ),
		'update_item'           => __( 'Update Item', 'candidate' ),
		'view_item'             => __( 'View Item', 'candidate' ),
		'view_items'            => __( 'View Items', 'candidate' ),
		'search_items'          => __( 'Search Item', 'candidate' ),
		'not_found'             => __( 'Not found', 'candidate' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'candidate' ),
		'featured_image'        => __( 'Featured Image', 'candidate' ),
		'set_featured_image'    => __( 'Set featured image', 'candidate' ),
		'remove_featured_image' => __( 'Remove featured image', 'candidate' ),
		'use_featured_image'    => __( 'Use as featured image', 'candidate' ),
		'insert_into_item'      => __( 'Insert into item', 'candidate' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'candidate' ),
		'items_list'            => __( 'Items list', 'candidate' ),
		'items_list_navigation' => __( 'Items list navigation', 'candidate' ),
		'filter_items_list'     => __( 'Filter items list', 'candidate' ),
	);
	$args = array(
		'label'                 => __( 'Skill', 'candidate' ),
		'description'           => __( 'Post Type Description', 'candidate' ),
		'labels'                => $labels,
		'supports'              => array( ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-welcome-learn-more',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'skills', $args );

}
add_action( 'init', 'skills', 0 );

// Register Custom Taxonomy
function skill_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Taxonomies', 'Taxonomy General Name', 'candidate' ),
		'singular_name'              => _x( 'Taxonomy', 'Taxonomy Singular Name', 'candidate' ),
		'menu_name'                  => __( 'Taxonomy', 'candidate' ),
		'all_items'                  => __( 'All Items', 'candidate' ),
		'parent_item'                => __( 'Parent Item', 'candidate' ),
		'parent_item_colon'          => __( 'Parent Item:', 'candidate' ),
		'new_item_name'              => __( 'New Item Name', 'candidate' ),
		'add_new_item'               => __( 'Add New Item', 'candidate' ),
		'edit_item'                  => __( 'Edit Item', 'candidate' ),
		'update_item'                => __( 'Update Item', 'candidate' ),
		'view_item'                  => __( 'View Item', 'candidate' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'candidate' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'candidate' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'candidate' ),
		'popular_items'              => __( 'Popular Items', 'candidate' ),
		'search_items'               => __( 'Search Items', 'candidate' ),
		'not_found'                  => __( 'Not Found', 'candidate' ),
		'no_terms'                   => __( 'No items', 'candidate' ),
		'items_list'                 => __( 'Items list', 'candidate' ),
		'items_list_navigation'      => __( 'Items list navigation', 'candidate' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'taxonomy', array( 'skills' ), $args );

}
add_action( 'init', 'skill_taxonomy', 0 );

/*
 * Make CPT personal information title from custom fields
 */
function custom_field_value_as_title( $value, $post_id, $field ) {
	global $_POST;
	// vars

	$new_title_first_name = get_field('first_name', $post_id);
	$new_title_last_name = get_field('surname', $post_id);
    $new_title = "$new_title_first_name $new_title_last_name";
	//$new_slug = sanitize_title( $new_title );

    $result = 

	// update post
	// http://codex.wordpress.org/Function_Reference/wp_update_post
	  $my_post = array(
      'ID'         => $post_id,
      'post_title' => $new_title,
	  'post_name'  => $post_id //originally $new_slug
  );

// Update the post into the database
  wp_update_post( $my_post );
}

add_filter('acf/update_value', 'custom_field_value_as_title', 10, 3);

