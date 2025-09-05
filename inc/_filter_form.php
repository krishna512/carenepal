<?php

function get_filter_form($posttype, $taxonomies = '', $_GET_category = '')
{
    $terms_location = '';
    $terms = '';
    if ($taxonomies == 'location') {
        $terms_location = get_terms(['taxonomy' => $taxonomies]);
    } else if ($taxonomies) {
        $terms = get_terms(['taxonomy' => $taxonomies]);
    }

    $tax_name_exploded = explode("_", $taxonomies);
    $tax_name = ucwords(join(' ', $tax_name_exploded));


    /**
     * ===================================
     *  related_thematic_area
     *  data in this post type 
     * ===================================
     */
    $related_thematic_area_data = [];
    $arg = array(
        'post_type' => $posttype,
        'posts_per_page' => '-1',
        'post_status' => array('publish'),
    );
    $the_query = new WP_Query($arg);
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            get_the_ID();
            $related_thematic_area_id = get_field('related_thematic_area');
            if ($related_thematic_area_id) {
                if (!in_array($related_thematic_area_id, $related_thematic_area_data)) {
                    array_push($related_thematic_area_data, $related_thematic_area_id);
                }
            }
        }
    }
    wp_reset_postdata();

    /**==============================
     * Url Parameters
     *================================*/
    if (is_tax()) {
        $queried_object = get_queried_object();
        $_GET_category = $queried_object->slug;
    } else {
        $_GET_category = (isset($_GET["category"])) ? $_GET["category"] : '';
    }
    $_GET_free_title = (isset($_GET["free_title"])) ? $_GET["free_title"] : '';
    $_GET_related_thematic_area = (isset($_GET["related_thematic_area"])) ? $_GET["related_thematic_area"] : '';
    $_GET_project_status = (isset($_GET["project_status"])) ? $_GET["project_status"] : '';
    $_GET_project_location = (isset($_GET["project_location"])) ? $_GET["project_location"] : '';

    ob_start();
    ?>

    <div class="container">
        <div class="relative z-10 pt-24 section-filter">
            <div class="">
                <div class="filter-content">
                    <form method="GET" role="search" class="flex flex-wrap items-center gap-6"
                        action="<?php echo home_url() . '/' . $posttype; ?> " id="filter-form">

                        <div class="filter-block search_title">
                            <input type="text" class="" name="free_title"
                                value="<?php echo (isset($_GET_free_title)) ? $_GET_free_title : ''; ?>"
                                placeholder="Search By Title">
                        </div>

                        <?php if ($posttype == 'project') { ?>
                            <div class="filter-block search_project_status">
                                <select name="project_status" id="project_status" class="form-select select2-hidden-accessible">
                                    <option value="" <?php echo ($_GET_project_status) ? '' : 'selected'; ?>>
                                        All Project
                                    </option>
                                    <option value="current" <?php echo ($_GET_project_status == 'current') ? 'selected' : ''; ?>>
                                        Current Project
                                    </option>
                                    <option value="phased_out" <?php echo ($_GET_project_status == 'phased_out') ? 'selected' : ''; ?>>
                                        Phased Out Project
                                    </option>
                                </select>
                            </div>
                        <?php } ?>

                        <?php
                        if ($terms_location) {
                            ?>
                            <div class="filter-block search_location">
                                <select name="project_location" id="project_location"
                                    class="form-select select2-hidden-accessible">
                                    <option value="" <?php echo ($_GET_project_location) ? '' : 'selected' ?>>
                                        <?php echo __('All Location', 'carenepal'); ?>
                                    </option>
                                    <?php
                                    foreach ($terms_location as $term) {
                                        $select_category = ($_GET_project_location == $term->slug) ? 'selected' : '';
                                        ?>
                                        <option value="<?php echo $term->slug; ?>" <?php echo $select_category; ?>>
                                            <?php echo $term->name; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <?php
                        }

                        if ($terms) {
                            ?>
                            <div class="filter-block search_category">
                                <select name="category" id="<?php echo $taxonomies; ?>"
                                    class="form-select select2-hidden-accessible">
                                    <option value="" <?php echo ($_GET_category) ? '' : 'selected' ?>>
                                        <?php echo __('All', 'carenepal') . ' ' . $tax_name; ?>
                                    </option>
                                    <?php
                                    foreach ($terms as $term) {
                                        $select_category = ($_GET_category == $term->slug) ? 'selected' : '';
                                        ?>
                                        <option value="<?php echo $term->slug; ?>" <?php echo $select_category; ?>>
                                            <?php echo $term->name; ?> </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <?php
                        }


                        /**
                         * =================================
                         * Related Thematic Area Dropdown
                         * =================================
                         */
                        if ($related_thematic_area_data) {
                            ?>
                            <div class="filter-block search_thematic_area">
                                <select name="related_thematic_area" id="related_thematic_area"
                                    class="form-select select2-hidden-accessible">

                                    <option value="" <?php echo ($_GET_related_thematic_area) ? '' : 'selected' ?>>
                                        <?php echo __('All Thematic Area', 'carenepal'); ?>
                                    </option>
                                    <?php
                                    foreach ($related_thematic_area_data as $related_thematic_area_value) {
                                        $select_related_thematic_area = ($_GET_related_thematic_area == $related_thematic_area_value) ? 'selected' : '';
                                        echo '<option value="' . $related_thematic_area_value . '" ' . $select_related_thematic_area . '>';
                                        echo get_the_title($related_thematic_area_value);
                                        echo '</option>';
                                    } ?>
                                </select>
                            </div>
                        <?php }


                        /**
                         * ==========================================
                         * Year Dropdown
                         * ==========================================
                         */
                        if ($posttype === 'resource') {

                            $terms_year = array(
                                'post_type' => array($posttype),
                            );

                            $years = array();
                            $query_year = new WP_Query($terms_year);

                            if ($query_year->have_posts()):
                                while ($query_year->have_posts()):
                                    $query_year->the_post();
                                    $year = get_the_date('Y');
                                    if (!in_array($year, $years)) {
                                        $years[] = $year;
                                    }
                                endwhile;
                                wp_reset_postdata();
                            endif;

                            $already_selected_value = (isset($_GET["p_year"])) ? $_GET["p_year"] : '';
                            echo '<div class="filter-block">';
                            echo '<select name="p_year" class="form-select select2-hidden-accessible">';
                            echo '<option value="">' . __('All Years', 'carenapal') . '</option>';
                            foreach ($years as $x) {
                                echo '<option value="' . $x . '"' . ($x === $already_selected_value ? ' selected="selected"' : '') . '>' . $x . '</option>';
                            }
                            echo '</select>';
                            echo '</div>';
                        }

                        ?>
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
            </div>
        </div>
    </div>

    <?php
    $return_filter_form = ob_get_contents();
    ob_end_clean();

    return $return_filter_form;
}


function filter_addon($title)
{
    // ob_start();
    ?>
    <!-- <span class="select2 select2-container ">
    <span class="selection">
        <span class="select2-selection select2-selection--multiple">
            <ul class="select2-selection__rendered"> -->
    <!-- <li class="select2-search select2-search--inline">
                    <input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off"
                        autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list"
                        placeholder=" < ?php echo $title; ?> " style="width: 229px;">
                </li> -->
    <!-- </ul>
        </span>
    </span>
    <span class="dropdown-wrapper" aria-hidden="true"></span>
</span>
<div class="">
    <i aria-hidden="true" class="m-auto text-black fa fa-caret-down"></i>
</div> -->
    <?php
    // $return_filter_addon = ob_get_contents();
    // ob_end_clean();

    // return $return_filter_addon;
}