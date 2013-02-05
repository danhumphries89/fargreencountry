console.log(json_posts);

$(window).load(function(){

	var feature_stream = $('.stream_item_container');
	var clicks_counted = 0;

	$('.feature-stream .next').click(function(){
		event.preventDefault();

		if(clicks_counted !== clicks_limit){

			//get the last child
			console.log($('.stream_item_container > .stream-items:last-child').offset().left);

			$(feature_stream).animate({
				left: '-=515',
				easing: 'swing'
			}, 150);

			clicks_counted += 1;
		}
	});

	$('.feature-stream .prev').click(function(){
		event.preventDefault();

		if($(feature_stream).css('left') !== "0px"){
			$(feature_stream).animate({
				left: '+=515',
				easing: 'swing'
			}, 150);
		}
		clicks_counted = 0;

	});

});

/** Scrolling Functions **/
$(window).scroll(function(){

	//var mainmenu = $('.single > .main_header');
	//var scrollPosition = $(window).scrollTop();

	//var sectionHeight = ($('section.content').height() - 50);

	//show and hide the header
	/**--ENABLE IF USED--**/
	//if(scrollPosition >= sectionHeight){ $(mainmenu).addClass("visible_header"); $(mainmenu).fadeIn('fast'); }
	//if(scrollPosition <= sectionHeight){ $(mainmenu).addClass("visible_header"); $(mainmenu).fadeOut('fast'); }
	/** --------------- **/

});