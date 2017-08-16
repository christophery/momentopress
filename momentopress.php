<?php
/*
Plugin Name: MomentoPress
Description: Add 360° VR images to your WordPress site using Momento360.
Version:     1.0.0
Author:      Chris Yee
Author URI:  https://chrisyee.ca
License:     GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
Text Domain: momentopress
*/

/*
* Register CSS
*/

function momentopress_register_css(){
	wp_register_style( 'momentopress', plugins_url( 'momentopress/css/main.css' ) );
	wp_enqueue_style( 'momentopress' );
}

add_action('init', 'momentopress_register_css');

/*
* Create shortcode
*/

function momentopress_shortcode( $atts = [], $content = null, $tag = '' ){
	//normalize attribute keys, lowercase
    $atts = array_change_key_case( (array)$atts, CASE_LOWER );
 
    //override default attributes with user attributes
    $wporg_atts = shortcode_atts(
    	[
			'url' => 'https://momento360.com/e/u/a36c75a572b84b70b21432557441d352', //default URL
		], $atts, $tag
	);

    //build embed code
	$momento_embed_code = '<div class="momentopress-container">';
	$momento_embed_code .=	'<iframe class="momentopress-embed" src="' . $wporg_atts['url'] . '" width="300" height="150" allowfullscreen="allowfullscreen"></iframe>';
	$momento_embed_code .= '</div>';

	//output embed code
	return $momento_embed_code;
}

add_shortcode('momentopress', 'momentopress_shortcode');