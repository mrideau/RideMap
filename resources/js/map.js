// require('leaflet');
// require('leaflet.markercluster');
//
// const map = L.map('map').setView([47.4724091, -0.6042191], 4);
//
// L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//     minZoom: 3,
//     maxZoom: 14,
//     attribution: '© OpenStreetMap'
// }).addTo(map);
//
// const icon_scale = 0.7;
// const icon_size = {
//     w: 64 * icon_scale,
//     h: 32 * icon_scale,
// };
//
// const icon = L.icon({
//     iconUrl: 'images/icons/ramp_icon.png',
//     iconSize: [icon_size.w, icon_size.h],
//     iconAnchor: [icon_size.w / 2, icon_size.h / 2],
//     popupAnchor: [0, -icon_size.h / 2]
// });
//
// const markers = L.markerClusterGroup({
//     iconCreateFunction: function(cluster) {
//         return L.divIcon({
//             html: cluster.getChildCount(),
//             className: 'mapcluster',
//             iconSize: null
//         });
//     }
// });
//
// const popup = L.popup();
//
// skateparks.forEach(skatepark => {
//     const coords = skatepark.coordinates.split(',');
//
//     const marker = L.marker(coords, {
//         icon: icon
//     })
//         .bindPopup(popup, {
//             closeButton: true,
//             autoClose: true,
//             'className' : 'map-popup'
//         });
//
//     marker.on('click', function (e) {
//         map.setView(e.latlng, 14);
//         popup.setLatLng(e.latlng)
//             .setContent(`
//             <a href="skateparks/${skatepark.slug}">
//                 <img src="${skatepark.image}" alt="Skate park ${skatepark.title}" style="width: 100%">
//                 <span>${skatepark.title}</span>
//             </a>
//             `)
//             .openOn(map);
//     });
//
//     markers.addLayer(marker);
// });
//
// map.addLayer(markers);
//
//

// const InteractiveMap = require("./components/map");

import InteractiveMap from "./components/map";

const mapPopup = document.querySelector('.map-popup');
const contentTitle = document.querySelector('.map-popup-content-title');
const contentDescription = document.querySelector('.map-popup-content-description');
const contentImage = document.querySelector('.map-popup-image');
const contentLink = document.querySelector('.map-popup-content-link');
const popupClose = document.querySelector('.map-popup-close');

function showPopup(skatepark) {
    mapPopup.classList.add('active');
    contentTitle.innerHTML = skatepark.title;
    contentDescription.innerHTML = skatepark.description;
    contentImage.src = skatepark.image;
    contentLink.href = `/skateparks/${skatepark.slug}`
}

function closePopup() {
    mapPopup.classList.remove('active');
}

const map = new InteractiveMap('map');

map.onclick = (e) => {
    closePopup();
}

map.createCluster().setMarkers(skateparks.map(skatepark => {
    return {
        coords: skatepark.coordinates.split(','),
        on: {
            click: () => showPopup(skatepark)
        }
    }
}));

popupClose.addEventListener('click', () => {
   closePopup();
});
