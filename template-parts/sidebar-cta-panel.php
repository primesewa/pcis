<?php
/**
 * Reusable CTA sidebar panel.
 *
 * @package prime_capital_institution_suite
 */

$pcis_cta_title = trim((string) get_theme_mod('prime_capital_institution_suite_page_cta_title', __('Become Our Member', 'prime-capital-institution-suite')));
if ('' === $pcis_cta_title) {
    $pcis_cta_title = __('Become Our Member', 'prime-capital-institution-suite');
}

$pcis_cta_text = trim((string) get_theme_mod('prime_capital_institution_suite_page_cta_text', __('Need a tailored solution? Let\'s talk about how we can elevate your cooperative.', 'prime-capital-institution-suite')));
if ('' === $pcis_cta_text) {
    $pcis_cta_text = __('Need a tailored solution? Let\'s talk about how we can elevate your cooperative.', 'prime-capital-institution-suite');
}

$pcis_cta_button_text = trim((string) get_theme_mod('prime_capital_institution_suite_page_cta_button_text', __('Email Our Team', 'prime-capital-institution-suite')));
if ('' === $pcis_cta_button_text) {
    $pcis_cta_button_text = __('Email Our Team', 'prime-capital-institution-suite');
}
?>
<div class="aside-panel cta-panel sidebar-card">
    <h4><?php echo esc_html($pcis_cta_title); ?></h4>
    <p><?php echo esc_html($pcis_cta_text); ?></p>
    <a class="aside-cta" href="<?php echo esc_url(get_theme_mod('prime_capital_institution_suite_page_cta_button_url', 'mailto:info@swastiklbs.com.np')); ?>">
        <i class="fa-regular fa-envelope" aria-hidden="true"></i>
        <span><?php echo esc_html($pcis_cta_button_text); ?></span>
    </a>
</div>
