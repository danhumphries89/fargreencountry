<!DOCTYPE html>
<html charset="utf-8">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title> <?php wp_title('|', true, 'right');  ?><?php bloginfo('name'); ?></title>

	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon">
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/fonts.css" rel="stylesheet" type="text/css" screen="all" />
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/twitter.css" rel="stylesheet" type="text/css" screen="all" />
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/base.css" rel="stylesheet" type="text/css" screen="all" />

	<?php
		//get all post ids & titles then add to a javascript array
		while( have_posts() ) : 
			the_post(); 
			$post_array[] = array(
					'id' => "postID-".$post->ID,
					'title' => $post->post_title
			); 
		endwhile;
		$json_array = json_encode($post_array);

		$javascript_out = "<script type='text/javascript'> var json_posts = " . $json_array . "; </script>";
		echo $javascript_out;
	?>

	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/scripts.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/timeago.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/twitter.js"></script>
	
</head>
<body <?php body_class(); ?>>

	<header class="main_header">
		<div class="container">
			<h1 class="title">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo_test.png" />
				<p class="title_words">
					<span>Far Green</span>
					<span>Country</span>
				</p>
			</h1>
			<?php 
				wp_nav_menu( array(
					'menu' => 'mainmenu',
					'container' => '',
					'menu_id' => 'mainmenu'
				)); 
			?>
		</div>

		<?php if(!is_home()) : ?>
			<div class="home_button">Home</div>
		<?php endif; ?>
	</header>