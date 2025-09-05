<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FSE
 * @since 1.0.0
 */


if (!defined('_THEME_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_THEME_VERSION', wp_get_theme()->get('Version'));
}

// theme set up
if (!function_exists('theme_setup')) {
	function theme_setup()
	{

		// manage document title
		add_theme_support('title-tag');

		// Post Thumbnails on posts and pages.
		add_theme_support('post-thumbnails');

		// Add support for Block Styles.
		add_theme_support('wp-block-styles');

		// Add support for full and wide align images.
		add_theme_support('align-wide');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// allows the use of HTML5 markup for the 
		// search forms, comment forms, comment lists, gallery, and caption
		add_theme_support(
			'html5',
			array(
				'navigation-widgets',
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
	}

	add_action('after_setup_theme', 'theme_setup');
}


/**
 * Enqueue the style.css file.
 * 
 * @since 1.0.0
 */
// theme's scripts and styles for frontend
function theme_scripts()
{
	//geojsonDistrict
	$nepalDistrict_path = get_template_directory_uri() . '/dist/map/NewNepalDistrict.geojson';
	$jsonStringData = '';

	$response = wp_remote_get($nepalDistrict_path);

	if (is_array($response) && !is_wp_error($response)) {
		$jsonStringData = $response['body'];
	}

	// geojson states
	$nepal_states = get_template_directory_uri() . '/dist/map/nepal_states_line.geojson';
	$nepal_states_json_data = '';

	$response = wp_remote_get($nepal_states);

	if (is_array($response) && !is_wp_error($response)) {
		$nepal_states_json_data = $response['body'];
	}

	// wp query to get area locations
	$args = array(
		'post_type' => 'thematic_area',
		'posts_per_page' => '-1',
		'post_status' => array('publish'),
	);

	$the_query = new WP_Query($args);
	$all_thematic_area_title = [];
	$all_thematic_area_location = [];
	if ($the_query->have_posts()) {
		while ($the_query->have_posts()) {
			$the_query->the_post();
			$id = get_the_ID();
			$all_thematic_area_title[] = get_the_title();
			$all_thematic_area_location[] = get_field('location_districts', $id);
		}
	}
	// Reset Post Data
	wp_reset_postdata();

	$layers_map = '';
	$all_thematic_area_district = [];
	if ($all_thematic_area_location) {
		foreach ($all_thematic_area_location as $key => $thematic_area_location) {
			$i = $key + 1;
			if ($i == "1") {
				$color_fill = "#004987";
			} elseif ($i == '2') {
				$color_fill = "#510C76";
			} elseif ($i == '3') {
				$color_fill = "#AA182C";
			} else {
				$color_fill = "#F9F6F4";
			}
			$layers_map .= '
            var map_layer_' . $i . ' = L.geoJSON(' . $jsonStringData . ', {
                style: function(feature) {
                    switch (feature.properties.DISTRICT) { 
        ';
			if ($thematic_area_location) {
				foreach ($thematic_area_location as $key => $location) {
					$all_thematic_area_district[] = strtoupper($location->slug);
					$layers_map .= ' case "' . strtoupper($location->slug) . '": return {"color": "#46223F", "opacity": 0.9, "weight": 1, fillOpacity: 0.8,fillColor: "' . $color_fill . '"};';
				}
			}
			$layers_map .= '
                        default: return {"color": "#46223F", "opacity": 0.9, "weight": 1, fillOpacity: 0.8,fillColor: "#F9F6F4"};
                    }
                },
                onEachFeature: onEachFeaturePropertiesDistrict
            });
        ';
		}
	}

	if ($all_thematic_area_district) {
		$layers_map .= '
            var mapNP = L.geoJSON(' . $jsonStringData . ', {
                style: function(feature) {
                    switch (feature.properties.DISTRICT) { ';
		foreach ($all_thematic_area_district as $key => $district) {
			$layers_map .= '
                        case "' . $district . '": return {"color": "#46223F", "opacity": 0.6, "weight": 1, fillOpacity: 1,fillColor: "#F4B223"};
                    ';
		}
		$layers_map .= '
                        default: return {"color": "#46223F", "opacity": 0.6, "weight": 1, fillOpacity: 1,fillColor: "#F9F6F4"};
                    }
                },
                onEachFeature: onEachFeaturePropertiesDistrict
            }).addTo(map);
        ';
	}

	$layers_map = str_replace(array("\r", "\n", ), '', $layers_map);

	/**
	 * ===============================
	 * Enqueue styles
	 * ===============================
	 */
	// leaflet css
	wp_register_style(
		'cn-leaflet',
		'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css'
	);

	// main css
	wp_enqueue_style(
		'fse-style',
		get_stylesheet_directory_uri() . '/dist/css/app.css',
		array(),
		_THEME_VERSION,
	);

	// leaflet js
	wp_register_script(
		'cn-leaflet',
		'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js',
		array(),
		'',
		true
	);

	// leaflet initialization
	wp_register_script(
		'cn-leaflet-map', get_stylesheet_directory_uri() . '/dist/js/map.js',
		array('jquery'),
		'',
		true
	);

	wp_localize_script(
		'cn-leaflet-map',
		'cn_map',
		array(
			'layers_map' => $layers_map,
			'nepal_states_json_data' => $nepal_states_json_data,
		)
	);

	// main script
	wp_enqueue_script(
		'fse-script',
		get_stylesheet_directory_uri() . '/dist/js/app.js',
		array('jquery'),
		_THEME_VERSION,
		true
	);

	// formidable form local storage script
	wp_register_script(
		'cn-formidable', get_stylesheet_directory_uri() . '/dist/js/cn-formidable.js',
		array('jquery'),
		'',
		true
	);

}
add_action('wp_enqueue_scripts', 'theme_scripts', 11);

/**
 * ===================================================
 * theme's styles for editor block
 * ===================================================
 */

add_editor_style('dist/css/app.css');

/**
 * include custom functions
 * 
 */
require_once dirname(__FILE__) . '/inc/includes.php';


/**
 * Remove svg added by wp
 */
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');



/*
CHANGE SLUGS OF TAXONOMIES, slugs used for archive pages
*/
function wporg_registered_taxonomy_customtax($taxonomy, $object_type, $args)
{
	remove_action(current_action(), __FUNCTION__);
	$args['rewrite'] = array('slug' => 'cat');
	register_taxonomy($taxonomy, $object_type, $args);
}
add_action('registered_taxonomy_category', 'wporg_registered_taxonomy_customtax', 10, 3);

remove_role('hr_role');