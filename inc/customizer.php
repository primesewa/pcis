<?php
/**
 * Prime Capital Institution Suite Theme Customizer
 *
 * @package prime_capital_institution_suite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function prime_capital_institution_suite_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    // --- Panel / Section ---
    $wp_customize->add_section('prime_capital_institution_suite_theme_options', array(
        'title' => __('Prime Brand Settings', 'prime-capital-institution-suite'),
        'priority' => 20,
        'description' => __('Customize your brand colors here.', 'prime-capital-institution-suite'),
    ));

    // --- Main Color ---
    $wp_customize->add_setting('prime_capital_institution_suite_main_color', array(
        'default' => '#ff5c36',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'prime_capital_institution_suite_main_color', array(
        'label' => __('Main Color', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_theme_options',
        'settings' => 'prime_capital_institution_suite_main_color',
    )));

    // --- Secondary Color ---
    $wp_customize->add_setting('prime_capital_institution_suite_secondary_color', array(
        'default' => '#059473',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'prime_capital_institution_suite_secondary_color', array(
        'label' => __('Secondary Color (Hover/Accent)', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_theme_options',
        'settings' => 'prime_capital_institution_suite_secondary_color',
    )));

    // --- Third Color ---
    $wp_customize->add_setting('prime_capital_institution_suite_third_color', array(
        'default' => '#2980B9',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'prime_capital_institution_suite_third_color', array(
        'label' => __('Third Color', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_theme_options',
        'settings' => 'prime_capital_institution_suite_third_color',
    )));

    // --- Heading Color ---
    $wp_customize->add_setting('prime_capital_institution_suite_heading_color', array(
        'default' => '#242F65',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'prime_capital_institution_suite_heading_color', array(
        'label' => __('Heading Color', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_theme_options',
        'settings' => 'prime_capital_institution_suite_heading_color',
    )));

    // --- Text Color ---
    $wp_customize->add_setting('prime_capital_institution_suite_text_color', array(
        'default' => '#111633',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'prime_capital_institution_suite_text_color', array(
        'label' => __('Text Color', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_theme_options',
        'settings' => 'prime_capital_institution_suite_text_color',
    )));

    // --- Font Selection Options ---
    // Top ~40 Popular Google Fonts
    $fonts = array(
        'Inter' => 'Inter',
        'Roboto' => 'Roboto',
        'Open Sans' => 'Open Sans',
        'Lato' => 'Lato',
        'Montserrat' => 'Montserrat',
        'Poppins' => 'Poppins',
        'Oswald' => 'Oswald',
        'Raleway' => 'Raleway',
        'Nunito' => 'Nunito',
        'Merriweather' => 'Merriweather',
        'Playfair Display' => 'Playfair Display',
        'Rubik' => 'Rubik',
        'Ubuntu' => 'Ubuntu',
        'Kanit' => 'Kanit',
        'PT Sans' => 'PT Sans',
        'Lora' => 'Lora',
        'Work Sans' => 'Work Sans',
        'DM Sans' => 'DM Sans',
        'Quicksand' => 'Quicksand',
        'Barlow' => 'Barlow',
        'Mulish' => 'Mulish',
        'Titillium Web' => 'Titillium Web',
        'Heebo' => 'Heebo',
        'IBM Plex Sans' => 'IBM Plex Sans',
        'Fira Sans' => 'Fira Sans',
        'Arimo' => 'Arimo',
        'PT Serif' => 'PT Serif',
        'Noto Sans' => 'Noto Sans',
        'Libre Franklin' => 'Libre Franklin',
        'Mukta' => 'Mukta',
        'Josefin Sans' => 'Josefin Sans',
        'Cabin' => 'Cabin',
        'Bitter' => 'Bitter',
        'Karla' => 'Karla',
        'Hind' => 'Hind',
        'Inconsolata' => 'Inconsolata',
        'Source Sans Pro' => 'Source Sans Pro',
        'Dosis' => 'Dosis',
        'Anton' => 'Anton',
        'Oxygen' => 'Oxygen',
        'Crimson Text' => 'Crimson Text',
        'Abel' => 'Abel',
        'Fjalla One' => 'Fjalla One',
        'Bebas Neue' => 'Bebas Neue',
        'Manrope' => 'Manrope',
        'Cairo' => 'Cairo',
    );

    // Body Font
    $wp_customize->add_setting('prime_capital_institution_suite_body_font', array(
        'default' => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('prime_capital_institution_suite_body_font', array(
        'type' => 'select',
        'label' => __('Body Font', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_theme_options',
        'settings' => 'prime_capital_institution_suite_body_font',
        'choices' => $fonts,
    ));

    // Heading Font
    $wp_customize->add_setting('prime_capital_institution_suite_heading_font', array(
        'default' => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('prime_capital_institution_suite_heading_font', array(
        'type' => 'select',
        'label' => __('Heading Font', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_theme_options',
        'settings' => 'prime_capital_institution_suite_heading_font',
        'choices' => $fonts,
    ));

    // =========================================================================
    // HEADER CUSTOMIZATION OPTIONS
    // =========================================================================

    $wp_customize->add_section('prime_capital_institution_suite_header_options', array(
        'title' => __('Header & Navigation Settings', 'prime-capital-institution-suite'),
        'priority' => 25,
        'description' => __('Customize your header and navigation appearance.', 'prime-capital-institution-suite'),
    ));

    // Top Bar Display
    $wp_customize->add_setting('prime_capital_institution_suite_show_top_bar', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('prime_capital_institution_suite_show_top_bar', array(
        'type' => 'checkbox',
        'label' => __('Show Top Bar', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_show_top_bar',
    ));

    // Top Bar Location
    $wp_customize->add_setting('prime_capital_institution_suite_show_location', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_show_location', array(
        'type' => 'checkbox',
        'label' => __('Show Location', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_show_location',
    ));
    $wp_customize->add_setting('prime_capital_institution_suite_location_text', array(
        'default' => 'Kathmandu, Nepal',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_location_text', array(
        'type' => 'text',
        'label' => __('Location Text', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_location_text',
    ));

    // Top Bar Phone
    $wp_customize->add_setting('prime_capital_institution_suite_show_phone', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_show_phone', array(
        'type' => 'checkbox',
        'label' => __('Show Phone', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_show_phone',
    ));
    $wp_customize->add_setting('prime_capital_institution_suite_phone_text', array(
        'default' => '+977-1-4123456',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_phone_text', array(
        'type' => 'text',
        'label' => __('Phone Text', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_phone_text',
    ));

    // Top Bar Email
    $wp_customize->add_setting('prime_capital_institution_suite_show_email', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_show_email', array(
        'type' => 'checkbox',
        'label' => __('Show Email', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_show_email',
    ));
    $wp_customize->add_setting('prime_capital_institution_suite_email_text', array(
        'default' => 'info@swastiklbs.com.np',
        'sanitize_callback' => 'sanitize_email',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_email_text', array(
        'type' => 'text',
        'label' => __('Email Address', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_email_text',
    ));

    // Top Bar Language Toggle
    $wp_customize->add_setting('prime_capital_institution_suite_show_lang', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_show_lang', array(
        'type' => 'checkbox',
        'label' => __('Show Language Switch', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_show_lang',
    ));
    $wp_customize->add_setting('prime_capital_institution_suite_lang_text', array(
        'default' => 'EN | NP',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_lang_text', array(
        'type' => 'text',
        'label' => __('Language Text', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_lang_text',
    ));

    // Social Icons
    $wp_customize->add_setting('prime_capital_institution_suite_show_socials', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_show_socials', array(
        'type' => 'checkbox',
        'label' => __('Show Social Icons', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_show_socials',
    ));

    $social_defaults = array(
        array('label' => 'Facebook', 'icon' => 'fab fa-facebook-f', 'url' => '#'),
        array('label' => 'Twitter', 'icon' => 'fab fa-twitter', 'url' => '#'),
    );

    for ($i = 1; $i <= 3; $i++) {
        $default = $social_defaults[$i - 1] ?? array('label' => 'Social', 'icon' => 'fab fa-linkedin-in', 'url' => '#');

        $wp_customize->add_setting("prime_capital_institution_suite_social_{$i}_enabled", array(
            'default' => $i <= 2,
            'sanitize_callback' => 'wp_validate_boolean',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("prime_capital_institution_suite_social_{$i}_enabled", array(
            'type' => 'checkbox',
            'label' => sprintf(__('Enable Social %d', 'prime-capital-institution-suite'), $i),
            'section' => 'prime_capital_institution_suite_header_options',
            'settings' => "prime_capital_institution_suite_social_{$i}_enabled",
        ));

        $wp_customize->add_setting("prime_capital_institution_suite_social_{$i}_label", array(
            'default' => $default['label'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("prime_capital_institution_suite_social_{$i}_label", array(
            'type' => 'text',
            'label' => sprintf(__('Social %d Label', 'prime-capital-institution-suite'), $i),
            'section' => 'prime_capital_institution_suite_header_options',
            'settings' => "prime_capital_institution_suite_social_{$i}_label",
        ));

        $wp_customize->add_setting("prime_capital_institution_suite_social_{$i}_icon", array(
            'default' => $default['icon'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("prime_capital_institution_suite_social_{$i}_icon", array(
            'type' => 'text',
            'label' => sprintf(__('Social %d Font Awesome Class', 'prime-capital-institution-suite'), $i),
            'section' => 'prime_capital_institution_suite_header_options',
            'settings' => "prime_capital_institution_suite_social_{$i}_icon",
            'description' => __('Example: fab fa-facebook-f', 'prime-capital-institution-suite'),
        ));

        $wp_customize->add_setting("prime_capital_institution_suite_social_{$i}_url", array(
            'default' => $default['url'],
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("prime_capital_institution_suite_social_{$i}_url", array(
            'type' => 'url',
            'label' => sprintf(__('Social %d URL', 'prime-capital-institution-suite'), $i),
            'section' => 'prime_capital_institution_suite_header_options',
            'settings' => "prime_capital_institution_suite_social_{$i}_url",
        ));
    }

    // Quick Stats
    $wp_customize->add_setting('prime_capital_institution_suite_show_quick_stats', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_show_quick_stats', array(
        'type' => 'checkbox',
        'label' => __('Show Quick Stats', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_show_quick_stats',
    ));

    $wp_customize->add_setting('prime_capital_institution_suite_stat1_number', array(
        'default' => '22+',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_stat1_number', array(
        'type' => 'text',
        'label' => __('Stat 1 Number', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_stat1_number',
    ));
    $wp_customize->add_setting('prime_capital_institution_suite_stat1_label', array(
        'default' => 'Years',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_stat1_label', array(
        'type' => 'text',
        'label' => __('Stat 1 Label', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_stat1_label',
    ));
    $wp_customize->add_setting('prime_capital_institution_suite_stat2_number', array(
        'default' => '58',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_stat2_number', array(
        'type' => 'text',
        'label' => __('Stat 2 Number', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_stat2_number',
    ));
    $wp_customize->add_setting('prime_capital_institution_suite_stat2_label', array(
        'default' => 'Branches',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_stat2_label', array(
        'type' => 'text',
        'label' => __('Stat 2 Label', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_stat2_label',
    ));

    // Badge
    $wp_customize->add_setting('prime_capital_institution_suite_show_badge', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_show_badge', array(
        'type' => 'checkbox',
        'label' => __('Show Badge Text', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_show_badge',
    ));

    $wp_customize->add_setting('prime_capital_institution_suite_badge_main', array(
        'default' => '"Empowering Communities"',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_badge_main', array(
        'type' => 'text',
        'label' => __('Badge Main Text', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_badge_main',
    ));

    $wp_customize->add_setting('prime_capital_institution_suite_badge_sub', array(
        'default' => 'NRB Licensed · Est. 2001',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_badge_sub', array(
        'type' => 'text',
        'label' => __('Badge Sub Text', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_badge_sub',
    ));

    // Header Background Color
    $wp_customize->add_setting('prime_capital_institution_suite_header_bg_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'prime_capital_institution_suite_header_bg_color', array(
        'label' => __('Header Background Color', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_header_bg_color',
    )));

    // Header Background Opacity
    $wp_customize->add_setting('prime_capital_institution_suite_header_bg_opacity', array(
        'default' => '0.98',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('prime_capital_institution_suite_header_bg_opacity', array(
        'type' => 'select',
        'label' => __('Header Background Opacity', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_header_bg_opacity',
        'choices' => array(
            '1' => __('Solid (100%)', 'prime-capital-institution-suite'),
            '0.98' => __('Premium Glass (98%)', 'prime-capital-institution-suite'),
            '0.95' => __('Light Glass (95%)', 'prime-capital-institution-suite'),
            '0.9' => __('Medium Glass (90%)', 'prime-capital-institution-suite'),
            '0.85' => __('Strong Glass (85%)', 'prime-capital-institution-suite'),
        ),
    ));

    // Sticky Header
    $wp_customize->add_setting('prime_capital_institution_suite_sticky_header', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('prime_capital_institution_suite_sticky_header', array(
        'type' => 'checkbox',
        'label' => __('Enable Sticky Header', 'prime-capital-institution-suite'),
        'description' => __('Header stays at the top when scrolling', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_sticky_header',
    ));

    // Header Shadow Intensity
    $wp_customize->add_setting('prime_capital_institution_suite_header_shadow', array(
        'default' => 'medium',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('prime_capital_institution_suite_header_shadow', array(
        'type' => 'select',
        'label' => __('Header Shadow Intensity', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_header_shadow',
        'choices' => array(
            'none' => __('None', 'prime-capital-institution-suite'),
            'light' => __('Light', 'prime-capital-institution-suite'),
            'medium' => __('Medium (Default)', 'prime-capital-institution-suite'),
            'strong' => __('Strong', 'prime-capital-institution-suite'),
        ),
    ));

    // Header Apply Button
    $wp_customize->add_setting('prime_capital_institution_suite_show_apply_button', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('prime_capital_institution_suite_show_apply_button', array(
        'type' => 'checkbox',
        'label' => __('Show Apply Button', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_show_apply_button',
    ));

    $wp_customize->add_setting('prime_capital_institution_suite_apply_button_text', array(
        'default' => __('Apply', 'prime-capital-institution-suite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('prime_capital_institution_suite_apply_button_text', array(
        'type' => 'text',
        'label' => __('Apply Button Text', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_apply_button_text',
    ));

    $wp_customize->add_setting('prime_capital_institution_suite_apply_button_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('prime_capital_institution_suite_apply_button_url', array(
        'type' => 'url',
        'label' => __('Apply Button URL', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_apply_button_url',
    ));

    $wp_customize->add_section('prime_capital_institution_suite_page_cta', array(
        'title' => __('Page CTA', 'prime-capital-institution-suite'),
        'priority' => 60,
        'description' => __('Customize the CTA at the bottom of pages.', 'prime-capital-institution-suite'),
    ));

    $wp_customize->add_setting('prime_capital_institution_suite_page_cta_text', array(
        'default' => __('Need a tailored solution? Let’s talk about how we can elevate your cooperative.', 'prime-capital-institution-suite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_page_cta_text', array(
        'type' => 'text',
        'label' => __('CTA Text', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_page_cta',
        'settings' => 'prime_capital_institution_suite_page_cta_text',
    ));

    $wp_customize->add_setting('prime_capital_institution_suite_page_cta_button_text', array(
        'default' => __('Email Our Team', 'prime-capital-institution-suite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_page_cta_button_text', array(
        'type' => 'text',
        'label' => __('CTA Button Text', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_page_cta',
        'settings' => 'prime_capital_institution_suite_page_cta_button_text',
    ));

    $wp_customize->add_setting('prime_capital_institution_suite_page_cta_button_url', array(
        'default' => 'mailto:info@swastiklbs.com.np',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_page_cta_button_url', array(
        'type' => 'url',
        'label' => __('CTA Button URL', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_page_cta',
        'settings' => 'prime_capital_institution_suite_page_cta_button_url',
    ));

}
add_action('customize_register', 'prime_capital_institution_suite_customize_register');


/**
 * Bind CSS vars to the head.
 */
function prime_capital_institution_suite_customize_css()
{
    // Get header customization options
    $header_bg_color = sanitize_hex_color(get_theme_mod('prime_capital_institution_suite_header_bg_color', '#ffffff')) ?: '#ffffff';
    $header_bg_opacity = get_theme_mod('prime_capital_institution_suite_header_bg_opacity', '0.98');
    $sticky_header = get_theme_mod('prime_capital_institution_suite_sticky_header', true);
    $header_shadow = get_theme_mod('prime_capital_institution_suite_header_shadow', 'medium');

    $main_color = sanitize_hex_color(get_theme_mod('prime_capital_institution_suite_main_color', '#ff5c36')) ?: '#ff5c36';
    $secondary_color = sanitize_hex_color(get_theme_mod('prime_capital_institution_suite_secondary_color', '#059473')) ?: '#059473';
    $third_color = sanitize_hex_color(get_theme_mod('prime_capital_institution_suite_third_color', '#2980B9')) ?: '#2980B9';
    $heading_color = sanitize_hex_color(get_theme_mod('prime_capital_institution_suite_heading_color', '#242F65')) ?: '#242F65';
    $text_color = sanitize_hex_color(get_theme_mod('prime_capital_institution_suite_text_color', '#111633')) ?: '#111633';
    $body_font = sanitize_text_field(get_theme_mod('prime_capital_institution_suite_body_font', 'Inter')) ?: 'Inter';
    $heading_font = sanitize_text_field(get_theme_mod('prime_capital_institution_suite_heading_font', 'Inter')) ?: 'Inter';

    // Convert hex to RGB for opacity
    $rgb = sscanf($header_bg_color, "#%02x%02x%02x");
    $header_bg_rgba = "rgba({$rgb[0]}, {$rgb[1]}, {$rgb[2]}, {$header_bg_opacity})";

    // Shadow variations
    $shadow_values = array(
        'none' => '0 0 0 rgba(0, 0, 0, 0)',
        'light' => '0 2px 15px rgba(0, 0, 0, 0.05)',
        'medium' => '0 4px 30px rgba(0, 0, 0, 0.08)',
        'strong' => '0 8px 40px rgba(0, 0, 0, 0.15)',
    );
    $header_shadow_value = isset($shadow_values[$header_shadow]) ? $shadow_values[$header_shadow] : $shadow_values['medium'];
?>
    <style type="text/css">
            :root {
            --main-color: <?php echo esc_attr($main_color); ?>;
            --secondary-color: <?php echo esc_attr($secondary_color); ?>;
            --third-color: <?php echo esc_attr($third_color); ?>;
            
            --heading-color: <?php echo esc_attr($heading_color); ?>;
            --text-color: <?php echo esc_attr($text_color); ?>;
            
            --body-font: '<?php echo esc_attr($body_font); ?>', sans-serif;
            --heading-font: '<?php echo esc_attr($heading_font); ?>', sans-serif;

            /* Computed vars */
            --button-bg: <?php echo esc_attr($main_color); ?>;
            --button-hover-bg: <?php echo esc_attr($secondary_color); ?>;
            --gradient-bg: linear-gradient(135deg, <?php echo esc_attr($main_color); ?> 0%, <?php echo esc_attr($secondary_color); ?> 50%, <?php echo esc_attr($third_color); ?> 100%);
            
            /* Header customization vars */
            --header-bg-color: <?php echo esc_attr($header_bg_rgba); ?>;
            --nav-text-color: <?php echo esc_attr($heading_color); ?>;
            --nav-hover-color: <?php echo esc_attr($main_color); ?>;
        }
        
        /* Header Background */
        .site-header {
            background: var(--header-bg-color);
            box-shadow: <?php echo esc_attr($header_shadow_value); ?>;
            <?php if ($sticky_header): ?>
            position: sticky;
            top: 0;
            <?php
    else: ?>
            position: relative;
            <?php
    endif; ?>
        }
        
        .site-header.scrolled {
            box-shadow: <?php echo esc_attr($header_shadow === 'none' ? '0 0 0 rgba(0, 0, 0, 0)' : '0 8px 40px rgba(0, 0, 0, 0.12)'); ?>;
        }
        
        /* Navigation Colors */
        .main-navigation a {
            color: var(--nav-text-color);
        }
        
        .main-navigation a:hover,
        .main-navigation .current-menu-item a,
        .main-navigation .current_page_item a {
            color: var(--nav-hover-color);
        }
    </style>
    <?php
}
add_action('wp_head', 'prime_capital_institution_suite_customize_css');
