<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package prime_capital_institution_suite
 */

$banner_image = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : '';
$banner_style = $banner_image ? 'style="background-image: linear-gradient(135deg, rgba(4,7,27,0.9), rgba(4,7,27,0.45)), url(' . esc_url($banner_image) . ');"' : '';
$page_cta_text = get_theme_mod('prime_capital_institution_suite_page_cta_text', __('Need a tailored solution? Let’s talk about how we can elevate your cooperative.', 'prime-capital-institution-suite'));
$page_cta_button_text = get_theme_mod('prime_capital_institution_suite_page_cta_button_text', __('Email Our Team', 'prime-capital-institution-suite'));
$page_cta_button_url = get_theme_mod('prime_capital_institution_suite_page_cta_button_url', 'mailto:info@swastiklbs.com.np');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('page-article'); ?>>
    <section class="page-hero" <?php echo $banner_style; ?>>
        <div class="page-hero-inner container">
            <?php the_title('<h1 class="page-hero-title">', '</h1>'); ?>
            <?php
$hero_subtitle = '';
if (has_excerpt()) {
    $hero_subtitle = get_the_excerpt();
}
?>
            <?php if ($hero_subtitle): ?>
                <p class="page-hero-subtitle">
                    <?php echo esc_html(trim(wp_strip_all_tags($hero_subtitle))); ?>
                </p>
            <?php endif; ?>
        </div>
    </section>

    <div class="container page-layout">
        <div class="page-content">
            <?php
$page_content = get_post_field('post_content', get_the_ID());

if ('' !== trim(strip_tags($page_content))) {
    echo apply_filters('the_content', $page_content);

    wp_link_pages(
        array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'prime-capital-institution-suite'),
            'after'  => '</div>',
        )
    );
} else {
    ?>
            <div class="page-empty-state">
                <h3><?php esc_html_e('Coming soon', 'prime-capital-institution-suite'); ?></h3>
                <p><?php esc_html_e('We are updating this content and will publish it very soon. Please check back shortly for the full details.', 'prime-capital-institution-suite'); ?></p>
            </div>
            <?php
}
?>
        </div>
        <div class="page-footer-cta">
            <p><?php echo esc_html($page_cta_text); ?></p>
            <a class="btn-fill page-footer-cta-btn" href="<?php echo esc_url($page_cta_button_url); ?>">
                <?php echo esc_html($page_cta_button_text); ?>
            </a>
        </div>
    </div>
</article>
