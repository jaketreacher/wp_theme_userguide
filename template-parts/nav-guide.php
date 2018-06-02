<div class="guide-menu-container">
    <span class="toggle">X</span>
    <?php
        wp_nav_menu([
            'theme_location'    => 'guide-menu',
            'container'         => null,
            'menu_class'        => 'nav nav-pills flex-column',
            'walker'            => new UserGuide_Navwalker(),
        ]);
    ?>
</div>