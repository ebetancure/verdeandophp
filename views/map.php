<!DOCTYPE html>
<html>
<head>
  <title>Parques cercanos a mi ubicación</title>
  <!-- Importación de la API de Google Maps -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZ6H_vg-bvu800m39hA-rbXaV-6b1KKww"></script>
  <script>
    function initMap() {
      // Creación del mapa centrado en la ubicación del usuario
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: {lat: 6.247609904047915, lng: -75.57297794300231} // Coordenadas de ejemplo
      });
      
      // Obtención de la ubicación del usuario
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
          
          // Creación de un marcador en la ubicación del usuario
          var marker = new google.maps.Marker({
            position: pos,
            map: map
          });
          
          // Búsqueda de parques cercanos a la ubicación del usuario
          var request = {
            location: pos,
            radius: '500',
            type: ['park']
          };
          var service = new google.maps.places.PlacesService(map);
          service.nearbySearch(request, function(results, status) {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
              // Creación de marcadores para cada parque encontrado
              for (var i = 0; i < results.length; i++) {
                var place = results[i];
                var marker = new google.maps.Marker({
                  position: place.geometry.location,
                  map: map
                });
              }
            }
          });
          
          // Centrado del mapa en la ubicación del usuario
          map.setCenter(pos);
        }, function() {
          handleLocationError(true, infoWindow, map.getCenter());
        });
      } else {
        // Si la geolocalización no está disponible, mostrar un error
        handleLocationError(false, infoWindow, map.getCenter());
      }
    }
    
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
      // Si hay un error en la geolocalización, mostrar un mensaje de error
      var error_message = "Error: El servicio de geolocalización no está disponible";
      alert(error_message);
    }
  </script>
</head>
<body onload="initMap()">
  <h1>Parques cercanos a mi ubicación</h1>
  <div id="map" style="height: 500px;"></div>
</body>
</html>
