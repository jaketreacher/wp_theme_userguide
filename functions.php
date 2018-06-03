<?php
include('customizer.php');

add_theme_support( 'html5' );

/**
 * Add CSS
 */
function theme_styles() {
    wp_enqueue_style( 'bootstrap_css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' );
    wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

/**
 * Add JS
 */
function theme_js() {
    global $wp_scripts;

    wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js' );
    wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' );
    wp_enqueue_script( 'bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js' );
    // wp_enqueue_script( 'main_js', get_template_directory_uri() . '/script.js');
}
add_action( 'wp_enqueue_scripts', 'theme_js' );

/**
 * Register Custom Navigation Walker
 */
function register_navwalker() {
    # Bootstrap Navwalker
    $navwalker_php = get_template_directory() . '/vendor/wp-bootstrap/wp-bootstrap-navwalker/class-wp-bootstrap-navwalker.php';
    if( ! file_exists( $navwalker_php ) ) {
        // File doesn't exist
        return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing. Try running `composer install`.', 'userguide' ) );
    } else {
        require_once( $navwalker_php );
    }

    # UserGuide Navwalker
    require_once( get_template_directory() . '/classes/UserGuide_Navwalker.php' );
}
register_navwalker();

/**
 * Register Menu Locations
 */
register_nav_menus([
    'main-menu' => esc_html__( 'Header at the top of the page.', 'userguide' ),
    'guide-menu' => esc_html__( 'Left of `guide` pages.', 'userguide' )
]);

/**
 * Register Guide Custom Post Type
 */
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
    register_post_type( 'guide', $args );
}
add_action( 'init', 'create_guide' );

function get_guide_prev_next() {
    global $post;
    $items = wp_get_nav_menu_items( 'guide-menu' );
    $curr_idx = array_search($post->ID, array_column($items, 'object_id')); // Get index of current page

    if( $curr_idx === false ) return; // Exit if the current page is not in the menu

    // If we aren't the first page, we can get the 'previous' page
    if( $curr_idx > 0 ) {
        $url = $items[$curr_idx-1]->url;
        echo "<a href='{$url}' class='prev'>Previous</a>";
    }

    // If we aren't the last page, we can get the 'next' page
    if( $curr_idx < count($items) - 1 ) {
        $url = $items[$curr_idx+1]->url;
        echo "<a href='{$url}' class='next'>Next</a>";
    }
}