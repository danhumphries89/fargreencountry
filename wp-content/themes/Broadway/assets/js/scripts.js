console.log(json_posts);

$(window).load(function(){

	var feature_stream = $('.stream_item_container');
	var clicks_counted = 0;

	$('.feature-stream .next').click(function(){
		event.preventDefault();

		//show the prev button when clicked
		$('.feature-stream .prev > .button').css('visibility', 'visible');

		if(clicks_counted !== clicks_limit){
			$(feature_stream).animate({
				left: '-=515'
			}, 400);

			clicks_counted += 1;
		}
		if(clicks_counted === clicks_limit){ $('.feature-stream .next > .button').css('visibility', 'hidden'); }
	});

	$('.feature-stream .prev').click(function(){
		event.preventDefault();

		//show the next button when clicked
		$('.feature-stream .next > .button').css('visibility', 'visible');

		if($(feature_stream).css('left') !== "0px"){
			$(feature_stream).animate({
				left: '+=515'
			}, 300);

			clicks_counted -= 1;
		}else{ clicks_counted = 0; }
		if(clicks_counted === 0){ $('.feature-stream .prev > .button').css('visibility', 'hidden'); }
		
	});

});

function getDetails(title){

    $.ajax({
        url: "http://imdbapi.org/?ids="+title+"&type=json&plot=simple&episode=1&lang=en-US&aka=simple&release=simple&business=0&tech=0",
        dataType: 'json',
        success: function(data){

        	console.log(data);

        	//remove the loading span
        	$('.loading').css('display', 'none');

        	//get the details and add to new elements
        	var poster = $('<img/>').attr({ 
        		'src': data[0].poster, 
        		'class': 'product_image',
        		'alt': data[0].title
        	});

        	var title = $('<h2/>').append( $('<a/>').attr({
        		'href': data[0].imdb_url,
        		'title': 'link to IMDB',
        		'class': 'product_title',
        		'target': '_blank'
        	}).text( data[0].title ));

        	var synopsis  = $('<p/>').html(data[0].plot_simple);

        	//retrieve a director if one is given
        	if(data[0].directors){
        		var director = $('<span/>').addClass('director').html(data[0].directors[0]);
        	}

        	$('.product_details').append(poster, [title, synopsis, director]);
        }
    });
}

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