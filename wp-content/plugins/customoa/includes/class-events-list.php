<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Openagenda\Openagenda;

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
        add_action( 'admin_post_customoa_save_settings', array( $this, 'save_settings' ) );
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
        <div class="wrap">
            <h1><?php echo '<h1 class="wp-heading-inline">' . __( 'OpenAgenda All Events', 'customoa' ) . '</h1>'; ?></h1>
            <form action="options.php" method="post">
                <?php settings_fields( 'customoa_options' ); ?>
                <?php do_settings_sections( 'customoa' ); ?>
                <table class="form-table">
                    <tbody>
                    <tr>
                        <th scope="row">
                            <label for="customoa_oa_calendar_uid"><?php _e( 'OpenAgenda Calendar UID:', 'customoa' ); ?></label>
                        </th>
                        <td>
                            <input type="text" id="customoa_oa_calendar_uid" name="customoa_oa_calendar_uid" class="regular-text" value="<?php echo esc_attr( get_option( 'customoa_oa_calendar_uid' ) ); ?>">
                            <?php submit_button( __( 'Get Events List', 'customoa' ) ); ?>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </form>
        </div>
        <?php

        $customoa_events_list = $this->get_customoa_events_list();





        ?>
        <table class="wp-list-table widefat fixed striped table-view-list">
            <thead>
            <tr>
                <th scope="col" id="event_name" class="manage-column column-title column-primary sortable desc">
                    <h3 style="padding-left: 25px;">Event Name</h3>
                </th>
                <th scope="col" id="actions" class="manage-column column-author">
                    <h3>Actions</h3>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ( $customoa_events_list as $event ) { ?>
                <tr>
                    <td class="title column-title has-row-actions column-primary page-title" data-colname="Title">
                        <p style="padding-left: 15px;"><?php echo $event['title']['fr']; ?></p>
                    </td>

                    <td class="actions column-author" data-colname="Author">
                        <a href="<?php echo admin_url( 'admin.php?page=customoa-edit-event&customoa_oa_calendar_uid=' . get_option( 'customoa_oa_calendar_uid' ) . '&event_id=' . $event['uid'] ) ?>" class="button button-primary">Edit</a>
                        <a href="#" class="button button-primary" style="background-color: #D63638; border-color: #D63638;">Hide</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php

    }

    /**
     * Returns Customized Events List
     */
    public function get_customoa_events_list() {
        $oa_calendar_uid = get_option( 'customoa_oa_calendar_uid' );
        $oa_calendar = new Openagenda( $oa_calendar_uid );
        $oa_calendar_events = $oa_calendar->get_events();



        if ( empty( $oa_calendar_events ) )
            return '';

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
     * Save the plugin settings.
     */
    public function save_settings() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        check_admin_referer( 'customoa_options' );

        update_option( 'customoa_oa_calendar_uid', sanitize_text_field( $_POST['customoa_oa_calendar_uid'] ) );

        wp_redirect( add_query_arg( array( 'page' => 'customoa', 'updated' => 'true' ), admin_url( 'options-general.php' ) ) );
        exit;
    }

}

// Initialize the CustomOA_Events_List class.
new CustomOA_Events_List();