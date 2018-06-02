<?php
    wp_nav_menu([
        'theme_location'    => 'guide-menu',
        'menu_class'        => 'nav nav-pills flex-column',
        'walker'            => new UserGuide_Navwalker(),
    ]);
?>
