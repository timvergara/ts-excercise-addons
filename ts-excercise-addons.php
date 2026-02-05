<?php
/*
Plugin Name: TS Exercise Addoons
Plugin URI: https://timothyroyvergara.com/
Description: Contains addons need for exercise
Author: Timothy Roy Vergara
Version: 1.0.0
Author URI: https://timothyroyvergara.com/
Text Domain: ts-excercise-addons
@package ts-excercise-addons
*/

define( 'TS_EXERCISE_ADDONS_DIR', WP_PLUGIN_URL . '/' . basename( __DIR__ ) );
define( 'TS_EXERCISE_ADDONS_PATH', WP_PLUGIN_DIR . '/' . basename( __DIR__ ) );

define( 'TS_EXERCISE_ADDONS_WP_DIR', get_bloginfo( 'wpurl' ) );
define( 'TS_EXERCISE_ADDONS_PLUGIN_NAME', 'TS Exercise Addoons' );
define( 'TS_EXERCISE_ADDONS_VERSION', '1.0.0' );

if ( ! defined( 'TS_EXERCISE_ADDONS_OPTIONS' ) ) {
	define( 'TS_EXERCISE_ADDONS_OPTIONS', '_ts_exercise_addons_options' );
}

/**
 * Load ACF JSON from plugin directory
 */
add_filter( 'acf/settings/load_json', 'ts_exercise_addons_acf_json_load_point' );

function ts_exercise_addons_acf_json_load_point( $paths ) {
	// Remove original path (optional)
	unset( $paths[0] );

	// Append path
	$paths[] = TS_EXERCISE_ADDONS_PATH . '/acf-json';

	return $paths;
}

/**
 * Save ACF JSON to plugin directory
 */
add_filter( 'acf/settings/save_json', 'ts_exercise_addons_acf_json_save_point' );

function ts_exercise_addons_acf_json_save_point( $path ) {
	$path = TS_EXERCISE_ADDONS_PATH . '/acf-json';

	return $path;
}

require_once 'includes/class-best-seller.php';