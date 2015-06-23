<?php
/**
 * The template for displaying Archive pages
 */

get_header(); 

?>
	<div class="large-title bg-grey-light">
		<div class="wrap">
			<div class="large-title-icon bg-grey-light" style="background-image: url(<?php print p_image_resize( get_bloginfo('home') . '/wp-content/uploads/2015/03/h.jpg', 300, 300, true ) ?>);">
				<div class="hex1"></div>
				<div class="hex2"></div>
			</div>
			<div class="large-title-text">
				<h1>Education Calendar</h1>
			</div>
		</div>
	</div>
	
	<div id="content" class="wrap content-wide" role="main">
		<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
		    <span><a href="<?php home_url() ?>" class="home">LSCU</a></span> &gt; <span><span>Education Calendar</span></span>
		</div>
		<?php 

		// get URL parameters and default to current month.
		$month = ( isset( $_REQUEST['mo'] ) ? $_REQUEST['mo'] : date( "n" ) );
		$year = ( isset( $_REQUEST['yr'] ) ? $_REQUEST['yr'] : date( "Y" ) );

		// output month
		show_month_events( $month, $year );

		?>
	</div><!-- #content -->

<?php

get_footer();

?>