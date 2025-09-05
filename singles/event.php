<?php

$id = get_the_ID();
$posttype = get_post_type();
$permalink = get_the_permalink();
$title = get_the_title();
$content = get_the_content();
// $feature_img = get_the_post_thumbnail_url();
// get thumbnail image
$bannerImageID = (function_exists('get_field') && $fearure_image = get_field('fearure_image')) ? $fearure_image : '';
if (!$bannerImageID) {
    // get archive image as default
    $pageIdentify = $posttype . '_options';
    $bannerImageID = (function_exists('get_field') && $background_image = get_field('background_image', $pageIdentify)) ? $background_image : '';
}
$published_date = get_the_date('d M, Y');

$sub_heading = get_field('sub_heading');

$event_end_date = get_field('event_end_date');
$end_date = date_format(date_create($event_end_date), "d M, Y");

$event_location = get_field('event_location');

$additional_content = get_field('additional_content ');

?>

<div class="single-post-page <?php echo $posttype; ?>">
    <div class="<?php echo $posttype . '-' . $id; ?>">
        <?php echo heroContent($bannerImageID); ?>
    </div>
    <div class="bg-n-10">
        <div class=" py-10 md:pt-[82px] md:pb-[74px] container">

            <div class="resources-content">
                <aside class="sidebar">
                    <div class="post-information">
                        <div class="content">
                            <div class="text-sm pb-1font-bold">Event Date</div>
                            <div class="">
                                <?php
                                $date = array();
                                $date[] = $published_date;
                                $date[] = $end_date;
                                echo join(' - ', $date); ?>
                            </div>
                        </div>
                        <div class="content">
                            <div class="text-sm pb-1font-bold">Location:</div>
                            <div class="">
                                <?php echo $event_location; ?>
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
                        echo btn_layout_1('See all Event', '/event');
                        echo '</div>';
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
    </div>
</div>
</div>