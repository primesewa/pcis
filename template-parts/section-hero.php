<?php
/**
 * Reusable standard hero section.
 *
 * Expected $args:
 * - eyebrow (string)
 * - title (string)
 * - description (string, optional)
 * - classes (string, optional)
 *
 * @package prime_capital_institution_suite
 */

$hero_eyebrow = isset($args['eyebrow']) ? (string) $args['eyebrow'] : '';
$hero_title = isset($args['title']) ? (string) $args['title'] : '';
$hero_description = isset($args['description']) ? (string) $args['description'] : '';
$hero_classes = isset($args['classes']) ? (string) $args['classes'] : '';
?>

<section class="archive-hero standard-hero <?php echo esc_attr($hero_classes); ?>">
    <div class="container">
        <?php if ($hero_eyebrow !== ''): ?>
            <p class="eyebrow"><?php echo esc_html($hero_eyebrow); ?></p>
        <?php endif; ?>
        <h1 class="page-title"><?php echo esc_html($hero_title); ?></h1>
        <?php if ($hero_description !== ''): ?>
            <p class="archive-desc"><?php echo esc_html($hero_description); ?></p>
        <?php endif; ?>
    </div>
</section>
