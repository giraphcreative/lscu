

// tab controls
jQuery(document).ready(function($){

	if ( $( '.day-event-list' ).length ) {

		// clicks of the majors tab
		$( 'table.calendar td' ).click(function(){
			$( '.day-event-list' ).html( $(this).find( '.day-events' ).html() );
		});

	}

});

