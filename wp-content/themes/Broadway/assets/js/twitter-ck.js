$(window).load(function(){var e=$(".twitter_section");$.ajax({url:"https://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name=danhumphries89&count=1",dataType:"jsonp",success:function(t){console.log(t);var n={text:t[0].text,user:t[0].user.name,user_screen:t[0].user.screen_name,reply_user:t[0].in_reply_to_screen_name,created_at:t[0].created_at,user_mentions:t[0].entities.user_mentions,hashtags:t[0].entities.hashtags},r=/(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;n.text=n.text.replace(r,"<a href='$1' target='_blank'>$1</a>");var i=new Array;for(var s=0;s<n.user_mentions.length;s++){var o=n.user_mentions[s].screen_name,u="<a href='https://www.twitter.com/"+o+"' class='twitter_mention' target='_blank'>@"+o+"</a>",a=new RegExp("@"+o,"gi");n.text=n.text.replace(a,u)}var f=$("<p>").attr("class","datetime").text(jQuery.timeago(n.created_at)),l=$("<p/>").html(n.text),c=$("<p/>").attr("class","name").html(n.user),h=$("<p/>").attr("class","follow").html("<a href='http://www.twitter.com/'"+n.user_screen+"' target='_blank'>@"+n.user_screen+"</a>"),p=$("<div/>").attr("class","speech_bubble").append(l,[f]),d=$('<div id="twitter" class="twitter_container"/>').append(p,[c,h]);$(e).append(d)}});$("#twitter .datetime").timeago()});