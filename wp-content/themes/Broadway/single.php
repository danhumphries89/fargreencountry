<?php get_header(); ?>
<?php 
	//depending on the category, load the alternative layout
	if(in_category('14')) { 
		get_template_part( 'single', 'feature' );
	}else{ get_template_part('single', 'default'); }
?>
<?php get_footer();