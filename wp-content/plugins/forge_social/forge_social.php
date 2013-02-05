<?php
/*
Plugin Name: Playing in the Forge
Plugin URI: http://www.forgewebdesign.com
Description: Widget plugin to display the now playing & most recently played tracks from Last.fm.
Author: Dan Humphries
Version: 0.5
Author URI: www.forgewebdesign.com

*/


// We're putting the plugin's functions inside the init function to ensure the
// required Sidebar Widget functions are available.
  
  function widget_playing_in_the_forge_init() {
	  	
  	function playing_in_the_forge(){
		  
		$data = get_option('widget_playing_in_the_forge');
	  	$url_recentTracks = "http://ws.audioscrobbler.com/2.0/?"
		  ."method=user.getrecenttracks"
		  ."&user=" . $data['option1']
		  ."&limit=" . $data['option2']
		  ."&nowplaying=true"
		  ."&api_key=2631af26c2ecf7e13c70553f0af529b3";
		
		$results = file_get_contents($url_recentTracks);
		$dom = new DOMDocument();
		$dom->loadXML($results);
		$tracks = $dom->getElementsByTagName("track");
		
	  	$url_TopTracks = "http://ws.audioscrobbler.com/2.0/?"
		  ."method=user.getTopTracks"
		  ."&user=" . $data['option1']
		  ."&preiod=7day"
		  ."&api_key=2631af26c2ecf7e13c70553f0af529b3";
		
		$results = file_get_contents($url_TopTracks);
		$dom = new DOMDocument();
		$dom->loadXML($results);
		$Toptracks = $dom->getElementsByTagName("track");
		
		foreach($Toptracks as $key=>$topTrack){
			$toptrack_artist = $topTrack->getElementsByTagName("artist")->item(0)->name->nodeValue;
			echo $toptrack_artist;
		}
		
		foreach($tracks as $key => $track){
			
			//get the nowplaying status
			$nowplaying = $track->getAttribute("nowplaying");
			
			if(($nowplaying != "") || ($key < $data['option2'])){
				
				$track_image = $track->getElementsByTagName("image")->item(2)->nodeValue;
				$track_link = $track->getElementsByTagName("url")->item(0)->nodeValue;
				$track_name = $track->getElementsByTagName("name")->item(0)->nodeValue;
				$track_artist = $track->getElementsByTagName("artist")->item(0)->nodeValue;
				$track_album = $track->getElementsByTagName("album")->item(0)->nodeValue;
		?>
		<?php if($key == 0) : ?><div class="now_playing_left"><?php endif; ?> 
		 
		<div class="lastfm_tracks <?php echo (($nowplaying != "") ? "nowplaying" : "previous"); ?>" id="track_<?php echo $key; ?>">
			<a href="<?php echo $track_link; ?>" target="_blank">
				<img src="<?php echo (($track_image != "") ? $track_image : "wp-content/plugins/forge_social/assets/image_default.png"); ?>" class="lastfm_image" /> 
			</a>
			<div class="lastfm_track_details">
				<span class="lastfm_track_name"><?php echo $track_name; ?></span>
				<span class="lastfm_track_artist"><?php echo $track_artist; ?></span>
				<span class="lastfm_track_album"><?php echo $track_album; ?></span>
				<?php if(($nowplaying != "") && ($key == 0)) : ?>
					<span class="lastfm_track_nowplaying">Listening now.</span>
				<?php endif; ?>
			</div>
		</div>
		<?php if($key == 0) : ?> 
			<div class="music_follow">
				<p class="music_follow_row">
					<img src="/wp-content/plugins/forge_social/assets/lastfm.png" />
					<a href="http://www.last.fm/user/<?php echo $data['option1']; ?>" class="lastfm_social" target="_blank">
						<span>Follow us on Last.fm</span>
					</a>
				</p>
				<p class="music_follow_row">
					<img src="/wp-content/plugins/forge_social/assets/spotifyIcon.png" />
					<a href="http://open.spotify.com/user/humpo2uk" class="spotify_social" target="_blank">
						<span>Follow us on Spotify</span>
					</a>
				</p>
			</div>
		<?php endif; ?>
		<?php if($key == 0) : ?></div><?php endif; ?>
		<?php
		
			}
		}
	  }
	  
	  function add_stylesheet(){
		$forge_stylesheetURL = plugins_url('/assets/stylesheet.css', __FILE__); // Respects SSL, Style.css is relative to the current file
        $forge_stylesheetFile = WP_PLUGIN_DIR . '/forge_social/assets/stylesheet.css';
        if ( file_exists($forge_stylesheetFile) ) {
            wp_register_style('ForgeStylesheets', $forge_stylesheetURL);
            wp_enqueue_style( 'ForgeStylesheets' );
        }
	  }
	  
	  function widget_playing_in_the_forge($args){
	  
	  	  // Collect our widget's options, or define their defaults.
		  $options = get_option('widget_playing_in_the_forge');
		  $title = empty($options['title']) ? __("What we're listening to in the office.") : $options['title'];
			
		  extract($args);
		  echo $before_widget;
		  echo $before_title;
		  echo $title;
		  echo $after_title;
		  playing_in_the_forge();
		  echo $after_widget;
	  }  
	  
	  // This is the function that outputs the form to let users edit
	  // the widget's title. It's an optional feature, but were're doing 
	  // it all for you so why not!
	  
	  function widget_playing_in_the_forge_control(){
	  
		// Collect our widget options.
		$options = $newoptions = get_option('widget_playing_in_the_forge');
		
		// This is for handing the control form submission.
		if ( $_POST['widget_playing_in_the_forge-submit'] ) 
		{
			// Clean up control form submission options
			$newoptions['title'] = strip_tags(stripslashes($_POST['widget_playing_in_the_forge-title']));
			$newoptions['option1'] = strip_tags(stripslashes($_POST['widget_playing_in_the_forge-username']));
			$newoptions['option2'] = strip_tags(stripslashes($_POST['widget_playing_in_the_forge-limit']));
			$newoptions['option3'] = strip_tags(stripslashes($_POST['widget_playing_in_the_forge-spotify_username']));
		}
				
		// If original widget options do not match control form
		// submission options, update them.
		if ( $options != $newoptions ) 
		{
			$options = $newoptions;
			update_option('widget_playing_in_the_forge', $options);
		}
						
		$title = attribute_escape($options['title']);
		$option1 = attribute_escape($options['option1']);
		$option2 = attribute_escape($options['option2']);
		$option3 = attribute_escape($options['option3']);

		echo '<p><label for="playing_in_the_forge-title">Title: </label>';
		echo '<input style="width: 250px;" id="widget_playing_in_the_forge-title" name="widget_playing_in_the_forge-title" type="text" value="';
		echo $title;
		echo '" />';
		echo '</p>';
		echo '<p><label for="playing_in_the_forge-username">Last.fm Username: </label>';
		echo '<input style="width: 250px;" id="widget_playing_in_the_forge-username" name="widget_playing_in_the_forge-username" type="text" value="';
		echo $option1;
		echo '" />';
		echo '</p>';
		echo '<p><label for="playing_in_the_forge-spotify_username">Spotify Username: </label>';
		echo '<input style="width: 250px;" id="widget_playing_in_the_forge-spotify_username" name="widget_playing_in_the_forge-spotify_username" type="text" value="';
		echo $option3;
		echo '" />';
		echo '</p>';
		echo '<p><label for="playing_in_the_forge-limit">Limit recent tracks: </label>';
		echo '<input style="width: 250px;" id="widget_playing_in_the_forge-limit" name="widget_playing_in_the_forge-limit" type="text" value="';
		echo $option2;
		echo '" />';
		echo '</p>';
		echo '<input type="hidden" id="widget_playing_in_the_forge-submit" name="widget_playing_in_the_forge-submit" value="1" />';
	  }
	  
	  
	// This registers the widget.
    register_sidebar_widget('Playing in the Forge', 'widget_playing_in_the_forge');
	
	// This registers the (optional!) widget control form.
    register_widget_control('Playing in the Forge', 'widget_playing_in_the_forge_control');
	
  }
  
  add_action('wp_enqueue_scripts', 'add_stylesheet');
  add_action('plugins_loaded', 'widget_playing_in_the_forge_init');

?>
