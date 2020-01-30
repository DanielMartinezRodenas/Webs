function mostrarInfo() {
    var city = $("#city").val();
    var key  = '8e6a551e5dda7238683468eeedbc7477';

    if(city != '') {
        $.ajax({
            url:'http://api.openweathermap.org/data/2.5/weather',
            dataType:'json',
            type:'GET',
            data:{q:city, appid: key, units: 'metric'},
    
            success: function(data){
                var info = '';
                $.each(data.weather, function(index, val){
                    info += '<p><b>Tiempo en ' + data.name + ", " + data.sys.country + "</b><br><img src=http://openweathermap.org/img/wn/"+ val.icon +".png></p>Tiempo: " + val.main + "<br>Temperatura prevista: "+ data.main.temp + '&deg;C<br>Temperatura mínima: ' + data.main.temp_min  + "&deg;C<br>Temperatura máxima: " + data.main.temp_max + "&deg;C<br>Humedad: " + data.main.humidity + "%<br>Presión: " + data.main.pressure + " hPa<br>Velocidad del viento: " + data.wind.speed + " m/s<br>Ángulo del viento: " + data.wind.deg + "&deg;<br>Descripción: " + val.description; 
                });
                $(".ShowWeatherForcast").html(info);
            }
        });
    } else {
        alert("No puedes dejar el campo vacío");
    }
}

function pintarMapa() {
    navigator.geolocation.getCurrentPosition(function (location) {
        var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

        var map = L.map('mapid').setView(latlng, 4)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker(latlng).addTo(map);
        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("Has clicado en <br> Latitud: " + e.latlng.lat + "<br> Longitud: " + e.latlng.lng)
                .openOn(map);
                leerTiempo(e.latlng.lat, e.latlng.lng);
                marker.setLatLng([e.latlng.lat, e.latlng.lng]);
        }

        map.on('click', onMapClick);
    });
}

function leerTiempo(lat, lon) {
    var url = "http://api.openweathermap.org/data/2.5/forecast?lat=" + lat + "&lon=" + lon + "&units=metric&appid=8e6a551e5dda7238683468eeedbc7477"

    fetch(url)
        .then(function (response) {
            return response.json();
        })
        .then(function (myJson){
            var iconos = document.getElementById('iconos')
            var iconPath = "http://openweathermap.org/img/wn/";
            var datos = [];
            var etiquetas = [];
            var datos1 = [];
            var etiquetas1 = [];
            iconos.innerHTML = "";

            for(i=0; i < myJson.cnt; i++) {
                datos.push(myJson.list[i].main.temp);
                etiquetas.push(myJson.list[i].dt_txt);
                iconos.innerHTML += "<img src='" + iconPath + myJson.list[i].weather[0].icon + ".png'/>";
                titulo.innerHTML = "<h1> El tiempo en " + myJson.city.name;
            }

            for(i=0; i < myJson.cnt; i++) {
                datos1.push(myJson.list[i].main.humidity);
                etiquetas1.push(myJson.list[i].dt_txt);
            }

            var ctx = document.getElementById('temperatura').getContext('2d');
            var temperatura = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: etiquetas,
                    datasets: [{
                        label: 'Temperatura ºC',
                        data: datos,
                        backgroundColor: [
                            'rgba(255, 0, 0, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],

                        borderColor: [
                            'rgba(255, 0, 0, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                }, 
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            var ctx1 = document.getElementById('lluvias').getContext('2d');
            var lluvias = new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: etiquetas1,
                    datasets: [{
                        label: 'Humedad %',
                        data: datos1,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],

                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                }, 
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        });
}