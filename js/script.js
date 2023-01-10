async function fetchContract(city) {
    const r = await fetch('https://api.jcdecaux.com/vls/v1/stations?contract=' + city + '&apiKey=5e9c3981d2ee8d12af4b168731fe489035682eaf', {
        //formaliser une requete http
        method: 'GET',
        headers: {
            "Accept": "application/json"
        }
    })
    if (r.ok === true) {
        return r.json();
    }
    throw new Error('Impossible de contacter le serveur');
}


function displayStations(city) {

    var map = L.map('map').setView([45.75, 4.85], 12);
    L.tileLayer('https://tile.openstreetmap.org/%7Bz%7D/%7Bx%7D/%7By%7D.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright%22%3EOpenStreetMap</a>' //obligatoire
    }).addTo(map);

    fetchContract(city).then(function (datas) {
        for (var i = 0; i < datas.length; i++) {
            var marker = L.marker([datas[i].position.lat, datas[i].position.lng]).addTo(map);
        }

    })
}

let city = "Lyon";
displayStations(city);