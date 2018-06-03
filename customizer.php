<?php

function userguide_customizer_js() {
    wp_enqueue_script(
        'customizer_js',
        get_template_directory_uri() . '/customizer.js',
        array( 'jquery', 'customize-preview' ),
        '',
        true
    );
}
add_action( 'customize_preview_init', 'userguide_customizer_js' );

function userguide_customizer_settings( $wp_customize ) {
    /**
     * Navbar Background Color
     */
    $wp_customize->add_setting( 'nav_color', array(
        'default'   => '#f8f9fa',
        'transport' => 'postMessage'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_color', array(
        'label'     => 'Nav Color',
        'section'   => 'colors',
        ) ) 
    );

    /**
     * Footer Text
     */
    $wp_customize->add_setting( 'footer_text', array(
        'default'   => '&copy; My Company 2018',
        'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control( 'footer_text', array(
        'label'     => 'Footer Text',
        'section'   => 'title_tagline',
        'type'      => 'text'
    ) );

    /**
     * Footer Attribution
     */
    $wp_customize->add_setting( 'footer_attribution', array(
        'default'   => 'show',
        'transport' => 'refresh'
    ) );

    $wp_customize->add_control( 'footer_attribution', array(
        'label'     => 'Footer Attribution',
        'section'   => 'title_tagline',
        'type'      => 'select',
        'choices'   => array( 
            'show'  => 'Shown',
            'hide'  => 'Hidden'
        ),
    ) );
    // $wp_customize->remove_section( 'static_front_page' );
}

add_action( 'customize_register', 'userguide_customizer_settings' );

function userguide_customizer_css() {
    echo "<style type='text/css'>";
    $nav_color = get_theme_mod('nav_color');
    if( $nav_color ) {
        echo "nav.navbar { background: {$nav_color} }";
    }

    echo "</style>";
}
add_action( 'wp_head', 'userguide_customizer_css' );

/**
 * Change the style of navbar depending on the
 * perceived brightness of the background color.
 */
function get_navbar_type() {
    function is_bright() {
        $hex = get_theme_mod( 'nav_color', '#f8f9fa' );
        $threshold = 130;

        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        $brightness = sqrt(pow($r,2)*0.241 + pow($g,2)*0.691 + pow($b,2)*0.068);

        return $brightness > $threshold;
    }

    echo is_bright() ? "navbar-light" : "navbar-dark";
}