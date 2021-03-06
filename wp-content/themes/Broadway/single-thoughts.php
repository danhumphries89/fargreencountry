<?php

	$meta = get_post_meta( $post->ID );

	//get the source if exists, split to array
	$source = (isset($meta['source'][0])) ? explode(';', $meta['source'][0]) : "";

	//get the post featured images
	$post_source = str_replace("-150x150", "", wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID )) );
	$comments_image = $meta['comments_image'][0];

	//get the title of the product
	$imdb_id = $meta['imdb_id'][0];

	//get the tags for the current post
	$tags = get_the_tags( $post->ID );

?>

<div class="main_image background-image"style="background-image: url(<?php echo $post_source[0]; ?>);"></div>
<span class="single-tag thoughts">Thoughts</span>

<article class="content_container features post">
	<header class="header">
		<h1 class="title"><?php the_title(); ?></h1>
		<div class="meta">
			<span class="date"><?php the_date(); ?></span>
			<span class="author"><?php the_author(); ?></span>
		</div>
	</header>
	<section class="content">
		<div class="excerpt">
			<?php the_excerpt(); ?>
		</div>
		<?php the_content(); ?>
	</section>
	<footer class="article-footer">
		<div class="meta">
			<?php if(!empty($source)) : ?>
			<p class="source">
				<span class="title thougts">Source</span>
				<a href="<?php echo trim($source[1]); ?>" target="_blank">
					<span><?php echo $source[0]; ?></span>
				</a>
			</p>
			<?php endif; ?>

			<?php if(!empty($tags)) : ?>
			<p class="tags">
				<span class="title thoughts">Similar Items</span>
				<?php foreach($tags as $tag) : ?>
					<a href="<?php echo get_tag_link( $tag->term_id ); ?>">
						<span><?php echo $tag->name; ?></span>
					</a>
				<?php endforeach; ?>
			</p>
			<?php endif; ?>
		</div>
	</footer>
</article>

<?php if($comments_image != "") : ?>
<div class="background-image thoughts last" style="background-image: url(<?php echo $comments_image; ?>);"></div>
<span class="single-tag thoughts">Comments & Discussions</span>
<?php endif; ?>

<section class="footer features">
	<div class="comments">
		<?php comments_template( '', true ); ?>
	</div>
</section>