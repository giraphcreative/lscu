<?php


function the_photo_gallery() {
	
	$photos = get_cmb_value( 'gallery' );

	?>
	<div class="photo-gallery">
	<?php

	if ( !empty( $photos ) ) {

		// The Loop
		foreach ( $photos as $photo ) {
			?><div class="photo"><a href="<?php print $photo['image']; ?>" title="<?php print $photo['alt'] ?>"><img src="<?php print p_image_resize( $photo['image'], 400, 400, 1, 1 ) ?>" alt="<?php print $photo['alt'] ?>" /></a></div><?php
		}

	}

	?>
	</div>
	<?php

}


?>