<?php 
/*
 * Template Name: Guide Menu Sidebar
 * Template Post Type: page
 */
get_header(); ?>

guide.php

<?php
    wp_nav_menu([
        'theme_location'    => 'guide-menu',
        'walker'            => new UserGuide_Navwalker(),
    ]);
?>

<?php get_footer(); ?>