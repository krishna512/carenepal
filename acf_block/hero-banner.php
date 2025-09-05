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
    $banner_image = (function_exists('get_field') && $banner_image = get_field('banner_image')) ? $banner_image : '';
    $button_text = (function_exists('get_field') && $button_text = get_field('button_text')) ? $button_text : '';
    $button_url_link = (function_exists('get_field') && $button_url_link = get_field('button_url_link')) ? $button_url_link : '';
    $secondary_button_text = (function_exists('get_field') && $secondary_button_text = get_field('secondary_button_text')) ? $secondary_button_text : '';
    $secondary_button_url_link = (function_exists('get_field') && $secondary_button_url_link = get_field('secondary_button_url_link')) ? $secondary_button_url_link : '';
    $showhide = (function_exists('get_field') && $showhide = get_field('showhide_hero_banner_block')) ? $showhide : '0';
    $hideButtons = (function_exists('get_field') && $hide_buttons = get_field('hide_buttons')) ? $hide_buttons : '0';
    ?>

    <?php

    // if (is_front_page()) {}
    
    if ($showhide) {
        ?>
        <div id="care-banner"
            class="hero-banner relative overflow-hidden max-sm:pt-80 max-sm:pb-8 sm:py-36 md:pt-80 md:pb-60 hero-content">
            <div class="banner_image absolute w-full h-full top-0 left-0">
                <?php echo wp_get_attachment_image($banner_image, 'full', false, array('class' => 'w-full object-cover h-full')); ?>
            </div>
            <div class=" container hero-wrap relative  z-10 ">
                <div>
                    <div class="banner-information text-white ">

                        <?php if ($heading) { ?>
                            <h1 class="heading md:leading-[1.125] font-medium mb-6 sm:mb-10 md:mb-20 max-w-[520px]">
                                <?php echo $heading; ?>
                            </h1>
                        <?php } ?>

                        <?php if (!$hideButtons) { ?>
                            <div class="flex items-center gap-4 btn-wrap relative flex-wrap">
                                <a href="<?php echo $button_url_link; ?>" class="btn btn-primary">
                                    <?php echo $button_text; ?>
                                </a>
                                <span class="btn btn-secondary relative  btn-line-arrow">
                                    <?php echo $secondary_button_text; ?>
                                </span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="block-hide">
            <p>Hero Banner Block - Hidden</p>
        </div>
        <?php
    }

    ?>
</section>