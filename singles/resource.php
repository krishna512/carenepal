<?php

$id = get_the_ID();
$posttype = get_post_type();
$permalink = get_the_permalink();
$title = get_the_title();
$content = get_the_content();

// get thumbnail image
$bannerImageID = (function_exists('get_field') && $fearure_image = get_field('fearure_image')) ? $fearure_image : '';
if (!$bannerImageID) {
    // get archive image as default
    $pageIdentify = $posttype . '_options';
    $bannerImageID = (function_exists('get_field') && $background_image = get_field('background_image', $pageIdentify)) ? $background_image : '';
}

$published_date = get_the_date('d M, Y');
$tags = get_the_tags();

$taxonomies = 'resources_category';
$term_category = get_the_terms($id, $taxonomies);

$upload_file = get_field('upload_file');
$external_link = get_field('external_link');
$sub_heading = get_field('sub_heading');
$related_project = get_field('related_project');
$related_thematic_area = get_field('related_thematic_area');
$contentExists = get_post()->post_content ? true : false;
?>

<div class="single-post-page <?php echo $posttype; ?> ">
    <div class="<?php echo $posttype . '-' . $id ?> bg-n-10">
        <?php echo heroContent($bannerImageID); ?>
        <div class=" py-10 md:pt-[82px] md:pb-[74px]">
            <div class="container">
                <div class="resources-content ">
                    <aside class="sidebar">
                        <div class="post-information">

                            <?php
                            // <div class="date content">
                            //     <div class="pb-1 text-sm font-bold">Date</div>
                            //     <div class="">
                            //         <?php echo $published_date; 
                            //     </div>
                            // </div>
                            ?>

                            <?php
                            if ($term_category) {
                                ?>
                                <div class="content ">

                                    <div class="related-category">
                                        <div class="pb-1 text-sm font-bold ">Category</div>
                                        <ul class="related-content">
                                            <?php
                                            foreach ($term_category as $category) {
                                                ?>
                                                <a href="<?php echo home_url() . '/resources-category/' . $category->slug; ?>">
                                                    <li class="related-category-item"
                                                        data-category="<?php echo $category->slug; ?>">
                                                        <?php echo $category->name; ?>
                                                    </li>
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="share-link-btn content">
                                <div class="pb-1 text-sm font-bold">
                                    <?php echo __('Share this', 'carenepal'); ?>
                                    <?php echo $posttype; ?>
                                </div>
                                <?php echo yi_social_share(); ?>
                            </div>


                            <?php

                            echo '<div class="content">';
                            echo btn_layout_1('  See All Resources', '/resource');
                            echo '
                        </div>';
                            ?>

                        </div>
                    </aside>

                    <article class="article">
                        <?php
                        if ($contentExists) { ?>
                            <div class="wp-block-post-content">
                                <?php echo $content; ?>
                            </div>
                        <?php } ?>

                        <div class="flex flex-wrap gap-5<?php echo $contentExists ? ' mt-6' : ''; ?>">
                            <?php
                            if ($upload_file) {
                                ?>
                                <div class="font-bold upload-file">
                                    <a href="<?php echo $upload_file; ?>"
                                        class="flex items-center justify-center transition-all duration-200 gap-x-1 view-all-btn text-n-50">
                                        Download File
                                        <?php echo useSvg('download'); ?>

                                    </a>
                                </div>
                                <?php
                            }

                            if ($external_link) {
                                ?>
                                <div class="font-bold external-link">
                                    <a href="<?php echo $external_link; ?>"
                                        class="flex items-center justify-center transition-all duration-200 gap-x-1 view-all-btn text-n-50">

                                        View File
                                        <span class="text-sm">
                                            <?php echo useSvg('right-arrow'); ?>
                                            <span>


                                    </a>
                                </div>
                                <?php
                            }
                            ?>
                        </div>

                    </article>

                </div>
            </div>
        </div>





    </div>
</div>