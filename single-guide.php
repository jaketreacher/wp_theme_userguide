<?php get_header(); ?>

single-guide.php

<div class="row">
    <div class="offset-sm-4 col-sm-8">
        <?php get_template_part( 'template-parts/content' ); ?>
        </hr>
        <span class="prevnext">
            <?php get_guide_prev_next(); ?>
        </span>
    </div>
</div>
<?php get_template_part( 'template-parts/nav', 'guide' ); ?>


<?php get_footer(); ?>