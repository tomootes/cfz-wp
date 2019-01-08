<?php

$post_type = 'post';

add_filter("rest_prepare_{$post_type}", function ($response) {

    $content = get_the_excerpt();
    $out = delete_all_between('<p class="link-more">', '</p>', $content);
    $limited = limit_text($out, 30);
    $response->data['excerpt'] = $limited;

    $response->data['next'] = get_next_post();
    $response->data['previous'] = get_previous_post();

    $post = get_post(); 

    if ( has_blocks( $post->post_content ) ) {

        $blocks = parse_blocks( $post->post_content );

        // if (isset( $blocks[1] )) {
        //     if ( $blocks[1]['innerHTML'] == "\n\n" ) {
        //         unset($blocks[1]);
        //     }
        // }

        // $filteredBlocks = array_filter($blocks, function($v, $k) {
        //     error_log('ola cola');

        //     error_log(print_r($v));
        //     error_log(print_r($k));

        //     return($v !== null);

        // });
    
        $response->data['blocks'] = $blocks;


    }
    
    return $response;

});

add_filter("rest_prepare_{$post_type}", function ($response) {

    $response->data['image'] = get_the_post_thumbnail_url(null, 'full');
    return $response;

});

?>