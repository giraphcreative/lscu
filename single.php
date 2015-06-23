<?php
/**
 * The Template for displaying all single posts
 */

get_header();

?>
	<div id="primary" class="site-content">

		<div id="content" class="site-content content-narrow" role="main">
			<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
			    <?php 
			    if ( function_exists( 'bcn_display' ) ) {
			        bcn_display();
			    }
			    ?>
			</div>
		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				?>
				<h1><?php the_title(); ?></h1>
				<p class="post-meta">Posted <?php the_date(); ?> in <?php the_category(', '); ?></p>
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