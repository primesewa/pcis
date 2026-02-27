<?php
/**
 * The main template file
 *
 * @package prime_capital_institution_suite
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <?php
if (have_posts()):

    while (have_posts()):
        the_post();
?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php
        if (is_singular()):
            the_title('<h1 class="entry-title">', '</h1>');
        else:
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;
?>
                    </header><!-- .entry-header -->
                    
                    <div class="entry-content">
                        <?php
        the_content();
?>
                    </div><!-- .entry-content -->
                </article><!-- #post-<?php the_ID(); ?> -->
                <?php
    endwhile;

else:
?>
            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e('Nothing Found', 'prime-capital-institution-suite'); ?></h1>
                </header><!-- .page-header -->
                <div class="page-content">
                    <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for.', 'prime-capital-institution-suite'); ?></p>
                </div>
            </section>
            <?php
endif;
?>
    </div>
</main><!-- #primary -->

<?php
get_footer();
