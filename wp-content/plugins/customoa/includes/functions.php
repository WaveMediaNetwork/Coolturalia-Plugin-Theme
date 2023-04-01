<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}



function get_custom_event_data( $event_id ) {
    return get_option( 'customoa_event_options_'.$event_id );
}

function get_all_event_data( $event_id ) {
    $oa_calendar_uid = get_option( 'customoa_oa_calendar_uid' );
    $events_list = get_option( 'customoa_oa_calendar_' . $oa_calendar_uid );

    foreach ( $events_list as $ev_id => $event_data ) {

        if ( $ev_id == $event_id )
            return $event_data;

    }

    return false;
}