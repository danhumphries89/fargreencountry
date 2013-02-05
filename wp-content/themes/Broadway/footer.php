<?php 
	//get the current category to assign colours to twitter box
	$current_category = get_the_category( $post->ID );
?>

		<footer class="main_footer">
			<div class="widget_section">
				<?php dynamic_sidebar( 'Footer Widgets' ); ?>
			</div>
			<div class="twitter_section <?php echo (!empty($current_category)) ? $current_category[0]->slug : ''; ?>"><span>Recent Tweet</span></div>
		</footer>

	</body>
</html>