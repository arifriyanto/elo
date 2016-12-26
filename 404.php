<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Elo
 */

get_header(); ?>

<!-- main begin -->
<div id="main">
	<div id="primary">

		<div id="content" class="wrap">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'elo' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'elo' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</div>
	</div>
</div>
<!-- main end -->

<?php get_footer(); ?>
