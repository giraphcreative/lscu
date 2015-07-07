<?php
/**
 * The template for displaying Archive pages
 */

get_header(); 

?>
	<div class="large-title bg-lime">
		<div class="wrap">
			<div class="large-title-icon bg-lime" style="background-image: url(<?php print get_bloginfo('template_url') . '/img/event-image.png' ?>);">
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
		<p><strong>Filter by Event Type:</strong> <?php filter_by_event_type(); ?></p>
		<br>
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