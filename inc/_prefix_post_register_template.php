<?php

// https://fullsiteediting.com/lessons/creating-block-templates-for-custom-post-types/


function prefix_post_register_template($content, $post)
{
    if ($post->post_type === 'page') {
        $content = '
        <!-- wp:acf/static-page-header {"name":"acf/static-page-header","data":{"field_64479912715b0":"","field_6447996cd4600":"","field_6447999b983dc":"","field_6447991275019":"1"},"align":"full","mode":"preview"} /-->
        ';
    }
    return $content;
}
add_filter('default_content', 'prefix_post_register_template', 10, 2);
