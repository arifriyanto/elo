<?php
/**
 * @package Elo
 */
?>

<?php 
if ( has_post_thumbnail() ) {
	$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
?>

<li <?php post_class(); ?> style="background: url( <?php echo $feat_image; ?>) no-repeat center center; background-size: cover;">
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
	<p class="meta"><span><a href="<?php the_permalink(); ?>"><?php the_time(get_option('date_format')); ?></a></span></p>
</li>

<?php } else { ?>
<li <?php post_class(); ?>>
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
	<p class="meta"><span><a href="<?php the_permalink(); ?>"><?php the_time(get_option('date_format')); ?></a></span></p>
</li>
<?php } ?>
