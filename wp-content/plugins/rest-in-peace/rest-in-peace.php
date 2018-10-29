<?php

/*
Plugin Name: Rest in peace
Description: Add stuff to the rest endpoint
Author: Tom
Author URI: tomoot.es
Version: 0.1
 */

// define('__ROOT__', dirname(dirname(__FILE__)));

require_once ABSPATH . 'wp-load.php';

$post_type = 'musician';

add_filter("rest_prepare_{$post_type}", function ($response) {

    $content = get_the_excerpt();
    $out = delete_all_between('<p class="link-more">', '</p>', $content);
    $limited = limit_text($out, 30);
    $response->data['excerpt'] = $limited;

    $response->data['next'] = get_next_post();
    $response->data['previous'] = get_previous_post();
    
    return $response;

});

add_filter("rest_prepare_{$post_type}", function ($response) {

    $response->data['image'] = get_the_post_thumbnail_url(null, 'large');
    return $response;

});



function delete_all_between($beginning, $end, $string)
{
    $beginningPos = strpos($string, $beginning);
    $endPos = strpos($string, $end);
    if ($beginningPos === false || $endPos === false) {
        return $string;
    }

    $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);

    return delete_all_between($beginning, $end, str_replace($textToDelete, '', $string)); // recursion to ensure all occurrences are replaced
}

function limit_text($text, $limit)
{
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}

// // echo 'Current PHP version: ' . phpversion();

// /**
//  * Save post metadata when a post is saved.
//  *
//  * @param int $post_id The post ID.
//  * @param post $post The post object.
//  * @param bool $update Whether this is an existing post being updated or not.
//  */
// function save_post_callback( $post_id, $post, $update ) {

//   $postObject = get_post($post_id);
//   $fields = get_fields($post_id);
//   $type = get_post_type($post_id);

//   $controller = new WP_REST_Posts_Controller($type);
//   $request = new WP_REST_Request();
//   $postObject = $controller->prepare_item_for_response( $post, $request );

//   $postObject->data['acf'] = $fields;
//   $postObject->data['slug'] = get_post_field( 'post_name', $post );

//   post($postObject);

// }

// //   // create
// //   if ($new_status == 'publish' && $old_status != 'publish') {
// //       $postObject = $controller->prepare_item_for_response( $post, $request );

// // }

// add_action( 'save_post', 'save_post_callback', 10, 3 );

// function post($object) {

//   error_log(var_export($object, true));

//   $ch = curl_init(NUXT_URL);
//   curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Authorization: ' . API_URL_FRONTEND_AUTH_KEY));
//   curl_setopt($ch, CURLOPT_POST, true);
//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//   curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($object));
//   $response = curl_exec($ch);
//   $error = curl_error($ch);
//   curl_close($ch);
// }
