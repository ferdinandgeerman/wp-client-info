<?php
/**
 * Plugin Name: Client Info
 * Description: A plugin to collect client information including name, address, and social media links.
 * Version: 1.0
 * Author: Motus Minds Digital Agency
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
    register_setting('client_info_group', 'client_info_whatsapp_link');
    register_setting('client_info_group', 'client_info_whatsapp_number');
    register_setting('client_info_group', 'client_info_opening_hours');
    register_setting('client_info_group', 'client_info_kvk');
    register_setting('client_info_group', 'client_info_facebook');
    register_setting('client_info_group', 'client_info_instagram');
    register_setting('client_info_group', 'client_info_tiktok');
    register_setting('client_info_group', 'client_info_linkedin');
    register_setting('client_info_group', 'client_info_youtube');
    register_setting('client_info_group', 'client_info_tripadvisor');

    
    function generateShortCodeBtn($field){
        $shortcode = "['client_info_dynamic field='" . $field ."']";
        return '<span class="dashicons dashicons-admin-page short-code-copy-icon" data-shortcode="' . $shortcode . '" onclick="copyShortCode(this)" style="cursor:pointer;"></span>';
    }

    add_settings_section(
        'client_info_section',
        'Client Info Details',
        null,
        'client-info'
    );

    add_settings_field(
        'client_info_company_name',
        'Company' . generateShortCodeBtn("company_name"),
        'client_info_company_name_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_street_address',
        'Street Address' . generateShortCodeBtn("street_address"),
        'client_info_street_address_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_location_url',
        'Location Url' . generateShortCodeBtn("location_url"),
        'client_info_location_url_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_city',
        'City'. generateShortCodeBtn("city"),
        'client_info_city_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_country',
        'Country'. generateShortCodeBtn("country"),
        'client_info_country_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_email',
        'Email Address'. generateShortCodeBtn("email"),
        'client_info_email_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_phone_link',
        'Phone Number Link'. generateShortCodeBtn("phone_link"),
        'client_info_phone_link_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_phone_number',
        'Phone Number'. generateShortCodeBtn("phone_number"),
        'client_info_phone_number_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_whatsapp_link',
        'Whatsapp Link'. generateShortCodeBtn("whatsapp_link"),
        'client_info_whatsapp_link_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_whatsapp_number',
        'Whatsapp Number'. generateShortCodeBtn("whatsapp_number"),
        'client_info_whatsapp_number_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_opening_hours',
        'Opening Hours (in HTML)'. generateShortCodeBtn("opening_hours"),
        'client_info_opening_hours_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_kvk',
        'KVK Number'. generateShortCodeBtn("kvk"),
        'client_info_kvk_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_facebook',
        'Facebook URL'. generateShortCodeBtn("facebook"),
        'client_info_facebook_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_instagram',
        'Instagram URL'. generateShortCodeBtn("instagram"),
        'client_info_instagram_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_tiktok',
        'Tiktok URL'. generateShortCodeBtn("tiktok"),
        'client_info_tiktok_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_linkedin',
        'LinkedIn URL'. generateShortCodeBtn("linkedin"),
        'client_info_linkedin_field',
        'client-info',
        'client_info_section'
    );
    add_settings_field(
        'client_info_youtube',
        'YouTube URL'. generateShortCodeBtn("youtube"),
        'client_info_youtube_field',
        'client-info',
        'client_info_section'
    );

    add_settings_field(
        'client_info_tripadvisor',
        'Tripadvisor URL'. generateShortCodeBtn("tripadvisor"),
        'client_info_tripadvisor_field',
        'client-info',
        'client_info_section',
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

function client_info_whatsapp_link_field()
{
    $value = get_option('client_info_whatsapp_link');
    echo '<input type="text" name="client_info_whatsapp_link" value="' .
        esc_attr($value) .
        '" class="regular-text">';
}

function client_info_whatsapp_number_field()
{
    $value = get_option('client_info_whatsapp_number');
    echo '<input type="text" name="client_info_whatsapp_number" value="' .
        esc_attr($value) .
        '" class="regular-text">';
}

function client_info_opening_hours_field()
{
    $value = get_option('client_info_opening_hours');
    echo '<textarea  name="client_info_opening_hours" class="regular-text">' .
        esc_attr($value) .
        '</textarea>';
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

function client_info_tiktok_field()
{
    $value = get_option('client_info_tiktok');
    echo '<input type="url" name="client_info_tiktok" value="' .
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


function client_info_tripadvisor_field()
{
    $value = get_option('client_info_tripadvisor');
    echo '<input type="url" name="client_info_tripadvisor" value="' .
        esc_attr($value) .
        '" class="regular-text">';
}


// Enqueue custom CSS & JS
function client_info_enqueue_styles()
{
    wp_enqueue_style('client-info-style', plugins_url('css/style.css', __FILE__));
    wp_enqueue_script('client-info-script', plugin_dir_url(__FILE__) . 'js/main.js', array('jquery'), '1.0.0', true 
    );
}

add_action('admin_enqueue_scripts', 'client_info_enqueue_styles');


// Dynamic shortcode to display client info based on parameter
function display_dynamic_client_info($atts)
{
    // Extract shortcode attributes and set default to 'name'
    $atts = shortcode_atts(
        [
            'field' => 'name', // Default field is 'name'
        ],
        $atts
    );

    $prefix = 'client_info_';

    $value = get_option($prefix . $atts['field']) ?? null;

    return esc_html($value);
}

// Register the dynamic shortcode
add_shortcode('client_info_dynamic', 'display_dynamic_client_info');
