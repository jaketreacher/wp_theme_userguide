<?php

function create_guide() {
    $labels = array(
        'name' => __( 'Guides' ),
        'singluar_name' => __( 'Guide' )
    );

    $args = array(
        'labels' => $labels,
        'supports' => array(
            'title', 'editor', 'author',
            'revisions', 'page-attributes'
        ),
        'taxonomies' => array( 'guides' ),
        'hierarchical' => true,
        'public' => true,
        'menu_icon' => 'dashicons-book',
    );
    register_post_type( 'guides', $args );
}

add_action( 'init', 'create_guide' );