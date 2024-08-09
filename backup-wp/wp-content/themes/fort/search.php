<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package fort
 */

get_header();
?>
<main class="site-main">
    <section class="blog-list-section search-section sec-spacing">
        <div class="container">
            <?php
            $sidebar_options = esc_attr($fort_theme_options['fort-sidebar-blog-page']);
            $sidebar_class = '';
            if ($sidebar_options == 'left-sidebar') {
                $sidebar_class = 'row-inverse-md';
            } elseif ($sidebar_options == 'no-sidebar') {
                $sidebar_class = 'row-full-width';
            } elseif ($sidebar_options == 'middle-column') {
                $sidebar_class = 'row-center-col';
            }
            ?>
            <div class="row <?php echo esc_attr($sidebar_class); ?>">
                <div id="primary" class="col-12 col-md-2-3 col-lg-2-3">
                    <?php if (have_posts()) : ?>

                        <div class="page-header">
                            <h1 class="page-title">
                                <?php
                                /* translators: %s: search query. */
                                printf(esc_html__('Search Results for: %s', 'fort'), '<span>' . get_search_query() . '</span>');
                                ?>
                            </h1>
                        </div><!-- .page-header -->
                        <?php
                        $masonry_options = esc_attr($fort_theme_options['fort-blog-page-masonry-normal']);
                        $column_class = '';
                        if ($masonry_options == 'masonry') {
                            if ($sidebar_options == 'no-sidebar') {
                                $column_class = 'fort-three-column fort-masonry';
                            } else {
                                $column_class = 'fort-two-column fort-masonry';
                            }
                        }
                        ?>
                        <div class="fort-content-area <?php echo esc_attr($column_class); ?>">
                            <?php
                            /* Start the Loop */
                            while (have_posts()) :
                                the_post();

                                /**
                                 * Run the loop for the search to output the results.
                                 * If you want to overload this in a child theme then include a file
                                 * called content-search.php and that will be used instead.
                                 */
                                get_template_part('template-parts/content', 'search');

                            endwhile;
                            ?>
                        </div>
                    <?php

                        /**
                         * fort_action_navigation hook
                         * @since 1.0.0
                         *
                         * @hooked fort_posts_navigation -  10
                         */
                        do_action('fort_action_navigation');

                    else :

                        get_template_part('template-parts/content', 'none');

                    endif;
                    ?>
                </div>
                <?php
                if (($sidebar_options == 'left-sidebar') || ($sidebar_options == 'right-sidebar')) {
                ?>
                    <div id="secondary" class="col-12 col-md-1-3 col-lg-1-3 sidebar">
                        <?php get_sidebar(); ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
</main><!-- #main -->

<?php

get_footer();
