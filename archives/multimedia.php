<?php

$taxonomies = 'multimedia_category';
$terms = get_terms(['taxonomy' =>  $taxonomies]);
if(is_tax()) {
    $queried_object = get_queried_object();
    $tax_slug = $queried_object->slug;
} else {
    $active_all = "active";
}
?>

<div class="<?php echo $posttype; ?>-archive">
    <?php
    echo  get_archive_page_heading($posttype);
    ?>

    <div class="container">

        <div class="<?php echo $taxonomies; ?> tab-simple-menu">
            <div class="pt-8 pb-3 lg:pt-16 sm:pb-5">
                <ul class="flex flex-wrap text-lg gap-y-2 gap-x-4 sm:gap-x-6 gallery-tab-contents">
                    <li data-filter="all" class="transition-all duration-200 hover:text-o-40 <?php echo $active_all;?>">
                        <a href="/multimedia">
                            All
                        </a>
                    </li>
                    <?php
                    if ($terms) {
                        foreach ($terms as $term) {
                    ?>
                    <li data-filter="<?php echo $term->slug; ?>"
                        class="transition-all duration-200 hover:text-o-40 <?php echo ($term->slug == $tax_slug)?"active":'';?>">
                        <a href="<?php echo home_url() . '/multimedia-category/' . $term->slug; ?>">
                            <?php echo $term->name; ?>
                        </a>
                    </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>

        <?php
        if (have_posts()) {
        ?>
        <div
            class="<?php echo $posttype; ?> py-12 sm:pb-14 lg:pb-20 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

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
                    $video_url = get_field('video_url');
                    $upload_photos = get_field('upload_photos');
                    $taxoTermsSLug = taxoTermsSLugGallery($id, $taxonomies);

                ?>
            <div class="mt-28 bg-g-30 post-card <?php echo  $taxoTermsSLug; ?>" data-id="<?php echo $id; ?>">
                <?php if ($taxoTermsSLug == 'video') { ?>
                <div class="feature-image -mt-28 relative pt-[67%] w-[92%]">
                    <img src="<?php echo $feature_img; ?>" alt="feature image"
                        class="absolute inset-0 object-cover w-full h-full video-thumbnail">
                </div>
                <?php 
                    } 
                ?>
                <?php if ($taxoTermsSLug == 'photo') { ?>
                <div class="photo-gallery-container -mt-28 relative w-[92%] overflow-hidden">
                    <div class="photo-thumbnail-gallery ">
                        <?php
                        if ($upload_photos) {
                                        foreach ($upload_photos as $key => $photo) {
                                ?>
                        <div class="item">
                            <div class="pt-[73%] relative">
                                <?php echo wp_get_attachment_image( $photo['id'], "large", "", array( "class" => "absolute inset-0 object-cover w-full h-full" ) ); ?>
                            </div>
                        </div>
                        <?php
                        break;
                            }
                        }
                    ?>
                    </div>
                </div>
                <?php 
                    } 
                ?>

                <?php
                        if ($term_category) {
                        ?>
                <div class="related-category <?php echo $taxonomies; ?>">
                    <div class="card-tag">
                        <ul class="card-tag-inner">
                            <?php
                                        foreach ($term_category as $category) {
                                            $multimedia_category = $category->slug;
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
                        <?php echo  $published_date; ?>
                    </div>
                    <?php
                            if ($multimedia_category == 'video') {
                                $classes = "video-btn";
                                $btn_text = "View Video";
                                $src = $video_url;
                            }
                            if ($multimedia_category == 'photo') {
                                $classes = "gallery-btn";
                                $btn_text = "View Photos";
                            }
                            ?>
                    <div class="text-2xl font-bold transition-all post-title">
                        <?php echo  $title; ?>
                        <div class="cursor-pointer text-base mt-4 py-2.5 px-4 border transition-all duration-300 border-o-40 hover:bg-o-40 hover:text-n-70 max-w-fit <?php echo $classes ?>"
                            data-src="<?php echo $src ?>">
                            <?php echo $btn_text; ?>
                        </div>
                    </div>


                    <?php
                                if ($multimedia_category == 'photo') { ?>
                    <div class="hidden mt-3 text-base gallery-images">
                        <?php
                        
                                    if ($upload_photos) {
                                        foreach ($upload_photos as $key => $photo) {
                                ?>
                        <div class="item" data-src="<?php echo $photo['url']; ?>"
                            data-sub-html="<?php echo $photo['caption']; ?>">
                            <?php echo wp_get_attachment_image( $photo['id'], "thumbnail", "", array( "class" => "" ) ); ?>
                        </div>
                        <?php
                                        }
                                    }
                                ?>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <?php
                }
                ?>

            <div class="fixed top-0 left-0 z-30 w-screen h-screen video-page popup-page">
                <div class="container relative flex items-center justify-center h-full">
                    <div class="relative">
                        <iframe class="screen-popup-container" width="700" height="392" src="" title="" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                        <div tabindex="0"
                            class="absolute p-3 text-xs text-white border border-white border-solid rounded-full cursor-pointer video-close">
                            <?php echo useSvg('cross-icon'); ?>
                        </div>
                    </div>
                </div>
            </div>
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