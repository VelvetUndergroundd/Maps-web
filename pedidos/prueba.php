<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Google Maps API Example</title>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByBL6NMGLshPSLUHcBkrtN1iL9PvRUEh4"></script>
<style>
  #map {
    height: 400px;
    width: 100%;
  }
</style>
</head>
<body>
<div id="map"></div>
<script>
  function initMap() {
    const mapOptions = {
      center: { lat: 37.7749, lng: -122.4194 }, // San Francisco, CA
      zoom: 12
    };
    const map = new google.maps.Map(document.getElementById("map"), mapOptions);
  }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByBL6NMGLshPSLUHcBkrtN1iL9PvRUEh4&callback=initMap"></script>
</body>
</html>
