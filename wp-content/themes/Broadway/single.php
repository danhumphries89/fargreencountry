<?php get_header(); ?>
<?php 
	//depending on the category, load the alternative layout
	if(in_category( '14', $post->ID )) { 
		get_template_part( 'single', 'feature' );
	}else if(in_category( 'thoughts' )){
		get_template_part( 'single', 'thoughts' );
	}else{ get_template_part( 'single', 'default' ); }
?>
<?php get_footer();