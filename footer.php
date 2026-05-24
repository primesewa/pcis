    <?php
    $footer_location = get_theme_mod('prime_capital_institution_suite_location_text', 'Kathmandu, Nepal');
    $footer_phone = get_theme_mod('prime_capital_institution_suite_phone_text', '+977-1-4123456');
    $footer_email = get_theme_mod('prime_capital_institution_suite_email_text', 'info@swastiklbs.com.np');
    $footer_cta1_text = get_theme_mod('prime_capital_institution_suite_footer_cta1_text', __('Find a Branch', 'prime-capital-institution-suite'));
    $footer_cta1_url = get_theme_mod('prime_capital_institution_suite_footer_cta1_url', '#');
    $footer_cta2_text = get_theme_mod('prime_capital_institution_suite_footer_cta2_text', __('Open an Account', 'prime-capital-institution-suite'));
    $footer_cta2_url = get_theme_mod('prime_capital_institution_suite_footer_cta2_url', '#');
    $footer_chip_1 = trim((string) get_theme_mod('prime_capital_institution_suite_footer_chip_1', __('Member Focused', 'prime-capital-institution-suite')));
    $footer_chip_2 = trim((string) get_theme_mod('prime_capital_institution_suite_footer_chip_2', __('Community Trusted', 'prime-capital-institution-suite')));
    ?>
	<footer id="colophon" class="site-footer">
        <div class="footer-top">
            <div class="container footer-grid">
                <div class="footer-brand">
                    <div class="footer-logo">
                        <?php if (has_custom_logo()): ?>
                            <?php the_custom_logo(); ?>
                        <?php else: ?>
                            <h3 class="footer-title"><?php bloginfo('name'); ?></h3>
                        <?php endif; ?>
                    </div>
                    <p class="footer-text">
                        <?php echo esc_html(get_bloginfo('description', 'display') ?: __('A trusted cooperative partner for growth, savings, and community prosperity.', 'prime-capital-institution-suite')); ?>
                    </p>
                    <?php if ($footer_chip_1 || $footer_chip_2) : ?>
                        <div class="footer-badges">
                            <?php if ($footer_chip_1) : ?><span class="footer-chip"><?php echo esc_html($footer_chip_1); ?></span><?php endif; ?>
                            <?php if ($footer_chip_2) : ?><span class="footer-chip"><?php echo esc_html($footer_chip_2); ?></span><?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="footer-socials">
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
                </div>

                <div class="footer-links">
                    <h4 class="footer-heading"><?php esc_html_e('Useful Links', 'prime-capital-institution-suite'); ?></h4>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer-menu',
                            'menu_id' => 'footer-menu',
                            'menu_class' => 'footer-menu',
                            'container' => false,
                            'fallback_cb' => false,
                        )
                    );
                    ?>
                </div>

                <div class="footer-contact">
                    <h4 class="footer-heading"><?php esc_html_e('Contact', 'prime-capital-institution-suite'); ?></h4>
                    <ul class="footer-list">
                        <li>
                            <span class="footer-icon"><i class="fa-solid fa-location-dot" aria-hidden="true"></i></span>
                            <?php echo esc_html($footer_location); ?>
                        </li>
                        <li>
                            <span class="footer-icon"><i class="fa-solid fa-phone" aria-hidden="true"></i></span>
                            <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $footer_phone)); ?>"><?php echo esc_html($footer_phone); ?></a>
                        </li>
                        <li>
                            <span class="footer-icon"><i class="fa-regular fa-envelope" aria-hidden="true"></i></span>
                            <a href="mailto:<?php echo esc_attr($footer_email); ?>"><?php echo esc_html($footer_email); ?></a>
                        </li>
                    </ul>
                    <div class="footer-cta-wrap">
                        <?php if ($footer_cta1_text) : ?>
                            <a class="footer-cta" href="<?php echo esc_url($footer_cta1_url); ?>"><?php echo esc_html($footer_cta1_text); ?></a>
                        <?php endif; ?>
                        <?php if ($footer_cta2_text) : ?>
                            <a class="footer-cta ghost" href="<?php echo esc_url($footer_cta2_url); ?>"><?php echo esc_html($footer_cta2_text); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container footer-bottom-inner">
                <span>&copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All Rights Reserved.', 'prime-capital-institution-suite'); ?></span>
                <span class="footer-credit">
                    <?php printf(esc_html__('Proudly Web Design by %s.', 'prime-capital-institution-suite'), '<a href="https://primeitsewa.com">Prime IT Sewa</a>'); ?>
                </span>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
