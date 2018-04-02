<?php

/*
Template Name: Page - Home
*/

get_header();

?>
		
	<?php the_showcase(); ?>

	<div class="wrap group">

		<?php the_thumb_showcase(); ?>

		<div class="home-thirds">

			<div class="third events">
				<h2><span>Events</span></h2>
				<div class="third-content">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('home-events')) : ?>[events widget]<?php endif; ?>
				</div>
				<button class="home-third-button link-events" data-url="/events"><span>All Events</span></button>
				<div class="clearfix"></div>
			</div>

			<div class="third news">
				<h2><span>News</span></h2>
				<div class="third-content">
					<?php
					query_posts( array(
						'cat' => '26',
						'posts_per_page' => 5
					) );
					if ( have_posts() ) {
						$num = 1;
						while ( have_posts() ) {
							the_post();
							?>
					<article<?php print ( $num == 1 ? ' class="first"' : '' ); ?>>
						<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
						<?php the_excerpt() ?>
					</article>
							<?php
							$num++;
						} // end while
					} // end if
					wp_reset_query();
					?>
				</div>
				<button class="home-third-button link-news" data-url="/press-room/press-room-archive/"><span>All News</span></button>
				<div class="clearfix"></div>
			</div>

			<div class="third tweets">
				<h2><span>Tweets</span></h2>
				<div class="third-content">
				<?php 

				/*
				if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('home-twitter')) : ?>[twitter widget]<?php endif;
				*/

				// twitter aggregator args array
				$twitter_aggregator_args = array(
					'consumer_key' => "3H0lXZUGwyDmpd9b9patp6Bz5",
					'consumer_secret' => "zGETVWIRYonPwU4lTuBaRX9MEyYaPejYFmbJGyrgh8XFRFzOtR",
					'oauth_access_token' => "29196496-I6rK6vinfzTBTNHc3fK9cg2x2alwo3kLUQVMrfEye",
					'oauth_access_token_secret' => "2w3f47FY3blPAWzZmz1EK9ZEgyiz1AX1nIlG3gSkcAq7S",
					'usernames' => "leagueofsecus,MY_LEVERAGE,ALCreditUnions,FLCreditUnions",
					'limit' => 30
				);

				// output twitter widget
				twitter_aggregator_widget( $twitter_aggregator_args );

				?>
				</div>
				<button class="home-third-button twitter" data-url="https://twitter.com/leagueofsecus"><span>Read More Tweets</span></button>
				<div class="clearfix"></div>
			</div>

		</div>

	</div>
		
	<?php the_footer_showcase(); ?>

<?php 

get_footer();

?>