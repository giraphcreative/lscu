<?php

/*
Template Name: Page - Home
*/

get_header();

?>

	<div class="showcase">
		
		<?php the_showcase(); ?>

	</div>

	<div class="wrap group">

		<div class="featured-products">
			<div class="products">
				<div class="product-list">
					<?php the_product_list( '', true ); ?>
				</div>
				<button class="product-nav previous">Previous</button>
				<button class="product-nav next">Next</button>
			</div>
		</div>
	

		<div class="home-thirds">

			<div class="third news">
				<h2><span>The Link <span>News</span></span></h2>
				<?php
				query_posts( 'posts_per_page=3' );
				if ( have_posts() ) {
					$num = 1;
					while ( have_posts() ) {
						the_post();
						?>
				<article<?php print ( $num == 1 ? ' class="first"' : '' ); ?>>
					<h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
					<?php the_excerpt() ?>
				</article>
						<?php
						$num++;
					} // end while
				} // end if
				?>
				<button class="home-third-button link-news"><span>All Link News</span></button>
				<div class="clearfix"></div>
			</div>

			<div class="third match">
				<h2><span>CU <span>Matchup</span></span></h2>
				<article>
					<h4><a href="#">Looking for new ideas? Need a new income source?</a></h4>
					<p>Use our CU Match Up Tool to find the best partners to help you increase non-interest income, help with collections, save on operating expenses and more!</p>
				</article>
				<button class="home-third-button cu-match"><span>Find Your Match</span></button>
				<div class="clearfix"></div>
			</div>

			<div class="third events">
				<h2><span>Upcoming Link <span>Events</span></span></h2>
				<article class="first">
					<h4><a href="#">An Event Title</a></h4>
					<p>January 3, 2015  3:00P - 4:00PM</p>
				</article>
				<article>
					<h4><a href="#">An Event Title</a></h4>
					<p>January 3, 2015  3:00P - 4:00PM</p>
				</article>
				<button class="home-third-button link-events"><span>All Link Events</span></button>
				<div class="clearfix"></div>
			</div>

		</div>

	</div>
<?php 

get_footer();

?>