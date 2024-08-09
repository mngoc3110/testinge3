<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fort
 */

?>
</div> <!-- #content -->
<?php
/**
 * fort_newsletter hook.
 *
 * @since 1.0.0
 *
 * @hooked fort_construct_newsletter - 10
 *
 */
do_action('fort_newsletter');
?>

	<footer id="colophon" class="site-footer">
        <?php
        if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3')) {
            ?>
            <section class="site-footer-top">
                <div class="container">
                    <div class="row">
                        <?php
                        if (is_active_sidebar('footer-1')) {
                            ?>
                            <div class="col-12 col-sm-1-1 col-md-1-3">
                                <?php dynamic_sidebar('footer-1'); ?>
                            </div>
                            <?php
                        }
                        if (is_active_sidebar('footer-2')) {
                            ?>

                            <div class="col-12 col-sm-1-1 col-md-1-3">
                                <?php dynamic_sidebar('footer-2'); ?>
                            </div>
                            <?php
                        }
                        if (is_active_sidebar('footer-3')) {
                            ?>
                            <div class="col-12 col-sm-1-1 col-md-1-3">
                                <?php dynamic_sidebar('footer-3'); ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </section>
            <?php
        }
        ?>
		<section class="site-footer-bottom">
			<div class="container">
                <div class="fort-menu-social">
                    <?php
                    /**
                     * fort_footer_social hook.
                     *
                     * @since 1.0.0
                     *
                     * @hooked fort_construct_footer_social - 10
                     *
                     */
                    do_action('fort_footer_social');
                    ?>
                </div>
                <?php
                /**
                 * fort_footer_info_texts hook.
                 *
                 * @since 1.0.0
                 *
                 * @hooked fort_footer_copyright - 10
                 * @hooked fort_footer_theme_info - 20
                 *
                 */
                do_action('fort_footer_info_texts');
                ?>
			</div>
		</section>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php
/**
 * fort_construct_gototop hook
 *
 * @since 1.0.0
 *
 */
do_action('fort_gototop');

 wp_footer(); ?>

</body>
</html>
