<?php
/**
 * The sidebar containing the main widget area.
 * sidebar.php is required by WordPress core since version 3.0.0
 * https://developer.wordpress.org/reference/functions/dynamic_sidebar/
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-md-4 widget-area" id="secondary" role="complementary">

	<?php dynamic_sidebar( 'sidebar-1' ); ?>

</div>