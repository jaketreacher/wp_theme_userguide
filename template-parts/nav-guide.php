<?php
    wp_nav_menu([
        'theme_location'    => 'guide-menu',
        'walker'            => new UserGuide_Navwalker(),
    ]);
?>
