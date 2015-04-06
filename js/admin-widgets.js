

jQuery(function($) {
	mediaControl = {
		// Initializes a new media manager or returns an existing frame.
		// @see wp.media.featuredImage.frame()
		frame: function() {
			if ( this._frame )
				return this._frame;
 
			this._frame = wp.media({
				title: 'Frame Title',
				library: {
					type: 'image'
				},
				button: {
					text: 'Button Text'
				},
				multiple: false
			});
			
			this._frame.on( 'open', this.updateFrame ).state('library').on( 'select', this.select );
			
			return this._frame;
		},
		
		select: function() {
			// Do something when the "update" button is clicked after a selection is made.
		},
		
		updateFrame: function() {
			// Do something when the media frame is opened.
		},
		
		init: function() {
			$('#wpbody').on('click', '.blazersix-media-control-choose', function(e) {
				e.preventDefault();
				
				mediaControl.frame().open();
			});
		}
	};
	
	mediaControl.init();
});

