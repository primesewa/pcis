<?php
/**
 * Shared search form component.
 *
 * Usage:
 * - Default: get_search_form()
 * - Sidebar icon variant: get_search_form(array('pcis_context' => 'sidebar'))
 *
 * @package prime_capital_institution_suite
 */

$pcis_args = isset($args) && is_array($args) ? $args : array();
$pcis_context = isset($pcis_args['pcis_context']) ? sanitize_key($pcis_args['pcis_context']) : 'default';
$is_sidebar_variant = ('sidebar' === $pcis_context);
?>

<form role="search" method="get" class="search-form <?php echo $is_sidebar_variant ? 'search-form--sidebar' : 'search-form--default'; ?>" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php echo esc_html_x('Search for:', 'label', 'prime-capital-institution-suite'); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search ...', 'placeholder', 'prime-capital-institution-suite'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" />
    </label>
    <?php if ($is_sidebar_variant): ?>
        <button type="submit" class="search-submit" aria-label="<?php echo esc_attr_x('Search', 'submit button', 'prime-capital-institution-suite'); ?>">
            <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
        </button>
    <?php else: ?>
        <button type="submit" class="search-submit"><?php echo esc_html_x('Search', 'submit button', 'prime-capital-institution-suite'); ?></button>
    <?php endif; ?>
</form>
