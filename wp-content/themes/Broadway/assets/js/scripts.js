console.log(json_posts);

/** Scrolling Functions **/
$(window).scroll(function(){

	var mainmenu = $('.main_header');
	var scrollPosition = $(window).scrollTop();

	var sectionHeight = ($('section.content').height() - 75);
	console.log(sectionHeight);

	//show and hide the header
	if(scrollPosition >= sectionHeight){ event.preventDefault(); $(mainmenu).addClass("visible_header"); $(mainmenu).fadeIn('fast')}
	if(scrollPosition <= sectionHeight){ event.preventDefault(); $(mainmenu).addClass("visible_header"); $(mainmenu).fadeOut('fast')}

});