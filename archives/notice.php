<?php
//default archive page template card layout
?>
<div class="<?php echo $posttype; ?>-archive">
    <?php
    echo get_archive_page_heading($posttype);
    $args = array(
        'post_type' => 'notice',
        'posts_per_page' => -1,
        'post_status' => array('publish'),
        
        'meta_query' => array(
            array(
                'key'     => 'deadline',
                'value'   => date('Y-m-d'),
                'compare' => '>=',
                'type' => 'date'
            )
        ),
    );
    $custom_query = new WP_Query($args);
    // var_dump($custom_query);

?>


    <div class="container">
        <?php
        if ($custom_query->have_posts()) {
            ?>
        <div class="<?php echo $posttype; ?> py-10 md:pt-[82px] md:pb-[74px]">
            <div class="grid gap-6">
                <?php
                    while ($custom_query->have_posts()) {
                        $custom_query->the_post();
                        $id = get_the_ID();
                        $permalink = get_the_permalink();
                        $feature_img = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/dist/images/default-post-img.jpg';
                        $title = get_the_title();
                        $excerpt = excerpt();
                        $published_date = get_the_date('d M, Y');
                        $today_date = date('d M, Y');

                        $select_upload_file = get_field('select_upload_files');

                        $upload_file = get_field('upload_file');

                        $file_link = get_field('file_link');
                        $deadline = get_field('deadline');
                        $deadline = date_format(date_create($deadline), "d M, Y");
                        ?>
                <div data-id="<?php echo $id; ?>">
                    <div class="p-8 flex vacancy-post-card flex-wrap max-sm:flex-col gap-y-4 justify-between bg-g-30 ">
                        <div class=" md:basis-1/2">
                            <div class="text-2xl font-bold  hover:text-o-40">
                                <a href="<?php echo $permalink; ?>">
                                    <?php echo $title; ?>
                                </a>
                            </div>
                            <?php if ($select_upload_file == 'Upload File') { ?>
                            <div class="flex gap-6 mt-2">
                                <div>
                                    <a href="<?php echo $upload_file; ?>" target="_blank"
                                        class="hover:text-o-40 transition-all duration-200 ease-in-out">
                                        View Job Description
                                    </a>
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="flex gap-6 mt-2">
                                <div>
                                    <a href="<?php echo $file_link; ?>" target="_blank"
                                        class="hover:text-o-40 transition-all duration-200 ease-in-out">
                                        View Job Description
                                    </a>
                                </div>
                            </div>

                            <?php } ?>
                        </div>
                        <div class="md:basis-[162px]">
                            <div class="opacity-60">
                               Deadline
                            </div>
                            <div class="deadline-date mb-2 text-2xl">
                                <?php echo $deadline; ?>
                            </div>
                        </div>
                        <div class="md:basis-[162px]">
                            <?php if ($select_upload_file == 'Upload File') { ?>
                            <div class="">
                                <a href="<?php echo $upload_file; ?>" download
                                    class="view-all-btn inline-flex items-center gap-2 transition-all duration-200">
                                    Download File
                                    <?php echo useSvg('download'); ?>
                                </a>
                            </div>
                            <?php } else { ?>
                            <div class="">
                                <a href="<?php echo $file_link; ?>" download
                                    class="view-all-btn inline-flex items-center gap-2 transition-all duration-200">
                                    Download File
                                    <?php echo useSvg('download'); ?>
                                </a>
                            </div>
                            <?php } ?>
                        </div>

                    </div>
                </div>
                <?php
                    }
                    ?>
            </div>
        </div>
        <?php
        } else {
            ?>
    </div>
    <div>
        <p>No data available </p>
    </div>
    <?php
        }
        echo main_query_pagination();
        ?>
</div>
</div>