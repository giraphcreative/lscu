<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); 

?>

	<div id="content" class="wrap groupcontent-two-column" role="main">
		<div class="quarter">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-404') ) : ?><!-- no sidebar --><?php endif; ?>
		</div>
		<div class="three-quarter">
			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not Found', 'twentyfourteen' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyfourteen' ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .page-content -->
		</div>
	</div><!-- #content -->

<?php

get_footer();

?>