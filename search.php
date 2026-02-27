<?php
/**
 * The template for displaying search results pages
 *
 * @package prime_capital_institution_suite
 */

get_header();
?>

<main id="primary" class="site-main search-results-page">
    <div class="container">

        <?php if (have_posts()): ?>

            <header class="page-header">
                <h1 class="page-title">
                    <?php
    /* translators: %s: search query. */
    printf(esc_html__('Search Results for: %s', 'prime-capital-institution-suite'), '<span>' . get_search_query() . '</span>');
?>
                </h1>
            </header><!-- .page-header -->

            <div class="post-grid">
                <?php
    while (have_posts()):
        the_post();

        get_template_part('template-parts/content', 'search');

    endwhile;
?>
            </div><!-- .post-grid -->

            <?php
    the_posts_pagination(
        array(
            'screen_reader_text' => __('Search results navigation', 'prime-capital-institution-suite'),
            'mid_size' => 1,
            'prev_text' => '<span aria-hidden="true">&larr;</span> ' . esc_html__('Previous', 'prime-capital-institution-suite'),
            'next_text' => esc_html__('Next', 'prime-capital-institution-suite') . ' <span aria-hidden="true">&rarr;</span>',
        )
    );

else:
?>

             <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e('Nothing Found', 'prime-capital-institution-suite'); ?></h1>
                </header><!-- .page-header -->
                <div class="page-content">
                     <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'prime-capital-institution-suite'); ?></p>
                     <?php get_search_form(); ?>
                </div>
            </section>

        <?php
endif;
?>

    </div>
</main><!-- #primary -->

<?php
get_footer();
