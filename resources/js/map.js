require('leaflet');
require('leaflet.markercluster');

var map = L.map('map').setView([47.4724091, -0.6042191], 4);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    minZoom: 3,
    maxZoom: 14,
    attribution: '© OpenStreetMap'
}).addTo(map);

const icon_scale = 0.7;
const icon_size = {
    w: 64 * icon_scale,
    h: 32 * icon_scale,
};

const icon = L.icon({
    iconUrl: 'images/icons/ramp_icon.png',
    iconSize: [icon_size.w, icon_size.h],
    iconAnchor: [icon_size.w / 2, icon_size.h / 2],
    popupAnchor: [0, -icon_size.h / 2]
});

const markers = L.markerClusterGroup({
    iconCreateFunction: function(cluster) {
        return L.divIcon({
            html: cluster.getChildCount(),
            className: 'mapcluster',
            iconSize: null
        });
    }
});

const popup = L.popup();

skateparcs.forEach(skateparc => {
    const coords = skateparc.coordinates.split(',');

    const marker = L.marker(coords, {
        icon: icon
    }).bindPopup(popup);

    marker.on('click', function (e) {
        map.setView(e.latlng, 14);
        popup.setLatLng(e.latlng)
            .setContent(skateparc.title)
            .openOn(map);
    });

    markers.addLayer(marker);
});

map.addLayer(markers);

console.log(markers.getLayers())
