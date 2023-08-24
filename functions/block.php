<?php

/*

	Guttemberg ACF Blocks

*/

add_action('acf/init', 'my_acf_init');
function my_acf_init()
{
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
            'name' => 'hero-banner',
            'title' => __('hero banner'),
            'description' => __('Hero banner block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'banner',
            'icon' => 'welcome-view-site',
            'keywords' => array('hero', 'banner'),
        ));

        acf_register_block(array(
            'name' => 'last-year-highlights',
            'title' => __('Last Year Highlights'),
            'description' => __('Last Year Highlights block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'LastYear',
            'icon' => 'grid-view',
            'keywords' => array('Last Year', 'Highlights'),
        ));

        acf_register_block(array(
            'name' => 'latest-meeting',
            'title' => __('Latest Meeting'),
            'description' => __('Latest Meeting block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'Latest Meeting',
            'icon' => 'money',
            'keywords' => array('Latest', 'Meeting'),
        ));

        acf_register_block(array(
            'name' => 'latest-news',
            'title' => __('Latest News'),
            'description' => __('Latest News block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'Latest News',
            'icon' => 'admin-post',
            'keywords' => array('Latest', 'News'),
        ));

        acf_register_block(array(
            'name' => 'subscribe',
            'title' => __('Subscribe'),
            'description' => __('Subscribe block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'Subscribe',
            'icon' => 'email-alt2',
            'keywords' => array('Subscribe', 'Subscribe'),
        ));

        acf_register_block(array(
            'name' => 'interested',
            'title' => __('Interested'),
            'description' => __('Interested block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'Interested',
            'icon' => 'clipboard',
            'keywords' => array('Interested', 'Interested'),
        ));


    }
}

// Generic callback function to include “template parts” for our blocks.
function my_acf_block_render_callback($block)
{
    $slug = str_replace('acf/', '', $block['name']);
    // include a template part from within the "blocks" folder
    if (file_exists(get_theme_file_path("/partials/blocks/block-{$slug}.php"))) {
        include(get_theme_file_path("/partials/blocks/block-{$slug}.php"));
    }
}


?>
