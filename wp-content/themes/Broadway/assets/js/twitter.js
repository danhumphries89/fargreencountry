$(window).load(function(){

/** TODO: add hashtag links **/

    //find the twitter section to output the data
    var twitter_section = $('.twitter_section');

    //begin the ajax request and build the output content
    $.ajax({
        url: 'https://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name=danhumphries89&count=1',
        dataType: 'jsonp',
        success: function(data){

            console.log(data);

            //get the data and apply to array to use what we want
            var twitter_data = {
                'text': data[0].text,
                'user': data[0].user.name,
                'user_screen': data[0].user.screen_name,
                'reply_user': data[0].in_reply_to_screen_name,
                'created_at': data[0].created_at,
                'user_mentions': data[0].entities.user_mentions,
                'hashtags': data[0].entities.hashtags
            };

            /** - HYPERLINK - **/
            var hyperlink_expression = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
            twitter_data.text = twitter_data.text.replace(hyperlink_expression,"<a href='$1' target='_blank'>$1</a>"); 
            /** END HYPERLINK **/

            /** - MENTIONS - **/
            //create array of mention links
            var mention_links = new Array();
            //loop through mentions, create link + add to array
            for(var i=0; i<twitter_data.user_mentions.length; i++){

                //get the twitter screen name for the mention
                var mention_screen_name = twitter_data.user_mentions[i].screen_name;

                //create the link
                var link = "<a href='https://www.twitter.com/" + mention_screen_name + "' class='twitter_mention' target='_blank'>@" + mention_screen_name + "</a>";

                //create regexp
                var regExp = new RegExp("@" + mention_screen_name, "gi")

                //add the link to the text
                twitter_data.text = twitter_data.text.replace(regExp, link);
            }
            /** END MENTIONS **/

            //create date & text elements
            var creation_date = $('<p>').attr('class', 'datetime').text( jQuery.timeago(twitter_data.created_at) );
            var textElement = $('<p/>').html(twitter_data.text);
            var userElement = $('<p/>').attr('class', 'name').html(twitter_data.user);
            var userFollow = $('<p/>').attr('class', 'follow').html("<a href='http://www.twitter.com/'" + twitter_data.user_screen + "' target='_blank'>@" + twitter_data.user_screen + "</a>");

            //add items to speech bubble + add text element
            var speech_bubble = $('<div/>').attr('class', 'speech_bubble').append( textElement, [creation_date] );

            //add all items to the container element
            var container_element  = $('<div id="twitter" class="twitter_container"/>').append( speech_bubble,[userElement, userFollow] );

            //finally add all items to the twitter_section
             $(twitter_section).append( container_element );
        }
    });

    //set the value of the twitter date/time to eg 10 Hours ago
    //ENSURE THE TIMEAGO SCRIPT IS LOADED
    $('#twitter .datetime').timeago();

});