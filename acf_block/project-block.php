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
    $showhide = (function_exists('get_field') && $showhide = get_field('show_hide_block')) ? $showhide : '0';
    $button_label = (function_exists('get_field') && $button_label = get_field('button_label')) ? $button_label : '';

    // selected projects
    $featured_posts = get_field('project_lists', $id);

    if ($showhide) {
        ?>
        <div class="bg-n-0">
            <div class=" container news-block sm:pt-24 py-10 md:pb-28">
                <h2 class="heading font-bold text-n-70 pb-5">
                    <?php echo $heading; ?>
                </h2>
                <div class=" grid sm:grid-cols-2 lg:grid-cols-3 gap-5 cursor-pointer pb-5 ">
                    <?php
                    $i = 0;
                    if ($featured_posts) {
                        foreach ($featured_posts as $id) {
                            echo projectCard($id);
                            $i++;
                            if ($i === 3) {
                                break;
                            }
                        }
                    }
                    ?>
                </div>
                <?php
                if ($button_label) {
                    echo '<div class="flex justify-center">';
                    echo btn_layout_1($button_label, '/project');
                    echo '</div>';
                } ?>

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