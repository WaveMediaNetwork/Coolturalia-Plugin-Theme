<?php

/**
 * CustomOA Edit Event class.
 */
class CustomOA_Edit_Event {

    /**
     * Constructor.
     */
    public function __construct() {
        add_action( 'admin_init', array( $this, 'admin_init' ) );
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
        add_action( 'admin_post_customoa_update_event', array( $this, 'update_event' ) );
    }

    /**
     * Register the plugin settings.
     */
    public function admin_init() {
        // Add any additional settings you need to register here

        $event_id = $_GET['event_id'];

        register_setting( 'customoa_event_options', 'customoa_event_options' );
    }

    /**
     * Add the plugin menu item.
     */
    public function admin_menu() {
        // Add any additional submenu pages you need to create here
        add_submenu_page(
            'admin.php?page=customoa',
            'CustomOA Edit Event',
            'CustomOA Edit Event',
            'manage_options',
            'customoa-edit-event',
            array( $this, 'edit_event_page' ),
            function()
            {
                wp_redirect(admin_url('class-edit-event.php'));
                exit;
            }
        );
    }

    /**
     * Display the event editing page.
     */
    public function edit_event_page() {

        if ( empty( $_GET['event_id'] ) ) {
            echo '<h3>Something went wrong!</h3>';
            return;
        }

        $event_options = get_option('customoa_event_options', array() );

        $event_id = sanitize_text_field( $_GET['event_id'] ); // or maybe better --> get_option( 'customoa_oa_calendar_uid' );
        $oa_calendar_uid = sanitize_text_field( $_GET['customoa_oa_calendar_uid'] );
        $calendar = get_option( 'customoa_oa_calendar_' . $oa_calendar_uid );
        $title = $event_options['customoa_event_title'];
        $location = $event_options['customoa_event_location']; // new option for location


        ?>
        <div class="wrap">
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
            <h3>Event ID: <?php echo $event_id ?></h3>
            <form action="options.php" method="post">
                <?php settings_fields( 'customoa_event_options' ); ?>
                <?php do_settings_sections( 'customoa-edit-event' ); ?>
                <table class="form-table">
                    <tbody>
                    <tr>
                        <th scope="row">
                            <label for="customoa_event_title"><?php _e( 'Event Title:', 'customoa' ); ?></label>
                        </th>
                        <td>
                            <input type="text" id="customoa_event_title" name="customoa_event_options[customoa_event_title]" class="regular-text" value="<?php echo esc_attr( $title ); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="customoa_event_location"><?php _e( 'Event Location:', 'customoa' ); ?></label> <!-- new row for location -->
                        </th>
                        <td>
                            <input type="text" id="customoa_event_location" name="customoa_event_options[customoa_event_location]" class="regular-text" value="<?php echo esc_attr( $location ); ?>">
                        </td>
                    </tr>
                    </tbody>
                </table>
                <input type="text" id="customoa_event_id_test" name="customoa_event_id_test" class="regular-text" value="<?php echo $event_id ?>">
                <?php submit_button( __( 'Update Event', 'customoa' ) ); ?>
            </form>
        </div>
        <?php

    }

}

new CustomOA_Edit_Event();