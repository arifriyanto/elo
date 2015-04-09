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

					<?php //the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<?php if ( elo_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
					<div class="widget widget_categories">
						<ul>
						<?php
							// wp_list_categories( array(
							// 	'orderby'    => 'count',
							// 	'order'      => 'DESC',
							// 	'show_count' => 1,
							// 	'title_li'   => '',
							// 	'number'     => 10,
							// ) );
						?>
						</ul>
					</div><!-- .widget -->
					<?php endif; ?>

					<?php
						/* translators: %1$s: smiley */
						//$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'elo' ), convert_smilies( ':)' ) ) . '</p>';
						//the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>

					<?php //the_widget( 'WP_Widget_Tag_Cloud' ); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</div>
	</div>
</div>
<!-- main end -->

<?php get_footer(); ?>
