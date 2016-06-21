<?php


function the_accordion() {

	$accordion_location = get_cmb_value( 'accordion_location' );

	// get the slides
	$boxes = get_post_meta( get_the_ID(), CMB_PREFIX . "accordion", 1 );

	if ( !empty( $boxes ) ) {
		?>
		<div class="accordion">
		<?php
		$count = 0;
		foreach ( $boxes as $key => $box ) {
			if ( !empty( $box["title"] ) && !empty( $box["content"] ) && empty( $box["hide"] ) ) {

				// store the title and subtitle
				$title = ( isset( $box["title"] ) ? $box["title"] : '' );
				$color = ( isset( $box["color"] ) ? $box["color"] : 'teal' );
				$state = ( isset( $box["state"] ) ? $box["state"] : 'closed' );
				$content = ( isset( $box["content"] ) ? $box["content"] : '' );
				$content = apply_filters( 'the_content', $content );

				?>
			<div class="accordion-box<?php print ( $state == 'open' ? ' open' : '' ); ?> bg-<?php print $color ?>">
				<div class="accordion-box-title<?php print ( $state == 'open' ? ' open' : '' ); ?>">
					<?php if ( $accordion_location == 'bottom' ) { ?><div class="wrap"><?php } ?>
					<h4><?php print $title ?></h4>
					<?php if ( $accordion_location == 'bottom' ) { ?></div><?php } ?>
				</div>
				<div class="accordion-box-content">
					<?php if ( $accordion_location == 'bottom' ) { ?><div class="wrap"><?php } ?>
					<?php print wpautop( $content ); ?>
					<?php if ( $accordion_location == 'bottom' ) { ?></div><?php } ?>
				</div>
			</div>
				<?php
				$count++;
			}
		}
		?>
		</div>
		<?php
	}
}


?>