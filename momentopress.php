<?php
/*
Plugin Name: MomentoPress
Description: Add 360° VR images and videos easily to your WordPress site using Momento360.
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
	wp_register_style( 'momentopress', plugins_url( 'momentopress/css/momentopress.css' ) );
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
    $momentopress_atts = shortcode_atts(
    	[
			'url' => 'https://momento360.com/e/u/f07d802caeb9499694a0f8cb1e661fde', //default URL
		], $atts, $tag
	);

    //build embed code
	$momentopress_embed = '<div class="momentopress-container">';
	$momentopress_embed .=	'<iframe class="momentopress-embed" src="' . $momentopress_atts['url'] . '" allowfullscreen="allowfullscreen"></iframe>';
	$momentopress_embed .= '</div>';

	//output embed code
	return $momentopress_embed;
}

add_shortcode('momentopress', 'momentopress_shortcode');