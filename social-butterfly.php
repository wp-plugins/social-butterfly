<?php

/*
Plugin Name: Social Butterfly
Plugin URI: http://www.website101.net/social-butterfly-sleek-social-media-sharing-plugin-for-wordpress/
Description: Social Butterfly is a sleek and attractive social media sharing plugin offering users a unique, compact and enticing way to share your content. The plugin is lightweight, secure, and allows for easy integration above and below content on all posts as well as simple post override settings.
Version: 1.0
Author: Mohammed Khalfan
License: GPLv2 or later
Text Domain: social-butterfly
*/

function social_butterfly_slider_activation() {
}
register_activation_hook(__FILE__, 'social_butterfly_slider_activation');

function social_butterfly_slider_deactivation() {
}
register_deactivation_hook(__FILE__, 'social_butterfly_slider_deactivation');

load_plugin_textdomain('social-butterfly', false, basename( dirname( __FILE__ ) ) . '/languages' );

/********************
/* Admin Settings   *
/********************/
add_action('admin_menu', 'social_butterfly_plugin_settings');

function social_butterfly_plugin_settings() {
	add_options_page('Social Butterfly Settings', 'Social Butterfly', 'administrator', 'social-butterfly-settings', 'social_butterfly_display_settings');
}

function social_butterfly_display_settings() {
	
	$show_top = (get_option('social_butterfly_show_top') == true) ? 'checked' : '';
	$show_bot = (get_option('social_butterfly_show_bot') == true) ? 'checked' : '';

	$show_fb = (get_option('social_butterfly_show_fb') == true) ? 'checked' : '';
	$show_tw = (get_option('social_butterfly_show_tw') == true) ? 'checked' : '';
	$show_ggl = (get_option('social_butterfly_show_ggl') == true) ? 'checked' : '';
	$show_li = (get_option('social_butterfly_show_li') == true) ? 'checked' : '';

	if (get_option('social_butterfly_do_override') == "true"){
                delete_post_meta_by_key('post_show_top');
                delete_post_meta_by_key('post_show_bot');
                delete_post_meta_by_key('post_do_override');
                update_option('social_butterfly_do_override', "false");
        }

	include ('templates/settings.php');
}

/********************
/* Load Scripts     *
/********************/
add_action('wp_enqueue_scripts', 'social_butterfly_scripts');
function social_butterfly_scripts() {
	wp_register_style('social_butterfly_css', plugins_url('css/style.css', __FILE__));
	wp_enqueue_style('social_butterfly_css');
	if (get_option('social_butterfly_show_ggl') == true) {
		wp_enqueue_script( 'social_butterfly_ggl_js', plugins_url('js/google-plus-one.js', __FILE__), array(), '1.0.0', true );
	}
}

/**************************************************
/* Adds the meta box stylesheet when appropriate  *
/**************************************************/
add_action( 'admin_print_styles', 'social_butterfly_admin_styles' );
function social_butterfly_admin_styles(){
    global $typenow;
    if( $typenow == 'post' ) {
        wp_enqueue_style('social_butterfly_meta_box_styles', plugins_url('css/post.css', __FILE__));
    }
}

/********************
/* Display Top     *
/********************/
add_filter( 'the_content', 'social_butterfly_display_top', 1);
function social_butterfly_display_top($content) {
	global $post;
	$values = get_post_custom( $post->ID );
	$post_show_top = isset( $values['post_show_top'] ) ? esc_attr( $values['post_show_top'][0] ) : get_option('social_butterfly_show_top');

	$share_bar_code = '';
        if( $post_show_top == true && in_the_loop() && is_single() ) {
		$i = ''; // used in the include below 
		include ('templates/build-bar.php');
		return $share_bar_code . $content;
	}
	else {
		return $content;
	}
	
}

/********************
/* Display Bottom   *
/********************/
add_filter( 'the_content', 'social_butterfly_display_bot');
function social_butterfly_display_bot($content) {
	global $post;
	$values = get_post_custom( $post->ID );
	$post_show_bot = isset( $values['post_show_bot'] ) ? esc_attr( $values['post_show_bot'][0] ) : get_option('social_butterfly_show_bot');
	
	$share_bar_code = '';
	if( $post_show_bot == true && in_the_loop() && is_single() ) { 
		$i = '_bot';
		include ('templates/build-bar.php');
		return $content . $share_bar_code;
	}
	else {
		return $content;
	}
}


/********************
/*  Post Settings   *
/********************/
add_action('add_meta_boxes', 'add_post_options' );

function add_post_options() {
    	add_meta_box( 'social_butterfly_post_options', 'Social Butterfly', 'display_post_options', 'post');
	load_plugin_textdomain('social-butterfly', false, basename( dirname( __FILE__ ) ) . '/languages' );
}

function display_post_options() {
	global $post;
	$values = get_post_custom( $post->ID );

	$post_show_top = isset( $values['post_show_top'] ) ? esc_attr( $values['post_show_top'][0] ) : get_option('social_butterfly_show_top');
	$top_checked = ($post_show_top == true ? 'checked' : '');

	$post_show_bot = isset( $values['post_show_bot'] ) ? esc_attr( $values['post_show_bot'][0] ) : get_option('social_butterfly_show_bot');
	$bot_checked = ($post_show_bot == true ? 'checked' : '');

	$post_do_override = isset( $values['post_do_override'] ) ? esc_attr( $values['post_do_override'][0] ) : 0;
        $post_do_override_checked = ($post_do_override == true ? 'checked' : '');
        $disabled = ($post_do_override == true ? '' : 'disabled');

	wp_nonce_field( 'post-show-top-box', 'post_show_top_box' );

	$html = "<label style='display:inline-block;padding:0 3px 3px 0;'><strong>Manually Override the Default Settings for this Post</strong></label><input id='post_do_override_checkbox' type='checkbox' name='post_do_override' value='true' $post_do_override_checked onchange='enableOverride()'/><br />";
        $html .= "<label id='post_show_top_checkbox_label' class='$disabled'>Include share bar below the title </label><input id='post_show_top_checkbox' type='checkbox' name='post_show_top' value=true $top_checked $disabled style='margin:1px 3px;'/><br />";
        $html .= "<label id='post_show_bot_checkbox_label' class='$disabled'>Include share bar below the content </label><input id='post_show_bot_checkbox' type='checkbox' name='post_show_bot' value=true $bot_checked $disabled style='margin:1px 3px;'/>";

        $html .= '
<script type="text/javascript">
	function enableOverride() {
		if (jQuery("#post_do_override_checkbox").is(":checked")){
			jQuery("#post_show_top_checkbox").prop("disabled", false);
			jQuery("#post_show_bot_checkbox").prop("disabled", false);
			jQuery("#post_show_top_checkbox_label").removeClass("disabled");
			jQuery("#post_show_bot_checkbox_label").removeClass("disabled");
		}
		else{
			jQuery("#post_show_top_checkbox").prop("disabled", true);
			jQuery("#post_show_bot_checkbox").prop("disabled", true);
			jQuery("#post_show_top_checkbox_label").addClass("disabled");
			jQuery("#post_show_bot_checkbox_label").addClass("disabled");
		}
	}
</script>';

	echo $html;
}

add_action( 'save_post', 'post_options_save' );
function post_options_save($postID){

	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	if( !isset( $_POST['post_show_top_box'] ) || !wp_verify_nonce( $_POST['post_show_top_box'], 'post-show-top-box' ) ) return;

	if( !current_user_can( 'edit_post' ) ) return;

        if ( isset ($_POST['post_do_override']) && $_POST['post_do_override'] == true){
                update_post_meta($postID, 'post_do_override', true ); 
                if( isset( $_POST['post_show_top'] ) && $_POST['post_show_top'] == true){
                        update_post_meta($postID, 'post_show_top', true ); 
                }       
                else{   
                        update_post_meta($postID, 'post_show_top', false );
                }
                
                if( isset( $_POST['post_show_bot'] ) && $_POST['post_show_bot'] == true){
                        update_post_meta($postID, 'post_show_bot', true ); 
                }       
                else{
                        update_post_meta($postID, 'post_show_bot', false );
                }       
        }       
        else {  
                update_post_meta($postID, 'post_do_override', false );
                delete_post_meta($postID, 'post_show_top');
                delete_post_meta($postID, 'post_show_bot');
        }
}

/*************************
/* Plugin Action Links   *
/*************************/
add_filter('plugin_action_links', 'social_butterfly_plugin_action_links', 10, 2);

function social_butterfly_plugin_action_links($links, $file) {
    static $this_plugin;

    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }

    if ($file == $this_plugin) {
        // The "page" query string value must be equal to the slug
        // of the Settings admin page we defined earlier, which in
        // this case equals "myplugin-settings".
        $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=social-butterfly-settings">' . __('Settings', 'social-butterfly') .'</a>';
        array_unshift($links, $settings_link);
    }
    return $links;
}

?>
