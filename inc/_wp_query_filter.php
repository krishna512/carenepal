<?php

// Reference : 
// https://www.lab21.gr/blog/extend-the-where-clause-in-wordpress-wp_query/ 
// https://imranhsayed.medium.com/how-to-restrict-wordpress-search-to-titles-only-4eb07c4f6001


add_filter('posts_where', 'title_filter', 10, 2);
function title_filter($where, $wp_query)
{
    global $wpdb;
    if ($search_term = $wp_query->get('search_post_title')) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . $wpdb->esc_like($search_term) . '%\'';
    }

    return $where;
}