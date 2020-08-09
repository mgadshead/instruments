<?php

define('THEME_URL', get_template_directory_uri());

function load_styles() {

  wp_enqueue_style('style', THEME_URL.'/css/main.min.css');

}

add_action( 'wp_enqueue_scripts', 'load_styles');

function load_scripts() {

  wp_deregister_script('jquery');
  wp_enqueue_script('fetch', 'https://cdnjs.cloudflare.com/ajax/libs/fetch/3.1.0/fetch.min.js');
  wp_enqueue_script('main', THEME_URL.'/js/main.min.js', array('fetch'));

}

add_action( 'wp_enqueue_scripts', 'load_scripts');

add_theme_support('post-thumbnails');

function create_instrument_cpt() {

  $labels = array(
    'name'               => _x( 'Instruments', 'post type general name' ),
    'singular_name'      => _x( 'Instrument', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'instrument' ),
    'add_new_item'       => __( 'Add New Instrument' ),
    'edit_item'          => __( 'Edit Instrument' ),
    'new_item'           => __( 'New Instrument' ),
    'all_items'          => __( 'All Instruments' ),
    'view_item'          => __( 'View Instrument' ),
    'search_items'       => __( 'Search Instruments' ),
    'not_found'          => __( 'No instruments found' ),
    'not_found_in_trash' => __( 'No instruments found in the Trash' ), 
    'parent_item_colon'  => ’,
    'menu_name'          => 'Instruments'
  );

  $args = array(
    'labels'        => $labels,
    'description'   => 'Instruments',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    'has_archive'   => true,
    'taxonomies'  => array( 'category' ),
    'show_in_rest' => true
  );

  register_post_type( 'instrument', $args ); 

}

add_action( 'init', 'create_instrument_cpt' );