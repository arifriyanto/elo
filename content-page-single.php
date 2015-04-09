<?php
/**
 * @package Elo
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<h1 class="entry-title">
			<?php the_title(); ?>
		</h1>
	</div>
	<div class="entry-meta">
	</div>
	<div class="entry-content">									

		<?php the_content(); ?>	
		
	</div>	
	<?php edit_post_link( __( 'Edit', 'elo' ), '<span class="edit-link">', '</span>' ); ?>
</article>
