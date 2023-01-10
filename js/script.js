infos = document.querySelector(".infos_api");
infos.innerHTML = '<p>Passez la souris sur le marqueur</p><br><p>Double-cliquez pour zoomer</p>';
infos.style.fontStyle = "italic";


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

    let velo_icon1 = L.icon({
        iconUrl: './images/velo-png-1.png',
        iconSize: [32, 32], // size of the icon
        iconAnchor: [16, 16], // point of the icon which will correspond to marker's location
        popupAnchor: [16, -50] // point from which the popup should open relative to the iconAnchor
    });

    let velo_icon2 = L.icon({
        iconUrl: './images/velo-png-2.png',
        iconSize: [32, 32],
        iconAnchor: [16, 16],
        popupAnchor: [16, -50]
    });

    let map = L.map('map');
    fetchContract(city).then(function (datas) {

        console.log(datas);
        map.setView([datas[0].position.lat, datas[0].position.lng], 13);
        for (let i = 0; i < datas.length; i++) {

            let marker = L.marker([datas[i].position.lat, datas[i].position.lng], { icon: datas[i].available_bike_stands > 0 ? velo_icon1 : velo_icon2 }).on('mouseover', () => {
                infos.innerHTML =
                    `<p style='font-weight:bold; color:#FFE013'>${datas[i].name}</p>` +
                    `<p><span>Addresse</span> :${datas[i].address}</p>` +
                    `<p><span>Statut</span> : ${datas[i].status}</p>` +
                    `<p><span>Vélo disponibles au stand</span> : ${datas[i].available_bike_stands}</p>` +
                    `<p><span>Capacité du stand</span> :${datas[i].bike_stands}</p>`
                infos.style.fontStyle = "normal";
            })
            marker.on('mouseout', () => {
                infos.innerHTML = '<p>Passez la souris sur le marqueur</p><br><p>Double-cliquez pour zoomer</p>';
                infos.style.fontStyle = "italic";
            })
            marker.addTo(map);
        }
    })
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright%22%3EOpenStreetMap</a>', //obligatoire
    }).addTo(map);
}



let city = "Lyon";
displayStations(city);