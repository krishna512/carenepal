<?php

function cptui_register_my_cpts()
{

    /**
     * Post Type: Resources.
     */

    $labels = [
        "name" => esc_html__("Resource", "carenepal"),
        "singular_name" => esc_html__("Resource", "carenepal"),
        "all_items" => esc_html__("All Resource", "carenepal"),
        "add_new" => esc_html__("Add Resource", "carenepal"),
        "add_new_item" => esc_html__("Add Resource", "carenepal"),
        "edit_item" => esc_html__("Edit Resource", "carenepal"),
        "new_item" => esc_html__("New Resource", "carenepal"),
        "view_item" => esc_html__("View Resource", "carenepal"),
        "view_items" => esc_html__("View Resource", "carenepal"),
        "search_items" => esc_html__("Search Resource", "carenepal"),
    ];

    $args = [
        "label" => esc_html__("Resource", "carenepal"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => ["slug" => "resource", "with_front" => true],
        "query_var" => true,
        "menu_icon" => "dashicons-open-folder",
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_graphql" => false,
    ];

    register_post_type("resource", $args);

    /**
     * Taxonomy: Resource Category.
     */

    $labels = [
        "name" => esc_html__("Resource Category", "carenepal"),
        "singular_name" => esc_html__("Resource Category", "carenepal"),
    ];


    $args = [
        "label" => esc_html__("Resource Category", "carenepal"),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [
            'slug' => 'resources-category',
            'with_front' => true,
        ],
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => true,
        "rest_base" => "resources_category",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => true,
        "sort" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy("resources_category", ["resource"], $args);

    /**
     * Post Type: Thematic Areas.
     */

    $labels = [
        "name" => esc_html__("Thematic Areas", "carenepal"),
        "singular_name" => esc_html__("Thematic Area", "carenepal"),
        "all_items" => esc_html__("All Thematic Area", "carenepal"),
        "add_new" => esc_html__("Add Thematic Area", "carenepal"),
        "add_new_item" => esc_html__("Add Thematic Area", "carenepal"),
        "edit_item" => esc_html__("Edit Thematic Area", "carenepal"),
        "new_item" => esc_html__("New Thematic Area", "carenepal"),
        "view_item" => esc_html__("View Thematic Area", "carenepal"),
        "view_items" => esc_html__("View Thematic Area", "carenepal"),
        "search_items" => esc_html__("Search Thematic Area", "carenepal"),
    ];

    $args = [
        "label" => esc_html__("Thematic Areas", "carenepal"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "can_export" => false,
        "rewrite" => ["slug" => "thematic-area", "with_front" => true],
        "query_var" => true,
        "menu_icon" => "dashicons-chart-area",
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_graphql" => false,
    ];

    register_post_type("thematic_area", $args);

    /**
     * Post Type: Project.
     */

    $labels = [
        "name" => esc_html__("Project", "carenepal"),
        "singular_name" => esc_html__("Project", "carenepal"),
        "all_items" => esc_html__("All Project", "carenepal"),
        "add_new" => esc_html__("Add Project", "carenepal"),
        "add_new_item" => esc_html__("Add Project", "carenepal"),
        "edit_item" => esc_html__("Edit Project", "carenepal"),
        "new_item" => esc_html__("New Project", "carenepal"),
        "view_item" => esc_html__("View Project", "carenepal"),
        "view_items" => esc_html__("View Project", "carenepal"),
        "search_items" => esc_html__("Search Project", "carenepal"),
    ];

    $args = [
        "label" => esc_html__("Project", "carenepal"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "can_export" => false,
        "rewrite" => ["slug" => "project", "with_front" => true],
        "query_var" => true,
        "menu_icon" => "dashicons-edit-page",
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_graphql" => false,
    ];

    register_post_type("project", $args);

    /**
     * Post Type: Storie.
     */

    $labels = [
        "name" => esc_html__("Story", "carenepal"),
        "singular_name" => esc_html__("Story", "carenepal"),
        "all_items" => esc_html__("All Story", "carenepal"),
        "add_new" => esc_html__("Add story", "carenepal"),
        "add_new_item" => esc_html__("Add story", "carenepal"),
        "edit_item" => esc_html__("Edit story", "carenepal"),
        "new_item" => esc_html__("New story", "carenepal"),
        "view_item" => esc_html__("View story", "carenepal"),
        "view_items" => esc_html__("View story", "carenepal"),
        "search_items" => esc_html__("Search story", "carenepal"),
    ];

    $args = [
        "label" => esc_html__("Story", "carenepal"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "can_export" => false,
        "rewrite" => ["slug" => "story", "with_front" => true],
        "query_var" => true,
        "menu_icon" => "dashicons-admin-page",
        "supports" => ["title", "editor", "thumbnail", "page-attributes"],
        "show_in_graphql" => false,
    ];

    register_post_type("story", $args);

    /**
     * Post Type: News.
     */

    $labels = [
        "name" => esc_html__("News", "carenepal"),
        "singular_name" => esc_html__("New", "carenepal"),
        "all_items" => esc_html__("All New", "carenepal"),
        "add_new" => esc_html__("Add News", "carenepal"),
        "add_new_item" => esc_html__("Add News", "carenepal"),
        "edit_item" => esc_html__("Edit News", "carenepal"),
        "new_item" => esc_html__("New News", "carenepal"),
        "view_item" => esc_html__("View News", "carenepal"),
        "view_items" => esc_html__("View News", "carenepal"),
        "search_items" => esc_html__("Search News", "carenepal"),
    ];

    $args = [
        "label" => esc_html__("News", "carenepal"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => ["slug" => "news", "with_front" => true],
        "query_var" => true,
        "menu_icon" => "dashicons-list-view",
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_graphql" => false,
    ];

    register_post_type("news", $args);

    /**
     * Taxonomy: News Category.
     */

    $labels = [
        "name" => esc_html__("News Category", "carenepal"),
        "singular_name" => esc_html__("News Category", "carenepal"),
    ];

    $args = [
        "label" => esc_html__("News Category", "carenepal"),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [
            'slug' => 'news-category',
            'with_front' => true,
        ],
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => true,
        "rest_base" => "news_category",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => true,
        "sort" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy("news_category", ["news"], $args);

    /**
     * Post Type: Event.
     */

    $labels = [
        "name" => esc_html__("Event ", "carenepal"),
        "singular_name" => esc_html__("Event", "carenepal"),
        "all_items" => esc_html__("All Event", "carenepal"),
        "add_new" => esc_html__("Add Event", "carenepal"),
        "add_new_item" => esc_html__("Add Event", "carenepal"),
        "edit_item" => esc_html__("Edit Event", "carenepal"),
        "new_item" => esc_html__("New Event", "carenepal"),
        "view_item" => esc_html__("View Event", "carenepal"),
        "view_items" => esc_html__("View Event", "carenepal"),
        "search_items" => esc_html__("Search Event", "carenepal"),
    ];

    $args = [
        "label" => esc_html__("Event", "carenepal"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "can_export" => false,
        "rewrite" => ["slug" => "event", "with_front" => true],
        "query_var" => true,
        "menu_icon" => "dashicons-calendar-alt",
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_graphql" => false,
    ];

    register_post_type("event", $args);



    /**
     * Post Type:  Vacancy.
     */

    $labels = [
        "name" => esc_html__(" Vacancy", "carenepal"),
        "singular_name" => esc_html__("Vacancy", "carenepal"),
        "all_items" => esc_html__("All Vacancy", "carenepal"),
        "add_new" => esc_html__("Add Vacancy", "carenepal"),
        "add_new_item" => esc_html__("Add Vacancy", "carenepal"),
        "edit_item" => esc_html__("Edit Vacancy", "carenepal"),
        "new_item" => esc_html__("New Vacancy", "carenepal"),
        "view_item" => esc_html__("View Vacancy", "carenepal"),
        "view_items" => esc_html__("View Vacancy", "carenepal"),
        "search_items" => esc_html__("Search Vacancy", "carenepal"),
    ];

    $args = [
        "label" => esc_html__(" Vacancy", "carenepal"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => array('vacancy', 'vacancies'),
        "map_meta_cap" => true,
        "hierarchical" => true,
        "can_export" => false,
        "rewrite" => ["slug" => "vacancy", "with_front" => true],
        "query_var" => true,
        "menu_icon" => "dashicons-businessman",
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_graphql" => false,
    ];

    register_post_type("vacancy", $args);

    /**
     * Taxonomy: Vacancy Category.
     */

    $labels = [
        "name" => esc_html__("Vacancy Category", "carenepal"),
        "singular_name" => esc_html__("Vacancy Category", "carenepal"),
    ];


    $args = [
        "label" => esc_html__("Vacancy Category", "carenepal"),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        'capabilities' => array(
            'manage_terms' => 'publish_vacancies',
            'edit_terms' => 'edit_vacancies',
            'delete_terms' => 'delete_vacancies',
            'assign_terms' => 'publish_vacancies',
        ),
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [
            'slug' => 'category',
            'with_front' => true,
        ],
        "show_admin_column" => true,
        "show_in_rest" => false,
        "show_tagcloud" => true,
        "rest_base" => "vacancy_category",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => true,
        "sort" => true,
        "show_in_graphql" => false,
    ];
    // register_taxonomy("vacancy_category", ["vacancy"], $args);

    /**
     * Post Type: Partner.
     */

    $labels = [
        "name" => esc_html__("Partner", "carenepal"),
        "singular_name" => esc_html__("Partner", "carenepal"),
        "all_items" => esc_html__("All Partner", "carenepal"),
        "add_new" => esc_html__("Add Partner", "carenepal"),
        "add_new_item" => esc_html__("Add Partner", "carenepal"),
        "edit_item" => esc_html__("Edit Partner", "carenepal"),
        "new_item" => esc_html__("New Partner", "carenepal"),
        "view_item" => esc_html__("View Partner", "carenepal"),
        "view_items" => esc_html__("View Partner", "carenepal"),
        "search_items" => esc_html__("Search Partner", "carenepal"),
    ];

    $args = [
        "label" => esc_html__("Partner", "carenepal"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "can_export" => false,
        "rewrite" => ["slug" => "partner", "with_front" => true],
        "query_var" => true,
        "menu_icon" => "dashicons-networking",
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_graphql" => false,
    ];

    register_post_type("partner", $args);

    /**
     * Taxonomy: Partner Categories.
     */

    $labels = [
        "name" => esc_html__("Partner Category", "carenepal"),
        "singular_name" => esc_html__("Partner Category", "carenepal"),
    ];


    $args = [
        "label" => esc_html__("Partner Category", "carenepal"),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => false,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [
            'slug' => 'partner-category',
            'with_front' => true,
        ],
        "show_admin_column" => true,
        "show_in_rest" => false,
        "show_tagcloud" => true,
        "rest_base" => "partner_category",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => false,
        "sort" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy("partner_category", ["partner"], $args);

    /**
     * Post Type: Notice.
     */

    $labels = [
        "name" => esc_html__("Notice", "carenepal"),
        "singular_name" => esc_html__("Notice", "carenepal"),
        "all_items" => esc_html__("All Notice", "carenepal"),
        "add_new" => esc_html__("Add Notice", "carenepal"),
        "add_new_item" => esc_html__("Add Notice", "carenepal"),
        "edit_item" => esc_html__("Edit Notice", "carenepal"),
        "new_item" => esc_html__("New Notice", "carenepal"),
        "view_item" => esc_html__("View Notice", "carenepal"),
        "view_items" => esc_html__("View Notice", "carenepal"),
        "search_items" => esc_html__("Search Notice", "carenepal"),
    ];

    $args = [
        "label" => esc_html__("Notice", "carenepal"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => array('notice', 'notices'),
        "map_meta_cap" => true,
        "hierarchical" => true,
        "can_export" => false,
        "rewrite" => ["slug" => "notice", "with_front" => true],
        "query_var" => true,
        "menu_icon" => "dashicons-admin-post",
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_graphql" => false,
    ];

    register_post_type("notice", $args);

    /**
     * Post Type: Team.
     */

    $labels = [
        "name" => esc_html__("Team", "carenepal"),
        "singular_name" => esc_html__("Team", "carenepal"),
        "all_items" => esc_html__("All Team", "carenepal"),
        "add_new" => esc_html__("Add Team", "carenepal"),
        "add_new_item" => esc_html__("Add Team", "carenepal"),
        "edit_item" => esc_html__("Edit Team", "carenepal"),
        "new_item" => esc_html__("New Team", "carenepal"),
        "view_item" => esc_html__("View Team", "carenepal"),
        "view_items" => esc_html__("View Team", "carenepal"),
        "search_items" => esc_html__("Search Team", "carenepal"),
    ];

    $args = [
        "label" => esc_html__("Team", "carenepal"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "can_export" => false,
        "rewrite" => ["slug" => "team", "with_front" => true],
        "query_var" => true,
        "menu_icon" => "dashicons-groups",
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_graphql" => false,
    ];

    register_post_type("team", $args);

    /**
     * Taxonomy: Team Category.
     */

    $labels = [
        "name" => esc_html__("Team Category", "carenepal"),
        "singular_name" => esc_html__("Team Category", "carenepal"),
    ];


    $args = [
        "label" => esc_html__("Team Category", "carenepal"),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [
            'slug' => 'team-category',
            'with_front' => true,
        ],
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => true,
        "rest_base" => "team_category",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => true,
        "sort" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy("team_category", ["team"], $args);

    /**
     * Post Type: Multimedia.
     */

    $labels = [
        "name" => esc_html__("Multimedia", "carenepal"),
        "singular_name" => esc_html__("Multimedia", "carenepal"),
        "all_items" => esc_html__("All Multimedia", "carenepal"),
        "add_new" => esc_html__("Add Multimedia", "carenepal"),
        "add_new_item" => esc_html__("Add Multimedia", "carenepal"),
        "edit_item" => esc_html__("Edit Multimedia", "carenepal"),
        "new_item" => esc_html__("New Multimedia", "carenepal"),
        "view_item" => esc_html__("View Multimedia", "carenepal"),
        "view_items" => esc_html__("View Multimedia", "carenepal"),
        "search_items" => esc_html__("Search Multimedia", "carenepal"),
    ];

    $args = [
        "label" => esc_html__("Multimedia", "carenepal"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "can_export" => false,
        "rewrite" => ["slug" => "multimedia", "with_front" => true],
        "query_var" => true,
        "menu_icon" => "dashicons-format-gallery",
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_graphql" => false,
    ];

    register_post_type("multimedia", $args);
    /**
     * Taxonomy: Multimedia Category.
     */

    $labels = [
        "name" => esc_html__("Multimedia Category", "carenepal"),
        "singular_name" => esc_html__("Multimedia Category", "carenepal"),
    ];


    $args = [
        "label" => esc_html__("Multimedia Category", "carenepal"),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [
            'slug' => 'multimedia-category',
            'with_front' => true,
        ],
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => true,
        "rest_base" => "multimedia_category",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => true,
        "sort" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy("multimedia_category", ["multimedia"], $args);


    /**
     * Taxonomy: Location
     */

    $labels = [
        "name" => esc_html__("Location", "carenepal"),
        "singular_name" => esc_html__("Location", "carenepal"),
    ];

    $args = [
        "label" => esc_html__("Location", "carenepal"),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => false,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [
            'slug' => 'location',
            'with_front' => true,
        ],
        "show_admin_column" => true,
        "show_in_rest" => false,
        "show_tagcloud" => true,
        "rest_base" => "location",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => true,
        "sort" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy("location", ["project", 'thematic_area'], $args);
}

add_action('init', 'cptui_register_my_cpts');