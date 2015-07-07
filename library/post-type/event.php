<?php


// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'flush_rewrite_rules' );


//add_filter('query_vars', 'parameter_queryvars' );
function parameter_queryvars( $qvars ) {
	$qvars[] = ' price';
	$qvars[] = ' name';
	$qvars[] = ' qty';
	return $qvars;
}



// let's create the function for the custom type
function lscu_events() { 

	// creating (registering) the custom type 
	register_post_type( 'event', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 
			'labels' => array(
				'name' => __( 'Events', 'ptheme' ), /* This is the Title of the Group */
				'singular_name' => __( 'Event', 'ptheme' ), /* This is the individual type */
				'all_items' => __( 'All Events', 'ptheme' ), /* the all items menu item */
				'add_new' => __( 'Add New', 'ptheme' ), /* The add new menu item */
				'add_new_item' => __( 'Add New Event', 'ptheme' ), /* Add New Display Title */
				'edit' => __( 'Edit', 'ptheme' ), /* Edit Dialog */
				'edit_item' => __( 'Edit Event', 'ptheme' ), /* Edit Display Title */
				'new_item' => __( 'New Event', 'ptheme' ), /* New Display Title */
				'view_item' => __( 'View Event', 'ptheme' ), /* View Display Title */
				'search_items' => __( 'Search Event', 'ptheme' ), /* Search Custom Type Title */ 
				'not_found' =>  __( 'Nothing found in the database.', 'ptheme' ), /* This displays if there are no entries yet */ 
				'not_found_in_trash' => __( 'Nothing found in Trash', 'ptheme' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Manage the events listed on the site.', 'ptheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/img/icon-admin-event.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 
				'slug' => 'event-new', 
				'with_front' => false 
			), /* you can specify its url slug */
			'has_archive' => 'events-new', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'excerpt' )
		) /* end of options */
	); /* end of register post type */
	
}


// adding the function to the Wordpress init
add_action( 'init', 'lscu_events');



// now let's add custom categories (these act like categories)
register_taxonomy( 'event_cat', 
	array( 'event' ), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true, it acts like categories */
		'labels' => array(
			'name' => __( 'Event Categories', 'ptheme' ), /* name of the custom taxonomy */
			'singular_name' => __( 'Event Category', 'ptheme' ), /* single taxonomy name */
			'search_items' =>  __( 'Search Event Categories', 'ptheme' ), /* search title for taxomony */
			'all_items' => __( 'All Event Categories', 'ptheme' ), /* all title for taxonomies */
			'parent_item' => __( 'Parent Event Category', 'ptheme' ), /* parent title for taxonomy */
			'parent_item_colon' => __( 'Parent Event Category:', 'ptheme' ), /* parent taxonomy title */
			'edit_item' => __( 'Edit Event Category', 'ptheme' ), /* edit custom taxonomy title */
			'update_item' => __( 'Update Event Category', 'ptheme' ), /* update title for taxonomy */
			'add_new_item' => __( 'Add New Event Category', 'ptheme' ), /* add new title for taxonomy */
			'new_item_name' => __( 'New Event Category Name', 'ptheme' ) /* name title for taxonomy */
		),
		'show_admin_column' => true, 
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 
			'slug' => 'events'
		)
	)
);



function get_day_events( $m, $d, $y ) {

	$args = array(
		'meta_query' => array(
			'relation' => 'OR',
			array(
				'relation' => 'AND',
				array(
					'key' => '_p_event_start',
					'value' => mktime( 0, 0, 0, $m, $d, $y ),
					'compare' => '>='
				),
				array(
					'key' => '_p_event_start',
					'value' => mktime( 23, 59, 59, $m, $d, $y ),
					'compare' => '<='
				)
			),
			array(
				'relation' => 'AND',
				array(
					'key' => '_p_event_end',
					'value' => mktime( 0, 0, 0, $m, $d, $y ),
					'compare' => '>='
				),
				array(
					'key' => '_p_event_end',
					'value' => mktime( 23, 59, 59, $m, $d, $y ),
					'compare' => '>='
				)
			),
			array(
				'relation' => 'AND',
				array(
					'key' => '_p_event_start',
					'value' => mktime( 0, 0, 0, $m, $d, $y ),
					'compare' => '<='
				),
				array(
					'key' => '_p_event_end',
					'value' => mktime( 23, 59, 59, $m, $d, $y ),
					'compare' => '>='
				)
			)
		),
		'post_type' => 'event',
		'orderby' => 'name',
		'posts_per_page' => 100
	);

	$event_query = new WP_Query( $args );
	$events = $event_query->get_posts();

	wp_reset_query();
	
	return $events;

}



function get_month_events( $m, $y ) {

	$timestamp_start = mktime( 0, 0, 0, $m, 1, $y );
	$timestamp_end = mktime( 23, 59, 59, $m, date( 't', $timestamp_start ), $y );

	$args = array(
		'meta_query' => array(
			'relation' => 'AND',
			array(
				'key' => '_p_event_start',
				'value' => $timestamp_start,
				'compare' => '>='
			),
			array(
				'key' => '_p_event_start',
				'value' => $timestamp_end,
				'compare' => '<='
			)
		),
		'post_type' => 'event',
		'orderby' => 'name',
		'posts_per_page' => 100
	);

	if ( isset( $_GET['event_category'] ) ) {
		$event_cat = get_term( $_GET['event_category'], 'event_cat' );
		$args[ 'event_cat' ] = $event_cat->slug;
	}

	$event_query = new WP_Query( $args );
	$events = $event_query->get_posts();

	foreach ( $events as $key => $event ) {
		$event_info = array();
		$event_info = get_post_custom( $event->ID );

		foreach ( $event_info as $info_key => $info_item ) {		
			$events[$key]->$info_key = $info_item[0];
		}
	}

	wp_reset_query();
	
	return $events;

}



function get_previous_month( $month, $year ) {
	if ( $month == 1 ) {
		return array( 'month' => 12, 'year' => $year-1 );
	} else {
		return array( 'month' => $month-1, 'year' => $year );
	}
}



function get_next_month( $month, $year ) {
	if ( $month == 12 ) {
		return array( 'month' => 1, 'year' => $year+1 );
	} else {
		return array( 'month' => $month+1, 'year' => $year );
	}
}



// show month events
function show_month_events( $month, $year ) {

	$event_list_url = "/events-new";

	// let's make an empty calendar
	$calendar = '';

	// get the events for the month.
	$events = get_month_events( $month, $year );

	// show next and previous month links.
	$prev = get_previous_month( $month, $year );
	$prev_ts = mktime( 0, 0, 0, $prev['month'], 1, $prev['year'] );
	$next = get_next_month( $month, $year );
	$next_ts = mktime( 0, 0, 0, $next['month'], 1, $next['year'] );
	$calendar .= '<a href="' . $event_list_url . "?mo=" . $prev['month'] . '&yr=' . $prev['year'] . '" class="month-nav previous">&laquo; ' . date( "F", $prev_ts ) . '</a>';
	$calendar .= '<a href="' . $event_list_url . "?mo=" . $next['month'] . '&yr=' . $next['year'] . '" class="month-nav next">' . date( "F", $next_ts ) . ' &raquo;</a>';

	// add month title
	$calendar .= '<h2 class="calendar-month-title">' . date( 'F Y', mktime( 0, 0, 0, $month, 1, $year ) ) . "</h2>";

	// open the table tags
	$calendar .= '<table cellpadding="0" cellspacing="0" class="calendar">';

	// day titles
	$headings = array('Sun<span>day</span>','Mon<span>day</span>','Tue<span>sday</span>','Wed<span>nesday</span>','Thu<span>rsday</span>','Fri<span>day</span>','Sat<span>urday</span>');
	$calendar .= '<tr class="calendar-row"><td class="calendar-day-head">' . implode('</td><td class="calendar-day-head">', $headings ) . '</td></tr>';

	// days and weeks vars now ...
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	// row for week one
	$calendar .= '<tr class="calendar-row">';

	// print "blank" days until the first of the current week
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	// keep going with days....
	for ( $list_day = 1; $list_day <= $days_in_month; $list_day++ ) :

		// loop through all the events and list them for this day.
		$day_events = '';
		foreach ( $events as $event ) {
			if ( ( $event->_p_event_start > $day_start && $event->_p_event_start < $day_end ) || 
				 ( $event->_p_event_end > $day_end && $event->_p_event_end < $day_end ) || 
				 ( $event->_p_event_start < $day_start && $event->_p_event_end > $day_end ) ) {
				$day_events .= "<div class='event-title'><a href=\"" . ( !empty( $event->_p_event_website ) ? $event->_p_event_website : get_permalink( $event->ID ) ) . "\">" . $event->post_title . "</a></div><div class='event-time'>" . date( "n/j g:i a", $event->_p_event_start ) . " - " . date( "g:i a", $event->_p_event_end ) . "</div><div class='event-description'>" . $event->post_excerpt . "</div>";
			}
		}

		// let's check the start and end of the day
		$day_start = mktime( 0, 0, 0, $month, $list_day, $year );
		$day_end = mktime( 23, 59, 59, $month, $list_day, $year );

		// start building out the day.
		$calendar .= '<td class="calendar-day">';

		// add in the day number 
		$calendar.= '<div class="day-number">' . ( !empty( $day_events ) ? "<strong>" : '' ) . $list_day . ( !empty( $day_events ) ? "</strong>" : '' ) . '</div>';

		// start listing events in their own div
		$calendar .= '<div class="day-events">';

		// loop through all the events and list them for this day.
		$calendar .= $day_events;

		// close the day list
		$calendar .= '</div>';
		
		// close the table cell
		$calendar.= '</td>';

		// end row if it's the end of the week.
		if ( $running_day == 6 ) :
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;

	endfor;

	// finish the rest of the days in the week
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	// end final row
	$calendar.= '</tr>';

	// close the table
	$calendar.= '</table>';

	// add an empty div to populate event list into (for use on mobile).
	$calendar .= '<div class="day-event-list"></div>';
	
	/* all done, return result */
	print $calendar;

}




function filter_by_event_type() {

	wp_dropdown_categories( array(
		'show_option_all' => 'All Event Categories',
		'orderby' => 'NAME', 
		'taxonomy' => 'event_cat',
		'class' => 'event-category',
		'selected' => ( isset( $_GET['event_category'] ) ? $_GET['event_category'] : 0 )
	) );

}



function duration( $start, $end ) {
	// get duration in seconds
	$duration_seconds = $end - $start;

	// calculate days, then hours, then minutes
	$days = floor( $duration_seconds / 86400 );
	$hours = floor( ( $duration_seconds - ( $days * 86400 ) ) / 3600 );
	$minutes = floor( ( $duration_seconds - ( $days * 86400 ) - ( $hours * 3600 ) ) / 60 );

	$time_string_parts = array();
	if ( $days > 0 ) $time_string_parts[] = $days . ' day' . ( $days > 1 ? 's' : '' );
	if ( $hours > 0 ) $time_string_parts[] = $hours . ' hour' . ( $hours > 1 ? 's' : '' );
	if ( $minutes > 0 ) $time_string_parts[]= $minutes . ' minute' . ( $minutes > 1 ? 's' : '' );

	return implode( ", ", $time_string_parts );
}



?>