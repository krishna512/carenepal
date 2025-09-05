<?php
/*
Template Name: Archive Default
*/
ob_start();
block_header_area();
$block_header_area = ob_get_contents();
ob_clean();

ob_start();
block_footer_area();
$block_footer_area = ob_get_contents();
ob_clean();
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="wp-site-blocks">
        <header class="wp-block-template-part">
            <?php echo $block_header_area; ?>
        </header>

        <div class="single-page">
            <?php
            $posttype = get_post_type();
            $filepath = dirname(__FILE__) . '/singles/' . $posttype . '.php';
            if (file_exists($filepath)) {
                include_once($filepath);
            } else {
                include_once(dirname(__FILE__) . '/singles/single.php');
            }
            ?>
        </div>

        <footer class="footer wp-block-template-part">
            <?php echo $block_footer_area; ?>
        </footer>
    </div>
    <?php wp_footer(); ?>

</body>

</html>