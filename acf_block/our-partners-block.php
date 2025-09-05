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
        'post_type' => 'partner',
        'posts_per_page' => '-1',
        'post_status' => array('publish'),
        'orderby' => 'name',
        'order' => 'ASC',

    );

    $the_query = new WP_Query($args);

    if ($showhide) {
        ?>
        <div class="bg-n-10">
            <div class="container  pt-2 pb-10 md:pb-24">
                <h2 class="heading font-bold pb-11">
                    <?php echo $heading; ?>
                </h2>
                <div class="paragraph">
                    <?php echo $paragraph; ?>
                </div>
                <div class="partner-data partner-slider flex mb-8">
                    <?php
                    if ($the_query->have_posts()) {
                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                            $id = get_the_ID();
                            $title = get_the_title();
                            // $taxoTermsSLug = taxoTermsSLug($id, $taxonomies);
                            $feature_img = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/dist/images/default-post-img.jpg';
                            // $website_link = (get_field('website_link')) ? get_field('website_link') : "javascript:void(0)";
                            $website_link = get_field('website_link');

                            if ($website_link) {
                                $linkStart = '<a href="' . $website_link . '" target="_blank">';
                                $linkEnd = '</a>';
                            } else {
                                $linkStart = '';
                                $linkEnd = '';
                            }

                            ?>
                            <div data-id="<?php echo $id; ?>">
                                <div class="max-w-[300px] slider-content">
                                    <?php
                                    echo $linkStart;
                                    //  < ?php if ($website_link): 
                        
                                    if (has_post_thumbnail($id)) {
                                        $class = "max-h-[72px] w-auto";
                                        echo get_the_post_thumbnail($id, 'medium', array('class' => $class));
                                    } else {

                                        echo $title;


                                    }
                                    echo $linkEnd;
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    // Reset Post Data
                    wp_reset_postdata();
                    ?>
                </div>
                <?php if ($button_label) {
                    echo '<div class="flex justify-center">';
                    echo btn_layout_1($button_label, '/partner');
                    echo '</div>';
                } ?>

            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="block-hide">
            <p>Our Partners Block - Hidden</p>
        </div>
        <?php
    }
    ?>
</section>