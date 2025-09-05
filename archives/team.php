<?php

$id = get_the_ID();
$posttype = get_post_type($id);
$post_object = get_post_type_object($posttype);
$labels = $post_object->labels;
$taxonomies = 'team_category';
$terms = get_terms(['taxonomy' => $taxonomies]);

?>

<?php
echo get_archive_page_heading($posttype);
?>

<div class="container py-10 md:py-20">

    <div class="<?php echo $taxonomies; ?> tab-simple-menu">
        <ul class="flex gap-6 mb-10 md:mb-20">
            <li data-filter="all">All</li>
            <?php
            if ($terms) {
                foreach ($terms as $term) {
                    ?>
                    <li data-filter="<?php echo $term->slug; ?>"> <?php echo $term->name; ?> </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>

    <?php
    if (have_posts()) {
        ?>
        <div class="<?php echo $posttype; ?>-data ">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                while (have_posts()) {
                    the_post();
                    $id = get_the_ID();
                    $permalink = get_the_permalink();
                    $title = get_the_title();
                    $short_bio = get_the_content();
                    $taxoTermsSLug = taxoTermsSLug($id, $taxonomies);
                    $photo = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/dist/images/default-post-img.jpg';
                    $excerpt = excerpt();
                    $designation = get_field('designation');
                    $email = get_field('e-mail');
                    $Linkedin = get_field('linkedin');
                    $Facebook = get_field('facebook');
                    $Twitter = get_field('twitter');
                    ?>
                    <div class="<?php echo $taxoTermsSLug; ?> team-card flex flex-col" data-id="<?php echo $id; ?>">

                        <div class="relative pt-[77%] overflow-hidden">
                            <a href="<?php echo $permalink; ?>">
                                <img src="<?php echo $photo; ?>" alt="feature-image"
                                    class="absolute inset-0 w-full h-full object-cover transform transition duration-3000 ease-out">
                            </a>
                        </div>


                        <div class="bg-g-30 p-8 flex-1">
                            <h4 class="font-bold text-2xl mb-2">
                                <?php echo $title; ?>
                            </h4>
                            <div class="text-sm mb-2">
                                <?php echo $designation; ?>
                            </div>
                            <?php if ($email): ?>
                                <div class=" flex text-sm mb-3 gap-1 items-center">
                                    <span>
                                        <?php echo useSvg('mail-icon'); ?>
                                    </span>
                                    <a href="mailto:<?php echo $email; ?>"> <?php echo $email; ?></a>
                                </div>

                            <?php endif; ?>
                            <div class="flex gap-x-2 items-center mb-3">

                                <?php if ($Linkedin): ?>
                                    <div class="team-social-icon">

                                        <a href="<?php echo $Linkedin; ?> " target="_blank">
                                            <?php echo useSvg('linkedin-icon'); ?></a>
                                    </div>
                                <?php endif; ?>
                                <?php if ($Facebook): ?>
                                    <div class="team-social-icon">

                                        <a href="<?php echo $Facebook; ?>" target="_blank"> <?php echo useSvg('facebook'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if ($Twitter): ?>
                                    <div class="team-social-icon">

                                        <a href="<?php echo $Twitter; ?>" target="_blank"> <?php echo useSvg('twitter'); ?></a>
                                    </div>
                                <?php endif; ?>


                            </div>

                            <!-- <div class="text-xl"> </dvi> -->
                            <div class="learn-more-btn"> <a href="<?php echo $permalink; ?>"
                                    class="text-sm flex items-center gap-2 hover:text-o-40 transition-all duration-200 ease-in-out">
                                    Learn More
                                    <span class="text-xs">
                                        <?php echo useSvg('right-arrow'); ?>
                                    </span>
                                </a>
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
        <div>
            <p>No data available </p>
        </div>
        <?php
    }
    echo main_query_pagination();
    ?>
</div>