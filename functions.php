<?php
/**
 * Autoload composer libraries
 */
require __DIR__.'/vendor/autoload.php';

/**
 * Load .env variables
 */
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

include('customizer.php');

add_theme_support( 'html5' );

/**
 * Add CSS
 */
function theme_styles() {
    $file = getenv( 'APP_ENV' ) == 'development' ? '/build/style.css' : '/style.css';
    wp_enqueue_style( 'main_css', get_template_directory_uri() . $file );
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

/**
 * Add JS
 */
function theme_js() {
    global $wp_scripts;
    
    $file = getenv( 'APP_ENV' ) == 'development' ? '/build/bundle.js' : '/bundle.js';
    wp_enqueue_script( 'main_js', get_template_directory_uri() . $file );
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

function userguide_get_header_image($args) {
    $name = $args['name'];
    $width = $args['width'];
    $height = $args['height'];

    $image_id = get_theme_mod( $name );
    $url = "http://via.placeholder.com/{$width}x${height}";
    $alt = "Placeholder Image";
    if( $image_id != false ) {
        $url = wp_get_attachment_image_url( $image_id, 'full' );
        $alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
    }
    
    echo "<img src='{$url}' alt='{$alt}'>";
}

/**
 * Change the style of navbar depending on the
 * perceived brightness of the background color.
 */
function get_navbar_type() {
    $hex = get_theme_mod( 'nav_color', '#f8f9fa' );
    $threshold = 130;

    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
    $brightness = sqrt(pow($r,2)*0.241 + pow($g,2)*0.691 + pow($b,2)*0.068);

    echo $brightness > $threshold ? "navbar-light" : "navbar-dark";
}
