jQuery(window).on('load', function () {
  jQuery('.map-loader').hide();

  var zoomLevel = 7;
  var minimumZoom = 7;
  var maximumZoom = 8;
  var isDraggable = false;
  var screenWidth = window.screen.width;

  if (window.screen.width <= 768) {
    zoomLevel = 6;
    minimumZoom = 5;
    maximumZoom = 7;
    isDraggable = true;
  }

  map = L.map('map', {
    scrollWheelZoom: true,
    doubleClickZoom: false,
    zoomControl: false,
    dragging: isDraggable,
    scrollWheelZoom: false,
    FitBounds: true,
    maxZoom: maximumZoom,
    minZoom: minimumZoom,
  }).setView([28.3949, 84.124], zoomLevel);

  if (window.screen.width <= 640) {
    L.control
      .zoom({
        position: 'bottomright',
        dragging: false,
      })
      .addTo(map);
  }

  eval(cn_map.layers_map);

  var nepalStateData = jQuery.parseJSON(cn_map.nepal_states_json_data);

  var mapNP_province = L.geoJSON(nepalStateData, {
    color: '#000',
    opacity: 1,
    weight: 2,
    className: '',
    onEachFeature: onEachFeaturePropertiesProvince,
  }).addTo(map);

  function onEachFeaturePropertiesDistrict(feature, layer) {
    if (feature.properties) {
      layer.options.className = 'hoverLayerDistrict';
      layer.bindTooltip('<div class="district-name">' + feature.properties.DISTRICT + '</div>');
    }
  }

  function onEachFeaturePropertiesProvince(feature, layer) {
    if (feature.properties) {
      layer.options.className = 'hoverLayerProvince province-layer' + feature.properties.Province;
      layer
        .bindTooltip('<div class="province-name">' + feature.properties.Province + '</div>', {
          className: feature.properties.Province + ' ' + 'provinceLabel',
          permanent: true,
          direction: 'center',
        })
        .openTooltip();
    }
  }

  jQuery(document).bind('DOMSubtreeModified', function () {
    //Hover effect on province name and map
    jQuery('.province-name').hover(
      function () {
        var hoverLayer = 'province-layer' + jQuery(this).parent().attr('class').split(/\s+/)[1];
        jQuery('.hoverLayerProvince').css('opacity', '0.6');
        jQuery('.' + hoverLayer).css({
          'stroke-width': '4',
          opacity: '1',
        });
      },
      function () {
        jQuery('.hoverLayerProvince').css({
          'stroke-width': '2',
          opacity: '1',
        });
      }
    );

    //Hover effect on districts
    jQuery('.hoverLayerDistrict').hover(
      function () {
        jQuery('.hoverLayerDistrict').css({
          'stroke-width': '1',
          'stroke-opacity': '0.5',
          opacity: '0.99',
        });
        jQuery(this).css({
          'stroke-width': '3',
          'stroke-opacity': '1',
          opacity: '1',
        });
      },
      function () {
        jQuery('.hoverLayerDistrict').css({
          'stroke-width': '1',
          'stroke-opacity': '0.6',
          opacity: '1',
        });
      }
    );
  });

  jQuery(document).ready(function () {
    jQuery('.data-1').click(function () {
      map.removeLayer(mapNP_province);
      map.removeLayer(map_layer_2);
      map.removeLayer(map_layer_3);
      map.removeLayer(mapNP);
      map.addLayer(map_layer_1);
      map.addLayer(mapNP_province);
    });
    jQuery('.data-2').click(function () {
      map.removeLayer(mapNP_province);
      map.removeLayer(map_layer_1);
      map.removeLayer(map_layer_3);
      map.removeLayer(mapNP);
      map.addLayer(map_layer_2);
      map.addLayer(mapNP_province);
    });
    jQuery('.data-3').click(function () {
      map.removeLayer(mapNP_province);
      map.removeLayer(map_layer_1);
      map.removeLayer(map_layer_2);
      map.removeLayer(mapNP);
      map.addLayer(map_layer_3);
      map.addLayer(mapNP_province);
    });
    jQuery('.data-all').click(function () {
      map.removeLayer(mapNP_province);
      map.removeLayer(map_layer_1);
      map.removeLayer(map_layer_2);
      map.removeLayer(map_layer_3);
      map.addLayer(mapNP);
      map.addLayer(mapNP_province);
    });
  });
});
