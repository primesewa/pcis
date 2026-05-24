<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package prime_capital_institution_suite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('page-article'); ?>>
    <?php if (!is_front_page()): ?>
        <?php
        $hero_subtitle = has_excerpt() ? trim(wp_strip_all_tags(get_the_excerpt())) : '';
        get_template_part(
            'template-parts/section',
            'hero',
            array(
                'eyebrow' => __('Page', 'prime-capital-institution-suite'),
                'title' => get_the_title(),
                'description' => $hero_subtitle,
            )
        );
        ?>
    <?php endif; ?>

    <div class="container page-layout">
        <div class="page-content">
            <?php
            $page_content = get_post_field('post_content', get_the_ID());

            the_content();

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'prime-capital-institution-suite'),
                    'after'  => '</div>',
                )
            );

            if ('' === trim($page_content)) {
                ?>
                <div class="page-empty-state">
                    <h3><?php esc_html_e('Coming soon', 'prime-capital-institution-suite'); ?></h3>
                    <p><?php esc_html_e('We are updating this content and will publish it very soon. Please check back shortly for the full details.', 'prime-capital-institution-suite'); ?></p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</article>
