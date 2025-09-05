<?php
$id = '' . $block['id'];
$className = '';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

wp_enqueue_style('cn-leaflet');
wp_enqueue_script('cn-leaflet');
wp_enqueue_script('cn-leaflet-map');
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php

    $heading = (function_exists('get_field') && $heading = get_field('heading')) ? $heading : '';
    $paragraph = (function_exists('get_field') && $paragraph = get_field('paragraph')) ? $paragraph : '';
    $showhide = (function_exists('get_field') && $showhide = get_field('show_hide_block')) ? $showhide : '0';

    $nepalDistrict_path = get_template_directory_uri() . '/dist/map/NewNepalDistrict.geojson';
    $jsonStringData = file_get_contents($nepalDistrict_path);

    $nepal_states = get_template_directory_uri() . '/dist/map/nepal_states_line.geojson';
    $nepal_states_json_data = file_get_contents($nepal_states);

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

    if ($showhide) {
        ?>
        <div class="map-coverage-block">
            <div class="container relative overflow-hidden map-filter-container pt-14 sm:pt-20 lg:pt-40">
                <div class="grid-cols-2 md:grid">
                    <div></div>
                    <div>
                        <h2 class="font-bold">
                            <?php echo $heading; ?>
                        </h2>
                        <div class="paragraph">
                            <?php echo $paragraph; ?>
                        </div>
                    </div>
                </div>
                <div class="map-coverage thematic-data ">
                    <div class="grid-cols-12 mt-6 md:grid sm:mt-12">
                        <div class="col-span-7 lg:col-span-9"></div>
                        <form action=""
                            class="col-start-8 col-span-4 lg:col-start-10 lg:col-span-3 border z-[1000] border-[#eee9e5] p-4 rounded-2xl lg:max-w-[235px] bg-g-30">
                            <div class="font-bold">Filter map by program areas</div>
                            <div class="mt-2 sm:mt-4 map-filter-tabs">
                                <div class="data-all">
                                    <label class="flex items-start mt-2 gap-x-1">
                                        <input type="radio" name="thematic_area_map" value="" checked>
                                        <span class="text-sm leading-4">All program areas </span>
                                    </label>
                                </div>
                                <?php
                                if ($all_thematic_area_title) {
                                    foreach ($all_thematic_area_title as $key => $thematic_area_title) {
                                        ?>
                                        <div class="data-<?php echo $key + 1; ?>">
                                            <label class="flex items-start mt-2 gap-x-1">
                                                <input type="radio" name="thematic_area_map" value="">
                                                <span class="text-sm leading-4">
                                                    <?php echo $thematic_area_title; ?>
                                                </span>
                                            </label>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                    <div class=" h-80 md:h-[580px] relative md:mt-[-22%]">
                        <div class="map-loader">
                            <div class="pin"> </div>
                            <div class="pulse"> </div>
                        </div>
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="block-hide">
            <p>Map Coverage Thematic Area Block - Hidden</p>
        </div>
        <?php
    }
    ?>
</div>
</section>