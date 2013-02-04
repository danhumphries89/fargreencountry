<?php 
	//get the meta data for the current post item
	$metadata = get_post_meta( $post->ID );

	//get the background image from the meta data
	$backgroundImage = (isset($metadata['background_image'][0])) ? $metadata['background_image'][0] : "";
	$backgroundURL = "images/" . $backgroundImage;

	//get the categories attached to the current post
	$categories = get_the_category( $post->ID );
?>
<article class="content_container post">
	<span class="category-title <?php echo $categories[0]->slug; ?>"><?php echo $categories[0]->name; ?></span>
	<header class="header">
		<a href="<?php the_permalink(); ?>">
			<h2 class="title"><?php the_title(); ?></h2>
		</a>
		<div class="meta">
			<span class="date"><?php echo get_the_date(); ?></span>
			<span class="author"><?php the_author(); ?></span>
		</div>
	</header>
	<section class="content">
		<div class="excerpt"> <?php the_excerpt(); ?> </div>
	</section>
</article>

<?php
	//unset all variables for next post
	unset($backgroundURL);
	unset($metadata);
	unset($thecontent);
	unset($content_paragraphs);
?>