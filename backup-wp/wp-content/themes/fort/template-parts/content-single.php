<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fort
 */
global $fort_theme_options;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- for full single column card layout add [.card-full-width] class -->
    <div class="card card-blog-post card-full-width card-single-article">
        <div class="title-section">
            <?php
            fort_list_category();
            ?>


            <?php
            the_title('<h1 class="card_title">', '</h1>');
            ?>
            <?php

            if ('post' === get_post_type()) :
            ?>
                <div class="entry-meta">
                    <?php
                    fort_posted_on();
                    fort_posted_by();

                    ?>
                </div><!-- .entry-meta -->
            <?php endif; ?>
        </div>
        <!-- .title-section -->

        <?php
        if (has_post_thumbnail() && ($fort_theme_options['fort-single-page-featured-image'] == 1)) {
        ?>
            <figure class="card_media">
                <?php fort_post_thumbnail(); ?>
            </figure>
        <?php
        }
        ?>
        <div class="card_body">


            <div class="entry-content">
                <?php
                the_content(
                    sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'fort'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        wp_kses_post(get_the_title())
                    )
                );

                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'fort'),
                        'after' => '</div>',
                    )
                );

                ?>
            </div>
            <?php
            $fort_show_tags = $fort_theme_options['fort-single-page-tags'];
            if ($fort_show_tags == 1) {
                fort_meta_tags();
            }
            ?>


        </div>
    </div>
    <?php
    /**
     * fort_related_posts hook
     * @since 1.0.0
     *
     * @hooked fort_related_posts -  10
     */
    do_action('fort_related_posts', get_the_ID());
    ?>
    <!-- Related Post Code Here -->

</article><!-- #post-<?php the_ID(); ?> -->