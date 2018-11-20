<?php

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

?>