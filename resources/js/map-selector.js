require('leaflet');
require('leaflet.markercluster');

var map = L.map('location-selector').setView([46.227638, 2.213749], 6);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    minZoom: 6,
    maxZoom: 17,
    attribution: '© OpenStreetMap'
}).addTo(map);

map.on('click', (e) => {
    update_marker(e.latlng);
    // const http = new XMLHttpRequest();
    // http.open('GET', `https://api-adresse.data.gouv.fr/reverse/?lon=${e.latlng.lng}&lat=${e.latlng.lat}`);
    // http.send();
    // http.onload = () => {
    //     console.log(http.response);
    // }
})

let marker;

function update_marker(coordinates) {
    if(marker)
        map.removeLayer(marker);

    console.log(coordinates);

    marker = L.marker(coordinates);
    map.addLayer(marker)
    document.querySelector('#coordinates').value = [coordinates.lat, coordinates.lng].join(',');
}

const coords = coordinates.value.split(',');
update_marker({lat: coords[0], lng: coords[1]});

const address_input = document.querySelector('#address');

let address = address_input.value;

address_input.addEventListener('focus', () => {
})

address_input.addEventListener('input', (event) => {
    address = event.target.value;

    if (address_autocomplete.childElementCount <= 0) {
        address_autocomplete.style.display = 'none';
    } else {
        address_autocomplete.style.display = 'block';
    }

    if (address == '')
        return;

    const http = new XMLHttpRequest();
    http.open('GET', `https://api-adresse.data.gouv.fr/search/?q=${address}`);
    http.send();
    http.onload = () => {
        const result = JSON.parse(http.response);
        address_autocomplete.innerHTML = '';
        result.features.sort((a, b) => {
            a = a.properties;
            b = b.properties;

            if (a.score > b.score)
                return 1;
            else if (a.score < b.score)
                return -1
            return 0;
        }).forEach(feature => {
            const properties = feature?.properties;

            const li = document.createElement('li');
            const btn = document.createElement('button');
            btn.type = 'button'
            btn.appendChild(document.createTextNode(properties?.label))
            btn.addEventListener('click', () => {
                address_input.value = properties.name;
                city.value = properties.city;
                postcode.value = properties.postcode;

                update_marker({lat: feature.geometry.coordinates[1], lng: feature.geometry.coordinates[0]});
            });

            li.appendChild(btn)

            address_autocomplete.appendChild(li)
        });
    }
});
