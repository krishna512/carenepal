<?php

/**
 * ===================
 * General variables
 * ===================
 */
$id = get_the_ID();
$posttype = get_post_type();
$permalink = get_the_permalink();
$content = get_the_content();

/**
 * ===================
 * Banner Image
 * ===================
 */
$bannerImageID = (has_post_thumbnail()) ? get_post_thumbnail_id() : '';

if (!$bannerImageID) {
    // get archive image as default
    $pageIdentify = $posttype . '_options';
    $bannerImageID = (function_exists('get_field') && $background_image = get_field('background_image', $pageIdentify)) ? $background_image : '';
}

/**
 * ===================
 * Project date
 * ===================
 */
$published_date = get_field('published_date', $id);
$published_date = $published_date ? date_format(date_create($published_date), "d M, Y") : '';

$project_end_date = get_field('project_end_date', $id);
$project_end_date = $project_end_date ? date_format(date_create($project_end_date), "d M, Y") : '';


/**
 * ===================
 * Location
 * ===================
 */
$taxonomies_location = 'location';
$term_location = (function_exists('get_field') && $project_location = get_field('project_location')) ? $project_location : '';

/**
 * ===================
 * Headings
 * ===================
 */
$title = get_the_title();
$sub_heading = (function_exists('get_field') && $sub_heading = get_field('sub_heading')) ? $sub_heading : '';

/**
 * ===================
 * Thematic areas
 * ===================
 */
$related_thematic_area = get_field('related_thematic_area');
$button_label = (function_exists('get_field') && $button_label = get_field('button_label')) ? $button_label : '';

/**
 * ===================
 * Partner
 * ===================
 */
$related_partner = (function_exists('get_field') && $related_partner = get_field('related_partner')) ? $related_partner : '';

?>
<div class="single-post-page <?php echo $posttype; ?> ">
    <div class="<?php echo $posttype . '-' . $id ?>">
        <?php echo heroContent($bannerImageID); ?>
        <div class="bg-n-10">
            <div class=" py-10 md:pt-[82px] md:pb-[74px]">
                <div class="container">
                    <div class="resources-content  pb-10 md:pb-[74px]">
                        <aside class="sidebar">
                            <div class="post-information">
                                <?php
                                /**
                                 * Thematic Areas
                                 */
                                ?>
                                <div class="pb-4 theme content">
                                    <div class="pb-1 text-sm font-bold">
                                        <?php echo __("Theme", "carenepal"); ?>
                                    </div>
                                    <div class="theme-title">
                                        <?php
                                        $ta = array();
                                        echo '<a href="' . get_the_permalink($related_thematic_area) . '">' . get_the_title($related_thematic_area) . '</a>';
                                        ?>
                                    </div>
                                </div>


                                <?php
                                /**
                                 * Duration
                                 */
                                // $date = array();
                                // $date[] = $published_date;
                                // $date[] = $project_end_date;
                                ?>
                                <div class="py-4 duration content">
                                    <div class="pb-1 text-sm font-bold">
                                        <?php echo __('Duration', 'carenepal'); ?>
                                    </div>
                                    <div class="">
                                        <?php
                                        $date = array();

                                        if ($published_date)
                                            $date[] = $published_date;


                                        if ($project_end_date)
                                            $date[] = $project_end_date;
                                        echo join(' - ', $date);
                                        ?>
                                    </div>
                                </div>
                                <?php if ($term_location): ?>
                                    <div class="py-4 implementation content">
                                        <div class="pb-1 text-sm font-bold">
                                            <?php echo __('Implementation areas', 'carenepal'); ?>
                                        </div>
                                        <div class="">
                                            <?php
                                            if ($term_location) {
                                                $loc = array();
                                                foreach ($term_location as $location) {
                                                    $loc[] = esc_html($location->name);
                                                }

                                                echo join(', ', $loc);
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php endif;


                                if ($related_partner) {
                                    ?>

                                    <div class="py-4 donor content">
                                        <div class="pb-1 text-sm font-bold">
                                            <?php echo __('Donors & Partners', 'carenepal'); ?>
                                        </div>
                                        <div class="">
                                            <?php

                                            $partners = array();
                                            foreach ($related_partner as $partner) {
                                                $link = get_field('website_link', $partner);

                                                $partner = '<a class="hover:text-y-50 transition duration-300 ease-out hover:ease-in" href="' . $link . '" target="_blank" rel="noreferrer nofollow noopener">' . get_the_title($partner) . '</a>';
                                                $partners[] = $partner;
                                            }

                                            echo join(', ', $partners);

                                            ?>

                                        </div>
                                    </div>
                                <?php } ?>

                                <?php
                                /**
                                 * Additional content
                                 */
                                $ac = (function_exists('get_field') && $color = get_field('additional_content', $id)) ? $color : '';
                                if ($ac) {
                                    echo '<div class="mce-content-body thematic-mce-content">';
                                    echo $ac;
                                    echo '</div>';
                                }
                                ?>

                                <div class="py-4 share-link-btn content">
                                    <div class="pb-1 text-sm font-bold">
                                        <?php echo __('Share this', 'carenepal'); ?>
                                        <?php echo $posttype; ?>
                                    </div>
                                    <?php echo yi_social_share(); ?>
                                </div>

                                <div class="pt-4 font-bold view-all external-link">
                                    <a href="<?php echo home_url() . '/' . $posttype; ?>">
                                        <?php

                                        echo '<div>';
                                        echo btn_layout_1('View All projects', '/project');
                                        echo '</div>';
                                        ?>

                                    </a>
                                </div>

                            </div>
                        </aside>

                        <article class="article">

                            <div class="wp-block-post-content">
                                <p>
                                    <?php echo $content; ?>
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="project-layer-line">
                    <?php echo useSvg('project-layer-line'); ?>
                </div>
            </div>



            <!-- Related project  -->
            <?php
            $args = array(
                'post_type' => 'project ',
                'posts_per_page' => '3',
                'post_status' => array('publish'),
                'post__not_in' => array($id),
                'orderby' => 'rand',
                'meta_query' => array(
                    array(
                        'key' => 'related_thematic_area',
                        // 'value'     => $current_id,
                        'compare' => 'LIKE'
                    )
                )
            );
            $taxonomies = 'project_category';
            $taxonomies_location = 'location';
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) {
                ?>
                <div class="pb-14 md:pb-44" id="projects">
                    <div class="container related-project">

                        <h2 class="pb-5 font-bold heading text-n-70">More Projects </h2>

                        <div class="grid gap-5 pb-5 cursor-pointer projects sm:grid-cols-2 lg:grid-cols-3">
                            <?php
                            while ($the_query->have_posts()) {
                                $the_query->the_post();
                                $id = get_the_ID();
                                echo projectCard($id);
                            }
                            ?>
                        </div>
                    </div>
                    <?php

                    echo '<div class="flex justify-center">';
                    echo btn_layout_1('View All Projects', '/project');
                    echo '</div>';
                    ?>

                </div>

            </div>
        </div>
    </div>
    <?php
            }
            // Reset Post Data
            wp_reset_postdata();
            ?>

<!-- Action area block -->
<div class="pb-10 md:pb-24">
    <?php echo section_action_area(); ?>
</div>


</div>
</div>