<?php
/* ---  Create custom post Quarterly Earnings ---*/
function books_post_type()
{
    register_post_type(
        'Quarterly',
        array(
            'labels' => array(
                'name' => __('Quarterly'),
                'singular_name' => __('quarterly')
            ),
            'public' => true,
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
            'has_archive' => true,
            'rewrite'   => array('slug' => 'quarterly'),
            'menu_position' => 5,
            'menu_icon' => 'dashicons-visibility',
            // 'taxonomies' => array('books', 'post_tag') // this is IMPORTANT
        )
    );
}
add_action('init', 'books_post_type');



function create_taxonomy()
{
    /* --- year taxonomy ---*/
    register_taxonomy('center-category', 'quarterly', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x('Center-category', 'taxonomy category name'),
            'singular_name' => _x('center-category', 'taxonomy category name'),
            'menu_name' => __('Category'),
            'all_items' => __('All category'),
            'edit_item' => __('Edit category'),
            'update_item' => __('Update category'),
            'add_new_item' => __('Add category'),
            'new_item_name' => __('New category'),
        ),
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
    ));

    /* --- year taxonomy ---*/
    register_taxonomy('year', 'quarterly', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x('year', 'taxonomy year name'),
            'singular_name' => _x('year', 'taxonomy year name'),
            'menu_name' => __('Year'),
            'all_items' => __('All year'),
            'edit_item' => __('Edit year'),
            'update_item' => __('Update year'),
            'add_new_item' => __('Add year'),
            'new_item_name' => __('New year'),
        ),
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
    ));

    /* --- year taxonomy ---*/
    register_taxonomy('quarter', 'quarterly', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x('quarter', 'taxonomy quarter name'),
            'singular_name' => _x('quarter', 'taxonomy quarter name'),
            'menu_name' => __('Quarter'),
            'all_items' => __('All quarter'),
            'edit_item' => __('Edit quarter'),
            'update_item' => __('Update quarter'),
            'add_new_item' => __('Add quarter'),
            'new_item_name' => __('New quarter'),
        ),
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
    ));




}
add_action('init', 'create_taxonomy', 10);
