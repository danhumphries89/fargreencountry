<?php get_header(); ?>

<?php 
	/** Get Sticky Post **/
	$sticky_query = array(
		'posts_per_page' => 1,
		'post__in' => get_option('sticky_posts'),
	);
	query_posts( $sticky_query );
?>

<section class="featured-container">
	<?php

		if(is_home() && have_posts()) :
			while( have_posts() ) : the_post();

			//get the meta data for the current post
			$meta = get_post_meta( $post->ID );

			//get the post featured images
			$post_source = str_replace("-150x150", "", wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID )) );

			//get the current list of categories for the sticky post
			$categories = get_the_category( $post->ID );

	?>
	<div class="wallimage <?php echo $categories[0]->slug; ?>" link="<?php the_permalink(); ?>">
		<div class="block block-1" style="background-image: url('<?php echo $post_source[0]; ?>');">
			<div class="block-content">
				<h2 class="the_title"><?php the_title(); ?></h2>
			</div>
		</div>

		<div class="block block-2" style="background-image: url('<?php echo $post_source[0]; ?>');">
			<div class="block-content"
				<p class="the_excerpt"><?php the_excerpt(); ?></p>
			</div>
		</div>

		<div class="block block-3" style="background-image: url('<?php echo $post_source[0]; ?>');">
			<div class="block-content"
				<p class="the_excerpt"><?php the_excerpt(); ?></p>
			</div>
		</div>
	</div>
	<?php endwhile; endif; ?>

</section>


