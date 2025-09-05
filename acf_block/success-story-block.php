<?php
$id = '' . $block['id'];
$className = '';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

    <?php
    $heading = (function_exists('get_field') && $heading = get_field('heading')) ? $heading : '';
    $paragraph = (function_exists('get_field') && $paragraph = get_field('paragraph')) ? $paragraph : '';
    $showhide = (function_exists('get_field') && $showhide = get_field('show_hide_block')) ? $showhide : '0';
    $button_label = (function_exists('get_field') && $button_label = get_field('button_label')) ? $button_label : '';
    $latest_story = (function_exists('get_field') && $latest_story = get_field('latest_story')) ? $latest_story : '';

    if ($latest_story) {
        $args = array(
            'post_type' => 'story',
            'posts_per_page' => '1',
            'post_status' => array('publish'),
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();
                $success_story = get_the_ID();
            }
        }
    } else {
        $success_story = (function_exists('get_field') && $success_story = get_field('success_story')) ? $success_story : '';
    }

    $feature_img = get_the_post_thumbnail_url($success_story);
    $permalink = get_the_permalink($success_story);
    $title = get_the_title($success_story);

    if ($showhide) {
        ?>
        <div class="success-story-block pb-10 md:pb-16 bg-n-10">
            <div Class="relative">
                <div class="">
                    <?php echo get_the_post_thumbnail($success_story, 'full', array('class' => 'absolute w-full h-full object-cover')); ?>
                    <div class="content-overlay"></div>
                    <div class=" pt-20 md:pt-40 lg:pt-64 relative z-10 overflow-hidden">
                        <div class="container">
                            <div class="story-data relative" data-id="<?php echo $success_story; ?>">
                                <div class="flex justify-between flex-wrap  items-end relative story-wrapper ">
                                    <div class="lg:max-w-[506px]">
                                        <div class=" lg:ml-24 mb-10">
                                            <div
                                                class="text-white text-2xl md:text-3xl lg:text-5xl font-bold mb-4 relative z-10 line-clamp-4">
                                                <a href="<?php echo $permalink; ?>">
                                                    <?php echo $title; ?>
                                                </a>
                                            </div>
                                            <div class=" text-base md:text-xl text-o-40">
                                                <a href="<?php echo $permalink; ?>"> Read full story</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lg:max-w-[390px] relative">
                                        <div class="story-block-info  relative bg-n-10 py-5 px-10">
                                            <h3 class="heading leading-tight font-bold mb-6">
                                                <?php echo $heading; ?>
                                            </h3>
                                            <div class="paragraph mb-6">
                                                <?php echo $paragraph; ?>
                                            </div>
                                            <?php if ($button_label) { ?>

                                                <a href="/story"
                                                    class="view-all-btn text-base md:text-lg font-bold items-center">
                                                    <?php echo $button_label; ?> </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="story-ripple">
                                    <?php echo useSvg('ripple'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="block-hide">
            <p>Sucess Story Block - Hidden</p>
        </div>
        <?php
    }

    ?>
</section>