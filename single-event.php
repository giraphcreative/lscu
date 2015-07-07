<?php
/**
 * The Template for displaying all single posts
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
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>

	<?php the_showcase(); ?>

	<div id="primary" class="site-content">

		<div id="content" class="site-content content-wide wrap group" role="main">
		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				?>
			<div class="two-fifth right event-info">
				<?php 
				// display credit union name
				if ( has_cmb_value( 'event_start' ) ) {
					print "<h3>" . date( "F nS", get_cmb_value( 'event_start' ) ) . "</h3>";
					print "<p>" . date( "g:i a", get_cmb_value( 'event_start' ) );
					if ( has_cmb_value( 'event_end' ) ) {
						print " - " . date( "g:i a", get_cmb_value( 'event_end' ) );
					}
					print " EST<br>";
					print date( "g:i a", get_cmb_value( 'event_start' )-3600 );
					if ( has_cmb_value( 'event_end' ) ) {
						print " - " . date( "g:i a", get_cmb_value( 'event_end' )-3600 );
					}
					print " CST</p>";
				}

				// display the event duration.
				if ( has_cmb_value( 'event_start' ) && has_cmb_value( 'event_end' ) ) {
					print "<p><label>Duration:</label><br>" . duration( get_cmb_value( 'event_start' ), get_cmb_value( 'event_end' ) ) . "</p>";
				}

				// display price
				$early_date = get_cmb_value( 'event_early_date' );
				$early_price = get_cmb_value( 'event_price_early' );
				$regular_price = get_cmb_value( 'event_price' );
				$current_price = ( $early_date < time() ? $early_price : $regular_price );
				$is_early = ( $early_date < time() ? true : false );
				print "<p><label>Price:</label><br>$" . $current_price . ( $is_early ? ' (early registration price)' : '' ) . "</p>";
				print '<p class="text-center"><a href="/event-registration/?event_price=' . $current_price . '&event_name=' . get_the_title() . '&event_qty=1" class="button">Register Now</a></p>';

				// display event venue information
				print ( has_cmb_value( 'event_venue' ) ? '<p><label>Venue:</label><br>' . get_cmb_value( 'event_venue' ) . '</p>' : '' );

				// get address values and display them.
				$address = get_cmb_value( 'event_address' );
				$city = get_cmb_value( 'event_city' );
				$state = get_cmb_value( 'event_state' );
				$zipcode = get_cmb_value( 'event_zipcode' );
				if ( !empty( $address ) && !empty( $city ) && !empty( $state ) && !empty( $zipcode ) ) {
					print "<p>" . $address . "<br>" . $city . ", " . $state . " " . $zipcode . "</p>";

					// gmap embed api key: AIzaSyB0FlglKxf0TJtQZJlbrCa5q836iyMRcYE
					?>
				<p><iframe width="100%" height="250" frameborder="0" style="border: 0;"
				src="https://www.google.com/maps/embed/v1/place?key=AIzaSyB0FlglKxf0TJtQZJlbrCa5q836iyMRcYE
				&q=<?php print urlencode( $address . ", " . $city . ", "  . $state . ", " . $zipcode ) ?>" allowfullscreen></iframe></p>
					<?php
				}
				?>
			</div>
				<?php 
				the_content();
			
			endwhile;
		endif;
		 ?>
		</div><!-- #content -->

	</div><!-- #primary -->
<?php

get_footer();

?>