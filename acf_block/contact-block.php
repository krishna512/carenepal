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
    <?php
    $contact_areas     = (function_exists('get_field') && $contact_areas = get_field('contact_areas')) ? $contact_areas : '';
    $showhide     = (function_exists('get_field') && $showhide = get_field('show_hide_block')) ? $showhide : '0';

    if ($showhide) {
    ?>
    <div  id="<?php echo esc_attr($id); ?>" class="contact-area-block <?php echo esc_attr($className); ?>">

        <?php
            if ($contact_areas) {
                foreach ($contact_areas as $contact_area) {
            ?>
        <div>
            <img src="<?php echo $contact_area['icon']; ?>" alt="icon">
            <?php echo $contact_area['info']; ?>
        </div>
        <?php
                }
            } else {
                echo "<div class='no-data'> No Data For Contact</div>";
            }
            ?>

    </div>
    <?php
    } else {
    ?>
    <div class="block-hide">
        <p>Contact Block - Hidden</p>
    </div>
    <?php
    }
    ?>
