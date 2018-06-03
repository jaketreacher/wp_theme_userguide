        </main>
    </div><!-- .container -->

    <footer id="colophon" class="footer" role="contentinfo">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <span class="footer-text">
                        <?php echo get_theme_mod( 'footer_text' ); ?>
                    </span>

                    <?php if( get_theme_mod( 'footer_attribution' ) != 'hide' ) : ?>
                        <span class="footer-attribution">
                            Theme:
                            <a href="https://github.com/jaketreacher/wp_theme_userguide" target="_blank"><u>User&nbsp;Guide</u></a>
                            by
                            <a href="https://jaketreacher.com" target="_blank"><u>Jake&nbsp;Treacher</u></a>
                        </span>
        
                    <?php endif; ?>
                </div> <!-- .col-sm-12 -->
            </div> <!-- .row -->
        </div> <!-- .container -->
    </footer>

    <?php wp_footer(); ?>

</body>
</html>