<?php

get_header();

?>

	<?php the_large_title(); ?>

	<?php the_showcase(); ?>
	<div id="content" class="wrap group content-two-column" role="main">
		<div class="quarter sidebar">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-generic') ) : ?><!-- no sidebar --><?php endif; ?>
			<a href="http://leverage.giraphprojects.com/"><div class="widget leverage"><div class="widget-title"><h4>Leverage</h4></div></div></a>
		</div>
		<div class="three-quarter">
			<?php 
			if ( have_posts() ) :
				while ( have_posts() ) : the_post(); 
					the_content();
				endwhile;
			endif;
			?>
			<?php
			the_accordion();
			?>
		<?php if ( has_cmb_value( 'left_content' ) ) { ?></div><?php } ?>
	</div><!-- #content -->

<?php

get_footer();

?>