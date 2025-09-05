<?php

/**==============================
 * Current term object
 ================================*/
$post_object = get_post_type_object($posttype);
$labels = $post_object->labels;
$taxonomies = 'news_category';

?>
<div class="<?php echo $posttype; ?>-archive">
    <?php

    echo get_archive_page_heading($posttype);

    echo get_filter_form($posttype, $taxonomies);

    ?>


    <div class="container">
        <?php
        if (have_posts()) {
        ?>
        <div class="<?php echo $posttype; ?> py-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php
                while (have_posts()) {
                    the_post();
                    $id = get_the_ID();
                    $permalink = get_the_permalink();
                    $feature_img = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/dist/images/default-post-img.jpg';
                    $title = get_the_title();
                    $excerpt = excerpt();
                    $published_date = get_the_date('d M, Y');
                    $term_category = get_the_terms($id, $taxonomies);

                ?>
            <div class="mt-28 bg-g-30 post-card" data-id="<?php echo $id; ?>">
                <a href="<?php echo $permalink; ?>">
                    <div class="feature-image -mt-28 relative pt-[67%] w-[92%]">
                        <img src="<?php echo $feature_img; ?>" alt="feature image"
                            class="w-full h-full inset-0 object-cover absolute">
                    </div>
                </a>

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
                    <div class="published-date mb-2">
                        <?php echo  $published_date; ?>
                    </div>

                    <div class="text-2xl font-bold post-title">
                        <a href="<?php echo $permalink; ?>">
                            <?php echo  $title; ?>
                        </a>
                    </div>

                    <div class="readmore mt-3">
                        <?php echo btn_layout_1('Read More', $permalink); ?>
                    </div>
                </div>

            </div>

            <?php
                }
                ?>
        </div>
        <?php
        } else {
        ?>
        <div>
            <p>No data available </p>
        </div>
        <?php
        }
        echo  main_query_pagination();
        ?>
    </div>
</div>