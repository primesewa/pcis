<?php
/**
 * Standard sidebar search form component.
 *
 * @package prime_capital_institution_suite
 */
?>
<form role="search" method="get" class="search-form search-form--sidebar" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php echo esc_html_x('Search for:', 'label', 'prime-capital-institution-suite'); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search ...', 'placeholder', 'prime-capital-institution-suite'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit" aria-label="<?php echo esc_attr_x('Search', 'submit button', 'prime-capital-institution-suite'); ?>">
        <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
    </button>
</form>
