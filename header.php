<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="container">
        <nav class="navbar navbar-expand-md flex-row flex-md-column <?php get_navbar_type() ?>">
            <div class="row text-center align-items-center flex-nowrap align-self-md-stretch justify-content-around">
                <div class="col-auto">
                    <?php 
                        userguide_get_header_image( array(
                            'name'      => 'product_logo',
                            'width'     => 450,
                            'height'    => 150
                        ) );
                    ?>
                </div>
                <div class="col-sm d-none d-md-block">
                    <?php bloginfo( 'description' ); ?>
                </div>
                <div class="col-auto">
                    <?php 
                        userguide_get_header_image( array(
                            'name'      => 'company_logo',
                            'width'     => 150,
                            'height'    => 150
                        ) );
                    ?>
                </div>
            </div>
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
                wp_nav_menu([
                    'theme_location'    => 'main-menu',
                    'depth'             => 1,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'main-nav',
                    'menu_class'        => 'navbar-nav mr-auto',
                    'fallback_cb'       => 'WP_Boostrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker(),
                ]);
            ?>
        </nav>

        <main role="main">
