<?php
// Add these functions to your functions.php file

// add the shortcode handler for YouTube videos
function addYouTube($atts, $content = null) {
        extract(shortcode_atts(array( "id" => '' ), $atts));
        return '<p style="text-align:center"><a href="http://www.youtube.com/v/'.$id.'"><img src="http://img.youtube.com/vi/'.$id.'/0.jpg" width="400" height="300" class="aligncenter" /><span>Watch the video</span></a></p>';
}
add_shortcode('youtube', 'addYouTube');

function add_youtube_button() {
   // Don't bother doing this stuff if the current user lacks permissions
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
     return;
 
   // Add only in Rich Editor mode
   if ( get_user_option('rich_editing') == 'true') {
     add_filter("mce_external_plugins", "add_youtube_tinymce_plugin");
     add_filter('mce_buttons', 'register_youtube_button');
   }
}
 
function register_youtube_button($buttons) {
   array_push($buttons, "|", "youryoutube");
   return $buttons;
}
 
// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
function add_youtube_tinymce_plugin($plugin_array) {
   $plugin_array['youryoutube'] = get_bloginfo('template_url').'/editor_plugin.js';
   return $plugin_array;
}
 
function my_refresh_mce($ver) {
  $ver += 3;
  return $ver;
}

// init process for button control
add_filter( 'tiny_mce_version', 'my_refresh_mce');
add_action('init', 'add_youtube_button');
?>