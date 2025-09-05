<?php

$id = get_the_ID();
$posttype = get_post_type();
$permalink = get_the_permalink();
$title = get_the_title();
$content = get_the_content();
$feature_img = get_the_post_thumbnail_url();
$published_date = get_the_date('d M, Y');
$tags = get_the_tags();

$taxonomies = 'team_category';
$term_category = get_the_terms($id, $taxonomies);

$designation = get_field('designation');
$e_mail = get_field('e-mail');
$sub_heading = get_field('sub_heading');
$related_project = get_field('related_project');
$related_thematic_area = get_field('related_thematic_area');
$Linkedin = get_field('linkedin');
$Facebook = get_field('facebook');
$Twitter = get_field('twitter');

$pageIdentify = $posttype . '_options';
$bannerImageID = (function_exists('get_field') && $background_image = get_field('background_image', $pageIdentify)) ? $background_image : '';


?>

<div class="single-post-page <?php echo $posttype; ?> ">
    <div class="<?php echo $posttype . '-' . $id ?> bg-n-10">

        <?php echo heroContent($bannerImageID); ?>

        <div class="container py-10 md:pt-[82px] md:pb-[74px]">
            <div class="team-bios">
                <!-- resources-content  -->
                <aside class="sidebar">
                    <div class="post-information">
                        <!-- Staff Images -->

                        <div class="hero">

                            <?php if ($feature_img) { ?>
                                <div class="relative overflow-hidden pt-[77%] mb-6">
                                    <!-- post-feature-image -->
                                    <img src="<?php echo $feature_img; ?>" alt="feature_img"
                                        class="hero-image w-full h-full absolute object-cover inset-0">
                                </div>
                            <?php } ?>
                            <div class="">
                                <div class="content-info-wrap">
                                    <div class="font-bold text-2xl mb-2">
                                        <?php echo $title; ?>
                                    </div>
                                    <div class="post-sub-heading mb-2">
                                        <div class="!leading-normal text-sm">
                                            <?php echo $designation; ?>
                                        </div>
                                    </div>

                                    <div class="email mb-3">
                                        <!-- <div class="text-base font-bold">Email:</div> -->
                                        <div class="text-sm"> <a href="mailto:<?php echo $e_mail; ?>">
                                                <?php echo $e_mail; ?>
                                            </a> </div>

                                    </div>
                                </div>
                            </div>

                            <div class="share-link-btn">
                                <!-- <div class="text-2xl"> Share </div> -->
                                <?php echo yi_social_share(); ?>
                            </div>

                        </div>
                        <!-- team images -->
                        <!-- <?php
                        if ($term_category) {
                            ?>
                        <div class="related-category">
                            <div class="mb-2 sm:mb-4 font-bold">Related Category</div>
                            <ul class="related-content">
                                <?php
                                foreach ($term_category as $category) {
                                    ?>
                         <a href="< ?php echo home_url() . '/team-category/' . $category->slug; ?>"> -->
                                <!-- <li class="related-category-item mb-4" data-category="<?php echo $category->slug; ?>">
                            <--?php echo $category->name; ?>
                        </li> -->
                                <!-- </a> -->

                        </aside>

                        <article class="article">
                            <div>
                                <div class="wp-block-post-content">
                                    <p>
                                        <?php echo $content; ?>
                                    </p>
                                </div>
                                <!-- 
                        < ?php if($Linkedin): ?>
                        <div class=" flex text-sm mb-3 gap-1 items-center">
                            <span> < ?php echo useSvg('linkedin-icon'); ?> </span>
                            <a href="< ?php echo $Linkedin; ?>"> < ?php echo $Linkedin; ?></a>
                        </div>
                        < ?php endif; ?>
                        < ?php if($Facebook): ?>
                        <div class=" flex text-sm mb-3 gap-1 items-center">
                            <span> < ?php echo useSvg('facebook-icon'); ?> </span>
                            <a href="< ?php echo $Facebook; ?>"> < ?php echo $Facebook; ?></a>
                        </div>
                        <  ?php endif; ?>
                        < ?php if($Twitter): ?>
                        <div class=" flex text-sm mb-3 gap-1 items-center">
                            <span> < ?php echo useSvg('twitter-icon'); ?> </span>
                            <a href="< ?php echo $Twitter; ?>"> < ?php echo $Twitter; ?></a>
                        </div>
                        < ?php endif; ?> -->



                        </article>


                        <?php
                                }
                                ?>
                    </ul>
                </div>
                <div class="flex md:justify-end">
                    <aside class="see-team-wrap">
                        <?php
                        }
                        ?>

                    <?php

                    echo '<div class="content">';
                    echo btn_layout_1(' See All Teams', '/team');
                    echo '
                        </div>';
                    ?>

                </aside>
            </div>
        </div>
    </div>
</div>

</div>
<!-- </div> -->