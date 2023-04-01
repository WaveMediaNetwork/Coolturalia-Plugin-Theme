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
            'OpenAgenda Edit Event',
            'OpenAgenda Edit Event',
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



        $customoa_oa_calendar_uid = sanitize_text_field( $_GET['customoa_oa_calendar_uid'] );
        $all_events = get_option( 'customoa_oa_calendar_' . $customoa_oa_calendar_uid );

        $event_options_group = 'customoa_event_options_'.$_GET['event_id'];

        $event_id = sanitize_text_field( $_GET['event_id'] );
        $event_options = get_option($event_options_group, array() );

        $title = !empty( $event_options['customoa_event_title'] ) ? $event_options['customoa_event_title'] : $all_events[$event_id]['title']['fr'] ;
        $description = !empty( $event_options['customoa_event_description'] ) ? $event_options['customoa_event_description'] : $all_events[$event_id]['description']['fr'] ;
        $category = !empty( $event_options['customoa_event_category'] ) ? $event_options['customoa_event_category'] : $all_events[$event_id]['type-devenement']['label']['fr'];
        $highlighted = $event_options['customoa_event_highlighted'];

        $keywords = '';
        if ( !empty( $event_options['customoa_event_keywords'] ) ) {
            $keywords = $event_options['customoa_event_keywords'];
        }
        elseif ( isset( $all_events[$event_id]['keywords']['fr'] ) ) {
            foreach ( $all_events[$event_id]['keywords']['fr'] as $keyword ) {
                $keywords .= $event_options['customoa_event_keywords'] . (!empty($keywords) ? ', ' : '') . $keyword;
            }
        }




        $file = $event_options['customoa_event_file'];



        if ( isset( $_GET['customoa_event_updated']) && $_GET['customoa_event_updated'] == 'true' )
            echo '<div class="notice notice-success is-dismissible"><p>Event updated successfully!</p></div>';


        ?>
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <div class="wrap" style="display: flex; gap: 100px; justify-content: flex-start; align-items: flex-start;">
            <form style="flex-basis: 25%;" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" enctype="multipart/form-data">
                <?php wp_nonce_field( 'customoa_update_event', 'customoa_update_event_nonce' ); ?>
                <input type="hidden" name="action" value="customoa_update_event">
                <input type="hidden" name="event_id" value="<?php echo esc_attr( $event_id ); ?>">
                <input type="hidden" name="customoa_oa_calendar_uid" value="<?php echo esc_attr( $customoa_oa_calendar_uid ); ?>">
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
                            <label for="customoa_event_description"><?php _e( 'Event Description:', 'customoa' ); ?></label>
                        </th>
                        <td>
                            <input type="text" id="customoa_event_description" name="customoa_event_options[customoa_event_description]" class="regular-text" value="<?php echo esc_attr( $description ); ?>">
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
                        <tr>
                            <th scope="row">
                                <label for="customoa_event_file">File:</label>
                            </th>
                            <td>
                                <input type="file" name="customoa_event_file" id="customoa_event_file">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" name="submit_form" class="button button-primary">Update Event</button>
            </form>
            <div class="image-container" style="flex-basis: 75%;">
                <h3 class="image-title">Featured Image</h3>
                <img style="max-width: 500px;" src="<?php echo CUSTOMOA_PLUGIN_URL . 'includes/images/' . $event_options['customoa_event_file'] ?>">
            </div>
        </div>
        <?php
    }

    public function update_event() {
        if ( ! isset( $_POST['customoa_update_event_nonce'] ) || ! wp_verify_nonce( $_POST['customoa_update_event_nonce'], 'customoa_update_event' ) ) {
            wp_die( 'Unauthorized access' );
        }

        $event_id = isset( $_POST['event_id'] ) ? sanitize_text_field( $_POST['event_id'] ) : '';

        $event_options_group = 'customoa_event_options_'.$event_id;





        // Upload file
        if ( isset( $_FILES['customoa_event_file'] ) && !empty( $_FILES['customoa_event_file']['name'] ) ) {
            $file = $_FILES['customoa_event_file'];
            $upload_dir = plugin_dir_path( __FILE__ ) . 'images/';
            $file_name = $file['name'];
            $file_tmp_name = $file['tmp_name'];
            $file_type = $file['type'];
            $file_size = $file['size'];

            // Check file type
            $allowed_types = array( 'jpg', 'jpeg', 'png', 'gif' );
            $file_parts = pathinfo( $file_name );
            $file_ext = strtolower( $file_parts['extension'] );
            if ( !empty( $file_name ) && !in_array( $file_ext, $allowed_types ) ) {
                wp_die( 'File type not allowed.' );
            }

            // Move file to plugin directory's "images" folder
            move_uploaded_file( $file_tmp_name, $upload_dir . $file_name );

            $sanitized_options['customoa_event_file'] = $file_name;
        }


        if ( !isset( $sanitized_options['customoa_event_file'] ) ) {
            $existing_event_data = get_custom_event_data( $event_id );
            $sanitized_options['customoa_event_file'] = $existing_event_data['customoa_event_file'] ;
        }


        if ( isset( $_POST['customoa_event_options'] ) ) {
            foreach ( $_POST['customoa_event_options'] as $key => $value ) {
                $sanitized_options[ $key ] = sanitize_text_field( $value );
            }
            update_option( $event_options_group, $sanitized_options );


            $all_events = get_option( 'customoa_oa_calendar_' . $_POST['customoa_oa_calendar_uid'] );

            foreach ( $all_events as $ev_id => $ev ) {
                if ( $ev_id == $event_id ) {
                    foreach ( $sanitized_options as $key => $value ) {
                        $all_events[$ev_id][$key] = $value;
                    }
                }
            }

            update_option( 'customoa_oa_calendar_' . $_POST['customoa_oa_calendar_uid'], $all_events );
        }



        $test = get_all_event_data( $event_id );



        wp_redirect( admin_url( 'admin.php?page=customoa-edit-event&customoa_oa_calendar_uid=3138766&event_id='. $event_id . '&customoa_event_updated=true' ) );
        exit;
    }

}

new CustomOA_Edit_Event();