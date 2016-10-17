<?php
/**
 * Register theme support for languages, menus, post-thumbnails, post-formats etc.
 *
 */


//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_formats_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it formats for your posts

function create_formats_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'Formats', 'taxonomy general name' ),
    'singular_name' => _x( 'Format', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Formats' ),
    'all_items' => __( 'All Formats' ),
    'parent_item' => __( 'Parent Format' ),
    'parent_item_colon' => __( 'Parent Format:' ),
    'edit_item' => __( 'Edit Format' ), 
    'update_item' => __( 'Update Format' ),
    'add_new_item' => __( 'Add New Format' ),
    'new_item_name' => __( 'New Format Name' ),
    'menu_name' => __( 'Formats' ),
  ); 	

// Now register the taxonomy

  register_taxonomy('formats',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'format' ),
  ));

}