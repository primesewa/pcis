<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package prime_capital_institution_suite
 */

get_header();
?>

<main id="primary" class="site-main error-screen">
    <section class="error-404 not-found premium-error">
        <div class="container">
            <div class="error-panel">
                <div class="error-code">404</div>
                <div>
                    <h1><?php esc_html_e('Page not found', 'prime-capital-institution-suite'); ?></h1>
                    <p><?php esc_html_e('The page you were looking for might have moved, had its name changed, or is temporarily unavailable.', 'prime-capital-institution-suite'); ?></p>
                    <div class="error-actions">
                        <?php get_search_form(); ?>
                        <a class="btn-fill" href="<?php echo esc_url(home_url('/')); ?>">
                            <?php esc_html_e('Return Home', 'prime-capital-institution-suite'); ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="error-support">
                <p><?php esc_html_e('Need help? Reach us directly at:', 'prime-capital-institution-suite'); ?></p>
                <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', get_theme_mod('prime_capital_institution_suite_phone_text', '+977-1-4123456'))); ?>" class="error-support-link"><?php echo esc_html(get_theme_mod('prime_capital_institution_suite_phone_text', '+977-1-4123456')); ?></a>
                <a href="mailto:<?php echo esc_attr(get_theme_mod('prime_capital_institution_suite_email_text', 'info@swastiklbs.com.np')); ?>" class="error-support-link"><?php echo esc_html(get_theme_mod('prime_capital_institution_suite_email_text', 'info@swastiklbs.com.np')); ?></a>
            </div>
        </div>
    </section>
</main><!-- #primary -->

<?php
get_footer();
