<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="container">

        <nav class="navbar <?php get_navbar_type(); ?>">
            <div class="nav-head">
                <div class="brand">Brand Name</div>
    
                <div class="navbar-toggler" data-toggle="collapsed" data-target="#main-nav">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
            </div>

            <?php
                wp_nav_menu([
                    'theme_location'    => 'main-menu',
                    'container_class'   => 'nav-list collapsed',
                    'container_id'      => 'main-nav',
                ]);
            ?>
        </nav>

        <main role="main">
