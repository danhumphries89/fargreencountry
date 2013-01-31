<h2><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></h2>

<?php 
	$comments = get_comments( array(
		'orderby' => 'comment_date_gmt',
		'order' => 'ASC',
		'post_id' => $post->ID
	)); 
?>
<?php if( have_comments() ) : ?>
<ul class="comments-list">
	<?php 
		wp_list_comments( array(
			'type'=>'comment',
			'callback'=>'comments_callback'
		), $comments ); 
	?>
</ul>
<?php endif; ?>
