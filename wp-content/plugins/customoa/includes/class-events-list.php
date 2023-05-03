<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * CustomOA Settings class.
 */
class CustomOA_Events_List {

    /**
     * Constructor.
     */
    public function __construct() {
        add_action( 'admin_init', array( $this, 'admin_init' ) );
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
        add_action( 'admin_post_customoa_save_agenda_keys', array( $this, 'save_open_agenda_keys' ) );
        add_action( 'admin_post_customoa_save_events_per_page', array( $this, 'save_events_per_page' ) );
        add_action( 'admin_post_customoa_search', array( $this, 'customoa_events_search' ) );
        add_action( 'admin_post_customoa_save_events_visibility', array( $this, 'save_events_visibility' ) );

    }

    /**
     * Register the plugin settings.
     */
    public function admin_init() {
        register_setting( 'customoa_options', 'customoa_oa_calendar_uid' );
    }

    /**
     * Add the plugin menu item.
     */
    public function admin_menu() {
        add_menu_page(
            __( 'CustomOA Settings', 'customoa' ),
            'OpenAgenda Events',
            'manage_options',
            'customoa',
            array( $this, 'admin_page' ),
            'dashicons-calendar-alt',
            6
        );
    }

    /**
     * Display the plugin settings page.
     */
    public function admin_page() {
        ?>
        <style>
            #openagenda-keys {
                display: flex;
                flex-direction: row;
                align-items: center;
            }

            #openagenda-keys label {
                margin-right: 10px;
            }

            #openagenda-keys input {
                margin-right: 30px;
            }

            .openagenda-keys-form-wrapper {
                padding: 30px 0 100px 0;
            }

            p.submit {
                padding: 0;
                margin: 0;
            }

            #event-search,
            #event-per-page {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: flex-start;
                align-items: center;
                gap: 10px;
            }

            .table-filters {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 10px;
                padding-right: 5%;
            }

        </style>

        <?php echo '<h1 class="wp-heading-inline">' . __( 'OpenAgenda Events', 'customoa' ) . '</h1>'; ?>
        <div class="openagenda-keys-form-wrapper">
            <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" id="openagenda-keys">
                <?php settings_fields( 'customoa_options' ); ?>
                <?php do_settings_sections( 'customoa' ); ?>
                <?php wp_nonce_field( 'customoa_options', 'customoa_options_nonce' ); ?>
                <input type="hidden" name="action" value="customoa_save_agenda_keys">

                <label for="customoa_openagenda_api"><?php _e( 'OpenAgenda API Key', 'customoa' ); ?></label>
                <input type="password" id="customoa_openagenda_api" name="customoa_openagenda_api" class="regular-text" value="<?php echo esc_attr( get_option( 'customoa_openagenda_api' ) ); ?>">

                <label for="customoa_oa_calendar_uid"><?php _e( 'OpenAgenda Calendar UID', 'customoa' ); ?></label>
                <input type="text" id="customoa_oa_calendar_uid" name="customoa_oa_calendar_uid" class="regular-text" value="<?php echo esc_attr( get_option( 'customoa_oa_calendar_uid' ) ); ?>">

                <?php submit_button( __( 'Get Events List', 'customoa' ) ); ?>

            </form>
        </div>

        <div class="table-filters">
            <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" id="event-search">
                <?php wp_nonce_field( 'customoa_events_search', 'customoa_events_search_nonce' ); ?>
                <input type="hidden" name="action" value="customoa_search">

                <input type="text" id="customoa_search_term" name="customoa_search_term" placeholder="<?php _e( 'Search events', 'customoa' ); ?>" value="<?php echo esc_attr( isset( $_GET['customoa_search_term'] ) ? $_GET['customoa_search_term'] : '' ); ?>">

                <?php submit_button( __( 'Search', 'customoa' ) ); ?>
            </form>
            <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" id="event-per-page">
                <?php settings_fields( 'customoa_options' ); ?>
                <?php do_settings_sections( 'customoa' ); ?>
                <?php wp_nonce_field( 'customoa_events_per_page', 'customoa_events_per_page_nonce' ); ?>
                <input type="hidden" name="action" value="customoa_save_events_per_page">

                <label for="customoa_events_per_page"><?php _e( 'Events per page', 'customoa' ); ?></label>
                <input type="number" id="customoa_events_per_page" name="customoa_events_per_page" min="5" max="100" value="<?php echo esc_attr( get_option( 'customoa_events_per_page' ) ); ?>">

                <?php submit_button( __( 'Update', 'customoa' ) ); ?>
            </form>
        </div>

        <?php

        // Display the Events Table
        $this->display_events_table();

    }

    /**
     * Returns Customized Events List
     */
    public function get_customoa_events_list() {        // Api Key => "26686d6669b041dfa1ca2d9a0e719525"
        $openagenda_api_key = get_option( 'customoa_openagenda_api' );
        $oa_calendar_uid = get_option( 'customoa_oa_calendar_uid' );

        if ( isset( $_GET['event_keys_updated'] ) && $_GET['event_keys_updated'] === 'true' )
            $oa_calendar_events = $this->get_openagenda_events( $oa_calendar_uid, $openagenda_api_key );
        else $oa_calendar_events = get_option( 'customoa_oa_calendar_' . $oa_calendar_uid);

        // Show a message if no events found
        if (empty($oa_calendar_events)) {
            $error_message = __( 'No events found! Make sure you entered the correct <strong>API Key</strong> and <strong>Calendar UID</strong>.', 'customoa' );
            echo '<div class="notice notice-error settings-error is-dismissible"><p>' . $error_message . '</p></div>';
            return '';
        }
        elseif ( isset( $_GET['event_keys_updated'] ) && $_GET['event_keys_updated'] === 'true' ) {
            $error_message = __( 'Your new <strong>API Key</strong> & <strong>Calendar UID</strong> saved!', 'customoa' );
            echo '<div class="notice notice-success settings-error is-dismissible"><p>' . $error_message . '</p></div>';
        }

        $customoa_events_list = array();
        foreach ( $oa_calendar_events as $event ) {
            $event_uid = $event['uid'];
            $customoa_events_list[$event_uid] = $event;

            if ( empty( $customoa_events_list[$event_uid]['type-devenement']['label']['fr'] ) ) {
                if ( !empty( $customoa_events_list[$event_uid]['types-devenement']['label']['fr'] ) )
                    $customoa_events_list[$event_uid]['type-devenement']['label']['fr'] = $customoa_events_list[$event_uid]['types-devenement']['label']['fr'];
                elseif ( !empty( $customoa_events_list[$event_uid]['type-devenement']['label']['en'] ) )
                    $customoa_events_list[$event_uid]['type-devenement']['label']['fr'] = $customoa_events_list[$event_uid]['type-devenement']['label']['en'];
                elseif ( !empty( $customoa_events_list[$event_uid]['types-devenement']['label']['en'] ) )
                    $customoa_events_list[$event_uid]['type-devenement']['label']['fr'] = $customoa_events_list[$event_uid]['types-devenement']['label']['en'];
                elseif ( !empty( $customoa_events_list[$event_uid]['test-champ-categories-differentes'][0]['label'] ) )
                    $customoa_events_list[$event_uid]['type-devenement']['label']['fr'] = $customoa_events_list[$event_uid]['test-champ-categories-differentes'][0]['label'];
                else $customoa_events_list[$event_uid]['type-devenement']['label']['fr'] = 'None';
            }

        }

        $customoa_events_list = apply_filters( 'update_customoa_events_details', $customoa_events_list );

        update_option( 'customoa_oa_calendar_' . $oa_calendar_uid, $customoa_events_list );

        return $customoa_events_list;
    }

    /**
     * Get OpenAgenda Events
     */
    public function get_openagenda_events( $agendaUid, $publicKey ) {
        $events = array();
        $total = PHP_INT_MAX;
        $from = 0;
        $size = 200;

        while  (count( $events ) < $total ) {
            $url = "https://api.openagenda.com/v2/agendas/$agendaUid/events?key=$publicKey&size=$size&from=$from&detailed=1&includeLabels=1";
            $response = file_get_contents( $url );
            $data = json_decode( $response, true );

            $events = array_merge( $events, $data['events'] );
            $total = $data['total'];
            $from += $size;
        }

        foreach ( $events as $key => $event ) {
            if ( empty( $event['nextTiming'] ) )
                unset( $events[$key] );
        }

        return $events;
    }

    /**
     * Display the Events Table
     */
    private function display_events_table() {
        $customoa_events_list = $this->get_customoa_events_list();
        $event_search_term = isset( $_GET['customoa_search_term'] ) ? $_GET['customoa_search_term'] : '';

        if ( !empty( $event_search_term ) ) {
            foreach ( $customoa_events_list as $event ) {
                if ( !str_contains( strtolower( $event['title']['fr'] ), strtolower( $event_search_term ) ) )
                    unset( $customoa_events_list[$event['uid']] );
            }
        }

        $current_page = isset( $_GET['paged'] ) ? max(1, intval( $_GET['paged'] )) : 1;
        $items_per_page = !empty( get_option( 'customoa_events_per_page' )) ? get_option( 'customoa_events_per_page' ) : 10;
        $total_items = count( $customoa_events_list );
        $total_pages = ceil( $total_items / $items_per_page );
        $offset = ( $current_page - 1 ) * $items_per_page;
        $paged_list = array_slice( $customoa_events_list, $offset, $items_per_page );

    ?>

        <table class="wp-list-table widefat fixed striped table-view-list">
            <thead>
            <tr>
                <th scope="col" id="col-event-name" class="manage-column column-title column-primary sortable desc">
                    <h3 style="padding-left: 25px;">Event Name</h3>
                </th>
                <th scope="col" colspan="2" id="col-actions" class="manage-column column-actions">
                    <h3>Actions</h3>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($paged_list as $event) : ?>

            <?php
                $events_visibility = get_option('customoa_event_'. $event['uid'] .'_visibility', 'visible');
                $checked_visible = ( $events_visibility === 'visible' ) ? 'checked' : '';
                $checked_hidden = ( $events_visibility === 'hidden' ) ? 'checked' : '';
            ?>
                <tr>
                    <td class="title column-title has-row-actions column-primary page-title" data-colname="Title">
                        <p style="padding-left: 15px;"><?php echo isset( $event['title']['fr'] ) ? $event['title']['fr'] : $event['title']['en']; ?></p>
                    </td>
                    <td class="event-visibility">
                        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="event-visibility">
                            <?php settings_fields('customoa_options'); ?>
                            <?php do_settings_sections('customoa'); ?>
                            <?php wp_nonce_field('customoa_events_visibility', 'customoa_events_visibility_nonce'); ?>
                            <input type="hidden" name="action" value="customoa_save_events_visibility">
                            <input type="hidden" name="event_id" value="<?php echo $event['uid']; ?>">
                            <label>
                                <input type="radio" name="customoa_event_visibility" value="visible" <?php echo $checked_visible; ?>>
                                <?php esc_html_e('Visible', 'customoa'); ?>
                            </label>
                            <label>
                                <input type="radio" name="customoa_event_visibility" value="hidden" <?php echo $checked_hidden; ?>>
                                <?php esc_html_e('Hidden', 'customoa'); ?>
                            </label>
                            <?php submit_button(__('Save', 'customoa')); ?>
                        </form>
                    </td>
                    <td class="event-actions">
                        <a href="<?php echo admin_url('admin.php?page=customoa-edit-event&customoa_oa_calendar_uid=' . get_option('customoa_oa_calendar_uid') . '&event_id=' . $event['uid']); ?>" class="button button-primary">Edit Event</a>
                    </td>
                </tr>

            <?php endforeach; ?>
            </tbody>
        </table>

        <style>
            form.event-visibility {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: flex-start;
                align-items: center;
                gap: 20px;
            }

            form.event-visibility .submit {
                padding: 0;
                margin: 0;
            }

            #col-event-name {
                width: 70%;
            }

            #col-actions {
                width: 30%;
            }

            td.event-actions {
                text-align: center;
            }

        </style>

        <?php if ($total_pages > 1) : ?>
            <div class="tablenav">
                <div class="tablenav-pages">
                    <?php
                    echo paginate_links(array(
                        'base' => add_query_arg('paged', '%#%'),
                        'format' => '',
                        'total' => $total_pages,
                        'current' => $current_page,
                        'end_size' => 5,
                    ));
                    ?>
                </div>
                <div class="total-events-number">Total events: <?php echo $total_items; ?> </div>
            </div>
            <style>
                .tablenav-pages {
                    display: flex;
                    flex-direction: row;
                    flex-wrap: wrap;
                    align-items: center;
                    gap: 10px;
                    float: left !important;
                    padding-left: 30px;
                }

                .tablenav-pages a,
                .tablenav-pages span {
                    font-size: 20px;
                    font-weight: 400;
                    text-decoration: none;
                }

                .page-numbers {
                    padding: 5px;
                }

                .page-numbers:not(.dots):hover,
                .page-numbers.current {
                    background: #135e96;
                    color: #fff;
                    border-radius: 3px;
                }
                .total-events-number {
                    float: right;
                    padding-right: 30px;
                    font-size: 16px;
                    font-weight: 400;
                }
            </style>
        <?php endif; ?>

    <?php

    }


    /**
     * Save the OpenAgenda Api Key and Calendar UID
     */
    public function save_open_agenda_keys() {
        if ( !current_user_can( 'manage_options' ) || $_POST['action'] != 'customoa_save_agenda_keys' ) {
            return;
        }

        if ( !isset( $_POST['customoa_options_nonce'] ) || !wp_verify_nonce( $_POST['customoa_options_nonce'], 'customoa_options' ) ) {
            wp_die( 'Something went wrong! <strong>Invalid nonce</strong>.' );
        }

        update_option( 'customoa_openagenda_api', sanitize_text_field( $_POST['customoa_openagenda_api'] ) );
        update_option( 'customoa_oa_calendar_uid', sanitize_text_field( $_POST['customoa_oa_calendar_uid'] ) );

        wp_redirect( add_query_arg( array( 'page' => 'customoa', 'event_keys_updated' => 'true' ), admin_url( 'options-general.php' ) ) );
        exit;
    }

    /**
     * Save the number of events displayed on the page
     */
    public function save_events_per_page() {
        if ( !current_user_can( 'manage_options' ) || $_POST['action'] != 'customoa_save_events_per_page' ) {
            return;
        }

        if ( !isset( $_POST['customoa_events_per_page_nonce'] ) || !wp_verify_nonce( $_POST['customoa_events_per_page_nonce'], 'customoa_events_per_page' ) ) {
            wp_die( 'Something went wrong! <strong>Invalid nonce</strong>.' );
        }

        update_option( 'customoa_events_per_page', sanitize_text_field( $_POST['customoa_events_per_page'] ) );

        wp_redirect( add_query_arg( array( 'page' => 'customoa' ), admin_url( 'options-general.php' ) ) );
        exit;
    }

    /**
     * Save the Event visibility
     */
    public function save_events_visibility() {
        if ( !current_user_can( 'manage_options' ) || $_POST['action'] != 'customoa_save_events_visibility' ) {
            return;
        }

        if ( !isset( $_POST['customoa_events_visibility_nonce'] ) || !wp_verify_nonce( $_POST['customoa_events_visibility_nonce'], 'customoa_events_visibility' ) ) {
            wp_die( 'Something went wrong! <strong>Invalid nonce</strong>.' );
        }

        $event_id = sanitize_text_field( $_POST['event_id'] );

        update_option( 'customoa_event_'. $event_id .'_visibility', sanitize_text_field( $_POST['customoa_event_visibility'] ) );

        wp_redirect( add_query_arg( array( 'page' => 'customoa' ), admin_url( 'options-general.php' ) ) );
        exit;
    }

    /**
     * Search for events
     */
    public function customoa_events_search() {
        if ( ! current_user_can( 'manage_options' ) || $_POST['action'] != 'customoa_search' ) {
            return;
        }

        if ( !isset( $_POST['customoa_events_search_nonce'] ) || !wp_verify_nonce( $_POST['customoa_events_search_nonce'], 'customoa_events_search' ) ) {
            wp_die( 'Something went wrong! <strong>Invalid nonce</strong>.' );
        }

        // Get search term from form data
        $search_term = isset( $_POST['customoa_search_term'] ) ? sanitize_text_field( $_POST['customoa_search_term'] ) : '';

        // Perform search query and display results
        // ...

        // Redirect back to search page with results
        wp_redirect( add_query_arg( array( 'page' => 'customoa', 'customoa_search_term' => urlencode( $search_term ) ), admin_url( 'options-general.php' ) ) );
        exit;
    }

}

// Initialize the CustomOA_Events_List class.
new CustomOA_Events_List();