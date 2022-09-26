require('leaflet');
require('leaflet.markercluster');

// Import dynamique du style de la carte
const styleRef = document.createElement('link');
styleRef.rel = 'stylesheet';
styleRef.type = 'text/css';
styleRef.href = 'https://unpkg.com/leaflet@1.8.0/dist/leaflet.css';
styleRef.integrity = 'sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==';
styleRef.crossOrigin = '';
document.querySelector('head').appendChild(styleRef);

// Fix des icons manquants
const iconRetinaUrl = '/images/marker-icon-2x.png';
const iconUrl = '/images/marker-icon.png';
const shadowUrl = '/images/marker-shadow.png';
const iconDefault = L.icon({
    iconRetinaUrl,
    iconUrl,
    shadowUrl,
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    tooltipAnchor: [16, -28],
    shadowSize: [41, 41]
});
L.Marker.prototype.options.icon = iconDefault;

const InteractiveMap = (name) => {
    const map = L.map(name).setView([47.4724091, -0.6042191], 4);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        minZoom: 3,
        maxZoom: 14,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    function addMarker(parent, coords, options) {
        const marker = L.marker(coords, options);
        parent.addLayer(marker);
        return marker;
    }

    const obj = {
        addMarker: function(coords, options) {
            return addMarker(map, coords, options);;
        },
        createCluster: function() {
            const cluster = L.markerClusterGroup({
                iconCreateFunction: function(cluster) {
                    return L.divIcon({
                        html: cluster.getChildCount(),
                        className: 'mapcluster',
                        iconSize: null
                    });
                }
            });
            map.addLayer(cluster);
            // let
            return {
                // addMarker: (coords, options) => addMarker(cluster, coords, options),
                setMarkers: (markers) => {
                    markers.forEach(marker => {
                        addMarker(cluster, marker.coords, marker.options).on('click', (e) => {
                            marker?.on?.click(e);
                        })
                    })
                }
            }
        }
    }

    map.on('click', (e) => {
        if (obj?.onclick)
            obj.onclick(e);
    })

    return obj;
}

export default InteractiveMap;
