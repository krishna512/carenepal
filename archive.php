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

        <div class="archive-page">
            <?php
            $queried_object = get_queried_object();
            $posttype = $queried_object->name;

            if (is_tag() || is_tax()) {
                $current_taxonomy = $queried_object->taxonomy;
                $filepath = dirname(__FILE__) . '/taxonomy/' . $current_taxonomy . '.php';
            } else {
                $filepath = dirname(__FILE__) . '/archives/' . $posttype . '.php';
            }

            if (file_exists($filepath)) {
                include_once($filepath);
            } else {
                $block_content = '';

                echo $block_content;
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