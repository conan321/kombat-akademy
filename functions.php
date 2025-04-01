<?php
// Register Scripts/Styles
function register_scripts() {
	// Note: Add a version number (string) which will be included in filename's ver parameter to refresh the cache.
	// time() will include the current time, but will result in higher cpu usage. false will include the current WordPress version. null will exclude a version number.

	// Normalize
	wp_register_style('normalize', get_stylesheet_directory_uri() . '/assets/css/normalize.css', array(), null);

	// Parent Theme Style
	wp_register_style('customify-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->parent()->get('Version'));
	// Child Theme Style
	wp_register_style('customify-child-style', get_stylesheet_uri(), array('customify-style'), '1.1.10');

	// jQuery
	wp_register_script('jquery-3-4-1', get_stylesheet_directory_uri() . '/assets/js/jquery-3.4.1.js', array(), null);

	// Script
	wp_register_script('script', get_stylesheet_directory_uri() . '/assets/js/script.js', array(), '1.0.12', true);

	// Light Theme
	wp_register_style('light-theme', get_stylesheet_directory_uri() . '/assets/css/light-theme.css', array(), '1.0.8');

	// Button Icons
	wp_register_style('button-icons', get_stylesheet_directory_uri() . '/assets/css/btn-icons.css', array(), '1.0.2');

	// Move List Page
	wp_register_style('move-list', get_stylesheet_directory_uri() . '/assets/css/move-list.css', array(), '1.0.8');
	wp_register_script('move-list', get_stylesheet_directory_uri() . '/assets/js/move-list.js', array(), '1.0.3', true);

	// Combos Page
	wp_register_style('combos', get_stylesheet_directory_uri() . '/assets/css/combos.css', array(), '1.0.7');
	wp_register_script('combos', get_stylesheet_directory_uri() . '/assets/js/combos.js', array(), '1.0.4', true);

	// Gameplay Page
	wp_register_style('gameplay', get_stylesheet_directory_uri() . '/assets/css/gameplay.css', array(), '1.0.0');

	// Tier Maker Page
	wp_register_style('tier-maker', get_stylesheet_directory_uri() . '/assets/css/tier-maker.css', array(), '1.0.5');
	wp_register_script('tier-maker', get_stylesheet_directory_uri() . '/assets/js/tier-maker.js', array(), '1.0.10', true);
	wp_register_script('html2canvas', get_stylesheet_directory_uri() . '/assets/js/html2canvas.js');
	wp_register_script('Sortable', get_stylesheet_directory_uri() . '/assets/js/Sortable.js');

	// Characters Page
	wp_register_style('characters', get_stylesheet_directory_uri() . '/assets/css/characters.css', array(), '1.0.4');
	wp_register_style('character-stats', get_stylesheet_directory_uri() . '/assets/css/character-stats.css', array(), '1.0.1');
	wp_register_script('characters', get_stylesheet_directory_uri() . '/assets/js/characters.js', array(), '1.0.4', true);

	// Kameos Page
	wp_register_style('kameos', get_stylesheet_directory_uri() . '/assets/css/kameos.css', array(), '1.0.2');

	// Character Page
	wp_register_style('character', get_stylesheet_directory_uri() . '/assets/css/character.css', array(), '1.0.9');
	wp_register_script('character', get_stylesheet_directory_uri() . '/assets/js/character.js', array(), '1.0.4', true);

	// Kameo Page
	wp_register_style('kameo', get_stylesheet_directory_uri() . '/assets/css/kameo.css', array(), '1.0.0');
}
add_action('wp_loaded', 'register_scripts');

// Enqueue Scripts/Styles
function enqueue_scripts() {
	// Normalize
	wp_enqueue_style('normalize');

	// Parent Theme
	wp_enqueue_style('customify-style');
	// Child Theme
	wp_enqueue_style('customify-child-style');

	// jQuery
	wp_enqueue_script('jquery-3-4-1');

	// Script
	wp_enqueue_script('script');

	// Light Theme
	wp_enqueue_style('light-theme');

	// Button Icons
	wp_enqueue_style('button-icons');

	// Move List Page
	if (is_page('move-list')) {
		wp_enqueue_style('move-list');
		wp_enqueue_script('move-list');
	}

	// Combos Page
	else if (is_page('combos')) {
		wp_enqueue_style('combos');
		wp_enqueue_script('combos');
	}

	// Gameplay Page
	else if (is_page('gameplay')) {
		wp_enqueue_style('gameplay');
	}

	// Tier Maker Page
	else if (is_page('tier-maker')) {
		wp_enqueue_style('tier-maker');
		wp_enqueue_script('tier-maker');
		wp_enqueue_script('html2canvas');
		wp_enqueue_script('Sortable');
	}

	// Characters Page
	else if (is_page('characters')) {
		wp_enqueue_style('characters');
		wp_enqueue_style('character-stats');
		wp_enqueue_script('characters');
	}

	// Kameos Page
	else if (is_page('kameos')) {
		wp_enqueue_style('kameos');
	}

	else {
		// Character Page
		$character_page = get_post(wp_get_post_parent_id(get_queried_object_id()));
		if ($character_page && $character_page->post_title == 'Characters' && !is_page('characters')) {
			wp_enqueue_style('character');
			wp_enqueue_style('character-stats');
			wp_enqueue_script('character');
			return;
		}

		// Kameo Page
		$kameo_page = get_post(wp_get_post_parent_id(get_queried_object_id()));
		if ($kameo_page && $kameo_page->post_title == 'Kameos' && !is_page('kameos')) {
			wp_enqueue_style('kameo');
			return;
		}
	}
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

// PHP Shortcode
include('assets/php/php.php');

// Platform
function include_svg() {
	include('assets/img/btn-icons.svg');
}
add_action('wp_head', 'include_svg'); // Include SVG when wp_head hook is called, preventing error in dashboard

// Include File - Example: include_file('path/to/file.php', array('argument'))
function include_file($filepath, $a = array()) {
   ob_start(); // Start output buffering
   include('assets/php/' . $filepath); // Include file and wait until buffering ends before outputting
   $output = ob_get_clean(); // End output buffering
   echo $output; // Print file content to screen
}

// Automatically Update Plugins
add_filter( 'auto_update_plugin', '__return_true' );

// Disable Showing Author Name When Sharing Site Url to Social Media
function disable_embeds_filter_oembed_response_data_( $data ) {
	unset($data['author_url']);
	unset($data['author_name']);
	return $data;
}
add_filter( 'oembed_response_data', 'disable_embeds_filter_oembed_response_data_' );