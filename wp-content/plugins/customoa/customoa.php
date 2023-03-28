<?php
/*
Plugin Name: OpenAgenda Events
Description: A custom plugin for adding and editing OpenAgenda events to the Coolturalia WordPress website.
Version: 1.0
Author: <a href="https://okapistudio.com">OKAPI</a>
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define plugin constants
define( 'CUSTOMOA_VERSION', '1.0' );
define( 'CUSTOMOA_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'CUSTOMOA_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Include plugin files
include( CUSTOMOA_PLUGIN_PATH . 'includes/class-events-list.php' );
include( CUSTOMOA_PLUGIN_PATH . 'includes/class-edit-event.php' );
include( CUSTOMOA_PLUGIN_PATH . 'includes/frontend.php' );
include( CUSTOMOA_PLUGIN_PATH . 'includes/functions.php' );


// Register activation and deactivation hooks
register_activation_hook( __FILE__, 'customoa_activate' );
register_deactivation_hook( __FILE__, 'customoa_deactivate' );


/**
 * Initializes the CustomOA plugin.
 */
function customoa_init() {
    // Register the CustomOA shortcode
    add_shortcode( 'customoa', 'customoa_shortcode' );
}
add_action( 'init', 'customoa_init' );

/**
 * Activates the CustomOA plugin.
 */
function customoa_activate() {
    // No activation tasks required
}

/**
 * Deactivates the CustomOA plugin.
 */
function customoa_deactivate() {
    // No deactivation tasks required
}
