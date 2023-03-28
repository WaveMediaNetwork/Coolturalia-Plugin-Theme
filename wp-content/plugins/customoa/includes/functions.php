<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}



function get_event_data( $event_id ) {
    return get_option( 'customoa_event_options_'.$event_id );
}