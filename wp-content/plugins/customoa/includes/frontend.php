<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Displays content
 *
 * @param array $atts Shortcode attributes.
 *
 * @return string The custom text.
 */
function customoa_shortcode( $atts ) {
    $oa_calendar_uid = get_option( 'customoa_oa_calendar_uid' );
    $calendar = get_option( 'customoa_oa_calendar_' . $oa_calendar_uid );


    if (  ! empty( $calendar ) ) {

        foreach ( $calendar as $event ) {
            echo 'Event Title: ' . $event['title']['fr'] . '<br>';
        }

    }

    return '';
}


/**
 * Initializes the frontend.
 */
function customoa_frontend_init() {
    // Register the CustomOA shortcode
    add_shortcode( 'customoa', 'customoa_shortcode' );
}
add_action( 'init', 'customoa_frontend_init' );