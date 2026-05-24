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
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'prime_capital_institution_suite_setup');

/**
 * Return theme asset version using file modification time.
 */
function prime_capital_institution_suite_asset_version($relative_path)
{
    // While logged in (or in Customizer preview), always bypass static asset cache.
    if (is_user_logged_in() || is_customize_preview()) {
        return (string) time();
    }

    $absolute_path = trailingslashit(get_template_directory()) . ltrim($relative_path, '/');
    return file_exists($absolute_path) ? (string) filemtime($absolute_path) : (string) _S_VERSION;
}

/**
 * Enqueue scripts and styles.
 */
function prime_capital_institution_suite_scripts()
{
    // Auto-versioning for style.css based on file modification time.
    $style_ver = prime_capital_institution_suite_asset_version('style.css');
    wp_enqueue_style('prime-capital-institution-suite-style', get_stylesheet_uri(), array(), $style_ver);

    // Dynamic Google Fonts Enqueue
    $body_font = get_theme_mod('prime_capital_institution_suite_body_font', 'Inter');
    $heading_font = get_theme_mod('prime_capital_institution_suite_heading_font', 'Inter');

    $font_families = array_unique(
        array(
            $body_font,
            $heading_font,
        )
    );

    $font_query_parts = array();
    foreach ($font_families as $family_name) {
        $family_name = trim((string) $family_name);
        if ($family_name === '') {
            continue;
        }
        $font_query_parts[] = 'family=' . rawurlencode($family_name) . ':wght@400;500;600;700';
    }

    $font_url = 'https://fonts.googleapis.com/css2';
    if (!empty($font_query_parts)) {
        $font_url .= '?' . implode('&', $font_query_parts) . '&display=swap';
    }

    wp_enqueue_style('prime-capital-institution-suite-fonts', $font_url, array(), null);
    wp_enqueue_style('prime-capital-institution-suite-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1');

    // Auto-versioning for theme JS file.
    $js_ver = prime_capital_institution_suite_asset_version('js/navigation.js');
    wp_enqueue_script('prime-capital-institution-suite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), $js_ver, true);
}
add_action('wp_enqueue_scripts', 'prime_capital_institution_suite_scripts');

/**
 * In development/admin sessions, instruct browsers and proxies not to cache pages.
 */
function prime_capital_institution_suite_disable_cache_for_logged_in()
{
    if (is_user_logged_in() || is_customize_preview()) {
        nocache_headers();
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Pragma: no-cache');
        header('Expires: Wed, 11 Jan 1984 05:00:00 GMT');
    }
}
add_action('send_headers', 'prime_capital_institution_suite_disable_cache_for_logged_in');

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

    register_sidebar(
        array(
        'name' => esc_html__('Archive Sidebar', 'prime-capital-institution-suite'),
        'id' => 'archive-sidebar',
        'description' => esc_html__('Widgets here appear on archive and taxonomy right sidebar below standard panels.', 'prime-capital-institution-suite'),
        'before_widget' => '<section id="%1$s" class="aside-panel archive-widget %2$s">',
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
        'report' => array(
            'singular' => 'Report',
            'plural' => 'Reports',
            'menu_icon' => 'dashicons-media-spreadsheet',
            'menu_position' => 24,
            'slug' => 'report',
            'has_archive' => 'reports',
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
            'has_archive' => 'notices',
        ),
        'download' => array(
            'singular' => 'Download',
            'plural' => 'Downloads',
            'menu_icon' => 'dashicons-download',
            'menu_position' => 29,
            'slug' => 'downloads',
            'has_archive' => 'downloads',
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
                'has_archive' => isset($config['has_archive']) ? $config['has_archive'] : $config['slug'],
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

    // Taxonomy for grouping reports (e.g., Annual, Quarterly, Monthly).
    $report_category_labels = array(
        'name'              => __('Report Categories', 'prime-capital-institution-suite'),
        'singular_name'     => __('Report Category', 'prime-capital-institution-suite'),
        'search_items'      => __('Search Report Categories', 'prime-capital-institution-suite'),
        'all_items'         => __('All Report Categories', 'prime-capital-institution-suite'),
        'parent_item'       => __('Parent Report Category', 'prime-capital-institution-suite'),
        'parent_item_colon' => __('Parent Report Category:', 'prime-capital-institution-suite'),
        'edit_item'         => __('Edit Report Category', 'prime-capital-institution-suite'),
        'update_item'       => __('Update Report Category', 'prime-capital-institution-suite'),
        'add_new_item'      => __('Add New Report Category', 'prime-capital-institution-suite'),
        'new_item_name'     => __('New Report Category Name', 'prime-capital-institution-suite'),
        'menu_name'         => __('Report Categories', 'prime-capital-institution-suite'),
    );

    register_taxonomy(
        'report_category',
        array('report'),
        array(
            'hierarchical'      => true,
            'labels'            => $report_category_labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_in_rest'      => true,
            'public'            => true,
            'rewrite'           => array(
                'slug' => 'reports',
                'with_front' => false,
                'hierarchical' => false,
            ),
        )
    );

    $notice_category_labels = array(
        'name'              => __('Notice Categories', 'prime-capital-institution-suite'),
        'singular_name'     => __('Notice Category', 'prime-capital-institution-suite'),
        'search_items'      => __('Search Notice Categories', 'prime-capital-institution-suite'),
        'all_items'         => __('All Notice Categories', 'prime-capital-institution-suite'),
        'parent_item'       => __('Parent Notice Category', 'prime-capital-institution-suite'),
        'parent_item_colon' => __('Parent Notice Category:', 'prime-capital-institution-suite'),
        'edit_item'         => __('Edit Notice Category', 'prime-capital-institution-suite'),
        'update_item'       => __('Update Notice Category', 'prime-capital-institution-suite'),
        'add_new_item'      => __('Add New Notice Category', 'prime-capital-institution-suite'),
        'new_item_name'     => __('New Notice Category Name', 'prime-capital-institution-suite'),
        'menu_name'         => __('Notice Categories', 'prime-capital-institution-suite'),
    );

    register_taxonomy(
        'notice_category',
        array('notice'),
        array(
            'hierarchical'      => true,
            'labels'            => $notice_category_labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_in_rest'      => true,
            'public'            => true,
            'rewrite'           => array(
                'slug' => 'notice-category',
                'with_front' => false,
                'hierarchical' => false,
            ),
        )
    );

    $download_category_labels = array(
        'name'              => __('Download Categories', 'prime-capital-institution-suite'),
        'singular_name'     => __('Download Category', 'prime-capital-institution-suite'),
        'search_items'      => __('Search Download Categories', 'prime-capital-institution-suite'),
        'all_items'         => __('All Download Categories', 'prime-capital-institution-suite'),
        'parent_item'       => __('Parent Download Category', 'prime-capital-institution-suite'),
        'parent_item_colon' => __('Parent Download Category:', 'prime-capital-institution-suite'),
        'edit_item'         => __('Edit Download Category', 'prime-capital-institution-suite'),
        'update_item'       => __('Update Download Category', 'prime-capital-institution-suite'),
        'add_new_item'      => __('Add New Download Category', 'prime-capital-institution-suite'),
        'new_item_name'     => __('New Download Category Name', 'prime-capital-institution-suite'),
        'menu_name'         => __('Download Categories', 'prime-capital-institution-suite'),
    );

    register_taxonomy(
        'download_category',
        array('download'),
        array(
            'hierarchical'      => true,
            'labels'            => $download_category_labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_in_rest'      => true,
            'public'            => true,
            'rewrite'           => array(
                'slug' => 'download-category',
                'with_front' => false,
                'hierarchical' => false,
            ),
        )
    );
}
add_action('init', 'prime_capital_institution_suite_register_custom_content');

/**
 * Ensure all public custom post types are available in Appearance > Menus.
 */
function prime_capital_institution_suite_force_cpts_in_nav_menus($args, $post_type)
{
    if ($post_type === 'post' || $post_type === 'page' || $post_type === 'attachment') {
        return $args;
    }

    $is_public = isset($args['public']) ? (bool) $args['public'] : false;
    $is_queryable = isset($args['publicly_queryable']) ? (bool) $args['publicly_queryable'] : $is_public;

    if ($is_public || $is_queryable) {
        $args['show_in_nav_menus'] = true;
    }

    return $args;
}
add_filter('register_post_type_args', 'prime_capital_institution_suite_force_cpts_in_nav_menus', 20, 2);

/**
 * Final fallback on nav-menus screen: do not block menu meta boxes for public CPTs.
 */
function prime_capital_institution_suite_allow_nav_menu_meta_box_for_cpts($post_type_object)
{
    if (!$post_type_object || !($post_type_object instanceof WP_Post_Type)) {
        return $post_type_object;
    }

    if (!in_array($post_type_object->name, array('post', 'page', 'attachment'), true) && $post_type_object->public) {
        $post_type_object->show_in_nav_menus = true;
    }

    return $post_type_object;
}
add_filter('nav_menu_meta_box_object', 'prime_capital_institution_suite_allow_nav_menu_meta_box_for_cpts');

/**
 * Force CPT meta boxes to stay visible on Appearance > Menus.
 */
function prime_capital_institution_suite_force_show_cpt_menu_metaboxes($hidden, $screen)
{
    if (!is_array($hidden) || !is_object($screen) || $screen->id !== 'nav-menus') {
        return $hidden;
    }

    $post_types = get_post_types(
        array(
            'public' => true,
            '_builtin' => false,
        ),
        'names'
    );

    if (empty($post_types)) {
        return $hidden;
    }

    foreach ($post_types as $post_type) {
        $meta_box_id = 'add-post-type-' . $post_type;
        $hidden = array_values(array_diff($hidden, array($meta_box_id)));
        $archive_meta_box_id = 'add-post-type-archive-' . $post_type;
        $hidden = array_values(array_diff($hidden, array($archive_meta_box_id)));
    }

    $taxonomies = get_taxonomies(
        array(
            'public' => true,
            '_builtin' => false,
        ),
        'names'
    );

    foreach ($taxonomies as $taxonomy) {
        $meta_box_id = 'add-' . $taxonomy;
        $hidden = array_values(array_diff($hidden, array($meta_box_id)));
    }

    return $hidden;
}
add_filter('hidden_meta_boxes', 'prime_capital_institution_suite_force_show_cpt_menu_metaboxes', 20, 2);

/**
 * Seed default report categories once.
 */
function prime_capital_institution_suite_seed_report_categories()
{
    $seeded = get_option('prime_capital_report_categories_seeded', false);
    if ($seeded || !taxonomy_exists('report_category')) {
        return;
    }

    $defaults = array('Annual', 'Quarterly', 'Monthly');
    foreach ($defaults as $term_name) {
        if (!term_exists($term_name, 'report_category')) {
            wp_insert_term($term_name, 'report_category');
        }
    }

    update_option('prime_capital_report_categories_seeded', 1);
}
add_action('admin_init', 'prime_capital_institution_suite_seed_report_categories');

/**
 * Seed default notice categories once.
 */
function prime_capital_institution_suite_seed_notice_categories()
{
    $seeded = get_option('prime_capital_notice_categories_seeded', false);
    if ($seeded || !taxonomy_exists('notice_category')) {
        return;
    }

    $defaults = array('General Notice', 'Urgent Notice');
    foreach ($defaults as $term_name) {
        if (!term_exists($term_name, 'notice_category')) {
            wp_insert_term($term_name, 'notice_category');
        }
    }

    update_option('prime_capital_notice_categories_seeded', 1);
}
add_action('admin_init', 'prime_capital_institution_suite_seed_notice_categories');

/**
 * Seed default download categories once.
 */
function prime_capital_institution_suite_seed_download_categories()
{
    $seeded = get_option('prime_capital_download_categories_seeded', false);
    if ($seeded || !taxonomy_exists('download_category')) {
        return;
    }

    $defaults = array('Forms', 'Policies', 'Guidelines');
    foreach ($defaults as $term_name) {
        if (!term_exists($term_name, 'download_category')) {
            wp_insert_term($term_name, 'download_category');
        }
    }

    update_option('prime_capital_download_categories_seeded', 1);
}
add_action('admin_init', 'prime_capital_institution_suite_seed_download_categories');

/**
 * Flush rewrite rules once after CPT/taxonomy structure updates.
 */
function prime_capital_institution_suite_flush_rewrites_once()
{
    $key = 'prime_capital_rewrite_rules_flushed_20260523_v6';
    if (get_option($key)) {
        return;
    }

    flush_rewrite_rules(false);
    update_option($key, 1);
}
add_action('admin_init', 'prime_capital_institution_suite_flush_rewrites_once');

/**
 * Backward compatibility: redirect old report-category links to /reports/{term}.
 */
function prime_capital_institution_suite_redirect_legacy_report_category_urls()
{
    if (is_admin()) {
        return;
    }

    $request_path = isset($_SERVER['REQUEST_URI']) ? wp_parse_url(wp_unslash($_SERVER['REQUEST_URI']), PHP_URL_PATH) : '';
    if (empty($request_path)) {
        return;
    }

    $normalized_path = trim($request_path, '/');
    if (strpos($normalized_path, 'report-category/') !== 0) {
        return;
    }

    $term_slug = trim(substr($normalized_path, strlen('report-category/')), '/');
    if (empty($term_slug)) {
        wp_safe_redirect(get_post_type_archive_link('report'), 301);
        exit;
    }

    $term = get_term_by('slug', $term_slug, 'report_category');
    if (!$term || is_wp_error($term)) {
        return;
    }

    wp_safe_redirect(get_term_link($term), 301);
    exit;
}
add_action('template_redirect', 'prime_capital_institution_suite_redirect_legacy_report_category_urls', 1);

/**
 * Keep report listings ordered newest first across archive/taxonomy pages.
 */
function prime_capital_institution_suite_order_reports_latest_first($query)
{
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    if (
        $query->is_post_type_archive('report')
        || $query->is_tax('report_category')
        || $query->is_post_type_archive('notice')
        || $query->is_tax('notice_category')
        || $query->is_post_type_archive('download')
        || $query->is_tax('download_category')
    ) {
        $query->set('orderby', 'date');
        $query->set('order', 'DESC');
    }
}
add_action('pre_get_posts', 'prime_capital_institution_suite_order_reports_latest_first');

/**
 * Hard fallback: ensure Report Categories meta box is present on nav-menus.php.
 */
function prime_capital_institution_suite_force_report_category_menu_box()
{
    if (!function_exists('add_meta_box') || !function_exists('wp_nav_menu_item_taxonomy_meta_box')) {
        return;
    }

    $taxonomy = get_taxonomy('report_category');
    if (!$taxonomy || empty($taxonomy->show_in_nav_menus)) {
        return;
    }

    add_meta_box(
        'add-report_category',
        $taxonomy->labels->name,
        'wp_nav_menu_item_taxonomy_meta_box',
        'nav-menus',
        'side',
        'default',
        $taxonomy
    );
}
add_action('admin_head-nav-menus.php', 'prime_capital_institution_suite_force_report_category_menu_box');

/**
 * Ensure post type archive meta boxes are available on nav-menus.php.
 */
function prime_capital_institution_suite_force_cpt_archive_menu_boxes()
{
    if (!function_exists('add_meta_box') || !function_exists('wp_nav_menu_post_type_archive_meta_box')) {
        return;
    }

    $post_types = get_post_types(
        array(
            'public' => true,
            '_builtin' => false,
            'show_in_nav_menus' => true,
        ),
        'objects'
    );

    if (empty($post_types)) {
        return;
    }

    foreach ($post_types as $post_type) {
        if (empty($post_type->has_archive)) {
            continue;
        }

        add_meta_box(
            'add-post-type-archive-' . $post_type->name,
            sprintf(__('%s Archives', 'prime-capital-institution-suite'), $post_type->labels->singular_name),
            'wp_nav_menu_post_type_archive_meta_box',
            'nav-menus',
            'side',
            'default',
            $post_type
        );
    }
}
add_action('admin_head-nav-menus.php', 'prime_capital_institution_suite_force_cpt_archive_menu_boxes');

/**
 * One-time migration from split report CPTs into single "report" CPT.
 */
function prime_capital_institution_suite_merge_report_post_types()
{
    $migration_done = get_option('prime_capital_report_cpt_merge_done', false);
    if ($migration_done) {
        return;
    }

    $legacy_reports = get_posts(
        array(
            'post_type' => array('annual_report', 'quarterly_report'),
            'post_status' => array('publish', 'draft', 'pending', 'private', 'future'),
            'numberposts' => -1,
            'fields' => 'ids',
        )
    );

    if (empty($legacy_reports)) {
        update_option('prime_capital_report_cpt_merge_done', 1);
        return;
    }

    foreach ($legacy_reports as $legacy_report_id) {
        wp_update_post(
            array(
                'ID' => $legacy_report_id,
                'post_type' => 'report',
            )
        );
    }

    update_option('prime_capital_report_cpt_merge_done', 1);
}
add_action('admin_init', 'prime_capital_institution_suite_merge_report_post_types');

/**
 * Get all custom post types that should support page/post layout switching.
 */
function prime_capital_institution_suite_layout_switch_post_types()
{
    return array(
        'about',
        'product_service',
        'saving_deposit',
        'report',
        'resource',
        'branch',
        'notice',
        'download',
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
 * Remove taxonomy/archive prefixes from archive titles for cleaner UI.
 */
function prime_capital_institution_suite_clean_archive_titles($title)
{
    if (is_category() || is_tag() || is_tax()) {
        $term_title = single_term_title('', false);
        if (!empty($term_title)) {
            return $term_title;
        }
    }

    if (is_post_type_archive()) {
        $post_type_obj = get_queried_object();
        if ($post_type_obj && !empty($post_type_obj->labels->name)) {
            return $post_type_obj->labels->name;
        }
    }

    return $title;
}
add_filter('get_the_archive_title', 'prime_capital_institution_suite_clean_archive_titles');

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
