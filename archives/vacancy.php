<?php
// vacancy archive page
$taxonomies = 'vacancy_category';
?>

<div class="<?php echo $posttype; ?>-archive">
    <?php
    echo get_archive_page_heading($posttype);
    ?>

    <div class="container">
        <?php
        if (have_posts()) {
            ?>
            <div class="<?php echo $posttype; ?>  py-10 md:pt-[82px] md:pb-[74px] ">
                <div class="grid gap-6">

                    <?php
                    while (have_posts()) {
                        the_post();
                        $id = get_the_ID();
                        $permalink = get_the_permalink();
                        $feature_img = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/dist/images/default-post-img.jpg';
                        $title = get_the_title();
                        $excerpt = excerpt();
                        // $term_category = get_the_terms($id, $taxonomies);
                        // var_dump($term_category);
                        $published_date = get_the_date('d M, Y');
                        $deadline = get_field('deadline');
                        $today_date = date('d M, Y');
                        $vacancy_status = (strtotime($today_date) < strtotime($deadline)) ? true : false;
                        $deadline = date_format(date_create($deadline), "d M, Y");

                        $upload_file = get_field('upload_file');
                        $no_of_vacancies = get_field('no_of_vacancies');


                        if ($posttype == 'vacancy') {
                            $Apply_url = get_field('vacancy_button_url', "option") . '?title=' . $title . '&id=' . $id;

                        }

                        if ($posttype == 'consultancy') {
                            $Apply_url = get_field('google_form_link');
                        }

                        ?>

                        <div data-id="<?php echo $id; ?>">
                            <div
                                class="p-8 flex vacancy-post-card max-lg:flex-wrap max-sm:flex-col  gap-x-[15%] bg-g-30 gap-y-4 ">
                                <div class=" md:basis-1/2">
                                    <a href="<?php echo $permalink; ?>" class="text-2xl font-bold post-title hover:text-o-40 ">
                                        <?php echo $title; ?>
                                    </a>
                                    <?php if ($upload_file): ?>
                                        <div class="flex gap-y-3 gap-x-6 mt-2 flex-wrap">
                                            <div>
                                                <a href="<?php echo $upload_file; ?>" download
                                                    class="hover:text-o-40 transition-all duration-200 ease-in-out flex gap-x-1 items-center">
                                                    <?php echo useSvg('download'); ?>
                                                    <span>Download Job Description </span>
                                                </a>
                                            </div>

                                            <div>
                                                <a href="<?php echo $upload_file; ?>" target="_blank"
                                                    class="hover:text-o-40 transition-all duration-200 ease-in-out flex gap-x-1 items-center">

                                                    <?php echo useSvg('view-eye-icon'); ?>
                                                    <span>View Job Description </span>
                                                </a>
                                            </div>
                                        </div>

                                    <?php endif ?>
                                </div>

                                <div class="shrink-0">
                                    <div class="opacity-60">
                                        Deadline
                                    </div>
                                    <div class="deadline-date mb-2 text-2xl">
                                        <?php echo $deadline; ?>
                                    </div>
                                    <?php if ($no_of_vacancies): ?>
                                        <div> no of vacancies: <span>
                                                <?php echo $no_of_vacancies; ?>
                                            </span></div>
                                    <?php endif ?>
                                </div>
                                <?php if ($vacancy_status && $Apply_url) { ?>
                                    <div class="shrink-0">
                                        <?php

                                        echo '<div>';
                                        echo btn_layout_1('Apply', $Apply_url);
                                        echo '</div>';
                                        ?>
                                    </div>
                                <?php } ?>


                            </div>


                        </div>

                        <?php
                    }
                    ?>

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
        echo main_query_pagination();
        ?>
</div>