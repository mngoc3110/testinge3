<?php
if (!function_exists('fort_construct_gototop')) {
    /**
     * Add Go to Top Button on Site.
     *
     * @since 1.0.0
     *
     * @param none
     * @return void
     *
     */
    function fort_construct_gototop()
    {
        global $fort_theme_options;
        /*Font-Awesome-master*/
        $fort_fontawesome = !empty($fort_theme_options['fort-font-awesome-version-loading']) ? esc_attr($fort_theme_options['fort-font-awesome-version-loading']) : 'version-4';

        if ($fort_fontawesome == 'version-5') {
            $go_to_top_class = esc_attr($fort_theme_options['fort-go-to-top-icon-5']);
        } else {
            $go_to_top_class = esc_attr($fort_theme_options['fort-go-to-top-icon']);
        }
        if ($fort_theme_options['fort-go-to-top'] == true) :
?>
            <a href="javascript:void(0);" class="footer-go-to-top go-to-top"><i class="fa <?php echo esc_attr($go_to_top_class); ?>"></i></a>
        <?php
        endif;
    }
}
add_action('fort_gototop', 'fort_construct_gototop', 10);

if (!function_exists('fort_construct_footer_social')) {
    /**
     * Add social icon menu on footer
     *
     * @since 1.0.0
     */
    function fort_construct_footer_social()
    {
        global $fort_theme_options;
        if ($fort_theme_options['fort-footer-social-icons'] != true)
            return false;
        fort_social_menu();
    }
}
add_action('fort_footer_social', 'fort_construct_footer_social', 10);

if (!function_exists('fort_footer_copyright')) {
    /**
     * Add Footer copyright texts on footer
     *
     * @since 1.0.0
     */
    function fort_footer_copyright()
    {
        global $fort_theme_options;
        $copyright_text = $fort_theme_options['fort-footer-copyright'];
        if (!empty($copyright_text)) {
        ?>
            <div class="site-reserved text-center">
                <?php echo esc_html($copyright_text); ?>
            </div>
        <?php
        }
    }
}
add_action('fort_footer_info_texts', 'fort_footer_copyright', 10);

if (!function_exists('fort_footer_theme_info')) {
    /**
     * Add Powered by texts on footer
     *
     * @since 1.0.0
     */
    function fort_footer_theme_info()
    {
        ?>
        <div class="site-info text-center">
            <a href="<?php echo esc_url(__('https://wordpress.org/', 'fort')); ?>">
                <?php
                /* translators: %s: CMS name, i.e. WordPress. */
                printf(esc_html__('Proudly powered by %s', 'fort'), 'WordPress');
                ?>
            </a>
            <span class="sep"> | </span>
            <?php
            /* translators: 1: Theme name, 2: Theme author. */
            printf(esc_html__('Theme: %1$s by %2$s.', 'fort'), 'Fort', '<a href="http://www.candidthemes.com/">Candid Themes</a>');
            ?>
        </div><!-- .site-info -->
    <?php
    }
}
add_action('fort_footer_info_texts', 'fort_footer_theme_info', 20);

if (!function_exists('fort_construct_newsletter')) {
    /**
     * Add Newsletter section on footer
     *
     * @since 1.0.0
     */
    function fort_construct_newsletter()
    {
        global $fort_theme_options;
        $mailchimp_id = $fort_theme_options['fort-footer-mailchimp-form-id'];
        if (($fort_theme_options['fort-footer-mailchimp-subscribe']) != 1 || (empty($mailchimp_id)) || (!function_exists('mc4wp_get_form')) || (get_post_status($mailchimp_id) == false))
            return false;
        $newsletter_title =  $fort_theme_options['fort-footer-mailchimp-form-title'];
        $newsletter_description =  $fort_theme_options['fort-footer-mailchimp-form-subtitle'];
    ?>
        <section class="newsletter-section">
            <div class="container">
                <article class="newsletter-content">
                    <div class="row">
                        <div class="col-1-1 col-md-1-2">
                            <?php
                            if (!empty($newsletter_title)) {
                            ?>
                                <h2><?php echo esc_html($newsletter_title); ?></h2>
                            <?php
                            }
                            ?>
                            <?php
                            if (!empty($newsletter_description)) {
                            ?>
                                <p><?php echo esc_html($newsletter_description);; ?></p>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-1-1 col-md-1-2">
                            <?php echo mc4wp_get_form(absint($mailchimp_id)); ?>
                        </div>
                    </div>
                </article>
            </div>
        </section>
<?php
    }
}
add_action('fort_newsletter', 'fort_construct_newsletter', 10);
