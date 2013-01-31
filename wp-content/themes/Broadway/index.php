<?php get_header(); ?>
<div class="container">

	<div class="post-collection <?php echo (is_home()) ? 'home' : ''; ?>">
		<?php while( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content' ); ?>
		<?php endwhile; ?>
	</div>

	<?php get_footer(); ?>
</div>