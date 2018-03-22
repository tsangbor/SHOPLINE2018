<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package shopline2018
 */

if ( ! is_active_sidebar( 'copyright-1' ) ) {
	return;
}
?>

<aside class="copyright-1">
	<?php if( is_active_sidebar('copyright-1') ): ?>
	    <?php dynamic_sidebar('copyright-1'); ?>
	<?php endif; ?>
</aside>