// require('leaflet');
// require('leaflet.markercluster');
//
// var map = L.map('location-selector').setView([46.227638, 2.213749], 6);
//
// L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//     minZoom: 6,
//     maxZoom: 17,
//     attribution: '© OpenStreetMap'
// }).addTo(map);
//
// map.on('click', (e) => {
//     update_marker(e.latlng);
// })
//

import InteractiveMap from "../components/map";

const map = new InteractiveMap('location-selector');

map.onclick = (e) => {
    update_marker(e.latlng);
}

let marker;

function update_marker(coordinates) {
    if(marker)
        marker.remove();

    marker = map.addMarker(coordinates)
    document.querySelector('#coordinates').value = [coordinates.lat, coordinates.lng].join(',');
}

const coordinates = document.querySelector('#coordinates');
if (coordinates.value !== '') {
    const coords = coordinates.value.split(',');
    update_marker({lat: coords[0], lng: coords[1]});
}

// Autocomplete

const address_input = document.querySelector('#address');
const address_autocomplete = document.querySelector('#address_autocomplete');

address_autocomplete.classList.add('hidden');

let address = address_input.value;
let lastType;

address_input.addEventListener('keydown', (event) => {
    const millis = Date.now() - lastType;
    lastType = Date.now();
    if (millis < 100)
        return;

    address = event.target.value;

    if (address_autocomplete.childElementCount <= 0) {
        address_autocomplete.classList.add('hidden');
        // address_autocomplete.style.display = 'none';
    } else {
        address_autocomplete.classList.remove('hidden');
        // address_autocomplete.style.display = 'block';
    }

    if (address === '')
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
                address_autocomplete.classList.add('hidden');

                update_marker({lat: feature.geometry.coordinates[1], lng: feature.geometry.coordinates[0]});
            });

            li.appendChild(btn)

            address_autocomplete.appendChild(li)
        });
    }
});

// Image

const set_image = document.querySelector('#set_image');
const image = document.querySelector('#image');
const image_preview = document.querySelector('#image_preview');

set_image.addEventListener('click', () => {
    image.click();
});

image.addEventListener('change', (e) => {
    const file = e.target.files[0];

    const fileReader = new FileReader();
    fileReader.addEventListener('load', function() {
        image_preview.src = this.result;
    });
    fileReader.readAsDataURL(file);
});

// Image Gallery

const gallery_preview = document.querySelector('#gallery_preview');
const gallery_input = document.querySelector('#gallery_input');
const gallery_delete_container = document.querySelector('#gallery_delete_container');
const add_gallery = document.querySelector('#add_gallery');
let uploaded_files = [];
let files_to_delete = [];

if (medias != null) {
    medias.forEach(media => {
        addToGallery(media.name, media.original_url, media.id);
    });
}

// Permet de générer un objet FileList à partir d'un DataTransfer
function getFileListItems (files) {
    let transferObject = new DataTransfer()
    for (let i = 0; i < files.length; i++) {
        transferObject.items.add(files[i])
    }
    return transferObject.files;
}

function addToGallery(name, src, id = -1) {
    let container = document.createElement('div');
    container.classList.add('w-100', 'h-100', 'p-relative');

    let image = new Image();
    image.classList.add('border-small', 'w-100', 'h-100', 'fit-cover');
    image.title = name;
    image.src = src;

    let cross = document.createElement('button');
    cross.type = 'button';
    cross.classList.add('p-absolute', 'btn', 'btn-primary', 'btn-small',  't-0', 'l-0');
    cross.append('x');
    cross.onclick = () => {
        container.remove();

        if (id) {
            files_to_delete.push(id);
            console.log('files to delete', files_to_delete);
            gallery_delete_container.value = files_to_delete;
        } else {
            uploaded_files = uploaded_files.filter(f => f.name !== name);
            gallery_input.files = getFileListItems(uploaded_files);
        }
    }

    container.appendChild(image);
    container.appendChild(cross);

    gallery_preview.appendChild(container);
}

add_gallery.addEventListener('click', () => {
    gallery_input.click();
});

gallery_input.onchange = (e) => {
    [].forEach.call(e.target.files, read);
    function read(file) {
        const reader = new FileReader();
        reader.addEventListener('load', function() {
            uploaded_files.push(file);
            console.log('uploaded_files', uploaded_files);
            gallery_input.files = getFileListItems(uploaded_files);
            addToGallery(file.name, this.result);
        });
        reader.readAsDataURL(file);
    }
}
