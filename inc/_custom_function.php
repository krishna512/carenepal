<?php
/**
 * ======================================
 * Action Area Global Component
 * ======================================
 */
function section_action_area()
{
    $action_areas = (function_exists('get_field') && $action_areas = get_field('action_areas', "option")) ? $action_areas : '';
    $showhide = (function_exists('get_field') && $showhide = get_field('show_hide_block', "option")) ? $showhide : '0';
    ob_start();
    if ($showhide) {
        ?>
        <div class="container action-area-block">
            <div class="grid gap-y-8 gap-x-9 md:gap-x-[78px] sm:grid-cols-2">
                <?php
                if ($action_areas) {
                    foreach ($action_areas as $action_area) {
                        ?>
                        <div
                            class="relative overflow-hidden transition-all duration-200 ease-in-out cursor-pointer action-area-card group block-card">
                            <div class="action-area-overlay"> </div>
                            <a href="<?php echo $action_area['button_link']; ?>">
                                <img src=" <?php echo $action_area['image']; ?>" alt="img"
                                    class="absolute left-0 object-cover w-full h-full transition-all duration-200 ease-in-out group-hover:scale-105">
                                <div class="relative z-10 pt-[132px] pb-[74px] pl-14 ">
                                    <div class="pr-20 mb-3 text-2xl font-bold title md:text-3xl lg:text-5xl lg:pr-40">
                                        <?php echo $action_area['title']; ?>
                                    </div>
                                    <div
                                        class="flex items-center justify-between text-base transition-all duration-200 ease-in-out md:text-xl align-center">
                                        <?php echo $action_area['button_label']; ?>
                                        <div class="arrow">
                                            <div class="animate">
                                                <?php echo useSvg('chevron-right'); ?>
                                                <?php echo useSvg('chevron-right'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                } else {
                    echo "<div class='no-data'> No Data For Action Area</div>";
                }
                ?>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="block-hide">
            <p>Action Area Section / Block - Hidden</p>
        </div>
        <?php
    }

    $retuen_section_action_area = ob_get_contents();
    ob_end_clean();

    return $retuen_section_action_area;
}

/**
 * =========================================================
 *  related_project section
 * =========================================================
 */

function related_project($related_project)
{
    ob_start();
    ?>
    <div class="py-12 odd-section-background sm:py-14 lg:py-20">
        <div class="container related-project">
            <div class="pb-6 border-b-8 sm:pl-6 gap-x-6 gap-y-2 sm:pb-0 sm:border-b-0 sm:border-l-8 border-o-40">
                <h2 class="font-bold">Related Projects</h2>
            </div>
            <div class="grid grid-cols-1 gap-6 pt-12 sm:grid-cols-2 lg:grid-cols-3 grid-contents">

                <?php
                foreach ($related_project as $key => $related_project_id) {
                    $permalink = get_the_permalink($related_project_id);
                    $title = get_the_title($related_project_id);
                    $feature_img = get_the_post_thumbnail_url($related_project_id);

                    ?>
                    <div class="mt-28 bg-g-30 post-card" data-id="<?php echo $related_project_id; ?>">
                        <a href="<?php echo $permalink; ?>">
                            <div class="feature-image -mt-28 relative pt-[67%] w-[92%]">
                                <img src="<?php echo $feature_img; ?>" alt="feature image"
                                    class="absolute inset-0 object-cover w-full h-full">
                            </div>
                        </a>

                        <div class="p-5 sm:p-8">

                            <div class="text-xl font-bold sm:text-2xl post-title">
                                <a href="<?php echo $permalink; ?>">
                                    <?php echo $title; ?>
                                </a>
                            </div>

                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    $related_project_return = ob_get_contents();
    ob_end_clean();

    return $related_project_return;
}

/**
 * =========================================================
 * related_thematic_area section
 * =========================================================
 */
function related_thematic_area($related_thematic_area)
{
    ob_start();
    ?>
    <div class="py-12 odd-section-background sm:py-14 lg:py-20">
        <div class="container related-thematic-area">
            <div class="pb-6 border-b-8 sm:pl-6 gap-x-6 gap-y-2 sm:pb-0 sm:border-b-0 sm:border-l-8 border-o-40">
                <h2 class="font-bold">Related Thematic Areas</h2>
            </div>

            <div class="grid grid-cols-1 gap-6 pt-12 sm:grid-cols-2 lg:grid-cols-3 grid-contents">

                <?php
                foreach ($related_thematic_area as $key => $related_thematic_area_id) {
                    $permalink = get_the_permalink($related_thematic_area_id);
                    $title = get_the_title($related_thematic_area_id);
                    $feature_img = get_the_post_thumbnail_url($related_thematic_area_id);

                    ?>
                    <div class="mt-28 bg-g-30 post-card" data-id="<?php echo $related_thematic_area_id; ?>">
                        <a href="<?php echo $permalink; ?>">
                            <div class="feature-image -mt-28 relative pt-[67%] w-[92%]">
                                <img src="<?php echo $feature_img; ?>" alt="feature image"
                                    class="absolute inset-0 object-cover w-full h-full">
                            </div>
                        </a>

                        <div class="p-4 sm:p-8">

                            <div class="text-xl font-bold sm:text-2xl post-title">
                                <a href="<?php echo $permalink; ?>">
                                    <?php echo $title; ?>
                                </a>
                            </div>

                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    $related_thematic_area_return = ob_get_contents();
    ob_end_clean();

    return $related_thematic_area_return;
}


/**
 * =========================================================
 *  related_partner section
 * =========================================================
 */


function related_partner($related_partner)
{
    ob_start();
    ?>
    <div class="py-12 odd-section-background sm:py-14 lg:py-20">
        <div class="container related-thematic-area">
            <div class="pb-6 border-b-8 sm:pl-6 gap-x-6 gap-y-2 sm:pb-0 sm:border-b-0 sm:border-l-8 border-o-40">
                <h2 class="font-bold">Related Partner</h2>
            </div>

            <div class="grid grid-cols-1 gap-6 pt-12 sm:grid-cols-2 lg:grid-cols-3 grid-contents">

                <?php
                foreach ($related_partner as $key => $related_partner_id) {
                    $website_link = (get_field('website_link', $related_partner_id)) ? get_field('website_link', $related_partner_id) : "javascript:void(0)";
                    $title = get_the_title($related_partner_id);
                    $feature_img = get_the_post_thumbnail_url($related_partner_id);

                    ?>
                    <div class="mt-28 bg-g-30 post-card" data-id="<?php echo $related_partner_id; ?>">
                        <a href="<?php echo $website_link; ?>" target="_blank">
                            <div class="feature-image -mt-28 relative pt-[67%] w-[92%]">
                                <img src="<?php echo $feature_img; ?>" alt="feature image"
                                    class="absolute inset-0 object-cover w-full h-full">
                            </div>
                        </a>

                        <div class="p-4 sm:p-8">

                            <div class="text-xl font-bold sm:text-2xl post-title">
                                <a href="<?php echo $website_link; ?>" target="_blank">
                                    <?php echo $title; ?>
                                </a>
                            </div>

                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    $related_partner_return = ob_get_contents();
    ob_end_clean();

    return $related_partner_return;
}

/**
 * =========================================================
 * get heading and sub-heading for archive pages.
 * =========================================================
 */

function get_archive_page_heading($posttype)
{
    if (is_tax()) {
        $queried_object = get_queried_object();
        $pageIdentify = $queried_object;
    } else {
        $pageIdentify = $posttype . '_options';
    }


    // header-info
    $background_image = (function_exists('get_field') && $background_image = get_field('background_image', $pageIdentify)) ? $background_image : '';

    ob_start();

    echo heroContent($background_image);

    $archive_page_heading = ob_get_contents();

    ob_end_clean();

    return $archive_page_heading;
}

// get limit value then retuen post excerpt value of certain limit
function excerpt($limit = 115)
{
    $excerpt = get_the_excerpt();
    if ($excerpt) {
        $excerpt = substr($excerpt, 0, $limit) . '...';
    }
    return $excerpt;
}

// get limit value then retuen post post_title value of certain limit
function post_title_limit($limit = 45)
{
    $post_title = get_the_title();
    if ($post_title) {
        $post_title = substr($post_title, 0, $limit) . '...';
    }
    return $post_title;
}


// get post id and Taxonomy then return the string of all the taxonomy slug associated with post id
function taxoTermsSLug($id, $taxonomy_val)
{
    $termsArray = get_the_terms($id, $taxonomy_val);
    $termsSLug = [];
    if ($termsArray) {
        foreach ($termsArray as $term) {
            $termsSLug[] = $term->slug;
        }
    }

    // print_r($termsSLug);

    $termsSLug = join(' ', $termsSLug);


    return $termsSLug;
}

function taxoTermsSLugGallery($id, $taxonomy_val)
{
    $termsArray = get_the_terms($id, $taxonomy_val);
    $termsSLug = "";
    if ($termsArray) {
        foreach ($termsArray as $term) {
            $termsSLug .= $term->slug;
        }
    }
    return $termsSLug;
}

function taxoTermsName($id, $taxonomy_val)
{
    $termsArray = get_the_terms($id, $taxonomy_val);
    $termsName = "";
    if ($termsArray) {
        foreach ($termsArray as $term) {
            $termsName .= $term->name . ' ';
        }
    }
    return $termsName;
}


/**
 * =========================================================
 * Breadcrumb
 * =========================================================
 */

function breadcrumb_section($id)
{
    $posttype = get_post_type($id);
    $post_object = get_post_type_object($posttype);
    $labels = $post_object->labels;
    ob_start();
    ?>
    <div class="breadcrumb bg-n-10">
        <div class="container breadcrumb-menu">
            <div class="breadcrumb-menu__item">
                <a href="<?php echo home_url(); ?>">Home</a>
            </div>
            <div class="breadcrumb-menu__item">
                <?php
                if (is_singular()) {
                    ?>
                    <a href="<?php echo get_post_type_archive_link($posttype); ?>">
                        <?php echo $labels->name; ?>
                    </a>
                    <?php
                } else {
                    echo $labels->name;
                }
                if (is_singular()) {
                    // echo useSvg('page-navigation-next')
                    ?>
                </div>
                <div class="breadcrumb-menu__item">
                    <?php
                    echo get_the_title();
                }
                ?>
            </div>
        </div>
    </div>

    <?php
    $outupt_breadcrumb_section = ob_get_contents();
    ob_end_clean();

    return $outupt_breadcrumb_section;
}

function custom_breadcrumb_section($id, $posttype, $labels)
{
    $display_breadcrumb = (function_exists('get_field') && $display_breadcrumb = get_field('display_breadcrumb', $posttype . '_options')) ? $display_breadcrumb : '0';
    $default_breadcrumb = (function_exists('get_field') && $default_breadcrumb = get_field('default_breadcrumb', $posttype . '_options')) ? $default_breadcrumb : '0';
    $add_custom_breadcrumb = (function_exists('get_field') && $add_custom_breadcrumb = get_field('add_custom_breadcrumb', $posttype . '_options')) ? $add_custom_breadcrumb : '';

    if ($display_breadcrumb && $default_breadcrumb) {
        echo breadcrumb_section($id);
    }
    if ($display_breadcrumb && !$default_breadcrumb && $add_custom_breadcrumb) {
        ?>
        <div class="breadcrumb bg-n-10">
            <div class="container breadcrumb-menu">
                <?php
                foreach ($add_custom_breadcrumb as $key => $value) {
                    ?>
                    <div class="breadcrumb-menu__item">
                        <a href="<?php echo $value['link']; ?>"> <?php echo $value['item']; ?> </a>
                    </div>
                    <?php
                }
                ?>
                <div class="breadcrumb-menu__item">
                    <?php echo $labels->name; ?>
                </div>
            </div>
        </div>
        <?php
    }
}


/**
 * =========================================================
 * Current URL
 * =========================================================
 */
if (!function_exists('get_current_page_link')) {
    function get_current_page_link()
    {
        global $wp;
        $url = home_url($wp->request);

        return $url;
    }
}

// get all the taxo for post types
function get_tax_post_type($posttype, $taxonomies)
{
    $args_campaign = array(
        'post_type' => $posttype,
        'posts_per_page' => '-1',
        'post_status' => array('publish'),
    );
    $the_query = new WP_Query($args_campaign);
    $tax_post_type_array = [];
    $tax_post_type = [];
    $i = 0;
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $id = get_the_ID();
            $termsArray = get_the_terms($id, $taxonomies);
            if ($termsArray) {
                foreach ($termsArray as $term) {
                    if (!in_array($term->slug, $tax_post_type_array)) {
                        array_push($tax_post_type_array, $term->slug);
                        $tax_post_type[$i]['slug'] = $term->slug;
                        $tax_post_type[$i]['name'] = $term->name;
                        $i = $i + 1;
                    }
                }
            }
        }
    }
    wp_reset_postdata();

    return $tax_post_type;
}

/**
 * =========================================================
 * Hero-content
 * =========================================================
 */

function heroContent($imageId = '')
{

    if (is_archive()) {
        $queried_object = get_queried_object();

        if (is_tax()) {
            $pageIdentify = $queried_object;
            $label = $queried_object->name;
        } else {
            $posttype = $queried_object->name;
            $label = $queried_object->label;
            $pageIdentify = $posttype . '_options';
        }

        $heading = (function_exists('get_field') && $heading = get_field('heading', $pageIdentify)) ? $heading : $label;

        $sub_heading = (function_exists('get_field') && $sub_heading = get_field('sub_heading', $pageIdentify)) ? $sub_heading : '';

    } else {

        $heading = (function_exists('get_field') && $heading = get_field('heading')) ? $heading : '';

        $sub_heading = (function_exists('get_field') && $sub_heading = get_field('sub_heading')) ? $sub_heading : '';
    }

    $title = ($heading) ? $heading : get_the_title();

    if (!$imageId)
        $imageId = (function_exists('get_field') && $fearure_image = get_field('fearure_image')) ? $fearure_image : '';

    ob_start();
    ?>
    <div id="care-banner"
        class="relative flex min-h-[480px] md:min-h-screen pt-20 pb-8 md:pt-24 md:pb-16 overflow-hidden hero-content">
        <?php if ($imageId) {
            echo wp_get_attachment_image($imageId, "full", false, array("class" => "absolute inset-0 w-full h-full object-cover"));
        } ?>
        <div class="container relative z-10 mt-auto hero-content-wrap">
            <div class="relative py-4 text-white border-left">
                <!-- md:py-10 -->
                <div class="relative z-10 px-5 md:px-10 lg:max-w-4xl">
                    <h1 class="md:leading-[1.125] font-bold">
                        <?php echo $title; ?>
                    </h1>
                    <?php if ($sub_heading) { ?>
                        <p class="mt-5 text-base md:max-w-lg mb:mt-8">
                            <?php echo $sub_heading; ?>
                        </p>
                    <?php } ?>
                </div>

            </div>
            <?php if (!is_archive() && get_post_type(get_the_ID()) == 'project') { ?>

                <div class="ripple">
                    <?php echo useSvg('ripple'); ?>

                </div>
            <?php } ?>

        </div>

    </div>

    <?php
    return ob_get_clean();
}



/**
 * =========================================================
 * Vacancy Banner content
 * =========================================================
 */

function vacancyContent($imageId = '')
{

    if (is_archive()) {
        $queried_object = get_queried_object();

        if (is_tax()) {
            $pageIdentify = $queried_object;
            $label = $queried_object->name;
        } else {
            $posttype = $queried_object->name;
            $label = $queried_object->label;
            $pageIdentify = $posttype . '_options';
        }

    }


    ob_start();
    ?>
    <div id="care-banner" class="relative overflow-hidden bg-n-10">
        <div class="vacancy-hero-content pt-[122px] pb-6">
            <div class="hero-ripple-img">
                <?php echo useSvg('ripple'); ?>
            </div>
            <?php
            $title_vacancy = (isset($_GET["title"])) ? $_GET["title"] : '';

            $id_vacancy = (isset($_GET["id"])) ? $_GET["id"] : ''; ?>
            <div class="container relative z-10 mt-auto hero-content-wrap">
                <div class="relative py-4 border-left text-n-70">
                    <div class="relative z-10 px-5 md:px-10 lg:max-w-2xl">
                        <p> <a href="<?php echo get_the_permalink($id_vacancy); ?>" class="text-sm !text-o-40"> ← Back to
                                <?php echo $title_vacancy; ?></a>
                        </p>
                        <h1 class="md:leading-[1.125] font-bold text-n-70">
                            Application for
                            <?php
                            echo $title_vacancy;

                            ?>

                        </h1>
                    </div>



                </div>
            </div>

        </div>
        <div class="project-layer-line">
            <?php echo useSvg('project-layer-line'); ?>
        </div>
    </div>




    <?php
    return ob_get_clean();
}


/**
 * =========================================================
 * project- card
 * =========================================================
 */

function projectCard($id)
{
    $id = ($id) ? $id : get_the_ID();
    $permalink = get_the_permalink($id);
    $title = get_the_title($id);
    $feature_img = (has_post_thumbnail($id)) ? get_the_post_thumbnail_url($id) : get_template_directory_uri() . '/dist/images/default-post-img.jpg';

    $published_date = get_field('published_date', $id);
    $published_date = $published_date ? date_format(date_create($published_date), "F, Y") : '';

    $project_end_date = get_field('project_end_date', $id);
    $project_end_date = $project_end_date ? date_format(date_create($project_end_date), "F, Y") : '';
    ob_start();
    ?>
    <div class="group" data-id="<?php echo $id; ?>">
        <a href="<?php echo $permalink; ?>">
            <div class="feature-image mb-4 relative pt-[79.4%] overflow-hidden">
                <?php if (has_post_thumbnail($id)) {
                    echo get_the_post_thumbnail($id, 'medium_large', array('class' => 'absolute inset-0 object-cover w-full h-full transition-all duration-200 ease-in-out group-hover:scale-105'));
                } else { ?>
                    <img src="<?php echo get_template_directory_uri() .
                        '/dist/images/default-post-img.jpg'; ?>" alt="feature image"
                        class="absolute inset-0 object-cover w-full h-full transition-all duration-200 ease-in-out group-hover:scale-105"
                        loading="lazy">
                <?php } ?>
            </div>
        </a>

        <div class="relative info related-category">
            <?php
            $type = get_field('project_type', $id);

            if ($type) {
                ?>
                <div class="card-tag">
                    <div class="card-tag-inner">
                        <?php echo $type[0]; ?>
                    </div>
                </div>
            <?php } ?>
            <div class="pt-8">
                <?php
                $date = array();

                if ($published_date)
                    $date[] = $published_date;

                if ($published_date && $project_end_date)
                    $date[] = $project_end_date;

                if ($date) {
                    echo '<div class="flex mb-2 text-sm published-date">';
                    echo join(' - ', $date);
                    echo '</div>';
                }

                ?>

                <div class="post-title text-2xl md:text-[32px] md:leading-9 font-bold group-hover:text-o-40 line-clamp-2">
                    <a href="<?php echo $permalink; ?>">
                        <?php echo $title; ?>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <?php
    return ob_get_clean();
}

/**
 * =========================================================
 * post-category- card
 * =========================================================
 */

function resourcesCard($id, $taxonomies)
{
    $permalink = get_the_permalink($id);
    $title = get_the_title($id);

    $published_date = get_field('published_date', $id) ? esc_html(get_field('published_date')) : '';

    $term_category = get_the_terms($id, $taxonomies);
    $upload_file = get_field('upload_file', $id);
    ob_start();
    ?>

    <div class="mt-28 bg-g-30 post-card" data-id="<?php echo $id; ?>">
        <a href="<?php echo $permalink; ?>">
            <div class="feature-image -mt-28 relative pt-[67%] w-[92%]">

                <?php if (has_post_thumbnail($id)) {
                    echo get_the_post_thumbnail($id, 'medium_large', array('class' => 'absolute inset-0 object-cover w-full h-full'));
                } else { ?>
                    <img src="<?php echo get_template_directory_uri() .
                        '/dist/images/default-post-img.jpg'; ?>" alt="feature image"
                        class="absolute inset-0 object-cover w-full h-full" loading="lazy">
                <?php } ?>

            </div>
        </a>

        <?php
        if ($term_category) {
            ?>
            <div class="related-category <?php echo $taxonomies; ?> ">
                <div class="card-tag">
                    <ul class="card-tag-inner">
                        <?php
                        foreach ($term_category as $category) {
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
            <?php
            //if (is_post_type_archive('resource') || is_tax('resources_category')) {
        
            //<div class="mb-2 published-date opacity-70">
        
            //echo $published_date;
        
            //</div>
            //} 
            ?>

            <div class="text-2xl font-bold post-title">
                <a href="<?php echo $permalink; ?>">
                    <?php echo $title; ?>
                </a>
            </div>

            <?php
            //  && is_post_type_archive('resource')
            if ($upload_file) {
                ?>
                <div class="mt-3 text-base upload-file ">
                    <a href="<?php echo $upload_file; ?>" class="inline-flex items-center text-o-40 gap-x-2">

                        <div class="flex items-center font-bold gap-x-1">
                            <span> Download File </span>
                            <?php echo usesvg('download'); ?>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>

        </div>

    </div>
    <?php
    return ob_get_clean();
}

function editor_content($id = '', $content = '')
{
    $postID = ($id) ? $id : get_the_ID();

    $html = '';
    $html .= '<div class="mce-content-body">';
    $html .= ($content) ? $content : get_the_content($postID);
    $html .= '</div>';

    return $html;
}


/**
 * =========================================================
 * Social Share Icons
 * =========================================================
 */
if (!function_exists('yi_social_share')) {
    function yi_social_share()
    {

        $permalink = get_the_permalink();
        $title = get_the_title();
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink;
        $twitterURL = 'http://twitter.com/intent/tweet?via=WorldLink&text=' . $title . ' - &url=' . $permalink;

        ?>
        <div class="flex items-center mt-8 text-3xl social-icon gap-x-3">
            <a href="javascript:void(0)"
                onclick="window.open('<?php echo $facebookURL; ?>','pop','toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,copyhistory=0,width=800,height=' + screen.availHeight + ',left=0,top=0')"
                ;="" rel="noreferrer nofollow noopener" class="facebook-icon">
                <?php echo useSvg('facebook'); ?>
            </a>
            <a href="javascript:void(0)"
                onclick="window.open('<?php echo $twitterURL; ?>','pop','toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,copyhistory=0,width=800,height=' + screen.availHeight + ',left=0,top=0')"
                ;="" rel="noreferrer nofollow noopener" class="twitter-icon">
                <?php echo useSvg('twitter'); ?>
            </a>
            <div id="copyurl">
                <a href="javascript:void(0)" onClick="unsecuredCopyToClipboard(event);" class="copy-icon">
                    <div class="share-icon">
                        <?php echo useSvg('copy-icon'); ?>
                    </div>
                </a>
            </div>
        </div>

        <script>
            function unsecuredCopyToClipboard(e) {
                e.preventDefault();

                const textArea = document.createElement("textarea");

                textArea.value = '<?php echo $permalink; ?>';

                var copyurl = document.getElementById("copyurl");

                copyurl.appendChild(textArea);

                textArea.focus();

                textArea.select();

                try {

                    document.execCommand('copy');

                } catch (err) {

                    alert('Unable to copy to clipboard');

                }

                copyurl.removeChild(textArea);

                // Alert the copied text
                alert("Link Copied");
            }
        </script>
        <?php
    }
}