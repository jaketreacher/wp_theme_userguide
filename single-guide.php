<?php get_header(); ?>

single-guide.php

<?php
    wp_nav_menu([
        'theme_location'    => 'guide-menu',
        'walker'            => new UserGuide_Navwalker(),
    ]);
?>

<?php get_footer(); ?>