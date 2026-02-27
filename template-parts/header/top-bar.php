<?php
/**
 * Template part for displaying the top bar
 *
 * @package prime_capital_institution_suite
 */

if (!is_active_sidebar('top-bar-left') && !is_active_sidebar('top-bar-right')) {
    return;
}
?>

<div class="top-bar">
    <div class="container top-bar-inner">
        <div class="top-bar-left">
            <?php dynamic_sidebar('top-bar-left'); ?>
        </div>
        
        <div class="top-bar-right">
            <?php dynamic_sidebar('top-bar-right'); ?>
        </div>
    </div>
</div>
