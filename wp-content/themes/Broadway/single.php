<?php get_header(); ?>

<?php
	$meta = get_post_meta( $post->ID );

	//get the source if exists, split to array
	$source = (isset($meta['source'][0])) ? explode(';', $meta['source'][0]) : "";

	//get the tags for the current post
	$tags = get_the_tags( $post->ID );
?>

<div class="single">
	<header class="header">
		<h1 class="title"><?php the_title(); ?></h1>
		<div class="meta">
			<span class="date"><?php the_date(); ?></span>
			<span class="author"><?php the_author(); ?></span>
		</div>
	</header>
	<section class="content">
		<?php the_content(); ?>
	</section>
	<footer class="footer">
		<div class="meta">
			<p class="source">
				<span class="title">Source</span>
				<a href="<?php echo trim($source[1]); ?>" target="_blank">
					<span><?php echo $source[0]; ?></span>
				</a>
			</p>
			<p class="tags">
				<span class="title">Similar Items</span>
				<?php foreach($tags as $tag) : ?>
					<a href="<?php echo get_tag_link( $tag->term_id ); ?>">
						<span><?php echo $tag->name; ?></span>
					</a>
				<?php endforeach; ?>
			</p>
	</footer>
</div>
