<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Elo
 */

if ( ! function_exists( 'elo_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function elo_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<!-- <h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'elo' ); ?></h1> -->
		<div class="nav-links clearfix">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'elo' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'elo' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'elo_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function elo_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<!-- <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'elo' ); ?></h1> -->
		<div class="nav-links clearfix">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;Older posts', 'Previous post link', 'elo' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( 'Newer posts <span class="meta-nav">&rarr;</span>', 'Next post link',     'elo' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'elo_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function elo_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( 'Posted on %s', 'post date', 'elo' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( 'by %s', 'post author', 'elo' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function elo_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'elo_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'elo_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so elo_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so elo_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in elo_categorized_blog.
 */
function elo_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'elo_categories' );
}
add_action( 'edit_category', 'elo_category_transient_flusher' );
add_action( 'save_post',     'elo_category_transient_flusher' );

if ( ! function_exists( 'elo_cover_page' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function elo_cover_page() {

	if ( get_header_image() ) : ?>
	<div id="page-cover" style="background: url( <?php echo header_image();?>) no-repeat center center; background-size: cover;">
		<header id="header">
			<div class="wrap">
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>	
				<h2><?php bloginfo( 'description' ); ?></h2>
			</div>
		</header>
	</div>
	<?php else : ?>
	<div id="page-cover" style="background: url( <?php echo get_template_directory_uri(); ?>/images/cover.jpg ) no-repeat center center; background-size: cover;">
		<header id="header">
			<div class="wrap">
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>	
				<h2><?php bloginfo( 'description' ); ?></h2>
			</div>
		</header>
	</div>
	<?php endif; ?>

	<?php
}
endif;


/**
 * Display the comment item
 * 
 * @return void
 */
function elo_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<?php _e( 'Pingback:', 'elo' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'elo' ), '<span class="edit-link">', '</span>' ); ?>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li class="comment">
		<article id="div-comment-<?php comment_ID() ?>" class="comment-body">
			<div class="comment-meta">
				<div class="avatar">
					<?php echo get_avatar($comment, 70, ''); ?>
				</div>
				<div class="comment-author">
					<a href="#"><?php comment_author_link(); ?></a>
				</div>
			</div>
			<div class="comment-content">
				<?php if ($comment->comment_approved == '0') : ?>
				<p><em><?php _e('comment will appear after being approved by admin.', 'elo') ?></em> </p>
				<?php endif; ?>						
				<?php comment_text() ?>
			</div>
			<div class="reply">
				<?php comment_reply_link(array_merge( $args, array('reply_text' => __('<span class="label">Reply</span>', 'elo'), 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>
		</article>
	<?php
		break;
	endswitch; // end comment_type check
}

/**
 * Display the comment form
 * 
 * @return void
 */
function elo_comment_form(){
	global $user_identity, $id;

	if ( ! comments_open() ) : ?>
	<!-- <div id="respond" class="closed-comment">
		<header id="respond-header">
			<h2 id="respond-title"><?php _e( 'Comment is closed.', 'elo' ); ?></h2>
		</header>
		<p><?php _e('Contact us if you have something important to say about this topic.', "elo"); ?></p>
	</div> -->
	<?php elseif (comments_open()) : ?>

	<!-- Comment Form -->
	<div id="respond" class="comment-form">
		<header id="respond-header">
			<h2 id="respond-title"><?php _e( 'What Do You Think?', 'elo' ); ?></h2>
		</header>

		<div class="cancel-comment-reply"> 
			<?php cancel_comment_reply_link(); ?>
		</div>

		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<p class="comment-loggedin">
				You have to be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to be able to comment.
			</p>
		<?php else : ?>
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="comment-form">
			
				<div class="submit-comment">
					<?php if ( is_user_logged_in() ) : ?>					
					<div class="comment-logged-in">
						<p class="logged-in-as"><span class="subtitle">Logged in as</span> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a></p>	
						<p><a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out</a></p>
					</div>
					<?php else : ?>
					<input type="text" name="author" class="" placeholder="Name" id="author" size="22" tabindex="1" <?php if (isset($req)) echo "aria-required='true'"; ?> />
					<input type="text" name="email"  class="" placeholder="Email" id="email" size="22" tabindex="2" <?php if (isset($req)) echo "aria-required='true'"; ?> />
					<input type="text" name="url"  class="" placeholder="URL" id="url" size="22" tabindex="2" <?php if (isset($req)) echo "aria-required='true'"; ?> />
					<?php endif; ?>						
				</div>
				<div class="submit-comment clearfix">
					<textarea name="comment" id="comment" rows="10" tabindex="4" placeholder="Type your comment here..." class="the-content"></textarea>
					<div id="submit-wrap">
						<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
					</div>						
					<?php comment_id_fields(); ?>
					<?php do_action('comment_form', isset($post->ID)); ?>							
				</div>			

			</form>
		<?php endif; // If registration required and not logged in ?>
	</div>
	<?php endif;
}
