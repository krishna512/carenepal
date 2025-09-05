<?php


/**==============================
* Current term object
================================*/
$post_object = get_post_type_object($posttype);
$labels = $post_object->labels;

?>
<div class="<?php echo $posttype; ?>-archive overflow-hidden">
    <?php echo get_archive_page_heading($posttype); ?>
    <div class=" bg-n-10">
        <div class="py-10 bg-n-20 md:py-20 lg:py-40">
            <div class="container">
                <div class="relative flex mb-10 topic">
                    <div class="max-w-[675px] flex-1">
                        <h2=3 class="font-bold text-2xl lg:text-heading-3 lg:leading-tight max-sm:text-base">
                            <?php
                            $paragraph = (function_exists('get_field') && $paragraph = get_field('paragraph', $posttype . '_options')) ? $paragraph : '';
                            echo $paragraph;
                            ?>
                            </h3>
                    </div>

                    <div class="flex-1 thematic-area-arrow-images ">
                        <img class=""
                            src="<?php echo get_stylesheet_directory_uri() . '/dist/images/thematic-circle-arrow.svg'; ?>">
                    </div>


                </div>
                <?php

                $args = array(
                    'post_type' => 'thematic_area',
                    'posts_per_page' => '3',
                    'post_status' => array('publish'),
                );

                $the_query = new WP_Query($args);

                ?>

                <div class="thematic-areas relative z-[5]">
                    <div class="max-sm:mt-10">
                        <div class="grid grid-cols-1 gap-5 thematic-data sm:grid-cols-2 lg:grid-cols-3">
                            <?php
                            if ($the_query->have_posts()) {
                                while ($the_query->have_posts()) {
                                    $the_query->the_post();
                                    $id = get_the_ID();
                                    $excerpt = excerpt(200);
                                    $beneficiaries = get_field('reach', $id);
                                    $feature_img = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/dist/images/default-post-img.jpg';
                                    $color = (function_exists('get_field') && $color = get_field('color_identity', $id)) ? $color : '';
                                    $label = (function_exists('get_field') && $label = get_field('label', $id)) ? $label : 'Program Participants';
                                    ?>
                                    <div class="flex flex-col block-card thematic-data-card" data-id="<?php echo $id; ?>">
                                        <a href="<?php echo get_the_permalink(); ?>">
                                            <div class="relative overflow-hidden ">
                                                <div class="card-overlay"> </div>
                                                <div class="relative cursor-pointer thematic-card-images group ">
                                                    <img src="<?php echo $feature_img; ?>" alt="">
                                                </div>

                                                <div class="absolute bottom-0 right-0 z-10 text-white py-9 card-content ">
                                                    <div class="flex items-end">
                                                        <div class="text-2xl sm:text-4xl lg:text-5xl font-bold pl-8">
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
                            ?>
                        </div>
                    </div>
                </div>

                <div class="relative thematic-area-line-images">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/dist/images/layer-line.svg'; ?>"
                        class="absolute -top-3 -right-[19%] max-w-[unset] md:max-w-full">

                </div>
            </div>
        </div>

        <!-- Project -->
        <?php
        $args = array(
            'post_type' => 'project',
            'posts_per_page' => '3',
            'post_status' => array('publish')
        );
        $the_query = new WP_Query($args);

        if ($the_query->have_posts()) {
            ?>
            <div class="container">
                <div class="py-10 project-section md:py-20 lg:py-40">
                    <h2 class="mb-6 font-bold leading-relaxed"> Projects </h2>
                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
                        <?php
                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                            $id = get_the_ID();
                            $permalink = get_the_permalink();
                            $excerpt = excerpt();
                            $post_title = get_the_title();
                            $feature_img = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/dist/images/default-post-img.jpg';
                            $published_date = get_the_date('d M, Y');
                            $project_end_date = get_field('project_end_date', $id);
                            $project_end_date = $project_end_date ? date_format(date_create($project_end_date), "d M, Y") : '';
                            ?>

                            <div class="group">
                                <a href="<?php echo $permalink; ?>">
                                    <div class="feature-image mb-4 relative pt-[79.4%] overflow-hidden">
                                        <img src="<?php echo $feature_img; ?>" alt="feature image"
                                            class="absolute inset-0 object-cover w-full h-full transition-all duration-200 ease-in-out group-hover:scale-105">
                                    </div>
                                    <div class="mb-2 text-sm published-date">Project Date:
                                        <?php $date = array();

                                        if ($published_date)
                                            $date[] = $published_date;
                                        if ($project_end_date)
                                            $date[] = $project_end_date;
                                        echo join(' - ', $date);
                                        ?>
                                    </div>
                                    <h3
                                        class="font-bold leading-tight transition-all duration-200 ease-in-out post-title group-hover:text-o-40">

                                        <?php echo $post_title; ?>

                                    </h3>
                                </a>
                                <div>
                                </div>

                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="mt-6">
                        <?php
                        echo '<div class="flex justify-center">';
                        echo btn_layout_1('view all project', '/project');
                        echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
        wp_reset_postdata();
        ?>

        <!-- action block -->
        <div class="pb-24">
            <?php echo section_action_area(); ?>
        </div>
    </div>
</div>