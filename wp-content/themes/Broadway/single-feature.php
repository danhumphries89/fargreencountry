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
<span class="single-tag features">Feature Stream</span>
<section class="feature-stream">
	<?php 

		//get the current Post ID
		$currentPostID = $post->ID;

		//get the current category
		$current_category = get_the_category( $post->ID );

		//create and exectue query to get feature story
		$feature_stream = new WP_Query( array(
			'post_type' => 'post', 
			'category_name' => $current_category[1]->name,
			'orderby' => 'published',
			'order' => 'ASC',
			'posts_per_page' => '8'
		));

		//count the number of items in the query array
		$feature_items = $feature_stream->post_count;

		//basic post counter
		$counter = 1;
		$click_limit = round(($feature_items / 2), 0, PHP_ROUND_HALF_DOWN);
	?>
	<script type="text/javascript"> var clicks_limit = <?php echo $click_limit; ?>; </script>

	<div class="stream_item_container">
		<?php while($feature_stream->have_posts()) : $feature_stream->the_post(); ?>
			<article class="stream-items items<?php echo $feature_items; ?> <?php echo ($currentPostID == get_the_ID()) ? 'active' : ''; ?>">	
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<span class="date"><?php echo get_the_date(); ?></span>
				<div class="excerpt">
					<?php the_excerpt(); ?>
				</div>
			</article>
		<?php $counter++; endwhile; wp_reset_query(); ?>
	</div>
	<ul class="feature-stream-nav">
		<li><a href="javascript:void(0);" class="prev">Prev</a></li>
		<li><a href="javascript:void(0);" class="next">Next</a></li>
	</ul>
</section>

<div class="background-image last" style="background-image: url(<?php echo $secondary_source; ?>);"></div>
<span class="single-tag features">Comments & Discussions</span>

<section class="footer features">
	<div class="comments">
		<?php comments_template( '', true ); ?>
	</div>
</section>
