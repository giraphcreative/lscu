<?php
/**
 * The template for displaying Archive pages
 */

get_header(); 

if ( isset( $_REQUEST['event_category'] ) ) {
	$category_info = get_term_by( 'id', $_REQUEST['event_category'], 'event_cat' );
	$page_title = $category_info->name;
} else {
	$page_title = "Education Calendar";
}

?>
	<div class="large-title bg-lime">
		<div class="wrap">
			<div class="large-title-icon bg-lime" style="background-image: url(<?php print get_bloginfo('template_url') . '/img/event-image.png' ?>);">
				<div class="hex1"></div>
				<div class="hex2"></div>
			</div>
			<div class="large-title-text">
				<h1><?php print $page_title; ?></h1>
			</div>
		</div>
	</div>
	
	<div id="content" class="wrap content-wide" role="main">
		<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
		    <span><a href="<?php home_url() ?>" class="home">LSCU</a></span> &gt; <span><span><?php print $page_title; ?></span></span>
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