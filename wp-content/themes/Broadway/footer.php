<?php 
	//get the current category to assign colours to twitter box
	$current_category = get_the_category( $post->ID );
?>

		<footer class="main_footer">
			<div class="footer_top">
				<div class="widget_section"><?php dynamic_sidebar( 'Footer Widgets' ); ?></div>
				<div class="twitter_section <?php echo (!empty($current_category)) ? $current_category[0]->slug : ''; ?>"><span>Recent Tweet</span></div>
			</div>

			<div class="footer_bottom">
				<p class="copyright">&copy;2013 Far Green Country - </p>
				<p class="site">Site Design & Development by <a href="http://www.danhumphries.me" target="_blank">Dan Humphries</a></p>
			</div>
		</footer>

	</body>
</html>