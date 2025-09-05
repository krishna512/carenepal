<?php

$id = get_the_ID();
$posttype = get_post_type();
$permalink = get_the_permalink();
$title = get_the_title();
$content = get_the_content();
// get thumbnail image
$bannerImageID = (has_post_thumbnail()) ? get_post_thumbnail_id() : '';
// $bannerImageID = (function_exists('get_field') && $fearure_image = get_field('fearure_image')) ? $fearure_image : '';

if (!$bannerImageID) {
    // get archive image as default
    $pageIdentify = $posttype . '_options';
    $bannerImageID = (function_exists('get_field') && $background_image = get_field('background_image', $pageIdentify)) ? $background_image : '';
}

$published_date = get_the_date('d M, Y');

$sub_heading = get_field('sub_heading');
$related_project = get_field('related_project');
$related_thematic_area = get_field('related_thematic_area');

?>
<!-- <?php echo $feature_img; ?> -->
<div class="single-post-page <?php echo $posttype; ?>">
    <div class="<?php echo $posttype . '-' . $id; ?> bg-n-10">
        <?php echo heroContent($bannerImageID); ?>
        <div class=" py-10 md:pt-[82px] md:pb-[74px]">
            <div class="container">
                <div class="resources-content">
                    <aside class="sidebar">
                        <div class="post-information">
                            <div class="published-date content">
                                <div class="font-bold text-sm pb-1">Date </div>

                                <div class="">
                                    <?php echo $published_date; ?>
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

                            <div class="share-link-btn content">
                                <div class="font-bold text-sm pb-1">
                                    <?php echo __('Share this', 'carenepal'); ?>
                                    <?php echo $posttype; ?>
                                </div>
                                <?php echo yi_social_share(); ?>
                            </div>

                            <?php
                            echo '<div class="content">';
                            echo btn_layout_1('See All Stories', '/story');
                            echo '</div>';
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

    </div>
</div>