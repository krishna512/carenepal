<?php

$id = '' . $block['id'];
$className = '';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php

$heading     = (function_exists('get_field') && $heading = get_field('heading')) ? $heading : '';
$showhide     = (function_exists('get_field') && $showhide = get_field('show_hide_block')) ? $showhide : '0';
$button_label   = (function_exists('get_field') && $button_label = get_field('button_label')) ? $button_label : '';

$args = array(
    'post_type'             => 'news',
    'posts_per_page'        => '3',
    'post_status'           => array('publish'),
);

$the_query = new WP_Query($args);
$taxonomy = 'news_category';

if ($showhide) {
?>
    <div class="bg-n-10">
        <div class="container news-block pt-2 pb-10 md:pb-36">
            <h2 class="heading font-bold text-n-70 pb-5"> <?php echo $heading; ?> </h2>
            <div class="news-data grid sm:grid-cols-2 lg:grid-cols-3 gap-5 cursor-pointer mb-5">
                <?php
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    $id = get_the_ID();
                    $feature_img = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/dist/images/default-post-img.jpg';
                    $excerpt = excerpt();
                    $taxonomy_news_category = get_the_terms($id, $taxonomy);

                    echo resourcesCard($id, $taxonomy);


            ?>
                <?php
                }
            }
            // Reset Post Data
            wp_reset_postdata();
            ?>
            </div>
            <?php if ($button_label) {
                echo '<div class="flex justify-center">';
                echo btn_layout_1($button_label,'/news');
                echo '</div>';
            } ?>

        </div>
    </div>
    </div>
    <?php
} else {
?>
    <div class="block-hide">
        <p>News Block - Hidden</p>
    </div>
    <?php
}
?>
</section>