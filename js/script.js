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

    var velo_icon = L.icon({
        iconUrl: './images/velo-png-2.png',
        iconSize: [32, 32], // size of the icon
        iconAnchor: [16, 16], // point of the icon which will correspond to marker's location
        popupAnchor: [16, -50] // point from which the popup should open relative to the iconAnchor
    });

    var map = L.map('map');
    fetchContract(city).then(function (datas) {
        map.setView([datas[0].position.lat, datas[0].position.lng], 13);
        for (var i = 0; i < datas.length; i++) {
            var marker = L.marker([datas[i].position.lat, datas[i].position.lng], { icon: velo_icon }).addTo(map);
        }

    })
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright%22%3EOpenStreetMap</a>', //obligatoire
    }).addTo(map);
}



let city = "Lyon";
displayStations(city);