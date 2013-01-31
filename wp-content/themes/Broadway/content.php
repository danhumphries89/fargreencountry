<?php 
	//add the content to a variable to extract the first two paragraphs
	$thecontent = apply_filters( 'the_content', get_the_content() );
	$content_paragraphs = explode("</p>", $thecontent);

	//get the meta data for the current post item
	$metadata = get_post_meta( $post->ID );

	//get the background image from the meta data
	$backgroundImage = (isset($metadata['background_image'][0])) ? $metadata['background_image'][0] : "";
	$backgroundURL = "images/" . $backgroundImage;

?>
<article class="mainposts post <?php echo ($backgroundImage) ? 'background' : ''; ?>" <?php if($backgroundImage) : ?> style="background-image: url(<?php echo $backgroundURL; ?>);"<?php endif; ?>>
	<header class="header">
		<a href="<?php the_permalink(); ?>">
			<h2 class="title"><?php the_title(); ?></h2>
		</a>
		<div class="meta">
			<span class="date"><?php the_date(); ?></span>
			<span class="author"><?php the_author(); ?></span>
		</div>
	</header>
	<section class="content">
		<div class="excerpt"> <?php the_excerpt(); ?> </div>
	</section>

	<footer class="footer">

	</footer>
</article>

<?php
	//unset all variables for next post
	unset($backgroundURL);
	unset($metadata);
	unset($thecontent);
	unset($content_paragraphs);
?>