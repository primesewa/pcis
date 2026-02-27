    <?php
    $footer_location = get_theme_mod('prime_capital_institution_suite_location_text', 'Kathmandu, Nepal');
    $footer_phone = get_theme_mod('prime_capital_institution_suite_phone_text', '+977-1-4123456');
    $footer_email = get_theme_mod('prime_capital_institution_suite_email_text', 'info@swastiklbs.com.np');
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
                    <div class="footer-badges">
                        <span class="footer-chip"><?php esc_html_e('NRB Licensed', 'prime-capital-institution-suite'); ?></span>
                        <span class="footer-chip"><?php esc_html_e('Secure Banking', 'prime-capital-institution-suite'); ?></span>
                    </div>
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
                        <a class="footer-cta" href="#"><?php esc_html_e('Find a Branch', 'prime-capital-institution-suite'); ?></a>
                        <a class="footer-cta ghost" href="#"><?php esc_html_e('Open an Account', 'prime-capital-institution-suite'); ?></a>
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
