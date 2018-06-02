<div class="guide-menu-container">
    <?php
        wp_nav_menu([
            'theme_location'    => 'guide-menu',
            'container'         => null,
            'menu_class'        => 'nav nav-pills flex-column',
            'walker'            => new UserGuide_Navwalker(),
        ]);
    ?>
</div>