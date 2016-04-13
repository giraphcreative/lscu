<?php


function the_showcase() {

	// get the slides
	$slides = get_post_meta( get_the_ID(), CMB_PREFIX . "showcase", 1 );

	if ( !empty( $slides ) ) {
		?>
		<div class="showcase">
		<?php
		$count = 0;
		foreach ( $slides as $key => $slide ) {
			if ( !empty( $slide["image"] ) ) {

				// store the title and subtitle
				$title = ( isset( $slide["title"] ) ? $slide["title"] : '' );
				$subtitle = ( isset( $slide["subtitle"] ) ? $slide["subtitle"] : '' );
				$link = ( isset( $slide["link"] ) ? $slide["link"] : '' );

				// check if it's an image or video
				if ( p_is_image( $slide["image"] ) ) {
					// it's an image, so resize it and generate an img tag.
					$image = '<img src="' . $slide["image"] . '" alt="' . ( !empty( $slide['title'] ) ? $slide['title'] : '' ) . '">';
				} else {
					// it's a video, so oEmbed that stuffs, yo
					$image = apply_filters( 'the_content', $slide["image"] );
				}

				?>
			<div class="slide<?php print ( $key == 0 ? ' visible' : '' ); ?>">
				<?php if ( !empty( $link ) ) { ?><a href="<?php print $link ?>" class="<?php print ( stristr( $link, 'vimeo' ) || stristr( $link, 'youtube' ) || stristr( $link, 'google.com/maps' ) && stristr( $link, '/channel' ) ? 'lightbox-iframe' : '' ) ?>"><?php } ?>
				<?php print $image; ?>
				<?php if ( !empty( $link ) ) { ?></a><?php } ?>
			</div>
				<?php
				$count++;
			}
		}

		if ( $count > 1 ) { 
			?>
			<div class="showcase-nav">
				<a class="previous">Previous</a>
				<a class="next">Next</a>
			</div>
			<?php
		}
		?>
		</div>
		<?php
	}
}



// hive listing
function the_thumb_showcase() {

	$thumbs = get_cmb_value( 'thumb_showcase' );
	if ( !empty( $thumbs[0]['title'] ) ) {
		?>
	<div class="thumb-showcase">
		<div class="thumbs">
			<div class="thumb-list">
		<?php
	   	foreach ( $thumbs as $thumb ) {
	        ?><a href="<?php print $thumb['link'] ?>"<?php print ( $thumb['type'] == 'iframe' ? ' class="lightbox-iframe"' : '' ); ?>><div class="thumb">
				<div class="thumb-icon">
					<img src="<?php print $thumb['image']; ?>">
				</div>
				<div class="thumb-text <?php print $thumb['color'] ?>">
					<h3><?php print $thumb['title'] ?></h3>
					<p><?php print $thumb['subtitle'] ?></p>
				</div>
			</div></a><?php
	    }
	    ?>
			</div>
			<button class="thumb-nav previous">Previous</button>
			<button class="thumb-nav next">Next</button>
		</div>
	</div>
		<?php
	}
}



function the_footer_showcase() {

	// get the slides
	$slides = get_cmb_value( "showcase_footer" );

	if ( !empty( $slides ) ) {
		?>
		<div class="showcase footer">
		<?php
		$count = 0;
		foreach ( $slides as $key => $slide ) {
			if ( !empty( $slide["image"] ) ) {

				// store the title and subtitle
				$title = ( isset( $slide["title"] ) ? $slide["title"] : '' );
				$link = ( isset( $slide["link"] ) ? $slide["link"] : '' );
				$icon = ( isset( $slide["icon"] ) ? $slide["icon"] : '' );

				print $icon;
				// check if it's an image or video
				if ( p_is_image( $slide["image"] ) ) {
					// it's an image, so resize it and generate an img tag.
					$image = '<img src="' . $slide["image"] . '">';
				} else {
					// it's a video, so oEmbed that stuffs, yo
					$image = apply_filters( 'the_content', $slide["image"] );
				}

				?>
			<div class="slide<?php print ( $key == 0 ? ' visible' : '' ); ?>">
				<?php if ( !empty( $link ) ) { ?><a href="<?php print $link ?>" class="<?php print ( stristr( $link, 'vimeo' ) || stristr( $link, 'youtube' ) || stristr( $link, 'google.com/maps' ) ? 'lightbox-iframe' : '' ) ?>"><?php } ?>
				<?php print $image; ?>
				<?php if ( !empty( $link ) ) { ?></a><?php } ?>
				
				<?php if ( !empty( $title ) ) { ?>
				<div class="slide-hexagon">
					<?php if ( !empty( $icon ) ) { ?><img src="<?php print $icon; ?>"><?php } ?>					
					<?php if ( !empty( $title ) ) { ?><h1><?php print $title; ?></h1><?php } ?>
				</div>
				<?php } ?>
			</div>
				<?php
				$count++;
			}
		}

		if ( $count > 1 ) { 
			?>
			<div class="showcase-nav">
				<a class="previous">Previous</a>
				<a class="next">Next</a>
			</div>
			<?php
		}
		?>
		</div>
		<?php
	}

}



?>