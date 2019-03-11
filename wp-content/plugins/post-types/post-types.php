<?php

/*
Plugin Name: Projects
Description: CFZ Posttypes
Author: Tom
Author URI: tomoot.es
Version: 0.1
*/

function codex_custom_init() {
    $args = array(
      'public' => true,
      'label'  => 'Muzikant',
      'show_in_rest' => true,
      'supports' => array( 'thumbnail','title','editor'  )
    );
    register_post_type( 'musician', $args );
}

add_action( 'init', 'codex_custom_init' );

function register_sponsor() {
  $args = array(
    'public' => true,
    'label'  => 'Sponsor',
    'show_in_rest' => true,
    'supports' => array( 'thumbnail','title','editor' )
  );
  register_post_type( 'sponsor', $args );
}

add_action( 'init', 'register_sponsor' );

function register_event() {
  $args = array(
    'public' => true,
    'label'  => 'Evenement',
    'show_in_rest' => true,
    'supports' => array( 'thumbnail','title','editor', 'excerpt'  )
  );
  register_post_type( 'event', $args );
}

add_action('init', 'register_event');

require_once dirname( __FILE__ ) . '/acf-fields/event-fields.php';

?>
