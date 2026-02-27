<?php
/**
 * The template for displaying all pages
 *
 * @package prime_capital_institution_suite
 */

get_header();
?>

<main id="primary" class="site-main page-screen">
    <?php
while (have_posts()):
    the_post();

    get_template_part('template-parts/content', 'page');

    if (comments_open() || get_comments_number()):
        comments_template();
    endif;
endwhile;
?>
</main><!-- #primary -->

<?php
get_footer();
