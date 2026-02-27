<?php
/**
 * The template for displaying archive pages
 *
 * @package prime_capital_institution_suite
 */

get_header();
?>

<section class="archive-hero">
    <div class="container">
        <p class="eyebrow"><?php esc_html_e('Insights & Updates', 'prime-capital-institution-suite'); ?></p>
        <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
        <?php
$archive_description = get_the_archive_description();
if ($archive_description):
?>
            <p class="archive-desc"><?php echo wp_kses_post($archive_description); ?></p>
        <?php
endif;
?>
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
                    </div><!-- .post-grid -->
                    <?php
    the_posts_pagination(
        array(
            'screen_reader_text' => __('Posts navigation', 'prime-capital-institution-suite'),
            'mid_size' => 1,
            'prev_text' => '<span aria-hidden="true">←</span> ' . esc_html__('Newer', 'prime-capital-institution-suite'),
            'next_text' => esc_html__('Older', 'prime-capital-institution-suite') . ' <span aria-hidden="true">→</span>',
        )
    );
?>
                <?php else: ?>
                    <?php get_template_part('template-parts/content', 'none'); ?>
                <?php endif; ?>
            </div>

            <aside class="archive-aside">
                <div class="aside-panel">
                    <h4><?php esc_html_e('Search the archive', 'prime-capital-institution-suite'); ?></h4>
                    <?php get_search_form(); ?>
                </div>
                <div class="aside-panel">
                    <h4><?php esc_html_e('Stay Connected', 'prime-capital-institution-suite'); ?></h4>
                    <p><?php esc_html_e('Want updates delivered straight to your inbox? Subscribe to our release notes.', 'prime-capital-institution-suite'); ?></p>
                    <form class="footer-newsletter" action="#" method="post">
                        <label class="screen-reader-text" for="archive-newsletter"><?php esc_html_e('Email address', 'prime-capital-institution-suite'); ?></label>
                        <input type="email" id="archive-newsletter" placeholder="<?php esc_attr_e('you@example.com', 'prime-capital-institution-suite'); ?>" required />
                        <button type="submit"><?php esc_html_e('Subscribe', 'prime-capital-institution-suite'); ?></button>
                    </form>
                </div>
                <div class="aside-panel">
                    <h4><?php esc_html_e('Contact', 'prime-capital-institution-suite'); ?></h4>
                    <ul class="archive-contact">
                        <li><?php echo esc_html(get_theme_mod('prime_capital_institution_suite_location_text', 'Kathmandu, Nepal')); ?></li>
                        <li><a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', get_theme_mod('prime_capital_institution_suite_phone_text', '+977-1-4123456'))); ?>"><?php echo esc_html(get_theme_mod('prime_capital_institution_suite_phone_text', '+977-1-4123456')); ?></a></li>
                        <li><a href="mailto:<?php echo esc_attr(get_theme_mod('prime_capital_institution_suite_email_text', 'info@swastiklbs.com.np')); ?>"><?php echo esc_html(get_theme_mod('prime_capital_institution_suite_email_text', 'info@swastiklbs.com.np')); ?></a></li>
                    </ul>
                    <a class="aside-cta" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Visit Our Hub', 'prime-capital-institution-suite'); ?></a>
                </div>
            </aside>
        </div>
    </div>
</main><!-- #primary -->

<?php
get_footer();
