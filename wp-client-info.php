<?php
/**
 * Plugin Name: Client Info
 * Description: A plugin to collect client information including name, address, and social media links.
 * Version: 1.0
 * Author: Your Name
 */

if (!defined('ABSPATH')) {
    exit();
}

// Create a menu item in the WordPress dashboard
add_action('admin_menu', 'client_info_menu');

function client_info_menu()
{
    add_menu_page(
        'Client Info',
        'Client Info',
        'manage_options',
        'client-info',
        'client_info_page',
        'dashicons-id-alt',
        20
    );
}

// Display the form in the admin page
function client_info_page()
{
    ?>
<div class="wrap">
    <h1>Client Information</h1>
    <form method="post" action="options.php">
        <?php
        settings_fields('client_info_group');
        do_settings_sections('client-info');
        submit_button();?>
    </form>
</div>
<?php
}

// Register settings
add_action('admin_init', 'client_info_settings');
function client_info_settings()
{
    register_setting('client_info_group', 'client_info_company_name');
    register_setting('client_info_group', 'client_info_street_address');
    register_setting('client_info_group', 'client_info_location_url');
    register_setting('client_info_group', 'client_info_city');
    register_setting('client_info_group', 'client_info_country');
    register_setting('client_info_group', 'client_info_email');
    register_setting('client_info_group', 'client_info_phone_link');
    register_setting('client_info_group', 'client_info_phone_number');
    register_setting('client_info_group', 'client_info_kvk');
    register_setting('client_info_group', 'client_info_facebook');
    register_setting('client_info_group', 'client_info_instagram');
    register_setting('client_info_group', 'client_info_linkedin');
    register_setting('client_info_group', 'client_info_youtube');

    add_settings_section(
        'client_info_section',
        'Client Info Details',
        null,
        'client-info'
    );

    add_settings_field(
        'client_info_company_name',
        'Company',
        'client_info_company_name_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_street_address',
        'Street Address',
        'client_info_street_address_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_location_url',
        'Location Url',
        'client_info_location_url_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_city',
        'City',
        'client_info_city_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_country',
        'Country',
        'client_info_country_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_email',
        'Email Address',
        'client_info_email_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_phone_link',
        'Phone Number Link',
        'client_info_phone_link_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_phone_number',
        'Phone Number',
        'client_info_phone_number_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_kvk',
        'KVK Number',
        'client_info_kvk_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_facebook',
        'Facebook URL',
        'client_info_facebook_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_instagram',
        'Instagram URL',
        'client_info_instagram_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_linkedin',
        'LinkedIn URL',
        'client_info_linkedin_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_youtube',
        'YouTube URL',
        'client_info_youtube_field',
        'client-info',
        'client_info_section'
    );
}

function client_info_company_name_field()
{
    $value = get_option('client_info_company_name');
    echo '<input type="text" name="client_info_company_name" value="' .
        esc_attr($value) .
        '" class="regular-text">';
}

function client_info_street_address_field()
{
    $value = get_option('client_info_street_address');
    echo '<input type="text" name="client_info_street_address" value="' .
        esc_attr($value) .
        '" class="regular-text">';
}

function client_info_location_url_field()
{
    $value = get_option('client_info_location_url');
    echo '<input type="url" name="client_info_location_url" value="' .
        esc_attr($value) .
        '" class="regular-text">';
}

function client_info_city_field()
{
    $value = get_option('client_info_city');
    echo '<input type="text" name="client_info_city" value="' .
        esc_attr($value) .
        '" class="regular-text">';
}

function client_info_country_field()
{
    $value = get_option('client_info_country');
    echo '<input type="text" name="client_info_country" value="' .
        esc_attr($value) .
        '" class="regular-text">';
}

function client_info_email_field()
{
    $value = get_option('client_info_email');
    echo '<input type="email" name="client_info_email" value="' .
        esc_attr($value) .
        '" class="regular-text">';
}

function client_info_phone_link_field()
{
    $value = get_option('client_info_phone_link');
    echo '<input type="text" name="client_info_phone_link" value="' .
        esc_attr($value) .
        '" class="regular-text">';
}

function client_info_phone_number_field()
{
    $value = get_option('client_info_phone_number');
    echo '<input type="text" name="client_info_phone_number" value="' .
        esc_attr($value) .
        '" class="regular-text">';
}

function client_info_kvk_field()
{
    $value = get_option('client_info_kvk');
    echo '<input type="text" name="client_info_kvk" value="' .
        esc_attr($value) .
        '" class="regular-text">';
}

function client_info_facebook_field()
{
    $value = get_option('client_info_facebook');
    echo '<input type="url" name="client_info_facebook" value="' .
        esc_attr($value) .
        '" class="regular-text">';
}

function client_info_instagram_field()
{
    $value = get_option('client_info_instagram');
    echo '<input type="url" name="client_info_instagram" value="' .
        esc_attr($value) .
        '" class="regular-text">';
}

function client_info_linkedin_field()
{
    $value = get_option('client_info_linkedin');
    echo '<input type="url" name="client_info_linkedin" value="' .
        esc_attr($value) .
        '" class="regular-text">';
}

function client_info_youtube_field()
{
    $value = get_option('client_info_youtube');
    echo '<input type="url" name="client_info_youtube" value="' .
        esc_attr($value) .
        '" class="regular-text">';
}

// Enqueue custom CSS
add_action('admin_enqueue_scripts', 'client_info_enqueue_styles');
function client_info_enqueue_styles()
{
    wp_enqueue_style('client-info-style', plugins_url('style.css', __FILE__));
}