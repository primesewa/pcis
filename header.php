<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'prime-capital-institution-suite'); ?></a>

    <header id="siteHeader" class="site-header">

                        <!-- ① TOP BAR ────────────────────────────── -->
        <?php
        $show_top_bar = get_theme_mod('prime_capital_institution_suite_show_top_bar', true);
        $show_location = get_theme_mod('prime_capital_institution_suite_show_location', true);
        $show_phone = get_theme_mod('prime_capital_institution_suite_show_phone', true);
        $show_email = get_theme_mod('prime_capital_institution_suite_show_email', true);
        $show_lang = get_theme_mod('prime_capital_institution_suite_show_lang', true);
        $show_socials = get_theme_mod('prime_capital_institution_suite_show_socials', true);
        $location_text = get_theme_mod('prime_capital_institution_suite_location_text', 'Kathmandu, Nepal');
        $phone_text = get_theme_mod('prime_capital_institution_suite_phone_text', '+977-1-4123456');
        $email_text = get_theme_mod('prime_capital_institution_suite_email_text', 'info@swastiklbs.com.np');
        $lang_text = get_theme_mod('prime_capital_institution_suite_lang_text', 'EN | NP');
        ?>

        <?php if ($show_top_bar): ?>
        <div class="top-bar">
            <div class="tb-inner">
                <div class="tb-left">
                    <?php if ($show_location && $location_text): ?>
                    <div class="tb-item">
                        <svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                        <?php echo esc_html($location_text); ?>
                    </div>
                    <?php endif; ?>
                    <?php if ($show_location && $location_text && ($show_phone || $show_email)): ?>
                    <div class="tb-sep"></div>
                    <?php endif; ?>
                    <?php if ($show_phone && $phone_text): ?>
                    <div class="tb-item">
                        <svg viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                        <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone_text)); ?>"><?php echo esc_html($phone_text); ?></a>
                    </div>
                    <?php endif; ?>
                    <?php if ($show_phone && $phone_text && $show_email && $email_text): ?>
                    <div class="tb-sep"></div>
                    <?php endif; ?>
                    <?php if ($show_email && $email_text): ?>
                    <div class="tb-item">
                        <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                        <a href="mailto:<?php echo esc_attr($email_text); ?>"><?php echo esc_html($email_text); ?></a>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="tb-right">
                    <?php if ($show_lang && $lang_text): ?>
                    <div class="tb-lang">
                        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                        <?php echo esc_html($lang_text); ?>
                    </div>
                    <?php endif; ?>
                    <?php if ($show_socials): ?>
                    <div class="tb-socials">
                        <?php
                        for ($i = 1; $i <= 3; $i++) {
                            $enabled = get_theme_mod("prime_capital_institution_suite_social_{$i}_enabled", $i <= 2);
                            $label = get_theme_mod("prime_capital_institution_suite_social_{$i}_label", $i === 1 ? 'Facebook' : ($i === 2 ? 'Twitter' : 'Social'));
                            $icon = get_theme_mod("prime_capital_institution_suite_social_{$i}_icon", $i === 1 ? 'fab fa-facebook-f' : ($i === 2 ? 'fab fa-twitter' : 'fab fa-linkedin-in'));
                            $url = get_theme_mod("prime_capital_institution_suite_social_{$i}_url", '#');
                            if ($enabled && $icon && $url) {
                                echo '<a href="' . esc_url($url) . '" aria-label="' . esc_attr($label) . '"><i class="' . esc_attr($icon) . '" aria-hidden="true"></i></a>';
                            }
                        }
                        ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- ② LOGO BAND ──────────────────────────── -->
        <div class="logo-band">
            <div class="lb-inner">
                <div class="site-branding">
                    <?php
if (has_custom_logo()) {
    the_custom_logo();
}
else {
?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                        <?php
    $prime_capital_institution_suite_description = get_bloginfo('description', 'display');
    if ($prime_capital_institution_suite_description || is_customize_preview()):
?>
                            <p class="site-description"><?php echo $prime_capital_institution_suite_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                        <?php
    endif;
}
?>
                </div>

                                <?php
                $show_quick_stats = get_theme_mod('prime_capital_institution_suite_show_quick_stats', true);
                $stat1_number = get_theme_mod('prime_capital_institution_suite_stat1_number', '22+');
                $stat1_label = get_theme_mod('prime_capital_institution_suite_stat1_label', 'Years');
                $stat2_number = get_theme_mod('prime_capital_institution_suite_stat2_number', '58');
                $stat2_label = get_theme_mod('prime_capital_institution_suite_stat2_label', 'Branches');
                $show_badge = get_theme_mod('prime_capital_institution_suite_show_badge', true);
                $badge_main = get_theme_mod('prime_capital_institution_suite_badge_main', '"Empowering Communities"');
                $badge_sub = get_theme_mod('prime_capital_institution_suite_badge_sub', 'NRB Licensed � Est. 2001');
                $show_apply_button = get_theme_mod('prime_capital_institution_suite_show_apply_button', true);
                $apply_button_text = get_theme_mod('prime_capital_institution_suite_apply_button_text', 'Apply');
                $apply_button_url = get_theme_mod('prime_capital_institution_suite_apply_button_url', '#');
                ?>

                <div class="lb-right">
                    <?php if ($show_quick_stats): ?>
                    <div class="quick-stats">
                        <div class="qs-item"><span class="qs-num"><?php echo esc_html($stat1_number); ?></span><span class="qs-label"><?php echo esc_html($stat1_label); ?></span></div>
                        <div class="qs-item"><span class="qs-num"><?php echo esc_html($stat2_number); ?></span><span class="qs-label"><?php echo esc_html($stat2_label); ?></span></div>
                    </div>
                    <?php endif; ?>
                    <?php if ($show_quick_stats && $show_badge): ?>
                    <div class="lb-divider"></div>
                    <?php endif; ?>
                    <?php if ($show_badge): ?>
                    <div class="nrb-badge">
                        <span class="badge-main"><?php echo esc_html($badge_main); ?></span>
                        <span class="badge-sub"><?php echo esc_html($badge_sub); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if ($show_badge || $show_quick_stats): ?>
                    <div class="lb-divider"></div>
                    <?php endif; ?>
                    <div class="lb-ctas">
                        <div class="nav-search nav-search-light" role="search">
                            <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                                <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search', 'placeholder', 'prime-capital-institution-suite'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                                <button type="button" class="search-submit" aria-label="Submit">
                                    <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                                </button>
                            </form>
                        </div>
                        <?php if ($show_apply_button && $apply_button_text): ?>
                        <a href="<?php echo esc_url($apply_button_url ? $apply_button_url : '#'); ?>" class="btn-fill"><svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/></svg><?php echo esc_html($apply_button_text); ?></a>
                        <?php endif; ?>
                    </div>
                    <!-- Hamburger for mobile -->
                    <button class="hamburger menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle menu', 'prime-capital-institution-suite'); ?>">
                        <span></span><span></span><span></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- NAVIGATION BAR -->
        <nav id="site-navigation" class="nav-bar main-navigation">
            <div class="nav-inner">
                <?php
wp_nav_menu(
    array(
    'theme_location' => 'menu-1',
    'menu_id' => 'primary-menu',
    'menu_class' => 'nav-list',
    'container' => false,
)
);
?>
                


            </div>
        </nav>

    </header>

    <script>
    /* ── Sticky shrink behavior ── */
    document.addEventListener('DOMContentLoaded', function() {
        const hdr = document.getElementById('siteHeader');
        const searchWrap = document.querySelector('.nav-search.nav-search-light');
        const searchInput = searchWrap ? searchWrap.querySelector('input[type="search"]') : null;
        const searchBtn = searchWrap ? searchWrap.querySelector('.search-submit') : null;
        const menuToggle = document.querySelector('.hamburger.menu-toggle');
        
        // Sticky behavior using scroll event for better compatibility
        window.addEventListener('scroll', function() {
            if (window.scrollY > 100) {
                hdr.classList.add('scrolled');
            } else {
                hdr.classList.remove('scrolled');
            }
        }, { passive: true });

        // Mobile-friendly search: first tap opens input, second tap submits
        if (searchWrap && searchInput && searchBtn) {
            searchBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                const isOpen = searchWrap.classList.contains('is-open');
                if (!isOpen) {
                    searchWrap.classList.add('is-open');
                    searchInput.focus();
                    return;
                }
                if (searchInput.value.trim() !== '') {
                    searchWrap.querySelector('form').submit();
                    return;
                }
                searchWrap.classList.remove('is-open');
            });

            document.addEventListener('click', function(e) {
                if (!searchWrap.contains(e.target)) {
                    searchWrap.classList.remove('is-open');
                }
            });
        }

        if (menuToggle && searchWrap) {
            menuToggle.addEventListener('click', function() {
                searchWrap.classList.remove('is-open');
            });
        }
    });
    </script>





