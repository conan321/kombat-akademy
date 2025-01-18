<?php
function php_shortcode($atts = array()) {
	// Default Parameters
	extract(shortcode_atts(array(
		'file' => '',
	), $atts));

	// Output PHP file
	ob_start();
	include $file . '.php';

	return ob_get_clean();
}
add_shortcode('php', 'php_shortcode');
?>