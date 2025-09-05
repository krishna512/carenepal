<?php

/**==============================
 * Current term object
 ================================*/
// $posttype = get_post_type();
$post_object = get_post_type_object($posttype);
$labels = $post_object->labels;
$taxonomies_location = 'location';

?>

<div class="<?php echo $posttype; ?>-archive bg-n-10">
    <?php

    echo get_archive_page_heading($posttype);

    echo get_filter_form($posttype, $taxonomies_location);

    ?>

    <div class="container">

        <?php
        if (have_posts()) {
            ?>
            <div class="<?php echo $posttype; ?> py-14 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                while (have_posts()) {
                    the_post();
                    $id = get_the_ID();

                    echo projectCard($id);
                    ?>

                    <?php
                }
                ?>
            </div>

            <?php
        } else {
            ?>
            <div class="py-14">
                <p>Sorry, We could not find any results.</p>
            </div>
            <?php
        }
        echo main_query_pagination();
        ?>
    </div>
    <!-- action block -->
    <div class=" pb-24">
        <?php echo section_action_area(); ?>
    </div>
</div>