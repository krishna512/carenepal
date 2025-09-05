<?php

$id = get_the_ID();
$posttype = get_post_type();
$permalink = get_the_permalink();
$title = get_the_title();
$content = get_the_content();

// echo $posttype;
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

// $taxonomies = 'vacancy_category';
// $term_category = get_the_terms($id, $taxonomies);
// var_dump($term_category);
// die();
$deadline = get_field('deadline');
$today_date = date('d M, Y');
$vacancy_status = (strtotime($today_date) < strtotime($deadline)) ? true : false;
$deadline = date_format(date_create($deadline), "d M, Y");

$upload_file = get_field('upload_file');
$sub_heading = get_field('sub_heading');


if ($posttype == 'vacancy') {
    $Apply_url = get_field('vacancy_button_url', "option") . '?title=' . $title . '&id=' . $id;

}
// var_dump($term_category);
if ($posttype == 'consultancy') {
    $Apply_url = get_field('google_form_link');
}

?>

<div class="single-post-page <?php echo $posttype; ?> ">
    <div class="<?php echo $posttype . '-' . $id ?> bg-n-10">
        <?php echo heroContent($bannerImageID); ?>
        <div class="container py-10 md:pt-[82px] md:pb-[74px]">
            <div class="resources-content ">
                <aside class="sidebar">
                    <div class="post-information">
                        <div class="published-date  content">
                            <div class="font-bold text-sm pb-1">Post Date</div>
                            <div class="">
                                <?php echo $published_date; ?>
                            </div>
                        </div>
                        <div class="end-date content ">
                            <div class="font-bold text-sm pb-1">Deadline</div>
                            <div class="">
                                <?php echo $deadline; ?>
                            </div>
                        </div>

                        <?php if ($vacancy_status && $Apply_url) { ?>
                            <div class="content">
                                <?php echo btn_layout_2('Apply Now', $Apply_url); ?>
                            </div>
                        <?php } ?>
                        <div class="share-link-btn content">
                            <div class="pb-1 text-sm font-bold">
                                <?php echo __('Share this', 'carenepal'); ?>
                                <?php echo $posttype; ?>
                            </div>
                            <?php echo yi_social_share(); ?>
                        </div>
                        <?php
                        // echo '<div class="content">';
                        // echo btn_layout_1(' See All' . ' ' . $term_category[0]->name, '/category/' . $term_category[0]->name);
                        // echo '</div>';
                        ?>

                    </div>
                </aside>

                <article class="article">

                    <div class="wp-block-post-content">
                        <?php echo $content; ?>
                    </div>
                    <?php if ($upload_file) { ?>
                        <div class="upload-file font-bold mt-4">
                            <a href="<?php echo $upload_file; ?>"
                                class="view-all-btn inline-flex items-center gap-2 transition-all duration-200">
                                View Job Description File
                                <?php echo useSvg('download'); ?>

                            </a>
                        </div>
                    <?php } ?>
                </article>
            </div>
        </div>

    </div>
</div>