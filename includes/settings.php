<?php

// Add a menu item to the WordPress admin dashboard
add_action('admin_menu', 'openai_settings_menu');
function openai_settings_menu() {
    add_menu_page(
        'OpenAI Settings', // Page title
        'OpenAI Settings', // Menu title
        'manage_options',  // Capability
        'openai-settings', // Menu slug
        'openai_settings_page', // Callback function
        'dashicons-admin-tools', // Icon
        100 // Position
    );
}

// Display the settings page content
function openai_settings_page() {
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    // Save API key if the form is submitted
    if (isset($_POST['submit'])) {
        check_admin_referer('save_openai_settings'); // Nonce check for security
        $api_key = sanitize_text_field($_POST['openai_api_key']);
        update_option('openai_api_key', $api_key);
        echo '<div class="updated"><p>API Key Saved Successfully!</p></div>';
    }

    // Retrieve the saved API key
    $api_key = get_option('openai_api_key', '');

    ?>
    <div class="wrap">
        <h1>OpenAI Settings</h1>
        <form method="POST">
            <?php wp_nonce_field('save_openai_settings'); // Add a nonce field for security ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><label for="openai_api_key">OpenAI API Key</label></th>
                    <td>
                        <input type="text" name="openai_api_key" id="openai_api_key" value="<?php echo esc_attr($api_key); ?>" style="width: 100%; max-width: 400px;" />
                        <p class="description">Enter your OpenAI API key here.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button('Save API Key'); ?>
        </form>
    </div>
    <?php
}

// Function to retrieve the API key globally
function get_openai_api_key() {
    return get_option('openai_api_key', '');
}
