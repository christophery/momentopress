<?php
/*
Plugin Name: MomentoPress
Description: Add 360° VR images to your WordPress site using Momento360.
Version:     1.0.0
Author:      Chris Yee
Author URI:  https://chrisyee.ca
Text Domain: momentopress
*/

function register_styles(){
	wp_register_style( 'momentopress', plugins_url( 'momentopress/css/main.css' ) );
	wp_enqueue_style( 'momentopress' );
}

add_action('init', 'register_styles');

function create_embed_code($atts = [], $content = null, $tag = ''){

	// normalize attribute keys, lowercase
    $atts = array_change_key_case((array)$atts, CASE_LOWER);
 
    // override default attributes with user attributes
    $wporg_atts = shortcode_atts(
    	[
			'url' => 'https://momento360.com/e/u/a36c75a572b84b70b21432557441d352',
		], $atts, $tag
	);
?>
	<div class="momentopress-container">
		<iframe class="momentopress-embed" src="<?php echo $wporg_atts['url'] ?>" width="300" height="150" allowfullscreen="allowfullscreen"></iframe>
	</div>
<?php
}
add_shortcode('momentopress', 'create_embed_code');
?>