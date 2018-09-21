<?php

get_header();

$color = get_cmb_value( 'large-title-color' );
if ( empty( $color ) ) $color = 'navy';

?>

	<?php 
	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
	<div class="large-title bg-teal">
		<div class="wrap">
			<div class="large-title-text">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>

	<div id="content" class="wrap group content-two-column <?php print $color; ?>" role="main">
		<div class="quarter sidebar">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-forum') ) : ?><!-- no sidebar --><?php endif; ?>
		</div>
		<div class="three-quarter">
			<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
			    <?php 
			    if ( function_exists( 'bcn_display' ) ) {
			        bcn_display();
			    }
			    ?>
			</div>
			<?php the_content(); ?>
		</div>
	</div><!-- #content -->
			<?php
		endwhile;
	endif;
	?>

<?php

get_footer();

?>