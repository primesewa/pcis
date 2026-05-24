<?php
/**
 * The template for Notice Category taxonomy archives.
 *
 * @package prime_capital_institution_suite
 */

get_header();
?>

<section class="archive-hero">
    <div class="container">
        <p class="eyebrow"><?php esc_html_e('Notice Category', 'prime-capital-institution-suite'); ?></p>
        <h1 class="page-title"><?php echo esc_html(single_term_title('', false)); ?></h1>
        <?php
        $archive_description = term_description();
        if (!empty($archive_description)):
            ?>
            <p class="archive-desc"><?php echo wp_kses_post($archive_description); ?></p>
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
                    <h4><?php esc_html_e('Browse All Notices', 'prime-capital-institution-suite'); ?></h4>
                    <a class="aside-cta" href="<?php echo esc_url(get_post_type_archive_link('notice')); ?>">
                        <i class="fa-solid fa-arrow-right" aria-hidden="true"></i><?php esc_html_e('View Notice Archive', 'prime-capital-institution-suite'); ?>
                    </a>
                </div>
                <?php
                $notice_tax_sidebar_panel = ob_get_clean();
                get_template_part('template-parts/sidebar', 'standard-panels', array('extra_panels' => array($notice_tax_sidebar_panel)));
                ?>
            </aside>
        </div>
    </div>
</main>

<?php
get_footer();
