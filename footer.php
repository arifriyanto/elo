<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Elo
 */
?>

			<!-- footer begin-->
			<footer id="footer">
				<div class="wrap">
					<p>Crafted from Borobudur with a cup of <span class="red">&hearts;</span> by Arif Riyanto</p>
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


	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/classie.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/menu.js"></script>

	<?php wp_footer(); ?>

</body>
</html>
