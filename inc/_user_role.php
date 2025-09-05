<?php
function add_client_role()
{
    add_role(
        'client_role',
        'CN Editor Role',
        array(
            'read' => true,
            'edit_posts' => true,
            'upload_files' => true,
        ),
    );
}

add_action('init', 'add_client_role');

function add_client_role_capabilities()
{

    $role = get_role('client_role');

    // = general =
    $role->add_cap('moderate_comments', true);
    $role->add_cap('manage_links', true);
    $role->add_cap('manage_options', true);

    // = posts =
    $role->add_cap('edit_others_posts', true);
    $role->add_cap('delete_posts', true);
    $role->add_cap('publish_posts', true);
    $role->add_cap('read_private_posts', true);
    $role->add_cap('delete_private_posts', true);
    $role->add_cap('delete_published_posts', true);
    $role->add_cap('delete_others_posts', true);
    $role->add_cap('edit_private_posts', true);
    $role->add_cap('edit_published_posts', true);

    // = pages =
    $role->add_cap('edit_pages', true);
    $role->add_cap('edit_others_pages', true);
    $role->add_cap('delete_pages', true);
    $role->add_cap('publish_pages', true);
    $role->add_cap('read_private_pages', true);
    $role->add_cap('delete_private_pages', true);
    $role->add_cap('delete_published_pages', true);
    $role->add_cap('delete_others_pages', true);
    $role->add_cap('edit_private_pages', true);
    $role->add_cap('edit_published_pages', true);

    // = taxonomies =
    $role->add_cap('manage_categories', true);

    // = appearance =
    $role->add_cap('edit_theme_options', true);

    // === users ===
    $role->add_cap('list_users', true);
    $role->add_cap('create_users', true);
    $role->add_cap('delete_users', true);
    $role->add_cap('promote_users', true);
    $role->add_cap('remove_users', true);
}

add_action('init', 'add_client_role_capabilities', 11);


// === Hide admin notices ===
function hide_admin_notices()
{
    $current_user = wp_get_current_user();

    if (in_array('client_role', (array) $current_user->roles)) {
        remove_all_actions('admin_notices');
    }
}

add_action('admin_head', 'hide_admin_notices', 11);


// === Hide ACF from non admin

add_filter('acf/settings/show_admin', 'my_acf_show_admin');

function my_acf_show_admin($show)
{

    return current_user_can('administrator');

}

function hide_siteadmin()
{

    if (current_user_can('client_role')) {

        /* DASHBOARD */
        // remove_submenu_page('index.php', 'update-core.php');
        remove_menu_page('tools.php');
        remove_menu_page('options-general.php');
    }
}
add_action('admin_head', 'hide_siteadmin');


function wp_rocket_add_purge_posts_to_author()
{
    // gets the author role object
    $role = get_role('client_role');

    // add a new capability
    $role->add_cap('rocket_manage_options', true);
    $role->add_cap('rocket_purge_cache', true);
    $role->add_cap('rocket_purge_posts', true);
    $role->add_cap('rocket_purge_terms', true);
    $role->add_cap('rocket_purge_users', true);
}
add_action('init', 'wp_rocket_add_purge_posts_to_author', 12);