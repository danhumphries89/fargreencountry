<?php get_header(); ?>
<div class="container">

	<div class="posts">
		<?php while( have_posts() ) : the_post(); ?>
		<div class="post item-<?php the_ID(); ?>">
			<?php get_template_part( 'content' ); ?>
		</div>
		<?php endwhile; ?>
	</div>

	<?php get_footer(); ?>
</div>