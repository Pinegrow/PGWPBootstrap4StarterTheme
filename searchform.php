<?php
/**
 * The template for displaying search forms in Underscores.me
 * Customized for Pinegrow ST2
 * Removed <label class="assistive-text" for="s"><?php esc_html_e( 'Search', 'st2' ); ?></label>
 */

?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">

	<div class="input-group">
		<input class="field form-control" id="s" name="s" type="text"
			placeholder="<?php esc_attr_e( 'Search &hellip;', 'st2' ); ?>" value="<?php the_search_query(); ?>">
		<span class="input-group-append">
			<input class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit"
			value="<?php esc_attr_e( 'Search', 'st2' ); ?>">
	</span>
	</div>
</form>
