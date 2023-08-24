<?php

add_action("wp_ajax_load_posts", "load_posts");
add_action("wp_ajax_nopriv_load_posts", "load_posts");

function load_posts()
{


    if (!wp_verify_nonce($_REQUEST['nonce'], "load_posts")) {
        exit("No naughty business please");
    }


    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $_REQUEST['posts-per-page'],
        'post_status' => 'publish',
        'paged' => $_REQUEST['paged'] + 1,
        'category_name' => $_REQUEST['category'],
    );

    $posts = query_posts($args);
    $data = [];

    foreach ($posts as $key => $item) {
        $category = get_the_category($item);

        $data[$key] = [

            'image' => get_the_post_thumbnail_url($item->ID, 'large'),
            'title' => get_the_title($item),
            'url' => get_the_permalink($item),
            'excerpt' => get_the_excerpt($item->ID),
            'date' => date('F j, Y', strtotime($item->post_date)),
            'category_name' => $category[0]->name,
            'category_url' => get_category_link($category[0]),

        ];
    }


    $response = [
        'posts' => $data,

    ];


    wp_send_json_success(array(
        'response' => $response
    ));


}