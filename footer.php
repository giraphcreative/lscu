<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>	
	
	</div>

</section>

<footer class="footer">
	<div class="column first">
		<h3>Connect With Us</h3>
		<p class="address">22 Inverness Cntr Pky, #200<br>
			Birmingham, Alabama 35242</p>
		<p class="address">3692 Coolidge Court<br>
			Tallahassee, Florida 32311</p>
		<p><a href="tel:8662310545">866.231.0545</a></p>
		<div class="social">
			<a href="https://twitter.com/LeagueofSECUs" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/img/social-twitter.png"></a><a href="https://www.facebook.com/LeagueofSoutheasternCreditUnions?ref=hl" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/img/social-facebook.png"></a><!--<a href="https://plus.google.com/112181843990266909206/posts" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/img/social-google.png"></a>--><a href="https://www.linkedin.com/company/779108?trk=tyah&trkInfo=clickedVertical%3Acompany%2Cidx%3A1-1-1%2CtarId%3A1428961587176%2Ctas%3Aleague+of+southea" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/img/social-linkedin.png"></a><a href="https://www.youtube.com/user/LeagueofSECUs" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/img/social-youtube.png"></a><!--<a href="https://www.pinterest.com/LSCUCOM/2015-southeast-credit-union-conference-expo/" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/img/social-pinterest.png"></a>-->
		</div>
	</div>
	<div class="column">
		<h3>Links</h3>
		<nav role="navigation">
			<?php wp_nav_menu( array( 
				'theme_location' => 'footer', 
				'menu_class' => 'nav-menu' ) 
			); ?>
		</nav>
		<a href="http://www.cuna.org/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/logo-cuna.png" class="cuna"></a>
	</div>
	<div class="column last">
		<h3>Sign Up For News</h3>
		<div class="subscribe">
			<?php print do_shortcode( '[snippet slug="subscribe" /]' ); ?>
		</div>
	</div>
</footer><!-- #colophon -->

<?php 

do_interstitial();

wp_footer(); 

?>
</body>
</html>