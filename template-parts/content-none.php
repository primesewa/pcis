<?php
/**
 * Template part when no content is found
 *
 * @package prime_capital_institution_suite
 */
?>

<section class="no-results not-found">
    <div class="container">
        <h2><?php esc_html_e('Nothing found here', 'prime-capital-institution-suite'); ?></h2>
        <p><?php esc_html_e('We could not locate the content you were looking for. Try adjusting your search or head back home.', 'prime-capital-institution-suite'); ?></p>
        <div class="no-results-actions">
            <?php get_search_form(); ?>
            <a class="btn-out" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back to Home', 'prime-capital-institution-suite'); ?></a>
        </div>
    </div>
</section>
