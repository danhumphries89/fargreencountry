<?php get_header(); ?>

<?php 
	/** Get Sticky Post **/
	$sticky_query = array(
		'posts_per_page' => 1,
		'post__in' => get_option('sticky_posts'),
		'ignore_sticky_posts' => 0
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
				<h3 class="the_date"><?php the_date(); ?></h3>
				<h3 class="the_author"><?php the_author(); ?></h3>
			</div>
		</div>

		<div class="block block-2" style="background-image: url('<?php echo $post_source[0]; ?>');">
			<div class="block-content"><?php the_excerpt(); ?></div>
		</div>

		<div class="block block-3" style="background-image: url('<?php echo $post_source[0]; ?>');">
			<div class="block-content"></div>
		</div>
	</div>
	<?php endwhile; endif; wp_reset_query(); ?>
</section>

<section class="secondary_row">
	<div class="block_row container">
	<?php 
		query_posts(array(
			'posts_per_page' => 3,
			'ignore_sticky_posts' => 1,
			'post__not_in' => get_option( 'sticky_posts' )
		));
		$counter = 1;

		while(have_posts()) : the_post(); 

		$postImage = str_replace("-150x150", "", wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID )) );
		$categories = get_the_category( $post->ID );
	?>
		<div class="block-links item<?php echo $counter; ?> block" style="background-image: url('<?php echo $postImage[0]; ?>');" href="<?php the_permalink(); ?>">
			<div class="content <?php echo $categories[0]->slug; ?>">
				<h4 class="category"><?php echo $categories[0]->name; ?></h4>
				<h3 class="title"><?php echo the_title(); ?></h3>
				<h3 class="author"><?php the_author(); ?></h3>
			</div>
		</div>
	<?php $counter++; endwhile; wp_reset_query(); ?>
	</div>

</section>

<section class="container tertiary_row">
	<?php 
		query_posts(array(
			'offset' => 3,
			'ignore_sticky_posts' => 1,
			'post__not_in' => get_option( 'sticky_posts' )
		));
		while( have_posts() ) : the_post();
			get_template_part( 'content' );
		endwhile;
	?>
</section>

<?php get_footer(); ?>