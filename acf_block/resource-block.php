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
    $heading = (function_exists('get_field') && $heading = get_field('heading')) ? $heading : '';
    $paragraph = (function_exists('get_field') && $paragraph = get_field('paragraph')) ? $paragraph : '';
    $showhide = (function_exists('get_field') && $showhide = get_field('show_hide_block')) ? $showhide : '0';
    $button_label = (function_exists('get_field') && $button_label = get_field('button_label')) ? $button_label : '';

    $args = array(
        'post_type' => 'resource',
        'posts_per_page' => '3',
        'post_status' => array('publish'),
    );
    $taxonomy = 'resources_category';

    $the_query = new WP_Query($args);

    $featured_posts = get_field('resource_lists', $id);

    if ($showhide) {
        ?>
        <div class="resource-block py-10 sm:pt-24 lg:pb-28 sm:pb-16 bg-n-10">
            <div class="container">
                <h2 class="heading font-bold pb-6">
                    <?php echo $heading; ?>
                </h2>
                <div class="resource-data grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 pb-8">
                    <?php
                    if ($featured_posts) {
                        $i = 0;
                        foreach ($featured_posts as $id) {
                            echo resourcesCard($id, $taxonomy);
                            $i++;
                            if ($i === 3) {
                                break;
                            }
                        }
                    }
                    ?>
                </div>
                <?php if ($button_label) {
                    echo '<div class="flex justify-center">';
                    echo btn_layout_1($button_label, '/resource');
                    echo '</div>';
                } ?>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="block-hide">
            <p>Resource Block - Hidden</p>
        </div>
        <?php
    }
    ?>
</section>