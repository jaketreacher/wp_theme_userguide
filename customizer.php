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
     * Blog Description
     */
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

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
     * Product Logo
     */
    $wp_customize->add_setting( 'product_logo', array(
        'default'   => null,
        'transport' => 'refresh'
    ) );

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'product_logo', array(
        'label'         => 'Product Logo',
        'section'       => 'title_tagline',
        'description'   => 'This is the image that appears on the left side of the header navbar.',
        'height'        => 150,
        'width'         => 450,
        ) )
    );

    /**
     * Company Logo
     */
    $wp_customize->add_setting( 'company_logo', array(
        'default'   => null,
        'transport' => 'refresh'
    ) );

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'company_logo', array(
        'label'         => 'Company Logo',
        'section'       => 'title_tagline',
        'description'   => 'This is the image that appears on the right side of the header navbar.',
        'height'        => 150,
        'width'         => 150,
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
