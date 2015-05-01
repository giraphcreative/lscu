<?php
/**
 * The template for displaying Archive pages
 */

get_header(); 

?>
	<div class="large-title bg-grey-light">
		<div class="wrap">
			<div class="large-title-icon">
				<img src="/wp-content/uploads/2015/03/h.jpg">
			</div>
			<div class="large-title-text">
				<h1>CU Job Center</h1>
			</div>
		</div>
	</div>

	<div id="content" class="wrap groupcontent-two-column" role="main">
		<div class="quarter">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-jobs') ) : ?><!-- no sidebar --><?php endif; ?>
		</div>
		<div class="three-quarter">
			<?php 
			if ( have_posts() ) : 
				// Start the Loop.
				while ( have_posts() ) : the_post(); 
					?>
			<div class="entry-job">
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt(); ?>
			</div>
					<?php
				endwhile;
			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );
			endif;
			?>
		</div>
	</div><!-- #content -->


	</section><!-- #primary -->

<?php

get_footer();

?>