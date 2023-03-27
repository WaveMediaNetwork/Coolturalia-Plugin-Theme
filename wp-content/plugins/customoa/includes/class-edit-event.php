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
    /**
     * Display the event editing page.
     */
    public function edit_event_page() {
        if ( empty( $_GET['event_id'] ) ) {
            echo '<h3>Something went wrong!</h3>';
            return;
        }

        $event_options_group = 'customoa_event_options_'.$_GET['event_id'];

        $event_id = sanitize_text_field( $_GET['event_id'] );
        $event_options = get_option($event_options_group, array() );
        $title = $event_options['customoa_event_title'];
        $keywords = $event_options['customoa_event_keywords'];
        $category = $event_options['customoa_event_category'];
        $highlighted = $event_options['customoa_event_highlighted'];


        if ( isset( $_GET['customoa_event_updated']) && $_GET['customoa_event_updated'] == 'true' )
            echo '<div class="notice notice-success is-dismissible"><p>Event updated successfully!</p></div>';


        ?>
        <div class="wrap">
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
            <h3>Event ID: <?php echo $event_id ?></h3>
            <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
                <?php wp_nonce_field( 'customoa_update_event', 'customoa_update_event_nonce' ); ?>
                <input type="hidden" name="action" value="customoa_update_event">
                <input type="hidden" name="event_id" value="<?php echo esc_attr( $event_id ); ?>">
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
                            <label for="customoa_event_category"><?php _e( 'Event Category:', 'customoa' ); ?></label>
                        </th>
                        <td>
                            <input type="text" id="customoa_event_category" name="customoa_event_options[customoa_event_category]" class="regular-text" value="<?php echo esc_attr( $category ); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="customoa_event_keywords"><?php _e( 'Event Keywords:', 'customoa' ); ?></label>
                        </th>
                        <td>
                            <input type="text" id="customoa_event_keywords" name="customoa_event_options[customoa_event_keywords]" class="regular-text" value="<?php echo esc_attr( $keywords ); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="customoa_event_highlighted_radio">Highlighted?</label>
                        </th>
                        <td>
                            <p><input type="radio" name="customoa_event_options[customoa_event_highlighted]" value="yes" <?php if ( $highlighted === 'yes' ) { ?> checked <?php }?> /> Yes</p>
                            <p><input type="radio" name="customoa_event_options[customoa_event_highlighted]" value="no" <?php if ( $highlighted === 'no' ) { ?> checked <?php }?> /> No</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <button type="submit" name="submit_form" class="button button-primary">Update Event</button>
            </form>
        </div>
        <?php
    }

    public function update_event() {
        if ( ! isset( $_POST['customoa_update_event_nonce'] ) || ! wp_verify_nonce( $_POST['customoa_update_event_nonce'], 'customoa_update_event' ) ) {
            wp_die( 'Unauthorized access' );
        }

        $event_id = isset( $_POST['event_id'] ) ? sanitize_text_field( $_POST['event_id'] ) : '';

        $event_options_group = 'customoa_event_options_'.$event_id;


        if ( isset( $_POST['customoa_event_options'] ) ) {
            $sanitized_options = array();
            foreach ( $_POST['customoa_event_options'] as $key => $value ) {
                $sanitized_options[ $key ] = sanitize_text_field( $value );
            }
            update_option( $event_options_group, $sanitized_options );
            $event_options = $sanitized_options;
        }


        wp_redirect( admin_url( 'admin.php?page=customoa-edit-event&customoa_oa_calendar_uid=3138766&event_id='. $event_id . '&customoa_event_updated=true' ) );
        exit;
    }

}

new CustomOA_Edit_Event();