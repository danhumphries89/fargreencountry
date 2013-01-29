<?php get_header(); ?>

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
	</footer>
</div>
