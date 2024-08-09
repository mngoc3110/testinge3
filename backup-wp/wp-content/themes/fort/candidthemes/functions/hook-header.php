<?php
if (!function_exists('fort_do_skip_to_content_link')) {
    /**
     * Add skip to content link before the header.
     *
     * @since 1.0.0
     */
    function fort_do_skip_to_content_link()
    {
?>
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'fort'); ?></a>
    <?php
    }
}
add_action('fort_before_header', 'fort_do_skip_to_content_link', 10);



if (!function_exists('fort_construct_header')) {
    /**
     * Add header
     *
     * @since 1.0.0
     */
    function fort_construct_header()
    {
        global $fort_theme_options;
        $fort_enable_top_header = absint($fort_theme_options['fort-enable-top-header']);
        $fort_enable_top_menu = absint($fort_theme_options['fort-enable-top-header-menu']);
        $fort_enable_top_notification_text = esc_html($fort_theme_options['fort-enable-top-header-notification']);
        $fort_enable_top_notification_url = esc_url($fort_theme_options['fort-enable-top-header-notification-url']);
    ?>
        <header id="masthead" class="site-header site-header-v2">
            <?php
            if (($fort_enable_top_header == 1) || ((!empty($fort_enable_top_notification_text) && (!empty($fort_enable_top_social))))) {
            ?>
                <section class="site-header-topbar">
                    <a href="#" class="top-header-toggle-btn">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </a>
                    <div class="container">
                        <div class="row">

                            <div class="col col-sm-2-3 col-md-2-3 col-lg-2-4">
                                <?php
                                /**
                                 * fort_top_left hook.
                                 *
                                 * @since 1.0.0
                                 *
                                 * @hooked fort_top_menu - 10
                                 *
                                 */
                                do_action('fort_top_left');
                                ?>
                            </div>

                            <div class="col col-sm-1-3 col-md-1-3 col-lg-1-4">
                                <?php
                                /**
                                 * fort_top_right hook.
                                 *
                                 * @since 1.0.0
                                 *
                                 * @hooked fort_top_notification - 10
                                 */
                                do_action('fort_top_right');
                                ?>

                            </div>

                        </div>
                    </div>
                </section>
            <?php
            }

            /**
             * fort_main_header hook.
             *
             * @since 1.0.0
             *
             * @hooked fort_construct_main_header - 10
             */
            do_action('fort_main_header');
            ?>
        </header><!-- #masthead -->
    <?php

    }
}
add_action('fort_header', 'fort_construct_header', 10);

if (!function_exists('fort_top_menu')) {
    /**
     * Add menu on top header.
     *
     * @since 1.0.0
     */
    function fort_top_menu()
    {
        global $fort_theme_options;

        if ($fort_theme_options['fort-enable-top-header-menu'] != 1)
            return false;
    ?>
        <nav class="site-header-top-nav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'top-menu',
                'container' => 'ul',
                'menu_class' => 'site-header-top-menu',
                'depth' => 1
            ));
            ?>
        </nav>
        <?php
    }
}
add_action('fort_top_left', 'fort_top_menu', 10);




if (!function_exists('fort_top_notification')) {
    /**
     * Add notification button on top header.
     *
     * @since 1.0.0
     */
    function fort_top_notification()
    {
        global $fort_theme_options;

        $fort_enable_top_notification_text = esc_html($fort_theme_options['fort-enable-top-header-notification']);
        $fort_enable_top_notification_url = esc_url($fort_theme_options['fort-enable-top-header-notification-url']);
        if (!empty($fort_enable_top_notification_text) && !empty($fort_enable_top_notification_url)) {
            $fort_enable_top_notification_icon = esc_html($fort_theme_options['fort-enable-top-header-notification-icon']);

        ?>
            <div class="fort-top-right-menu">
                <a href="<?php echo $fort_enable_top_notification_url; ?>">
                    <?php
                    if (!empty($fort_enable_top_notification_icon)) {
                    ?>
                        <i class="fa <?php echo $fort_enable_top_notification_icon; ?>" aria-hidden="true"></i>
                    <?php
                    }
                    ?>

                    <span class="text"><?php echo $fort_enable_top_notification_text; ?></span>
                </a>
            </div>
        <?php
        }
    }
}
add_action('fort_top_right', 'fort_top_notification', 10);


if (!function_exists('fort_construct_main_header')) {
    /**
     * Add Main Header
     *
     * @since 1.0.0
     */
    function fort_construct_main_header()
    {

        /**
         * fort_header_default hook.
         *
         * @since 1.0.0
         *
         * @hooked fort_default_header - 10
         */
        do_action('fort_header_default');
    }
}
add_action('fort_main_header', 'fort_construct_main_header', 10);


if (!function_exists('fort_default_header')) {
    /**
     * Add Default header
     *
     * @since 1.0.0
     */
    function fort_default_header()
    {

        //has header image
        $has_header_image = has_header_image();
        global $fort_theme_options;
        $center_class = esc_attr($fort_theme_options['fort-make-logo-center']);
        $logo_class = (1 == $center_class) ? 'logo-center' : ''; // $r is set to 'Yes'

        ?>
        <div id="site-nav-wrap">
            <section id="site-navigation" class="site-header-top header-main-bar <?php echo esc_attr($logo_class); ?>" <?php if (!empty($has_header_image)) { ?> style="background-image: url(<?php echo header_image(); ?>);" <?php } ?>>
                <div class="container">
                    <div class="row">
                        <div class="col-md-1-2 branding-box">
                            <?php
                            /**
                             * fort_branding hook.
                             *
                             * @since 1.0.0
                             *
                             * @hooked fort_construct_branding - 10
                             */
                            do_action('fort_branding');
                            ?>
                        </div>

                        <div class="col-md-1-2 site-header-ad-wrapper">
                            <?php
                            /**
                             * fort_advertisement hook.
                             *
                             * @since 1.0.0
                             *
                             * @hooked fort_construct_advertisement - 10
                             */
                            do_action('fort_advertisement');
                            ?>

                        </div>
                    </div>
                </div>
            </section>

            <section class="site-header-bottom">
                <div class="container">
                    <?php
                    /**
                     * fort_main_menu hook.
                     *
                     * @since 1.0.0
                     *
                     * @hooked fort_construct_main_menu - 10
                     */
                    do_action('fort_main_menu');
                    ?>

                </div>
            </section>
        </div>
    <?php
    }
}
add_action('fort_header_default', 'fort_default_header', 10);





if (!function_exists('fort_construct_branding')) {
    /**
     * Add Branding on Header
     *
     * @since 1.0.0
     */
    function fort_construct_branding()
    {
    ?>
        <div class="site-branding">
            <?php
            the_custom_logo();
            if (is_front_page() && is_home()) :
            ?>
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php
            else :
            ?>
                <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
            <?php
            endif;
            $fort_description = get_bloginfo('description', 'display');
            if ($fort_description || is_customize_preview()) :
            ?>
                <p class="site-description"><?php echo $fort_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                            ?></p>
            <?php endif; ?>
        </div><!-- .site-branding -->

        <button id="menu-toggle-button" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </button>
        <?php
    }
}
add_action('fort_branding', 'fort_construct_branding', 10);




if (!function_exists('fort_construct_advertisement')) {
    /**
     * Add Advertisement on Header
     *
     * @since 1.0.0
     */
    function fort_construct_advertisement()
    {
        global $fort_theme_options;
        if ($fort_theme_options['fort-enable-headr-advertisement'] != 1)
            return false;

        $fort_advertisement_image = $fort_theme_options['fort-header-ads-image-file'];
        $fort_advertisement_url = $fort_theme_options['fort-header-ads-image-url'];
        if (!empty($fort_advertisement_image) && !empty($fort_advertisement_url)) {
        ?>
            <a href="<?php echo esc_url($fort_advertisement_url); ?>" target="_blank">
                <img src="<?php echo esc_url($fort_advertisement_image); ?>">
            </a>
        <?php
        } elseif (!empty($fort_advertisement_image)) {
        ?>
            <img src="<?php echo esc_url($fort_advertisement_image); ?>">
        <?php
        }
    }
}
add_action('fort_advertisement', 'fort_construct_advertisement', 10);



if (!function_exists('fort_construct_main_menu')) {
    /**
     * Add Main Menu on Header
     *
     * @since 1.0.0
     */
    function fort_construct_main_menu()
    {
        ?>
        <nav class="main-navigation">
            <ul id="primary-menu" class="nav navbar-nav nav-menu">
                <?php
                if (has_nav_menu('menu-1')) :
                    wp_nav_menu(array(
                        'theme_location' => 'menu-1',
                        'items_wrap' => '%3$s',
                        'container' => false
                    ));
                else :
                    wp_list_pages(array('depth' => 0, 'title_li' => ''));
                endif; // has_nav_menu
                ?>
                <button class="close_nav"><i class="fa fa-times"></i></button>
            </ul>
        </nav><!-- #site-navigation -->

        <div class="fort-menu-social topbar-flex-grid">
            <?php
            /**
             * fort_menu_right hook.
             *
             * @since 1.0.0
             *
             * @hooked fort_menu_social - 10
             * @hooked fort_menu_search - 20
             *
             */
            do_action('fort_menu_right');
            ?>
        </div>
    <?php
    }
}
add_action('fort_main_menu', 'fort_construct_main_menu', 10);



if (!function_exists('fort_menu_social')) {
    /**
     * Add social icon menu on menu .
     *
     * @since 1.0.0
     */
    function fort_menu_social()
    {
        global $fort_theme_options;
        if ($fort_theme_options['fort-enable-top-header-social'] != 1)
            return false;
        fort_social_menu();
    }
}
add_action('fort_menu_right', 'fort_menu_social', 10);


if (!function_exists('fort_menu_search')) {
    /**
     * Add search icon on menu.
     *
     * @since 1.0.0
     */
    function fort_menu_search()
    {
        global $fort_theme_options;
        if ($fort_theme_options['fort-enable-top-header-search'] != 1)
            return false;
    ?>
        <div class="search-box">
            <button class="search-toggle"><i class="fa fa-search"></i></button>
            <button class="close-btn"><i class="fa fa-times"></i></button>
            <div class="search-section">
                <?php get_search_form(); ?>
            </div>
        </div>
<?php
    }
}
add_action('fort_menu_right', 'fort_menu_search', 20);
