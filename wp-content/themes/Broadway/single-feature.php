<?php

	$meta = get_post_meta( $post->ID );

	//get the source if exists, split to array
	$source = (isset($meta['source'][0])) ? explode(';', $meta['source'][0]) : "";

	//get the post featured imae
	$post_source = str_replace("-150x150", "", wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID )) );
	$secondary_source = $meta['comments_featured'][0];
	//get the tags for the current post
	$tags = get_the_tags( $post->ID );
?>


<div class="background-image" style="background-image: url(<?php echo $post_source[0]; ?>);"></div>
<span class="single-tag features">Features</span>

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
				<span class="title">Source</span>
				<a href="<?php echo trim($source[1]); ?>" target="_blank">
					<span><?php echo $source[0]; ?></span>
				</a>
			</p>
			<?php endif; ?>

			<?php if(!empty($tags)) : ?>
			<p class="tags">
				<span class="title">Similar Items</span>
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

<div class="background-image last" style="background-image: url(<?php echo $secondary_source; ?>);"></div>
<span class="single-tag features">Comments & Discussions</span>

<section class="footer features">
	<div class="comments">
		<?php comments_template( '', true ); ?>
	</div>
</section>
