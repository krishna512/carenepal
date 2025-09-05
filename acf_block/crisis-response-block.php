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
    $button_text = (function_exists('get_field') && $button_text = get_field('button_text')) ? $button_text : '';
    $button_url_link = (function_exists('get_field') && $button_url_link = get_field('button_url_link')) ? $button_url_link : '';

    $showhide = (function_exists('get_field') && $showhide = get_field('showhide_crisis_response_block')) ? $showhide : '0';

    ?>

    <?php

    // if (is_front_page()) {}
    
    if ($showhide) {
        ?>
        <div>
            <div class="fixed z-[9999] bottom-[20%] right-0 crisis-btn">
                <div class="flex bg-o-40  crisis-wrap">
                    <div class="crisis-icon-wrap">
                        <div class="relative">
                            <div class="crisis-btn-icon">

                                <?php echo useSvg('crisis-respond'); ?>

                            </div>
                        </div>
                    </div>


                    <div class=" crisis-content flex items-center relative text-white">
                        <a href="<?php echo $button_url_link; ?>">
                            <?php echo $button_text; ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="block-hide">
            <p>Block Crisis Response - Hidden</p>
        </div>
        <?php
    }