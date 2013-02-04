console.log(json_posts);

/** Scrolling Functions **/
$(window).scroll(function(){

	var mainmenu = $('.single > .main_header');
	var scrollPosition = $(window).scrollTop();

	var sectionHeight = ($('section.content').height() - 75);

	//show and hide the header
	if(scrollPosition >= sectionHeight){ $(mainmenu).addClass("visible_header"); $(mainmenu).fadeIn('fast'); }
	if(scrollPosition <= sectionHeight){ $(mainmenu).addClass("visible_header"); $(mainmenu).fadeOut('fast'); }

});