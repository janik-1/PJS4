window.addEventListener("load", function () {

    var latitudeCliquee;
    var longitudeCliquee;
    var chemins = new Array();

    // =============================================== Préparation de la carte Leaflet ==================================================

    console.log("Chargement de la carte...");

    var mymap = L.map('mapid') // On initialise la <div> en tant que carte Leaflet
        .setView([48.8534, 2.3488], 13); // On paramètre la vue de la carte, d'abord latitude, puis longitude, puis le zoom
    var marker = new L.marker();
    //On importe l'image de fond
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png',
        { attribution: 'Open Street Map' } // Légende en bas à droite
    ).addTo(mymap); // Ajoute l'image à la carte
    console.log("Carte chargée");

    // =================================================== Handling su clic sur la map ================================================================

    mymap.on('click', function (e) { // Handling du clic sur la carte
        $("#loader").fadeIn();
        let latitude = e.latlng.lat; // Récupération de la latitude de l'endroit du clic
        let longitude = e.latlng.lng;// Récupération de la longitude de l'endroit du clic

        chemins.forEach(element => {
            mymap.removeLayer(element);
        });
        chemins = new Array();


        latitudeCliquee = latitude;
        longitudeCliquee = longitude;

        $('#gps').html("Latitude : " + latitude + " <br>Longitude : " + longitude); // On affiche les coord GPS

        // Gestion du marker

        mymap.removeLayer(marker); // On enlève l'ancien marker
        marker = new L.marker([latitude, longitude]); // On crée le nouveau marker
        mymap.addLayer(marker); // On l'ajoute

        // Infos sur la ville où on a cliqué

        // 1) Récupération du nom de la ville
        $.getJSON('https://api-adresse.data.gouv.fr/reverse/?long=' + e.latlng.lng + '&lat=' + e.latlng.lat, function (data) { // Procédure AJAX avec décodage JSON intégré sur l'API adresse.data.gouv.fr
            $('#nom').html(data.features[0].properties.city); // On met le nom de la ville

            // 2) Récupération du GeoJSON de la ville

            $.getJSON('https://api-adresse.data.gouv.fr/search?q=' + data.features[0].properties.city + '&type=municipality', function (result) { // Procédure AJAX avec décodage JSON intégré sur l'API adresse.data.gouv.fr
                $('#pop').html(parseFloat(result.features[0].properties.population)); // On met la population de la ville dans les infos
                compteur($('#pop'));
            });

            // Si le code postal de ville commence par 75 il devient 75000 pour considérer Paris comme une seule ville
            let postcode = new String(data.features[0].properties.postcode).includes("75") ? 75000 : data.features[0].properties.postcode;

            $("#loader").fadeOut();
            $('#infos').fadeIn(); // ON affiche la carte d'infos
            $("#carteInfos").fadeIn();
        });
    });

    // ========================================================= Itinéraire ===========================================================================

    //Coordonnées de chatelet (centre de l'agglomération)
    // var latitudeCentre = 48.8616202897821;
    // var longitudeCentre = 2.34803910830431;

    // $("#rechercher").on("click", function () {

    //     $.ajax({ // procédure AJAX sur l'API du STIF Navitia
    //         type: "GET",
    //         url: "https://04f316f2-d3b4-4203-b395-2550565c7e49@api.navitia.io/v1/coverage/fr-idf/journeys?from=" + longitudeCliquee + "%3B" + latitudeCliquee + "&to=" + longitudeCentre + "%3B" + latitudeCentre,
    //         dataType: 'json',
    //         headers: {
    //             Authorization: 'CityPop ' + btoa('04f316f2-d3b4-4203-b395-2550565c7e49')
    //         },
    //         success: function (itineraire) {
    //             console.table(itineraire);
    //             sections = itineraire.journeys[0].sections; // On récupère les sestions de l'itinéraire
    //             sections.forEach(element => {
    //                 let couleur;
    //                 try { // On essaye de recup la couleur
    //                     couleur = "#" + element.display_informations.color;
    //                 } catch (erreur) { // Si ya pas de couleur (trajet à pied) on met un joli bleu
    //                     couleur = "#0066CC";
    //                 }

    //                 let styleLigne = { "color": couleur, "weight": 10 }; // Création du style de la layer avec la couleur du trajet

    //                 let portionChemin = element.geojson;
    //                 let geojson = L.geoJSON(portionChemin, { style: styleLigne }); // On envoie le GeoJSON à Leaflet pour créer la layer de dessins
    //                 chemins.push(geojson); // On met la layer dans le tableau pour pouvoir l'effacer ensuite
    //                 geojson.addTo(mymap); // On ajoute la layer à leaflet
    //             });

    //             let temps = Math.round(itineraire.journeys[0].duration / 60);
    //             $("#tempsItineraire").fadeIn();
    //             $(".mins").fadeIn();
    //             $("#tempsItineraire").text(temps);
    //             compteur($("#tempsItineraire"));

    //         }

    //     });
    // });

    // ========================================================= Recherche par nom de ville ===========================================================================   

    // $("#btnSearchVille").on("click", function () {
    //     let ville = $("#inputVille").val();
    //     $.getJSON('https://api-adresse.data.gouv.fr/search?q=' + ville, function (result) { // Procédure AJAX avec décodage JSON intégré sur l'API adresse.data.gouv.fr            
    //         let longitude = result.features[0].geometry.coordinates[0];
    //         let latitude = result.features[0].geometry.coordinates[1];
    //         let latlngPoint = new L.LatLng(latitude, longitude);
    //         //on déclenche le clic sur mymap aux cordonnées de latlngPoint
    //         mymap.setView([latitude, longitude], 13);
    //         mymap.fireEvent('click', {
    //             latlng: latlngPoint,
    //             layerPoint: mymap.latLngToLayerPoint(latlngPoint),
    //             containerPoint: mymap.latLngToContainerPoint(latlngPoint)
    //         });
    //     });
    // })
});

// function compteur(object) {
//     object.prop('Counter', 0).animate(
//         {
//             "Counter": object.text()
//         }
//         ,
//         {
//             duration: 1000,
//             easing: "swing",
//             step: function (now) {
//                 object.text(Math.ceil(now));
//             }
//         }
//     );
// }