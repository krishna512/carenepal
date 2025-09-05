<?php
//default archive page template card layout
?>
<div class="<?php echo $posttype; ?>-archive">
    <?php
    echo get_archive_page_heading($posttype);
    ?>
    <div class="container">
        <?php
        if (have_posts()) {
            ?>
        <div class="<?php echo $posttype; ?> py-10 md:pt-[82px] md:pb-[74px]">
            <div class="grid gap-6">
                <?php
                    while (have_posts()) {
                        the_post();
                        $id = get_the_ID();
                        $permalink = get_the_permalink();
                        $feature_img = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/dist/images/default-post-img.jpg';
                        $title = get_the_title();
                        $excerpt = excerpt();
                        $published_date = get_the_date('d M, Y');
                        $upload_file = get_field('upload_file');
                        ?>
                <div data-id="<?php echo $id; ?>">
                    <div class="p-8 flex vacancy-post-card flex-wrap max-sm:flex-col gap-x-[10.9%] bg-g-30 ">
                        <div class=" md:basis-1/2">
                            <div class="text-2xl font-bold  hover:text-o-40">
                                <a href="<?php echo $permalink; ?>">
                                    <?php echo $title; ?>
                                </a>
                            </div>
                            <?php if ($upload_file) { ?>
                            <div class="flex gap-6 mt-2">
                                <div>
                                    <a href="<?php echo $upload_file; ?>" target="_blank"
                                        class="hover:text-o-40 transition-all duration-200 ease-in-out">
                                        View Job Description
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="md:basis-[162px]">
                            <div class="opacity-60">
                                Post Date
                            </div>
                            <div class="deadline-date mb-2 text-2xl">
                                <?php echo $published_date; ?>
                            </div>
                        </div>
                        <div class="md:basis-[162px]">
                            <?php if ($upload_file): ?>
                            <div class="">
                                <a href="<?php echo $upload_file; ?>" target="_blank"
                                    class="view-all-btn inline-flex items-center gap-2 transition-all duration-200">
                                    Download File
                                    <?php echo useSvg('download'); ?>
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php } ?>
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