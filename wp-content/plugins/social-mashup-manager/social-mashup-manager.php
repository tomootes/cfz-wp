<?php

/*
Plugin Name: Projects
Description: Select the social content tht will populate the social mashup
Author: Tom
Author URI: tomoot.es
Version: 0.1
*/


function codex_custom_init() {
    $args = array(
      'public' => true,
      'label'  => 'Project',
      'show_in_rest' => true,
    );
    register_post_type( 'project', $args );
}

add_action( 'init', 'codex_custom_init' );


?>
