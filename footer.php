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
                            <a href="https://jaketreacher.com" target="_blank">Theme by Jake Treacher</a>
                        </span>
        
                    <?php endif; ?>
                </div> <!-- .col-sm-12 -->
            </div> <!-- .row -->
        </div> <!-- .container -->
    </footer>

    <?php wp_footer(); ?>

</body>
</html>