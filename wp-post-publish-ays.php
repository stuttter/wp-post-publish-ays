<?php

/**
 * Plugin Name: WP Post Publish AYS
 * Plugin URI:  https://wordpress.org/plugins/wp-post-publish-ays/
 * Author:      John James Jacoby
 * Author URI:  https://profiles.wordpress.org/johnjamesjacoby/
 * License:     GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Description: Shows an "Are you sure?" message before posts go live
 * Version:     0.1.0
 * Text Domain: wp-post-publish-ays
 * Domain Path: /assets/lang/
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * Enqueue the main JavaScript file
 *
 * @since 0.1.0
 */
function _wp_post_publish_ays() {

	$url = wp_post_publish_ays_get_plugin_url();
	$ver = wp_post_publish_ays_get_asset_version();

    // Enqueues
    wp_enqueue_script( 'wp_post_publish_ays', $url . 'assets/js/wp-post-publish-ays.js', array( 'jquery' ), $ver, true );

    // Localiz
    wp_localize_script( 'wp_post_publish_ays', 'WP_Post_Publish_AYS', array(
        'publish' => __( 'Publish', 'wp-post-publish-ays' ),
        'update'  => __( 'Update',  'wp-post-publish-ays' ),
        'confirm' => __( 'Are you sure you are ready to publish this?', 'wp-post-publish-ays' )
    ) );
}
add_action( 'admin_enqueue_scripts', '_wp_post_publish_ays' );

/**
 * Return the plugin's URL
 *
 * @since 0.1.0
 *
 * @return string
 */
function wp_post_publish_ays_get_plugin_url() {
	return plugin_dir_url( __FILE__ );
}

/**
 * Return the asset version
 *
 * @since 0.1.0
 *
 * @return int
 */
function wp_post_publish_ays_get_asset_version() {
	return 201602080001;
}

/**
 * Loads the translation file.
 *
 * @since 0.1.0
 */
function wp_post_publish_ays_i18n() {
	load_plugin_textdomain( 'wp-post-publish-ays', false, dirname( plugin_basename( __FILE__ ) ) . '/assets/lang/' );
}
