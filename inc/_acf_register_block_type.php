<?php


if( function_exists('acf_register_block_type') ):

    acf_register_block_type(
        array(
            'name' => 'hero-banner',
            'title' => 'Hero Banner',
            'description' => '',
            'category' => 'page',
            'keywords' => array(
                0 => 'hero-banner',
            ),
            
            'render_template' => 'acf_block/hero-banner.php',
            'enqueue_style' => '',
            'enqueue_script' => '',
            'align' => 'full',
            'supports' => array(
                'align' => array('full'),
               
            )
        )
    );

    acf_register_block_type(
        array(
            'name' => 'thematic-areas-block',
            'title' => 'Thematic Areas Block',
            'description' => '',
            'category' => 'page',
            'keywords' => array(
                0 => 'thematic-areas-block',
            ),
            
            'render_template' => 'acf_block/thematic-areas-block.php',
            'enqueue_style' => '',
            'enqueue_script' => '',
            'align' => 'full',
            'supports' => array(
                'align' => array('full'),
               
            )
        )
    );

    acf_register_block_type(
        array(
            'name' => 'resource-block',
            'title' => 'Resource Block',
            'description' => '',
            'category' => 'page',
            'keywords' => array(
                0 => 'resource-block',
            ),
            'render_template' => 'acf_block/resource-block.php',
            'align' => 'full',
            'supports' => array(
                'align' => array('full'),
               
            )
        )
    );

    acf_register_block_type(
        array(
            'name' => 'our-partners',
            'title' => 'Our Partners Block',
            'description' => '',
            'category' => 'page',
            'keywords' => array(
                0 => 'our-partners',
            ),
            'render_template' => 'acf_block/our-partners-block.php',
            'align' => 'full',
            'supports' => array(
                'align' => array('full'),
               
            )
        )
    );

    acf_register_block_type(
        array(
            'name' => 'news',
            'title' => 'News Block',
            'description' => '',
            'category' => 'page',
            'keywords' => array(
                0 => 'news',
            ),
            'render_template' => 'acf_block/news-block.php',
            'align' => 'full',
            'supports' => array(
                'align' => array('full'),
               
            )
        )
    );
    

    acf_register_block_type(
        array(
            'name' => 'success-story',
            'title' => 'Our success stories Block',
            'description' => '',
            'category' => 'page',
            'keywords' => array(
                0 => 'success story',
            ),
            'render_template' => 'acf_block/success-story-block.php',
            'align' => 'full',
            'supports' => array(
                'align' => array('full'),
               
            )
        )
    );

    acf_register_block_type(
        array(
            'name' => 'action-area',
            'title' => 'Action Area Block',
            'description' => '',
            'category' => 'page',
            'keywords' => array(
                0 => 'action area',
            ),
            'render_template' => 'acf_block/action-area-block.php'
            
        )
    );

    acf_register_block_type(
        array(
            'name' => 'contact',
            'title' => 'Contact Block',
            'description' => '',
            'category' => 'page',
            'keywords' => array(
                0 => 'contact',
            ),
            'render_template' => 'acf_block/contact-block.php',
            'align' => 'full',
            'supports' => array(
                'align' => array('full'),
               
            )
        )
    );

    acf_register_block_type(
        array(
            'name' => 'map-coverage',
            'title' => 'Map Coverage',
            'description' => '',
            'category' => 'page',
            'keywords' => array(
                0 => 'map-coverage',
            ),
            'render_template' => 'acf_block/map-coverage.php',
            'align' => 'full',
            'supports' => array(
                'align' => array('full'),
               
            )
        )
    );

    acf_register_block_type(
        array(
            'name' => 'paragraph-image',
            'title' => 'Heading, Paragraph and Image Block',
            'description' => '',
            'category' => 'page',
            'keywords' => array(
                0 => 'contact',
            ),
            'render_template' => 'acf_block/paragraph-image-block.php',
            'align' => 'full',
            'supports' => array(
                'align' => array('full'),
               
            )
        )
    );

    acf_register_block_type(
        array(
            'name' => 'core-values',
            'title' => 'Core Values Block',
            'description' => '',
            'category' => 'page',
            'keywords' => array(
                0 => 'contact',
            ),
            'render_template' => 'acf_block/core-values-block.php',
            'align' => 'full',
            'supports' => array(
                'align' => array('full'),
               
            )
        )
    );

    acf_register_block_type(
        array(
            'name' => 'static-page-header',
            'title' => 'Heading - Static Page Header Section',
            'description' => '',
            'category' => 'page',
            'keywords' => array(
                0 => 'contact',
            ),
            'render_template' => 'acf_block/static-page-header-block.php',
            'align' => 'full',
            'supports' => array(
                'align' => array('full'),
               
            )
        )
    );

    acf_register_block_type(
        array(
            'name' => 'project',
            'title' => 'Project Block',
            'description' => '',
            'category' => 'page',
            'keywords' => array(
                0 => 'news',
            ),
            'render_template' => 'acf_block/project-block.php',
            'align' => 'full',
            'supports' => array(
                'align' => array('full'),
               
            )
        )
    );

    acf_register_block_type(
        array(
            'name' => 'vacancy banner',
            'title' => 'Vacancy Banner Block',
            'description' => '',
            'category' => 'page',
            'keywords' => array(
                0 => 'contact',
            ),
            'render_template' => 'acf_block/vacancy-banner-block.php',
            'align' => 'full',
            'supports' => array(
                'align' => array('full'),
               
            )
        )
    );
    
    acf_register_block_type(
        array(
            'name' => 'Crisis Response',
            'title' => 'Crisis Response Block',
            'description' => '',
            'category' => 'page',
            'keywords' => array(
                0 => 'contact',
            ),
            'render_template' => 'acf_block/crisis-response-block.php',
            'align' => 'full',
            'supports' => array(
                'align' => array('full'),
               
            )
        )
    );
    

endif;
