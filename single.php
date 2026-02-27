<?php
/**
 * The template for displaying all single posts
 *
 * @package prime_capital_institution_suite
 */

get_header();
?>

<main id="primary" class="site-main single-page">
    <?php
while (have_posts()):
    the_post();

    get_template_part('template-parts/content', 'single');

endwhile;
?>
</main><!-- #primary -->

<?php
get_footer();
