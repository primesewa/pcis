<?php
/**
 * Standard right-sidebar panels component.
 *
 * @package prime_capital_institution_suite
 */

$pcis_extra_panels = isset($args['extra_panels']) && is_array($args['extra_panels']) ? $args['extra_panels'] : array();
?>

<div class="aside-panel search-panel">
    <h4><?php esc_html_e('Search the archive', 'prime-capital-institution-suite'); ?></h4>
    <?php get_template_part('template-parts/sidebar', 'search-form'); ?>
</div>

<?php if (!empty($pcis_extra_panels)): ?>
    <?php foreach ($pcis_extra_panels as $panel_html): ?>
        <?php
        if (!is_string($panel_html) || trim($panel_html) === '') {
            continue;
        }
        echo $panel_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        ?>
    <?php endforeach; ?>
<?php endif; ?>

<?php get_template_part('template-parts/sidebar', 'cta-panel'); ?>

<div class="aside-panel contact-panel">
    <h4><?php esc_html_e('Contact', 'prime-capital-institution-suite'); ?></h4>
    <ul class="archive-contact">
        <li>
            <span class="archive-contact-icon"><i class="fa-solid fa-location-dot" aria-hidden="true"></i></span>
            <span><?php echo esc_html(get_theme_mod('prime_capital_institution_suite_location_text', 'Kathmandu, Nepal')); ?></span>
        </li>
        <li>
            <span class="archive-contact-icon"><i class="fa-solid fa-phone" aria-hidden="true"></i></span>
            <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', get_theme_mod('prime_capital_institution_suite_phone_text', '+977-1-4123456'))); ?>"><?php echo esc_html(get_theme_mod('prime_capital_institution_suite_phone_text', '+977-1-4123456')); ?></a>
        </li>
        <li>
            <span class="archive-contact-icon"><i class="fa-regular fa-envelope" aria-hidden="true"></i></span>
            <a href="mailto:<?php echo esc_attr(get_theme_mod('prime_capital_institution_suite_email_text', 'info@swastiklbs.com.np')); ?>"><?php echo esc_html(get_theme_mod('prime_capital_institution_suite_email_text', 'info@swastiklbs.com.np')); ?></a>
        </li>
    </ul>
    <a class="aside-cta ghost" href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', get_theme_mod('prime_capital_institution_suite_phone_text', '+977-1-4123456'))); ?>">
        <i class="fa-solid fa-phone" aria-hidden="true"></i><?php esc_html_e('Call Now', 'prime-capital-institution-suite'); ?>
    </a>
</div>

<?php if (is_active_sidebar('archive-sidebar')): ?>
    <?php dynamic_sidebar('archive-sidebar'); ?>
<?php endif; ?>
