<?php
/**
 * Plugin Name: Personal Information CPT
 **/

class WPSE_26330_Personal_Information_CPT {

    function __construct() {

        // register the personal_information post type
        add_action( 'init', array( &$this, 'register_personal_information_cpt' ) );

        // add the menu link
        add_action( 'admin_menu', array( &$this, 'edit_personal_information_link' ) );
    }

    function edit_personal_information_link() {
        global $submenu, $pagenow;

        // query the personal_information posts
        $personal_information = new WP_Query( 'post_type=personal_information' );

        // if its new post page and we have personal_information
        if ( $pagenow == 'post-new.php' && $personal_information->have_posts() ) {
            wp_die('You cant add more then one Personal Information');
        }

        // if we have personal_information post, show the edit link else the add personal_information link
        if ( $personal_information->have_posts() ) {
            $personal_information->the_post();
            $link = get_edit_post_link( get_the_ID(), 'return' );
            $title = 'Edit Personal Information';
        } else {
            // in case if the user has deleted the default post
            $link = get_bloginfo( 'url' ). '/wp-admin/post-new.php?post_type=personal_information';
            $title = 'Add Personal Information';
        }
        $submenu['edit.php'] = array( array( $title, 'manage_options', $link ) ) + $submenu['edit.php'];
    }

    function register_personal_information_cpt() {

	$labels = array(
		'name'                  => _x( 'Personal informations', 'Post Type General Name', 'candidate' ),
		'singular_name'         => _x( 'Personal information', 'Post Type Singular Name', 'candidate' ),
		'menu_name'             => __( 'Personal information', 'candidate' ),
		'name_admin_bar'        => __( 'Personal information', 'candidate' ),
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
		'label'                 => __( 'Personal information', 'candidate' ),
		'description'           => __( 'Personal information', 'candidate' ),
		'labels'                => $labels,
		'supports'              => array( 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-id',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
        register_post_type( 'personal_information', $args );
    }



}

$GLOBALS['wpse_personal_information_cpt'] = new WPSE_26330_Personal_Information_CPT;
?>