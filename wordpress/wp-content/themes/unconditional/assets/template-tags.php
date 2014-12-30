<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Unconditional
 */
  if ( !function_exists( 'unconditional_pagination' ) ) :
/**
 * Add pagination
 *
 * @uses	paginate_links()
 * @uses	add_query_arg()
 *
 * @since 1.0.0
 */
function unconditional_pagination() {
	global $wp_query;

	$current = max( 1, get_query_var('paged') );
	$big = 999999999; // need an unlikely integer

	$pagination_return = paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => $current,
		'total' => $wp_query->max_num_pages,
		'next_text' => '&raquo;',
		'prev_text' => '&laquo;'
	) );

	if ( ! empty( $pagination_return ) ) {
		echo '<div class="col-sm-12 text-center">';
		echo '<div id="pagination">';
		echo '<div class="total-pages btn special">';
		printf( __( 'Page %1$s of %2$s', 'unconditional' ), $current, $wp_query->max_num_pages );
		echo '</div><div class="btn-group">';
		echo str_replace( array( 'page-numbers', 'current' ), array( 'page-numbers btn', 'disabled' ), $pagination_return );
		echo '</div></div></div>';
	}
}
endif; // unconditional_pagination

add_filter( 'next_post_link', 'unconditional_add_class' );
add_filter( 'previous_post_link', 'unconditional_add_class' );
/**
 * Add 'btn' class to previous and next post links
 *
 * This function is attached to the 'next_post_link' and 'previous_post_link' filter hook.
 *
 * @param	string $format
 *
 * @return	Modified string
 *
 * @since 1.0.0
 */
function unconditional_add_class( $format ){
	return str_replace( 'href=', 'class="btn" href=', $format );
}

if ( ! function_exists( 'unconditional_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function unconditional_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'unconditional' ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'unconditional' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'unconditional' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'unconditional' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'unconditional' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // unconditional_content_nav

if ( ! function_exists( 'unconditional_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function unconditional_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'unconditional' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'unconditional' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'unconditional' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'unconditional' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					<?php edit_comment_link( __( 'Edit', 'unconditional' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'unconditional' ); ?></p>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for unconditional_comment()

if ( ! function_exists( 'unconditional_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function unconditional_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'unconditional_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the
	 * URL of the next adjacent image in a gallery, or the first image (if
	 * we're looking at the last image in a gallery), or, in a gallery of one,
	 * just the link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 *	Post Meta information.
*/

if ( ! function_exists( 'unconditional_post_meta' ) ) {

	function unconditional_post_meta() {
		echo '<ul class="list-inline entry-meta">';


		if ( get_post_type() === 'post' ) {

			global $post_id;

			// if post is sticky
			if ( is_sticky() ) {
				echo '<li class="meta-icon fa fa-thumb-tack"></li>';
			}
			if ( has_post_format( 'gallery',$post_id ) ) {
				echo '<li class="meta-icon fa fa-camera"></li>';
			}
			elseif ( has_post_format( 'image',$post_id ) ) {
				echo '<li class="meta-icon fa fa-camera"></li>';
			}
			elseif ( has_post_format( 'audio',$post_id ) ) {
				echo '<li class="meta-icon fa fa-volume-up"></li>';
			}
			elseif ( has_post_format( 'video',$post_id ) ) {
				echo '<li class="meta-icon fa fa-video-camera"></li>';
			}
			elseif ( has_post_format( 'link',$post_id ) ) {
				echo '<li class="meta-icon fa fa-link"></li>';
			}
			elseif ( has_post_format( 'quote',$post_id ) ) {
				echo '<li class="meta-icon fa fa-quote-left"></li>';
			}

			// get the post author
			printf(
				'<li class="meta-author"><i class="fa fa-user"></i><a href="%1s" rel="author">%2s</a></li>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);

			// get the postdate
			echo '<li class="meta-date"><i class="fa fa-clock-o"></i>' . get_the_date() .'</li>';

			// get the categories
			$category_list = get_the_category_list( ', ' );
			if ( $category_list ) {
				echo '<li class="meta-categories"><i class="fa fa-folder-o"></i>'. $category_list .'</li>';
			}

			// get the tags
			$tag_list = get_the_tag_list( '', ', ' );
			if ( $tag_list ) {
				echo '<li class="meta-tags"><i class="fa fa-bookmark-o"></i>'. $tag_list .'</li>';
			}

			// get the comments
			if ( comments_open() ) :
				echo '<li class="meta-reply"><i class="fa fa-comment-o"></i>';
				comments_popup_link( __( 'Leave a comment', 'unconditional' ), __( 'One Comment', 'unconditional' ), __( '% Comments', 'unconditional' ) );
				echo '</li>';
			endif;

			// post edit link
			if ( is_user_logged_in() ) {
				echo '<li><i class="fa fa-pencil"></i>';
				edit_post_link( __( 'Edit', 'unconditional' ), '<span class="meta-edit">', '</span>' );
				echo '</li>';
			}
		}
	}
}


/**
 * Returns true if a blog has more than 1 category
 */
function unconditional_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so unconditional_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so unconditional_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in unconditional_categorized_blog
 */
function unconditional_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'unconditional_category_transient_flusher' );
add_action( 'save_post',     'unconditional_category_transient_flusher' );


function unconditional_title($title) {
    if ($title == '') {
        return 'Untitled Entry - Read Full Article';
    } else {
        return $title;
    }
}
add_filter('the_title', 'unconditional_title');

