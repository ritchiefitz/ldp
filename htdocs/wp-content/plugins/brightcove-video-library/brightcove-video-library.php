<?php
/*
Plugin Name: Brightcove Video Library
Plugin URI: http://codex.wordpress.org/brightcove_video_library
Description: Adds a video library administration menu for brightcove users
Author: Ryker Blunck
Author URI: http://www.byuicomm.net
*/

// Hook for adding admin menus
if(is_admin()){//only on backend pages
    add_action('admin_menu', 'video_library');
}else{// front-end stuff
    add_action('wp_enqueue_scripts', 'video_loader', 100);
}
// action function for above hook
function video_library() {
    // Add a new submenu under Settings: someday this will work...
    // add_options_page( 'Video Library Options', 'Video Library Options', 'manage_options', 'brightcove_library_options', 'video_library_settings_page' );

    // Add a new top-level menu
    add_menu_page('Video Library', 'Video Library', 'edit_posts', 'bc_video_library', 'video_library_page', plugins_url('favicon-2.png',  __FILE__),  11 );
}

//this function executes when the video library page loads.
function video_library_page(){
    wp_register_style( 'bc_style', plugins_url( 'style.css', __FILE__ ) );
    wp_enqueue_style( 'bc_style' ); 
    wp_register_script( 'bc_scripts', plugins_url( 'scripts.js', __FILE__ ) );
    wp_enqueue_script( 'bc_scripts' );
    // allowed to edit and delete videos
    if(current_user_can('edit_pages')){
		wp_register_script( 'bc_admin_scripts', plugins_url( 'admin-scripts.js', __FILE__ ) );
		wp_enqueue_script( 'bc_admin_scripts' );
    }
    // allowed to upload videos
    if(current_user_can('edit_posts')){
        wp_register_script( 'bc_upload_scripts', plugins_url( 'upload-scripts.js', __FILE__ ) );
        wp_enqueue_script( 'bc_upload_scripts' );
        wp_register_script( 'plupload-full', plugins_url( 'plupload/js/plupload.full.js', __FILE__ ) );
        wp_enqueue_script( 'plupload-full' );
    }
    
    // php for the page
    include "bc-content.php";
}

//This includes the scripts for front-end brightcove functions
function video_loader(){
    wp_register_script('bc_front_end', plugins_url('brightcove-functions.js', __FILE__ ) );
    wp_enqueue_script('bc_front_end');
}

/*********************************************
// add post meta for attaching videos NOT NECESSARY FOR THE AGENCY SITE
**********************************************
/* Define the custom box */

add_action( 'add_meta_boxes', 'brightcove_meta_box' );

/* Do something with the data entered */
add_action( 'save_post', 'brightcove_save_meta' );

/* Adds a box to the main column on the Post and Page edit screens */
function brightcove_meta_box() {
    add_meta_box('brightcove_attach', 'Attach a Video', 'brightcove_create_box', 'post', 'advanced' ,'high');
}

/* Prints the box content */
function brightcove_create_box( $post ) {
    // Use nonce for verification
    wp_nonce_field( plugin_basename( __FILE__ ), 'bc_nonce' );

    // The actual fields for data entry
    // Use get_post_meta to retrieve an existing value from the database and use the value for the form
    $meta = get_post_meta($post->ID, '_my_meta', true );
    $value = $meta['videoid'];
    ?>
    <label for="video_id">Video ID</label>
    <input type="text" id="video_id" name="video_id" value="<?php echo $value ?>" size="25" />
    <p>Title: <span id="video_title">No Video Found</span></p>
    <?php if($value == "") { ?>
    <p>To attach a video, upload it to the <a href="/wp-admin/admin.php?page=bc_video_library">Video Library.</a> You will be given a video ID. Copy the ID here and save your post.</p>
    <?php } else { //query brightcove for the data?>
        <script>
            function callback(data){
                jQuery('#video_title').html(data.name)
            }

            var url = "http://api.brightcove.com/services/library?command=find_video_by_id&token=5lr_GNp0hRNSZA31TEWbzPQgygwb6H277DEXcZLPAmbBzVJVeVE2Ig..&video_id=<?php echo $value ?>&video_fields=name&callback=callback";
            var scriptTag = document.createElement("script");
            scriptTag.setAttribute("type", "text/javascript");
            scriptTag.setAttribute("charset", "utf-8");
            scriptTag.setAttribute("src", url);
            scriptTag.setAttribute("id", "return");
            jQuery('head').append(scriptTag);
        </script>
    <?php }
}

/* When the post is saved, saves our custom data */
function brightcove_save_meta( $post_id ) {
    // verify if this is an auto save routine. 
    // If it is our form has not been submitted, so we dont want to do anything
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;

    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times

    if ( !isset( $_POST['bc_nonce'] ) || !wp_verify_nonce( $_POST['bc_nonce'], plugin_basename( __FILE__ ) ) )
        return;


    // Check permissions
    if ( !current_user_can( 'edit_post', $post_id ) )
        return;

    // OK, we're authenticated: we need to find and save the data

    //sanitize user input
    $mydata = sanitize_text_field( $_POST['video_id'] );
    $meta = array("videoid" => $mydata);

    update_post_meta($post_id, '_my_meta', $meta);
} 

/*************************
* Add shortcodes 
* This code came from here
* http://wp.tutsplus.com/tutorials/theme-development/wordpress-shortcodes-the-right-way/
*************************/

// This covers adding the shortcode
// [Brightcove Video]video_id[/Brightcove Video] in the editor will make a video
function brightcove_shortcode($atts, $content){ 

    return "<script language='JavaScript' type='text/javascript' src='http://admin.brightcove.com/js/BrightcoveExperiences.js'></script>"
            ."<div id='brightcove-video'>"
                ."<object id='myExperience' class='BrightcoveExperience'>"
                    ."<param name='bgcolor' value='#FFFFFF' />"
                    ."<param name='width'               value='620' />"
                    ."<param name='height'              value='349' />"
                    ."<param name='playerID'            value='696754907001' />"
                    ."<param name='playerKey'           value='AQ~~,AAAAocwtmPk~,RTQzrMOt-UDZQH4470qVL-nnGe_o-pgd' />"
                    ."<param name='isVid'               value='true' />"
                    ."<param name='isUI'                value='true' />"
                    ."<param name='dynamicStreaming'    value='true' />"
                    ."<param name='htmlFallback'        value='true' />"
                    ."<param name='@videoPlayer'        value='".$content."' />"
                ."</object>"
            ."</div>"
            ."<script type='text/javascript'>brightcove.createExperiences();</script>";
}

function register_brightcove_shortcode(){
    add_shortcode( 'Brightcove Video', 'brightcove_shortcode' );
}

// These functions add the button that types the code for you
// it's magic to me, see the URL above if you don't understand
function add_brightcove_plugin($plugin_array) {
   $plugin_array['brightcove_video'] = plugins_url('/brightcove-video-library/brightcove-button.js');
   return $plugin_array;
}

function register_brightcove_button($buttons) {
   array_push($buttons, "|", "brightcove_video");
   return $buttons;
}

function add_brightcove_button() {
   if ( current_user_can('edit_posts') )
   {
     add_filter('mce_external_plugins', 'add_brightcove_plugin');
     add_filter('mce_buttons', 'register_brightcove_button');
   }
}

add_action('init','register_brightcove_shortcode');
add_action('init', 'add_brightcove_button');
?>