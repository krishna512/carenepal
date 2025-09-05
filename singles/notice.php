<?php

$id = get_the_ID();
$posttype = get_post_type();
$permalink = get_the_permalink();
$title = get_the_title();
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

$published_date = get_the_date('d M, Y');

$deadline = get_field('deadline');
$deadline = date_format(date_create($deadline), "d M, Y");

$sub_heading = get_field('sub_heading');
$select_upload_file = get_field('select_upload_files');

$upload_file = get_field('upload_file');

$file_link = get_field('file_link');







$upload_appliction_form = get_field('upload_appliction_form');

?>

<div class="single-post-page <?php echo $posttype; ?> ">
    <div class="<?php echo $posttype . '-' . $id ?>">
        <?php echo heroContent($bannerImageID); ?>
        <div class=" py-10 md:pt-[82px] md:pb-[74px]">
            <div class="container">
                <div class="resources-content">
                    <aside class="sidebar">
                        <div class="post-information">
                            <div class="published-date content">
                                <div class="font-bold text-sm pb-1">Date From</div>
                                <div class="">
                                    <?php echo $published_date; ?>
                                </div>
                            </div>
                            <div class="end-date content">
                                <div class="font-bold text-sm pb-1">Date To</div>
                                <div class="">
                                    <?php echo $deadline; ?>
                                </div>
                            </div>



                            <div class="share-link-btn content py-4">
                                <div class="font-bold text-sm pb-1">
                                    <?php echo __('Share this', 'carenepal'); ?>
                                    <?php echo $posttype; ?>
                                </div>
                                <?php echo yi_social_share(); ?>
                            </div>

                            <?php

                            echo '<div class="content">';
                            echo btn_layout_1('SEE ALL Notice', '/notice');
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

                            <div class="upload-file font-bold mt-6">
                                <?php if ($select_upload_file == 'Upload File') { ?>
                                    <a href="<?php echo $upload_file; ?>"
                                        class="inline-flex  gap-x-1 items-center justify-center transition-all duration-200  view-all-btn text-n-50">
                                        View File
                                        <span class="text-sm">
                                            <?php echo useSvg('right-arrow'); ?>
                                        </span>

                                    </a>
                                <?php } else { ?>

                                    <a href="<?php echo $file_link; ?>"
                                        class="inline-flex  gap-x-1 items-center justify-center transition-all duration-200  view-all-btn text-n-50">
                                        View File
                                        <span class="text-sm">
                                            <?php echo useSvg('right-arrow'); ?>
                                        </span>

                                    </a>
                                <?php } ?>
                            </div>

                        </div>
                    </article>
                </div>
            </div>
        </div>

    </div>
</div>