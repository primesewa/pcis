<?php
/**
 * Template part for displaying posts
 *
 * @package prime_capital_institution_suite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
    <?php if (has_post_thumbnail()): ?>
        <header class="entry-header-image">
            <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                <?php the_post_thumbnail('medium_large'); ?>
            </a>
        </header>
    <?php
endif; ?>

    <div class="entry-card-content">
        <header class="entry-header">
            <?php
if ('post' === get_post_type()):
?>
                <div class="entry-meta">
                    <?php
    echo '<span class="posted-on">' . get_the_date() . '</span>';
?>
                </div><!-- .entry-meta -->
            <?php
endif; ?>

            <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
        </header><!-- .entry-header -->

        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->

        <footer class="entry-footer">
            <a href="<?php the_permalink(); ?>" class="btn-read-more">
                <?php esc_html_e('Read More', 'prime-capital-institution-suite'); ?>
            </a>
        </footer><!-- .entry-footer -->
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
