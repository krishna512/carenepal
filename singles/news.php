<?php

$id = get_the_ID();
$posttype = get_post_type();
$permalink = get_the_permalink();
$title = get_the_title();
$content = get_the_content();
$feature_img = get_the_post_thumbnail_url();
$published_date = get_the_date('d M, Y');


$taxonomies = 'news_category';
$term_category = get_the_terms($id, $taxonomies);

$sub_heading = get_field('sub_heading');
$upload_file = get_field('file_upload');
$related_project = get_field('related_project');
$related_thematic_area = get_field('related_thematic_area');
$bannerImageID = (has_post_thumbnail()) ? get_post_thumbnail_id() : '';

if (!$bannerImageID) {
    // get archive image as default
    $pageIdentify = $posttype . '_options';
    $bannerImageID = (function_exists('get_field') && $background_image = get_field('background_image', $pageIdentify)) ? $background_image : '';
}

?>
<!-- <?php echo $feature_img; ?> -->
<div class="single-post-page <?php echo $posttype; ?> bg-n-10">
    <div class="<?php echo $posttype . '-' . $id; ?>">
        <div class="<?php echo $posttype . '-' . $id; ?> bg-n-10">
            <?php echo heroContent($bannerImageID); ?>
            <div class=" py-10 md:pt-[82px] md:pb-[74px]">
                <div class="container">
                    <div class="resources-content">
                        <aside class="sidebar">
                            <div class="post-information">
                                <div class="date content">
                                    <div class="font-bold text-sm pb-1">Date</div>
                                    <div class="">
                                        <?php echo $published_date; ?>
                                    </div>
                                </div>
                                <?php
                                if ($term_category) {
                                    ?>
                                    <div class="related-category content">

                                        <div class="mb-2 sm:mb-4 font-bold">Category</div>
                                        <ul class="related-content">
                                            <?php
                                            foreach ($term_category as $category) {
                                                ?>
                                                <a href="<?php echo home_url() . '/news-category/' . $category->slug; ?>">
                                                    <li class="related-category-item"
                                                        data-category="<?php echo $category->slug; ?>">
                                                        <?php echo $category->name; ?> </li>
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <?php
                                }
                                if ($upload_file) {
                                    ?>
                                    <div class="upload-file content">
                                        <a href="<?php echo $upload_file; ?>">
                                            <div class="inline-flex gap-2 transition-all duration-200 hover:text-o-40">
                                                View File
                                                <?php echo useSvg('download'); ?>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>

                                <div class="share-link-btn content">
                                    <div class="font-bold text-sm pb-1">
                                        <?php echo __('Share this', 'carenepal'); ?>
                                        <?php echo $posttype; ?>
                                    </div>
                                    <?php echo yi_social_share(); ?>
                                </div>

                                <?php

                                echo '<div class="content">';
                                echo btn_layout_1(' See All News', '/news');
                                echo '
                        </div>';
                                ?>

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
            </div>

            <!-- Related project -->
            <!-- <?php
            if ($related_project) {
                echo related_project($related_project);
            }
            ?> -->

            <!-- Related thematic area -->
            <!-- <?php
            if ($related_thematic_area) {
                echo related_thematic_area($related_thematic_area);
            }
            ?> -->

        </div>
    </div>