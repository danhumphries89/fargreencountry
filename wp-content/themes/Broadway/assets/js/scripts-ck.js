console.log(json_posts);$(window).load(function(){var e=$(".stream_item_container"),t=0;$(".feature-stream .next").click(function(){event.preventDefault();if(t!==clicks_limit){console.log($(".stream_item_container > .stream-items:last-child").offset().left);$(e).animate({left:"-=515",easing:"swing"},150);t+=1}});$(".feature-stream .prev").click(function(){event.preventDefault();$(e).css("left")!=="0px"&&$(e).animate({left:"+=515",easing:"swing"},150);t=0})});$(window).scroll(function(){});