<?php

//default archive page template card layout

?>

<div class="<?php echo $posttype; ?>-archive">
    <?php
    echo  get_archive_page_heading($posttype);
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
                    $event_location = get_field('event_location');
                    
                    $event_end_date = get_field('event_end_date');
                    $today_date = date('d M, Y');
                    $project_status = (strtotime($today_date) > strtotime($event_end_date)) ? date_format(date_create($event_end_date), "d M, Y")  : 'Current Event';
                ?>
            <div class="mt-28 bg-g-30 post-card" data-id="<?php echo $id; ?>">
                <a href="<?php echo $permalink; ?>">
                    <div class="feature-image -mt-28 relative pt-[67%] w-[92%]">
                        <img src="<?php echo $feature_img; ?>" alt="feature image"
                            class="w-full h-full inset-0 object-cover absolute">
                    </div>
                </a>

                <div class="p-8">
                    <div class="mb-2 flex gap-x-4">
                        <div class="published-date">
                            <span class="font-bold mr-2">Event Date:</span><?php echo $published_date; ?> - <?php echo  $event_end_date; ?> 
                        </div>

                    </div>
                    <div class="mb-2 flex gap-x-4">
                        <div class="project-status">
                            <span class="font-bold mr-2">Location:</span><?php echo  $event_location; ?>
                        </div>
                    </div>

                    <div class="text-2xl font-bold post-title">
                        <a href="<?php echo $permalink; ?>">
                            <?php echo  $title; ?>
                        </a>
                    </div>

                    <!-- <div class="excerpt text-base mt-3">
                        <?php echo  $excerpt; ?>
                    </div> -->
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