<?php

add_filter('frm_export_csv_headings', 'customizing_column_in_csv_export');
function customizing_column_in_csv_export($headings)
{
    unset($headings['updated_at']);
    unset($headings['created_at']);
    unset($headings['id']);
    unset($headings['updated_by']);
    unset($headings['item_key']);
    unset($headings['name']);
    unset($headings['description']);
    unset($headings['ip']);
    unset($headings['form_id']);
    unset($headings['post_id']);
    unset($headings['user_id']);
    unset($headings['parent_item_id']);
    unset($headings['is_draft']);
    return $headings;
}


add_filter('frm_admin_search_options', 'add_search_option', 10, 2);
function add_search_option($options, $args)
{

    $removeKeys = array(85, 44, 46, 47, 69);

    $new_options = [];

    foreach ($removeKeys as $key => $a) {
        $new_options[$a] = $options[$a];
    }
    return $new_options;
}


/**
 * Formidable form script hook
 * 
 */

add_action('frm_entries_footer_scripts', 'set_custom_limit', 20, 2);
function set_custom_limit($fields, $form)
{
    if ($form->id != 7)
        return;

    wp_enqueue_script('cn-formidable');

}