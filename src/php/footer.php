<?php
/**
 * The template for displaying the footer
 *
 * @package immerge_demo
 */

?>

</div><!-- .app end -->

<footer class="footer">
    <?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
    <!-- <div class="footer__section">
        <h3>Section Title</h3>
        <p>Immerge is a division of McClung Companies. At McClung, we seek to deliver an exceptional customer experience
        and be recognized as the region’s premier experts for comprehensive printing, marketing, and digital services.
        And, as we have for many years, we commit to continue our heritage of innovation, personal service, and exceeding
        partner expectations at every touch-point.</p>
        <p>139 N. Liberty Street Suite 202<br />
        Harrisonburg, VA 22802</p>
        <p>info@immergetech.com<br />
        (540) 437-9617</p>
    </div>.footoer__section end -->

    <div class="footer__section">
        <?php
        /* translators: %s: CMS name, i.e. WordPress. */
        printf( esc_html__( 'Proudly powered by %s', 'immerge_demo' ), 'WordPress' );
        ?>
        <?php
        /* translators: 1: Theme name, 2: Theme author. */
        printf( esc_html__( 'Theme: %1$s by %2$s.', 'immerge_demo' ), 'immerge_demo', '<a href="https://immergetech.com">Immerge</a>' );
        ?>
    </div><!-- .footer__section end -->
</footer><!-- .footer end -->

<?php wp_footer(); ?>

</body>
</html>
