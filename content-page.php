<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Elo
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<h1 class="entry-title">
			<?php the_title(); ?>
		</h1>
	</div>
	
	<?php echo elo_posted_by(); ?>
	
	<div class="entry-content">									

		<?php the_content(); ?>	

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links"><span class="page-links-title">'. __( 'Pages:', 'elo' ) .'</span>',
				'after'  => '</div>',
				'pagelink' => '<span class="page-link">%</span>'
			) );
		?>
		
	</div>	
	<?php edit_post_link( __( 'Edit', 'elo' ), '<span class="edit-link">', '</span>' ); ?>
</article>
