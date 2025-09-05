<?php

/**==============================
 * Current term object
 ================================*/
$post_object = get_post_type_object($posttype);
$labels = $post_object->labels;
$taxonomies = 'resources_category';

?>

<div class="<?php echo $posttype; ?>-archive">

    <?php
    echo get_archive_page_heading($posttype);

    echo get_filter_form($posttype, $taxonomies);
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
                
                   echo resourcesCard($id, $taxonomies); 
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