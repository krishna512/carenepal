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
<section class="map-coverage-wrapper<?php echo esc_attr($className); ?>">

    <div class="bg-circle-map">
        <?php echo useSvg('circle-background'); ?>
    </div>


    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

        <?php
        $heading = (function_exists('get_field') && $heading = get_field('heading')) ? $heading : '';
        $paragraph = (function_exists('get_field') && $paragraph = get_field('paragraph')) ? $paragraph : '';
        $showhide = (function_exists('get_field') && $showhide = get_field('show_hide_block')) ? $showhide : '0';

        $args = array(
            'post_type' => 'thematic_area',
            'posts_per_page' => '3',
            'post_status' => array('publish'),
        );

        $the_query = new WP_Query($args);

        if ($showhide) {
            ?>
            <div class="thematic-areas-block">
                <div class="container max-sm:mt-10 md:-mt-[89px]">
                    <div class="grid grid-cols-1 gap-5 thematic-data sm:grid-cols-2 lg:grid-cols-3 relative z-10">
                        <?php
                        if ($the_query->have_posts()) {
                            while ($the_query->have_posts()) {
                                $the_query->the_post();
                                $id = get_the_ID();
                                $excerpt = excerpt(200);
                                $beneficiaries = (function_exists('get_field') && $reach = get_field('reach', $id)) ? $reach : '';
                                $label = (function_exists('get_field') && $label = get_field('label', $id)) ? $label : 'Program Participants';
                                $imageId = (has_post_thumbnail()) ? get_post_thumbnail_id() : '';
                                $color = (function_exists('get_field') && $color = get_field('color_identity', $id)) ? $color : '';
                                ?>

                                <div class="flex flex-col block-card thematic-data-card" data-id="<?php echo $id; ?>">
                                    <a href="<?php echo get_the_permalink(); ?>">
                                        <div class="relative overflow-hidden ">
                                            <div class="card-overlay"> </div>
                                            <div class="relative cursor-pointer thematic-card-images group ">

                                                <?php if ($imageId) {
                                                    echo wp_get_attachment_image($imageId, "medium_large", false, array("class" => ""));
                                                } else {
                                                    echo '<img src="' . get_template_directory_uri() . '/dist/images/default-post-img.jpg" loading="lazy">';
                                                } ?>
                                            </div>

                                            <div class="absolute bottom-0 right-0 z-10 text-white py-9 card-content ">
                                                <div class="flex items-end">
                                                    <div class="text-2xl sm:text-4xl lg:text-5xl font-bold pl-9">
                                                        <?php echo get_the_title(); ?>
                                                    </div>
                                                    <div>
                                                        <div class="arrow">
                                                            <div class="animate">
                                                                <?php echo useSvg('chevron-right'); ?>
                                                                <?php echo useSvg('chevron-right'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="text-white beneficiaries-content px-5 py-3 bg-b-5 font-bold text-2xl md:text-[32px] leading-8"
                                        style="background-color: <?php echo $color; ?>">
                                        <?php echo $beneficiaries; ?>

                                        <span class="text-base">
                                            <?php echo $label; ?>
                                        </span>




                                    </div>
                                </div>


                                <?php
                            }
                        }


                        // Reset Post Data
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="block-hide">
                <p>Thematic Areas Block - Hidden</p>
            </div>
            <?php
        }
        ?>
    </div>