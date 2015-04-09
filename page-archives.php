<?php
/**
 * The template for displaying all pages.
 *
 *	Template Name: Page Archive
 * @package Elo
 */

get_header(); ?>

	<!-- main begin -->
	<div id="main">
		<div id="primary">

			<div id="content" class="wrap">

				<div class="page-title">
					<h2>table of content</h2>
				</div>

				<div id="content-list">
					<ul>

					<?php 
					// the query
					$args = array( 'post_type' => 'post', 'posts_per_page' => -1, 'post_status' =>'publish' );
					$the_query = new WP_Query( $args ); ?>

					<?php if ( $the_query->have_posts() ) : ?>

						<!-- the loop -->
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<li>
								<div class="category-list">
									<?php
										$categories = get_the_category();
										$separator = ' ';
										$output = '';
										if($categories){
											foreach($categories as $category) {
												$output .= '<a class="category-list" href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'elo' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
											}
										echo trim($output, $separator);
										}
									?>
								</div>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								<?php echo word_count(the_excerpt(), '30');?>
								<p class="meta"><span><?php the_time(get_option('date_format')); ?></span></p>
							</li>
						<?php endwhile; ?>
						<!-- end of the loop -->

						<?php wp_reset_postdata(); ?>

					<?php else : ?>
						<p><?php _e( 'Sorry, no posts matched your criteria.', 'elo' ); ?></p>
					<?php endif; ?>

					</ul>

				</div>
	
			</div>
		</div>
	</div>
	<!-- main end -->

<?php get_footer(); ?>

		
