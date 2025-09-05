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
    $banner_image = (function_exists('get_field') && $banner_image = get_field('image')) ? $banner_image : '';
    $heading = (function_exists('get_field') && $heading = get_field('heading')) ? $heading : '';
    $paragraph_text = (function_exists('get_field') && $paragraph_text = get_field('paragraph')) ? $paragraph_text : '';
    $Style = (function_exists('get_field') && $Style = get_field('style')) ? $Style : 'default';
    $button_label = (function_exists('get_field') && $button_label = get_field('button_label')) ? $button_label : '';
    $button_link = (function_exists('get_field') && $button_link = get_field('button_link')) ? $button_link : '';
    $showhide = (function_exists('get_field') && $showhide = get_field('show_hide_block')) ? $showhide : '0';

    if ($showhide) {
        if ($Style == 'style1' || $Style == 'style2') {
            ?>
            <div class="paragraph-image-block flex flex-wrap items-center content-center relative <?php echo $Style ?> ">
                <div class="overflow-hidden  paragraph-image-block-image"><img src="<?php echo $banner_image; ?>"
                        alt="banner_image"></div>
                <div class="paragraph-image-block-info">
                    <div class="paragraph-image-block-content">
                        <h3 class="mb-6 font-bold  md:leading-9">
                            <?php echo $heading; ?>

                        </h3>
                        <?php echo $paragraph_text; ?>

                        <?php if ($button_label && $button_link) { ?>
                            <div class="flex cursor-pointer ">
                                <a href="<?php echo $button_link; ?>"
                                    class="flex items-center gap-8 learn-more-btn uppercase font-bold text-base  cursor-pointer py-[10px] px-6 transition-all duration-200 ease-in-out hover:bg-o-40 hover:rounded-xl">
                                    <!-- Learn more about our mission -->
                                    <?php echo $button_label; ?>
                                    <span>
                                        <?php echo useSvg('right-arrow'); ?>
                                    </span>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- Paragraph second block  -->
            <?php
        } else {
            ?>
            <div class="paragraph-block flex flex-wrap max-md:flex-col-reverse <?php echo $Style ?> ">
                <div class="paragraph-block-image md:basis-2/4 "><img src="<?php echo $banner_image; ?>" alt="banner_image">
                </div>
                <div class="p-10 paragraph-block-info md:basis-2/4">
                    <div class="paragraph-block-content ">
                        <h3 class="relative pb-3 font-medium uppercase  paragraph-block-title mb-7">
                            <?php echo $heading; ?>
                        </h3>
                        <p>
                            <?php echo $paragraph_text; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="block-hide">
            <p>Parapraph Image Block - Hidden</p>
        </div>
        <?php
    }
    ?>
</section>