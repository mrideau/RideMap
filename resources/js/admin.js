let adresses = [];

function update_autocomplete(adress) {
    $.get('https://photon.komoot.io/api', {q: adress, lang: 'fr'}, function(data) {
        data['features']?.forEach(element => {
            let properties = element['properties'];
            let adress = properties['housenumber'] + ' ' + properties['street'] + ', ' + properties['postcode'] + ', ' + properties['city'];

            adresses.push(adress);
        });
    });
}

// .on('input', function(e) {
//     update_autocomplete($(this).val());
// });
