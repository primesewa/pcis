<?php
/**
 * The template for displaying search results pages
 *
 * @package prime_capital_institution_suite
 */

get_header();

$search_query_value = get_search_query();
$search_title = sprintf(
    /* translators: %s: search query. */
    __('Search Results for: %s', 'prime-capital-institution-suite'),
    $search_query_value
);
?>

<?php
get_template_part(
    'template-parts/section',
    'hero',
    array(
        'eyebrow' => __('Search', 'prime-capital-institution-suite'),
        'title' => $search_title,
        'description' => '',
    )
);
?>

<main id="primary" class="site-main archive-page search-results-page">
    <div class="container">
        <div class="archive-grid">
            <div class="archive-posts">
                <?php if (have_posts()): ?>
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
                    ?>
                <?php else: ?>
                    <?php get_template_part('template-parts/content', 'none'); ?>
                <?php endif; ?>
            </div>

            <aside class="archive-aside">
                <?php get_template_part('template-parts/sidebar', 'standard-panels'); ?>
            </aside>
        </div>
    </div>
</main><!-- #primary -->

<?php
get_footer();
