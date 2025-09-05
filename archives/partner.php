<?php

$post_object = get_post_type_object($posttype);
$labels = $post_object->labels;
$taxonomies = 'partner_category';
$terms = get_terms(['taxonomy' => $taxonomies, 'hide_empty' => true]);


// get parameter
$_GET_s = (isset($_GET["_s"])) ? $_GET["_s"] : '';

echo get_archive_page_heading($posttype);
?>

<div class="container py-10 md:py-20">

    <div class="<?php echo $taxonomies; ?>  tab-simple-menu">
        <ul class="flex gap-6 mb-10 md:mb-20 ">
            <li data-filter="all" class="active">All</li>
            <?php
            if ($terms) {
                foreach ($terms as $term) {
                    ?>
                    <li data-filter="<?php echo ($term->count > 0) ? $term->slug : 'no-data'; ?>">
                        <?php echo $term->name; ?>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>

    <div class="search-filter">
        <form method="GET" role="search" class="flex flex-wrap items-center gap-6 pb-12" action="">
            <div class="filter-block search_title">
                <input type="text" class="" name="_s" value="<?php echo $_GET_s; ?>" placeholder="Search By Title">
            </div>

            <div class="filter-search-btn ">
                <input type="submit" value="Search">
            </div>

            <?php
            $url = parse_url($_SERVER['REQUEST_URI']);
            if (isset($url['query'])) {
                ?>
                <div class="filter-reset-btn ">
                    <a href="<?php echo home_url() . '/' . $posttype; ?>">
                        <?php echo __('Reset', 'carenepal'); ?>
                    </a>
                </div>
            <?php } ?>
        </form>
    </div>

    <?php
    if (have_posts()) {
        ?>
        <div class="<?php echo $posttype; ?>-data">
            <?php

            /**
             * ===============================
             * Excerpt sections
             * ===============================
             */
            if ($terms) {
                foreach ($terms as $term) {
                    $termID = $term->term_id;
                    $description = get_field('description', get_term($termID));

                    if ($description) { ?>
                        <div class="<?php echo $term->slug; ?>-excerpt excerpt max-w-[673px] mb-14 " style="display: none;">
                            <h2 class='mb-6'>
                                <?php echo $term->name; ?>
                            </h2>

                            <div class="mce-content-body">
                                <?php echo $description; ?>
                            </div>

                        </div>
                    <?php } ?>
                    <?php
                }
            }
            ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
                <?php
                while (have_posts()) {
                  the_post();
                    $id = get_the_ID();
                    $title = get_the_title();
                    $taxoTermsSLug = taxoTermsSLug($id, $taxonomies);
                    $website_link = get_field('website_link');

                    if ($website_link) {
                        $linkStart = '<a href="' . $website_link . '" target="_blank">';
                        $linkEnd = '</a>';
                    } else {
                        $linkStart = '';
                        $linkEnd = '';
                    }
                    ?>
                    <div class="<?php echo $taxoTermsSLug; ?> partner-item" data-id="<?php echo $id; ?>">
                        <div class="relative partner-wrap  border border-solid border-[#EFF2F5] h-full">
                            <div class="flex flex-col  text-center items-center justify-center py-8 px-7 h-full">
                                <?php

                                echo $linkStart;

                                if (has_post_thumbnail($id)) {
                                    $class = "object-contain  h-20 pb-4";
                                    echo get_the_post_thumbnail($id, 'medium', array('class' => $class));
                                }

                                ?>
                                <div class="font-medium">
                                    <?php echo $title; ?>
                                </div>
                                <?php echo $linkEnd; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <div class="no-data partner-item" style="display: none;">
                    <p>
                        <?php echo __('No data found.', 'carenepal'); ?>
                    </p>
                </div>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div>
            <p>
                <?php echo __('No data found.', 'carenepal'); ?>
            </p>
        </div>
        <?php
    }
    // echo main_query_pagination();
    ?>
</div>