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
            div.wrap {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: flex-start;
                align-items: flex-start;
                margin-bottom: 50px;
            }

            div.wrap div.notice,
            div.wrap h1.wp-heading-inline {
                margin-bottom: 50px;
                flex-basis: 100%;
            }

            div.wrap form {
                flex-basis: 50%;
            }
        </style>
        <div class="wrap">
            <?php echo '<h1 class="wp-heading-inline">' . __( 'OpenAgenda All Events', 'customoa' ) . '</h1>'; ?>
            <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" id="open-agenda-keys">
                <?php settings_fields( 'customoa_options' ); ?>
                <?php do_settings_sections( 'customoa' ); ?>
                <?php wp_nonce_field( 'customoa_options', 'customoa_options_nonce' ); ?>
                <input type="hidden" name="action" value="customoa_save_agenda_keys">
                <table class="form-table">
                    <tbody>
                    <tr>
                        <th scope="row">
                            <label for="customoa_openagenda_api"><?php _e( 'OpenAgenda API Key:', 'customoa' ); ?></label>
                        </th>
                        <td>
                            <input type="password" id="customoa_openagenda_api" name="customoa_openagenda_api" class="regular-text" value="<?php echo esc_attr( get_option( 'customoa_openagenda_api' ) ); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="customoa_oa_calendar_uid"><?php _e( 'OpenAgenda Calendar UID:', 'customoa' ); ?></label>
                        </th>
                        <td>
                            <input type="text" id="customoa_oa_calendar_uid" name="customoa_oa_calendar_uid" class="regular-text" value="<?php echo esc_attr( get_option( 'customoa_oa_calendar_uid' ) ); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <?php submit_button( __( 'Get Events List', 'customoa' ) ); ?>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </form>

            <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" id="event-per-page">
                <?php settings_fields( 'customoa_options' ); ?>
                <?php do_settings_sections( 'customoa' ); ?>
                <?php wp_nonce_field( 'customoa_events_per_page', 'customoa_events_per_page_nonce' ); ?>
                <input type="hidden" name="action" value="customoa_save_events_per_page">
                <table class="form-table">
                    <tbody>
                    <tr>
                        <th scope="row">
                            <label for="customoa_events_per_page"><?php _e( 'Events per page:', 'customoa' ); ?></label>
                        </th>
                        <td>
                            <input type="number" id="customoa_events_per_page"  class="regular-text" name="customoa_events_per_page" min="5" max="100" value="<?php echo esc_attr( get_option( 'customoa_events_per_page' ) ); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <?php submit_button( __( 'Update', 'customoa' ) ); ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
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

        while (count($events) < $total) {
            $url = "https://api.openagenda.com/v2/agendas/$agendaUid/events?key=$publicKey&size=$size&from=$from&detailed=1&includeLabels=1";
            $response = file_get_contents($url);
            $data = json_decode($response, true);

            $events = array_merge($events, $data['events']);
            $total = $data['total'];
            $from += $size;
        }

        return $events;
    }

    /**
     * Display the Events Table
     */
    private function display_events_table() {
        $customoa_events_list = $this->get_customoa_events_list();
        $current_page = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;
        $items_per_page = !empty( get_option( 'customoa_events_per_page' ) ) ? get_option( 'customoa_events_per_page' ) : 10;
        $total_items = count($customoa_events_list);
        $total_pages = ceil($total_items / $items_per_page);
        $offset = ($current_page - 1) * $items_per_page;
        $paged_list = array_slice($customoa_events_list, $offset, $items_per_page);

        echo '<table class="wp-list-table widefat fixed striped table-view-list">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col" id="event_name" class="manage-column column-title column-primary sortable desc"><h3 style="padding-left: 25px;">Event Name</h3></th>';
        echo '<th scope="col" id="actions" class="manage-column column-author"><h3>Actions</h3></th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ( $paged_list as $event ) {
            echo '<tr>';
            echo '<td class="title column-title has-row-actions column-primary page-title" data-colname="Title">';
            echo '<p style="padding-left: 15px;">' . $event['title']['fr'] . '</p>';
            echo '</td>';
            echo '<td class="actions column-actions" data-colname="Actions">';
            echo '<a href="' . admin_url( 'admin.php?page=customoa-edit-event&customoa_oa_calendar_uid=' . get_option( 'customoa_oa_calendar_uid' ) . '&event_id=' . $event['uid'] ) . '" class="button button-primary">Edit</a>';
            echo '<a href="#" class="button button-primary" style="background-color: #D63638; border-color: #D63638;">Hide</a>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';

        if ($total_pages > 1) {
            echo '<div class="tablenav">';
            echo '<div class="tablenav-pages">';
            echo paginate_links(array(
                'base' => add_query_arg('paged', '%#%'),
                'format' => '',
                'total' => $total_pages,
                'current' => $current_page,
            ));
            echo '</div>';
            echo '</div>';
            echo '<style>.tablenav-pages { display: flex; flex-direction: row; flex-wrap: wrap; align-items: center; gap: 10px; padding-right: 50px; } .tablenav-pages a, .tablenav-pages span { font-size: 20px; font-weight: 500; text-decoration: none; } </style>';
        }
    }

    /**
     * Save the plugin settings.
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

}

// Initialize the CustomOA_Events_List class.
new CustomOA_Events_List();