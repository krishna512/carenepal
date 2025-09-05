<?php
$id = get_the_ID();
$current_id = $id;
$posttype = get_post_type();
$permalink = get_the_permalink();
$title = get_the_title();
$content = get_the_content();

// get thumbnail image
$bannerImageID = (has_post_thumbnail()) ? get_post_thumbnail_id() : '';

if (!$bannerImageID) {
    // get archive image as default
    $pageIdentify = $posttype . '_options';
    $bannerImageID = (function_exists('get_field') && $background_image = get_field('background_image', $pageIdentify)) ? $background_image : '';
}

$reach = get_field('reach');
$published_date = get_the_date('d M, Y');
$sub_heading = get_field('sub_heading');
$color = (function_exists('get_field') && $color = get_field('color_identity', $id)) ? $color : '';
$label = (function_exists('get_field') && $label = get_field('label', $id)) ? $label : 'Program Participants';


?>
<div class="thematic-single bg-n-10">
    <div class="<?php echo $posttype . '-' . $id ?> thematic-hero ">
        <?php echo heroContent($bannerImageID); ?>
    </div>
    <div class="navbar-sticky bg-n-10">
        <div class="container on-page-navigation">
            <div class="border-bottom border-b-2 border-[#eee9e5] sm:pt-4 lg:pt-16">
                <ul class="flex flex-wrap gap-y-2 gap-x-6 sm:text-xl">
                    <li class="nav-item" data-id="about">
                        <a href="#about" class="inline-block">About</a>
                    </li>
                    <?php
                    // project
                    $args = array(
                        'post_type' => 'project ',
                        'posts_per_page' => '3',
                        'post_status' => array('publish'),
                        'meta_query' => array(
                            array(
                                'key' => 'related_thematic_area',
                                'value' => $current_id,
                                'compare' => 'LIKE'
                            )
                        )
                    );
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) {
                        ?>
                        <li class="nav-item" data-id="projects">
                            <a href="#projects" class="inline-block">Projects</a>
                        </li>
                        <?php
                    }
                    // resource
                    $args = array(
                        'post_type' => 'resource ',
                        'posts_per_page' => '3',
                        'post_status' => array('publish'),
                        'meta_query' => array(
                            array(
                                'key' => 'related_thematic_area',
                                'value' => $current_id,
                                'compare' => 'LIKE'
                            )
                        )
                    );
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) {
                        ?>
                        <li class="nav-item" data-id="resources">
                            <a href="#resources" class="inline-block">Resources</a>
                        </li>
                        <?php
                    }
                    // story
                    $args = array(
                        'post_type' => 'story ',
                        'posts_per_page' => '3',
                        'post_status' => array('publish'),
                        'meta_query' => array(
                            array(
                                'key' => 'related_thematic_area',
                                'value' => $current_id,
                                'compare' => 'LIKE'
                            )
                        )
                    );
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) {
                        ?>
                        <li class="nav-item" data-id="stories">
                            <a href="#stories" class="inline-block">Stories</a>
                        </li>
                        <?php
                    }
                    // news
                    $args = array(
                        'post_type' => 'news ',
                        'posts_per_page' => '3',
                        'post_status' => array('publish'),
                        'meta_query' => array(
                            array(
                                'key' => 'related_thematic_area',
                                'value' => $current_id,
                                'compare' => 'LIKE'
                            )
                        )
                    );
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) {
                        ?>
                        <li class="nav-item" data-id="news">
                            <a href="#news" class="inline-block">News</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="container  py-10 md:pt-[82px] md:pb-[74px]">
        <div class=" resources-content nav-items" id="about">

            <aside class="sidebar">
                <div class="post-information">
                    <?php
                    /**
                     * Date
                     */
                    ?>
                    <?php
                    /**
                     * Beneficiary
                     */
                    ?>
                    <div class="content">
                        <div class="flex px-5 py-3 font-bold text-white gap-x-1 beneficiaries-content bg-b-5 flex-col gap-1 "
                            style="background-color: <?php echo $color; ?>">

                            <div class="text-2xl">
                                <?php echo $reach; ?>
                            </div>
                            <div class="text-sm">
                                <?php echo $label; ?>
                            </div>
                        </div>
                    </div>
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
                </div>
            </aside>

            <article class="article">
                <div class="wp-block-post-content">
                    <?php echo $content; ?>
                </div>
            </article>
        </div>
    </div>

    <!-- Related project  -->
    <?php
    $args = array(
        'post_type' => 'project ',
        'posts_per_page' => '3',
        'post_status' => array('publish'),
        'meta_query' => array(
            array(
                'key' => 'related_thematic_area',
                'value' => $current_id,
                'compare' => 'LIKE'
            )
        )
    );
    $taxonomies = 'project_category';
    $taxonomies_location = 'location';
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        ?>
        <div class="section-background nav-items py-14 lg:py-20" id="projects">
            <div class="container related-project">
                <div
                    class="flex flex-wrap justify-between pb-6 border-b-8 sm:pl-6 gap-x-6 gap-y-2 sm:pb-0 sm:border-b-0 sm:border-l-8 border-o-40">
                    <h2 class="font-bold">Related Projects </h2>

                </div>
                <div class="grid grid-cols-1 gap-8 pt-12 project sm:grid-cols-2 lg:grid-cols-3">
                    <?php
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        $id = get_the_ID();
                        $excerpt = excerpt();
                        $post_title_limit = get_the_title();
                        $feature_img = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/dist/images/default-post-img.jpg';
                        $published_date = get_the_date('d M, Y');
                        $today_date = date('d M, Y');
                        $project_end_date = get_field('project_end_date', $id);
                        $project_end_date = $project_end_date ? date_format(date_create($project_end_date), "d M, Y") : '';
                        $project_status = (strtotime($today_date) > strtotime($project_end_date)) ? date_format(date_create($project_end_date), "d M, Y") : 'Current Project';
                        $term_location = get_the_terms($id, $taxonomies_location);

                        ?>
                        <div class="mt-28 bg-g-30 post-card" data-id="<?php echo $id; ?>">
                            <div class="feature-image -mt-28 relative pt-[67%] w-[92%]">
                                <a href="<?php echo get_the_permalink(); ?>">
                                    <img src="<?php echo $feature_img; ?>" alt="project -image"
                                        class="absolute inset-0 object-cover w-full h-full">
                                </a>
                            </div>
                            <div class="p-8">
                                <div class="flex mb-2 gap-x-4">
                                    <div class="published-date opacity-70">
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
                                <div class="text-2xl font-bold post-title">
                                    <a href="<?php echo get_the_permalink(); ?>">
                                        <?php echo $post_title_limit; ?>
                                    </a>
                                </div>

                                <?php
                                if ($term_location) {
                                    ?>
                                    <div class="related-category <?php echo $taxonomies; ?> ">
                                        <ul class="mt-3">
                                            <?php
                                            foreach ($term_location as $category) {
                                                ?>
                                                <li class="" data-category="<?php echo $category->slug; ?>">
                                                    <a href="/project/?project_location=<?php echo $category->slug; ?>">
                                                        <?php echo $category->name; ?> </a>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>


                <?php

                echo '<div class="mt-8 flex justify-center">';
                echo btn_layout_1('View All Projects', '/project');
                echo '</div>';
                ?>

            </div>
        </div>
        <?php
    }
    // Reset Post Data
    wp_reset_postdata();
    ?>

    <!-- Related resource  -->
    <?php
    $args = array(
        'post_type' => 'resource ',
        'posts_per_page' => '3',
        'post_status' => array('publish'),
        'meta_query' => array(
            array(
                'key' => 'related_thematic_area',
                'value' => $current_id,
                'compare' => 'LIKE'
            )
        )
    );
    $taxonomies = 'resources_category';
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        ?>
        <div class="section-background nav-items py-14 lg:py-20" id="resources">
            <div class="container related-resource">
                <div
                    class="flex flex-wrap justify-between pb-6 border-b-8 sm:pl-6 gap-x-6 gap-y-2 sm:pb-0 sm:border-b-0 sm:border-l-8 border-o-40">
                    <h2 class="font-bold">Related Resources </h2>
                </div>
                <div class="grid grid-cols-1 gap-8 pt-12 resource sm:grid-cols-2 lg:grid-cols-3">
                    <?php
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        $id = get_the_ID();
                        $excerpt = excerpt();
                        $post_title_limit = get_the_title();
                        $feature_img = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/dist/images/default-post-img.jpg';
                        $published_date = get_the_date('d M, Y');
                        $term_category = get_the_terms($id, $taxonomies);

                        ?>
                        <div class="mt-28 bg-g-30 post-card" data-id="<?php echo $id; ?>">
                            <div class="feature-image -mt-28 relative pt-[67%] w-[92%]">
                                <a href="<?php echo get_the_permalink(); ?>">
                                    <img src="<?php echo $feature_img; ?>" alt="resource -image"
                                        class="absolute inset-0 object-cover w-full h-full">
                                </a>
                            </div>
                            <?php
                            if ($term_category) {
                                ?>
                                <div class="related-category <?php echo $taxonomies; ?> ">
                                    <div class="card-tag">
                                        <ul class="card-tag-inner">
                                            <?php
                                            foreach ($term_category as $category) {
                                                ?>
                                                <li class="" data-category="<?php echo $category->slug; ?>">
                                                    <?php echo $category->name; ?> </li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="p-8">
                                <div class="mb-2 published-date">
                                    <?php echo $published_date; ?>
                                </div>

                                <div class="text-2xl font-bold post-title">
                                    <a href="<?php echo get_the_permalink(); ?>">
                                        <?php echo $post_title_limit; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <?php

                echo '<div class="mt-8 flex justify-center">';
                echo btn_layout_1('View All Resources', '/resource');
                echo '</div>';
                ?>
            </div>
        </div>
        <?php
    }
    // Reset Post Data
    wp_reset_postdata();
    ?>


    <!-- Related story  -->
    <?php
    $args = array(
        'post_type' => 'story ',
        'posts_per_page' => '3',
        'post_status' => array('publish'),
        'meta_query' => array(
            array(
                'key' => 'related_thematic_area',
                'value' => $current_id,
                'compare' => 'LIKE'
            )
        )
    );
    $taxonomies = 'resources_category';
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        ?>
        <div class="section-background nav-items py-14 lg:py-20" id="stories">
            <div class="container related-story">
                <div
                    class="flex flex-wrap justify-between pb-6 border-b-8 sm:pl-6 gap-x-6 gap-y-2 sm:pb-0 sm:border-b-0 sm:border-l-8 border-o-40">
                    <h2 class="font-bold">Related Stories </h2>

                </div>

                <div class="grid grid-cols-1 gap-8 pt-12 story sm:grid-cols-2 lg:grid-cols-3">
                    <?php
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        $id = get_the_ID();
                        $excerpt = excerpt();
                        $post_title_limit = get_the_title();
                        $feature_img = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/dist/images/default-post-img.jpg';
                        $published_date = get_the_date('d M, Y');
                        $term_category = get_the_terms($id, $taxonomies);

                        ?>
                        <div class="mt-28 bg-g-30 post-card" data-id="<?php echo $id; ?>">
                            <div class="feature-image -mt-28 relative pt-[67%] w-[92%]">
                                <a href="<?php echo get_the_permalink(); ?>">
                                    <img src="<?php echo $feature_img; ?>" alt="story -image"
                                        class="absolute inset-0 object-cover w-full h-full">
                                </a>
                            </div>
                            <?php
                            if ($term_category) {
                                ?>
                                <div class="related-category <?php echo $taxonomies; ?> ">
                                    <div class="card-tag">
                                        <ul class="card-tag-inner">
                                            <?php
                                            foreach ($term_category as $category) {
                                                ?>
                                                <li class="" data-category="<?php echo $category->slug; ?>">
                                                    <?php echo $category->name; ?> </li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="p-8">
                                <div class="mb-2 published-date">
                                    <?php echo $published_date; ?>
                                </div>

                                <div class="text-2xl font-bold post-title">
                                    <a href="<?php echo get_the_permalink(); ?>">
                                        <?php echo $post_title_limit; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <?php

                echo '<div class="mt-8 flex justify-center">';
                echo btn_layout_1('View All Stories', '/story');
                echo '</div>';
                ?>
            </div>
        </div>
        <?php
    }
    // Reset Post Data
    wp_reset_postdata();
    ?>

    <!-- Related news  -->
    <?php
    $args = array(
        'post_type' => 'news ',
        'posts_per_page' => '3',
        'post_status' => array('publish'),
        'meta_query' => array(
            array(
                'key' => 'related_thematic_area',
                'value' => $current_id,
                'compare' => 'LIKE'
            )
        )
    );
    $taxonomies = 'news_category';
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        ?>
        <div class="section-background nav-items py-14 lg:py-20" id="news">
            <div class="container related-news">
                <div
                    class="flex flex-wrap justify-between pb-6 border-b-8 sm:pl-6 gap-x-6 gap-y-2 sm:pb-0 sm:border-b-0 sm:border-l-8 border-o-40">
                    <h2 class="font-bold">Related News </h2>

                </div>

                <div class="grid grid-cols-1 gap-8 pt-12 news sm:grid-cols-2 lg:grid-cols-3">
                    <?php
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        $id = get_the_ID();
                        $excerpt = excerpt();
                        $post_title_limit = get_the_title();
                        $feature_img = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/dist/images/default-post-img.jpg';
                        $published_date = get_the_date('d M, Y');
                        $term_category = get_the_terms($id, $taxonomies);

                        ?>
                        <div class="mt-28 bg-g-30 post-card" data-id="<?php echo $id; ?>">
                            <div class="feature-image -mt-28 relative pt-[67%] w-[92%]">
                                <a href="<?php echo get_the_permalink(); ?>">
                                    <img src="<?php echo $feature_img; ?>" alt="news -image"
                                        class="absolute inset-0 object-cover w-full h-full">
                                </a>
                            </div>
                            <?php
                            if ($term_category) {
                                ?>
                                <div class="related-category <?php echo $taxonomies; ?> ">
                                    <div class="card-tag">
                                        <ul class="card-tag-inner">
                                            <?php
                                            foreach ($term_category as $category) {
                                                ?>
                                                <li class="" data-category="<?php echo $category->slug; ?>">
                                                    <?php echo $category->name; ?> </li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="p-8">
                                <div class="mb-2 published-date">
                                    <?php echo $published_date; ?>
                                </div>

                                <div class="text-2xl font-bold post-title">
                                    <a href="<?php echo get_the_permalink(); ?>">
                                        <?php echo $post_title_limit; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php

                echo '<div class="mt-8 flex justify-center">';
                echo btn_layout_1('View All News', '/news');
                echo '</div>';
                ?>
            </div>
        </div>
        <?php
    }
    // Reset Post Data
    wp_reset_postdata();
    ?>
</div>