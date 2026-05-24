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

    // Brand primary color.
    $wp_customize->add_setting('prime_capital_institution_suite_brand_primary_color', array(
        'default' => '#242F65',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'prime_capital_institution_suite_brand_primary_color', array(
        'label' => __('Brand Primary Color', 'prime-capital-institution-suite'),
        'description' => __('Used for header top bar, navigation background, footer background, primary buttons, and major brand surfaces.', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_theme_options',
        'settings' => 'prime_capital_institution_suite_brand_primary_color',
    )));

    // Brand secondary color.
    $wp_customize->add_setting('prime_capital_institution_suite_brand_secondary_color', array(
        'default' => '#ff5c36',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'prime_capital_institution_suite_brand_secondary_color', array(
        'label' => __('Brand Secondary Color', 'prime-capital-institution-suite'),
        'description' => __('Used for hover and active states, links, and secondary accents.', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_theme_options',
        'settings' => 'prime_capital_institution_suite_brand_secondary_color',
    )));

    // Brand tertiary color.
    $wp_customize->add_setting('prime_capital_institution_suite_brand_tertiary_color', array(
        'default' => '#2980B9',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'prime_capital_institution_suite_brand_tertiary_color', array(
        'label' => __('Brand Tertiary Color', 'prime-capital-institution-suite'),
        'description' => __('Used in gradients, subtle highlights, and tertiary accents.', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_theme_options',
        'settings' => 'prime_capital_institution_suite_brand_tertiary_color',
    )));

    // Typography color.
    $wp_customize->add_setting('prime_capital_institution_suite_typography_color', array(
        'default' => '#111633',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'prime_capital_institution_suite_typography_color', array(
        'label' => __('Typography Color', 'prime-capital-institution-suite'),
        'description' => __('Used for heading and paragraph text across the site.', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_theme_options',
        'settings' => 'prime_capital_institution_suite_typography_color',
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

    // Nav Text Color
    $wp_customize->add_setting('prime_capital_institution_suite_nav_text_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'prime_capital_institution_suite_nav_text_color', array(
        'label' => __('Navbar Text Color', 'prime-capital-institution-suite'),
        'description' => __('Color of the main navigation links.', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_nav_text_color',
    )));

    $wp_customize->add_setting('prime_capital_institution_suite_submenu_hover_bg_enabled', array(
        'default' => false,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_submenu_hover_bg_enabled', array(
        'type' => 'checkbox',
        'label' => __('Enable Submenu Hover Background', 'prime-capital-institution-suite'),
        'description' => __('Used for submenu items only. OFF = plain hover with accent text. ON = brand gradient hover background.', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_header_options',
        'settings' => 'prime_capital_institution_suite_submenu_hover_bg_enabled',
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

    $wp_customize->add_setting('prime_capital_institution_suite_page_cta_title', array(
        'default' => __('Become Our Member', 'prime-capital-institution-suite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_page_cta_title', array(
        'type' => 'text',
        'label' => __('CTA Title', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_page_cta',
        'settings' => 'prime_capital_institution_suite_page_cta_title',
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

    // =========================================================================
    // FOOTER CUSTOMIZATION OPTIONS
    // =========================================================================

    $wp_customize->add_section('prime_capital_institution_suite_footer_options', array(
        'title' => __('Footer Settings', 'prime-capital-institution-suite'),
        'priority' => 70,
        'description' => __('Customize your footer appearance.', 'prime-capital-institution-suite'),
    ));

    $wp_customize->add_setting('prime_capital_institution_suite_footer_links_help', array(
        'default' => __('Appearance > Menus > assign your menu to Footer Menu', 'prime-capital-institution-suite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_footer_links_help', array(
        'type' => 'text',
        'label' => __('Useful Links Menu Location', 'prime-capital-institution-suite'),
        'description' => __('Useful Links are managed from Appearance > Menus. Create/edit a menu, then assign it to "Footer Menu".', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_footer_options',
        'settings' => 'prime_capital_institution_suite_footer_links_help',
        'input_attrs' => array(
            'readonly' => 'readonly',
        ),
    ));

    $wp_customize->add_setting('prime_capital_institution_suite_footer_chip_1', array(
        'default' => __('Member Focused', 'prime-capital-institution-suite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_footer_chip_1', array(
        'type' => 'text',
        'label' => __('Footer Badge 1 Text', 'prime-capital-institution-suite'),
        'description' => __('Shown in the first footer column under description.', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_footer_options',
        'settings' => 'prime_capital_institution_suite_footer_chip_1',
    ));

    $wp_customize->add_setting('prime_capital_institution_suite_footer_chip_2', array(
        'default' => __('Community Trusted', 'prime-capital-institution-suite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_footer_chip_2', array(
        'type' => 'text',
        'label' => __('Footer Badge 2 Text', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_footer_options',
        'settings' => 'prime_capital_institution_suite_footer_chip_2',
    ));

    // Footer CTA 1 (Solid Button)
    $wp_customize->add_setting('prime_capital_institution_suite_footer_cta1_text', array(
        'default' => __('Find a Branch', 'prime-capital-institution-suite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_footer_cta1_text', array(
        'type' => 'text',
        'label' => __('Button 1 Text', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_footer_options',
        'settings' => 'prime_capital_institution_suite_footer_cta1_text',
    ));

    $wp_customize->add_setting('prime_capital_institution_suite_footer_cta1_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_footer_cta1_url', array(
        'type' => 'url',
        'label' => __('Button 1 URL', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_footer_options',
        'settings' => 'prime_capital_institution_suite_footer_cta1_url',
    ));

    // Footer CTA 2 (Ghost Button)
    $wp_customize->add_setting('prime_capital_institution_suite_footer_cta2_text', array(
        'default' => __('Open an Account', 'prime-capital-institution-suite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_footer_cta2_text', array(
        'type' => 'text',
        'label' => __('Button 2 Text', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_footer_options',
        'settings' => 'prime_capital_institution_suite_footer_cta2_text',
    ));

    $wp_customize->add_setting('prime_capital_institution_suite_footer_cta2_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('prime_capital_institution_suite_footer_cta2_url', array(
        'type' => 'url',
        'label' => __('Button 2 URL', 'prime-capital-institution-suite'),
        'section' => 'prime_capital_institution_suite_footer_options',
        'settings' => 'prime_capital_institution_suite_footer_cta2_url',
    ));

}
add_action('customize_register', 'prime_capital_institution_suite_customize_register');

/**
 * Improve appearance of Customizer helper descriptions for brand color controls.
 */
function prime_capital_institution_suite_customize_controls_ui()
{
    ?>
    <style>
        #sub-accordion-section-prime_capital_institution_suite_theme_options .customize-control-description {
            margin-top: 8px;
            padding: 10px 12px;
            border-radius: 10px;
            background: linear-gradient(135deg, rgba(36, 47, 101, 0.07), rgba(41, 128, 185, 0.06));
            color: #243048;
            font-size: 12px;
            line-height: 1.45;
        }
    </style>
    <?php
}
add_action('customize_controls_print_styles', 'prime_capital_institution_suite_customize_controls_ui');


/**
 * Bind CSS vars to the head.
 */
function prime_capital_institution_suite_customize_css()
{
    // Get header customization options
    $header_bg_color = '#242F65';
    $header_bg_opacity = get_theme_mod('prime_capital_institution_suite_header_bg_opacity', '0.98');
    $sticky_header = get_theme_mod('prime_capital_institution_suite_sticky_header', true);
    $header_shadow = get_theme_mod('prime_capital_institution_suite_header_shadow', 'medium');
    $nav_text_color_mod = sanitize_hex_color(get_theme_mod('prime_capital_institution_suite_nav_text_color', '#ffffff')) ?: '#ffffff';


    // Backward compatible mapping from old setting names to new brand-driven controls.
    $brand_primary_color = sanitize_hex_color(
        get_theme_mod(
            'prime_capital_institution_suite_brand_primary_color',
            get_theme_mod('prime_capital_institution_suite_nav_bg_color', '#242F65')
        )
    ) ?: '#242F65';

    $brand_secondary_color = sanitize_hex_color(
        get_theme_mod(
            'prime_capital_institution_suite_brand_secondary_color',
            get_theme_mod('prime_capital_institution_suite_link_color', get_theme_mod('prime_capital_institution_suite_main_color', '#ff5c36'))
        )
    ) ?: '#ff5c36';

    $brand_tertiary_color = sanitize_hex_color(
        get_theme_mod(
            'prime_capital_institution_suite_brand_tertiary_color',
            get_theme_mod('prime_capital_institution_suite_accent_color', get_theme_mod('prime_capital_institution_suite_third_color', '#2980B9'))
        )
    ) ?: '#2980B9';

    $typography_color = sanitize_hex_color(
        get_theme_mod(
            'prime_capital_institution_suite_typography_color',
            get_theme_mod('prime_capital_institution_suite_text_color', '#111633')
        )
    ) ?: '#111633';

    $nav_bg_color = $brand_primary_color;
    $main_color = $brand_primary_color;
    $secondary_color = $brand_secondary_color;
    $third_color = $brand_tertiary_color;
    $button_color = $brand_primary_color;
    $button_hover_color = $brand_secondary_color;
    $heading_color = $typography_color;
    $text_color = $typography_color;
    $body_font = sanitize_text_field(get_theme_mod('prime_capital_institution_suite_body_font', 'Inter')) ?: 'Inter';
    $heading_font = sanitize_text_field(get_theme_mod('prime_capital_institution_suite_heading_font', 'Inter')) ?: 'Inter';
    $footer_bg_color = $brand_primary_color;
    $header_bg_color = $brand_primary_color;

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
            --link-color: <?php echo esc_attr($brand_secondary_color); ?>;
            --link-hover-color: <?php echo esc_attr($secondary_color); ?>;
            --nav-bg-color: <?php echo esc_attr($nav_bg_color); ?>;
            
            --heading-color: <?php echo esc_attr($heading_color); ?>;
            --text-color: <?php echo esc_attr($text_color); ?>;
            
            --footer-bg-color: <?php echo esc_attr($footer_bg_color); ?>;
            
            --body-font: '<?php echo esc_attr($body_font); ?>', sans-serif;
            --heading-font: '<?php echo esc_attr($heading_font); ?>', sans-serif;

            /* Computed vars */
            --button-bg: <?php echo esc_attr($button_color); ?>;
            --button-hover-bg: <?php echo esc_attr($button_hover_color); ?>;
            --button-alt-bg: <?php echo esc_attr($third_color); ?>;
            --gradient-bg: linear-gradient(135deg, <?php echo esc_attr($main_color); ?> 0%, <?php echo esc_attr($third_color); ?> 50%, <?php echo esc_attr($secondary_color); ?> 100%);
            
            /* Header customization vars */
            --header-bg-color: <?php echo esc_attr($header_bg_rgba); ?>;
            --nav-text-color: <?php echo esc_attr($nav_text_color_mod); ?>;
            --nav-hover-color: <?php echo esc_attr($secondary_color); ?>;
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

/**
 * Add helper body class for submenu hover style toggle.
 */
function prime_capital_institution_suite_body_classes($classes)
{
    if (get_theme_mod('prime_capital_institution_suite_submenu_hover_bg_enabled', false)) {
        $classes[] = 'submenu-hover-bg-on';
    }

    return $classes;
}
add_filter('body_class', 'prime_capital_institution_suite_body_classes');
