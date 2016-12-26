<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elo
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
		<?php the_excerpt(); ?>
		<p class="meta"><span><?php the_time(get_option('date_format')); ?></span></p>
	</li>
</article><!-- #post-## -->