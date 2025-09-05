<?php

/**
 * ================================================
 * OPTION PAGE
 * ================================================
 */
if (function_exists('acf_add_options_page')):

    acf_add_options_page(
        array(
            'page_title' => 'Other Settings',
            'menu_slug' => 'other-setting',
            'menu_title' => 'Other Settings',
            'capability' => 'edit_posts',
            'position' => '',
            'parent_slug' => '',
            'icon_url' => '',
            'redirect' => true,
            'post_id' => 'options',
            'autoload' => false,
            'update_button' => 'Update',
            'updated_message' => 'Options Updated',
        )
    );

endif;

/**
 * ================================================
 * Local sync - Save json file 
 * ================================================
 */

add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point($path)
{

    $path = get_stylesheet_directory() . '/acf_json';

    return $path;
}

/**
 * ================================================
 * Local Sync - Load json file on theme load.
 * ================================================
 */

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point($paths)
{

    unset($paths[0]);

    $paths[] = get_stylesheet_directory() . '/acf_json';

    return $paths;
}


/**
 * ================================================
 * ACF Auto assign Featured image from 'post_image' if Field Name is 'featured_image'
 * ================================================
 */
function acf_set_featured_image($value, $post_id, $field)
{
    // if ($value != '') {
    //Add the value which is the image ID to the _thumbnail_id meta data for the current post
    update_post_meta($post_id, '_thumbnail_id', $value);
    // }

    return $value;
}
// acf/update_value/name={$field_name} - filter for a specific field based on it's name
add_filter('acf/update_value/name=featured_image', 'acf_set_featured_image', 10, 3);



/**
 * ================================================
 * Save ACF custom field 'published_date' to date-time post
 * ================================================
 */
function my_acf_save_post($post_id)
{
    $theDate = get_field('published_date', $post_id);
    if ($theDate) {
        $theDate = date_create($theDate);
        $theDate = date_format($theDate, "Y-m-d H:i:s");
        $my_post = [];
        $my_post['ID'] = $post_id;
        $my_post['post_date'] = $theDate;
        wp_update_post($my_post);
    }
}
// add_action('acf/save_post', 'my_acf_save_post', 20);




/**
 * ================================================
 *  Default value for Date-picker field name "published_date"
 * ================================================
 */
function acf_default_published_date($field)
{
    $field['default_value'] = date('Y-m-d H:i:s');
    return $field;
}
// add_filter('acf/load_field/name=published_date', 'acf_default_published_date');


/**
 * ================================================
 * Enable/Disable acf extended modules
 * ================================================
 */

add_action('acf/init', 'my_acfe_modules');
function my_acfe_modules()
{
    // disable block type module
    acf_update_setting('acfe/modules/block_types', false);

    // disable forms module
    acf_update_setting('acfe/modules/forms', false);

    // disable options module
    acf_update_setting('acfe/modules/options', false);

    // disable post type module
    acf_update_setting('acfe/modules/post_types', false);

    // disable taxonomies module
    acf_update_setting('acfe/modules/taxonomies', false);

    // disable options pages module
    acf_update_setting('acfe/modules/options_pages', false);
}