<?php

if (!function_exists('fort_construct_cat_section')) {
    /**
     * Display category section on homepage
     *
     * @since 1.0.0
     *
     */
    function fort_construct_cat_section()
    {
        global $fort_theme_options;
        if ((is_front_page()) && ($fort_theme_options['fort-enable-category-boxes'] == 1)) {
            /**
             * fort_single_cat_posts hook.
             *
             * @since 1.0.0
             *
             * @hooked fort_constuct_single_cat_posts - 10
             */
            do_action('fort_single_cat_posts');
        }
    }
}
add_action('fort_cat_section', 'fort_construct_cat_section', 10);


if (!function_exists('fort_constuct_single_cat_posts')) {
    /**
     * Display latest posts boxes of 3 different categories
     *
     * @since 1.0.0
     *
     */
    function fort_constuct_single_cat_posts()
    {
        global $fort_theme_options;
        $cat1 = absint($fort_theme_options['fort-single-cat-posts-select-1']);
        if (!empty($cat1)) {
?>
            <section class="promo-section sec-spacing">
                <div class="container">
                    <div class="row">
                        <?php
                        $fort_cat_post_args = array(
                            'category__in' => $cat1,
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'post_status' => 'publish',
                            'ignore_sticky_posts' => true
                        );
                        $fort_featured_query = new WP_Query($fort_cat_post_args);
                        if ($fort_featured_query->have_posts()) :

                            while ($fort_featured_query->have_posts()) : $fort_featured_query->the_post();
                        ?>
                                <div class="col-1-1 col-sm-1-2 col-md-1-3">
                                    <div class="card card-bg-image card-promo">
                                        <figure class="card_media">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php
                                                if (has_post_thumbnail()) {
                                                    the_post_thumbnail('fort-medium');
                                                } else {
                                                ?>
                                                    <img src="<?php echo esc_url(get_template_directory_uri()) . '/candidthemes/assets/custom/img/fort-medium.jpg' ?>" alt="<?php the_title(); ?>">
                                                <?php
                                                }
                                                ?>
                                            </a>
                                        </figure>

                                        <article class="card_body">
                                            <h3 class="card_title">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>
                                            <div class="entry-meta">

                                                <?php
                                                fort_posted_on();
                                                fort_posted_by();
                                                ?>
                                            </div>

                                        </article>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </section>
            <?php
        }
    }
}
add_action('fort_single_cat_posts', 'fort_constuct_single_cat_posts', 10);



if (!function_exists('fort_posts_navigation')) {
    /**
     * Display pagination based on type seclected
     *
     * @since 1.0.0
     *
     */
    function fort_posts_navigation()
    {
        global $fort_theme_options;
        if ($fort_theme_options['fort-pagination-options'] == 'numeric') {
            the_posts_pagination();
        } else {
            the_posts_navigation();
        }
    }
}
add_action('fort_action_navigation', 'fort_posts_navigation', 10);


if (!function_exists('fort_related_post')) :
    /**
     * Display related posts from same category
     *
     * @param int $post_id
     * @return void
     *
     * @since 1.0.0
     *
     */
    function fort_related_post($post_id)
    {

        global $fort_theme_options;
        if ($fort_theme_options['fort-single-page-related-posts'] == 0) {
            return;
        }
        $categories = get_the_category($post_id);
        if ($categories) {
            $category_ids = array();
            $category = get_category($category_ids);
            $categories = get_the_category($post_id);
            foreach ($categories as $category) {
                $category_ids[] = $category->term_id;
            }
            $count = $category->category_count;
            if ($count > 1) { ?>
                <div class="related-post">
                    <?php
                    $fort_related_post_title = esc_html($fort_theme_options['fort-single-page-related-posts-title']);
                    if (!empty($fort_related_post_title)) :
                    ?>
                        <h2 class="post-title"><?php echo esc_html($fort_related_post_title); ?></h2>
                    <?php
                    endif;

                    $fort_cat_post_args = array(
                        'category__in' => $category_ids,
                        'post__not_in' => array($post_id),
                        'post_type' => 'post',
                        'posts_per_page' => 2,
                        'post_status' => 'publish',
                        'ignore_sticky_posts' => true
                    );
                    $fort_featured_query = new WP_Query($fort_cat_post_args);
                    ?>
                    <div class="row">
                        <?php
                        if ($fort_featured_query->have_posts()) :

                            while ($fort_featured_query->have_posts()) : $fort_featured_query->the_post();
                        ?>
                                <div class="col-1-1 col-sm-1-2 col-md-1-2">
                                    <div class="card card-blog-post card-full-width">
                                        <?php
                                        if (has_post_thumbnail()) :
                                        ?>
                                            <figure class="card_media">
                                                <a href="<?php the_permalink() ?>">
                                                    <?php the_post_thumbnail('fort-medium'); ?>
                                                </a>
                                            </figure>
                                        <?php
                                        endif;
                                        ?>
                                        <div class="card_body">
                                            <?php fort_list_category(); ?>
                                            <h4 class="card_title">
                                                <a href="<?php the_permalink() ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h4>
                                            <div class="entry-meta">
                                                <?php
                                                fort_posted_on();
                                                fort_posted_by();
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endwhile;
                            ?>
                    </div>

                <?php
                        endif;
                        wp_reset_postdata();
                ?>
                </div> <!-- .related-post -->
            <?php
            }
        }
    }
endif;
add_action('fort_related_posts', 'fort_related_post', 10, 1);


if (!function_exists('fort_constuct_carousel')) {
    /**
     * Add carousel on header
     *
     * @since 1.0.0
     */
    function fort_constuct_carousel()
    {

        if (is_front_page()) {
            global $fort_theme_options;
            if ($fort_theme_options['fort-enable-slider'] != 1)
                return false;
            $featured_cat = absint($fort_theme_options['fort-select-category']);
            $fort_slider_args = array();
            if (is_rtl()) {
                $fort_slider_args['rtl'] = true;
            }
            $fort_slider_args_encoded = wp_json_encode($fort_slider_args);
            $query_args = array(
                'post_type' => 'post',
                'ignore_sticky_posts' => true,
                'posts_per_page' => 6,
                'cat' => $featured_cat
            );

            $query = new WP_Query($query_args);
            if ($query->have_posts()) :
            ?>
                <section class="hero hero-slider-section">
                    <div class="container">
                        <!-- slick slider component start -->
                        <div class="hero_slick-slider" data-slick='<?php echo $fort_slider_args_encoded; ?>'>
                            <?php
                            $i = 1;
                            while ($query->have_posts()) :
                                $query->the_post();
                                if (has_post_thumbnail()) {
                                    $wrapper_class = 'card card-bg-image';
                                } else {
                                    $wrapper_class = 'card card-bg-image card-no-thumbnail';
                                }

                            ?>
                                <div class="<?php echo $wrapper_class; ?>">
                                    <?php
                                    if (has_post_thumbnail()) {
                                    ?>
                                        <div class="post-thumb">
                                            <figure class="card_media">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php
                                                    $cropped_image = $fort_theme_options['fort-image-size-slider'];
                                                    if ($cropped_image == 'cropped-image') {
                                                        the_post_thumbnail('fort-large');
                                                    } else {
                                                        the_post_thumbnail();
                                                    }
                                                    ?>
                                                </a>
                                            </figure>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <article class="card_body">
                                        <?php
                                        fort_list_category();
                                        ?>

                                        <h3 class="card_title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>

                                        <div class="entry-meta">
                                            <?php
                                            fort_posted_on();
                                            fort_posted_by();
                                            ?>
                                        </div>

                                        <div class="btn-wrap">
                                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                                        </div>
                                    </article>

                                </div>
                            <?php
                                $i++;

                            endwhile;
                            ?>
                        </div>
                    </div>
                </section><!-- .hero -->
            <?php
            endif;
            wp_reset_postdata();
        } //is_front_page
    }
}
add_action('fort_carousel', 'fort_constuct_carousel', 10);


if (!function_exists('fort_breadcrumb_options')) :
    /**
     * Functions to manage breadcrumbs
     */
    function fort_breadcrumb_options()
    {
        global $fort_theme_options;
        if (($fort_theme_options['fort-blog-site-breadcrumb'] == 1) && !is_front_page()) {
            $breadcrumb_from = $fort_theme_options['fort-breadcrumb-display-from-option'];

            if ((function_exists('yoast_breadcrumb')) && ($breadcrumb_from == 'yoast-breadcrumb')) {
            ?>
                <div class="fort-breadcrumb-wrapper">
                    <?php
                    yoast_breadcrumb();
                    ?>
                </div>
            <?php
            } elseif ((function_exists('rank_math_the_breadcrumbs')) && ($breadcrumb_from == 'rankmath-breadcrumb')) {
            ?>
                <div class="fort-breadcrumb-wrapper">
                    <?php
                    rank_math_the_breadcrumbs();
                    ?>
                </div>
            <?php
            } elseif ((function_exists('bcn_display')) && ($breadcrumb_from == 'breadcrumb-navxt')) {
            ?>
                <div class="fort-breadcrumb-wrapper">
                    <?php
                    bcn_display();
                    ?>
                </div>
            <?php
            } else {
            ?>
                <div class="fort-breadcrumb-wrapper">
                    <div class="container">
                        <?php
                        fort_breadcrumbs();
                        ?>
                    </div>
                </div>
                <!-- .fort-breadcrumb -->
<?php
            }
        }
    }
endif;
add_action('fort_breadcrumb', 'fort_breadcrumb_options', 10);


/**
 * BreadCrumb Settings
 */
if (!function_exists('fort_breadcrumbs')) :
    function fort_breadcrumbs()
    {
        $breadcrumb_args = array(
            'container' => 'div',
            'show_browse' => false
        );
        global $fort_theme_options;

        $fort_you_are_here_text = esc_html($fort_theme_options['fort-breadcrumb-text']);


        if (!empty($fort_you_are_here_text)) {
            $fort_you_are_here_text = "<span class='breadcrumb'>" . $fort_you_are_here_text . "</span>";
        }
        echo "<div class='breadcrumbs init-animate clearfix'>" . $fort_you_are_here_text . "<div id='fort-breadcrumbs' class='clearfix'>";
        breadcrumb_trail($breadcrumb_args);
        echo "</div></div>";
    }
endif;
