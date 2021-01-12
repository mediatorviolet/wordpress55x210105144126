<?php
// Devserver pre-load
if (file_exists('eds-preload.php')) {
	@include('eds-preload.php');
} else {
	echo '<pre>';
	echo "Unable to connect." . PHP_EOL;
	echo "If the error persists, please leave a message  : <a href='https://github.com/easyphp/easyphp-devserver/issues' target='_blank'>here</a>";
	echo '</pre>'; 
	exit;
}

/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
require __DIR__ . '/wp-blog-header.php';
