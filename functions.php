<?php
/**
 * Prime Capital Institution Suite functions and definitions
 *
 * @package prime_capital_institution_suite
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function prime_capital_institution_suite_setup()
{
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_theme_textdomain('prime-capital-institution-suite', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
        'html5',
        array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    )
    );

    // Safe to auto-run background for Logo
    add_theme_support(
        'custom-logo',
        array(
        'height' => 150,
        'width' => 550,
        'flex-width' => true,
        'flex-height' => true,
        'header-text' => array('site-title', 'site-description'),
    )
    );

    // Register Nav Menus
    register_nav_menus(
        array(
        'menu-1' => esc_html__('Primary Menu', 'prime-capital-institution-suite'),
        'footer-menu' => esc_html__('Footer Menu', 'prime-capital-institution-suite'),
    )
    );

    // Elementor Support (Basic)
    add_theme_support('elementor');
}
add_action('after_setup_theme', 'prime_capital_institution_suite_setup');

/**
 * Enqueue scripts and styles.
 */
function prime_capital_institution_suite_scripts()
{
    // Auto-versioning for Style.css based on file modification time
    $style_ver = filemtime(get_stylesheet_directory() . '/style.css');
    wp_enqueue_style('prime-capital-institution-suite-style', get_stylesheet_uri(), array(), $style_ver);

    // Dynamic Google Fonts Enqueue
    $body_font = get_theme_mod('prime_capital_institution_suite_body_font', 'Inter');
    $heading_font = get_theme_mod('prime_capital_institution_suite_heading_font', 'Inter');

    $fonts = array();
    $fonts[] = $body_font . ':400,500,600,700';
    $fonts[] = $heading_font . ':400,500,600,700';
    $fonts = array_unique($fonts);

    $font_args = array(
        'family' => rawurlencode(implode('|', $fonts)),
        'display' => 'swap',
    );

    $font_url = add_query_arg($font_args, 'https://fonts.googleapis.com/css2');

    wp_enqueue_style('prime-capital-institution-suite-fonts', $font_url, array(), null);
    wp_enqueue_style('prime-capital-institution-suite-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1');

    // Auto-versioning for JS
    $js_ver = filemtime(get_template_directory() . '/js/navigation.js');
    wp_enqueue_script('prime-capital-institution-suite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), $js_ver, true);
}
add_action('wp_enqueue_scripts', 'prime_capital_institution_suite_scripts');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function prime_capital_institution_suite_widgets_init()
{
    register_sidebar(
        array(
        'name' => esc_html__('Single Post Sidebar', 'prime-capital-institution-suite'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here to appear in your single post sidebar.', 'prime-capital-institution-suite'),
        'before_widget' => '<section id="%1$s" class="sidebar-card %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    )
    );

}
add_action('widgets_init', 'prime_capital_institution_suite_widgets_init');

/**
 * Register custom post types.
 */
function prime_capital_institution_suite_register_custom_content()
{
    $page_like_supports = array(
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'page-attributes',
        'revisions',
        'custom-fields',
    );

    $post_types = array(
        'about' => array(
            'singular' => 'About Us',
            'plural' => 'About Us',
            'menu_icon' => 'dashicons-info',
            'menu_position' => 21,
            'slug' => 'about-us',
        ),
        'product_service' => array(
            'singular' => 'Product & Service',
            'plural' => 'Products & Services',
            'menu_icon' => 'dashicons-portfolio',
            'menu_position' => 22,
            'slug' => 'products-services',
        ),
        'saving_deposit' => array(
            'singular' => 'Saving & Deposit',
            'plural' => 'Savings & Deposits',
            'menu_icon' => 'dashicons-money-alt',
            'menu_position' => 23,
            'slug' => 'savings-deposits',
        ),
        'annual_report' => array(
            'singular' => 'Annual Report',
            'plural' => 'Annual Reports',
            'menu_icon' => 'dashicons-media-document',
            'menu_position' => 24,
            'slug' => 'annual-reports',
            'show_in_menu' => 'prime-capital-reports',
        ),
        'quarterly_report' => array(
            'singular' => 'Quarterly Report',
            'plural' => 'Quarterly Reports',
            'menu_icon' => 'dashicons-chart-bar',
            'menu_position' => 25,
            'slug' => 'quarterly-reports',
            'show_in_menu' => 'prime-capital-reports',
        ),
        'resource' => array(
            'singular' => 'Resource',
            'plural' => 'Resources',
            'menu_icon' => 'dashicons-book-alt',
            'menu_position' => 26,
            'slug' => 'resources',
        ),
        'branch' => array(
            'singular' => 'Branch',
            'plural' => 'Branches',
            'menu_icon' => 'dashicons-location-alt',
            'menu_position' => 27,
            'slug' => 'branches',
        ),
        'notice' => array(
            'singular' => 'Notice',
            'plural' => 'Notices',
            'menu_icon' => 'dashicons-megaphone',
            'menu_position' => 28,
            'slug' => 'notices',
        ),
    );

    foreach ($post_types as $post_type => $config) {
        $labels = array(
            'name' => $config['plural'],
            'singular_name' => $config['singular'],
            'menu_name' => $config['plural'],
            'name_admin_bar' => $config['singular'],
            'add_new' => 'Add New',
            'add_new_item' => 'Add New ' . $config['singular'],
            'new_item' => 'New ' . $config['singular'],
            'edit_item' => 'Edit ' . $config['singular'],
            'view_item' => 'View ' . $config['singular'],
            'all_items' => 'All ' . $config['plural'],
            'search_items' => 'Search ' . $config['plural'],
            'not_found' => 'No ' . strtolower($config['plural']) . ' found.',
            'not_found_in_trash' => 'No ' . strtolower($config['plural']) . ' found in Trash.',
        );

        register_post_type(
            $post_type,
            array(
                'labels' => $labels,
                'public' => true,
                'show_ui' => true,
                'show_in_menu' => isset($config['show_in_menu']) ? $config['show_in_menu'] : true,
                'show_in_admin_bar' => true,
                'show_in_nav_menus' => true,
                'show_in_rest' => true,
                'has_archive' => true,
                'hierarchical' => true,
                'capability_type' => 'page',
                'map_meta_cap' => true,
                'menu_icon' => $config['menu_icon'],
                'menu_position' => $config['menu_position'],
                'supports' => $page_like_supports,
                'rewrite' => array('slug' => $config['slug']),
            )
        );
    }
}
add_action('init', 'prime_capital_institution_suite_register_custom_content');

/**
 * Group annual and quarterly report post types under one Reports admin menu.
 */
function prime_capital_institution_suite_register_reports_admin_menu()
{
    add_menu_page(
        'Reports',
        'Reports',
        'edit_posts',
        'prime-capital-reports',
        '__return_null',
        'dashicons-media-spreadsheet',
        24
    );

    add_submenu_page(
        'prime-capital-reports',
        'Annual Report',
        'Annual Report',
        'edit_posts',
        'edit.php?post_type=annual_report'
    );

    add_submenu_page(
        'prime-capital-reports',
        'Quarterly Report',
        'Quarterly Report',
        'edit_posts',
        'edit.php?post_type=quarterly_report'
    );
}
add_action('admin_menu', 'prime_capital_institution_suite_register_reports_admin_menu', 9);

/**
 * Keep only two clean submenu entries under Reports.
 */
function prime_capital_institution_suite_cleanup_reports_admin_menu()
{
    remove_submenu_page('prime-capital-reports', 'prime-capital-reports');
    remove_submenu_page('prime-capital-reports', 'edit.php?post_type=annual_report');
    remove_submenu_page('prime-capital-reports', 'post-new.php?post_type=annual_report');
    remove_submenu_page('prime-capital-reports', 'edit.php?post_type=quarterly_report');
    remove_submenu_page('prime-capital-reports', 'post-new.php?post_type=quarterly_report');
}
add_action('admin_menu', 'prime_capital_institution_suite_cleanup_reports_admin_menu', 110);

/**
 * One-time migration from legacy "report" posts into new independent post types.
 */
function prime_capital_institution_suite_migrate_legacy_reports()
{
    $migration_done = get_option('prime_capital_report_cpt_migration_done', false);
    if ($migration_done) {
        return;
    }

    $legacy_reports = get_posts(
        array(
            'post_type' => 'report',
            'post_status' => array('publish', 'draft', 'pending', 'private', 'future'),
            'numberposts' => -1,
            'fields' => 'ids',
        )
    );

    if (empty($legacy_reports)) {
        update_option('prime_capital_report_cpt_migration_done', 1);
        return;
    }

    foreach ($legacy_reports as $legacy_report_id) {
        $target_post_type = 'annual_report';
        $terms = wp_get_post_terms($legacy_report_id, 'report_type', array('fields' => 'slugs'));

        if (!is_wp_error($terms) && in_array('quarterly-reports', $terms, true)) {
            $target_post_type = 'quarterly_report';
        }

        wp_update_post(
            array(
                'ID' => $legacy_report_id,
                'post_type' => $target_post_type,
            )
        );
    }

    update_option('prime_capital_report_cpt_migration_done', 1);
}
add_action('admin_init', 'prime_capital_institution_suite_migrate_legacy_reports');

/**
 * Get all custom post types that should support page/post layout switching.
 */
function prime_capital_institution_suite_layout_switch_post_types()
{
    return array(
        'about',
        'product_service',
        'saving_deposit',
        'annual_report',
        'quarterly_report',
        'resource',
        'branch',
        'notice',
    );
}

/**
 * Add layout selector (Page/Post) for custom post types.
 */
function prime_capital_institution_suite_add_layout_meta_box()
{
    foreach (prime_capital_institution_suite_layout_switch_post_types() as $post_type) {
        add_meta_box(
            'prime_capital_layout_type',
            'Display Layout',
            'prime_capital_institution_suite_layout_meta_box_callback',
            $post_type,
            'side',
            'default'
        );
    }
}
add_action('add_meta_boxes', 'prime_capital_institution_suite_add_layout_meta_box');

/**
 * Render layout selector fields.
 */
function prime_capital_institution_suite_layout_meta_box_callback($post)
{
    $layout = get_post_meta($post->ID, '_prime_capital_layout_type', true);
    if ('' === $layout) {
        $layout = 'page';
    }

    wp_nonce_field('prime_capital_layout_type_nonce', 'prime_capital_layout_type_nonce');
    ?>
    <p>
        <label for="prime_capital_layout_type"><strong>Template Type</strong></label>
    </p>
    <select id="prime_capital_layout_type" name="prime_capital_layout_type" style="width:100%;">
        <option value="page" <?php selected($layout, 'page'); ?>>Page (use page.php)</option>
        <option value="post" <?php selected($layout, 'post'); ?>>Post (use single.php)</option>
    </select>
    <?php
}

/**
 * Save layout selector.
 */
function prime_capital_institution_suite_save_layout_meta_box($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['prime_capital_layout_type_nonce'])) {
        return;
    }

    if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['prime_capital_layout_type_nonce'])), 'prime_capital_layout_type_nonce')) {
        return;
    }

    if (!isset($_POST['post_type']) || !in_array(sanitize_key(wp_unslash($_POST['post_type'])), prime_capital_institution_suite_layout_switch_post_types(), true)) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $layout = isset($_POST['prime_capital_layout_type']) ? sanitize_key(wp_unslash($_POST['prime_capital_layout_type'])) : 'page';
    if (!in_array($layout, array('page', 'post'), true)) {
        $layout = 'page';
    }

    update_post_meta($post_id, '_prime_capital_layout_type', $layout);
}
add_action('save_post', 'prime_capital_institution_suite_save_layout_meta_box');

/**
 * Render custom post types with selected template type.
 */
function prime_capital_institution_suite_cpt_use_selected_template($template)
{
    if (!is_singular()) {
        return $template;
    }

    $post_id = get_queried_object_id();
    if (!$post_id) {
        return $template;
    }

    $post_type = get_post_type($post_id);
    if (!$post_type || !in_array($post_type, prime_capital_institution_suite_layout_switch_post_types(), true)) {
        return $template;
    }

    $layout = get_post_meta($post_id, '_prime_capital_layout_type', true);
    if ('post' === $layout) {
        $single_template = locate_template('single.php');
        if (!empty($single_template)) {
            return $single_template;
        }
        return $template;
    }

    $page_template = locate_template('page.php');
    if (!empty($page_template)) {
        return $page_template;
    }

    return $template;
}
add_filter('template_include', 'prime_capital_institution_suite_cpt_use_selected_template', 99);

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
