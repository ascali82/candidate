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

/*
 * Installing TGMPA
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'candidate_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function candidate_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Personal Information CPT', // The plugin name.
			'slug'               => 'personal_information_cpt', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/lib/plugins/personal_information_cpt.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		
				// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Github Udater', // The plugin name.
			'slug'               => 'github-updater-develop', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/lib/plugins/github-updater-develop.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'candidate',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'candidate' ),
			'menu_title'                      => __( 'Install Plugins', 'candidate' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'candidate' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'candidate' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'candidate' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'candidate'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'candidate'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'candidate'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'candidate'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'candidate'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'candidate'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'candidate'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'candidate'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'candidate'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'candidate' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'candidate' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'candidate' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'candidate' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'candidate' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'candidate' ),
			'dismiss'                         => __( 'Dismiss this notice', 'candidate' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'candidate' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'candidate' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}

/*
 * Load ACF Plugin
 */
 define( 'ACF_LITE', true );
 include_once( get_template_directory() . '/lib/plugins/advanced-custom-fields/acf.php'); '

/*
 * ACF Export Personal Information
 */
 if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_personal-information',
		'title' => 'Personal information',
		'fields' => array (
			array (
				'key' => 'field_59fa58e095fa7',
				'label' => 'Who',
				'name' => 'who',
				'type' => 'row',
				'row_type' => 'row_open',
				'col_num' => 3,
			),
			array (
				'key' => 'field_59f8513f8edb6',
				'label' => 'Profile Image',
				'name' => 'profile_image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_59f851628edb7',
				'label' => 'First Name',
				'name' => 'first_name',
				'type' => 'text',
				'instructions' => 'Replace with First name(s)',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'First name(s)',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59fa5ca6751bc',
				'label' => 'Surname',
				'name' => 'surname',
				'type' => 'text',
				'instructions' => 'Replace with Surname(s)',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'Replace with Surname(s)',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59fa590295fa8',
				'label' => 'Close who',
				'name' => 'close_who',
				'type' => 'row',
				'row_type' => 'row_close',
				'col_num' => 1,
			),
			array (
				'key' => 'field_59fa49ef40961',
				'label' => 'Where',
				'name' => 'where',
				'type' => 'row',
				'row_type' => 'row_open',
				'col_num' => 4,
			),
			array (
				'key' => 'field_59fa4aff40962',
				'label' => 'House number',
				'name' => 'house_number',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59fa4b1d40963',
				'label' => 'Street Name',
				'name' => 'street_name',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59fa4b2d40964',
				'label' => 'City',
				'name' => 'city',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59fa4b3740965',
				'label' => 'Postal Code',
				'name' => 'postal_code',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => 5,
			),
			array (
				'key' => 'field_59fa4c83af8f9',
				'label' => 'Nation',
				'name' => 'nation',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59fa4b7f40967',
				'label' => 'Close where',
				'name' => 'close_where',
				'type' => 'row',
				'row_type' => 'row_close',
				'col_num' => 1,
			),
			array (
				'key' => 'field_59fa4cb938dff',
				'label' => 'Phone Numbers',
				'name' => 'phone_numbers',
				'type' => 'row',
				'row_type' => 'row_open',
				'col_num' => 2,
			),
			array (
				'key' => 'field_59f851bd8edb9',
				'label' => 'Phone',
				'name' => 'phone',
				'type' => 'text',
				'instructions' => 'Replace with telephone number',
				'default_value' => '+00 0000 000 000 0000',
				'placeholder' => '+00 0000 000 000 0000',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59f851f68edba',
				'label' => 'Mobile',
				'name' => 'mobile',
				'type' => 'text',
				'instructions' => 'Replace with mobile number',
				'default_value' => '+00 0000 000 000 0000',
				'placeholder' => '+00 0000 000 000 0000',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59fa4cda38e00',
				'label' => 'Close phone numbers',
				'name' => 'close_phone_numbers',
				'type' => 'row',
				'row_type' => 'row_close',
				'col_num' => 1,
			),
			array (
				'key' => 'field_59fa5d757eb85',
				'label' => 'Web Data',
				'name' => 'web_data',
				'type' => 'row',
				'row_type' => 'row_open',
				'col_num' => 2,
			),
			array (
				'key' => 'field_59f8521e8edbb',
				'label' => 'E-mail',
				'name' => 'e-mail',
				'type' => 'email',
				'instructions' => 'State e-mail address ',
				'default_value' => '',
				'placeholder' => 'E-mail address',
				'prepend' => '',
				'append' => '',
			),
			array (
				'key' => 'field_59f852418edbc',
				'label' => 'Website',
				'name' => 'website',
				'type' => 'text',
				'instructions' => 'State personal website(s)	',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59fa5db27eb86',
				'label' => 'Close web data',
				'name' => 'close_web_data',
				'type' => 'row',
				'row_type' => 'row_close',
				'col_num' => 1,
			),
			array (
				'key' => 'field_59fa5de929677',
				'label' => 'Various',
				'name' => 'various',
				'type' => 'row',
				'row_type' => 'row_open',
				'col_num' => 3,
			),
			array (
				'key' => 'field_59f852618edbd',
				'label' => 'Sex',
				'name' => 'sex',
				'type' => 'select',
				'choices' => array (
					'Male' => 'Male',
					'Female' => 'Female',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_59f852888edbe',
				'label' => 'Date of birth',
				'name' => 'date_of_birth',
				'type' => 'date_picker',
				'instructions' => 'Enter date of birth',
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_59f852ba8edbf',
				'label' => 'Nationality',
				'name' => 'nationality',
				'type' => 'text',
				'instructions' => 'Enter nationality/-ies ',
				'default_value' => '',
				'placeholder' => 'Nationality/-ies',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59fa5dff29678',
				'label' => 'Close various',
				'name' => 'close_various',
				'type' => 'row',
				'row_type' => 'row_close',
				'col_num' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'personal_information',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'author',
				9 => 'format',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}
