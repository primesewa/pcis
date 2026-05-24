<?php
/**
 * The template for the Notice post type archive.
 *
 * @package prime_capital_institution_suite
 */

get_header();

$notice_terms = get_terms(
    array(
        'taxonomy' => 'notice_category',
        'hide_empty' => false,
    )
);
?>

<section class="archive-hero">
    <div class="container">
        <p class="eyebrow"><?php esc_html_e('Public Updates', 'prime-capital-institution-suite'); ?></p>
        <h1 class="page-title"><?php esc_html_e('Notices', 'prime-capital-institution-suite'); ?></h1>
        <p class="archive-desc"><?php esc_html_e('Find the latest notices, announcements, and official updates.', 'prime-capital-institution-suite'); ?></p>

        <?php if (!is_wp_error($notice_terms) && !empty($notice_terms)): ?>
            <div class="report-term-chips">
                <?php foreach ($notice_terms as $term): ?>
                    <a class="report-term-chip" href="<?php echo esc_url(get_term_link($term)); ?>">
                        <?php echo esc_html($term->name); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<main id="primary" class="site-main archive-page">
    <div class="container">
        <div class="archive-grid">
            <div class="archive-posts">
                <?php if (have_posts()): ?>
                    <div class="post-grid">
                        <?php
                        while (have_posts()):
                            the_post();
                            get_template_part('template-parts/content', get_post_type());
                        endwhile;
                        ?>
                    </div>
                    <?php
                    the_posts_pagination(
                        array(
                            'screen_reader_text' => __('Notice navigation', 'prime-capital-institution-suite'),
                            'mid_size' => 1,
                            'prev_text' => '<span aria-hidden="true">&larr;</span> ' . esc_html__('Newer', 'prime-capital-institution-suite'),
                            'next_text' => esc_html__('Older', 'prime-capital-institution-suite') . ' <span aria-hidden="true">&rarr;</span>',
                        )
                    );
                    ?>
                <?php else: ?>
                    <?php get_template_part('template-parts/content', 'none'); ?>
                <?php endif; ?>
            </div>

            <aside class="archive-aside">
                <?php
                ob_start();
                ?>
                <div class="aside-panel">
                    <h4><?php esc_html_e('Notice Categories', 'prime-capital-institution-suite'); ?></h4>
                    <?php if (!is_wp_error($notice_terms) && !empty($notice_terms)): ?>
                        <ul class="archive-contact">
                            <?php foreach ($notice_terms as $term): ?>
                                <li>
                                    <span class="archive-contact-icon"><i class="fa-solid fa-folder-open" aria-hidden="true"></i></span>
                                    <a href="<?php echo esc_url(get_term_link($term)); ?>">
                                        <?php echo esc_html($term->name); ?> (<?php echo esc_html((string) $term->count); ?>)
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p><?php esc_html_e('No notice categories found yet.', 'prime-capital-institution-suite'); ?></p>
                    <?php endif; ?>
                </div>
                <?php
                $notice_sidebar_panel = ob_get_clean();
                get_template_part('template-parts/sidebar', 'standard-panels', array('extra_panels' => array($notice_sidebar_panel)));
                ?>
            </aside>
        </div>
    </div>
</main>

<?php
get_footer();
