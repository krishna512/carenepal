<?php

add_action('template_redirect', function () {

    $url = get_field('vacancy_button_url', "option");

    $id = url_to_postid($url);

    $redirect_link = get_post_type_archive_link("vacancy");

    if (!is_page($id)) {
        return;
    }

    if (!isset($_GET["title"]) && !isset($_GET["id"])) {
        wp_redirect($redirect_link);
        exit;
    }
});


function leaflet_script_attribute($tag, $handle)
{
    $scripts_to_defer = array(
        'cn-leaflet',
    );

    if (!is_admin() && in_array($handle, $scripts_to_defer)) {
        return str_replace(' src', ' crossorigin="anonymous" referrerpolicy="no-referrer" src', $tag);
    } else {
        return $tag;
    }
}
add_filter('script_loader_tag', 'leaflet_script_attribute', 10, 20);

function leaflet_style_attribute($tag, $handle)
{
    $scripts_to_defer = array(
        'cn-leaflet',
    );

    if (!is_admin() && in_array($handle, $scripts_to_defer)) {
        return str_replace(' href', ' crossorigin="anonymous" referrerpolicy="no-referrer" href', $tag);
    } else {
        return $tag;
    }
}

add_filter('style_loader_tag', 'leaflet_style_attribute', 10, 20);



add_action('init', function () {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
});