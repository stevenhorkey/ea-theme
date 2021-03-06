<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}


/**
 * Is the current page the last page of the multi-page post.
 *
 * @return bool True if last page, False otherwise.
 */
function is_last_page() {
	global $page, $numpages, $multipage;
	if ( $multipage ) {
		if ( $page != $numpages ) {
			return false;
		} else {
			return true;
		}
	}
	return true;
}


function addPostFormHTMLInstance(){
	
	global $wpdb;
	
	$sql = $wpdb->prepare("INSERT INTO `wp_user_post_form_instances` (`post_id`,`user_id`,`html_content`) values (%d,%d,%s)", $_POST['postId'], $_POST['userId'], $_POST['content']);

	$result = $wpdb->query($sql);

	return $result;
}

function getPostFormHTMLInstances(){
	// return json array of post instances for user for that specific post they are at. 
	global $wpdb;

	$get = json_decode($_GET);
	$userId = $_GET['userId'];
	$postId = $_GET['postId'];

	$query = "SELECT * FROM `wp_user_post_form_instances` WHERE (`user_id` = $userId) AND (`post_id` = $postId) ORDER BY `date_created` DESC";

    $items = $wpdb->get_results($query);

	return json_encode($items);
}

add_action( 'rest_api_init', function () {
	register_rest_route( 'wp/v2', '/addPostFormHTMLInstance/', array(
			'methods' => 'POST',
			'callback' => 'addPostFormHTMLInstance'
	) );
} );

add_action( 'rest_api_init', function () {
	register_rest_route( 'wp/v2', '/getPostFormHTMLInstances/', array(
			'methods' => 'GET',
			'callback' => 'getPostFormHTMLInstances'
	) );
} );



add_theme_support('post-thumbnails'); 

