<?php
/**
 * Template part for displaying single post content
 *
 * @package prime_capital_institution_suite
 */

$hero_image = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : '';
$reading_time = ceil(str_word_count(strip_tags(get_the_content())) / 200);
$hero_style = $hero_image ? 'style="background-image: linear-gradient(120deg, rgba(9,10,29,0.9), rgba(9,10,29,0.4)), url(' . esc_url($hero_image) . ');"' : '';
$hero_class = $hero_image ? 'single-hero has-hero-image' : 'single-hero no-hero-image';

$share_url = rawurlencode(get_permalink());
$share_title = rawurlencode(get_the_title());

$sidebar_stats = array(
        array(
        'number' => get_theme_mod('prime_capital_institution_suite_stat1_number', '22+'),
        'label' => get_theme_mod('prime_capital_institution_suite_stat1_label', 'Years'),
    ),
        array(
        'number' => get_theme_mod('prime_capital_institution_suite_stat2_number', '58'),
        'label' => get_theme_mod('prime_capital_institution_suite_stat2_label', 'Branches'),
    ),
);

$footer_phone = get_theme_mod('prime_capital_institution_suite_phone_text', '+977-1-4123456');
$footer_email = get_theme_mod('prime_capital_institution_suite_email_text', 'info@swastiklbs.com.np');
$footer_location = get_theme_mod('prime_capital_institution_suite_location_text', 'Kathmandu, Nepal');

$single_post_title = trim(wp_strip_all_tags(get_the_title()));
if ('' === $single_post_title) {
    $single_post_content = get_post_field('post_content', get_the_ID());
    $single_post_content = html_entity_decode((string)$single_post_content, ENT_QUOTES, get_bloginfo('charset'));
    $single_post_title = trim(wp_trim_words(wp_strip_all_tags($single_post_content), 10, '...'));
}
if ('' === $single_post_title) {
    $single_post_title = esc_html__('Untitled', 'prime-capital-institution-suite');
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
    <section class="<?php echo esc_attr($hero_class); ?>" <?php echo $hero_style; ?>>
        <div class="single-hero-inner container">
            <h1 class="single-hero-title"><?php echo esc_html($single_post_title); ?></h1>
        </div>
    </section>

    <div class="container single-layout">
        <div class="single-grid">
            <div class="single-main">
                <div class="single-post-meta">
                    <div class="single-hero-meta">
                        <span class="single-hero-date"><?php echo esc_html(get_the_date()); ?></span>
                        <span class="single-hero-cat"><?php the_category(' &bull; '); ?></span>
                    </div>
                    <div class="hero-metadata">
                        <span><?php echo esc_html(sprintf(__('Reading time: %s min', 'prime-capital-institution-suite'), max(1, $reading_time))); ?></span>
                        <?php if (has_tag()): ?>
                            <span><?php the_tags('', ' &bull; ', ''); ?></span>
                        <?php
endif; ?>
                    </div>
                </div>
                <div class="entry-content">
                    <?php
the_content();

wp_link_pages(
    array(
    'before' => '<div class="page-links">' . esc_html__('Pages:', 'prime-capital-institution-suite'),
    'after' => '</div>',
)
);
?>
                </div>
                <div class="single-share">
                    <span><?php esc_html_e('Share this article', 'prime-capital-institution-suite'); ?></span>
                    <div class="share-links">
                        <a href="<?php echo 'https://www.facebook.com/sharer/sharer.php?u=' . $share_url; ?>" target="_blank" rel="noreferrer">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            <?php esc_html_e('Facebook', 'prime-capital-institution-suite'); ?>
                        </a>
                        <a href="<?php echo 'https://x.com/intent/tweet?url=' . $share_url . '&text=' . $share_title; ?>" target="_blank" rel="noreferrer">
                            <i class="fab fa-x" aria-hidden="true"></i>
                            <?php esc_html_e('X', 'prime-capital-institution-suite'); ?>
                        </a>
                        <a href="<?php echo 'https://www.linkedin.com/shareArticle?url=' . $share_url . '&title=' . $share_title; ?>" target="_blank" rel="noreferrer">
                            <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                            <?php esc_html_e('LinkedIn', 'prime-capital-institution-suite'); ?>
                        </a>
                    </div>
                </div>

                <?php if (comments_open() || get_comments_number()): ?>
                    <div class="single-comments">
                        <?php comments_template(); ?>
                    </div>
                <?php
endif; ?>

                <?php
the_post_navigation(
    array(
    'prev_text' => '<span class="nav-label">' . esc_html__('Previous', 'prime-capital-institution-suite') . '</span><span class="nav-title">%title</span>',
    'next_text' => '<span class="nav-label">' . esc_html__('Next', 'prime-capital-institution-suite') . '</span><span class="nav-title">%title</span>',
)
);
?>
            </div>

            <aside class="single-sidebar">
                <div class="sidebar-card">
                    <h4><?php esc_html_e('Key Highlights', 'prime-capital-institution-suite'); ?></h4>
                    <div class="sidebar-stats">
                        <?php foreach ($sidebar_stats as $stat): ?>
                            <div>
                                <span class="sidebar-stat-number"><?php echo esc_html($stat['number']); ?></span>
                                <span class="sidebar-stat-label"><?php echo esc_html($stat['label']); ?></span>
                            </div>
                        <?php
endforeach; ?>
                    </div>
                </div>

                <div class="sidebar-card contact-card">
                    <h4><?php esc_html_e('Contact Center', 'prime-capital-institution-suite'); ?></h4>
                    <ul class="sidebar-contact-list">
                        <li>
                            <i class="fa-solid fa-location-dot"></i>
                            <span><?php echo esc_html($footer_location); ?></span>
                        </li>
                        <li>
                            <i class="fa-solid fa-phone"></i>
                            <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $footer_phone)); ?>"><?php echo esc_html($footer_phone); ?></a>
                        </li>
                        <li>
                            <i class="fa-regular fa-envelope"></i>
                            <a href="mailto:<?php echo esc_attr($footer_email); ?>"><?php echo esc_html($footer_email); ?></a>
                        </li>
                    </ul>
                </div>

                <?php if (is_active_sidebar('sidebar-1')): ?>
                    <?php dynamic_sidebar('sidebar-1'); ?>
                <?php
endif; ?>
            </aside>
        </div>
    </div>
</article>
