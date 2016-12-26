<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Elo
 */
?>
			<!-- widget begin -->
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div class="widget-wrapper">
				<div class="widget-inner clearfix">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div>
			</div>
			<?php endif; ?>
			<!-- widget end -->

			<!-- footer begin-->
			<footer id="footer">
				<div class="wrap">
					<p><?php printf( __( 'Powered by %s &amp; %s', 'elo' ), '<a href="http://wordpress.org/">WordPress</a>', '<a href="http://arifriyanto.com/portfolio/elo/">Elo Theme</a>' ); ?></p>
				</div>
			</footer>
			<!-- footer end-->

		</div>
	</div>

	<div class="overlay overlay-door">
		<button type="button" class="overlay-close">Close</button>
		<nav>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav>
	</div>

	<?php wp_footer(); ?>

</body>
</html>
