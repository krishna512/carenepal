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


<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> alignfull static-page-header-block">

    <?php
    // $heading     = (function_exists('get_field') && $heading = get_field('heading')) ? $heading : 'Please Enter Heading';
    // $sub_heading     = (function_exists('get_field') && $sub_heading = get_field('sub_heading')) ? $sub_heading : 'Please Enter Sub Heading';
    $fearure_image = (function_exists('get_field') && $fearure_image = get_field('fearure_image')) ? $fearure_image : '';
    $showhide = (function_exists('get_field') && $showhide = get_field('show_hide_block')) ? $showhide : '0';


    if ($showhide) {
        echo vacancyContent();
    } else {
        ?>
        <div class="block-hide">
            <p>static-page-header-block - Hidden</p>
        </div>
        <?php
    }
    ?>
    <script>
        const mainHeader = document.querySelector('.main-header');
        mainHeader.classList.add('no-banner');
    </script>
</section>