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


?>
