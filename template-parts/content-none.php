<?php
/**
 * Template part when no content is found
 *
 * @package prime_capital_institution_suite
 */
?>

<section class="no-results not-found">
    <h2><?php esc_html_e('Nothing found here', 'prime-capital-institution-suite'); ?></h2>
    <p><?php esc_html_e('We could not locate the content you were looking for. Try adjusting your search or head back home.', 'prime-capital-institution-suite'); ?></p>
    <div class="no-results-actions">
        <form role="search" method="get" class="search-form search-form--no-results" action="<?php echo esc_url(home_url('/')); ?>">
            <label>
                <span class="screen-reader-text"><?php echo esc_html_x('Search for:', 'label', 'prime-capital-institution-suite'); ?></span>
                <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search ...', 'placeholder', 'prime-capital-institution-suite'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" />
            </label>
            <button type="submit" class="search-submit"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i><?php esc_html_e('Search', 'prime-capital-institution-suite'); ?></button>
        </form>
        <a class="btn-out" href="<?php echo esc_url(home_url('/')); ?>"><i class="fa-solid fa-house" aria-hidden="true"></i><?php esc_html_e('Back to Home', 'prime-capital-institution-suite'); ?></a>
    </div>
</section>
