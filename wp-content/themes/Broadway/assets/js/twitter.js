$(window).load(function(){

    $.ajax({
        url: 'https://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name=danhumphries89&count=1',
        dataType: 'jsonp',
        success: function(data){
            console.log(data);
        }
    });

});
/**
    $.ajax({
        url: 'https://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name=danhumphries89&count=1',
        dataType: 'jsonp',
        success: function(data) {

            var tweets = $('#the-forge-twitter');
            tweets.html('');
            var status = "";
            var row = 1;
            
            tweets.append("<h4 class='widgettitle'>Twitter</h4>");
            
            for (status in data) {
                if (data.hasOwnProperty(status)) {
                    
                    if(row == 3){ row = 1; }
                    
                    var text_out = data[status]['text'];

                    //activate the links in the text status
                    var urls = data[status]['entities']['urls'];
                    for(var a_url in urls){
                        if(urls.hasOwnProperty(a_url)){
                            var single_url = unescape(urls[a_url]['url']);
                            var the_url = "<a href='" + unescape(urls[a_url]['expanded_url']) + "' target='_blank'>" + single_url + "</a>";
                            var regExp = new RegExp(single_url, "gi");
                            
                            if((the_url != "") && (single_url != "")){
                                var new_text = text_out.replace(regExp, the_url);
                                text_out = new_text;
                            }
                        }
                    }
                    
                    //link the user mentions
                    var user_mentions = data[status]['entities']['user_mentions'];
                    for(var mention in user_mentions){
                        if(user_mentions.hasOwnProperty(mention)){
                            var user_with = "@" + user_mentions[mention]['screen_name'];
                            var link = "<a href='http://www.twitter.com/" + user_mentions[mention]['screen_name'] + "' target='_blank'>" + user_with + "</a>";
                            var regExp = new RegExp(user_with, "gi");
                            
                            if((link != "") && (user_with != "")){
                                var new_text = text_out.replace(regExp, link);
                                text_out = new_text;
                            }
                        }
                    }
                    
                    //change the hashtags in the text status into a string
                    var hashtags = data[status]['entities']['hashtags'];
                    for(var hashtag in hashtags){
                        if(hashtags.hasOwnProperty(hashtag)){
                            var hashtag_out = "#" + hashtags[hashtag]['text'];
                            var hashtag_link = "<a href='http://www.twitter.com/#!/search/%23" + hashtags[hashtag]['text'] + "' target='_blank'>#" + hashtags[hashtag]['text'] + "</a>";
                            var regExp = new RegExp(hashtag_out, "gi");
                            
                            if((hashtag_out != "") && (hashtag_link != "")){
                                var new_text = text_out.replace(regExp, hashtag_link);
                                text_out = new_text;
                            }
                        }
                    }
                    
                    var screen_name = data[status]['user']['screen_name'];
                    var profile_image = unescape(data[status]['user']['profile_image_url']);
                    
                    tweets.append("<div class='twitter_status row" + row + "'>" +
                                  "<span class='twitter_text'>"+text_out+"</span>"+
                                  "</div>");
                    row++;
                }
            }
        }
    });
**/