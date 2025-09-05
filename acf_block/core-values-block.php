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
    $heading     = (function_exists('get_field') && $heading = get_field('heading')) ? $heading : '';
    $core_values     = (function_exists('get_field') && $core_values = get_field('core_values_repeater')) ? $core_values : '';
    $showhide     = (function_exists('get_field') && $showhide = get_field('show_hide_block')) ? $showhide : '0';

    if ($showhide) {
    ?>
    <div class="core-value-block py-10 sm:py-14 md:py-20 font-bold">
        <div class="container">
            <div class="text-center flex justify-center">
                <h3 class="max-w-fit core-value-title uppercase"><?php echo $heading; ?></h3>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-32 py-10 gap-y-10">

                <?php
            if ($core_values) {
                foreach ($core_values as $core_value) {
            ?>
                <div class="inline-flex gap-x-8">
                    <div class="p-6 border border-n-30 rounded-full bg-white h-fit">
                        <img src="<?php echo $core_value['icons']; ?>" alt="icon" class="h-auto w-40">
                    </div>
                    <div>
                        <h4 class="mb-6">
                            <?php echo $core_value['heading']; ?>
                        </h4>
                        <p class="text-[16px] text-n-70">
                            <?php echo $core_value['paragraph']; ?>
                        </p>
                    </div>
                </div>
                <?php
                }
            }
            ?>

            </div>
        </div>
    </div>
    <?php
    } else {
    ?>
    <div class="block-hide">
        <p>core-values-block - Hidden</p>
    </div>
    <?php
    }
    ?>
</section>