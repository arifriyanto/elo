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
	
	<?php echo elo_categories_link(); ?>

	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	<?php the_excerpt(); ?>
	<p class="meta"><span><a href="<?php the_permalink(); ?>"><?php the_time(get_option('date_format')); ?></a></span></p>
</li>

<?php } else { ?>
<li <?php post_class(); ?>>
	
	<?php echo elo_categories_link(); ?>
	
	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	<?php the_excerpt(); ?>
	<p class="meta"><span><a href="<?php the_permalink(); ?>"><?php the_time(get_option('date_format')); ?></a></span></p>
</li>
<?php } ?>
