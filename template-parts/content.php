<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <header class="entry-header">
            <?php the_title( '<h1>', '</h1>' ); ?>
        </header>

        <div class="entry-content">
            <?php the_content(); ?>
        </div>

    <?php endwhile; else : ?>

        <header class="entry-header">
            <h1><?php esc_html_e( 'index.php 404', 'userguide'); ?></h1>
        </header>

        <div class="entry-content">
            <p><?php esc_html_e( 'No content found.', 'userguide'); ?></p>
        </div>

    <?php endif; ?>

</article>