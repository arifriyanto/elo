<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elo
 */

get_header(); ?>


			<!-- main begin -->
			<div id="main" class="home">
				<div id="primary">

					<?php elo_cover_page(); ?>

					<div id="content" class="wrap">
						<div class="content-title">
							<h2><?php _e( 'table of contents', 'elo' ); ?></h2>
						</div>
						<div id="content-list">
							<ul>
								<!-- the loop -->
								<?php while ( have_posts() ) : the_post(); ?>

									<?php
										/* Include the Post-Format-specific template for the content.
										 * If you want to override this in a child theme, then include a file
										 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
										 */
										get_template_part( 'content', get_post_format() );
									?>

								<?php endwhile; ?>
								<!-- end of the loop -->
							</ul>

						</div>

						<?php elo_paging_nav(); ?>
					</div>
				</div>
			</div>
			<!-- main end -->

<?php get_footer(); ?>
