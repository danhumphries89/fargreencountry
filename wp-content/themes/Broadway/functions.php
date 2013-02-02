<?php 

/** Add theme support for custom menus **/
function registerMenus() {
  register_nav_menus( array('mainmenu' => __( 'Main Menu' )) );
}
add_action( 'init', 'registerMenus' );

/** Ensure that post-thumbnails can be added to the site **/
add_theme_support( 'post-thumbnails' ); 

/** Add Twitter to the Author Contact Details **/
function add_twitter_contactmethod( $contactmethods ) {

  if ( !isset( $contactmethods['twitter'] ) )
    $contactmethods['twitter'] = 'Twitter';

  // Remove Yahoo IM
  if ( isset($contactmethods['yim'] ))
	unset( $contactmethods['yim'] );
  	return $contactmethods;
}
add_filter( 'user_contactmethods', 'add_twitter_contactmethod', 10, 1 );

/** Change normal Wordpress Comments to new design **/
function comments_callback($comment, $args, $depth){
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP); ?>
<li class="comment" id="comment-<?php comment_ID(); ?>">

	<header class="comment-header">
		<h3><?php comment_author(); ?></h3>
		<p class="comment-meta">
			<span class="date"><?php comment_date(); ?></span>
			<span class="time"><?php comment_time(); ?></span>
			<span class="reply">
				<?php  
					comment_reply_link( array_merge($args, array(
						'add_below' => 'comment',
						'depth' => $depth,
						'max-depth' => $args['max_depth']
					))); 
				?>
			</span>
		</p>
	</header>

	<section class="comment-content"> <?php echo $comment->comment_content; ?> </section>
</li>
<?php 
}