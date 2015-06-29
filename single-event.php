<?php
/**
 * The Template for displaying all single posts
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
					print "</p>";
				}

				if ( has_cmb_value( 'event_start' ) && has_cmb_value( 'event_end' ) ) {
					print "<p><label>Duration:</label><br>" . duration( get_cmb_value( 'event_start' ), get_cmb_value( 'event_end' ) ) . "</p>";
				}


				// display event venue information
				print ( has_cmb_value( 'event_venue' ) ? '<p><label>Venue:</label><br>' . get_cmb_value( 'event_venue' ) . '</p>' : '' );

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